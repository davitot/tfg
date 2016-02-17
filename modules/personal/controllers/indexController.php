<?php

class indexController extends personalController {

    private $_personal;

    /**
     * Constructor por defecto de la clase
     */
    public function __construct() {
        parent::__construct();
        Session::tiempo();
        $this->_personal = $this->loadModel('indexPersonal');
    }

    /**
     *
     * @param type $pagina
     */
    public function index($pagina = false) {

        if (!$this->filtrarInt($pagina)) {
            $pagina = false;
        } else {
            $pagina = (int) $pagina;
        }

        $this->getLibrary('paginador');
        $paginador = new Paginador();
        $this->_view->setJs(array('personal'));

        $this->_view->assign('titulo', 'Gestion de Personal');
        if (!Session::get('autenticado')) {
            $this->redireccionar('login');
        } else {            
            $this->_view->assign('cargos', $this->_personal->getCargos(1));
            $this->_view->assign('personal', $paginador->paginar($this->_personal->getPersonal(), $pagina, 10));
            $this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
            //Mostramos la vista index
            $this->_view->renderizar('index');
        }
    }

    /**
     * Gestiona la paginacion segun los registros existentes
     */
    public function paginacionAjax() {
        $pagina = $this->getInt('pagina');
        $condicion = "";
        $nombre = $this->getTexto('nombre');
        $cargo = $this->getInt('cargo');
        $fechaInicio = $this->getTexto('fechaInicio');

        if ($nombre) {
            $condicion .= " AND nombre liKe '%$nombre%' ";
        }

        if ($cargo) {
            $condicion .= " AND idCargo =  '$cargo' ";
        }

        if ($fechaInicio) {
            $condicion .= " AND fecha_Incorporacion = '$fechaInicio' ";
        }

        $this->getLibrary('paginador');
        $paginador = new Paginador();

        $this->_view->setJs(array('personal'));
        $this->_view->assign('personal', $paginador->paginar($this->_personal->getPersonalFiltro($condicion), $pagina, 10));
        $this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
        $this->_view->renderizar('ajax/index', false, true);
    }

    /**
     *  Da de alta un nuevo personal en el proyecto
     */
    public function nuevo_personal() {
        $this->_acl->acceso('gestionar_personal');        
        if ($this->getInt('guardar') == 1) {
            $this->_view->assign('datos', $_POST);
            $this->validaFormulario('nuevo_personal');
            $imagen = '';
            if ($_FILES['imagen']['name']) {
                $this->getLibrary('upload' . DS . 'class.upload');
                $ruta = ROOT . 'modules' . DS . 'personal' . DS . 'views' . DS . 'index' . DS . 'img' . DS . 'personal' . DS;
                $upload = new upload($_FILES['imagen'], 'es_Es');
                $upload->allowed = array('image/*');
                $upload->file_new_name_body = 'upl_' . uniqid();
                $upload->process($ruta);

                if ($upload->processed) {
                    $imagen = $upload->file_dst_name;
                    $thumb = new upload($upload->file_dst_pathname);
                    $thumb->image_resize = true;
                    $thumb->image_x = 36;
                    $thumb->image_y = 36;
                    $thumb->file_name_body_pre = 'thumb_';
                    $thumb->process($ruta . 'thumb' . DS);
                } else {
                    $this->_view->assign('_error', $upload->error);
                    $this->_view->renderizar('nuevo', 'personal/index');
                    exit;
                }
            }
            $this->_personal->insertarPersona($this->getPostParam('cargo'), $this->getPostParam('nombre'), $this->getPostParam('email'), $this->getPostParam('fechaAlta'), $this->getPostParam('usuario'), $this->getPostParam('pass'), $imagen
            );

            $this->redireccionar('personal');
        }
        $this->_view->assign('titulo', 'Nuevo Personal');        
        $this->_view->setJs(array('personal', 'nuevo'));
        $this->_view->setJsPlugin(array('jquery.validate'));
        $this->_view->assign('comboItems', $this->_personal->getCargos(1));
        $this->_view->renderizar('nuevo_personal', 'personal');
    }

    /**
     * Edita un personal dado de alta en el sistema
     * @param type $idPersonal
     */
    public function editar_personal($idPersonal, $idCargo) {
        //$this->_view->setJsPlugin(array('jquery.validate'));
        $this->_acl->acceso('gestionar_personal');
        $this->_view->setJs(array('personal'));
        $this->_view->assign('titulo', 'Editar personal');
       
        //Si no existe la persona a editar volvemos.
        if (!$this->_personal->getPersona($this->filtrarInt($idPersonal))) {
            $this->_view->assign('_error', 'La persona a editar no se encuentra en el Sistema');            
            $this->redireccionar('personal');
            exit;
        }

        //Se validan los datos antes de hacer los cambios en la BBDD
        if ($this->getInt('guardar') == 1) {
            $this->_view->assign('datos', $_POST);
            $this->validaFormulario('editar_personal', $this->filtrarInt($idPersonal));           
            $this->_personal->editarPersonal(
                    $this->filtrarInt($idPersonal), $this->getPostParam('cargo'), $this->getPostParam('nombre'), $this->getPostParam('fechaIn'), $this->getPostParam('email'), $this->getPostParam('usuario'), $this->getPostParam('activa')
            );
            $this->redireccionar('personal');
        }
        //Se cargan los datos para visualizar el registro
        $this->_view->assign('recursosLibres', $this->_personal->getRecursosLibres());
        $this->_view->assign('recursosPersonal', $this->_personal->getRecursosEmpleado($this->filtrarInt($idPersonal)));
        $this->_view->assign('cargos', $this->_personal->getCargos(1));
        $this->_view->assign('datos', $this->_personal->getPersona($this->filtrarInt($idPersonal)));
        $this->_view->renderizar('editar_personal', 'personal');
    }

    /**
     * Elimina un personal liberando los recursos asociados a el
     * @param type $idPersonal
     * @param type $idCargo
     */
    public function eliminar_personal($idPersonal, $idCargo) {
        //Session::acceso('Jefe de proyecto') || Session::acceso('Jefe de equipo');
        $this->_acl->acceso('gestionar_personal');

        //Validamos que las variables sean accesibles
        if (!$this->filtrarInt($idPersonal) || !$this->filtrarInt($idCargo)) {
            $this->redireccionar('personal');
        }

        //Validamos que la persona exista
        if (!$this->_personal->getPersona($this->filtrarInt($idPersonal))) {
            $this->redireccionar('personal');
        }

        //Llamamos a la funcion eliminar
        $this->_personal->eliminarPersonal($this->filtrarInt($idPersonal), $this->filtrarInt($idCargo));
        //cargamos la vista personal
        $this->redireccionar('personal');
    }

    /**
     * Asigna un recurso a un Personal
     */
    public function agregar_recurso() {
        $this->_acl->acceso('gestionar_recursos');

        $idPersonal = 0;

        if ($_POST) {
            $recursos = $this->getPostParam("recLibres");
            $idPersonal = $this->getPostParam("idPersonal");
            if (count($recursos)) {
                $this->_personal->asignarRecursoLibre($idPersonal, $recursos);
            } else {
                $this->_view->assign('_error', 'Error count($recursos)-> agregar_recurso()');
            }
        } else {
            $this->_view->assign('_error', 'Error $_POST-> agregar_recurso()');
        }

        //cargamos la vista personal
        $this->_view->assign('recursosPersonal', $this->_personal->getRecursosEmpleado($this->filtrarInt($idPersonal)));
        $this->_view->assign('recursosLibres', $this->_personal->getRecursosLibres());
        $this->_view->assign('datos', $this->_personal->getPersona($this->filtrarInt($idPersonal)));
        $this->_view->renderizar('editar_personal', 'personal');
    }

    /**
     * Elimina un recurso asociado a una Personal
     * @param type $idPersonal
     * @param type $idRecurso
     */
    public function eliminar_recurso($idPersonal, $idRecurso) {
        $this->_acl->acceso('gestionar_recursos');

        //Llamamos a la funcion eliminar
        if ($this->filtrarInt($idPersonal) AND $this->filtrarInt($idRecurso)) {
            $this->_personal->eliminarRecursoAsignado($this->filtrarInt($idPersonal), $this->filtrarInt($idRecurso));
        } else {
            $this->_view->assign('_error', 'Error POST. AsignarRecursoLibre');
        }
        //cargamos la vista personal
        $this->_view->assign('recursosPersonal', $this->_personal->getRecursosEmpleado($this->filtrarInt($idPersonal)));
        $this->_view->assign('recursosLibres', $this->_personal->getRecursosLibres());
        $this->_view->assign('datos', $this->_personal->getPersona($this->filtrarInt($idPersonal)));
        $this->_view->renderizar('editar_personal', 'personal');
    }

    /**
     * Valida los campos del formulario nuevo
     */
    private function validaFormulario($pagina, $idPersonal = false) {
        $mensaje = "";

        if (!$this->getTexto('nombre')) {
            $mensaje = $mensaje . 'Debe introducir o revisar el nombre';
        }

        if (!$this->getPostParam('cargo')) {
            if (strlen($mensaje) > 1) {
                $mensaje = $mensaje . ', cargo';
            } else {
                $mensaje = 'Debe introducir o revisar el cargo';
            }
        }
        
        if (!$this->getTexto('fechaIn')) {
            if (strlen($mensaje) > 1) {
                $mensaje = $mensaje . ', fecha de Alta';
            } else {
                $mensaje = 'Debe introducir o revisar la fecha de Alta';
            }
        }


        if (!$this->getTexto('email')) {
            if (strlen($mensaje) > 1) {
                $mensaje = $mensaje . ', E-mail';
            } else {
                $mensaje = 'Debe introducir o revisar el E-mail';
            }
        }

        if (!$this->getTexto('usuario')) {
            if (strlen($mensaje) > 1) {
                $mensaje = $mensaje . ', usuario';
            } else {
                $mensaje = 'Debe introducir o revisar el usuario';
            }
        }

        if (!$this->getTexto('pass')) {
            if (strlen($mensaje) > 0) {
                $mensaje = $mensaje . ' y Password ';
            } else {
                $mensaje = 'Debe introducir o revisar el password.';
            }
        }

        //Implica que hay texto en la variable
        if (strlen($mensaje) > 1) {
            $this->_view->assign('_error', $mensaje);

            if (!strcmp($pagina, 'editar_personal')) {
                $this->_view->assign('datos', $this->_personal->getPersona($this->filtrarInt($idPersonal)));
                $this->_view->assign('cargos', $this->_personal->getCargos(1));
            } else {
                $this->_view->assign('comboItems', $this->_personal->getCargos(1));
            }
            $this->_view->renderizar($pagina, 'personal');
            exit;
        }
    }

}

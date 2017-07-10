<?php

class indexController extends personalController {

    private $_personal;
    private $_recurso;

    /**
     * Constructor por defecto de la clase
     */
    public function __construct() {
        parent::__construct();
        Session::tiempo();
        $this->_personal = $this->loadModel('indexPersonal','personal');
        $this->_recurso = $this->loadModel('indexRecursos','recursos');
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
            $this->_view->assign('contador', $this->_personal->getContador());
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
        $estado = $this->getTexto('activo');
        $fechaInicio = $this->getTexto('fechaInicio');

        if ($nombre) {
            $condicion .= " AND nombre liKe '%$nombre%' ";
        }

        if ($cargo) {
            $condicion .= " AND idCargo =  '$cargo' ";
        }

        if ($estado) {
          switch ($estado) {
            case 'activo':
            $estado= 1;
            break;
            case 'inactivo':
            $estado = 0;
            break;
            default:
            break;
          }
          $condicion .= " AND activo =  '$estado' ";
        }

        if ($fechaInicio) {
            $condicion .= " AND fecha_Incorporacion = '$fechaInicio' ";
        }

        $this->getLibrary('paginador');
        $paginador = new Paginador();

        $this->_view->setJs(array('personal'));
        $this->_view->assign('contador', $this->_personal->getContador($condicion));
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
            //TODO validar si existe el usuario

            $this->_personal->insertarPersona($this->getPostParam('cargo'), $this->getPostParam('nombre'), $this->getPostParam('email'), $this->getPostParam('fechaAlta'), $this->getPostParam('usuario'), $this->getPostParam('pass'));
            $this->redireccionar('personal');
        }
        $this->_view->assign('titulo', 'Nuevo Personal');
        $this->_view->setJs(array('personal', 'nuevo', 'validator'));
        $this->_view->assign('comboItems', $this->_personal->getCargos(1));
        $this->_view->renderizar('nuevo_personal', 'personal');
    }

    /**
     * Edita un personal dado de alta en el sistema
     * @param type $idPersonal
     */
    public function editar_personal($idPersonal) {
        $this->_acl->acceso('gestionar_personal');
        $this->_view->setJs(array('personal', 'validator'));
        $this->_view->assign('titulo', 'Editar personal');

        //Si no existe la persona a editar volvemos.
        if (!$this->_personal->getPersona($this->filtrarInt($idPersonal))) {
            $this->_view->assign('_error', 'La persona a editar no se encuentra en el Sistema');
            $this->redireccionar('personal');
            exit;
        }

        //Se inserta la persona en la BBDD personal
        if ($this->getInt('guardar') == 1) {
            $this->_view->assign('datos', $_POST);
            $persona = new Persona($this->getPostParam('cargo'), $this->getPostParam('nombre'), $this->getPostParam('fechaIn'), $this->getPostParam('email'), $this->getPostParam('usuario'), $this->getPostParam('pass'), $this->getPostParam('activo'), $this->getPostParam('imagen'));
            $persona->setIdPersonal($this->filtrarInt($idPersonal));
            $this->_personal->editarPersonal($persona);
            $this->redireccionar('personal');
        }
        //Se cargan los datos para visualizar el registro
        $this->_view->assign('recursosLibres', $this->_recurso->getRecursosLibres());
        $this->_view->assign('recursosPersonal', $this->_recurso->getRecursosEmpleado($this->filtrarInt($idPersonal)));
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
        $this->_recurso->refrescarRecursos($this->filtrarInt($idPersonal));
        //cargamos la vista personal
        $this->redireccionar('personal');
    }

    /**
     * Asigna un recurso a un Personal
     */
    public function agregar_recurso() {
        $this->_acl->acceso('gestionar_recursos');
        $noError = true;
        $idPersonal = 0;

        if ($_POST) {
            $recursos = $this->getPostParam("recLibres");
            $idPersonal = $this->getPostParam("idPersonal");
            if (count($recursos)) {
                $this->_recurso->asignarRecursoLibre($idPersonal, $recursos);
            } else {
                $this->_view->assign('_error', 'Debe seleccionar al menos un recurso libre');
                $noError = false;
            }
        } else {
            $this->_view->assign('_error', 'Error al asignar el recurso al usuario. Es posible que se encuentre asignado');
            $noError = false;
        }
        if ($noError) {
            $this->_view->assign('_mensaje', 'Recurso asignado correctamente');
        }
        //cargamos la vista personal
        $this->_view->assign('recursosPersonal', $this->_recurso->getRecursosEmpleado($this->filtrarInt($idPersonal)));
        $this->_view->assign('recursosLibres', $this->_recurso->getRecursosLibres());
        $this->_view->assign('datos', $this->_personal->getPersona($this->filtrarInt($idPersonal)));
        $this->_view->assign('cargos', $this->_personal->getCargos(1));
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
            $this->_recurso->eliminarRecursoAsignado($this->filtrarInt($idPersonal), $this->filtrarInt($idRecurso));
        } else {
            $this->_view->assign('_error', 'Error POST. AsignarRecursoLibre');
        }
        //cargamos la vista personal
        $this->_view->assign('recursosPersonal', $this->_recurso->getRecursosEmpleado($this->filtrarInt($idPersonal)));
        $this->_view->assign('recursosLibres', $this->_recurso->getRecursosLibres());
        $this->_view->assign('datos', $this->_personal->getPersona($this->filtrarInt($idPersonal)));
        $this->_view->assign('cargos', $this->_personal->getCargos(1));
        $this->_view->renderizar('editar_personal', 'personal');
    }

}

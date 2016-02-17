<?php

class aclController extends Controller {

    private $_aclm;

    /**
     * Constructor por defecto de la clase
     */
    public function __construct() {
        parent::__construct();
        Session::tiempo();
        $this->_aclm = $this->loadModel('acl');
    }

    /**
     * Funcion principal
     */
    public function index() {
        $this->_acl->acceso('gestionar_acl');
        $this->_view->assign('titulo', 'Listas de acceso');
        $this->_view->assign('roles', $this->_aclm->getCargos());
        $this->_view->renderizar('index');
    }

    /**
     * 
     */
    public function cargos() {
        $this->_acl->acceso('gestionar_acl');
        $this->_view->assign('titulo', 'Administracion de permisos');
        $this->_view->assign('roles', $this->_aclm->getCargos());
        $this->_view->renderizar('cargos');
    }

    /**
     * Muestra los permisos asociados a un cargo (habilitado/deshabilitado)
     * @param type $auxCargoID
     */
    public function permisos_cargo($auxCargoID) {
        $this->_acl->acceso('gestionar_permisos');
        $idCargo = $this->filtrarInt($auxCargoID);

        if (!$idCargo) {
            $this->redireccionar('acl/cargos');
        }

        $cargo = $this->_aclm->getCargo($idCargo);

        if (!$cargo) {
            $this->redireccionar('acl/roles');
        }

        $this->_view->assign('titulo', 'Administracion de permisos');
        $modificado = 0;
        if ($this->getInt('guardar') == 1) {
            $values = array_keys($_POST);


            for ($i = 0; $i < count($values); $i++) {
                if (substr($values[$i], 0, 5) == 'perm_') {
                    $permiso = (strlen($values[$i]) - 5);
                    if ($_POST[$values[$i]] == 1) {
                        $v = 1;
                    } else {
                        $v = 0;
                    }
                    $this->_aclm->editarPermisoCargo($idCargo, substr($values[$i], -$permiso), $v);
                    $modificado = 1;
                }
            }
        }
        $this->_view->assign('cargo', $cargo);
        $this->_view->assign('permisos', $this->_aclm->getPermisosCargo($idCargo));
        if ($modificado == 1) {
            $this->_view->assign('_mensaje', 'Modificacion correcta');
        }
        $this->_view->renderizar('permisos_cargo');
    }

    /**
     * Muestra listado de permisos aplicables a cargos dados de alta en el sistema
     */
    public function permisos($pagina = false) {
        $this->_acl->acceso('gestionar_permisos');

        if (!$this->filtrarInt($pagina)) {
            $pagina = false;
        } else {
            $pagina = (int) $pagina;
        }

        $this->getLibrary('paginador');
        $paginador = new Paginador();

        $this->_view->assign('permisos', $paginador->paginar($this->_aclm->getPermisos(), $pagina, 10));        
        $this->_view->assign('titulo', 'MigraGest');
        $this->_view->renderizar('permisos', 'acl');
    }

    /**
     *  Muestra la vista para generar un nuevo cargo y lo inserta en la BBDD
     */
    public function nuevo_cargo() {
        $this->_acl->acceso('gestionar_acl');
        $this->_view->assign('titulo', 'Nuevo Cargo');

        if ($this->getInt('guardar') == 1) {
            $this->_view->assign('datos', filter_input_array(INPUT_POST));

            $this->validarCargo();

            $this->_aclm->insertarCargo(
                    $this->getTexto('cargo')
            );

            $this->redireccionar('acl');
        }

        $this->_view->renderizar('nuevo_cargo', 'acl');
    }

    /**
     *  Muestra la vista para generar un nuevo cargo y lo inserta en la BBDD
     */
    public function editar_cargo($idCargo) {
        $this->_acl->acceso('gestionar_acl');
        $modificado=0;
        $this->_view->assign('titulo', 'Editar cargos');

        if ($this->getInt('guardar') == 1) {
            $this->_view->assign('datos', $_POST);

            $this->validarCargo();

            $this->_aclm->editarCargo(
                    $this->filtrarInt($idCargo), $this->getPostParam('cargo'), $this->getPostParam('activo')
            );
            $modificado=1;                 
        }
         if ($modificado == 1) {
            $this->_view->assign('_mensaje', 'Modificacion correcta');
        }
        $this->_view->assign('datos', $this->_aclm->getCargo($this->filtrarInt($idCargo)));        
        $this->_view->renderizar('editar_cargo');
    }

    /**
     * Valida los campos de la vista nuevo_cargo
     */
    public function validarCargo() {
        if (!$this->getTexto('cargo')) {
            $this->_view->assign('_error', 'Debe introducir la descripcion del cargo');
            $this->_view->renderizar('nuevo_cargo', 'acl');
            exit;
        }
    }  

    /**
     * 
     * @param type $idCargo
     */
    public function eliminar_Cargo($idCargo) {
        $this->_acl->acceso('gestionar_acl');

        //Validamos que las variables sean accesibles
        if (!$this->filtrarInt($idCargo)) {
            $this->_view->assign('_error', 'Formato no valido en el id de cargo');
            $this->redireccionar('acl');
        }

        //Validamos que el cargo exista
        if (!$this->_aclm->getCargo($this->filtrarInt($idCargo))) {
            $this->_view->assign('_error', 'El cargo seleccionado no existe en la base de datos');
            $this->redireccionar('acl');
        }

        //Llamamos a la funcion eliminar
        $this->_aclm->eliminarCargo($this->filtrarInt($idCargo));
        //cargamos la vista permisos
        $this->redireccionar('acl');
    }

    /**
     * Muestra la vista para generar un nuevo permiso y lo inserta en la BBDD
     */
    public function nuevo_permiso() {
        $this->_acl->acceso('gestionar_permisos');
        $this->_view->assign('titulo', 'Nuevo Permiso');

        if ($this->getInt('guardar') == 1) {
            $this->_view->assign('datos', filter_input_array(INPUT_POST));

            if (!$this->getSql('permiso')) {
                $this->_view->assign('_error', 'Debe introducir el nombre del permiso');
                $this->_view->renderizar('nuevo_permiso', 'acl');
                exit;
            }

            if (!$this->getAlphaNum('key')) {
                $this->_view->assign('_error', 'Debe introducir el key del permiso');
                $this->_view->renderizar('nuevo_permiso', 'acl');
                exit;
            }

            $this->_aclm->insertarPermiso(
                    $this->getPostParam('permiso'), $this->getPostParam('key')
            );

            $this->redireccionar('acl/permisos');
        }

        $this->_view->renderizar('nuevo_permiso', 'acl');
    }

    /**
     * Edita un permiso dado de alta en el sistema
     * @param type $idPermiso
     */
    public function editar_permiso($idPermiso) {
        $this->_acl->acceso('gestionar_permisos');

        if (!$this->filtrarInt($idPermiso)) {
            $this->redireccionar('acl/permisos');
        }

        if (!$this->_aclm->getPermiso($this->filtrarInt($idPermiso))) {
            $this->redireccionar('acl/permisos');
        }

        $this->_view->assign('titulo', 'Editar permiso');
        //$this->_view->setJs(array('nuevo'));      

        if ($this->getInt('guardar') == 1) {
            $this->_view->assign('datos', $_POST);

            if (!$this->getTexto('permiso')) {
                $this->_view->assign('_error', 'Debe introducir el permiso');
                $this->_view->renderizar('editar_permiso', 'acl');
                exit;
            }

            if (!$this->getTexto('llave')) {
                $this->_view->assign('_error', 'Debe introducir llave');
                $this->_view->renderizar('editar_permiso', 'acl');
                exit;
            }

            $this->_aclm->editarPermiso(
                    $this->filtrarInt($idPermiso), $this->getPostParam('permiso'), $this->getPostParam('llave')
            );

            $this->redireccionar('acl/permisos');
        }

        $this->_view->assign('datos', $this->_aclm->getPermiso($this->filtrarInt($idPermiso)));
        $this->_view->renderizar('editar_permiso', 'acl/permisos');
    }

    /**
     * Elimina un personal liberando los recursos asociados a el
     * @param type $idPersonal
     * @param type $idCargo
     */
    public function eliminar_Permiso($idPermiso) {
        $this->_acl->acceso('gestionar_permisos');      
        
        //Validamos que las variables sean accesibles
        if (!$this->filtrarInt($idPermiso)) {
            $this->redireccionar('acl/permisos');
        }

        //Validamos que el Permiso exista
        if (!$this->_aclm->getPermiso($this->filtrarInt($idPermiso))) {
            $this->redireccionar('acl/permisos');
        }

        //Llamamos a la funcion eliminar
        $this->_aclm->eliminarPermiso($this->filtrarInt($idPermiso));
        //cargamos la vista permisos
        $this->redireccionar('acl/permisos');
    }

}

<?php

class indexController extends tareasController {

    private $_tarea;

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        Session::tiempo();
        $this->_tarea = $this->loadModel('indexTareas');
    }

    /**
     * Index
     * @param type $pagina
     */
    public function index($pagina = false) {
        $this->_acl->acceso('gestionar_tareas');
        if (!$this->filtrarInt($pagina)) {
            $pagina = false;
        } else {
            $pagina = (int) $pagina;
        }

        $this->getLibrary('paginador');
        $paginador = new Paginador();
        $this->_view->setJs(array('acciones', 'eventos'));

        $this->_view->assign('titulo', 'MigraGest');
        if (!Session::get('autenticado')) {
            $this->redireccionar('login');
        } else {
            $this->_view->assign('tecnicos', $this->_tarea->getTecnicos());
            $this->_view->assign('tareas', $paginador->paginar($this->_tarea->getTareas()));
            $this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
            $this->_view->renderizar('index');
//$this->_tarea->enviarMail();
        }
    }

    /**
     * Paginacion
     */
    public function paginacionAjax() {
        $pagina = $this->getInt('pagina');
        $condicion = "";
        $nombre = $this->getTexto('nombre');
        $idPersonal = $this->getInt('idPersonal');
        $fechaInicio = $this->getTexto('fechaInicio');

        if ($nombre) {
            $condicion .= " AND tecnico liKe '%$nombre%' ";
        }

        if ($idPersonal) {
            $condicion .= " AND idPersonal =  '$idPersonal' ";
        }

        if ($fechaInicio) {
            $condicion .= " AND fecha_inicio = '$fechaInicio' ";
        }

        $this->getLibrary('paginador');
        $paginador = new Paginador();
        $this->_view->setJs(array('tareas'));
        $this->_view->assign('tareas', $paginador->paginar($this->_tarea->getTareas($condicion), $pagina, 10));
        $this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
        $this->_view->renderizar('ajax/index', false, true);
    }

    /**
     *  Obtiene las provincias de una comunidad con migraciones dadas de alta.
     */
    public function getComunidades() {
        echo json_encode($this->_tarea->getComunidades());
    }

    /**
     *  Obtiene las provincias de una comunidad con migraciones dadas de alta.
     */
    public function getProvincias() {
        if ($this->getTexto('comunidad')) {
            echo json_encode($this->_tarea->getProvincias($this->getTexto('comunidad')));
        }
    }

    /**
     *  Obtiene las sedes de una provincia con migraciones dadas de alta.
     */
    public function getSedes() {
        if ($this->getTexto('provincia')) {
            echo json_encode($this->_tarea->getSedes($this->getTexto('provincia')));
        }
    }

    /**
     *  Obtiene los organos de una sede con migraciones dadas de alta.
     */
    public function getOrganos() {
        if ($this->getTexto('desc_sede')) {
            echo json_encode($this->_tarea->getOrganos($this->getTexto('desc_sede')));
        }
    }

    /**
     * 
     */
    public function getTecnicosCombo() {
        if ($this->getTexto('tipo')) {
            echo json_encode($this->_tarea->getTecnicosCombo($this->getTexto('tipo')));
        }
    }

    /**
     * Inserta una nueva tarea en la bbdd
     */
    public function nueva_tarea() {
        $this->_acl->acceso('gestionar_tareas');
        $this->_view->setJs(array('acciones', 'eventos'));
        $guardia = $noServicio = 0;
        $_personal = $this->loadModel('indexPersonal', 'personal');

        $this->_view->assign('titulo', 'Gestionar tarea');
        $this->_view->setJs(array('index', 'nuevo'));
        if ($this->getInt('guardar') == 1) {

            $this->_view->assign('datos', $_POST);

            if (!$this->getTexto('titulo')) {
                $this->_view->assign('_error', 'El titulo es obligatorio');
                $this->_view->assign('tipos', $this->_tarea->getTiposTarea());
                $this->_view->renderizar('nueva_tarea', 'tareas');
                exit;
            }

            if (!$this->getTexto('tipo')) {
                $this->_view->assign('_error', 'El tipo es obligatorio');
                $this->_view->assign('tipos', $this->_tarea->getTiposTarea());
                $this->_view->renderizar('nueva_tarea', 'tareas');
                exit;
            }

            if (!$this->getInt('tecnicos')) {
                $this->_view->assign('_error', 'El personal es obligatorio');
                $this->_view->assign('tipos', $this->_tarea->getTiposTarea());
                $this->_view->renderizar('nueva_tarea', 'tareas');
                exit;
            }

            if (!$this->getTexto('descripcion')) {
                $this->_view->assign('_error', 'La Descripcion es obligatoria');
                $this->_view->assign('tipos', $this->_tarea->getTiposTarea());
                $this->_view->renderizar('nueva_tarea', 'tareas');
                exit;
            }

            //Capturamos el estado de los checkbox
            if (isset($_POST['guardia'])) {
                $guardia = 1;
            }

            if (isset($_POST['noServicio'])) {
                $noServicio = 1;
            } else {
                $noServicio = 0;
            }

            if (!isset($_POST['descripcion'])) {
                $this->_view->assign('_error', 'Debe introducir una descripción');
                $this->_view->assign('tipos', $this->_tarea->getTiposTarea());
                $this->_view->renderizar('nueva_tarea', 'tareas');
                exit;
            }

            $idCargo = $_personal->getIdCargo($this->getTexto('tecnicos'));

            $this->_tarea->nuevaTarea($this->getTexto('titulo'), $this->getTexto('tipo'), $this->getTexto('tecnicos'), $idCargo[0]['idCargo'], $this->getTexto('descripcion'), $this->getTexto('fechaInicio'), $guardia, $noServicio, $this->getTexto('comunidad'), $this->getTexto('provincia'), $this->getTexto('sede'), $this->getTexto('organo'));
            $this->redireccionar('tareas');
        }
        $this->_view->assign('tipos', $this->_tarea->getTiposTarea());
        $this->_view->renderizar('nueva_tarea', 'tareas');
    }

    /**
     * Edita una tarea dada de alta en el sistema
     * @param type $idTarea
     */
    public function editar_tarea($idTarea) {
        $this->_acl->acceso('gestionar_tareas');
        $this->_view->assign('titulo', 'Gestionar Tarea');
        $this->_view->setJs(array('acciones', 'eventos'));
        $guardia = $noServicio = 0;
        $activa = 1;

        if (!$this->filtrarInt($idTarea)) {
            $this->redireccionar('tareas');
        }

        //Validamos que la tarea existe
        if (!$this->_tarea->getTarea($this->filtrarInt($idTarea))) {
            $this->redireccionar('tareas');
        }

        if ($this->getInt('guardar') == 1) {
            $this->_view->assign('datos', $_POST);

            $this->validaFormulario('editar_tarea', $idTarea);
            //Capturamos el estado de los checkbox                       

            if (isset($_POST['activa'])) {
                $activa = 0;
            }

            if (isset($_POST['guardia'])) {
                $guardia = 1;
            }

            if (isset($_POST['noServicio'])) {
                $noServicio = 1;
            }

            $this->_tarea->editarTarea($this->filtrarInt($idTarea), $this->getTexto('titulo'), $this->getTexto('tipo'), $this->getTexto('tecnicos'), $this->getTexto('descripcion'), $this->getTexto('fechaInicio'), $this->getTexto('fechaFin'), $activa, $guardia, $noServicio, $this->getTexto('comunidad'), $this->getTexto('provincia'), $this->getTexto('sede'), $this->getTexto('organo'));
            $this->redireccionar('tareas');
        }
        $this->_view->assign('datos', $this->_tarea->getTarea($this->filtrarInt($idTarea)));
        $this->_view->assign('tipos', $this->_tarea->getTiposTarea());
        $this->_view->renderizar('editar_tarea', 'tareas');
    }

    /**
     * Elimina una tarea del sistema
     * @param type $idTarea
     */
    public function eliminar_tarea($idTarea, $idPersonal) {
        $this->_acl->acceso('gestionar_tareas');

        if (!$this->filtrarInt($idTarea) || !$this->_tarea->getTarea($this->filtrarInt($idTarea))) {
            $this->redireccionar('tareas');
        }

        //Llamamos a la funcion eliminar
        $resultado = $this->_tarea->eliminarTarea($this->filtrarInt($idTarea), $this->filtrarInt($idPersonal));
        if ($resultado) {
            //Cargamos la vista tareas
            $this->redireccionar('tareas');
        } else {
            $this->_view->assign('_error', 'Fallo al eliminar la tarea');
            $this->_view->renderizar('index', 'tareas');
        }
    }

    /**
     * Obtiene las tareas del usuario logeado
     */
    public function getTareasGrupo() {
        if ($this->getInt('idPersonal')) {
            echo json_encode($this->_tarea->getTareasAbiertasTecnico($this->getInt('idPersonal')));
        }
    }

    /**
     * Valida los campos del formulario nuevo
     */
    private function validaFormulario($pagina, $idTarea = false) {
        $mensaje = "";

        if (!$this->getTexto('titulo')) {
            $mensaje = $mensaje . 'Debe introducir o revisar el Titulo';
        }

        if (!$this->getInt('tecnicos')) {
            if ($mensaje . Length > 0) {
                $mensaje = $mensaje . ', el Personal asignado';
            } else {
                $mensaje = $mensaje . 'Debe introducir o revisar el Personal asignado';
            }
        }

        if (!$this->getPostParam('descripcion')) {
            if (strlen($mensaje) > 1) {
                $mensaje = $mensaje . ', descripcion';
            } else {
                $mensaje = 'Debe introducir o revisar la descripcion';
            }
        }

        if (!$this->getTexto('fechaInicio')) {
            if (strlen($mensaje) > 1) {
                $mensaje = $mensaje . ', fecha de Inicio';
            } else {
                $mensaje = 'Debe introducir o revisar la fecha de Inicio';
            }
        }

        //Implica que hay texto en la variable
        if (strlen($mensaje) > 1) {
            $this->_view->assign('_error', $mensaje);
            if (!strcmp($pagina, 'editar_tarea')) {
                $this->_view->assign('datos', $this->_tarea->getTarea($this->filtrarInt($idTarea)));
            }
            $this->_view->assign('tipos', $this->_tarea->getTiposTarea());
            $this->_view->renderizar($pagina, 'tareas');
            exit;
        }
    }

}

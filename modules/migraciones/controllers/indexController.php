<?php

class indexController extends migracionesController {

    private $_migraciones;
    private $_tarea;

    /**
     * Constructor por defecto de la clase
     */
    public function __construct() {
        parent::__construct();
        Session::tiempo();
        $this->getLibrary(DS . 'PHPExcel' . DS . 'PHPExcel' . DS . 'IOFactory');
        $this->_migraciones = $this->loadModel('indexMigra');
        $this->_tarea = $this->loadModel('indexTareas', 'tareas');
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
        $this->_view->setJs(array('migraciones', 'tablas'));

        $this->_view->assign('titulo', 'MigraGest');
        if (!Session::get('autenticado')) {
            $this->redireccionar('login');
        } else {            
            $this->_view->assign('tecnicos', $this->_tarea->getTecnicos(" AND (idCargo = '2' OR idCargo=5) "));
            print_r($pagina);
            $this->_view->assign('migraciones', $paginador->paginar($this->_migraciones->getMigraciones(), $pagina, 9));
            $this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
            //$this->_view->assign('pagina', $pagina);
            $this->_view->assign('contador', $this->_migraciones->getRegistros());
            $this->_view->assign('procesos', $this->_migraciones->getProcesos());
            $this->_view->renderizar('index');
        }
    }

    /**
     *  Edita en tiempo real un campo de la tabla
     * @param type $titulo
     * @param type $valor
     * @param type $idMigracion
     */
    public function editar_campo($titulo, $valor, $idMigracion) {
        $this->_acl->acceso('gestionar_migraciones');

        //Validamos la recepcion de los parametros
        if (!isset($valor) || !isset($idMigracion) || !isset($titulo)) {
            $this->redireccionar('migraciones');
        }        
        
        switch ($titulo) {
            case 'estadoinicial': $titulo = 'estado_inicial';
                break;
            case 'estadofinal': $titulo = 'estado_final';
                break;
            default:
                //El esto de nombres coinciden con los campos de la tabla migraciones
                break;
        }        
        $this->_migraciones->editarValorTabla($titulo, $valor, $idMigracion);
        $this->redireccionar('migraciones');
    }
    
    /**
     *  Edita una fila de la tabla desde otro formulario.
     * @param type $idMigracion
     */
    public function editar_migracion($idMigracion) {                
        $this->_acl->acceso('gestionar_migraciones');
        $this->_view->assign('titulo', 'Editar Migracion');
        //$this->_view->setJs(array('migraciones', 'tablas'));        

        if (!$this->filtrarInt($idMigracion)) {
            $this->redireccionar('migraciones');
        }

        $migracion = $this->_migraciones->getMigracion($this->filtrarInt($idMigracion));
        //Validamos que la migracion existe
        if (!$migracion) {
            $this->redireccionar('migraciones');
        }

        if ($this->getInt('guardar') == 1) {
            $this->_view->assign('datos', $_POST);

            $this->validaFormulario('editar_migracion', $idMigracion);
            //Capturamos el estado de los checkbox                       
           
            $this->_tarea->editarMigracion($this->filtrarInt($idMigracion), $this->getTexto('estadoInicial'), $this->getTexto('estadoFinal'), $this->getTexto('fechaInicio'), $this->getTexto('fechaFin'), $this->getTexto('observaciones'));               
            $this->redireccionar('migraciones');
        }       
        $this->_view->assign('datos', $migracion);
        $this->_view->renderizar('editar_migracion', 'migraciones');
    }
    
    /**
     * Paginacion de index
     */
    public function paginacionAjax() {
        $pagina = $this->getInt('pagina');
        $condicion = "";
        $proceso = $this->getTexto('proceso');
        $estado = $this->getTexto('estado');
        $tecnico = $this->getTexto('idTecnico');
        $tarea = $this->getTexto('idTarea');
        $fechaInicio = $this->getTexto('fechaInicio');
        $fechaFin = $this->getPostParam('fechaFin');

        if ($proceso && strcmp($proceso, "- Proceso -") != 0) {
            $condicion .= " AND proceso =  '$proceso' ";
        }

        if ($estado && strcmp($estado, "- Estado -") != 0) {
            $condicion .= " AND estado_inicial =  '$estado' ";
        }
        
        if ($tecnico && strcmp($tecnico, "- Tecnico -") != 0) {
            $condicion .= " AND idTecnico =  '$tecnico' ";
        }
        
        if ($tarea && strcmp($tarea, "- Tarea -") != 0) {
            $condicion .= " AND idTarea =  '$tarea' ";
        }

        if ($fechaInicio != '') {
            $condicion .= " AND fecha_Inicio = '$fechaInicio' ";
        }

        if ($fechaFin != '') {
            $condicion .= " AND fecha_Fin = '$fechaFin' ";
        }                                   
        
        $this->getLibrary('paginador');
        $paginador = new Paginador();        
        $this->_view->setJs(array('migraciones', 'tablas'));
        $this->_view->assign('migraciones', $paginador->paginar($this->_migraciones->getMigraciones($condicion), $pagina, 9));        
        $this->_view->assign('contador', $this->_migraciones->getRegistros($condicion));
        $this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
        
        $this->_view->renderizar('ajax/index', false, true);
    }

    public function paginacionInforme() {
        $pagina = $this->getInt('pagina');
        $condicion = "";
        $comunidad = $this->getTexto('comunidad');
        $provincia = $this->getTexto('provincia');
        $sede = $this->getTexto('sede');

        if ($comunidad && strcmp($comunidad, "...") != 0) {
            $condicion .= " AND comunidad =  '$comunidad' ";
        }

        if ($provincia && strcmp($provincia, "...") != 0) {
            $condicion .= " AND provincia =  '$provincia' ";
        }

        if ($sede && strcmp($sede, "...") != 0) {
            $condicion .= " AND sede = '$sede' ";
        }

        $this->getLibrary('paginador');
        $paginador = new Paginador();
        $this->_view->setJs(array('informes, tablas'));
        $this->_view->assign('resultados', $paginador->paginar($this->_migraciones->getResultados($condicion), $pagina, 14));
        $this->_view->assign('contador', $this->_migraciones->getContadorResultados($condicion));
        $this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
        $this->_view->renderizar('ajax/informe_totales', false, true);
    }

    public function paginacionTareasTecnicos() {
        $pagina = $this->getInt('pagina');
        $condicion = "";
        $comunidad = $this->getTexto('comunidad');
        $fechaInicio = $this->getTexto('fechaInicio');
        $fechaFin = $this->getTexto('fechaFin');

        if ($comunidad && strcmp($comunidad, "...") != 0) {
            $condicion .= " AND comunidad =  '$comunidad' ";
        }

        if ($fechaInicio != 0) {
            $condicion .= " AND fecha_inicio =  '$fechaInicio' ";
        }

        if ($fechaFin != 0) {
            $condicion .= " AND fecha_Fin = '$fechaFin' ";
        }

        $this->getLibrary('paginador');
        $paginador = new Paginador();
        $this->_view->setJs(array('tareas_tecnicos'));
        $this->_view->assign('tareas', $paginador->paginar($this->_migraciones->getTareasTecnico(Session::get('id_usuario'), Session::get('level'), $condicion), $pagina, 10));
        $this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
        $this->_view->renderizar('ajax/tareas_tecnicos', false, true);
    }

    public function paginacionTareasxComu() {
        $pagina = $this->getInt('pagina');
        $condicion = "";
        $comunidad = $this->getTexto('comunidad');

        if ($comunidad) {
            $condicion .= " AND comunidad =  '$comunidad' ";
        }

        print_r($comunidad);

        $this->getLibrary('paginador');
        $paginador = new Paginador();
        $this->_view->setJs(array('totales_tecxcomu'));
        $this->_view->assign('resultados', $paginador->paginar($this->_migraciones->getTotalesXcomu($condicion), $pagina, 10));
        $this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
        $this->_view->renderizar('ajax/informe_totalesTecComu', false, true);
    }

    public function cargarExcel() {
        $this->_acl->acceso('gestionar_migraciones');
        $this->_view->assign('titulo', 'Gestionar Migraciones');
        $this->_view->setJs(array('migracion'));
        $this->_view->setJsPlugin(array('jquery.validate'));

        $fichExcel = $this->getPostParam('fichExcel');

        $this->_migraciones->cargarDatos('D:\\' . $fichExcel);
        $this->redireccionar('migraciones');
    }

    /**
     * Muestra una foto del estado en tiempo real de las migraciones
     * @param type $pagina
     */
    public function informe_estado($pagina = false) {
        if (!$this->filtrarInt($pagina)) {
            $pagina = false;
        } else {
            $pagina = (int) $pagina;
        }

        $this->getLibrary('paginador');
        $paginador = new Paginador();
        $this->_view->setJs(array('informes', 'tablas'));

        $this->_view->assign('titulo', 'MigraGest');
        if (!Session::get('autenticado')) {
            $this->redireccionar('login');
        } else {
            $this->_view->assign('resultados', $paginador->paginar($this->_migraciones->getResultados(), $pagina, 14));
            $this->_view->assign('comunidades', $this->_migraciones->getComunidades());
            $this->_view->assign('provincias', $this->_migraciones->getProvincias());
            $this->_view->assign('sedes', $this->_migraciones->getsedes());
            $this->_view->assign('realizadas', $this->_migraciones->getRealizadas());
            $this->_view->assign('pendientes', $this->_migraciones->getPendientes());
            $this->_view->assign('noAplica', $this->_migraciones->getNoaplica());
            $this->_view->assign('contador', $this->_migraciones->getContadorResultados());
            $this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
            $this->_view->renderizar('informe_totales', 'migraciones');
        }
    }

    public function informe_totalesTecComu($pagina = false) {
        if (!$this->filtrarInt($pagina)) {
            $pagina = false;
        } else {
            $pagina = (int) $pagina;
        }

        $this->getLibrary('paginador');
        $paginador = new Paginador();
        $this->_view->setJs(array('totales_tecxcomu'));

        $this->_view->assign('titulo', 'MigraGest');
        if (!Session::get('autenticado')) {
            $this->redireccionar('login');
        } else {
            $this->_view->assign('comunidades', $this->_migraciones->getComunidades());
            $this->_view->assign('resultados', $this->_migraciones->getTotalesXcomu(" AND comunidad =  'Castilla la Mancha' "));
            $this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
            $this->_view->renderizar('informe_totalesTecComu', 'migraciones');
        }
    }

    /**
     * Muestra las tareas asignadas al tecnico logeado
     * @param type $pagina
     */
    public function tareas_tecnico($pagina = false) {
        if (!$this->filtrarInt($pagina)) {
            $pagina = false;
        } else {
            $pagina = (int) $pagina;
        }

        $this->getLibrary('paginador');
        $paginador = new Paginador();
        $this->_view->setJs(array('tareas_tecnicos'));

        $this->_view->assign('titulo', 'MigraGest');
        if (!Session::get('autenticado')) {
            $this->redireccionar('login');
        } else {
            $this->_view->assign('tareas', $paginador->paginar($this->_migraciones->getTareasTecnico(Session::get('id_usuario'), Session::get('level'), ''), $pagina, 10));
            $this->_view->assign('comunidades', $this->_migraciones->getComunidades());
            $this->_view->assign('provincias', $this->_migraciones->getProvincias());
            $this->_view->assign('sedes', $this->_migraciones->getsedes());
            $this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
            $this->_view->renderizar('tareas_tecnico', 'migraciones');
        }
    }

}

<?php
require CLASS_PATH . 'Migracion.php';

class indexController extends migracionesController {

  private $_migraciones;
  private $_tarea;
  private $_personal;

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
    $this->_view->setJs(array('migraciones', 'tablas', 'bootstrap.file-input'));

    $this->_view->assign('titulo', 'MigraGest');
    if (!Session::get('autenticado')) {
      $this->redireccionar('login');
    } else {
      $this->_view->assign('tecnicos', $this->_tarea->getTecnicos(" AND (idCargo = '2' OR idCargo= 5 ) "));
      $this->_view->assign('migraciones', $paginador->paginar($this->_migraciones->getMigraciones(), $pagina, 13));
      $this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
      $this->_view->assign('contador', $this->_migraciones->getRegistros());
      $this->_view->assign('procesos', $this->_migraciones->getProcesos());
      $this->_view->renderizar('index');
    }
  }

  /**
  *  Edita una fila de la tabla desde otro formulario.
  * @param type $idMigracion
  */
  public function editar_migracion($idMigracion) {
    $this->_acl->acceso('gestionar_migraciones');
    $this->_view->assign('titulo', 'Editar Migracion');
    $this->_personal= $this->loadModel('indexPersonal', 'personal');
    $this->_view->setJs(array('validator'));
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

      //$this->validaFormulario('editar_migracion', $idMigracion);
      $idTecnico='';
      //Si no está asignada a ningun tecnico se asigna al logeado.
      if(is_null($migracion['idTecnico'])){
         $idTecnico= Session::get('id_usuario');
      }else{
         $idTecnico= $migracion['idTecnico'];
      }

      $this->_migraciones->editarMigracion($this->filtrarInt($idMigracion), $idTecnico, $this->getTexto('estadoInicial'), $this->getTexto('estadoFinal'), $this->getTexto('fechaInicio'), $this->getTexto('fechaFin'), $this->getTexto('observaciones'));
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
    $nombre = $this->getTexto('nombre');
    $identificador = $this->getTexto('identificador');

    if ($nombre) {
      $condicion .= " AND (nombre liKe '%$nombre%' OR apellidos like '%$nombre%') ";
    }

    if ($identificador) {
      $condicion .= " AND idLotus = '$identificador'";
    }

    $this->getLibrary('paginador');
    $paginador = new Paginador();
    $this->_view->setJs(array('migraciones', 'tablas'));
    $this->_view->assign('migraciones', $paginador->paginar($this->_migraciones->getMigraciones($condicion), $pagina, 13));
    $this->_view->assign('contador', $this->_migraciones->getRegistros($condicion));
    $this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));

    $this->_view->renderizar('ajax/index', false, true);
  }

  public function paginacionResumen() {
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
    $this->_view->assign('resultados', $paginador->paginar($this->_migraciones->getResultados($condicion), $pagina, 13));
    $this->_view->assign('comunidades', $this->_migraciones->getComunidades());
    $this->_view->assign('provincias', $this->_migraciones->getProvincias());
    $this->_view->assign('sedes', $this->_migraciones->getsedes());
    $this->_view->assign('realizadas', $this->_migraciones->getRealizadas());
    $this->_view->assign('pendientes', $this->_migraciones->getPendientes());
    $this->_view->assign('noAplica', $this->_migraciones->getNoaplica());
    $this->_view->assign('contador', $this->_migraciones->getContadorResultados($condicion));
    $this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
    $this->_view->renderizar('ajax/informe_resumen', false, true);
  }

  /**
  * Carga el contenido de un fichero excel preformateado con las migraciones
  * de una sede
  */
  public function cargarExcel() {
    $this->_acl->acceso('gestionar_migraciones');
    /*$this->_view->assign('titulo', 'Gestionar Migraciones');
    $this->_view->setJs(array('migracion'));
    $this->_view->setJsPlugin(array('jquery.validate'));*/

    $fichExcel = $this->getPostParam('fichExcel');

    $this->_migraciones->cargarDatos('D:\\' . $fichExcel);
    $this->redireccionar('migraciones');
  }

  /**
  * Muestra una foto del estado en tiempo real de las migraciones
  * @param type $pagina
  */
  public function informe_resumen($pagina = false) {
    if (!$this->filtrarInt($pagina)) {
      $pagina = false;
    } else {
      $pagina = (int) $pagina;
    }

    $this->getLibrary('paginador');
    $paginador = new Paginador();
    $this->_view->setJs(array('informes', 'acciones'));

    $this->_view->assign('titulo', 'MigraGest');
    if (!Session::get('autenticado')) {
      $this->redireccionar('login');
    } else {
      $this->_view->assign('resultados', $paginador->paginar($this->_migraciones->getResultados(), $pagina, 13));
      $this->_view->assign('comunidades', $this->_migraciones->getComunidades());
      $this->_view->assign('provincias', $this->_migraciones->getProvincias());
      $this->_view->assign('sedes', $this->_migraciones->getsedes());
      $this->_view->assign('realizadas', $this->_migraciones->getRealizadas());
      $this->_view->assign('pendientes', $this->_migraciones->getPendientes());
      $this->_view->assign('noAplica', $this->_migraciones->getNoaplica());
      $this->_view->assign('contador', $this->_migraciones->getContadorResultados());
      $this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
      $this->_view->renderizar('informe_resumen', 'migraciones');
    }
  }

  /**
  * Muestra un resumen de migraciones realizadas segun comunidad, provincia
  * y sede
  * @param type $pagina
  */
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
      $this->_view->assign('resultados', $this->_migraciones->getTotalesXcomu());
      $this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
      $this->_view->renderizar('informe_totalesTecComu', 'migraciones');
    }
  }

  public function getProvincias($comunidad) {
    if ($comunidad) {
      echo json_encode($this->_migraciones->getProvincias(' AND provincia = ' . $comunidad));
    }
  }

  /**
  *  Obtiene las sedes de una provincia con migraciones dadas de alta.
  */
  public function getSedes() {
    if ($this->getTexto('provincia')) {
      echo json_encode($this->_migraciones->getSedes(' AND sede = ' .  $this->getTexto('provincia')));
    }
  }

  /**
   * Valida los campos del formulario nuevo
   */
  private function validaFormulario($pagina, $idMigracion = false) {
      $mensaje = "";

      if (!$this->getTexto('nombre')) {
          $mensaje = $mensaje . 'Debe introducir o revisar el Nombre.';
      }

      if (!$this->getPostParam('apellidos')) {
          if (strlen($mensaje) > 1) {
              $mensaje = $mensaje . ', apellidos';
          } else {
              $mensaje = 'Debe introducir o revisar los apellidos';
          }
      }

      if (!$this->getTexto('fechaFin') && $this->getTexto('estadoFinal') == 'REALIZADA') {
          if (strlen($mensaje) > 1) {
              $mensaje = $mensaje . ', fecha de Fin o Estado Final.';
          } else {
              $mensaje = 'Debe introducir o revisar la fecha de Fin o el estado Final.';
          }
      }

      if ($this->getTexto('fechaFin') && $this->getTexto('estadoFinal') == 'PENDIENTE') {
          if (strlen($mensaje) > 1) {
              $mensaje = $mensaje . ', fecha de Fin o Estado Final.';
          } else {
              $mensaje = 'Debe introducir o revisar la fecha de Fin o el estado Final.';
          }
      }

      if (!$this->getTexto('estadoInicial')) {
          if (strlen($mensaje) > 1) {
              $mensaje = $mensaje . ', estadoInicial';
          } else {
              $mensaje = 'Debe introducir o revisar el Estado Inicial';
          }
      }

      if (!$this->getTexto('estadoInicial') && $this->getTexto('estadoFinal') == 'REALIZADA') {
          if (strlen($mensaje) > 1) {
              $mensaje = $mensaje . ', Estado Inicial o Estado Final.';
          } else {
              $mensaje = 'Debe introducir o revisar el Estado Inicial o Estado Final.';
          }
      }

      if (!$this->getTexto('estadoFinal')) {
          if (strlen($mensaje) > 1) {
              $mensaje = $mensaje . ', estadoFinal';
          } else {
              $mensaje = 'Debe introducir o revisar el Estado Final';
          }
      }


      if ($this->getTexto('estadoFinal') == 'REALIZADA' && $this->getTexto('estadoInicial')=='PENDIENTE') {
          if (strlen($mensaje) > 1) {
              $mensaje = $mensaje . ', Los estados Incial y/o final no cumplen los requisitos.';
          } else {
              $mensaje = 'Los estados Incial y/o final no cumplen los requisitos.';
          }
      }

      //Implica que hay texto en la variable
      if (strlen($mensaje) > 1) {
          $this->_view->assign('_error', $mensaje);

          if (!strcmp($pagina, 'editar_migracion')) {
              $this->_view->assign('datos', $this->_migraciones->getMigracion($this->filtrarInt($idMigracion)));
          }
          $this->_view->renderizar($pagina, 'migraciones');
          exit;
      }
  }
}

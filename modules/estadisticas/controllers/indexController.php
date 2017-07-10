<?php

class indexController extends estadisticasController {

  private $_estadistica;

  /**
   * Constructor por defecto de la clase
   */
  public function __construct() {
      parent::__construct();
      Session::tiempo();
      $this->_estadistica = $this->loadModel('indexEstadisticas');
  }

  /**
   * Funcion principal
   */
  public function index() {
      $this->_view->assign('titulo', 'Estadisticas');
      $this->_view->setJs(array('totalesComunidad', 'xepOnline.jqPlugin'));
      $this->_view->assign('resultados', $this->_estadistica->getDatos());
      $this->_view->renderizar('index');
  }

  /*public function get_Datos() {
      echo json_encode($this->_estadistica->getDatos());
  }*/

  public function totales_provincias(){
    $this->_view->assign('titulo', 'Estadisticas');
    $this->_view->setJs(array('totalesProvincia'));
    $this->_view->assign('resultados', $this->_estadistica->getTotalesProvincia());
    $this->_view->assign('comunidades', $this->_estadistica->getComunidades());
    $this->_view->renderizar('totales_provincia', 'estadisticas');
  }

  /**
   * Muestra los totales agrupados por sede
   */
  public function totales_sedes(){
    $this->_view->assign('titulo', 'Estadisticas');
    $this->_view->setJs(array('totalesSede'));
    $this->_view->assign('resultados', $this->_estadistica->getTotalesSede());
    $this->_view->renderizar('totales_sede', 'estadisticas');
  }


}

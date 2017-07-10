<?php

class indexController extends informesController {

  private $_informes;
  private $_meses;
  private $_comunidades;

  /**
  * Constructor por defecto de la clase
  */
  public function __construct() {
    parent::__construct();
    Session::tiempo();
    $this->_informes = $this->loadModel('indexInformes');
    $this->_meses =  ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Juio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
  }

  /**
  * Funcion principal
  */
  public function index() {
    $this->_view->assign('titulo', 'Informes');
    $this->_view->setJs(array('informes'));
    $this->_view->assign('meses', $this->_meses);
    $this->_view->assign('inciAbiertas', $this->_informes->getIncidenciasMeses(" AND activa = '1' AND year = '2016' "));
    $this->_view->renderizar('incidencias');
  }

  public function incidencias_abiertas($mes = false, $estado=false) {
    $condicion = '';

    if ($mes) {
      $condicion .= " AND mes = '$mes' ";
    }

    if ($estado && $estado == 'abiertas'){
      $condicion .= " AND activa = '1' ";
    }else{
      $condicion .= " AND activa = '0' ";
    }
    $this->_view->setJs(array('informes'));
    $this->_view->assign('titulo', 'Informes');
    $this->_view->assign('mes', $this->_meses);
    $this->_view->assign('inciAbiertas', $this->_informes->getIncidenciasMeses($condicion));
    $this->_view->renderizar('incidencias_abiertas', 'informes');
  }

  public function migraciones() {
    $this->_view->setJs(array('migraciones'));
    $this->_view->assign('titulo', 'MigracionesCondi');
    $this->_view->assign('comunidades', $this->_informes->getComunidades());
    $this->_view->assign('provincias', $this->_informes->getProvincias(" AND comunidad = 'Castilla La Mancha '"));
    $this->_view->assign('migraciones', $this->_informes->getMigracionesCerradasFecha(" AND comunidad = 'Castilla La Mancha '"));
    $this->_view->renderizar('migraciones');
  }


  public function paginacionIndex() {
    $condicion = "";
    //$mes = $this->getTexto('mes');
    $year = $this->getTexto('year');
    $estado = $this->getTexto('estado');
    $tipo = $this->getTexto('tipo');


    if($estado == 'abiertas'){
      $condicion.= " AND activa = 1 ";
    }else{
      if($estado == 'cerradas'){
        $condicion.= " AND activa = 0 ";
      }
    }

    if ($year) {
      $condicion .= " AND year = '$year' ";
    }

    if ($tipo) {
      $condicion .= " AND tipo = '$tipo' ";
    }

    $this->_view->setJs(array('informes'));
    //$this->_view->assign('mes', $mes);
    $this->_view->assign('meses', $this->_meses);
    $this->_view->assign('inciAbiertas', $this->_informes->getIncidenciasMeses($condicion));
    $this->_view->renderizar('ajax/incidencias', false, true);
  }

  public function paginacionMigraciones() {
    $condicion = "";
    //$mes = $this->getTexto('mes');
    $comunidad = $this->getTexto('comunidad');

    if ($comunidad) {
      $condicion .= " AND comunidad = '$comunidad' ";
    }

    $this->_view->setJs(array('migraciones'));
    $this->_view->assign('comunidades',  $this->_informes->getComunidades());
    $this->_view->assign('provincias', $this->_informes->getProvincias($condicion));
    $this->_view->assign('migraciones', $this->_informes->getMigracionesCerradasFecha($condicion));
    $this->_view->renderizar('ajax/migraciones', false, true);
  }


  public function paginacionInciAbiertas() {
    $condicion = "";
    $mes = $this->getTexto('mes');
    $year = $this->getTexto('year');

    if ($mes) {
      $condicion .= " AND mes =  '$mes' ";
    }

    if ($year) {
      $condicion .= " AND año = '$year' ";
    }
    $this->_view->setJs(array('informes'));
    $this->_view->assign('mes', $mes);
    $this->_view->assign('inciAbiertas', $this->_informes->getIncidenciasAbiertasFecha($condicion));
    $this->_view->renderizar('ajax/incidencias_abiertas', false, true);
  }

}

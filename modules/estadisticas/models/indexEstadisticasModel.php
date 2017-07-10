<?php

class indexEstadisticasModel extends Model {

  /**
  * Contructor de la clase por defecto
  */
  public function __construct() {
    parent::__construct();
    Session::tiempo();
  }

  public function getDatos() {
    try {
        $auxResult = $this->_db->query("select comunidad, Sum(realizadas) as realizadas, sum(pendientes) as pendientes from informe_migraciones group by comunidad");
        $res = $auxResult->fetchAll();
        return $res;
    } catch (Exception $e) {
      $this->_db->rollBack();
      echo $e->getMessage();
    }
  }

  public function getTotalesProvincia() {
      try {
        $auxResult = $this->_db->query("select comunidad, provincia, Sum(realizadas) as realizadas, Sum(pendientes) as pendientes".
        " FROM informe_migraciones".
        " group by comunidad, provincia".
        " order by comunidad, provincia asc;");
        $res = $auxResult->fetchAll();
        return $res;
    } catch (Exception $e) {
      $this->_db->rollBack();
      echo $e->getMessage();
    }
  }

  public function getTotalesSede() {
      try {
        $auxResult = $this->_db->query("select comunidad, provincia, sede, Sum(realizadas) as realizadas, Sum(pendientes) as pendientes".
        " FROM informe_migraciones".
        " group by comunidad, provincia, sede order by sede");
        $res = $auxResult->fetchAll();
        return $res;
    } catch (Exception $e) {
      $this->_db->rollBack();
      echo $e->getMessage();
    }
  }

  /**
   * Obtiene las comunidades con migraciones cargadas.
   */
  public function getComunidades() {
      $auxComunidades = $this->_db->query("select distinct comunidad from migraciones order by comunidad");
      $comunidades = $auxComunidades->fetchAll();
      return $comunidades;
  }
}

<?php

class indexInformesModel extends Model {

  /**
  * Contructor de la clase por defecto
  */
  public function __construct() {
    parent::__construct();
    Session::tiempo();
  }

  public function getIncidenciasMeses($condicion=false) {
    try {
        $auxResult = $this->_db->query("select year, mes, tecnico, sum(total) as total from incidencias_xmeses where mes !='' $condicion group by mes, tecnico order by total desc;");
        $res = $auxResult->fetchAll();
        return $res;
    } catch (Exception $e) {
      $this->_db->rollBack();
      echo $e->getMessage();
    }
  }

  public function getMigracionesCerradasFecha($condicion=false) {
    try {
        $auxResult = $this->_db->query("select comunidad, provincia, tecnico, Sum(total) as total from migraciones_cerradasxfecha where año > 0 $condicion group by comunidad, provincia, tecnico");
        $res = $auxResult->fetchAll();
        return $res;
    } catch (Exception $e) {
      $this->_db->rollBack();
      echo $e->getMessage();
    }
  }

  public function getProvincias($condicion=false) {
    try {
        $auxResult = $this->_db->query("select distinct provincia from migraciones_cerradasxfecha where año > 0 $condicion order by provincia asc");
        $res = $auxResult->fetchAll();
        return $res;
    } catch (Exception $e) {
      $this->_db->rollBack();
      echo $e->getMessage();
    }
  }

  public function getComunidades($condicion=false) {
    try {
        $auxResult = $this->_db->query("select distinct comunidad from migraciones where estado_inicial ='PENDIENTE' $condicion order by comunidad asc");
        $res = $auxResult->fetchAll();
        return $res;
    } catch (Exception $e) {
      $this->_db->rollBack();
      echo $e->getMessage();
    }
  }

}

<?php

class indexRecursosModel extends Model {

    public function __construct() {
        parent::__construct();
        Session::tiempo();
    }

    /**
     * Devuelve el personal activo del proyecto desde una vista sql
     * @return type array
     */
    public function getRecursos($condicion = false) {
        $recursos = $this->_db->query("Select * from recursos_personal_asignado where idRecurso>0 $condicion");
        return $recursos->fetchall();
    }

    public function getTiposCombo() {
        $recursos = $this->_db->query("Select distinct tipo from recursos order by tipo asc");
        return $recursos->fetchall();
    }

    public function getContador($condicion = false) {
       try {
           $auxRecursos = $this->_db->query("select count(idRecurso) from recursos_personal_asignado where idRecurso >0 $condicion");
           $recu = $auxRecursos->fetch()[0];
           return $recu;
       } catch (Exception $e) {
           $this->_db->rollBack();
           echo $e->getMessage();
       }
    }

    /**
     * Retorna los recursos asignados a un empleado.
     * @param type $empleado
     * @return type
     */
    public function getRecursosEmpleado($empleado) {
        $personal = $this->_db->query("select * from recursos_personal_asignado where idPersonal = '$empleado'");
        return $personal->fetchAll();
    }

    /**
     * Libera los recursos asignados si se elimina el personal
     * al que estaban asociados.
     * @param type $empleado
     * @return type
     */
    public function refrescarRecursos($idPersonal) {
        $this->_db->query("delete from personal_has_recursos WHERE idPersonal='$idPersonal'");
        $this->_db->exec("UPDATE recursos SET activo=0 WHERE idRecurso not in (SELECT idRecurso FROM personal_has_recursos)");
    }

    /**
    * Devuelve los recursos que no estan asignados a nadie.
    * @return type
    */
  public function getRecursosLibres() {
    $personal = $this->_db->query("SELECT idRecurso, tipo, marca, modelo FROM recursos WHERE activo= '0' ORDER BY tipo asc;");
    return $personal->fetchAll();
  }

    /**
     * Devuelve los tipos de recursos dados de alta en el sistema
     * @return type
     */
    public function getTipos() {
        $tipos = $this->_db->query("Select distinct idRecurso, tipo from recursos " .
                "order by tipo asc");
        return $tipos->fetchall();
    }

    /**
     * Devuelve las marcas dadas de alta
     * @return type
     */
    public function getMarcas() {
        $tipos = $this->_db->query("Select Distinct marca from recursos " .
                "order by marca asc");
        return $tipos->fetchall();
    }

    /**
     * Devuelve todos los campos de un recurso
     * @param type $auxIdRecurso
     * @return type single row
     */
    public function getRecurso($auxIdRecurso) {
        $id = (int) $auxIdRecurso;
        $recurso = $this->_db->query("select * from recursos where idRecurso = '$id'");
        return $recurso->fetch();
    }

    /**
     * Insereta un recurso en la BBDD
     * @param type $tipo
     * @param type $marca
     * @param type $modelo
     * @param type $fechaAlta
     */
    public function insertarRecurso($tipo, $marca, $modelo, $numSerie, $fechaAlta) {
        $this->_db->prepare("INSERT INTO recursos (tipo, marca, modelo, num_serie, fecha_alta)".
                " VALUES (:tipo, :marca, :modelo, :num_serie, :fecha_alta)")->execute(
                array(
                    ':tipo' => $tipo,
                    ':marca' => $marca,
                    ':modelo' => $modelo,
                    ':num_serie' => $numSerie,
                    ':fecha_alta' => $fechaAlta
        ));
    }

    /**
     * Modifica una persona dada de alta en el sistema
     * @param type $auxId
     * @param type $nombre
     * @param type $email
     */
    public function editarRecurso($auxIdRecurso, $auxTipo, $auxMarca, $auxModelo, $auxNumSerie, $auxFechaAlta, $auxActivo) {
        $id = (int) $auxIdRecurso;
        $tipo = (String) $auxTipo;
        $marca = (String) $auxMarca;
        $modelo = (String) $auxModelo;
        $numSerie = (String) $auxNumSerie;
        $fechaAlta = (String) $auxFechaAlta;
        $activo = (int) $auxActivo;

        $this->_db->prepare("UPDATE recursos SET tipo = :tipo, marca = :marca, modelo = :modelo, num_serie = :num_serie, fecha_alta = :fecha_alta, activo = :activo " .
                        "WHERE idRecurso = :idRecurso")
                ->execute(
                        array(
                            ':idRecurso' => $id,
                            ':tipo' => $tipo,
                            ':marca' => $marca,
                            ':modelo' => $modelo,
                            ':num_serie' => $numSerie,
                            ':fecha_alta' => $fechaAlta,
                            ':activo' => $activo
        ));
    }

    /**
     * Da de baja una persona y libera los recursos asociados a ella
     * Dar de baja implica dejar el usuario inactivo.
     * @param type $auxId
     * @param type $auxIdCargo
     */
    public function eliminarRecurso($auxIdRecurso) {
        $id = (int) $auxIdRecurso;
        $this->_db->query("delete from recursos WHERE idRecurso = $id");
        $this->_db->query("delete from personal_has_recursos WHERE idRecurso='$id'");
    }

    public function asignarRecursoLibre($auxIdPersonal, array $ids) {
      try {
        $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->_db->beginTransaction();
        $idPersonal = (int) $auxIdPersonal;

        foreach ($ids as $id) {
          $this->_db->exec("UPDATE recursos SET activo='1' WHERE idRecurso = '$id'");
          $this->_db->prepare("INSERT INTO personal_has_recursos (idPersonal, idRecurso)" .
          " VALUES (:idPersonal, :idRecurso)")->execute(
          array(
            ':idPersonal' => $idPersonal,
            ':idRecurso' => $id
          ));
          $this->asignarFechaRecurso($id);
        }
        $this->_db->commit();
      } catch (Exception $e) {
        $this->_db->rollBack();
        echo $e->getMessage();
      }
    }

    public function asignarFechaRecurso($id){
      $fecha = date('Y/m/d');
      $this->_db->prepare("UPDATE recursos SET fecha_asignacion = :fechaAsignacion WHERE idRecurso = :idRecurso")
      ->execute(
      array(
        ':idRecurso' => $id,
        ':fechaAsignacion' => $fecha
      ));
    }

    public function eliminarRecursoAsignado($auxIdPersonal, $auxIdRecurso) {
      $idPersonal = (int) $auxIdPersonal;
      $idRecurso = (int) $auxIdRecurso;
      //TODO Poner en activo los recursos que estaban asociados a ella
      $this->_db->query("DELETE from personal_has_recursos WHERE idPersonal = $idPersonal and idRecurso = $idRecurso");
      $this->_db->query("UPDATE recursos SET activo='0' WHERE idRecurso = $idRecurso");
      $this->eliminarFechaRecurso($idRecurso);
    }

    public function eliminarFechaRecurso($id){
      $this->_db->prepare("UPDATE recursos SET fecha_asignacion = :fechaAsignacion WHERE idRecurso = :idRecurso")
      ->execute(
      array(
        ':idRecurso' => $id,
        ':fechaAsignacion' => ""
      ));
    }

}

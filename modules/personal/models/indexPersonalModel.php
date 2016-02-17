<?php

class indexPersonalModel extends Model {

    public function __construct() {
        parent::__construct();
        Session::tiempo();
    }

    /**
     * Devuelve el personal activo del proyecto desde una vista sql
     * @return type array
     */
    public function getPersonal() {
        $personal = $this->_db->query("Select * from detalle_persona " .
                "order by idCargo, cargo, nombre asc");
        return $personal->fetchall();
    }

    public function getPersonalFiltro($condicion = false) {
        $personal = $this->_db->query("Select * from detalle_persona where activo != 2 $condicion order by idCargo, nombre asc");
        return $personal->fetchall();
    }
    
     public function getIdCargo($idPersonal) {
        $personal = $this->_db->query("Select idCargo from detalle_persona where idPersonal = $idPersonal " .
                "order by idCargo, cargo, nombre asc");
        return $personal->fetchall();
    }

    /**
     * Retorna los recursos asignados a un empleado.
     * @param type $empleado
     * @return type
     */
    public function getRecursosEmpleado($empleado) {
        $personal = $this->_db->query("select * from recursos_personal where idPersonal = '$empleado'");
        return $personal->fetchAll();
    }

    /**
     * Devuelve los cargos activos en el proyecto
     * @return type array
     */
    public function getCargos($activo) {
        $cargos = $this->_db->query("select * from cargos where activo='$activo'");
        return $cargos->fetchAll();
    }

    /**
     * Devuelve todos los registros de una persona incluyendo la descripcion del cargo
     * @param type $auxId
     * @return type single row
     */
    public function getPersona($auxId) {
        $id = (int) $auxId;
        $personal = $this->_db->query("Select idPersonal, nombre, idCargo, (select descripcion from cargos" .
                " where cargos.idCargo = p.idCargo ) cargo, email, fecha_Incorporacion, usuario, pass, activo " .
                "from personal p where idPersonal = '$id'");
        return $personal->fetch();
    }

    /**
     * Inserta una nueva persona en el proyecto
     * Usuario activo por defecto
     * @param type $idCargo
     * @param type $nombre
     * @param type $email
     * @param type $fechaIn
     * @param type $usuario
     * @param type $pass
     * @param type $imagen
     * 
     */
    public function insertarPersona($idCargo, $nombre, $email, $fechaIn, $usuario, $pass, $imagen = false) {

        $this->_db->prepare("INSERT INTO personal (idCargo, nombre, email, fecha_Incorporacion, activo, usuario, " .
                "pass, imagen) VALUES (:idCargo, :nombre, :email, :fecha_Incorporacion, :activo, :usuario, :pass, " .
                ":imagen)")->execute(
                array(
                    ':idCargo' => $idCargo,
                    ':nombre' => $nombre,
                    ':email' => $email,
                    ':fecha_Incorporacion' => $fechaIn,
                    ':activo' => 1,
                    ':usuario' => $usuario,
                    ':pass' => Hash::getHash('md5', $pass, HASH_KEY),
                    ':imagen' => $imagen
        ));
    }

    /**
     * Modifica una persona dada de alta en el sistema 
     * @param type $auxId
     * @param type $nombre
     * @param type $email
     */
    public function editarPersonal($auxId, $auxIdCargo, $nombre, $fechaIn, $email, $usuario, $auxActivo) {
        $id = (int) $auxId;
        $idCargo = (int) $auxIdCargo;
        $activo = (int) $auxActivo;                                   
        
        $this->_db->prepare("UPDATE personal SET idCargo = :idCargo, nombre = :nombre, email = :email, fecha_Incorporacion = :fechaIn, usuario = :usuario, activo = :activo  WHERE idPersonal = :idPersonal")
                ->execute(
                        array(
                            ':idPersonal' => $id,
                            ':idCargo' => $idCargo,
                            ':nombre' => $nombre,
                            ':fechaIn' => $fechaIn,    
                            ':email' => $email,
                            ':usuario' => $usuario,
                            ':activo' => $activo
        ));
    }

    /**
     * Da de baja una persona y libera los recursos asociados a ella
     * Dar de baja implica dejar el usuario inactivo.
     * @param type $auxId
     * @param type $auxIdCargo
     */
    public function eliminarPersonal($auxId, $auxIdCargo) {
        $id = (int) $auxId;
        $idCargo = (int) $auxIdCargo;
        //TODO Poner en activo los recursos que estaban asociados a ella
        //$this->_db->query("DELETE FROM personal_has_recursos WHERE idPersonal = $id");
        $this->_db->query("UPDATE personal SET activo='0' WHERE idPersonal = $id and idCargo = $idCargo");
    }

    /**
     * Devuelve los recursos que no estan asignados a nadie.
     * @return type
     */
    public function getRecursosLibres() {
        $personal = $this->_db->query("SELECT idRecurso, tipo, marca, modelo FROM recursos WHERE idRecurso NOT IN" .
                "(SELECT idRecurso FROM recursos_personal) ORDER BY tipo asc;");
        return $personal->fetchAll();
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
                            ':idRecurso' => $id,
                ));
            }
            $this->_db->commit();
        } catch (Exception $e) {
            $this->_db->rollBack();
            echo $e->getMessage();
        }
    }

    public function eliminarRecursoAsignado($auxIdPersonal, $auxIdRecurso) {
        $idPersonal = (int) $auxIdPersonal;
        $idRecurso = (int) $auxIdRecurso;
        //TODO Poner en activo los recursos que estaban asociados a ella       
        $this->_db->query("DELETE from personal_has_recursos WHERE idPersonal = $idPersonal and idRecurso = $idRecurso");
        $this->_db->query("UPDATE recursos SET activo='0' WHERE idRecurso = $idRecurso");
    }

}

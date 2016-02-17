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
     * Devuelve los tipos de recursos dados de alta en el sistema
     * @return type
     */
    public function getTipos() {
        $tipos = $this->_db->query("Select Distinct idRecurso, tipo from recursos " .
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
        $recurso = $this->_db->query("Select * from recursos r where idRecurso = '$id'");
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
        $this->_db->query("UPDATE recursos SET activo='1' WHERE idRecurso = $id");
        $this->_db->query("DELETE FROM personal_has_recursos WHERE idRecurso='$id'");
    }

}

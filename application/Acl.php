<?php

class ACL {

    private $_db; //Objeto Base de datos
    private $_idPersonal; //Id del usuario a la que se aplica la ACL
    private $_idCargo; //Cargo con el que se trabaja
    private $_permisos; //Permisos procesados del cargo

    /**
     * 
     * @param type $idPersona
     */

    public function __construct($idPersona = false) {
        if ($idPersona) {
            $this->_idPersonal = (int) $idPersona;
        } else {
            if (Session::get('id_usuario')) {
                $this->_idPersonal = Session::get('id_usuario');
            } else {
                $this->_idPersonal = 0;
            }
        }

        $this->_db = new Database();
        $this->_idCargo = $this->getIdCargo();               
    }

    /**
     * Carga los permisos asociados al id de Cargo logeado
     */
    public function compilarAcl() {
        $this->_permisos = $this->getPermisosCargo();
    }

    /**
     * Obtiene el id del Cargo asociado al personal
     */
    public function getIdCargo() {
        $auxPersonal = $this->_db->query(
                "select idCargo from personal " .
                "where idPersonal = {$this->_idPersonal}"
        );

        $personal = $auxPersonal->fetch();
        return $personal['idCargo'];
    }

    /**
     * Devuelve todos los permisos con su estado de cada cargo
     * @param type $idCargo
     * @param type $idPersonal
     * @return type array()
     */
    public function getPermisosCargo() {

        $auxPermisos = $this->_db->query("select * from permisos_cargo where idCargo = $this->_idCargo");
        $permisos = $auxPermisos->fetchAll(PDO::FETCH_ASSOC);
               
        for ($i = 0; $i < count($permisos); $i++) {
            $llave=$permisos[$i]['llave'];
            $auxData[$llave] = $permisos[$i];
        }               
        
        $data = $auxData;                
        return $data;
    }

    /**
     * Valida el estado de la llave asociada al usuario logeado
     * @param type $key
     * @return boolean
     */
     public function permiso($key) {                                               
        if (array_key_exists($key, $this->_permisos)) {        
            if ($this->_permisos[$key]['valor'] == true || $this->_permisos[$key]['valor'] == 1) {
                return true;
            }
        }

        return false;
    }
    
    public function acceso($key) {        
        Session::tiempo();
        $this->compilarAcl();        
        if ($this->permiso($key)) {
            return;
        }
        header("location:" . BASE_URL . "error/access/5050");
    }
}
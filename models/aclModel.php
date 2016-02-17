<?php

class aclModel extends Model {

    /**
     * Contructor de la clase por defecto
     */
    public function __construct() {
        parent::__construct();
        Session::tiempo();
    }

    /**
     * Devuelve el ID de cargo asociado a un ID de personal
     * @param type $idCargo
     * @return type
     */
    public function getCargo($idCargo) {
        $cargo = $this->_db->query("select idCargo, descripcion as cargo, activo from cargos where idCargo=$idCargo");
        return $cargo->fetch();
    }

    /**
     * Devuelve todos los cargos dados de alta en el sistema
     * @return type sql
     */
    public function getCargos() {
        $role = $this->_db->query("select * from cargos");
        return $role->fetchAll();
    }

    /**
     * Intserta un nuevo cargo dentro del proyecto
     * @param type $cargo
     */
    public function insertarCargo($cargo) {
        $this->_db->query(
                "INSERT INTO cargos VALUES" .
                "(null, '{$cargo}', 1)"
        );
                
        $auxUltimoP = $this->_db->query("select MAX(idPermiso) from permisos");
        $ultimoP = $auxUltimoP->fetch();
        $auxUltimoC = $this->_db->query("select MAX(idCargo) from cargos");
        $ultimoC = $auxUltimoC->fetch();     
        
        for ($i = 1; $i <= $ultimoP[0]; $i++) {
            $this->_db->query(
                    "INSERT INTO permisos_has_cargos (idCargo, idPermiso) VALUES" .
                    "('$ultimoC[0]', '$i')"
            );
        }                                
    }

    public function eliminarCargo($idCargo) {
        $this->_db->query("delete from cargos " .
                "where idCargo=$idCargo");
        $this->_db->query("delete from permisos_has_cargos " .
                "where idCargo=$idCargo");
    }

    public function editarCargo($auxIdCargo, $auxCargo, $auxActivo) {
        $idCargo = (int) $auxIdCargo;
        $cargo = $auxCargo;
        $activo = (int) $auxActivo;

        $this->_db->prepare("UPDATE cargos SET descripcion = :cargo, activo = :activo WHERE idCargo = :idCargo")
                ->execute(
                        array(
                            ':idCargo' => $idCargo,
                            ':cargo' => $cargo,
                            ':activo' => $activo
        ));
    }

    public function editarPermiso($auxIdPermiso, $permiso, $llave) {
        $idPermiso = (int) $auxIdPermiso;

        $this->_db->prepare("UPDATE permisos SET permiso = :permiso, llave = :llave WHERE idPermiso = :idPermiso")
                ->execute(
                        array(
                            ':idPermiso' => $idPermiso,
                            ':permiso' => $permiso,
                            ':llave' => $llave
        ));
    }

    /**
     * Devuelve todos los permisos con su estado de cada cargo
     * @param type $idCargo
     * @param type $idPersonal
     * @return type array()
     */
    public function getPermisosCargo($idCargo) {

        $auxPermisos = $this->_db->query("select * from permisos_cargo where idCargo = $idCargo");
        $permisos = $auxPermisos->fetchAll(PDO::FETCH_ASSOC);

        for ($i = 0; $i < count($permisos); $i++) {
            $llave = $permisos[$i]['llave'];

            $auxData[$llave] = array(
                'idCargo' => $permisos[$i]['idCargo'],
                'cargo' => $permisos[$i]['cargo'],
                'llave' => $permisos[$i]['llave'],
                'permiso' => $permisos[$i]['permiso'],
                'valor' => $permisos[$i]['valor'],
            );
        }
        $todos = $this->getPermisosAll();
        $data = array_merge($todos, $auxData);
        return $data;
    }

    /**
     * Elimina un permiso del sistema
     * @param type $idCargo
     * @param type $idPermiso
     */
    public function eliminarPermisoCargo($idCargo) {
        $this->_db->query("delete from permisos_has_cargo " .
                "where idCargo=$idCargo");
    }

    /**
     * Elimina un permiso de la tabla permisos     
     * @param type $idPermiso
     */
    public function eliminarPermiso($idPermiso) {                       
         $this->_db->query("delete from permisos_has_cargos " .
                "where idPermiso=$idPermiso");
        $this->_db->query("delete from permisos " .
                "where idPermiso=$idPermiso");       
    }

    public function getPermisoId($auxPermiso) {
        $permiso = (String) $auxPermiso;

        $key = $this->_db->query(
                "SELECT idPermiso FROM permisos WHERE llave = '$permiso'"
        );
        return $key->fetch();
    }

    /**
     * Edita un permiso de un cargo en su estado (1 o 0)
     * @param type $idCargo
     * @param type $permiso
     * @param type $valor
     */
    public function editarPermisoCargo($idCargo, $permiso, $valor) {
        $idPermiso = $this->getPermisoId($permiso);

        $this->_db->prepare("UPDATE permisos_has_cargos SET valor = :valor WHERE idCargo = :idCargo and idPermiso = :idPermiso")
                ->execute(
                        array(
                            ':idPermiso' => $idPermiso[0],
                            ':idCargo' => $idCargo,
                            ':valor' => $valor
        ));
    }

    /**
     * Intserta un nuevo permiso para gestionar un area
     * @param type $permiso
     * @param type $llave
     */
    public function insertarPermiso($permiso, $llave) {
        $this->_db->query(
                "INSERT INTO permisos (permiso, llave) VALUES" .
                "('$permiso', '$llave')"
        );

        $auxUltimoP = $this->_db->query("select MAX(idPermiso) from permisos");
        $ultimoP = $auxUltimoP->fetch();
        $auxUltimoC = $this->_db->query("select MAX(idCargo) from cargos");
        $ultimoC = $auxUltimoC->fetch();

        for ($i = 1; $i <= $ultimoC[0]; $i++) {
            $this->_db->query(
                    "INSERT INTO permisos_has_cargos (idCargo, idPermiso) VALUES" .
                    "('$i', '$ultimoP[0]]')"
            );
        }
    }

    /**
     * Devuelve todos los permisos dados de alta en el sistema
     * @return type
     */
    public function getPermisos() {
        $permisos = $this->_db->query("SELECT * FROM permisos");

        return $permisos->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Devuelve todos los permisos dados de alta en el sistema
     * @return type
     */
    public function getPermiso($idPermiso) {
        $permisos = $this->_db->query("SELECT * FROM permisos WHERE idPermiso = '$idPermiso'");

        return $permisos->fetch();
    }

    /**
     *  Obtiene todos los permisos preformateados en un array
     * @return string
     */
    public function getPermisosAll() {
        $auxPermisos = $this->_db->query(
                "SELECT * FROM permisos"
        );

        $permisos = $auxPermisos->fetchAll(PDO::FETCH_ASSOC);

        for ($i = 0; $i < count($permisos); $i++) {
            $data[$permisos[$i]['llave']] = array(
                'llave' => $permisos[$i]['llave'],
                'valor' => 'x',
                'nombre' => $permisos[$i]['permiso'],
                'id' => $permisos[$i]['idPermiso']
            );
        }
        return $data;
    }
}

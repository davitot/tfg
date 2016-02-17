<?php

class indexLogModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function getUsuario($usuario, $password)
    {
        $datos = $this->_db->query(
                "select * from personal " .
                "where usuario = '$usuario' " .
                "and pass='" . Hash::getHash('md5', $password, HASH_KEY) . "'"
        );
                      
        return $datos->fetch();
    }
}


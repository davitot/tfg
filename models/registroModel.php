<?php

class registroModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function verificarUsuario($usuario)
    {
        $id = $this->_db->query(
                "select idPersonal from personal where usuario = '$usuario'"
                );                
        return $id->fetch();
    }
    
    public function verificarEmail($email)
    {
        $id = $this->_db->query(
                "select idPersonal from personal where email = '$email'"
                );
        
        if($id->fetch()){
            return true;
        }        
        return false;
    }
    
    public function registrarUsuario($nombre, $usuario, $password, $email)
    {
    	$random = rand(1782598471, 9999999999);
		
        $this->_db->prepare(
                "insert into personal values" .
                "(null, :nombre, :usuario, :password, :email, 'usuario', 0, now(), :codigo)"
                )
                ->execute(array(
                    ':nombre' => $nombre,
                    ':usuario' => $usuario,
                    ':password' => Hash::getHash('md5', $password, HASH_KEY),
                    ':email' => $email,
                    ':codigo' => $random
                ));
    }
    
    public function getUsuario($id)
	{
		$usuario = $this->_db->query(
					"select * from personal where idPersonal = $id"
					);
					
		return $usuario->fetch();
	}
	
	public function activarUsuario($id, $codigo)
	{
		$this->_db->query(
					"update personal set estado = 1 " .
					"where idPersonal = '$id'"
					);
	}
}


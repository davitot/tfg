<?php

class Persona {

  private $idPersonal;
  private $idCargo;
  private $nombre;
  private $email;
  private $fecha_Incorporacion;
  private $usuario;
  private $pass;
  private $imagen;
  private $activo;

  public function __construct($idCargo=null, $nombre=null, $fecha_Incorporacion=null, $email=null, $usuario=null, $pass=null, $activo=null, $imagen=null) {
    $this->idPersonal = null;
    $this->idCargo = $idCargo;
    $this->nombre = $nombre;
    $this->email = $email;
    $this->fecha_Incorporacion = $fecha_Incorporacion;
    $this->usuario = $usuario;
    $this->pass = $pass;
    $this->activo = $activo;
    $this->imagen = $imagen;
  }

  /**
  * Elimina el objeto de memoria
  */
  public function __destruct() {}

  public function getPersona(){
    return $this;
  }

  public function getidPersonal(){
    return $this->idPersonal;
  }

  public function getidCargo(){
    return $this->idCargo;
  }

  public function getNombre(){
    return $this->nombre;
  }

  public function getEmail(){
    return $this->email;
  }

  public function getFecha_Incorporacion(){
    return $this->fecha_Incorporacion;
  }

  public function getUsuario(){
    return $this->usuario;
  }

  public function getPass(){
    return $this->pass;
  }

  public function getImagen(){
    return $this->imagen;
  }

  public function isActivo(){
    return $this->activo;
  }

  public function setidPersonal($idPersonal){
    $this->idPersonal = $idPersonal;
  }

  public function setidCargo($idCargo){
    $this->idCargo = $idCargo;
  }

  public function setNombre($nombre){
    $this->nombre = $nombre;
  }

  public function setEmail($email){
    $this->email = $email;
  }

  public function setFecha_Incorporacion($fecha_Incorporacion){
    $$his->fecha_Incorporacion = $fecha_Incorporacion;
  }

  public function setUsuario($usuario){
    $this->usuario = $usuario;
  }

  public function setPass($pass){
    $this->pass = $pass;
  }

  public function setImagen($imagen){
    $this->imagen = $imagen;
  }

  public function setActivo(){
    $this->activo = 1;
  }
}

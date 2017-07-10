<?php

class Migracion {

  private $idMigracion;
  private $idTecnico;
  private $idTarea;
  private $nif;
  private $nombre;
  private $apellidos;
  private $cargo;
  private $organo;
  private $comunidad;
  private $provincia;
  private $desc_sede;
  private $servidorNotes;
  private $password;
  private $idLotus;
  private $correoNotes;
  private $fecha_Planificada;
  private $fecha_Inicio;
  private $fecha_Fin;
  private $estado_inicial;
  private $estado_final;
  private $observaciones;
  private $incidencia;

  /**
  * Constructor de la clase
  */
  public function __construct($idMigracion, $idTecnico, $idTarea, $nif, $nombre, $apellidos, $cargo, $organo, $comunidad, $provincia, $desc_sede, $servidorNotes, $password, $idLotus, $correoNotes, $fecha_Planificada, $fecha_Inicio, $fecha_Fin, $estado_inicial, $estado_final, $observaciones, $incidencia) {
      $this->idMigracion = $idMigracion;
      $this->idTecnico = $idTecnico;
      $this->idTarea = $idTarea;
      $this->nif = $nif;
      $this->nombre = $nombre;
      $this->apellidos = $apellidos;
      $this->cargo = $cargo;
      $this->organo = $organo;
      $this->comunidad = $comunidad;
      $this->provincia = $provincia;
      $this->desc_sede = $desc_sede;
      $this->servidorNotes = $servidorNotes;
      $this->password = $password;
      $this->idLotus = $idLotus;
      $this->correoNotes = $correoNotes;
      $this->fecha_Planificada = $fecha_Planificada;
      $this->fecha_Inicio = $fecha_Inicio;
      $this->fecha_Fin = $fecha_Fin;
      $this->estado_inicial = $estado_inicial;
      $this->estado_final = $estado_final;
      $this->observaciones = $observaciones;
      $this->incidencia = $incidencia;
  }

  /**
  * Elimina el objeto de memoria
  */
  public function __destruct() {}

  function getIdMigracion() {
      return $this->idMigracion;
  }

  function getIdTecnico() {
      return $this->idTecnico;
  }

  function getIdTarea() {
      return $this->idTarea;
  }

  function getNif() {
      return $this->nif;
  }

  function getNombre() {
      return $this->nombre;
  }

  function getApellidos() {
      return $this->apellidos;
  }

  function getCargo() {
      return $this->cargo;
  }

  function getOrgano() {
      return $this->organo;
  }

  function getComunidad() {
      return $this->comunidad;
  }

  function getProvincia() {
      return $this->provincia;
  }

  function getDesc_sede() {
      return $this->desc_sede;
  }

  function getServidorNotes() {
      return $this->servidorNotes;
  }

  function getPassword() {
      return $this->password;
  }

  function getIdLotus() {
      return $this->idLotus;
  }

  function getCorreoNotes() {
      return $this->correoNotes;
  }

  function getFecha_Planificada() {
      return $this->fecha_Planificada;
  }

  function getFecha_Inicio() {
      return $this->fecha_Inicio;
  }

  function getFecha_Fin() {
      return $this->fecha_Fin;
  }

  function getEstado_inicial() {
      return $this->estado_inicial;
  }

  function getEstado_final() {
      return $this->estado_final;
  }

  function getObservaciones() {
      return $this->observaciones;
  }

  function getIncidencia() {
      return $this->incidencia;
  }

  function setIdMigracion($idMigracion) {
      $this->idMigracion = $idMigracion;
  }

  function setIdTecnico($idTecnico) {
      $this->idTecnico = $idTecnico;
  }

  function setIdTarea($idTarea) {
      $this->idTarea = $idTarea;
  }

  function setNif($nif) {
      $this->nif = $nif;
  }

  function setNombre($nombre) {
      $this->nombre = $nombre;
  }

  function setApellidos($apellidos) {
      $this->apellidos = $apellidos;
  }

  function setCargo($cargo) {
      $this->cargo = $cargo;
  }

  function setOrgano($organo) {
      $this->organo = $organo;
  }

  function setComunidad($comunidad) {
      $this->comunidad = $comunidad;
  }

  function setProvincia($provincia) {
      $this->provincia = $provincia;
  }

  function setDesc_sede($desc_sede) {
      $this->desc_sede = $desc_sede;
  }

  function setServidorNotes($servidorNotes) {
      $this->servidorNotes = $servidorNotes;
  }

  function setPassword($password) {
      $this->password = $password;
  }

  function setIdLotus($idLotus) {
      $this->idLotus = $idLotus;
  }

  function setCorreoNotes($correoNotes) {
      $this->correoNotes = $correoNotes;
  }

  function setFecha_Planificada($fecha_Planificada) {
      $this->fecha_Planificada = $fecha_Planificada;
  }

  function setFecha_Inicio($fecha_Inicio) {
      $this->fecha_Inicio = $fecha_Inicio;
  }

  function setFecha_Fin($fecha_Fin) {
      $this->fecha_Fin = $fecha_Fin;
  }

  function setEstado_inicial($estado_inicial) {
      $this->estado_inicial = $estado_inicial;
  }

  function setEstado_final($estado_final) {
      $this->estado_final = $estado_final;
  }

  function setObservaciones($observaciones) {
      $this->observaciones = $observaciones;
  }

  function setIncidencia($incidencia) {
      $this->incidencia = $incidencia;
  }

}

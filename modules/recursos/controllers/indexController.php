<?php

class indexController extends recursosController {

  private $_recurso;

  /**
  * Constructor por defecto de la clase
  */
  public function __construct() {
    parent::__construct();
    Session::tiempo();
    $this->_recurso = $this->loadModel('indexRecursos');
  }

  /**
  *
  * @param type $pagina
  */
  public function index($pagina=false) {
    $this->_acl->acceso('gestionar_recursos');

    if (!$this->filtrarInt($pagina)) {
      // $pagina = false;
    } else {
      $pagina = (int) $pagina;
    }

    $this->getLibrary('paginador');
    $paginador = new Paginador();
    $this->_view->setJs(array('recursos'));

    $this->_view->assign('titulo', 'Gestion de recursos');
    if (!Session::get('autenticado')) {
      $this->redireccionar('login');
    } else {
      $this->_view->assign('contador', $this->_recurso->getContador());
      $this->_view->assign('tipos', $this->_recurso->getTiposCombo());
      $this->_view->assign('marcas', $this->_recurso->getMarcas());
      $this->_view->assign('recursos', $paginador->paginar($this->_recurso->getRecursos(), $pagina, 8));
      $this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
      //Mostramos la vista index
      $this->_view->renderizar('index');
    }
  }

  public function paginacionAjax() {
    $pagina = $this->getInt('pagina');
    $condicion = "";
    $nombre = $this->getTexto('nombre');
    $tipo = $this->getTexto('tipoRecurso');
    $marca = $this->getTexto('marca');

    if ($nombre) {
      $condicion .= " AND num_serie liKe '%$nombre%' ";
    }
    if ($tipo && strcmp('-- Tipo --', $tipo) != 0) {
      $condicion .= " AND tipo =  '$tipo' ";
    }
    if ($marca && strcmp('-- Marca --', $marca) != 0) {
      $condicion .= " AND marca = '$marca'";
    }
    $this->getLibrary('paginador');
    $paginador = new Paginador();

    $this->_view->setJs(array('recursos'));
    $this->_view->assign('contador', $this->_recurso->getContador($condicion));
    $this->_view->assign('recursos', $paginador->paginar($this->_recurso->getRecursos($condicion), $pagina,8));
    $this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
    $this->_view->renderizar('ajax/index', false, true);
  }

  /**
  *  Da de alta un nuevo recursos en el proyecto
  */
  public function nuevo_recurso() {
    $this->_acl->acceso('gestionar_recursos');
    $this->_view->assign('titulo', 'Nuevo Recurso');
    $this->_view->setJs(array('recursos','validator'));

    if ($this->getInt('guardar') == 1) {
      $this->_view->assign('datos', $_POST);
      //TODO verificar si el recurso existe
      $this->_recurso->insertarRecurso($this->getTexto('tipo'), $this->getTexto('marca'), $this->getTexto('modelo'), $this->getTexto('num_serie'), $this->getTexto('fecha_alta'));
      $this->redireccionar('recursos');
    }else{
      $this->_view->renderizar('nuevo_recurso', 'recursos');
    }
  }

  /**
  * Edita un recursos dado de alta en el sistema
  * @param type $idRecurso
  */
  public function editar_recurso($idRecurso) {
    $this->_acl->acceso('gestionar_recursos');
    $this->_view->setJs(array('recursos','validator'));
    $this->_view->assign('titulo', 'Editar recurso');

    if (!$this->filtrarInt($idRecurso)) {
      $this->redireccionar('recursos');
    }

    if (!$this->_recurso->getRecurso($this->filtrarInt($idRecurso))) {
      $this->redireccionar('recursos');
    }

    if ($this->getInt('guardar') == 1) {
      $this->_view->assign('datos', $_POST);
      $this->_recurso->editarRecurso(
      $this->filtrarInt($idRecurso), $this->getPostParam('tipo'), $this->getPostParam('marca'), $this->getPostParam('modelo'), $this->getPostParam('num_serie'), $this->getPostParam('fecha_alta'), $this->getPostParam('activo')
    );
    $this->redireccionar('recursos');
  }
  $this->_view->assign('datos', $this->_recurso->getRecurso($this->filtrarInt($idRecurso)));
  $this->_view->renderizar('editar_recurso', 'recursos');
}

/**
* Elimina un recursos liberando los recursos asociados a el
* @param type $idRecurso
* @param type $idCargo
*/
public function eliminar_recurso($idRecurso) {
  //Session::acceso('Jefe de proyecto') || Session::acceso('Jefe de equipo');
  $this->_acl->acceso('gestionar_recursos');

  //Validamos que las variables sean accesibles
  if (!$this->filtrarInt($idRecurso)) {
    $this->redireccionar('recursos');
  }

  //Validamos que el recurso exista
  if (!$this->_recurso->getRecurso($this->filtrarInt($idRecurso))) {
    $this->redireccionar('recursos');
  }

  //Llamamos a la funcion eliminar
  $this->_recurso->eliminarRecurso($this->filtrarInt($idRecurso));
  //cargamos la vista recursos
  $this->redireccionar('recursos');
}

}

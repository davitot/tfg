<?php

class indexController extends Controller {

    private $_tarea;
    private $_personal;
    private $_recursos;

    public function __construct() {
        parent::__construct();
        $this->_tarea = $this->loadModel('indexTareas','tareas');
          $this->_personal = $this->loadModel('indexPersonal','personal');
          $this->_recursos = $this->loadModel('indexRecursos','recursos');
    }

    public function index() {
        $this->_view->assign('titulo', 'MigraGest');
        if (!Session::get('autenticado')) {
            $this->redireccionar('login');
        } else {
          $this->_view->assign('tareas', $this->_tarea->getTareasTecnico(Session::get('id_usuario'), Session::get('level')));
          $this->_view->assign('recursos', $this->_recursos->getRecursosEmpleado(Session::get('id_usuario')));
          $this->_view->renderizar('index');
        }
    }
}

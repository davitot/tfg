<?php

class indexController extends Controller {

    private $_tarea;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->_view->assign('titulo', 'MigraGest');
        if (!Session::get('autenticado')) {
            $this->redireccionar('login');
        } else {
            $this->_view->setJs(array('index'));
            $this->_tarea = $this->loadModel('indexTareas','tareas');
            $this->_view->assign('tareas', $this->_tarea->getTareasTecnico(Session::get('id_usuario'), Session::get('level')));
            $this->_view->renderizar('index', 'inicio');
        }
    }
}

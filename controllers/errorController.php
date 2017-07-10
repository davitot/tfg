<?php

class errorController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->_view->assign('titulo', 'Error');
        $this->_view->assign('mensaje', $this->_getError());
        $this->_view->renderizar('index');
    }

    public function access($codigo) {
        $this->_view->assign('titulo', 'Error');
        $this->_view->assign('mensaje', $this->_getError($codigo));
        $this->_view->renderizar('access');
    }

    private function _getError($codigo = false) {
        if ($codigo) {
            $codigo = $this->filtrarInt($codigo);
            if (is_int($codigo)) {
                $codigo = $codigo;
            }
        } else {
            $codigo = 'default';
        }

        $error['default'] = 'Ha ocurrido un error y la página no puede mostrarse';
        $error['5050'] = '!Acceso restringido! <br>'
                . '<br><br> Contacte con el administrador o Jefe de Proyecto';
        $error['8080'] = 'Tiempo de la sesion agotado o no iniciada <br><br><br> Inicie sesion de nuevo.';
        $error['408'] = 'No ha iniciado sesión.';

        if (array_key_exists($codigo, $error)) {
            return $error[$codigo];
        } else {
            return $error['default'];
        }
    }

}
<?php

class indexController extends loginController
{
    private $_login;

    public function __construct(){
        parent::__construct();
        $this->_login = $this->loadModel('indexLog');
    }

    public function index()
    {
        if(Session::get('autenticado')){
            $this->redireccionar();
        }

        $this->_view->assign('titulo', 'Iniciar Sesion');

        if($this->getInt('enviar') == 1){
            $this->_view->assign('datos', $_POST);
            $row = $this->_login->getUsuario(
                    $this->getAlphaNum('usuario'),
                    $this->getSql('pass')
                    );

            if(!$row){
                $this->_view->assign('_error', 'Usuario y/o password incorrectos');
                $this->_view->renderizar('index','login');
                exit;
            }

            if($row['activo'] != 1){
                $this->_view->assign('_error', 'Este usuario no esta habilitado');
                $this->_view->renderizar('index','login');
                exit;
            }

            Session::set('autenticado', true);
            Session::set('level', $row['idCargo']);
            Session::set('usuario', $row['usuario']);
            Session::set('id_usuario', $row['idPersonal']);
            Session::set('imagen', $row['imagen']);
            Session::set('tiempo', time());
            $this->redireccionar('');
        }
        $this->_view->renderizar('index','login');
    }

    public function cerrar()
    {
        Session::destroy();
        $this->redireccionar();
    }
}

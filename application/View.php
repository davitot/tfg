<?php

require_once ROOT . 'libs' . DS . 'smarty' . DS . 'libs' . DS . 'Smarty.class.php';

class View extends Smarty {

    private $_request;
    private $_js;
    private $_acl;
    private $_rutas;
    private $_jsPlugin;

    public function __construct(Request $peticion, ACL $_acl) {
        parent::__construct();
        $this->_request = $peticion;
        $this->_js = array();
        $this->_acl = $_acl;
        $this->_rutas = array();
        $this->_jsPlugin = array();

        $modulo = $this->_request->getModulo();
        $controlador = $this->_request->getControlador();

        if ($modulo) {
            $this->_rutas['view'] = ROOT . 'modules' . DS . $modulo . DS . 'views' . DS . $controlador . DS;
            $this->_rutas['js'] = BASE_URL . 'modules/' . $modulo . '/views/' . $controlador . '/js/';
        } else {
            $this->_rutas['view'] = ROOT . 'views' . DS . $controlador . DS;
            $this->_rutas['js'] = BASE_URL . 'views/' . $controlador . '/js/';
        }
    }

    public function renderizar($vista, $item = false, $noLayout = false) {

        $this->template_dir = ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS;
        $this->config_dir = ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'configs' . DS;
        $this->cache_dir = ROOT . 'tmp' . DS . 'cache' . DS;
        $this->compile_dir = ROOT . 'tmp' . DS . 'template' . DS;

        $menu = array();

        if (Session::get('autenticado')) {
            $menu = [
                [
                    'id' => 'Inicio',
                    'titulo' => 'Inicio',
                    'enlace' => BASE_URL . '',
                    'imagen' => 'inicio_36'
                ],
                 [
                    'id' => 'fichajes',
                    'titulo' => 'Fichar',
                    'enlace' => BASE_URL . 'fichajes',
                    'imagen' => 'fichar_36'
                ],
                [
                    'id' => 'personal',
                    'titulo' => 'Personal',
                    'enlace' => BASE_URL . 'personal',
                    'imagen' => 'personal_36'
                ],
                [
                    'id' => 'tareas',
                    'titulo' => 'Tareas',
                    'enlace' => BASE_URL . 'tareas',
                    'imagen' => 'tareas_36'
                ],
                [
                    'id' => 'migraciones',
                    'titulo' => 'Migraciones',
                    'enlace' => BASE_URL . 'migraciones',
                    'imagen' => 'migraciones_36'
                ],
                [
                    'id' => 'login',
                    'titulo' => 'Salir',
                    'enlace' => BASE_URL . 'login/index/cerrar',
                    'imagen' => 'cerrarSesion_36'
                ]
            ];
        }

        $_params = array(
            'ruta_cssPublic' => BASE_URL . 'public/css/',
            'ruta_css' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/css/',
            'ruta_img' => BASE_URL . 'public/img/',
            'ruta_js' => BASE_URL . 'public/js/',
            'menu' => $menu,
            'item' => $item,
            'js' => $this->_js,
            'js_plugin' => $this->_jsPlugin,
            'root' => BASE_URL,
            'configs' => array(
                'app_name' => APP_NAME,
                'app_slogan' => APP_SLOGAN,
                'app_company' => APP_COMPANY
            )
        );
        if (is_readable($this->_rutas['view'] . $vista . '.tpl')) {
            if ($noLayout) {
                $this->template_dir = $this->_rutas['view'];
                $this->display($this->_rutas['view'] . $vista . '.tpl');
                exit;
            }                                   
            $this->assign('_contenido', $this->_rutas['view'] . $vista . '.tpl');
        } else {
            throw new Exception('Error de vista');
        }

        $this->assign('_acl', $this->_acl);
        $this->assign('_layoutParams', $_params);
        $this->display('template.tpl');
    }

    public function setJs(array $js) {
        if (is_array($js) && count($js)) {
            for ($i = 0; $i < count($js); $i++) {
                $this->_js[] = $this->_rutas['js'] . $js[$i] . '.js';
            }
        } else {
            throw new Exception('Error de js');
        }
    }

    public function setJsPlugin(array $js) {
        if (is_array($js) && count($js)) {
            for ($i = 0; $i < count($js); $i++) {
                $this->_jsPlugin[] = BASE_URL . 'public/js/' . $js[$i] . '.js';
            }
        } else {
            throw new Exception('Error de js plugin');
        }
    }

}

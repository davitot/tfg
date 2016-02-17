<?php /* Smarty version Smarty-3.1.8, created on 2016-02-17 08:46:59
         compiled from "C:\xampp\htdocs\tfg\views\layout\default\template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:123555c1ebb2e14932-99676284%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76447dbeb5be39de3a4e1e70ca4144cd49f28558' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tfg\\views\\layout\\default\\template.tpl',
      1 => 1455690576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123555c1ebb2e14932-99676284',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55c1ebb301a776_84768282',
  'variables' => 
  array (
    'titulo' => 0,
    '_layoutParams' => 0,
    'datos' => 0,
    'it' => 0,
    '_item_style' => 0,
    '_error' => 0,
    '_mensaje' => 0,
    '_contenido' => 0,
    'plg' => 0,
    'js' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c1ebb301a776_84768282')) {function content_55c1ebb301a776_84768282($_smarty_tpl) {?><!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

    <!--<head> -->
    <head>
        <meta charset="utf-8" />
        <title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['titulo']->value)===null||$tmp==='' ? "Sin titulo" : $tmp);?>
</title>       
        <meta content="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['configs']['app_name'];?>
" name="author" />
        <meta content="TFG _ UCAVILA" name="description" />
        <meta content="migracion, proyecto, gestion" name="keywords" />
        <link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
reset.css" rel="stylesheet" type="text/css" />              
        <link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
estilos.css" rel="stylesheet" type="text/css" />  
        <script type="text/javascript">
            var _root_ = '<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
';
        </script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
jquery-1.7.2.min.js" type="text/javascript"></script>                 
        <script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
bootstrap.min.js" type="text/javascript"></script>                          
    </head>   
    <!--</head> -->

    <!--<body> -->
    <body>
        <!--<header> -->
        <header>                       
            <div id="tituloIndex">
                <?php if (Session::get('autenticado')){?>                                                            
                    <h1><?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['configs']['app_name'];?>
</h1>  
                    <p>Gestión de Proyecto</p>
                <?php }else{ ?>
                    <h1>Inicie sesión</h1>
                <?php }?>                 
            </div>

            <?php if (!Session::get('autenticado')){?>                        
                <div id="menuLogin">
                    <form name="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
login">           
                        <input type="hidden" value="1" name="enviar" />       
                        <table>
                            <tr>           
                                <td>                
                                    <input type="text" name="usuario" id="campoLogin" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['usuario'])===null||$tmp==='' ? '' : $tmp);?>
" placeholder="Usuario"/>                        
                                    <img id="imgLogin_user" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
menu/mailicon.png" alt="Usuario"/>
                                </td>
                                <td>                
                                    <input type="password" id="campoLogin" name="pass" placeholder="Password"/>
                                    <img id="imgLogin_password" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
menu/passicon.png" alt="Password"/>
                                </td>
                                <td>&nbsp;</td>
                                <td>
                                    <input type="submit" value="Entrar" id="botonLogin"/>
                                </td>                                
                        </table>
                    </form>           
                </div>
            <?php }else{ ?>     
                <div id="menuUp">
                    <table align="center">
                        <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['menu'])){?>
                            <tr>
                                <?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value){
$_smarty_tpl->tpl_vars['it']->_loop = true;
?>
                                    <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['item'])&&$_smarty_tpl->tpl_vars['_layoutParams']->value['item']==$_smarty_tpl->tpl_vars['it']->value['id']){?>
                                        <?php $_smarty_tpl->tpl_vars["_item_style"] = new Smarty_variable('current', null, 0);?>
                                    <?php }else{ ?>
                                        <?php $_smarty_tpl->tpl_vars["_item_style"] = new Smarty_variable('', null, 0);?>
                                    <?php }?>
                                    <td><a class="<?php echo $_smarty_tpl->tpl_vars['_item_style']->value;?>
" href="<?php echo $_smarty_tpl->tpl_vars['it']->value['enlace'];?>
"><img id='imgMenu' src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
menu/<?php echo $_smarty_tpl->tpl_vars['it']->value['imagen'];?>
.png" alt="<?php echo $_smarty_tpl->tpl_vars['it']->value['titulo'];?>
" /></a></td>                                                       
                                    <?php } ?>
                                <td>                            
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
modules/personal/views/index/img/personal/<?php echo Session::get('imagen');?>
" alt="Foto"/>
                                </td>
                            </tr>
                            <tr>
                                <?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value){
$_smarty_tpl->tpl_vars['it']->_loop = true;
?>
                                    <td><?php echo $_smarty_tpl->tpl_vars['it']->value['titulo'];?>
</td>                                                       
                                <?php } ?>
                                <td><i class="usuario" id="usuario"><?php echo Session::get('usuario');?>
</i></td>
                            </tr>
                        <?php }?>
                    </table>
                <?php }?>  
            </div>
        </header>
        <!--</header> -->                                            
        <!--<main> -->
        <article>            
            <noscript><p>Para el correcto funcionamiento debe tener el soporte de javascript habilitado</p></noscript>
            <!-- Muestra mensaje de error si existe -->
            <?php if (isset($_smarty_tpl->tpl_vars['_error']->value)){?>
                    <div id="_errl" class="alert alert-error">
                        <a class="close" data-dismiss="alert">x</a>
                        <?php echo $_smarty_tpl->tpl_vars['_error']->value;?>

                    </div>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['_mensaje']->value)){?>
                    <div id="_msgl" class="alert alert-success">
                        <a class="close" data-dismiss="alert">x</a>
                        <?php echo $_smarty_tpl->tpl_vars['_mensaje']->value;?>

                    </div>
                <?php }?>

            <!-- Muestra la parte de contenido segun la seccion llamada -->
            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['_contenido']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <!-- parte de contenido -->
        </article>
        <!--</main> -->       
        <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['js_plugin'])&&count($_smarty_tpl->tpl_vars['_layoutParams']->value['js_plugin'])){?>
            <?php  $_smarty_tpl->tpl_vars['plg'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['plg']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['js_plugin']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['plg']->key => $_smarty_tpl->tpl_vars['plg']->value){
$_smarty_tpl->tpl_vars['plg']->_loop = true;
?>
                <script src="<?php echo $_smarty_tpl->tpl_vars['plg']->value;?>
" type="text/javascript"></script>
            <?php } ?>
        <?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['js'])&&count($_smarty_tpl->tpl_vars['_layoutParams']->value['js'])){?>
            <?php  $_smarty_tpl->tpl_vars['js'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js']->key => $_smarty_tpl->tpl_vars['js']->value){
$_smarty_tpl->tpl_vars['js']->_loop = true;
?>
                <script src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
" type="text/javascript"></script>
            <?php } ?>
        <?php }?>                    
    </body>
    <!--</body> -->
    <!--</footer> -->
    <footer>
        <?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['configs']['app_company'];?>
 ~ <?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['configs']['app_slogan'];?>
 ~ Copyright &copy; 2015 
    </footer>
    <!--</footer> -->
</html><?php }} ?>
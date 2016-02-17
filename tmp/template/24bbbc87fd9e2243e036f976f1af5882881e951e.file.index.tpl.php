<?php /* Smarty version Smarty-3.1.8, created on 2016-02-17 08:47:00
         compiled from "C:\xampp\htdocs\tfg\modules\login\views\index\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:206455c1ebb3031e85-38727704%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24bbbc87fd9e2243e036f976f1af5882881e951e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tfg\\modules\\login\\views\\index\\index.tpl',
      1 => 1455690551,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206455c1ebb3031e85-38727704',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55c1ebb3031e87_62628637',
  'variables' => 
  array (
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c1ebb3031e87_62628637')) {function content_55c1ebb3031e87_62628637($_smarty_tpl) {?>
<header>
    <h2>Migración MS-Exchange <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
flecha.png" alt="" /> IBM Lotus </h2>
        <?php if (Session::get('autenticado')){?>
        <br>
        <p>Menú principal</p>       
        <br>                                              
    <?php }else{ ?>
        <br>                                              
        <p style="font-size: 1em;">Gestión de Proyecto</p>
        <br>
        <br>
        <br>
        <br>
        <br>
        <p style="text-align: center; top: 200px;"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
logo_inicio.png" alt="" /> </p>
        <?php }?>
</header><?php }} ?>
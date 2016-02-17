<?php /* Smarty version Smarty-3.1.8, created on 2016-02-11 18:36:46
         compiled from "D:\xampp\htdocs\tfg\modules\login\views\index\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:994555c23af1871f75-67734573%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '891bfcec9974bbf075d6b39bf5565a6532d07aa4' => 
    array (
      0 => 'D:\\xampp\\htdocs\\tfg\\modules\\login\\views\\index\\index.tpl',
      1 => 1455172551,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '994555c23af1871f75-67734573',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55c23af1873526_57922193',
  'variables' => 
  array (
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c23af1873526_57922193')) {function content_55c23af1873526_57922193($_smarty_tpl) {?>
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
<?php /* Smarty version Smarty-3.1.8, created on 2016-02-11 20:13:44
         compiled from "D:\xampp\htdocs\tfg\views\error\access.tpl" */ ?>
<?php /*%%SmartyHeaderCode:864655c24307613657-10404265%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a378b5f20d38fb245a7f0bf5f033c7d349d17f2a' => 
    array (
      0 => 'D:\\xampp\\htdocs\\tfg\\views\\error\\access.tpl',
      1 => 1455172578,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '864655c24307613657-10404265',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55c243076633b2_39506783',
  'variables' => 
  array (
    'mensaje' => 0,
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c243076633b2_39506783')) {function content_55c243076633b2_39506783($_smarty_tpl) {?><div id="mensaje">     
    <h2><?php if (isset($_smarty_tpl->tpl_vars['mensaje']->value)){?> <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
<?php }?></h2>
</div>     

<div id="imgWarnign">    
    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/acl/img/warning.png" alt="Advertencia"></a>       
</div>    
<?php }} ?>
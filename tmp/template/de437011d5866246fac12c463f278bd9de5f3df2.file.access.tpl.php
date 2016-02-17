<?php /* Smarty version Smarty-3.1.8, created on 2016-02-17 09:03:16
         compiled from "C:\xampp\htdocs\tfg\views\error\access.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3233355c30ec2780374-34709068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de437011d5866246fac12c463f278bd9de5f3df2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tfg\\views\\error\\access.tpl',
      1 => 1455690574,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3233355c30ec2780374-34709068',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55c30ec27fd399_35314515',
  'variables' => 
  array (
    'mensaje' => 0,
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c30ec27fd399_35314515')) {function content_55c30ec27fd399_35314515($_smarty_tpl) {?><div id="mensaje">     
    <h2><?php if (isset($_smarty_tpl->tpl_vars['mensaje']->value)){?> <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
<?php }?></h2>
</div>     

<div id="imgWarnign">    
    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/acl/img/warning.png" alt="Advertencia"></a>       
</div>    
<?php }} ?>
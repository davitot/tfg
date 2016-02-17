<?php /* Smarty version Smarty-3.1.8, created on 2015-10-01 12:24:52
         compiled from "C:\xampp\htdocs\tfg\views\acl\editar_permiso.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14256560d09f4a4a197-90276570%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f83db583bda5403065d98e5e4d8def8f03b455f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tfg\\views\\acl\\editar_permiso.tpl',
      1 => 1438236959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14256560d09f4a4a197-90276570',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_560d09f4aabc36_41305724',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560d09f4aabc36_41305724')) {function content_560d09f4aabc36_41305724($_smarty_tpl) {?><form id="form1" method="post" action="">
    <input type="hidden" name="guardar" value="1" />
    <p>Permiso:<br />
        <input type="texto" name="permiso" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['permiso'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['permiso'];?>
<?php }?>" /></p>
    
    <p>Llave:<br />
        <input type="llave" name="llave" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['llave'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['llave'];?>
<?php }?>" /></p>

    <p><input type="submit" class="button" value="Guardar" /></p>
</form>      <?php }} ?>
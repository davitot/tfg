<?php /* Smarty version Smarty-3.1.8, created on 2016-01-14 19:36:15
         compiled from "D:\xampp\htdocs\tfg\views\error\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70645697e731219cc8-48173168%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bda9249c56c2145f1edd87816a3b3f32a5b0c243' => 
    array (
      0 => 'D:\\xampp\\htdocs\\tfg\\views\\error\\index.tpl',
      1 => 1452796573,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70645697e731219cc8-48173168',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5697e7312616b0_78104077',
  'variables' => 
  array (
    'mensaje' => 0,
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5697e7312616b0_78104077')) {function content_5697e7312616b0_78104077($_smarty_tpl) {?><header
    <div id="mensaje">     
        <h2><?php if (isset($_smarty_tpl->tpl_vars['mensaje']->value)){?> <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
<?php }?></h2>
    </div> 
</header>

<div id="imgWarnign"> 

    <?php if ((!Session::get('autenticado'))){?>
        <br>
        <br>        
        <h2>
            Intente iniciar sesion antes de continuar
        </h2>
        <br>
        <br>        
    <?php }?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/acl/img/warning.png" alt="Advertencia"></a>
</div>    
<?php }} ?>
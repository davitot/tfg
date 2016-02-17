<?php /* Smarty version Smarty-3.1.8, created on 2016-02-16 18:45:40
         compiled from "D:\xampp\htdocs\tfg\views\acl\editar_cargo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22459569bb8147eeda6-43793721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ffdac6dc197e14ea3a9251509171437485e04c61' => 
    array (
      0 => 'D:\\xampp\\htdocs\\tfg\\views\\acl\\editar_cargo.tpl',
      1 => 1455644738,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22459569bb8147eeda6-43793721',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_569bb814e08676_04836059',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569bb814e08676_04836059')) {function content_569bb814e08676_04836059($_smarty_tpl) {?><header>
    <h2>Edición de cargo</h2>    
</header>
<nav>
    <table>    
        <tr>
            <td>
                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/vacio.png" alt="nada"/></a>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
         <tr>
            <td>
                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/vacio.png" alt="nada"/></a>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/vacio.png" alt="nada"/></a>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/atras.png" alt="Atras"/></a>
            </td>
        </tr>       
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;Volver
            </td>
        </tr>    
    </table>
</nav>

<div id="formulario">
    <form id="form1" method="post" action="">
        <input type="hidden" name="guardar" value="1" />
        <table>
            <tr>
                <td>
                    Id:
                </td>
                <td>
                    <input type="texto" name="idCargo" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['idCargo'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['idCargo'];?>
<?php }?>" /></p>
                </td>
            </tr>
            <tr>
                <td>
                    Cargo:
                </td>
                <td>
                    <input type="texto" name="cargo" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['idCargo'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['cargo'];?>
<?php }?>" /></p>
                </td>
            </tr>
            <tr>
                <td>
                    Activo:
                </td>
                <td>
                    <input type="checkbox" name="activo" value="1" <?php if (($_smarty_tpl->tpl_vars['datos']->value['activo']==1)){?>checked="checked"<?php }?>/>
                </td>    
            </tr>
        </table>
        <br>
        <p style="margin-left: 27%; "><input type="submit" value="Guardar" class="button"/></p>   
        <br>
        <br>
    </form>          
</div><?php }} ?>
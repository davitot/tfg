<?php /* Smarty version Smarty-3.1.8, created on 2016-01-21 21:03:03
         compiled from "D:\xampp\htdocs\tfg\views\acl\editar_permiso.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200035697d76bac2a63-57864615%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48ca1caa2ca564c971836389f47cc5316a0765ac' => 
    array (
      0 => 'D:\\xampp\\htdocs\\tfg\\views\\acl\\editar_permiso.tpl',
      1 => 1453406580,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200035697d76bac2a63-57864615',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5697d76bb06f16_49403736',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5697d76bb06f16_49403736')) {function content_5697d76bb06f16_49403736($_smarty_tpl) {?><header>
    <h2>Edición de permiso</h2>    
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
                <a href="javascript:history.back(1)"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
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
                    Permiso:
                </td>
                <td>
                    <input type="texto" name="permiso" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['permiso'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['permiso'];?>
<?php }?>" /></p>
                </td>
            </tr>
            <tr>
                <td>
                    Llave:
                </td>
                <td>
                    <input type="llave" name="llave" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['llave'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['llave'];?>
<?php }?>" /></p>       
                </td>
            </tr>            
        </table>
        <br>
        <p style="margin-left: 27%; "><input type="submit" value="Guardar" class="button"/></p>   
        <br>
        <br>
    </form>      
</div><?php }} ?>
<?php /* Smarty version Smarty-3.1.8, created on 2016-01-21 19:42:39
         compiled from "D:\xampp\htdocs\tfg\views\acl\nuevo_permiso.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31055616c219877340-24881685%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '954b6a8b1446e69baeda98e993581667f19da1cc' => 
    array (
      0 => 'D:\\xampp\\htdocs\\tfg\\views\\acl\\nuevo_permiso.tpl',
      1 => 1453401754,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31055616c219877340-24881685',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5616c2198b07b9_84935365',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5616c2198b07b9_84935365')) {function content_5616c2198b07b9_84935365($_smarty_tpl) {?>
<header>
    <h2>Agregar Permiso</h2>
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
    <form name="form1" action="" method="post">
        <input type="hidden" name="guardar" value="1" />
        <br>
        <br>
        <table>  
            <tr>
                <td>
                    Permiso:
                </td>
                <td>
                    <input type="text" name="permiso" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['permiso'])===null||$tmp==='' ? '' : $tmp);?>
" />
                </td>
            </tr>
            <tr>
                <td>
                    Key:
                </td>
                <td>
                    <input type="text" name="key" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['key'])===null||$tmp==='' ? '' : $tmp);?>
" placeholder="gestionar_xxxx"/>
                </td>
            </tr>
        </table>
        <br>
        <p style="margin-left: 27%; "><input type="submit" value="Guardar" class="button"/></p>   
        <br>
        <br>
    </form>        
</div>            <?php }} ?>
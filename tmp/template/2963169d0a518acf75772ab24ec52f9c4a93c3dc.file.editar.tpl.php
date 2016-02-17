<?php /* Smarty version Smarty-3.1.8, created on 2016-01-20 15:00:09
         compiled from "C:\xampp\htdocs\tfg\modules\recursos\views\index\editar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20338569cedd4cdfc16-46909501%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2963169d0a518acf75772ab24ec52f9c4a93c3dc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tfg\\modules\\recursos\\views\\index\\editar.tpl',
      1 => 1453281887,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20338569cedd4cdfc16-46909501',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_569cedd4daae33_01004544',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569cedd4daae33_01004544')) {function content_569cedd4daae33_01004544($_smarty_tpl) {?><!-- nav -->            
<nav>
    <table style="text-align: center; font-size: 11px;">       
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
personal"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/atras.png" alt="Inicio"/></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Volver
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
                    Tipo:
                </td>
                <td>
                    <input type="text" name="tipo" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['tipo'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['tipo'];?>
<?php }?>" />
                </td>
            </tr>
            <tr>
                <td>
                    Marca:
                </td>
                <td>
                     <input type="text" name="marca" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['marca'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['marca'];?>
<?php }?>" />
                </td>
            </tr>
            <tr>
                <td>
                    Modelo:
                </td>
                <td>
                    <input type="text" name="modelo" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['modelo'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['modelo'];?>
<?php }?>" />
                </td>
            </tr>
            <tr>
                <td>
                    Num. Serie:
                </td>
                <td>
                    <input type="text" name="num_serie" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['num_serie'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['num_serie'];?>
<?php }?>" />
                </td>
            <tr>
            <tr>
                <td>
                    Fecha de alta:
                </td>
                <td>
                    <input type="date" name="fecha_alta" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['fecha_alta'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['fecha_alta'];?>
<?php }?>" />
                </td>                           
            </tr>    
            <tr>
                <td>                    
                    Activo:
                </td>
                <td>
                    <input type="checkbox" name="activo" value="1" <?php if (($_smarty_tpl->tpl_vars['datos']->value['activo']==1)){?>checked="checked"<?php }?>/>
                </td>           
        </table>
        <br>
        <p style="margin-left: 27%; "><input type="submit" value="Guardar" class="button"/></p>   
        <br>
        <br>
    </form>      

</div><?php }} ?>
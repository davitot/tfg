<?php /* Smarty version Smarty-3.1.8, created on 2016-01-20 10:25:51
         compiled from "C:\xampp\htdocs\tfg\modules\recursos\views\index\nuevo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9341569cec9c40e728-44009358%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e9dafa57723158585806d23c011341c33767c99' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tfg\\modules\\recursos\\views\\index\\nuevo.tpl',
      1 => 1453281950,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9341569cec9c40e728-44009358',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_569cec9c4ae9d9_67814106',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569cec9c4ae9d9_67814106')) {function content_569cec9c4ae9d9_67814106($_smarty_tpl) {?><!-- header -->            
<header>
    <h2>Nuevo recurso</h2>        
</header>  

<!-- nav -->            
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
recursos"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
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

<!-- formulario -->            
<div id="formulario">
    <form id="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
personal/index/nuevo"
          enctype="multipart/form-data">
        <input type="hidden" name="guardar" value="1" />
        <table>
            <tr>
                <td>
                    Tipo:
                </td>
                <td>
                    <input type="text" name="tipo" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['tipo'])===null||$tmp==='' ? '' : $tmp);?>
" />        
                </td>
            <tr>
                <td>
                    Marca:
                </td>
                 <td>
                    <input type="text" name="marca" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['marca'])===null||$tmp==='' ? '' : $tmp);?>
" />        
                </td>
            </tr>
            <tr>
                <td>        
                    Modelo:
                </td>
                <td>
                     <input type="text" name="modelo" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['modelo'])===null||$tmp==='' ? '' : $tmp);?>
" />  
                </td>
            <tr>
                <td>
                    Num. serie:
                </td>
                <td>
                    <input type="text" name="num_serie" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['num_serie'])===null||$tmp==='' ? '' : $tmp);?>
" />
                </td>
            </tr>
            <tr>
                 <td>
                    fecha de alta:
                </td>
                <td>
                    <input type="date" name="fecha_alta" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['fecha_alta'])===null||$tmp==='' ? '' : $tmp);?>
" />
                </td>
            </tr>                                        
        </table>
        <br>
        <br>
        <p style="margin-left: 27%; "><input type="submit" value="Guardar" class="button"/></p>   
        <br>
    </form>
</div>
<?php }} ?>
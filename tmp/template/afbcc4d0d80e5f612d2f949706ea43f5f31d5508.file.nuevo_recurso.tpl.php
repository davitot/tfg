<?php /* Smarty version Smarty-3.1.8, created on 2016-02-16 19:25:39
         compiled from "D:\xampp\htdocs\tfg\modules\recursos\views\index\nuevo_recurso.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2907256c363f1268418-72550184%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afbcc4d0d80e5f612d2f949706ea43f5f31d5508' => 
    array (
      0 => 'D:\\xampp\\htdocs\\tfg\\modules\\recursos\\views\\index\\nuevo_recurso.tpl',
      1 => 1455647137,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2907256c363f1268418-72550184',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56c363f12b85f2_86170270',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56c363f12b85f2_86170270')) {function content_56c363f12b85f2_86170270($_smarty_tpl) {?><!-- header -->
<header>
    <h2>Nuevo recurso</h2>        
</header>  
<!-- /header -->

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
<!-- /nav -->
            
<!-- formulario -->            
<div id="formulario">
    <form id="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
recursos/index/nuevo_recurso"
          enctype="multipart/form-data">
        <input type="hidden" name="guardar" value="1" />
        <table>
             <tr><td>&nbsp;</td></tr>
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
            <tr><td>&nbsp;</td></tr>
            <tr>                
                <td colspan="2" style="width: 150px;font-size: 11px; text-decoration: red; font-style: italic; text-align: center;">
                    <span>** El nuevo recurso quedara libre para ser asignado **</span>
                </td>
            </tr>
        </table>     
        <p style="margin-left: 27%; "><input type="submit" value="Guardar" class="button"/></p>   
        <br>
        <br>
    </form>
</div>
<?php }} ?>
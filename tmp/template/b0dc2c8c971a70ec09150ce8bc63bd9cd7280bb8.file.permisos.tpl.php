<?php /* Smarty version Smarty-3.1.8, created on 2016-01-20 10:19:28
         compiled from "C:\xampp\htdocs\tfg\views\acl\permisos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12019560d09eee733a2-84698750%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0dc2c8c971a70ec09150ce8bc63bd9cd7280bb8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tfg\\views\\acl\\permisos.tpl',
      1 => 1453281567,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12019560d09eee733a2-84698750',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_560d09ef00bbd9_61189638',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'permisos' => 0,
    'rl' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560d09ef00bbd9_61189638')) {function content_560d09ef00bbd9_61189638($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/acl/css/estilosAcl.css" rel="stylesheet" type="text/css" />

<!-- header -->
<header>
    <h2>Gestión de Permisos</h2>       
</header>

<!-- nav -->
<nav>
    <table>
        <tr>
            <td>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/nuevo_permiso"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/agregar.png" alt="Agregar"/></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Nuevo permiso
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

<div id='listadoAcl'>
    <?php if (isset($_smarty_tpl->tpl_vars['permisos']->value)&&count($_smarty_tpl->tpl_vars['permisos']->value)){?>
        <table id="tablaListado">
            <tr>
                <th>ID</th>
                <th>Permiso</th>
                <th>Llave</th>
                <th colspan="2">Acciones</th>  
            </tr>

            <?php  $_smarty_tpl->tpl_vars['rl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rl']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['permisos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rl']->key => $_smarty_tpl->tpl_vars['rl']->value){
$_smarty_tpl->tpl_vars['rl']->_loop = true;
?>

                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['rl']->value['idPermiso'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['rl']->value['permiso'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['rl']->value['llave'];?>
</td>
                    <td style="text-align: center;"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/editar_permiso/<?php echo $_smarty_tpl->tpl_vars['rl']->value['idPermiso'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
accionesTabla/editar.png" alt="Editar"/></td>
                    <td style="text-align: center;"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/eliminarPermiso/<?php echo $_smarty_tpl->tpl_vars['rl']->value['idPermiso'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
accionesTabla/eliminar.png" alt="Eliminar"/></td>
                </tr>

            <?php } ?>
        </table>            
    <?php }?>                                    
</div>     

<div id="paginacion">
    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['paginacion']->value)===null||$tmp==='' ? '' : $tmp);?>
     
</div>

<?php }} ?>
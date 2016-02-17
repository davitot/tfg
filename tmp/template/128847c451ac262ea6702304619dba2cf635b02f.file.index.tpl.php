<?php /* Smarty version Smarty-3.1.8, created on 2016-02-16 18:41:17
         compiled from "D:\xampp\htdocs\tfg\views\acl\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:235995616c1f7382e13-53765108%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '128847c451ac262ea6702304619dba2cf635b02f' => 
    array (
      0 => 'D:\\xampp\\htdocs\\tfg\\views\\acl\\index.tpl',
      1 => 1455644471,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '235995616c1f7382e13-53765108',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5616c1f73bbce5_86534199',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'roles' => 0,
    'rl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5616c1f73bbce5_86534199')) {function content_5616c1f73bbce5_86534199($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/acl/css/estilosAcl.css" rel="stylesheet" type="text/css" />

<div id="imagenAcl">
    <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/acl/img/gestAcl.png" alt=""/>
</div>
<header>
    <h2>Gestión de Cargos</h2>
</header>
<nav>
    <table style="text-align: center; font-size: 11px;">
        <tr>
            <td>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/nuevo_cargo"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/agregar.png" alt="Nuevo Cargo"/></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Nuevo cargo
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

<div id='listadoAcl_Cargos'>
    <?php if (isset($_smarty_tpl->tpl_vars['roles']->value)&&count($_smarty_tpl->tpl_vars['roles']->value)){?>
        <table id="tablaListado">
            <tr>
                <th>ID</th>
                <th>Cargo</th>
                <th>Activo</th>
                <th colspan="3">Acciones</th>                    
            </tr>
            <?php  $_smarty_tpl->tpl_vars['rl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rl']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['roles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rl']->key => $_smarty_tpl->tpl_vars['rl']->value){
$_smarty_tpl->tpl_vars['rl']->_loop = true;
?>
                <tr>
                    <td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['rl']->value['idCargo'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['rl']->value['descripcion'];?>
</td>
                     <td style="text-align: center; width: 5%;">
                            <?php if ($_smarty_tpl->tpl_vars['rl']->value['activo']==1){?>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/accionesTabla/gestionada.png" title="Gestionada"/>
                            <?php }else{ ?>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/accionesTabla/noGestionada.png" title="No Gestionada"/>
                            <?php }?>
                       </td>  
                     <td style="text-align: center;">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/editar_cargo/<?php echo $_smarty_tpl->tpl_vars['rl']->value['idCargo'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
accionesTabla/editar.png" alt="Editar"/></a>
                    </td>
                    <td style="text-align: center;">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/permisos_cargo/<?php echo $_smarty_tpl->tpl_vars['rl']->value['idCargo'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
accionesTabla/llave.png" alt="Editar"/></a>
                    </td>
                    <td style="text-align: center;"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/eliminar_Cargo/<?php echo $_smarty_tpl->tpl_vars['rl']->value['idCargo'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
accionesTabla/eliminar.png" alt="Eliminar"/></td>
                </tr>
            <?php } ?>                        
        </table>            
    <?php }?>
</div>
</body><?php }} ?>
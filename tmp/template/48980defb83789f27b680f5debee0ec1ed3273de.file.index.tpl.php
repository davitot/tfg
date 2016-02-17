<?php /* Smarty version Smarty-3.1.8, created on 2016-02-11 19:39:49
         compiled from "D:\xampp\htdocs\tfg\modules\personal\views\index\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1116055c23b58370de5-96923783%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48980defb83789f27b680f5debee0ec1ed3273de' => 
    array (
      0 => 'D:\\xampp\\htdocs\\tfg\\modules\\personal\\views\\index\\index.tpl',
      1 => 1455172564,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1116055c23b58370de5-96923783',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55c23b5840afd5_40794185',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'cargos' => 0,
    'per' => 0,
    'personal' => 0,
    'datos' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c23b5840afd5_40794185')) {function content_55c23b5840afd5_40794185($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp\\htdocs\\tfg\\libs\\smarty\\libs\\plugins\\modifier.date_format.php';
?><link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
modules/personal/views/index/css/estilosPersonal.css" rel="stylesheet" type="text/css" />

<!-- header -->
<header>
    <h2>Gestión de Personal</h2>        
</header>
<!-- header -->

<!-- Filtros -->
<div class="filtros2 subfiltros">
    <table>
        <tr class="spaceUnder">
            <td>
                <input type="text" id="nombre" placeholder="Nombre">
            </td>
            <td  style="vertical-align: middle;">
                <a href="#" onclick="paginacion();return false;" id="btnBuscar">&nbsp;&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/icono_lupa.png" title="Buscar"/></a>
            </td>
        </tr>        
        <tr>
            <td>
                <select id="cargo" style="height: 20px;">
                    <option>
                        -- Cargo --
                    </option>
                    <?php if (isset($_smarty_tpl->tpl_vars['cargos']->value)&&count($_smarty_tpl->tpl_vars['cargos']->value)){?>
                        <?php  $_smarty_tpl->tpl_vars['per'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['per']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cargos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['per']->key => $_smarty_tpl->tpl_vars['per']->value){
$_smarty_tpl->tpl_vars['per']->_loop = true;
?>
                            <option value='<?php echo $_smarty_tpl->tpl_vars['per']->value['idCargo'];?>
'>
                                <?php echo $_smarty_tpl->tpl_vars['per']->value['descripcion'];?>
   
                            </option>                    
                        <?php } ?>
                    <?php }?>
                </select>
            </td>
            <td>
                <input type="date" id="fechaInicio" style="height: 16px;"/>
            </td>
            <td style="vertical-align: middle;">                
                <a href="#" onclick="limpiar();return false;" id="limpiarFecha">&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/brocha.png" title="Limpiar"/></a>               
            </td>
        </tr>
    </table>
</div>
<!-- Filtros -->

<!-- nav-->
<nav>
    <table style="text-align: center; font-size: 11px;">
        <tr>
            <td>
                <?php if (Session::acceso(Session::get('level'))){?>  
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
personal/index/nuevo_personal"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/agregar.png" alt="Agregar"/></a>
                    <?php }else{ ?>                
                    <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/agregar_noacceso.png" alt="No permitido"/>
                <?php }?>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Nuevo
            </td>
        </tr>
        <tr>
            <td>
                <?php if (Session::acceso(Session::get('level'))){?>            
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/organigrama.png" alt="ACL"/></a>            
                    <?php }else{ ?>                
                    <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/organigrama_noacceso.png" alt="No permitido"/></a>            
                <?php }?>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;ACL
            </td>
        </tr>
        <tr>
            <td>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
recursos"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/recursos.png" alt="Recursos"/></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Recursos
            </td>
        </tr>
        <tr>
            <td>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/atras.png" alt="Volver"/></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Volver
            </td>
        </tr>
    </table>      
</nav>
<!-- nav-->

<!-- refrescar -->
<div id="refrescar">
    <!-- listadoPersonal -->
    <div id="listadoIndex">
        <?php if (isset($_smarty_tpl->tpl_vars['personal']->value)&&count($_smarty_tpl->tpl_vars['personal']->value)){?>
            <table id="tablaListado">
                <tr>
                    <th>Nombre</th>
                    <th>Cargo</th>
                    <th>E-mail</th>
                    <th>Fecha Alta</th>                    
                    <th>Activo</th>                       
                        <?php if (Session::acceso(Session::get('level'))){?>
                        <th colspan="3">Acciones</th>
                        <?php }?>
                </tr>

                <?php  $_smarty_tpl->tpl_vars['datos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['personal']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['datos']->key => $_smarty_tpl->tpl_vars['datos']->value){
$_smarty_tpl->tpl_vars['datos']->_loop = true;
?>

                    <tr>
                        <td style="width: 12%;"><?php echo $_smarty_tpl->tpl_vars['datos']->value['nombre'];?>
</td>
                        <td style="width: 10%;"><?php echo $_smarty_tpl->tpl_vars['datos']->value['cargo'];?>
</td>
                        <td style="width: 7%;"><?php echo $_smarty_tpl->tpl_vars['datos']->value['email'];?>
</td>                        
                        <td style="text-align: center; width: 4%;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['datos']->value['fecha_Incorporacion'],"%d/%m/%Y");?>
</td>    
                        <td style="text-align: center; width: 5%;">
                            <?php if ($_smarty_tpl->tpl_vars['datos']->value['activo']==1){?>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/accionesTabla/gestionada.png" title="Usuario activo"/>
                            <?php }else{ ?>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/accionesTabla/noGestionada.png" title="Usuario inactivo"/>
                            <?php }?>
                        </td>  
                        <?php if (Session::acceso(Session::get('level'))){?>
                            <td style="width: 0.4%; text-align: center;"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
personal/index/editar_personal/<?php echo $_smarty_tpl->tpl_vars['datos']->value['idPersonal'];?>
/<?php echo $_smarty_tpl->tpl_vars['datos']->value['idCargo'];?>
"><img src="./public/img/accionesTabla/editar.png" alt="Editar"/></a></td>                        
                            <td style="width: 0.4%; text-align: center;"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
personal/index/eliminar_personal/<?php echo $_smarty_tpl->tpl_vars['datos']->value['idPersonal'];?>
/<?php echo $_smarty_tpl->tpl_vars['datos']->value['idCargo'];?>
"><img src="./public/img/accionesTabla/eliminar.png" alt="Eliminar"/></a></td>                        
                            <td style="width: 0.4%; text-align: center;"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/permisos_cargo/<?php echo $_smarty_tpl->tpl_vars['datos']->value['idCargo'];?>
"><img src="./public/img/accionesTabla/llave.png" alt="Permisos"/></a></td>            
                                <?php }?>
                    </tr>
                <?php } ?>
            </table>

        <?php }else{ ?>

            <p><strong>No hay personal dado de alta.</strong></p>

            <p><img src="./public/img/calendario_blank.png" alt="Sin resultados"/></p>

        <?php }?>                       
    </div>
    <!-- listadoPersonal -->
    
    <!-- Paginacion -->
    <div id="paginacion">
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['paginacion']->value)===null||$tmp==='' ? '' : $tmp);?>

    </div>
    <!-- Paginacion -->
</div>
<!-- refrescar -->

<!-- ImagenPersonal-->
<div id="imagenUpDcha">
    <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/imgsUp/personal.png" alt=""/>
</div>
<!-- ImagenPersonal--><?php }} ?>
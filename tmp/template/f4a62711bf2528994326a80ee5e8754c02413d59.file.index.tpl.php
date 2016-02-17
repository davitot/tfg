<?php /* Smarty version Smarty-3.1.8, created on 2016-02-17 09:09:06
         compiled from "C:\xampp\htdocs\tfg\modules\tareas\views\index\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1961456a0864e312615-89660796%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4a62711bf2528994326a80ee5e8754c02413d59' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tfg\\modules\\tareas\\views\\index\\index.tpl',
      1 => 1455690561,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1961456a0864e312615-89660796',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56a0864e4087d3_77155595',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'tecnicos' => 0,
    'tec' => 0,
    'tareas' => 0,
    'ta' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a0864e4087d3_77155595')) {function content_56a0864e4087d3_77155595($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_debug_print_var')) include 'C:\\xampp\\htdocs\\tfg\\libs\\smarty\\libs\\plugins\\modifier.debug_print_var.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\tfg\\libs\\smarty\\libs\\plugins\\modifier.date_format.php';
?><link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
modules/tareas/views/index/css/estilosTareas.css" rel="stylesheet" type="text/css" />

<!-- Header -->
<header>
    <h2>Gestión de Tareas</h2> 
     <!--<?php echo smarty_modifier_debug_print_var($_smarty_tpl->tpl_vars['tecnicos']->value);?>
-->
</header>
<!-- /Header -->


<!-- Filtros -->
<div class="filtrosT subfiltros">
    <table>
        <tr class="spaceUnder">
            <td>
                <input style="width:224px;" type="text" id="nombre" placeholder="Nombre">
            </td>

            <td  style="vertical-align: middle;">
                <a href="#" onclick="paginacion();
                        return false;" id="btnBuscar">&nbsp;&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/icono_lupa.png" title="Buscar"/></a>
            </td>
            <td></td>
        </tr>        
        
        <tr>
            <td>
                <select id="idPersonal" style="height: 21px;">
                    <option>
                        -- Técnico --
                    </option>
                    <?php if (isset($_smarty_tpl->tpl_vars['tecnicos']->value)&&count($_smarty_tpl->tpl_vars['tecnicos']->value)){?>
                        <?php  $_smarty_tpl->tpl_vars['tec'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tec']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tecnicos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tec']->key => $_smarty_tpl->tpl_vars['tec']->value){
$_smarty_tpl->tpl_vars['tec']->_loop = true;
?>
                            <option value='<?php echo $_smarty_tpl->tpl_vars['tec']->value['idPersonal'];?>
'>
                                <?php echo $_smarty_tpl->tpl_vars['tec']->value['nombre'];?>
   
                            </option>                    
                        <?php } ?>
                    <?php }?>
                </select>   
            </td>
            <td></td>
            <td>
                <input type="date" id="fechaInicio" style="height: 16px;"/>
            </td>            
            <td style="vertical-align: middle;">                
                <a href="#" onclick="limpiar();
                        return false;" id="limpiarFecha">&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/brocha.png" title="Limpiar"/></a>               
            </td>
        </tr>
    </table>
</div>
<!-- /Filtros -->

<!-- nav -->
<nav>
    <table style="text-align: center; font-size: 11px;">
        <tr>
            <td>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
tareas/index/nueva_tarea"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/agregar.png" title="Agregar tarea"/></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Nueva tarea
            </td>
        </tr>
        <tr>
            <td>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
migraciones/index/tareas_tecnico"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/informe.png" title="Ver tareaas"/></a>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;&nbsp;&nbsp;Mis Tareas
            </td>
        </tr>
        <tr>
            <td>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
pdf/generar_InformesTareas"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/impresora.png" title="Imprimir"/></a>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;&nbsp;&nbsp;&nbsp;Imprimir
            </td>
        </tr>
        <tr>
            <td>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/atras.png" title="Atras"/></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Volver
            </td>
        </tr>
    </table>                
</nav>    

<!-- Imagen -->
<div id="imagenUpDcha">
    <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/acl/img/gestAcl.png" alt=""/>
</div>

<!-- Refrescar -->
<div id="refrescar">
    <!-- ListadoTareas -->
    <div id='listadoIndex'>            
        <?php if (isset($_smarty_tpl->tpl_vars['tareas']->value)&&count($_smarty_tpl->tpl_vars['tareas']->value)){?>
            <table id="tablaListado">
                <thead>   
                    <tr>
                        <th>Personal</th>
                        <th>Tarea</th>
                        <th>Fecha inicio</th>
                        <th>Fecha fin</th>
                        <th>Finalizada</th>
                        <th colspan="2">Acciones</th>  
                    </tr>
                </thead>

                <?php  $_smarty_tpl->tpl_vars['ta'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ta']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tareas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ta']->key => $_smarty_tpl->tpl_vars['ta']->value){
$_smarty_tpl->tpl_vars['ta']->_loop = true;
?>                
                    <tr>                          
                        <td style="width: 25%;"><?php echo $_smarty_tpl->tpl_vars['ta']->value['tecnico'];?>
</td>
                        <td style="width: 40%;"><?php echo $_smarty_tpl->tpl_vars['ta']->value['titulo'];?>
</td>
                        <td style="text-align: center; width: 14%;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ta']->value['fecha_inicio'],"%d/%m/%Y");?>
</td>
                        <?php if ($_smarty_tpl->tpl_vars['ta']->value['fecha_fin']==''||$_smarty_tpl->tpl_vars['ta']->value['fecha_fin']=='0000-00-00'){?>
                            <td style="text-align: center; width: 10%;">Pendiente</td>
                        <?php }else{ ?>
                            <td style="text-align: center; width: 10%;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ta']->value['fecha_fin'],"%d/%m/%Y");?>
</td>
                        <?php }?>

                        <td style="text-align: center; width: 5%;">
                            <?php if ($_smarty_tpl->tpl_vars['ta']->value['activa']==0){?>                                
                                <img src="./public/img/accionesTabla/gestionada.png" alt="Gestionada" title="Finalizada"/>
                            <?php }else{ ?>
                                <img src="./public/img/accionesTabla/noGestionada.png" alt="No Gestionada" title="Pendiente"/>
                            <?php }?>
                        </td>
                        <td style="text-align: center;"><a href="./tareas/index/editar_tarea/<?php echo $_smarty_tpl->tpl_vars['ta']->value['idTarea'];?>
"><img src="./public/img/accionesTabla/editar.png" alt="Editar"/></a></td>
                        <td style="text-align: center;"><a href="#" onClick="confirmarBorrado(<?php echo $_smarty_tpl->tpl_vars['ta']->value['idTarea'];?>
, <?php echo $_smarty_tpl->tpl_vars['ta']->value['idPersonal'];?>
, '<?php echo $_smarty_tpl->tpl_vars['ta']->value['tipo'];?>
')"><img src="./public/img/accionesTabla/eliminar.png" alt="Eliminar"/></a>
                    </tr>
                <?php } ?>
            </table>            
        <?php }else{ ?>
            <p><strong>No hay Tareas pendientes.</strong></p>

            <p><img src="./public/img/calendario_blank.png" alt="Sin resultados"/></p>

        <?php }?>                 
    </div>       
    <!-- Paginacion -->
    <div id="paginacion">
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['paginacion']->value)===null||$tmp==='' ? '' : $tmp);?>
 
    </div>
</div>

<!--<script language="javascript"> 
    mostrar(); 
</script>--><?php }} ?>
<?php /* Smarty version Smarty-3.1.8, created on 2016-01-20 10:20:42
         compiled from "C:\xampp\htdocs\tfg\views\tareas\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2046155c1f09ba35501-54234365%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '419dcca56b0f8c968f17161cd628c37957c664d4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tfg\\views\\tareas\\index.tpl',
      1 => 1453153832,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2046155c1f09ba35501-54234365',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55c1f09bb4aac8_95970758',
  'variables' => 
  array (
    'tecnicos' => 0,
    'tec' => 0,
    '_layoutParams' => 0,
    'tareas' => 0,
    'ta' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c1f09bb4aac8_95970758')) {function content_55c1f09bb4aac8_95970758($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\tfg\\libs\\smarty\\libs\\plugins\\modifier.date_format.php';
?><!-- Header -->
<header>
    <h2>Gestión de Tareas</h2>       
</header>

<!-- Filtros -->
<div id="filtros">
    <table>
        <tr>
            <td> <select id="idPersonal" style="height: 24px;">
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
                                <?php echo $_smarty_tpl->tpl_vars['tec']->value['tecnico'];?>
   
                            </option>                    
                        <?php } ?>
                    <?php }?>
                </select>   
            </td>
            <td><input type="date" id="fechaInicio"/></td>
            <td><button type="button" class="limpiar" id="limpiarFecha"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/brocha.png" alt="Limpiar"/></button></td>
        </tr>
    </table>
</div>

<!-- nav -->
<nav>
    <table style="text-align: center; font-size: 11px;">
        <tr>
            <td>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
tareas/nueva_tarea"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/agregar.png" alt="Agregar"/></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Nueva tarea
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
"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/atras.png" alt="Atras"/></a>
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
                        <td style="text-align: center; width: 14%;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ta']->value['fecha_Inicio'],"%d/%m/%Y");?>
</td>
                        <?php if ($_smarty_tpl->tpl_vars['ta']->value['fecha_fin']==''){?>
                            <td style="text-align: center; width: 10%;">Pendiente</td>
                        <?php }else{ ?>
                            <td style="text-align: center; width: 10%;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ta']->value['fecha_fin'],"%d/%m/%Y");?>
</td>
                        <?php }?>

                        <td style="text-align: center; width: 5%;">
                            <?php if ($_smarty_tpl->tpl_vars['ta']->value['gestionada']==1){?>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/tareas/img/gestionada.png" alt="Gestionada"/>
                            <?php }else{ ?>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/tareas/img/noGestionada.png" alt="No Gestionada"/>
                            <?php }?>
                        </td>                                                                        
                        <td style="text-align: center;width: 4%;"><a id="editarTarea" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
tareas/editar_tarea/<?php echo $_smarty_tpl->tpl_vars['ta']->value['idTarea'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
accionesTabla/editar.png" alt="Editar"/></a></td>
                        <td style="text-align: center;width: 4%;"><a id="eliminarTarea" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
tareas/eliminar_tarea/<?php echo $_smarty_tpl->tpl_vars['ta']->value['idTarea'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
accionesTabla/eliminar.png" alt="Eliminar"/></a></td>
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

<?php }} ?>
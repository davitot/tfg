<?php /* Smarty version Smarty-3.1.8, created on 2016-02-16 20:22:18
         compiled from "D:\xampp\htdocs\tfg\modules\recursos\views\index\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:87569d4896248323-32372316%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c09d00f6e4ea33cb0bf9ce1eef2a7f5319b820a' => 
    array (
      0 => 'D:\\xampp\\htdocs\\tfg\\modules\\recursos\\views\\index\\index.tpl',
      1 => 1455650534,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '87569d4896248323-32372316',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_569d48962dd675_02021225',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'recursos' => 0,
    'rec' => 0,
    'marcas' => 0,
    'marca' => 0,
    'recurso' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569d48962dd675_02021225')) {function content_569d48962dd675_02021225($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp\\htdocs\\tfg\\libs\\smarty\\libs\\plugins\\modifier.date_format.php';
?><link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
modules/recursos/views/index/css/estilosRecursos.css" rel="stylesheet" type="text/css" />
<!-- header -->
<header>
    <h2>Gestión de Recursos</h2>        
</header>  
<!-- /header -->
<script src="js/recursos.js" type="text/javascript"></script>
<!-- Filtros -->
<div class="filtros2 subfiltros">
    <table>
        <tr class="spaceUnder">
            <td>
                <input type="text" id="nombre" placeholder="S/N...">
            </td>
            <td  style="vertical-align: middle;">
                <a href="#" onclick="paginacion();
                        return false;" id="btnBuscar">&nbsp;&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/icono_lupa.png" title="Buscar"/></a>
            </td>
        </tr> 
        <tr>
            <td> <select id="tipoRecurso" style="height: 24px; width: 170px;">
                    <option>
                        -- Tipo --
                    </option>
                    <?php if (isset($_smarty_tpl->tpl_vars['recursos']->value)&&count($_smarty_tpl->tpl_vars['recursos']->value)){?>
                        <?php  $_smarty_tpl->tpl_vars['rec'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rec']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recursos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rec']->key => $_smarty_tpl->tpl_vars['rec']->value){
$_smarty_tpl->tpl_vars['rec']->_loop = true;
?>
                            <option value='<?php echo $_smarty_tpl->tpl_vars['rec']->value['tipo'];?>
'>
                                <?php echo $_smarty_tpl->tpl_vars['rec']->value['tipo'];?>
   
                            </option>                    
                        <?php } ?>
                    <?php }?>
                </select>   
            </td>
            <td> <select id="marca" style="height: 24px; width: 170px;">
                    <option>
                        -- Marca --
                    </option>
                    <?php if (isset($_smarty_tpl->tpl_vars['marcas']->value)&&count($_smarty_tpl->tpl_vars['marcas']->value)){?>
                        <?php  $_smarty_tpl->tpl_vars['marca'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['marca']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['marcas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['marca']->key => $_smarty_tpl->tpl_vars['marca']->value){
$_smarty_tpl->tpl_vars['marca']->_loop = true;
?>
                            <option value='<?php echo $_smarty_tpl->tpl_vars['marca']->value['marca'];?>
'>
                                <?php echo $_smarty_tpl->tpl_vars['marca']->value['marca'];?>
   
                            </option>                    
                        <?php } ?>
                    <?php }?>
                </select>   
            </td>
            <td><button type="button" class="limpiar" id="limpiarCampos">&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/brocha.png" alt="Limpiar"/></button></td>
        </tr>
    </table>
</div>

<!-- nav-->
<nav>
    <table style="text-align: center; font-size: 11px;">
        <tr>
            <td>
                <?php if (Session::acceso(Session::get('level'))){?>  
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
recursos/index/nuevo_recurso"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
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

<!-- ImagenPersonal-->
<div id="imagenUpDcha">
    <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
modules/recursos/views/index/img/personal.png" alt=""/>
</div>

<div id="refrescar">
    <!-- listadoPersonal -->
    <div id="listadoIndex">
        <?php if (isset($_smarty_tpl->tpl_vars['recursos']->value)&&count($_smarty_tpl->tpl_vars['recursos']->value)){?>
            <table id="tablaListado">
                <tr>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Num. Serie</th>
                    <th>Fecha Alta</th>                    
                    <th>Disponible</th>                       
                        <?php if (Session::acceso(Session::get('level'))){?>
                        <th colspan="2">Acciones</th>                        
                        <?php }?>

                </tr>

                <?php  $_smarty_tpl->tpl_vars['recurso'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['recurso']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recursos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['recurso']->key => $_smarty_tpl->tpl_vars['recurso']->value){
$_smarty_tpl->tpl_vars['recurso']->_loop = true;
?>
                    <tr>
                        <td style="width: 12%;"><?php echo $_smarty_tpl->tpl_vars['recurso']->value['tipo'];?>
</td>
                        <td style="width: 10%;"><?php echo $_smarty_tpl->tpl_vars['recurso']->value['marca'];?>
</td>
                        <td style="width: 7%;"><?php echo $_smarty_tpl->tpl_vars['recurso']->value['modelo'];?>
</td>                        
                        <td style="width: 7%;"><?php echo $_smarty_tpl->tpl_vars['recurso']->value['num_serie'];?>
</td>
                        <td style="text-align: center; width: 4%;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['recurso']->value['fecha_alta'],"%d/%m/%Y");?>
</td>    
                        <td style="text-align: center; width: 5%;">
                            <?php if ($_smarty_tpl->tpl_vars['recurso']->value['activo']==0){?>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/accionesTabla/gestionada.png" title="Recurso disponible"/>
                            <?php }else{ ?>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/accionesTabla/noGestionada.png" title="Asignado a:  <?php echo $_smarty_tpl->tpl_vars['recurso']->value['empleado'];?>
  el  <?php echo $_smarty_tpl->tpl_vars['recurso']->value['fecha_alta'];?>
"/>
                            <?php }?>
                        </td>  
                        <?php if (Session::acceso(Session::get('level'))){?>                            
                            <td style="width: 0.4%; text-align: center;"><a href="./recursos/index/editar_recurso/<?php echo $_smarty_tpl->tpl_vars['recurso']->value['idRecurso'];?>
"><img src="./public/img/accionesTabla/editar.png" alt="Editar"/></a></td>                        
                                    <?php if ($_smarty_tpl->tpl_vars['recurso']->value['activo']==0){?>
                                <td style="width: 0.4%; text-align: center;"><img src="./public/img/accionesTabla/eliminar_nolevel.png" title="Recurso disponible"/>
                                <?php }else{ ?>
                                <td style="width: 0.4%; text-align: center;"><a href="#" onClick="confirmarBorrado(<?php echo $_smarty_tpl->tpl_vars['recurso']->value['idRecurso'];?>
)"><img src="./public/img/accionesTabla/eliminar.png" title="Liberar"/></a>
                                    <?php }?>
                                <?php }?>                    
                            <?php } ?>
            </table>

        <?php }else{ ?>

            <p><strong>No hay recursos coincidencies con el criterio.</strong></p>

            <p><img src="./public/img/calendario_blank.png" alt="Sin resultados"/></p>

        <?php }?>                       
    </div>
    <div id="paginacion">
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['paginacion']->value)===null||$tmp==='' ? '' : $tmp);?>

    </div>
</div>
<?php }} ?>
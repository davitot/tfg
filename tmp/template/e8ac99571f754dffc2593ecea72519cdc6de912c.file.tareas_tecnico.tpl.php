<?php /* Smarty version Smarty-3.1.8, created on 2016-02-11 18:37:43
         compiled from "D:\xampp\htdocs\tfg\modules\migraciones\views\index\tareas_tecnico.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1305956b6781ca5bba9-31112361%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8ac99571f754dffc2593ecea72519cdc6de912c' => 
    array (
      0 => 'D:\\xampp\\htdocs\\tfg\\modules\\migraciones\\views\\index\\tareas_tecnico.tpl',
      1 => 1455172563,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1305956b6781ca5bba9-31112361',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56b6781cb37799_36176762',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'comunidades' => 0,
    'comunidad' => 0,
    'tareas' => 0,
    'ta' => 0,
    'provincia' => 0,
    'antComunidad' => 0,
    'antProvincia' => 0,
    'title' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56b6781cb37799_36176762')) {function content_56b6781cb37799_36176762($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp\\htdocs\\tfg\\libs\\smarty\\libs\\plugins\\modifier.date_format.php';
?><link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
modules/migraciones/views/index/css/estilosMigracion.css" rel="stylesheet" type="text/css" />

<!-- header -->
<header>
    <h2>Listado de Tareas de migración</h2>    
</header>  
<!-- header -->

<!-- filtros -->
<div id="filtros">
    <table>
        <th>
            Comunidad
        </th>
        <th>
            Fecha Incio
        </th>
        <th>
            Fecha Fin
        </th>        
        <tr>
            <td> <select id="comunidad" style="height: 24px;">
                    <option>
                        ...
                    </option>
                    <?php  $_smarty_tpl->tpl_vars['comunidad'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comunidad']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comunidades']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comunidad']->key => $_smarty_tpl->tpl_vars['comunidad']->value){
$_smarty_tpl->tpl_vars['comunidad']->_loop = true;
?>                    
                        <option value='<?php echo $_smarty_tpl->tpl_vars['comunidad']->value['comunidad'];?>
'>
                            <?php echo $_smarty_tpl->tpl_vars['comunidad']->value['comunidad'];?>
   
                        </option>                         
                    <?php } ?>
                </select>   
            </td>
            <td> 
                 <input type="date" id="fechaInicio" style="height: 16px;"/>
            </td>
            <td>  <input type="date" id="fechaFin" style="height: 16px;"/>
            </td>           
            <td><button type="button" class="limpiar" id="limpiarFiltroInforme"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/brocha.png" alt="Limpiar"/></button></td>           
        </tr>
    </table>
</div>

<!-- nav -->        
<nav>        
    <table style="text-align: center; font-size: 11px;">
        <tr>
            <td>
                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/impresora.png" alt="nada"/>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;Imprimir
            </td>
        </tr>
        <tr>
            <td>
                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/vacio.png" alt="nada"/>
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
public/img/nav/vacio.png" alt="nada"/>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
tareas">&nbsp;&nbsp;&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/atras.png" alt="Agregar"/></a>
            </td>
        </tr>       
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;Volver
            </td>
        </tr>
    </table>                                           
</nav>

<!-- Refrescar -->
<div id="refrescar">
    <!-- ListadoMigracion -->
    <div id="listadoIndex" style="text-align: center;">      
        <?php if (isset($_smarty_tpl->tpl_vars['tareas']->value)&&count($_smarty_tpl->tpl_vars['tareas']->value)){?>
            <table id="tablaListado">       
                <tr>
                    <th>Comunidad</th>
                    <th>Provincia</th>
                    <th>Sede</th>
                    <th>Titulo</th>                    
                    <th style="width: 30px; ">Inicio</th>
                    <th style="width: 30px; ">Fin</th>
                </tr>
                <?php $_smarty_tpl->tpl_vars['comunidad'] = new Smarty_variable('', null, 0);?>                
                <?php $_smarty_tpl->tpl_vars['provincia'] = new Smarty_variable('', null, 0);?> 
                <?php $_smarty_tpl->tpl_vars['antComunidad'] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars['antProvincia'] = new Smarty_variable('', null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['ta'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ta']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tareas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ta']->key => $_smarty_tpl->tpl_vars['ta']->value){
$_smarty_tpl->tpl_vars['ta']->_loop = true;
?>
                    <?php $_smarty_tpl->tpl_vars['antComunidad'] = new Smarty_variable($_smarty_tpl->tpl_vars['comunidad']->value, null, 0);?>
                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ta']->value['comunidad'];?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['comunidad'] = new Smarty_variable($_tmp1, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['antProvincia'] = new Smarty_variable($_smarty_tpl->tpl_vars['provincia']->value, null, 0);?>
                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ta']->value['provincia'];?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['provincia'] = new Smarty_variable($_tmp2, null, 0);?>
                    <tr>    
                    <?php if ($_smarty_tpl->tpl_vars['comunidad']->value!=$_smarty_tpl->tpl_vars['antComunidad']->value){?>
                            <td><?php echo $_smarty_tpl->tpl_vars['ta']->value['comunidad'];?>
</td>
                            <?php $_smarty_tpl->tpl_vars['comunidad'] = new Smarty_variable($_smarty_tpl->tpl_vars['ta']->value['comunidad'], null, 0);?>
                        <?php }else{ ?>
                            <td>&nbsp;</td>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['provincia']->value!=$_smarty_tpl->tpl_vars['antProvincia']->value){?>
                            <td><?php echo $_smarty_tpl->tpl_vars['ta']->value['provincia'];?>
</td>
                            <?php $_smarty_tpl->tpl_vars['provincia'] = new Smarty_variable($_smarty_tpl->tpl_vars['ta']->value['provincia'], null, 0);?>
                        <?php }else{ ?>
                            <td>&nbsp;</td>
                        <?php }?>   
                          <td><?php echo $_smarty_tpl->tpl_vars['ta']->value['sede'];?>
</td> 
                         <td>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
pdf/generar_InformeTarea/<?php echo $_smarty_tpl->tpl_vars['ta']->value['idPersonal'];?>
/<?php echo $_smarty_tpl->tpl_vars['ta']->value['idTarea'];?>
"><?php echo $_smarty_tpl->tpl_vars['ta']->value['titulo'];?>
</a>
                            </td>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ta']->value['fecha_inicio'],"%d/%m/%Y");?>
</td>
                        <?php if ($_smarty_tpl->tpl_vars['ta']->value['fecha_fin']==''||$_smarty_tpl->tpl_vars['ta']->value['fecha_fin']=='0000-00-00'){?>
                            <td style="text-align: center;"> <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/accionesTabla/noGestionada.png" title="Iniciada: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ta']->value['fecha_inicio'],"%d/%m/%Y");?>
"/> </td>
                            <?php }else{ ?>
                                <?php ob_start();?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ta']->value['fecha_inicio'],"%d/%m/%Y");?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ta']->value['fecha_fin'],"%d/%m/%Y");?>
<?php $_tmp4=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable("Iniciada:     ".$_tmp3." \nFinalizada: ".$_tmp4, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable(htmlentities($_smarty_tpl->tpl_vars['title']->value), null, 0);?>
                            <td style="text-align: center;"> <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/accionesTabla/gestionada.png" title="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
"/> </td>
                            <?php }?>                        
                    </tr>
                <?php } ?>
            </table> 
        <?php }else{ ?>
            <p><strong>No hay resultados disponibles.&nbsp;&nbsp;&nbsp; <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/calendario_blank.png" alt="Editar"/></strong></p>
                <?php }?>                                
    </div>   

    <div id="contador">
        Registros: <?php echo count($_smarty_tpl->tpl_vars['tareas']->value);?>

    </div>

    <!-- Paginacion -->
    <div id="paginacion">        
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['paginacion']->value)===null||$tmp==='' ? '' : $tmp);?>

    </div>
</div>
<!-- Refrescar -->

<!-- imagenTareasTecnico -->
<div id="imagenUpDcha">
    <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/imgsUp/comunidades.png" alt=""/>
</div>
<!-- imagenTareasTecnico --><?php }} ?>
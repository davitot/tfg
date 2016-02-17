<?php /* Smarty version Smarty-3.1.8, created on 2016-02-11 18:37:35
         compiled from "D:\xampp\htdocs\tfg\modules\migraciones\views\index\informe_totales.tpl" */ ?>
<?php /*%%SmartyHeaderCode:253956b24c451766c4-67348121%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92a2d8831e9ed3627746cfef49e49e70e3ff39bf' => 
    array (
      0 => 'D:\\xampp\\htdocs\\tfg\\modules\\migraciones\\views\\index\\informe_totales.tpl',
      1 => 1455172562,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '253956b24c451766c4-67348121',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56b24c45208b87_58584003',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'comunidades' => 0,
    'comunidad' => 0,
    'provincias' => 0,
    'provincia' => 0,
    'sedes' => 0,
    'sede' => 0,
    'resultados' => 0,
    'datos' => 0,
    'antComunidad' => 0,
    'antProvincia' => 0,
    'antSede' => 0,
    'contador' => 0,
    'paginacion' => 0,
    'pendientes' => 0,
    'i' => 0,
    'realizadas' => 0,
    'noAplica' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56b24c45208b87_58584003')) {function content_56b24c45208b87_58584003($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
modules/migraciones/views/index/css/estilosMigracion.css" rel="stylesheet" type="text/css" />

<!-- header -->
<header>
    <h2>Gestión de Migraciones</h2>    
</header>  

<!-- filtros -->
<div id="filtros">
    <table>
        <th>
            Comunidad
        </th>
        <th>
            Provincia
        </th>
        <th>
            Sede
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
            <td> <select id="provincia" style="height: 24px;">
                    <option>
                        ...
                    </option>
                    <?php  $_smarty_tpl->tpl_vars['provincia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['provincia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['provincias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['provincia']->key => $_smarty_tpl->tpl_vars['provincia']->value){
$_smarty_tpl->tpl_vars['provincia']->_loop = true;
?>                    
                        <option value='<?php echo $_smarty_tpl->tpl_vars['provincia']->value['provincia'];?>
'>
                            <?php echo $_smarty_tpl->tpl_vars['provincia']->value['provincia'];?>
   
                        </option>                         
                    <?php } ?>
                </select>   
            </td>
            <td> <select id="sede" style="height: 24px;">
                    <option>
                        ...
                    </option>
                    <?php  $_smarty_tpl->tpl_vars['sede'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sede']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sedes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sede']->key => $_smarty_tpl->tpl_vars['sede']->value){
$_smarty_tpl->tpl_vars['sede']->_loop = true;
?>                    
                        <option value='<?php echo $_smarty_tpl->tpl_vars['sede']->value['sede'];?>
'>
                            <?php echo $_smarty_tpl->tpl_vars['sede']->value['sede'];?>
   
                        </option>                         
                    <?php } ?>
                </select>   
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
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
migraciones/index/informe_totalesTecComu"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/impresora.png" alt="nada"/></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                Tecnicos->Comunidad
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
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
pdf/generar_InformeEstado"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/impresora.png" alt="nada"/></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;Imprimir
            </td>
        </tr>
        <tr>
            <td>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
migraciones">&nbsp;&nbsp;&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
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
<!-- nav -->        

<!-- Refrescar -->
<div id="refrescar">
    <!-- ListadoMigracion -->
    <div id="listadoIndex" style="text-align: center;">      
        <?php if (isset($_smarty_tpl->tpl_vars['resultados']->value)&&count($_smarty_tpl->tpl_vars['resultados']->value)){?>           
            <table id="tablaListado">
                <tr>                    
                    <th>Comunidad</th>
                    <th>Provincia</th>                                            
                    <th>Sede</th>     
                    <th>Organo</th>
                    <th>Pendientes</th>
                    <th>Realizadas</th>     
                    <th>No Aplica</th>                         
                </tr>
                <?php $_smarty_tpl->tpl_vars['comunidad'] = new Smarty_variable('', null, 0);?>                
                <?php $_smarty_tpl->tpl_vars['provincia'] = new Smarty_variable('', null, 0);?> 
                <?php $_smarty_tpl->tpl_vars['sede'] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars['antComunidad'] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars['antProvincia'] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars['antSede'] = new Smarty_variable('', null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['datos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['resultados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['datos']->key => $_smarty_tpl->tpl_vars['datos']->value){
$_smarty_tpl->tpl_vars['datos']->_loop = true;
?>                
                    <?php $_smarty_tpl->tpl_vars['antComunidad'] = new Smarty_variable($_smarty_tpl->tpl_vars['comunidad']->value, null, 0);?>
                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['datos']->value['comunidad'];?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['comunidad'] = new Smarty_variable($_tmp1, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['antProvincia'] = new Smarty_variable($_smarty_tpl->tpl_vars['provincia']->value, null, 0);?>
                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['datos']->value['provincia'];?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['provincia'] = new Smarty_variable($_tmp2, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['antSede'] = new Smarty_variable($_smarty_tpl->tpl_vars['sede']->value, null, 0);?>
                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['datos']->value['sede'];?>
<?php $_tmp3=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['sede'] = new Smarty_variable($_tmp3, null, 0);?>
                    <tr style="text-align: center;"> 
                        <?php if ($_smarty_tpl->tpl_vars['comunidad']->value!=$_smarty_tpl->tpl_vars['antComunidad']->value){?>
                            <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['comunidad'];?>
</td>
                            <?php $_smarty_tpl->tpl_vars['comunidad'] = new Smarty_variable($_smarty_tpl->tpl_vars['datos']->value['comunidad'], null, 0);?>
                        <?php }else{ ?>
                            <td>&nbsp;</td>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['provincia']->value!=$_smarty_tpl->tpl_vars['antProvincia']->value){?>
                            <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['provincia'];?>
</td>
                            <?php $_smarty_tpl->tpl_vars['provincia'] = new Smarty_variable($_smarty_tpl->tpl_vars['datos']->value['provincia'], null, 0);?>
                        <?php }else{ ?>
                            <td>&nbsp;</td>
                        <?php }?> 
                        <?php if ($_smarty_tpl->tpl_vars['sede']->value!=$_smarty_tpl->tpl_vars['antSede']->value){?>
                            <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['sede'];?>
</td>
                            <?php $_smarty_tpl->tpl_vars['sede'] = new Smarty_variable($_smarty_tpl->tpl_vars['datos']->value['sede'], null, 0);?>
                        <?php }else{ ?>
                            <td>&nbsp;</td>
                        <?php }?>                       
                        <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['organo'];?>
</td>                                                 
                        <td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['datos']->value['pendientes'];?>
</td>
                        <td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['datos']->value['realizadas'];?>
</td>
                        <td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['datos']->value['no_aplica'];?>
</td>                        
                    </tr>
                <?php } ?>
            </table>
        <?php }else{ ?>
            <p><strong>No hay resultados disponibles.&nbsp;&nbsp;&nbsp; <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
/public/img/calendario_blank.png" alt="Editar"/></strong></p>
                <?php }?>              
    </div>   

    <div id="contador">
        Registros: <?php echo $_smarty_tpl->tpl_vars['contador']->value;?>

    </div>

    <!-- Paginacion -->
    <div id="paginacion">        
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['paginacion']->value)===null||$tmp==='' ? '' : $tmp);?>

    </div>
</div>
<!-- Refrescar -->

<!-- Totales -->
<div id="resumenTotales">       
    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
    <?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable(0, null, 0);?>
    <?php $_smarty_tpl->tpl_vars['totalRealizadas'] = new Smarty_variable(0, null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['datos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pendientes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['datos']->key => $_smarty_tpl->tpl_vars['datos']->value){
$_smarty_tpl->tpl_vars['datos']->_loop = true;
?>             
        <?php if (isset($_smarty_tpl->tpl_vars['datos']->value)){?>
        <table id="tablaTotales">        
            <strong><?php echo $_smarty_tpl->tpl_vars['datos']->value['comunidad'];?>
</strong>
            <th>Realizadas</th>
            <th>Pendientes</th>
            <th>No Aplica</th>        
            <tr>
                <?php if (isset($_smarty_tpl->tpl_vars['realizadas']->value[$_smarty_tpl->tpl_vars['i']->value])){?>
                <td style=" text-align: center;"><?php echo $_smarty_tpl->tpl_vars['realizadas']->value[$_smarty_tpl->tpl_vars['i']->value]['realizadas'];?>
</td>
                <?php }else{ ?>
                    <td>0</td>
                <?php }?>
                <td style=" text-align: center;"><?php echo $_smarty_tpl->tpl_vars['datos']->value['pendientes'];?>
</td>
                <?php if (isset($_smarty_tpl->tpl_vars['noAplica']->value[$_smarty_tpl->tpl_vars['i']->value])){?>
                <td style=" text-align: center;"><?php echo $_smarty_tpl->tpl_vars['noAplica']->value[$_smarty_tpl->tpl_vars['i']->value]['noAplica'];?>
</td>
                <?php }else{ ?>
                    <td>0</td>
                <?php }?>                                
            </tr>        
        </table>        
        <br/>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>        
        <?php }?>
    <?php } ?>
</div>
<!-- /Totales -->    

<!-- imagenMigracion -->
<div id="imagenUpDcha">
     <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/imgsUp/comunidades.png" title="Gestion de migraciones"/>
</div>
<!-- imagenMigracion --><?php }} ?>
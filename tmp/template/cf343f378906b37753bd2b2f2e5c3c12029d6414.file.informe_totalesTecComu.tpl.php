<?php /* Smarty version Smarty-3.1.8, created on 2016-02-10 10:10:21
         compiled from "C:\xampp\htdocs\tfg\modules\migraciones\views\index\informe_totalesTecComu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200356b9cad0a9b8f2-12003370%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf343f378906b37753bd2b2f2e5c3c12029d6414' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tfg\\modules\\migraciones\\views\\index\\informe_totalesTecComu.tpl',
      1 => 1455050331,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200356b9cad0a9b8f2-12003370',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56b9cad0ba14a1_20489645',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'comunidades' => 0,
    'comunidad' => 0,
    'resultados' => 0,
    'datos' => 0,
    'provincia' => 0,
    'antComunidad' => 0,
    'antProvincia' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56b9cad0ba14a1_20489645')) {function content_56b9cad0ba14a1_20489645($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
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
        <tr>
            <td> <select id="comunidad" style="height: 24px;">                  
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
            <td><button type="button" class="limpiar" id="limpiarFiltroInforme"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/brocha.png" alt="Limpiar"/></button></td>           
        </tr>
    </table>
</div>
<!-- /filtros -->

<!-- nav -->        
<nav>        
    <table style="text-align: center; font-size: 11px;">
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
                &nbsp;&nbsp;&nbsp;Imprimirg
            </td>
        </tr>
        <tr>
            <td>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
migraciones/index/informe_estado">&nbsp;&nbsp;&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
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
    <!-- ListadoResumen -->
    <div id="TotalesxComumidad">
        <?php $_smarty_tpl->tpl_vars['comunidad'] = new Smarty_variable('', null, 0);?>
        <?php $_smarty_tpl->tpl_vars['antComunidad'] = new Smarty_variable('', null, 0);?> 
        <?php $_smarty_tpl->tpl_vars['provincia'] = new Smarty_variable('', null, 0);?>
        <?php $_smarty_tpl->tpl_vars['antProvincia'] = new Smarty_variable('', null, 0);?> 
        <table id="tablaListado">                                                              
            <?php  $_smarty_tpl->tpl_vars['datos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['resultados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['datos']->key => $_smarty_tpl->tpl_vars['datos']->value){
$_smarty_tpl->tpl_vars['datos']->_loop = true;
?>
                <?php $_smarty_tpl->tpl_vars['antComunidad'] = new Smarty_variable($_smarty_tpl->tpl_vars['comunidad']->value, null, 0);?>
                <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['datos']->value['comunidad'];?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['comunidad'] = new Smarty_variable($_tmp1, null, 0);?>  
                <?php $_smarty_tpl->tpl_vars['antProvincia'] = new Smarty_variable($_smarty_tpl->tpl_vars['provincia']->value, null, 0);?>
                <?php $_smarty_tpl->tpl_vars['provincia'] = new Smarty_variable($_smarty_tpl->tpl_vars['datos']->value['provincia'], null, 0);?>                 
                <?php if ($_smarty_tpl->tpl_vars['comunidad']->value!=$_smarty_tpl->tpl_vars['antComunidad']->value){?>                   
                    <tr style="text-align: center;">                                                             
                        <th colspan="2"><?php echo $_smarty_tpl->tpl_vars['datos']->value['comunidad'];?>
</th>
                            <?php $_smarty_tpl->tpl_vars['comunidad'] = new Smarty_variable($_smarty_tpl->tpl_vars['datos']->value['comunidad'], null, 0);?>                        
                    </tr>                                        
                <?php }?>   
                <?php if ($_smarty_tpl->tpl_vars['provincia']->value!=$_smarty_tpl->tpl_vars['antProvincia']->value){?>
                    <tr style="text-align: center;">                                                             
                        <td colspan="2"><strong><?php echo $_smarty_tpl->tpl_vars['datos']->value['provincia'];?>
</strong></td>
                            <?php $_smarty_tpl->tpl_vars['provincia'] = new Smarty_variable($_smarty_tpl->tpl_vars['datos']->value['provincia'], null, 0);?>                        
                    </tr>  
                <?php }?>  
                <tr>
                    <td style="text-align: left;"><?php echo $_smarty_tpl->tpl_vars['datos']->value['tecnico'];?>
</td>
                    <td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['datos']->value['totales'];?>
</td>                    
                </tr>               
            <?php } ?>
        </table>
    </div>  
</div>
<!-- Refrescar -->


<!-- imagenMigracion -->
<div id="imagenUpDcha">
    <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/imgsUp/comunidades.png" title="Gestion de migraciones"/>
</div>
<!-- imagenMigracion --><?php }} ?>
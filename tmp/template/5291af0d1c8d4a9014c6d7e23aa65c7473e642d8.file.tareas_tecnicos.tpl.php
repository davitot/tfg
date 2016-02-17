<?php /* Smarty version Smarty-3.1.8, created on 2016-02-07 01:25:49
         compiled from "D:\xampp\htdocs\tfg\modules\migraciones\views\index\ajax\tareas_tecnicos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1346256b6852249f274-61689264%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5291af0d1c8d4a9014c6d7e23aa65c7473e642d8' => 
    array (
      0 => 'D:\\xampp\\htdocs\\tfg\\modules\\migraciones\\views\\index\\ajax\\tareas_tecnicos.tpl',
      1 => 1454804744,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1346256b6852249f274-61689264',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56b6852254a756_09106219',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'tareas' => 0,
    'comunidad' => 0,
    'ta' => 0,
    'provincia' => 0,
    'antComunidad' => 0,
    'antProvincia' => 0,
    'title' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56b6852254a756_09106219')) {function content_56b6852254a756_09106219($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp\\htdocs\\tfg\\libs\\smarty\\libs\\plugins\\modifier.date_format.php';
?><link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/migracion/css/estilosMigracion.css" rel="stylesheet" type="text/css" />       

<!-- ListadoTareas -->
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
                        <a href="../../../../../tfg/pdf/generar_Informe/<?php echo $_smarty_tpl->tpl_vars['ta']->value['idPersonal'];?>
/<?php echo $_smarty_tpl->tpl_vars['ta']->value['idTarea'];?>
"><?php echo $_smarty_tpl->tpl_vars['ta']->value['titulo'];?>
</a>
                    </td>
                    <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ta']->value['fecha_inicio'],"%d/%m/%Y");?>
</td>
                    <?php if ($_smarty_tpl->tpl_vars['ta']->value['fecha_fin']==''||$_smarty_tpl->tpl_vars['ta']->value['fecha_fin']=='0000-00-00'){?>
                        <td style="text-align: center;"><img src="../../../../../tfg/public/img/accionesTabla/noGestionada.png" title="Iniciada: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ta']->value['fecha_inicio'],"%d/%m/%Y");?>
"/> </td>
                        <?php }else{ ?>
                            <?php ob_start();?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ta']->value['fecha_inicio'],"%d/%m/%Y");?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ta']->value['fecha_fin'],"%d/%m/%Y");?>
<?php $_tmp4=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable("Iniciada:     ".$_tmp3." \nFinalizada: ".$_tmp4, null, 0);?>
                            <?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable(htmlentities($_smarty_tpl->tpl_vars['title']->value), null, 0);?>
                        <td style="text-align: center;"><img src="../../../../../tfg/public/img/accionesTabla/gestionada.png" title="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
"/> </td>
                        <?php }?>                        
                </tr>
            <?php } ?>
        </table> 
    <?php }else{ ?>
        <p><strong>No hay resultados disponibles.&nbsp;&nbsp;&nbsp; <img src="../../../../../tfg/public/img/calendario_blank.png" alt="Editar"/></strong></p>
            <?php }?>                                
</div>   

<div id="contador">
    Registros: <?php echo count($_smarty_tpl->tpl_vars['tareas']->value);?>

</div>

<!-- Paginacion -->
<div id="paginacion">        
    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['paginacion']->value)===null||$tmp==='' ? '' : $tmp);?>

</div>
<?php }} ?>
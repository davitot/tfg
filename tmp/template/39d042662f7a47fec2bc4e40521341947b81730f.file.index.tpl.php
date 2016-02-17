<?php /* Smarty version Smarty-3.1.8, created on 2015-10-09 13:34:35
         compiled from "C:\xampp\htdocs\tfg\views\tareas\ajax\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2127755c483061da5f7-77965415%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39d042662f7a47fec2bc4e40521341947b81730f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tfg\\views\\tareas\\ajax\\index.tpl',
      1 => 1444390471,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2127755c483061da5f7-77965415',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55c483062a96a6_19877421',
  'variables' => 
  array (
    'tareas' => 0,
    'ta' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c483062a96a6_19877421')) {function content_55c483062a96a6_19877421($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\tfg\\libs\\smarty\\libs\\plugins\\modifier.date_format.php';
?><!-- ListadoTareas -->
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
                            <img src="./views/tareas/img/gestionada.png" alt="Gestionada"/>
                        <?php }else{ ?>
                            <img src="./views/tareas/img/noGestionada.png" alt="No Gestionada"/>
                        <?php }?>
                    </td>
                    <td style="text-align: center;"><a href="./tareas/editar_tarea/<?php echo $_smarty_tpl->tpl_vars['ta']->value['idTarea'];?>
"><img src="./public/img/accionesTabla/editar.png" alt="Editar"/></a></td>
                    <td style="text-align: center;"><a href="./tareas/gestionarTarea/<?php echo $_smarty_tpl->tpl_vars['ta']->value['idTarea'];?>
"><img src="./public/img/accionesTabla/eliminar.png" alt="Eliminar"/></a></td>
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
 
</div><?php }} ?>
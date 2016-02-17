<?php /* Smarty version Smarty-3.1.8, created on 2016-01-21 10:51:10
         compiled from "C:\xampp\htdocs\tfg\modules\recursos\views\index\ajax\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:529056a088d5887381-86932857%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a740eb4951d185e8774e89251146f3d76eab6f8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tfg\\modules\\recursos\\views\\index\\ajax\\index.tpl',
      1 => 1453369868,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '529056a088d5887381-86932857',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56a088d59331a9_64727028',
  'variables' => 
  array (
    'recursos' => 0,
    'datos' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a088d59331a9_64727028')) {function content_56a088d59331a9_64727028($_smarty_tpl) {?><div id="listadoIndex">
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

                <?php  $_smarty_tpl->tpl_vars['datos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recursos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['datos']->key => $_smarty_tpl->tpl_vars['datos']->value){
$_smarty_tpl->tpl_vars['datos']->_loop = true;
?>
                    <tr>
                        <td style="width: 12%;"><?php echo $_smarty_tpl->tpl_vars['datos']->value['tipo'];?>
</td>
                        <td style="width: 10%;"><?php echo $_smarty_tpl->tpl_vars['datos']->value['marca'];?>
</td>
                        <td style="width: 7%;"><?php echo $_smarty_tpl->tpl_vars['datos']->value['modelo'];?>
</td>                        
                        <td style="width: 7%;"><?php echo $_smarty_tpl->tpl_vars['datos']->value['num_serie'];?>
</td>
                        <td style="text-align: center; width: 4%;"><?php echo $_smarty_tpl->tpl_vars['datos']->value['fecha_alta'];?>
</td>    
                        <td style="text-align: center; width: 5%;">
                            <?php if ($_smarty_tpl->tpl_vars['datos']->value['activo']==0){?>
                                <img src="./public/img/accionesTabla/gestionada.png" title="Recurso disponible"/>
                            <?php }else{ ?>
                                <img src="./public/img/accionesTabla/noGestionada.png" title="Asignado a:  <?php echo $_smarty_tpl->tpl_vars['datos']->value['empleado'];?>
  el  <?php echo $_smarty_tpl->tpl_vars['datos']->value['fecha_alta'];?>
"/>
                            <?php }?>
                        </td>  
                        <?php if (Session::acceso(Session::get('level'))){?>
                            <td style="width: 0.4%; text-align: center;"><a href="./recursos/index/editar_recurso/<?php echo $_smarty_tpl->tpl_vars['datos']->value['idRecurso'];?>
"><img src="./public/img/accionesTabla/editar.png" alt="Editar"/></a></td>                        
                            <td style="width: 0.4%; text-align: center;"><a href="./recursos/index/eliminar_recurso/<?php echo $_smarty_tpl->tpl_vars['datos']->value['idRecurso'];?>
"><img src="./public/img/accionesTabla/eliminar.png" alt="Eliminar"/></a></td>
                                <?php }?>                    
                <?php } ?>
            </table>

        <?php }else{ ?>
            <p><strong>No hay recursos coincidentes con el criterio.</strong></p>
            <p><img src="./public/img/calendario_blank.png" alt="Sin resultados"/></p>
        <?php }?>                       
    </div>

<!-- Paginacion -->
<div id="paginacion">
    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['paginacion']->value)===null||$tmp==='' ? '' : $tmp);?>

</div><?php }} ?>
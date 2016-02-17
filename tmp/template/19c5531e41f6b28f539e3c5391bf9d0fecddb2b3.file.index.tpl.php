<?php /* Smarty version Smarty-3.1.8, created on 2016-02-05 14:20:23
         compiled from "C:\xampp\htdocs\tfg\modules\personal\views\index\ajax\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1578255c499666517f5-17971972%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19c5531e41f6b28f539e3c5391bf9d0fecddb2b3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tfg\\modules\\personal\\views\\index\\ajax\\index.tpl',
      1 => 1453970362,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1578255c499666517f5-17971972',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55c49966718ba7_98751573',
  'variables' => 
  array (
    'personal' => 0,
    'datos' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c49966718ba7_98751573')) {function content_55c49966718ba7_98751573($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\tfg\\libs\\smarty\\libs\\plugins\\modifier.date_format.php';
?><!-- listadoPersonal -->
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
                            <img src="./public/img/accionesTabla/gestionada.png" title="Usuario activo"/>
                        <?php }else{ ?>
                            <img src="./public/img/accionesTabla/noGestionada.png" title="Usuario inactivo"/>
                        <?php }?>
                    </td>  
                    <?php if (Session::acceso(Session::get('level'))){?>
                        <td style="width: 0.4%; text-align: center;"><a href="./personal/index/editar_personal/<?php echo $_smarty_tpl->tpl_vars['datos']->value['idPersonal'];?>
/<?php echo $_smarty_tpl->tpl_vars['datos']->value['idCargo'];?>
"><img src="./public/img/accionesTabla/editar.png" alt="Editar"/></a></td>                        
                        <td style="width: 0.4%; text-align: center;"><a href="./personal/index/eliminar_personal/<?php echo $_smarty_tpl->tpl_vars['datos']->value['idPersonal'];?>
/<?php echo $_smarty_tpl->tpl_vars['datos']->value['idCargo'];?>
"><img src="./public/img/accionesTabla/eliminar.png" alt="Eliminar"/></a></td>                        
                        <td style="width: 0.4%; text-align: center;"><a href="../acl/permisos_cargo/<?php echo $_smarty_tpl->tpl_vars['datos']->value['idCargo'];?>
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

</div><?php }} ?>
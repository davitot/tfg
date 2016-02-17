<?php /* Smarty version Smarty-3.1.8, created on 2016-01-14 20:25:19
         compiled from "D:\xampp\htdocs\tfg\views\migracion\ajax\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:391156067a697286b1-68789960%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2cad5ad72655b32badee65b780647362e38e09e3' => 
    array (
      0 => 'D:\\xampp\\htdocs\\tfg\\views\\migracion\\ajax\\index.tpl',
      1 => 1452796871,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '391156067a697286b1-68789960',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56067a697b2e89_41585810',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'migraciones' => 0,
    'datos' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56067a697b2e89_41585810')) {function content_56067a697b2e89_41585810($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/migracion/css/estilosMigracion.css" rel="stylesheet" type="text/css" />       

<!-- listado Migracion -->
<div id="listadoIndex">
    <?php if (isset($_smarty_tpl->tpl_vars['migraciones']->value)&&count($_smarty_tpl->tpl_vars['migraciones']->value)){?>          
        <table id="tablaListado">
            <tr>
                <th>Proceso</th>
                <th>Tipo</th>
                <th>NIF</th>
                <th>Nombre</th>                                            
                <th>Cargo</th>     
                <th>VIP</th>
                <th>Organo</th>
                <th>Comunidad</th>     
                <th>Provincia</th>
                <th>Desc. Sede</th>  
                <th>Teléfono</th>     
                <th>Dirección</th>
                <th>Traveler</th>  
                <th>Servidor Notes</th>     
                <th>Password</th>
                <th>id Lotus</th>  
                <th>Correo Notes</th>     
                <th>Fecha Planificada</th>
                <th>Fecha Inicio</th>  
                <th>Fecha Fin</th>     
                <th>Estado Inicial</th>
                <th>Estado Final</th>  
                <th>Observaciones</th>                         
                <th>Incidencia</th>    
            </tr>

            <?php  $_smarty_tpl->tpl_vars['datos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['migraciones']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['datos']->key => $_smarty_tpl->tpl_vars['datos']->value){
$_smarty_tpl->tpl_vars['datos']->_loop = true;
?>
                <tr>
                    <td><input type="text" name="proceso" size="8" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['proceso'];?>
"/></td>
                    <td><input type="text" name="organo" size="4" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['tipo'];?>
"/></td>
                    <td><input type="text" name="nif" size="7" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['nif'];?>
"/></td>
                    <td><input type="text" name="nombre" size="35" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['apellidos'];?>
, <?php echo $_smarty_tpl->tpl_vars['datos']->value['nombre'];?>
"/></td>
                    <td><input type="text" name="cargo" size="28" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['cargo'];?>
"/></td>
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['datos']->value['vip'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1==0){?>
                        <td style="text-align: center;"> <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
/views/tareas/img/noGestionada.png" alt="VIP"/> </td>
                        <?php }else{ ?>
                        <td style="text-align: center;"> <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
/views/tareas/img/gestionada.png" alt="VIP"/> </td>
                        <?php }?>                               
                    <td><input type="text" name="organo" size="65" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['organo'];?>
"/></td>
                    <td><input type="text" name="comunidad" size="20" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['comunidad'];?>
"/></td>
                    <td><input type="text" name="provincia" size="20" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['provincia'];?>
"/></td>
                    <td><input type="text" name="sede" size="45" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['desc_sede'];?>
"/></td>
                    <td><input type="text" name="telefono" size="15" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['telefono'];?>
"/></td>
                    <td><input type="text" name="direccion" size="45" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['direccion'];?>
"/></td>                        
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['datos']->value['traveler'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2==0){?>
                        <td style="text-align: center;"> <img src="./views/tareas/img/noGestionada.png" alt="VIP"/> </td>
                        <?php }else{ ?>
                        <td style="text-align: center;"> <img src="./views/tareas/img/gestionada.png" alt="VIP"/> </td>
                        <?php }?>
                    <td><input type="text" name="servidorNotes" size="25" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['servidorNotes'];?>
"/></td> 
                    <td><input type="text" name="password" size="10" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['password'];?>
"/></td> 
                    <td><input type="text" name="idLotus" size="5" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['idLotus'];?>
"/></td> 
                    <td><input type="text" name="correoNotes" size="45" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['correoNotes'];?>
"/></td> 
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['datos']->value['fecha_Planificada'];?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp3=="0000-00-00"){?>
                        <td><input type="text" name="fecha_Planificada" size="5" value="  /  /  "/></td> 
                        <?php }else{ ?>
                        <td><input type="text" name="fecha_Planificada" size="45" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['fecha_Planificada'];?>
"/></td> 
                        <?php }?>
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['datos']->value['fecha_Inicio'];?>
<?php $_tmp4=ob_get_clean();?><?php if ($_tmp4=="0000-00-00"){?>
                        <td><input type="text" name="fecha_Inicio" size="5" value="  /  /  "/></td> 
                        <?php }else{ ?>
                        <td><input type="text" name="fecha_Inicio" size="45" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['fecha_Inicio'];?>
"/></td> 
                        <?php }?>
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['datos']->value['fecha_Fin'];?>
<?php $_tmp5=ob_get_clean();?><?php if ($_tmp5=="0000-00-00"){?>
                        <td><input type="text" name="fecha_Fin" size="5" value="  /  /  "/></td> 
                        <?php }else{ ?>
                        <td><input type="text" name="fecha_Fin" size="45" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['fecha_Fin'];?>
"/></td> 
                        <?php }?>
                    <td><input type="text" name="estado_inicial" size="15" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['estado_inicial'];?>
"/></td> 
                    <td><input type="text" name="estado_final" size="25" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['estado_final'];?>
"/></td> 
                    <td><input type="text" name="observaciones" size="65" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['observaciones'];?>
"/></td> 
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['datos']->value['incidencia'];?>
<?php $_tmp6=ob_get_clean();?><?php if ($_tmp6==1){?>
                        <td style="text-align: center;"> <img src="./views/tareas/img/noGestionada.png" alt="VIP"/> </td>
                        <?php }else{ ?>
                        <td><input type="text" name="incidencia" size="7" value=" -- "/></td> 
                        <?php }?>                                                                              
                </tr>
            <?php } ?>                
        </table>        
    <?php }else{ ?>
        <p><strong>No hay migraciones registradas.&nbsp;&nbsp;&nbsp;
                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
calendario_blank.png" alt="Sin registros"/></strong></p>
            <?php }?> 
</div>

<!-- Paginacion -->
<div id="paginacion">        
    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['paginacion']->value)===null||$tmp==='' ? '' : $tmp);?>

</div><?php }} ?>
<?php /* Smarty version Smarty-3.1.8, created on 2016-02-17 00:51:24
         compiled from "D:\xampp\htdocs\tfg\modules\migraciones\views\index\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26776569fc6efe20ee6-27366456%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca13b5a09a8fb19cd2d7706254dd75f3acb9abe9' => 
    array (
      0 => 'D:\\xampp\\htdocs\\tfg\\modules\\migraciones\\views\\index\\index.tpl',
      1 => 1455666681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26776569fc6efe20ee6-27366456',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_569fc6f0050f58_68225631',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'procesos' => 0,
    'datos' => 0,
    'tecnicos' => 0,
    'tec' => 0,
    'migraciones' => 0,
    'pagina' => 0,
    'contador' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569fc6f0050f58_68225631')) {function content_569fc6f0050f58_68225631($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
modules/migraciones/views/index/css/estilosMigracion.css" rel="stylesheet" type="text/css" />
<!-- header -->
<header>
    <h2>Gestión de Migraciones</h2>      
</header>  
<!-- /header -->

<!-- Filtros -->
<div class="filtros2 subfiltros">
    <table>        
        <tr>
            <td>
                <select id="proceso" style="height: 24px;">
                    <option value="">
                        - Proceso -
                    </option>
                    <?php if (isset($_smarty_tpl->tpl_vars['procesos']->value)&&count($_smarty_tpl->tpl_vars['procesos']->value)){?>
                        <?php  $_smarty_tpl->tpl_vars['datos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['procesos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['datos']->key => $_smarty_tpl->tpl_vars['datos']->value){
$_smarty_tpl->tpl_vars['datos']->_loop = true;
?>                    
                            <option value='<?php echo $_smarty_tpl->tpl_vars['datos']->value['proceso'];?>
'>
                                <?php echo $_smarty_tpl->tpl_vars['datos']->value['proceso'];?>
   
                            </option>                         
                        <?php } ?>
                    <?php }?>
                </select>                 
            </td>
            <td>
                <select id="idPersonal" style="height: 21px;">
                    <option value="">
                        - Tecnico -
                    </option>
                    <?php if (isset($_smarty_tpl->tpl_vars['tecnicos']->value)&&count($_smarty_tpl->tpl_vars['tecnicos']->value)){?>
                        <?php  $_smarty_tpl->tpl_vars['tec'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tec']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tecnicos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tec']->key => $_smarty_tpl->tpl_vars['tec']->value){
$_smarty_tpl->tpl_vars['tec']->_loop = true;
?>
                            <option value='<?php echo $_smarty_tpl->tpl_vars['tec']->value['idPersonal'];?>
'>
                                <?php echo $_smarty_tpl->tpl_vars['tec']->value['nombre'];?>
   
                            </option>                    
                        <?php } ?>
                    <?php }?>
                </select>   
            </td>
            <td>
                <select id="idTarea" style="height: 21px;">
                    <option value="">
                        - Tarea -
                    </option>                    
                </select>   
            </td> 
        </tr>
        <tr>
            <td><select id="estado" style="height: 24px;">
                    <option value="">
                        - Estado -
                    </option>                    
                    <option value='PENDIENTE'>
                        Pendiente   
                    </option>
                    <option value='REALIZADA'>
                        Realizada
                    </option>
                    <option value='NO APLICA'>
                        No Aplica
                    </option>
                </select>   
            </td>               
            <td>
                <input type="date" id="fechaInicio" style="height: 16px;"/>
            </td>
            <td>
                <input type="date" id="fechaFin" style="height: 16px;"/>
            </td>
            <td style="vertical-align: middle;">                
                <a href="#" onclick="limpiar();
                        return false;" id="limpiarFecha">&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/brocha.png" title="Limpiar"/></a>               
            </td>
        </tr>
    </table>
</div>
<!-- /Filtros -->

<!-- nav -->        
<nav>        
    <table style="text-align: center; font-size: 11px;">
        <tr>
            <td>
                <?php if (Session::acceso(Session::get('level'))){?>  
                    <a href="" onclick="mostrar('selectorFichero');
                            return false;" >&nbsp;&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/agregar.png" title="Agregar"/></a>    
                    <?php }else{ ?>                
                    <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/agregar_noacceso.png" title="No permitido"/>
                <?php }?>                                                
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Importar
            </td>
        </tr>
        <tr>
            <td >
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
migraciones/index/informe_estado"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/informe.png" alt="Agregar"/></a>                
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Resumen
            </td>
        </tr>
        <tr>
            <td>
                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/impresora.png" title="Imprimir vista"/>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;&nbsp;&nbsp;Imprimir
            </td>
        </tr>
        <tr>
            <td>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
">&nbsp;&nbsp;&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
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
<!-- /nav -->  

<!-- Refrescar -->
<div id="refrescar">
    <!-- ListadoMigracion -->
    <div id="listadoIndex" style="width:auto;">      
        <?php if (isset($_smarty_tpl->tpl_vars['migraciones']->value)&&count($_smarty_tpl->tpl_vars['migraciones']->value)){?>          
            <table id="tablaListado">
                <tr>                                
                    <th>idLotus</th>
                    <th>Nombre</th>
                    <th>Cargo</th>
                    <th>Fecha inicio</th>
                    <th>Fecha Fin</th>
                    <th>Estado Inicial</th>
                    <th>Estado Final</th>                    
                    <th>Observaciones</th>
                </tr>

                <?php  $_smarty_tpl->tpl_vars['datos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['migraciones']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['datos']->key => $_smarty_tpl->tpl_vars['datos']->value){
$_smarty_tpl->tpl_vars['datos']->_loop = true;
?>                   
                    <tr>                                            
                        <td style="cursor: pointer;text-align: center;" id="indice" onclick="load(<?php echo $_smarty_tpl->tpl_vars['datos']->value['idMigracion'];?>
, <?php echo $_smarty_tpl->tpl_vars['pagina']->value;?>
);"><?php echo $_smarty_tpl->tpl_vars['datos']->value['idLotus'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['apellidos'];?>
, <?php echo $_smarty_tpl->tpl_vars['datos']->value['nombre'];?>
</td>
                        <td><input type="text" class="valor" name="cargo" size="17" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['cargo'];?>
"/></td>
                        <td><input type="text" class="valor" name="fechaInicio" size="17" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['fecha_Inicio'];?>
"/></td>  
                        <td><input type="text" class="valor" name="fechaFin" size="17" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['fecha_Fin'];?>
"/></td> 
                        <td><input type="text" class="valor" name="estado_inicial" size="15" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['estado_inicial'];?>
"/></td> 
                        <td><input type="text" class="valor" name="estado_final" size="15" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['estado_final'];?>
"/></td>                                                                                           
                        <td><input type="text" class="valor" name="estado_observaciones" size="80" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['observaciones'];?>
"/></td>
                    </tr>
                <?php } ?>                
            </table>
        <?php }else{ ?>
            <p><strong>No hay migraciones registradas.&nbsp;&nbsp;&nbsp; <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
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

<!-- SubirFichero -->
<div id="selectorFichero">
    <form method="post" name="form1" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
migraciones/index/cargarExcel" enctype="multipart/form-data" onsubmit="return dameRuta();">        
        Seleccionar fichero: <input type="file" name="fichero" />  
        <br>
        <br>
        <br>
        <br>  
        <input type="hidden" id="excel" name="fichExcel">
        <p style="padding-left: 140px;"><input type="submit" class="button" value="Guardar"/></p>
    </form>      
</div>

<!-- Progreso -->
<div id="progreso">    
    Cargando...
</div>

<!-- imagenMigracion -->
<div id="imagenUpDcha">
    <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/imgsUp/comunidades.png" alt=""/>
</div>

<script type="text/javascript">
    function load($idMigracion) {
        document.location='migraciones/index/editar_migracion/' + $idMigracion+'/'+$pagina;      
    }
    ;   
</script><?php }} ?>
<?php /* Smarty version Smarty-3.1.8, created on 2016-02-17 08:48:28
         compiled from "C:\xampp\htdocs\tfg\modules\migraciones\views\index\ajax\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3121956a5f16c7a41a5-45261095%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72c4ddaedeb7293b29b69eff3412a669faf34a1b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tfg\\modules\\migraciones\\views\\index\\ajax\\index.tpl',
      1 => 1455690557,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3121956a5f16c7a41a5-45261095',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56a5f16c8d0e68_78073242',
  'variables' => 
  array (
    'migraciones' => 0,
    'datos' => 0,
    '_layoutParams' => 0,
    'contador' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a5f16c8d0e68_78073242')) {function content_56a5f16c8d0e68_78073242($_smarty_tpl) {?>
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

<script type="text/javascript">
    $("td").change(function () {
        var col = $(this).parent().children().index($(this));
        var row = $(this).parent().parent().children().index($(this).parent());
        var table = document.getElementById("tablaListado");

        var row1 = table.rows[row];
        var col1 = row1.cells[0];

        cellsOfRow = table.rows[0].getElementsByTagName('th');
        var titulo = cellsOfRow[col].innerHTML.toLowerCase();

        var valor = $(".valor", this).val();
        var idMigracion = col1.firstChild.nodeValue;

        aux = valor.replace(" ", ",");

        valor = [aux];

        var url = "./migraciones/index/editar_campo/" + titulo + "/" + valor + "/" + idMigracion;
        window.location.href = url;
        return false;
    });

    function load($idMigracion) {
        document.location = 'migraciones/index/editar_migracion/' + $idMigracion;
    }
    ;
</script>
<?php }} ?>
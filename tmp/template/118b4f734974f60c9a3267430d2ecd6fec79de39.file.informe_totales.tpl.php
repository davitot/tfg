<?php /* Smarty version Smarty-3.1.8, created on 2016-02-04 18:45:42
         compiled from "D:\xampp\htdocs\tfg\modules\migraciones\views\index\ajax\informe_totales.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2985556b261569ab2f5-59821281%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '118b4f734974f60c9a3267430d2ecd6fec79de39' => 
    array (
      0 => 'D:\\xampp\\htdocs\\tfg\\modules\\migraciones\\views\\index\\ajax\\informe_totales.tpl',
      1 => 1454585770,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2985556b261569ab2f5-59821281',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56b26156a132b8_06674302',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'resultados' => 0,
    'comunidad' => 0,
    'datos' => 0,
    'provincia' => 0,
    'antComunidad' => 0,
    'antProvincia' => 0,
    'contador' => 0,
    'paginacion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56b26156a132b8_06674302')) {function content_56b26156a132b8_06674302($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/migracion/css/estilosMigracion.css" rel="stylesheet" type="text/css" />       

<!-- ListadoInforme -->
<div id="listadoIndex" style="auto">      
    <?php if (isset($_smarty_tpl->tpl_vars['resultados']->value)&&count($_smarty_tpl->tpl_vars['resultados']->value)){?>          
        <table id="tablaListado">
            <tr>                    
                <th>Comunidad</th>
                <th>Provincia</th>                                            
                <th>Sede</th>     
                <th>Organo</th>
                <th>Pendientes</th>
                <th>Realiadas</th>     
                <th>No Aplica</th>                         
            </tr>
            <?php $_smarty_tpl->tpl_vars['comunidad'] = new Smarty_variable('', null, 0);?>
            <?php $_smarty_tpl->tpl_vars['provincia'] = new Smarty_variable('', null, 0);?>
            <?php $_smarty_tpl->tpl_vars['provincia'] = new Smarty_variable('', null, 0);?>
            <?php $_smarty_tpl->tpl_vars['antComunidad'] = new Smarty_variable('', null, 0);?>
            <?php $_smarty_tpl->tpl_vars['antProvincia'] = new Smarty_variable('', null, 0);?>
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
                    <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['sede'];?>
</td>
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
        <p><strong>No hay Resultados disponibles.&nbsp;&nbsp;&nbsp; <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
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
<?php }} ?>
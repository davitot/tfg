<?php /* Smarty version Smarty-3.1.8, created on 2016-02-09 14:45:54
         compiled from "C:\xampp\htdocs\tfg\modules\migraciones\views\index\ajax\informe_totalesTecComu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1763756b9ecccd04083-00661006%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '562fcbf187e9c70c06eb9a1b4680f88fc5a91260' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tfg\\modules\\migraciones\\views\\index\\ajax\\informe_totalesTecComu.tpl',
      1 => 1455025550,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1763756b9ecccd04083-00661006',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56b9ecccd8cc21_46846417',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'resultados' => 0,
    'comunidad' => 0,
    'datos' => 0,
    'provincia' => 0,
    'antComunidad' => 0,
    'antProvincia' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56b9ecccd8cc21_46846417')) {function content_56b9ecccd8cc21_46846417($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/migracion/css/estilosMigracion.css" rel="stylesheet" type="text/css" />       
<!-- ListadoTareas -->
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
    </div>  <?php }} ?>
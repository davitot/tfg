<?php /* Smarty version Smarty-3.1.8, created on 2016-02-17 00:25:00
         compiled from "D:\xampp\htdocs\tfg\modules\migraciones\views\index\editar_migracion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2019556c3aee766be20-25152548%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a899db65db05b0ff04566477e5c391ad4b01312' => 
    array (
      0 => 'D:\\xampp\\htdocs\\tfg\\modules\\migraciones\\views\\index\\editar_migracion.tpl',
      1 => 1455665094,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2019556c3aee766be20-25152548',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56c3aee76e46e9_45798606',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56c3aee76e46e9_45798606')) {function content_56c3aee76e46e9_45798606($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
modules/migraciones/views/index/css/estilosMigraciones.css" rel="stylesheet" type="text/css" />

<!-- header -->
<header>
    <p style="font-size: 15px;">
        Migracion (<?php echo $_smarty_tpl->tpl_vars['datos']->value['idMigracion'];?>
): <?php echo $_smarty_tpl->tpl_vars['datos']->value['comunidad'];?>
, <?php echo $_smarty_tpl->tpl_vars['datos']->value['provincia'];?>
, <?php echo $_smarty_tpl->tpl_vars['datos']->value['desc_sede'];?>
 
    </p>
</header>

<!-- nav  -->    
<nav>
    <table>    
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
migraciones"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/atras.png" alt="Atras"/></a>
            </td>
        </tr>       
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;Volver
            </td>
        </tr>    
    </table>
</nav>    

<!-- Formulario 
<div id="formulario">
    <form name="fnuevaTarea" method="post" action="">
        <input type="hidden" name="guardar" value="1" />
        <input type="hidden" name="idMigracion" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['idMigracoin'];?>
" />
        <table>
            <tr>
                <td width="61">       
                    Usuario:
                </td>
                <td colspan="4" >                                
                    <input type="text" name="nombre" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['nombre'])===null||$tmp==='' ? '' : $tmp);?>
" style="width: 330px;"/>
                </td>
            </tr>
            <tr>
                <td>        
                    Provincia:
                </td>                               
                <td colspan="4">                    
                    <input type="text" id="provincia" name="provincia" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['provincia'];?>
" readonly="1">                         
                </td>
                </td>
            </tr>
            <tr>
                <td>        
                    <label>Comunidad:</label>
                </td>   
                <td colspan="4">                    
                    <input type="text" id="comunidad" name="comunidad" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['comunidad'];?>
" readonly="1">                         
                </td>
            </tr>                                                             
            <tr id="Migracion1" style="vertical-align: text-top; display:  none;">
                <td>&nbsp;</td>
                <td width="50">Comunidad:</td>
                <td width="auto">
                    <select id="comunidad" name="comunidad">  
                        <option value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['comunidad'])===null||$tmp==='' ? '' : $tmp);?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['comunidad'])===null||$tmp==='' ? '' : $tmp);?>
</option>
                    </select>
                </td>
                <td width="50">Provincia:</td>                
                <td width="80"><select id="provincia" name="provincia"> 
                        <option value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['provincia'])===null||$tmp==='' ? '' : $tmp);?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['provincia'])===null||$tmp==='' ? '' : $tmp);?>
</option>
                    </select>
                </td>    
            </tr>
            <tr id="Migracion2" style="vertical-align: text-top;display:  none;">
                <td>&nbsp;</td>
                <td width="50">Sede:</td>
                <td width="auto"> <select id="sede" name="sede">   
                        <option value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['sede'])===null||$tmp==='' ? '' : $tmp);?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['sede'])===null||$tmp==='' ? '' : $tmp);?>
</option>
                    </select> 
                </td>
                <td width="50">Organo:</td>                
                <td width="80"><select id="organo" name="organo">  
                        <option value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['organo'])===null||$tmp==='' ? '' : $tmp);?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['organo'])===null||$tmp==='' ? '' : $tmp);?>
</option>                       
                    </select>
                </td> 
            </tr>
            <tr>
                <td style="vertical-align: top;" >
                    Descripcion:
                </td>                
                <td colspan="4">
                    <textArea name="descripcion" style="width: 327px; height:60px;"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['observaciones'])===null||$tmp==='' ? '' : $tmp);?>
</textArea>
                </td>                
            </tr>

            <tr>
                <td>
                    F. inicio:
                </td>
                <td colspan="4">
                    <input type="date" name="fechaInicio" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['fecha_inicio'])===null||$tmp==='' ? "Pendiente" : $tmp);?>
"/>
                </td>    
            </tr>
            <tr>
                <td>
                    F. fin:
                </td>
                <td colspan="2">
                    <input type="date" name="fechaFin" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['fecha_fin'])===null||$tmp==='' ? "Pendiente" : $tmp);?>
" />
                </td>    
            </tr>                                                     
            <tr>
                <td colspan="6" align="center">
                    <input type="submit" class="button" value="Guardar" />
                </td>
            </tr>          
        </table>        
    </form>     
</div>-->
                <?php }} ?>
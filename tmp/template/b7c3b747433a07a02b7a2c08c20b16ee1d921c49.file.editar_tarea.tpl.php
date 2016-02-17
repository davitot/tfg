<?php /* Smarty version Smarty-3.1.8, created on 2016-02-17 12:58:00
         compiled from "C:\xampp\htdocs\tfg\modules\tareas\views\index\editar_tarea.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3125856a0d28091c873-49561080%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7c3b747433a07a02b7a2c08c20b16ee1d921c49' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tfg\\modules\\tareas\\views\\index\\editar_tarea.tpl',
      1 => 1455690560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3125856a0d28091c873-49561080',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56a0d2809e7aa6_81761892',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a0d2809e7aa6_81761892')) {function content_56a0d2809e7aa6_81761892($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
modules/tareas/views/index/css/estilosTareas.css" rel="stylesheet" type="text/css" />

<!-- header -->
<header>
    <p style="font-size: 15px;">
        Personal asignado: <?php echo $_smarty_tpl->tpl_vars['datos']->value['tecnico'];?>

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
tareas"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
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

<!-- Formulario -->
<div id="formulario">
    <form name="fnuevaTarea" method="post" action="">
        <input type="hidden" name="guardar" value="1" />
        <input type="hidden" name="idTarea" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['idTarea'];?>
" />
        <table>
            <tr>
                <td width="61">       
                    Titulo:
                </td>
                <td colspan="4" >                                
                    <input type="text" name="titulo" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['titulo'])===null||$tmp==='' ? '' : $tmp);?>
" style="width: 330px;"/>
                </td>
            </tr>
            <tr>
                <td>        
                    Tipo:
                </td>                               
                <td colspan="4">                    
                    <input type="text" id="tipo" name="tipo" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['tipo'];?>
" readonly="1">                         
                </td>
                </td>
            </tr>
            <tr>
                <td>        
                    <label>Personal:</label>
                </td>                                       
                <td colspan="4">                    
                    <select id="tecnicos" name="tecnicos">
                        <option value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['idPersonal'])===null||$tmp==='' ? '' : $tmp);?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['tecnico'])===null||$tmp==='' ? '' : $tmp);?>
</option>
                    </select>        
                </td>
            </tr>                                      
            <tr id="Administracion" style="vertical-align: text-top;display:  none;" >
                <td>&nbsp;</td>
                <td width="44">Guardia:</td>
                <td width="31"><input type="checkbox" name="guardia" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['guardia'])===null||$tmp==='' ? '' : $tmp);?>
" <?php if (($_smarty_tpl->tpl_vars['datos']->value['guardia']==1)){?>checked="checked"<?php }?>/></td>
                <td width="120">Perdida Servicio:</td>
                <td width="80"><input type="checkbox" name="noServicio" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['noServicio'])===null||$tmp==='' ? '' : $tmp);?>
" <?php if (($_smarty_tpl->tpl_vars['datos']->value['noServicio']==1)){?>checked="checked"<?php }?>/></td>
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
                    <textArea name="descripcion" style="width: 327px; height:60px;"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['descripcion'])===null||$tmp==='' ? '' : $tmp);?>
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

            <tr>
                <td>
                    F. fin:
                </td>
                <td colspan="2">
                    <input type="date" name="fechaFin" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['fecha_fin'])===null||$tmp==='' ? "Pendiente" : $tmp);?>
" />
                </td>            
                <td>
                    Gestionada:
                </td>
                <td>
                    <input type="checkbox" name="activa" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['activa'])===null||$tmp==='' ? '' : $tmp);?>
" <?php if (($_smarty_tpl->tpl_vars['datos']->value['activa']==0)){?>checked="checked"<?php }?>/>
                </td>             
        <tr>
            <td colspan="6" align="center">
                <input type="submit" class="button" value="Guardar" />
            </td>
        </tr>          
        </table>        
    </form>                             
</div>
                <?php }} ?>
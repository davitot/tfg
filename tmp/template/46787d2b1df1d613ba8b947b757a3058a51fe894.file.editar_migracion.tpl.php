<?php /* Smarty version Smarty-3.1.8, created on 2016-02-17 14:06:31
         compiled from "C:\xampp\htdocs\tfg\modules\migraciones\views\index\editar_migracion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:165156c425cf336eb7-68792295%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46787d2b1df1d613ba8b947b757a3058a51fe894' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tfg\\modules\\migraciones\\views\\index\\editar_migracion.tpl',
      1 => 1455714389,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165156c425cf336eb7-68792295',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56c425cf4502f7_90801530',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'persona' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56c425cf4502f7_90801530')) {function content_56c425cf4502f7_90801530($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
modules/migraciones/views/index/css/estilosMigraciones.css" rel="stylesheet" type="text/css" />

<!-- header -->
<div class="row">
    <div class="col-md-12" style="padding-top: 5px;">
        <h1 class="page-header">Tecnico: <?php echo $_smarty_tpl->tpl_vars['persona']->value;?>
</h1>
    </div>       
</div>

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

<!-- Formulario -->
<div id="formulario" style="width:713px; left: 26%; top: 5%; background: ghostwhite;">    
    <form name="fnuevaTarea" method="post" action="">
        <input type="hidden" name="guardar" value="1" />
        <input type="hidden" name="idMigracion" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['idMigracion'];?>
" />        
        <table id="tablaEdicion">
            <tr>
                <td>       
                    Nombre: 
                </td>
                <td>                                
                    <input type="text" name="nombre" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['nombre'])===null||$tmp==='' ? '' : $tmp);?>
" style="width: auto;"/>
                </td>
                <td>       
                    Apellidos: 
                </td>
                <td>                                
                    <input type="text" name="nombre" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['apellidos'])===null||$tmp==='' ? '' : $tmp);?>
" style="width: auto;"/>
                </td>
            </tr>                                                                           
            <tr>               
                <td>Comunidad:</td>
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
            <tr>                
                <td width="50">Sede:</td>
                <td width="80"> <select id="sede" name="sede">   
                        <option value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['sede'])===null||$tmp==='' ? '' : $tmp);?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['desc_sede'])===null||$tmp==='' ? '' : $tmp);?>
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
                <td>
                    Fecha inicio:
                </td>
                <td width="80">
                    <input type="date" name="fechaInicio" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['fecha_Inicio'])===null||$tmp==='' ? '' : $tmp);?>
"/>
                </td>                
                <td width="80">
                    Fecha fin:
                </td>
                <td>
                    <input type="date" name="fechaFin" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['fecha_Fin'])===null||$tmp==='' ? '' : $tmp);?>
" />
                </td>    
            </tr>
            <tr>
                <td>
                    Estado inicial:
                </td>
                <td>
                    <input type="text" name="estadoInicial" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['estado_inicial'])===null||$tmp==='' ? '' : $tmp);?>
"/>
                </td>            
                <td>
                    Estado final:
                </td>
                <td colspan="2">
                    <input type="text" name="estadoFinal" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['estado_final'])===null||$tmp==='' ? '' : $tmp);?>
" />
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top;" >
                    Observaciones:
                </td>
                <td colspan="4">
                    <textArea name="descripcion" style="width: 327px; height:60px;"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['observaciones'])===null||$tmp==='' ? '' : $tmp);?>
</textArea>
                </td>
            </tr>
            <tr>
                <td colspan="8" align="center">
                    <input type="submit" class="btn btn-outline btn-primary" value="Guardar" />
                </td>
            </tr>
        </table>        
    </form>     
</div>               <?php }} ?>
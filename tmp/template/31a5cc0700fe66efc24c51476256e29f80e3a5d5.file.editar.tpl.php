<?php /* Smarty version Smarty-3.1.8, created on 2016-01-25 11:07:50
         compiled from "C:\xampp\htdocs\tfg\modules\personal\views\index\editar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99955c49a06f1c376-21325300%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31a5cc0700fe66efc24c51476256e29f80e3a5d5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tfg\\modules\\personal\\views\\index\\editar.tpl',
      1 => 1453461466,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99955c49a06f1c376-21325300',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55c49a0710e949_13887203',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'datos' => 0,
    'cargos' => 0,
    'cargo' => 0,
    'recursosPersonal' => 0,
    'dato' => 0,
    'recursosLibres' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c49a0710e949_13887203')) {function content_55c49a0710e949_13887203($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
modules/personal/views/index/css/estilosPersonal.css" rel="stylesheet" type="text/css" />
<!-- nav -->            
<nav>
    <table style="text-align: center; font-size: 11px;">       
        <tr>
            <td>
                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/vacio.png" alt="nada"/></a>
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
public/img/nav/vacio.png" alt="nada"/></a>
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
public/img/nav/vacio.png" alt="nada"/></a>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <a href="javascript:history.back(1)"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/atras.png" alt="Inicio"/></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Volver
            </td>
        </tr>
    </table>      
</nav>

<!-- Formulario datos Personal-->            
<div>
    <div id="formularioEditarPersonal">  
        <form id="form1" method="post" action="">
            <input type="hidden" name="guardar" value="1" />
            <table>
                <tr>
                    <td>
                        Nombre:
                    </td>
                    <td>
                        <input type="text" name="nombre" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['nombre'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['nombre'];?>
<?php }?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Cargo:
                    </td>
                    <td>
                        <select id="cargo" name="cargo">
                            <option value=""><?php if (isset($_smarty_tpl->tpl_vars['datos']->value['cargo'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['cargo'];?>
<?php }?></option>
                            <?php  $_smarty_tpl->tpl_vars['cargo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cargo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cargos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cargo']->key => $_smarty_tpl->tpl_vars['cargo']->value){
$_smarty_tpl->tpl_vars['cargo']->_loop = true;
?>                
                                <?php if ($_smarty_tpl->tpl_vars['datos']->value['cargo']!=$_smarty_tpl->tpl_vars['cargo']->value['descripcion']){?>    
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['cargo']->value['idCargo'];?>
"><?php echo $_smarty_tpl->tpl_vars['cargo']->value['descripcion'];?>
</option>                
                                <?php }?>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Email:
                    </td>
                    <td>
                        <input type="email" name="email" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['email'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['email'];?>
<?php }?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Fecha de alta:
                    </td>
                    <td>
                        <input type="date" name="fechaIn" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['fecha_Incorporacion'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['fecha_Incorporacion'];?>
<?php }?>" />
                    </td>
                <tr>
                    <td>
                        Usuario:
                    </td>
                    <td>
                        <input type="text" name="usuario" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['usuario'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['usuario'];?>
<?php }?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Password:
                    </td>
                    <td>
                        <input type="password" name="pass" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['pass'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['pass'];?>
<?php }?>" />
                    </td>
                </tr>    
                <tr>
                    <td>                    
                        Activo:
                    </td>
                    <td>
                        <input type="checkbox" name="activa" value="1" <?php if (($_smarty_tpl->tpl_vars['datos']->value['activo']==1)){?>checked="checked"<?php }?>/>
                    </td>  
                </tr>
            </table>
            <br>
            <p style="margin-left: 27%; "><input type="submit" value="Guardar" class="button"/></p>   
            <br>
            <br>
        </form>      
    </div>

    <div id="listadoRecursos">    
        <?php if (isset($_smarty_tpl->tpl_vars['recursosPersonal']->value)&&count($_smarty_tpl->tpl_vars['recursosPersonal']->value)){?>
            <table id="tablaRecursos">
                <tr>
                    <td colspan="5" style="text-align: center; font-style: italic">
                        Recursos asignados
                    </td>
                </tr>
                <tr>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Fecha Alta</th>                                    
                        <?php if (Session::acceso(Session::get('level'))){?>
                        <th colspan="1">Acciones</th>
                        <?php }?>
                </tr>
                <?php  $_smarty_tpl->tpl_vars['dato'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dato']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recursosPersonal']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dato']->key => $_smarty_tpl->tpl_vars['dato']->value){
$_smarty_tpl->tpl_vars['dato']->_loop = true;
?>
                    <tr>
                        <td style="width: 12%;"><?php echo $_smarty_tpl->tpl_vars['dato']->value['tipo'];?>
</td>
                        <td style="width: 10%;"><?php echo $_smarty_tpl->tpl_vars['dato']->value['marca'];?>
</td>
                        <td style="width: 7%;"><?php echo $_smarty_tpl->tpl_vars['dato']->value['modelo'];?>
</td>                        
                        <td style="text-align: center; width: 4%;"><?php echo $_smarty_tpl->tpl_vars['dato']->value['fecha_alta'];?>
</td>
                        <?php if (Session::acceso(Session::get('level'))){?>
                            <td style="width: 0.4%; text-align: center;"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
personal/index/eliminar_recurso/<?php echo $_smarty_tpl->tpl_vars['datos']->value['idPersonal'];?>
/<?php echo $_smarty_tpl->tpl_vars['dato']->value['idRecurso'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
/public/img/accionesTabla/eliminar.png" alt="Eliminar"/></a></td>                       
                                <?php }?>
                    </tr>
                <?php } ?>                
            </table>
        <?php }else{ ?>
            <p><strong>No hay recursos asignados.</strong></p>
            <p><img src="../../../../public/img/calendario_blank.png" alt=""/></p>
            <?php }?> 
            <?php if (isset($_smarty_tpl->tpl_vars['recursosLibres']->value)&&count($_smarty_tpl->tpl_vars['recursosLibres']->value)){?>
            <form id="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
personal/index/agregar_recurso"
                  enctype="multipart/form-data">
                <input type="hidden" name="idPersonal" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['idPersonal'];?>
" />
                <table id="tablaRecursosLibres">
                    <br>
                    <br>
                    <th colspan='4'>Recursos Libres</th>              
                        <?php  $_smarty_tpl->tpl_vars['dato'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dato']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recursosLibres']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dato']->key => $_smarty_tpl->tpl_vars['dato']->value){
$_smarty_tpl->tpl_vars['dato']->_loop = true;
?>
                        <tr>
                            <td>                                
                                <?php echo $_smarty_tpl->tpl_vars['dato']->value['tipo'];?>
                                            
                            </td>                
                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['dato']->value['marca'];?>

                            </td>
                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['dato']->value['modelo'];?>

                            </td>
                            <td>
                                <input name="recLibres[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['dato']->value['idRecurso'];?>
">
                            </td>
                        </tr> 
                    <?php } ?>
                    <tr>
                        <td>
                            <input type="submit" value="Guardar" class="button"/>
                        </td>
                    </tr>  
                </table>    
            </form>
        <?php }else{ ?>
            <br>
            <br>
            <p style="font-size: 11px;">No hay recursos disponibles para asignar.</p>            
        <?php }?>
    </div>   
</div><?php }} ?>
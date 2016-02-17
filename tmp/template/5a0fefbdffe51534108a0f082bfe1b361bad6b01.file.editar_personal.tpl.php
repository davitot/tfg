<?php /* Smarty version Smarty-3.1.8, created on 2016-02-12 00:28:02
         compiled from "D:\xampp\htdocs\tfg\modules\personal\views\index\editar_personal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1458556b8b4b9c43e07-36021690%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a0fefbdffe51534108a0f082bfe1b361bad6b01' => 
    array (
      0 => 'D:\\xampp\\htdocs\\tfg\\modules\\personal\\views\\index\\editar_personal.tpl',
      1 => 1455172563,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1458556b8b4b9c43e07-36021690',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56b8b4b9dc2675_52016478',
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
<?php if ($_valid && !is_callable('content_56b8b4b9dc2675_52016478')) {function content_56b8b4b9dc2675_52016478($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
modules/personal/views/index/css/estilosPersonal.css" rel="stylesheet" type="text/css" />

<!-- Funciones JS -->
<script type="text/javascript">
    function mostrar(id) {
        obj1 = document.getElementById(id);
        id1 = obj1.getAttribute("id");

        switch (id1) {
            case "listadoRecursos":
                verRecursos(obj1);
                break;
            default:
                break;
        }
    }

    function verRecursos(objeto) {
        objeto.style.display = (objeto.style.display === 'none') ? 'block' : 'none';

        if ((document.mostrarRecursos.src).indexOf('contraer') !== -1) {
            document.mostrarRecursos.src = '<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
agregar.png';
        } else {
            document.mostrarRecursos.src = '<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
contraer.png';
        }
    }
</script>
<!-- /Funciones JS -->

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
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
personal"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
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
<!-- /nav -->   

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
    <!-- /Formulario datos Personal-->   

    <!-- Contador Recursos Asignados -->    
    <div id="contadorRecursos">
        <table>
            <tr>
                <td><a href="" onclick="mostrar('listadoRecursos');
                        return false;" ><img id="mostrarRecursos" name="mostrarRecursos" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
agregar.png" alt="" /></a></td>
                <td>Recursos asignados: <?php echo count($_smarty_tpl->tpl_vars['recursosPersonal']->value);?>
</td>
            </tr>
        </table>
    </div>
    <!-- /Contador Recursos Asignados -->           

    <!-- ListadoRecursos -->   
    <div id="listadoRecursos" style='display:none;'>    
        <?php if (isset($_smarty_tpl->tpl_vars['recursosPersonal']->value)&&count($_smarty_tpl->tpl_vars['recursosPersonal']->value)){?>            
            <table id="tablaRecursos">            
                <tr>                    
                    <th colspan='2'>Tipo</th>
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
                    <tr style='vertical-align: middle;'>
                        <td style='text-align: center;'>
                            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['dato']->value['tipo'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1=='Portatil'){?>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
/public/img/recursos/portatil.png" title="Portatil"/>
                            <?php }else{ ?>
                                <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['dato']->value['tipo'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2=='Teclado'){?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
/public/img/recursos/teclado.png" title="Teclado"/>                               
                                <?php }else{ ?>
                                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['dato']->value['tipo'];?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp3=='Raton'){?>
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
/public/img/recursos/raton.png" title="Raton"/>                                    
                                    <?php }else{ ?>
                                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['dato']->value['tipo'];?>
<?php $_tmp4=ob_get_clean();?><?php if ($_tmp4=='Monitor'){?>
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
/public/img/recursos/monitor.png" title="Monitor"/>                                    
                                        <?php }else{ ?>
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
/public/img/recursos/movil.png" title="movil"/>
                                        <?php }?>                                            

                                    <?php }?>                                    
                                <?php }?>
                            <?php }?>
                        </td> 
                        <td><?php echo $_smarty_tpl->tpl_vars['dato']->value['tipo'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['dato']->value['marca'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['dato']->value['modelo'];?>
</td>                        
                        <td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['dato']->value['fecha_alta'];?>
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
            <br/>
            <p>                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/recursos/portatil.png" title="portatil"/>&nbsp;
                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/recursos/teclado.png" title="Teclado"/>&nbsp;
                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/recursos/raton.png" title="Raton"/>&nbsp;
                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/recursos/movil.png" title="Movil"/>&nbsp;
                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/recursos/monitor.png" title="Monitor"/>
            </p>            
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
                    <th colspan='6'>Recursos Libres</th>              
                        <?php  $_smarty_tpl->tpl_vars['dato'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dato']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recursosLibres']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dato']->key => $_smarty_tpl->tpl_vars['dato']->value){
$_smarty_tpl->tpl_vars['dato']->_loop = true;
?>
                        <tr>
                            <td style='text-align:center;'>
                                <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['dato']->value['tipo'];?>
<?php $_tmp5=ob_get_clean();?><?php if ($_tmp5=='Portatil'){?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
/public/img/recursos/portatil.png" title="Portatil"/>
                                <?php }else{ ?>
                                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['dato']->value['tipo'];?>
<?php $_tmp6=ob_get_clean();?><?php if ($_tmp6=='Teclado'){?>
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
/public/img/recursos/teclado.png" title="Teclado"/>                               
                                    <?php }else{ ?>
                                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['dato']->value['tipo'];?>
<?php $_tmp7=ob_get_clean();?><?php if ($_tmp7=='Raton'){?>
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
/public/img/recursos/raton.png" title="Raton"/>                                    
                                        <?php }else{ ?>
                                            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['dato']->value['tipo'];?>
<?php $_tmp8=ob_get_clean();?><?php if ($_tmp8=='Monitor'){?>
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
/public/img/recursos/monitor.png" title="Monitor"/>                                    
                                            <?php }else{ ?>
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
/public/img/recursos/movil.png" title="movil"/>
                                            <?php }?>                                            

                                        <?php }?>                                    
                                    <?php }?>
                                <?php }?>
                            </td>                             
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
                </table>
                <br/>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="ok" class="insertar"/>                
            </form>
        <?php }else{ ?>            
            <br/>
            <br/>
            <p style="font-size: 11.5px;">  
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No hay recursos libres.
            </p>
            <br/>            
            <p>  
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/recursos/portatil.png" title="portatil"/>&nbsp;
                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/recursos/teclado.png" title="Teclado"/>&nbsp;
                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/recursos/raton.png" title="Raton"/>&nbsp;
                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/recursos/movil.png" title="Movil"/>&nbsp;
                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/recursos/monitor.png" title="Monitor"/>
            </p>            
        <?php }?>
    </div>
    <!-- /ListadoRecursos -->
</div>
<!-- /Formulario datos Personal-->   <?php }} ?>
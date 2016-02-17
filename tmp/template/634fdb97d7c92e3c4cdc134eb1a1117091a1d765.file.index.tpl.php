<?php /* Smarty version Smarty-3.1.8, created on 2016-02-11 18:36:49
         compiled from "D:\xampp\htdocs\tfg\views\index\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2495555c23b2f2d00d3-64822944%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '634fdb97d7c92e3c4cdc134eb1a1117091a1d765' => 
    array (
      0 => 'D:\\xampp\\htdocs\\tfg\\views\\index\\index.tpl',
      1 => 1455172578,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2495555c23b2f2d00d3-64822944',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55c23b2f3ab367_65226609',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'tareas' => 0,
    'ta' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c23b2f3ab367_65226609')) {function content_55c23b2f3ab367_65226609($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp\\htdocs\\tfg\\libs\\smarty\\libs\\plugins\\modifier.date_format.php';
?>
<link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/index/css/estilosIndex.css" rel="stylesheet" type="text/css" />

<!-- Funciones JS -->
<script type="text/javascript">
    function mostrar(id) {
        obj1 = document.getElementById(id);
        id1 = obj1.getAttribute("id");

        switch (id1) {
            case "listaTareasPtes":
                verTareas(obj1);
                break;
            case "listaReunionesPtes":
                verReuniones(obj1);
                break;
            default:
                break;
        }
    }

    function verTareas(objeto) {
        objeto.style.display = (objeto.style.display === 'none') ? 'block' : 'none';
        ocultar = document.getElementById('listaReunionesPtes');
        ocultar.style.display = 'none';
        cambiarimagen('mostrarReuniones', '<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
agregar.png');
    }

    function verReuniones(objeto) {
        objeto.style.display = (objeto.style.display === 'none') ? 'block' : 'none';
        ocultar = document.getElementById('listaTareasPtes');
        ocultar.style.display = 'none';
        cambiarimagen('mostrarTareas', '<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
agregar.png');
    }
    function cambiarimagen(id, url) {
        document.getElementById(id).src = url;
    }

</script>
<!-- /Funciones JS -->


<!-- header -->
<header>
    <h2>Migracion MS-Exchange <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
flecha.png" alt="" /> IBM Lotus </h2>
        <?php if (Session::get('autenticado')){?>
        <br>
        <p>Menu principal</p>
        <br>                                              
    <?php }else{ ?>
        <p style="text-align: center;"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
logo_inicio.png" alt="" /> </p>
        <?php }?>
</header>

<!--Contador Tareas -->
<div id="contadorTareas">
    <table>
        <tr>
            <td><a href="" onclick="mostrar('listaTareasPtes');
                    return false;" ><img id="mostrarTareas" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
agregar.png" alt="" /></a></td>
            <td>Tareas: <?php echo count($_smarty_tpl->tpl_vars['tareas']->value);?>
</td>
        </tr>
    </table>
</div>

<!--listaTareasPtes -->
<div id="listaTareasPtes" style='display:none;'>               
    <table id="tablaPtes">
        <?php if (isset($_smarty_tpl->tpl_vars['tareas']->value)&&count($_smarty_tpl->tpl_vars['tareas']->value)){?>           
            <tr>
                <th>Tecnico</th>
                <th>Titulo</th>                    
                <th style="width: 30px; ">Fin</th>                                        
            </tr>

            <?php  $_smarty_tpl->tpl_vars['ta'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ta']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tareas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ta']->key => $_smarty_tpl->tpl_vars['ta']->value){
$_smarty_tpl->tpl_vars['ta']->_loop = true;
?>                
                <tr>    
                    <?php if ($_smarty_tpl->tpl_vars['ta']->value['tipo']=='Migracion'){?>
                        <td><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
pdf/generar_InformeTarea/<?php echo $_smarty_tpl->tpl_vars['ta']->value['idPersonal'];?>
/<?php echo $_smarty_tpl->tpl_vars['ta']->value['idTarea'];?>
"><?php echo $_smarty_tpl->tpl_vars['ta']->value['tecnico'];?>

                            <?php }else{ ?>
                                <?php echo $_smarty_tpl->tpl_vars['ta']->value['tecnico'];?>

                            <?php }?>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ta']->value['titulo'];?>
</td>                                                
                    <?php if ($_smarty_tpl->tpl_vars['ta']->value['fecha_fin']==''||$_smarty_tpl->tpl_vars['ta']->value['fecha_fin']=='0000-00-00'){?>
                        <td style="text-align: center;"> <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
modules/tareas/views/index/img/noGestionada.png" title="Iniciada: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ta']->value['fecha_inicio'],"%d/%m/%Y");?>
"/> </td>
                        <?php }else{ ?>
                            <?php ob_start();?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ta']->value['fecha_inicio'],"%d/%m/%Y");?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ta']->value['fecha_fin'],"%d/%m/%Y");?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable("Iniciada:     ".$_tmp1." \nFinalizada: ".$_tmp2, null, 0);?>
                            <?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable(htmlentities($_smarty_tpl->tpl_vars['title']->value), null, 0);?>
                        <td style="text-align: center;"> <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
modules/tareas/views/index/img/gestionada.png" title="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
"/> </td>
                        <?php }?>                        
                </tr>
            <?php } ?>

        <?php }else{ ?>
            <tr>
                <td>No hay Tareas pendientes.</td>
                <td><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
calendario_blank.png" alt="No hay tareas"/></td>
            </tr>           
        <?php }?>    
    </table>      
</div>

<!--Contador Reuniones -->    
<div id="contadorReuniones">
    <table>
        <tr>
            <td><a href="" onclick="mostrar('listaReunionesPtes');
                    return false;" ><img id="mostrarReuniones" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
agregar.png" alt="" /></a></td>
            <td>Reuniones: <?php echo count($_smarty_tpl->tpl_vars['tareas']->value);?>
</td>
        </tr>
    </table>
</div>

<!--listaReunionesPtes -->      
<div id="listaReunionesPtes" style='display:none;'>               
    <table id="tablaRPtes">
        <?php if (isset($_smarty_tpl->tpl_vars['tareas']->value)&&count($_smarty_tpl->tpl_vars['tareas']->value)){?>           
            <tr>
                <th>Tecnico</th>
                <th>Titulo</th>                    
                <th>Fin</th>                                        
            </tr>

            <?php  $_smarty_tpl->tpl_vars['ta'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ta']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tareas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ta']->key => $_smarty_tpl->tpl_vars['ta']->value){
$_smarty_tpl->tpl_vars['ta']->_loop = true;
?>                
                <tr>                        
                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
tareas/index/editar_tarea/<?php echo $_smarty_tpl->tpl_vars['ta']->value['idTarea'];?>
"><?php echo $_smarty_tpl->tpl_vars['ta']->value['tecnico'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ta']->value['titulo'];?>
</td>                                                
                    <?php if ($_smarty_tpl->tpl_vars['ta']->value['fecha_fin']==''||$_smarty_tpl->tpl_vars['ta']->value['fecha_fin']=='0000-00-00'){?>
                        <td style="text-align: center;"> <img name="desplegable" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
modules/tareas/views/index/img/noGestionada.png" alt="Pendiente"/> </td>
                        <?php }else{ ?>
                        <td style="text-align: center;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ta']->value['fecha_fin'],"%d/%m/%Y");?>
</td>
                    <?php }?>                        
                </tr>
            <?php } ?>

        <?php }else{ ?>
            <tr>
                <td>No hay Tareas pendientes.</td>
                <td><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
calendario_blank.png" alt="No hay tareas"/></td>
            </tr>           
        <?php }?>    
    </table>      
</div>
<?php }} ?>
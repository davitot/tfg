<?php /* Smarty version Smarty-3.1.8, created on 2016-01-20 14:50:54
         compiled from "C:\xampp\htdocs\tfg\views\tareas\editar_tarea.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131975614ea95abfda2-43784973%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4bda726a865273cc29c31535f9f61e07d85df26' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tfg\\views\\tareas\\editar_tarea.tpl',
      1 => 1452796712,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131975614ea95abfda2-43784973',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5614ea95b44ac6_15558891',
  'variables' => 
  array (
    'datos' => 0,
    '_layoutParams' => 0,
    'comboItems' => 0,
    'cargo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5614ea95b44ac6_15558891')) {function content_5614ea95b44ac6_15558891($_smarty_tpl) {?><script>
    function capturar()
    {
        var resultado = 0;

        var activo = document.getElementsByName("activa");
        if (activo[0].checked)
            resultado = 1;

        activo[0].value = resultado;

        document.getElementById("form1").submit();
    }
</script>
<header>
    <h2>
        Editar Tarea: <?php echo $_smarty_tpl->tpl_vars['datos']->value['titulo'];?>

    </h2>
</header>

<nav>
    <table>    
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

<div id="formulario">
    <form id="form1" method="post" action="">
        <input type="hidden" name="guardar" value="1" />
        <table>
            <tr>
                <td>        
                    Titulo:
                </td>
                <td>
                    <input type="text" name="titulo" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['titulo'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['titulo'];?>
<?php }?>" />
                </td>
            </tr>
            <tr>
                <td>        
                    Tipo:
                </td>
                <td>
                    <select id="tipo">
                        <option value=""><?php if (isset($_smarty_tpl->tpl_vars['datos']->value['tipo'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['tipo'];?>
<?php }?></option>
                        <?php  $_smarty_tpl->tpl_vars['cargo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cargo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comboItems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cargo']->key => $_smarty_tpl->tpl_vars['cargo']->value){
$_smarty_tpl->tpl_vars['cargo']->_loop = true;
?>                
                            <?php if ($_smarty_tpl->tpl_vars['datos']->value['tipo']!=$_smarty_tpl->tpl_vars['cargo']->value['tipo']){?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['cargo']->value['tipo'];?>
"><?php echo $_smarty_tpl->tpl_vars['cargo']->value['tipo'];?>
</option>                
                            <?php }?>
                        <?php } ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    Descripcion:
                </td>
                <td>
                    <input style="width: 300px; height: 100px; vertical-align: top;" type="text" name="descripcion" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['descripcion'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['descripcion'];?>
<?php }?>" />
                </td>
            </tr>

            <tr>
                <td>
                    Fecha de inicio:
                </td>
                <td>
                    <input type="date" name="fechaInicio" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['fecha_Inicio'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['fecha_Inicio'];?>
<?php }?>" />
                </td>    

            <tr>
                <td>
                    Fecha de fin:
                </td>
                <td>
                    <input type="date" name="fechaFin" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['fecha_fin'])){?><?php echo $_smarty_tpl->tpl_vars['datos']->value['fecha_fin'];?>
<?php }?>" />
                </td>
            <tr>
                <td>
                    Gestionada:
                </td>
                <td>
                    <input type="checkbox" name="activa" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['gestionada'];?>
" <?php if (($_smarty_tpl->tpl_vars['datos']->value['gestionada']==1)){?>checked="checked"<?php }?>/>
                </td>
            </tr>            
        </table>
        <br>
        <input type="button" class="button" value="Guardar" onclick="capturar()">
        <br>
        <br>
    </form>
<?php }} ?>
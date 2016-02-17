<?php /* Smarty version Smarty-3.1.8, created on 2016-01-20 10:21:18
         compiled from "C:\xampp\htdocs\tfg\views\tareas\nueva_tarea.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24941561792b6af0537-68872655%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c9ddc9325b95f692ce23d5729fbf2bb4c45b706' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tfg\\views\\tareas\\nueva_tarea.tpl',
      1 => 1453281677,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24941561792b6af0537-68872655',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_561792b6bea577_41991248',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'datos' => 0,
    'comboItems' => 0,
    'cargo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561792b6bea577_41991248')) {function content_561792b6bea577_41991248($_smarty_tpl) {?><header>
    <h2>
        Nueva Tarea
    </h2>
</header>


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
tareas"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/nav/atras.png" alt="Atras"/></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Volver
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
                    <input type="radio" name="activa" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['gestionada'];?>
"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" class="button" value="Guardar" />
                </td>
            </tr>
        </table>
    </form>
</div><?php }} ?>
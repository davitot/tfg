<?php /* Smarty version Smarty-3.1.8, created on 2016-02-12 00:27:46
         compiled from "D:\xampp\htdocs\tfg\modules\tareas\views\index\nueva_tarea.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197756a7986a731918-68352935%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c854f5a6f5733bebafefd15394ba6a242aea1719' => 
    array (
      0 => 'D:\\xampp\\htdocs\\tfg\\modules\\tareas\\views\\index\\nueva_tarea.tpl',
      1 => 1455172566,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197756a7986a731918-68352935',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56a7986a7901d5_22241224',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'datos' => 0,
    'tipos' => 0,
    'tipo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a7986a7901d5_22241224')) {function content_56a7986a7901d5_22241224($_smarty_tpl) {?><!-- header -->
<header>    
    <h2>
        Nueva Tarea
    </h2>
</header>
<!-- header -->

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
<!-- /nav -->

<!-- formulario -->
<div id="formulario">
    <form action="" method="post" name="fnuevaTarea">
        <input type="hidden" name="guardar" value="1" />
        <table cellspacing="2" boder="0">
            <tr>
                <td width="61">Titulo:</td>
                <td colspan="4"><input style="width: 300px;" type="text" name="titulo" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['titulo'])===null||$tmp==='' ? '' : $tmp);?>
"></td>
            </tr>
            <tr>
                <td>Tipo:</td>
                <td colspan="4">
                    <select id="tipo" name="tipo">
                        <option selected="selected"> - Tipo - </option>
                        <?php  $_smarty_tpl->tpl_vars['tipo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tipo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tipos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tipo']->key => $_smarty_tpl->tpl_vars['tipo']->value){
$_smarty_tpl->tpl_vars['tipo']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['tipo']->value['descripcion'];?>
"><?php echo $_smarty_tpl->tpl_vars['tipo']->value['descripcion'];?>
</option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Personal:</td>
                <td colspan="4">                               
                    <select id="tecnicos" name="tecnicos">
                        <option value=""> - Técnico - </option> 
                    </select>
                </td>
            </tr>
            <tr id="Administracion" style="vertical-align: text-top; display:  none">
                <td>&nbsp;</td>
                <td width="44">Guardia:</td>
                <td width="31"><input type="checkbox" name="guardia" value="activo"/></td>
                <td width="120">Perdida Servicio:</td>
                <td width="80"><input type="checkbox" name="noServicio" value="activo"/></td>
            </tr>           
            <tr id="Migracion1" style="vertical-align: text-top; display:  none">
                <td>&nbsp;</td>
                <td width="50">Comunidad:</td>
                <td width="auto">
                    <select id="comunidad" name="comunidad"></select>
                </td>
                <td width="50">Provincia:</td>
                <td width="80"><select id="provincia" name="provincia"></select></td>
            </tr>
            <tr id="Migracion2" style="vertical-align: text-top; display:  none">
                <td>&nbsp;</td>
                <td width="50">Sede:</td>
                <td width="auto"> <select id="sede" name="sede"></select></td>
                <td width="50">Organo:</td>
                <td width="80"><select id="organo" name="organo" overflow-y="scroll"></select></td>
            </tr>
            <tr>
                <td>
                    <label>Descripcion:</label>
                </td>
                <td colspan="4">
                    <textarea rows="4" cols="40" name="descripcion" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['descripcion'])===null||$tmp==='' ? '' : $tmp);?>
" style="vertical-align: text-top; text-align: left;"></textarea>
                </td>
            </tr>
            <tr>
                <td width="85px">Fecha inicio:</td>
                <td colspan="4">
                    <input type="date" name="fechaInicio" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['fecha_Inicio'])===null||$tmp==='' ? '' : $tmp);?>
" />
                    <img style="vertical-align: text-bottom;" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/calendario_mini.png" alt=""/>
                </td>
            </tr>
            <tr>
                <td colspan="6" align="center">
                    <input type="submit" class="button" value="Guardar" />
                </td>
            </tr>
        </table>
    </form>
</div>
<!-- formulario -->
<?php }} ?>
<?php /* Smarty version Smarty-3.1.8, created on 2016-01-28 18:58:17
         compiled from "D:\xampp\htdocs\tfg\modules\personal\views\index\nuevo_personal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:530056a7c8a5079825-56325943%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8b8fd4e2d027c30809d40d64f74a5dc2df94780' => 
    array (
      0 => 'D:\\xampp\\htdocs\\tfg\\modules\\personal\\views\\index\\nuevo_personal.tpl',
      1 => 1453836618,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '530056a7c8a5079825-56325943',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56a7c8a50ea720_22380733',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'datos' => 0,
    'comboItems' => 0,
    'cargo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a7c8a50ea720_22380733')) {function content_56a7c8a50ea720_22380733($_smarty_tpl) {?><!-- header -->            
<header>
    <h2>Nueva incorporación</h2>        
</header>  

<!-- nav -->            
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
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
personal"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
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

<!-- formulario -->            
<div id="formulario">
    <form id="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
personal/index/nuevo_personal"
          enctype="multipart/form-data">
        <input type="hidden" name="guardar" value="1" />
        <table>
            <tr>
                <td>
                    Nombre:
                </td>
                <td>
                    <input type="text" name="nombre" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['nombre'])===null||$tmp==='' ? '' : $tmp);?>
" />        
                </td>
            <tr>
                <td>
                    Cargo:
                </td>
                <td>
                    <select id="cargo" name="cargo">
                        <option value=""> -seleccione- </option>                              
                        <?php  $_smarty_tpl->tpl_vars['cargo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cargo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comboItems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cargo']->key => $_smarty_tpl->tpl_vars['cargo']->value){
$_smarty_tpl->tpl_vars['cargo']->_loop = true;
?>            
                            <option value="<?php echo $_smarty_tpl->tpl_vars['cargo']->value['idCargo'];?>
"><?php echo $_smarty_tpl->tpl_vars['cargo']->value['descripcion'];?>
</option>            
                        <?php } ?>
                    </select>           
                </td>
            </tr>
            <tr>
                <td>        
                    Email:
                </td>
                <td>
                    <input type="email" name="email" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['email'])===null||$tmp==='' ? '' : $tmp);?>
" placeholder="xxx@organismo.com"/>
                </td>
            <tr>
                <td>
                    fecha incorporacion:
                </td>
                <td>
                    <input type="date" name="fechaAlta" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['fechaAlta'])===null||$tmp==='' ? '' : $tmp);?>
" />
                </td>
            </tr>
            <tr>
                <td>
                    Usuario:
                </td>
                <td>
                    <input type="text" name="usuario" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['usuario'])===null||$tmp==='' ? '' : $tmp);?>
" />
                </td>
            </tr>
            <tr>
                <td>        
                    Password:
                <td>
                    <input type="password" name="pass" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['pass'])===null||$tmp==='' ? '' : $tmp);?>
" />

            <tr>                
                <td>
                <td>

            <tr>
                <td colspan="2">
                    Imagen: <input type="file" style="width: 125px; left: 87px; " class="custom-file-input" name="imagen" />
                </td>
            </tr>            
        </table>
        <br>
        <br>
        <p style="margin-left: 27%; "><input type="submit" value="Guardar" class="button"/></p>   
        <br>
    </form>
</div>
<?php }} ?>
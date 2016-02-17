<?php /* Smarty version Smarty-3.1.8, created on 2016-02-17 12:57:53
         compiled from "C:\xampp\htdocs\tfg\views\acl\nuevo_cargo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32005560d199ae695b4-62257384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '295294614f40d5212bf07202db8e49af3e92fd31' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tfg\\views\\acl\\nuevo_cargo.tpl',
      1 => 1455690574,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32005560d199ae695b4-62257384',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_560d199af09856_33226426',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560d199af09856_33226426')) {function content_560d199af09856_33226426($_smarty_tpl) {?><header>
    <h2>Nuevo Cargo</h2>
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
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
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
    <form id="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/nuevo_cargo"
          enctype="multipart/form-data">
        <input type="hidden" name="guardar" value="1" />
        <br>
        <br>
        <table>
            <tr>
                <td>
                    Cargo:
                </td>
                <td>
                    <input type="text" name="cargo" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['cargo'])===null||$tmp==='' ? '' : $tmp);?>
" />        
                </td>            
            </tr>            
        </table>   
        <br>
        <p style="margin-left: 27%; "><input type="submit" value="Guardar" class="button"/></p>   
        <br>
        <br>
    </form>                
</div>    <?php }} ?>
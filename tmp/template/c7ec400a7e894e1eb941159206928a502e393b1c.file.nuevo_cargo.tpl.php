<?php /* Smarty version Smarty-3.1.8, created on 2016-02-16 18:39:25
         compiled from "D:\xampp\htdocs\tfg\views\acl\nuevo_cargo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:56755616c1f9ab0cc7-34511170%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7ec400a7e894e1eb941159206928a502e393b1c' => 
    array (
      0 => 'D:\\xampp\\htdocs\\tfg\\views\\acl\\nuevo_cargo.tpl',
      1 => 1455172578,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56755616c1f9ab0cc7-34511170',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5616c1f9ae5af1_69096724',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5616c1f9ae5af1_69096724')) {function content_5616c1f9ae5af1_69096724($_smarty_tpl) {?><header>
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
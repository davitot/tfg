<?php /* Smarty version Smarty-3.1.8, created on 2016-02-16 18:49:10
         compiled from "D:\xampp\htdocs\tfg\views\acl\permisos_cargo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:304725697d03d063871-04351396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb8ffd1a7969acb95f4196bcf1323fb996e1f0c6' => 
    array (
      0 => 'D:\\xampp\\htdocs\\tfg\\views\\acl\\permisos_cargo.tpl',
      1 => 1455644666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '304725697d03d063871-04351396',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5697d03d0c3093_16234467',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'cargo' => 0,
    'permisos' => 0,
    'pr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5697d03d0c3093_16234467')) {function content_5697d03d0c3093_16234467($_smarty_tpl) {?><link href="../../views/acl/css/estilosAcl.css" rel="stylesheet" type="text/css" />

<div id="imagenAcl"> <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
views/acl/img/tecnico.png" alt=""/></div>  

<header>
    <h2>Permisos: <?php echo $_smarty_tpl->tpl_vars['cargo']->value['cargo'];?>
</h2>    
</header>

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

<div id="listadoAcl">
    <form name="form1" method="post" action="">
        <input type="hidden" name="guardar" value="1" />

        <?php if (isset($_smarty_tpl->tpl_vars['permisos']->value)&&count($_smarty_tpl->tpl_vars['permisos']->value)){?>
            <table id="tablaListado">
                <tr>
                    <th style='width: 350px;'>Permiso</th>
                    <th>Llave</th>
                    <th>Habilitado</th>
                    <th>Denegado</th>                
                </tr>                        
                <?php  $_smarty_tpl->tpl_vars['pr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['permisos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pr']->key => $_smarty_tpl->tpl_vars['pr']->value){
$_smarty_tpl->tpl_vars['pr']->_loop = true;
?>                                                                                               
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['pr']->value['permiso'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['pr']->value['llave'];?>
</td>
                        <td style="text-align: center;"><input type="radio" name="perm_<?php echo $_smarty_tpl->tpl_vars['pr']->value['llave'];?>
" value="1" <?php if (($_smarty_tpl->tpl_vars['pr']->value['valor']==1)){?>checked="checked"<?php }?>/></td>
                        <td style="text-align: center;"><input type="radio" name="perm_<?php echo $_smarty_tpl->tpl_vars['pr']->value['llave'];?>
" value="0" <?php if (($_smarty_tpl->tpl_vars['pr']->value['valor']==0)){?>checked="checked"<?php }?>/></td>                                            
                    </tr>
                <?php } ?>
            </table>
            <br>
            <br>
            <p style="margin-left: 37%; "><input type="submit" value="Guardar" class="button"/></p>    
        <?php }?>            
    </form> 
</div>

<!--<a href="http://www.freepik.com/free-vector/safety-lock-vector-design_717950.htm">Designed by Freepik</a> -->                
</body><?php }} ?>
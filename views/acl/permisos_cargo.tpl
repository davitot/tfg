<link href="../../views/acl/css/estilosAcl.css" rel="stylesheet" type="text/css" />

<div id="imagenAcl"> <img src="{$_layoutParams.root}views/acl/img/tecnico.png" alt=""/></div>  

<header>
    <h2>Permisos: {$cargo.cargo}</h2>    
</header>

<nav>
    <table style="text-align: center; font-size: 11px;">      
         <tr>
            <td>
                <img src="{$_layoutParams.root}public/img/nav/vacio.png" alt="nada"/></a>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <img src="{$_layoutParams.root}public/img/nav/vacio.png" alt="nada"/></a>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <img src="{$_layoutParams.root}public/img/nav/vacio.png" alt="nada"/></a>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <a href="{$_layoutParams.root}acl"><img src="{$_layoutParams.root}public/img/nav/atras.png" alt="Atras"/></a>
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

        {if isset($permisos) && count($permisos)}
            <table id="tablaListado">
                <tr>
                    <th style='width: 350px;'>Permiso</th>
                    <th>Llave</th>
                    <th>Habilitado</th>
                    <th>Denegado</th>                
                </tr>                        
                {foreach item=pr from=$permisos}                                                                                               
                    <tr>
                        <td>{$pr.permiso}</td>
                        <td>{$pr.llave}</td>
                        <td style="text-align: center;"><input type="radio" name="perm_{$pr.llave}" value="1" {if ($pr.valor == 1)}checked="checked"{/if}/></td>
                        <td style="text-align: center;"><input type="radio" name="perm_{$pr.llave}" value="0" {if ($pr.valor == 0)}checked="checked"{/if}/></td>                                            
                    </tr>
                {/foreach}
            </table>
            <br>
            <br>
            <p style="margin-left: 37%; "><input type="submit" value="Guardar" class="button"/></p>    
        {/if}            
    </form> 
</div>

<!--<a href="http://www.freepik.com/free-vector/safety-lock-vector-design_717950.htm">Designed by Freepik</a> -->                
</body>
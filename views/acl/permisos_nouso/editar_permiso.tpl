<header>
    <h2>Edición de permiso</h2>    
</header>
<nav>
    <table>    
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
                <a href="j{$_layoutParams.root}permisos"><img src="{$_layoutParams.root}public/img/nav/atras.png" alt="Atras"/></a>
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
                    Permiso:
                </td>
                <td>
                    <input type="texto" name="permiso" value="{if isset($datos.permiso)}{$datos.permiso}{/if}" /></p>
                </td>
            </tr>
            <tr>
                <td>
                    Llave:
                </td>
                <td>
                    <input type="llave" name="llave" value="{if isset($datos.llave)}{$datos.llave}{/if}" /></p>       
                </td>
            </tr>            
        </table>
        <br>
        <p style="margin-left: 27%; "><input type="submit" value="Guardar" class="button"/></p>   
        <br>
        <br>
    </form>      
</div>
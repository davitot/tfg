<header>
    <h2>Edición de cargo</h2>    
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

<div id="formulario">
    <form id="form1" method="post" action="">
        <input type="hidden" name="guardar" value="1" />
        <table>
            <tr>
                <td>
                    Id:
                </td>
                <td>
                    <input type="texto" name="idCargo" value="{if isset($datos.idCargo)}{$datos.idCargo}{/if}" /></p>
                </td>
            </tr>
            <tr>
                <td>
                    Cargo:
                </td>
                <td>
                    <input type="texto" name="cargo" value="{if isset($datos.idCargo)}{$datos.cargo}{/if}" /></p>
                </td>
            </tr>
            <tr>
                <td>
                    Activo:
                </td>
                <td>
                    <input type="checkbox" name="activo" value="1" {if ($datos.activo == 1)}checked="checked"{/if}/>
                </td>    
            </tr>
        </table>
        <br>
        <p style="margin-left: 27%; "><input type="submit" value="Guardar" class="button"/></p>   
        <br>
        <br>
    </form>          
</div>
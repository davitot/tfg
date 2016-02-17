<header>
    <h2>Nuevo Cargo</h2>
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
    <form id="form1" method="post" action="{$_layoutParams.root}acl/nuevo_cargo"
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
                    <input type="text" name="cargo" value="{$datos.cargo|default:""}" />        
                </td>            
            </tr>            
        </table>   
        <br>
        <p style="margin-left: 27%; "><input type="submit" value="Guardar" class="button"/></p>   
        <br>
        <br>
    </form>                
</div>    
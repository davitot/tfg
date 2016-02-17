
<header>
    <h2>Agregar Permiso</h2>
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
                <a href="{$_layoutParams.root}permisos"><img src="{$_layoutParams.root}public/img/nav/atras.png" alt="Atras"/></a>
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
    <form name="form1" action="" method="post">
        <input type="hidden" name="guardar" value="1" />
        <br>
        <br>
        <table>  
            <tr>
                <td>
                    Permiso:
                </td>
                <td>
                    <input type="text" name="permiso" value="{$datos.permiso|default:""}" />
                </td>
            </tr>
            <tr>
                <td>
                    Key:
                </td>
                <td>
                    <input type="text" name="key" value="{$datos.key|default:""}" placeholder="gestionar_xxxx"/>
                </td>
            </tr>
        </table>
        <br>
        <p style="margin-left: 27%; "><input type="submit" value="Guardar" class="button"/></p>   
        <br>
        <br>
    </form>        
</div>            
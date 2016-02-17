<!-- nav -->            
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
                <a href="{$_layoutParams.root}personal"><img src="{$_layoutParams.root}public/img/nav/atras.png" alt="Inicio"/></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Volver
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
                    Tipo:
                </td>
                <td>
                    <input type="text" name="tipo" value="{if isset($datos.tipo)}{$datos.tipo}{/if}" />
                </td>
            </tr>
            <tr>
                <td>
                    Marca:
                </td>
                <td>
                     <input type="text" name="marca" value="{if isset($datos.marca)}{$datos.marca}{/if}" />
                </td>
            </tr>
            <tr>
                <td>
                    Modelo:
                </td>
                <td>
                    <input type="text" name="modelo" value="{if isset($datos.modelo)}{$datos.modelo}{/if}" />
                </td>
            </tr>
            <tr>
                <td>
                    Num. Serie:
                </td>
                <td>
                    <input type="text" name="num_serie" value="{if isset($datos.num_serie)}{$datos.num_serie}{/if}" />
                </td>
            <tr>
            <tr>
                <td>
                    Fecha de alta:
                </td>
                <td>
                    <input type="date" name="fecha_alta" value="{if isset($datos.fecha_alta)}{$datos.fecha_alta}{/if}" />
                </td>                           
            </tr>    
            <tr>
                <td>                    
                    Asignado:
                </td>
                <td>
                    <input type="checkbox" name="activo" value="1" {if ($datos.activo == 1)}checked="checked"{/if}/>
                </td>           
        </table>
        <br>
        <p style="margin-left: 27%; "><input type="submit" value="Guardar" class="button"/></p>   
        <br>
        <br>
    </form>      

</div>
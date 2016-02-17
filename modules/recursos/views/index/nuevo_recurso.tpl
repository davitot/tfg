<!-- header -->
<header>
    <h2>Nuevo recurso</h2>        
</header>  
<!-- /header -->

<!-- nav -->            
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
                <a href="{$_layoutParams.root}recursos"><img src="{$_layoutParams.root}public/img/nav/atras.png" alt="Atras"/></a>
            </td>
        </tr>       
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;Volver
            </td>
        </tr>    
    </table>
</nav>
<!-- /nav -->
            
<!-- formulario -->            
<div id="formulario">
    <form id="form1" method="post" action="{$_layoutParams.root}recursos/index/nuevo_recurso"
          enctype="multipart/form-data">
        <input type="hidden" name="guardar" value="1" />
        <table>
             <tr><td>&nbsp;</td></tr>
            <tr>
                <td>
                    Tipo:
                </td>
                <td>
                    <input type="text" name="tipo" value="{$datos.tipo|default:""}" />        
                </td>
            <tr>
                <td>
                    Marca:
                </td>
                 <td>
                    <input type="text" name="marca" value="{$datos.marca|default:""}" />        
                </td>
            </tr>
            <tr>
                <td>        
                    Modelo:
                </td>
                <td>
                     <input type="text" name="modelo" value="{$datos.modelo|default:""}" />  
                </td>
            <tr>
                <td>
                    Num. serie:
                </td>
                <td>
                    <input type="text" name="num_serie" value="{$datos.num_serie|default:''}" />
                </td>
            </tr>
            <tr>
                 <td>
                    fecha de alta:
                </td>
                <td>
                    <input type="date" name="fecha_alta" value="{$datos.fecha_alta|default:''}" />
                </td>               
            </tr>    
            <tr><td>&nbsp;</td></tr>
            <tr>                
                <td colspan="2" style="font-size: 11px; text-decoration: red; font-style: italic; text-align: center;">
                    <span>** El nuevo recurso quedara libre para ser asignado **</span>
                </td>
            </tr>
        </table>     
        <p style="margin-left: 27%; "><input type="submit" value="Guardar" class="button"/></p>   
        <br>
        <br>
    </form>
</div>

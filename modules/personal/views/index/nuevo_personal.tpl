<!-- header -->            
<header>
    <h2>Nueva incorporación</h2>        
</header>  

<!-- nav -->            
<nav>
    <table>             
        <tr>
            <td>
                <img src="{$_layoutParams.root}public/img/nav/vacio.png" alt="nada"/>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <img src="{$_layoutParams.root}public/img/nav/vacio.png" alt="nada"/>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
         <tr>
            <td>
                <img src="{$_layoutParams.root}public/img/nav/vacio.png" alt="nada"/>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <a href="{$_layoutParams.root}personal"><img src="{$_layoutParams.root}public/img/nav/atras.png" alt="Atras"/></a>
            </td>
        </tr>       
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;Volver
            </td>
        </tr>    
    </table>
</nav>

<!-- formulario -->            
<div id="formulario">
    <form id="form1" method="post" action="{$_layoutParams.root}personal/index/nuevo_personal"
          enctype="multipart/form-data">
        <input type="hidden" name="guardar" value="1" />
        <table>
            <tr>
                <td>
                    Nombre:
                </td>
                <td>
                    <input type="text" name="nombre" value="{$datos.nombre|default:""}" />        
                </td>
            <tr>
                <td>
                    Cargo:
                </td>
                <td>
                    <select id="cargo" name="cargo">
                        <option value=""> -seleccione- </option>                              
                        {foreach from=$comboItems item=cargo}            
                            <option value="{$cargo.idCargo}">{$cargo.descripcion}</option>            
                        {/foreach}
                    </select>           
                </td>
            </tr>
            <tr>
                <td>        
                    Email:
                </td>
                <td>
                    <input type="email" name="email" value="{$datos.email|default:""}" placeholder="xxx@organismo.com"/>
                </td>
            <tr>
                <td>
                    fecha incorporacion:
                </td>
                <td>
                    <input type="date" name="fechaAlta" value="{$datos.fechaAlta|default:''}" />
                </td>
            </tr>
            <tr>
                <td>
                    Usuario:
                </td>
                <td>
                    <input type="text" name="usuario" value="{$datos.usuario|default:""}" />
                </td>
            </tr>
            <tr>
                <td>        
                    Password:
                <td>
                    <input type="password" name="pass" value="{$datos.pass|default:""}" />

            <tr>                
                <td>
                <td>

            <tr>
                <td colspan="2">
                    Imagen: <input type="file" style="width: 125px; left: 87px; " class="custom-file-input" name="imagen" />
                </td>
            </tr>            
        </table>
        <br>
        <br>
        <p style="margin-left: 27%; "><input type="submit" value="Guardar" class="button"/></p>   
        <br>
    </form>
</div>

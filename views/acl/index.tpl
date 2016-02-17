<link href="{$_layoutParams.root}views/acl/css/estilosAcl.css" rel="stylesheet" type="text/css" />

<div id="imagenAcl">
    <img src="{$_layoutParams.root}views/acl/img/gestAcl.png" alt=""/>
</div>
<header>
    <h2>Gestión de Cargos</h2>
</header>
<nav>
    <table style="text-align: center; font-size: 11px;">
        <tr>
            <td>
                <a href="{$_layoutParams.root}acl/nuevo_cargo"><img src="{$_layoutParams.root}public/img/nav/agregar.png" alt="Nuevo Cargo"/></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Nuevo cargo
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

<div id='listadoAcl_Cargos'>
    {if isset($roles) && count($roles)}
        <table id="tablaListado">
            <tr>
                <th>ID</th>
                <th>Cargo</th>
                <th>Activo</th>
                <th colspan="3">Acciones</th>                    
            </tr>
            {foreach item=rl from=$roles}
                <tr>
                    <td style="text-align: center;">{$rl.idCargo}</td>
                    <td>{$rl.descripcion}</td>
                     <td style="text-align: center; width: 5%;">
                            {if $rl.activo == 1}
                                <img src="{$_layoutParams.root}public/img/accionesTabla/gestionada.png" title="Gestionada"/>
                            {else}
                                <img src="{$_layoutParams.root}public/img/accionesTabla/noGestionada.png" title="No Gestionada"/>
                            {/if}
                       </td>  
                     <td style="text-align: center;">
                        <a href="{$_layoutParams.root}acl/editar_cargo/{$rl.idCargo}"><img src="{$_layoutParams.ruta_img}accionesTabla/editar.png" alt="Editar"/></a>
                    </td>
                    <td style="text-align: center;">
                        <a href="{$_layoutParams.root}acl/permisos_cargo/{$rl.idCargo}"><img src="{$_layoutParams.ruta_img}accionesTabla/llave.png" alt="Editar"/></a>
                    </td>
                    <td style="text-align: center;"><a href="{$_layoutParams.root}acl/eliminar_Cargo/{$rl.idCargo}"><img src="{$_layoutParams.ruta_img}accionesTabla/eliminar.png" alt="Eliminar"/></td>
                </tr>
            {/foreach}                        
        </table>            
    {/if}
</div>
</body>
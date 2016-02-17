<link href="{$_layoutParams.root}views/acl/css/estilosAcl.css" rel="stylesheet" type="text/css" />

<!-- header -->
<header>
    <h2>Gestión de Permisos</h2>       
</header>

<!-- nav -->
<nav>
    <table>
        <tr>
            <td>
                <a href="{$_layoutParams.root}acl/nuevo_permiso"><img src="{$_layoutParams.root}public/img/nav/agregar.png" alt="Agregar"/></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Nuevo permiso
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

<div id='listadoAcl'>
    {if isset($permisos) && count($permisos)}
        <table id="tablaListado">
            <tr>
                <th>ID</th>
                <th>Permiso</th>
                <th>Llave</th>
                <th colspan="2">Acciones</th>  
            </tr>

            {foreach item=rl from=$permisos}

                <tr>
                    <td>{$rl.idPermiso}</td>
                    <td>{$rl.permiso}</td>
                    <td>{$rl.llave}</td>
                    <td style="text-align: center;"><a href="{$_layoutParams.root}acl/editar_permiso/{$rl.idPermiso}"><img src="{$_layoutParams.ruta_img}accionesTabla/editar.png" alt="Editar"/></td>
                    <td style="text-align: center;"><a href="{$_layoutParams.root}acl/eliminar_Permiso/{$rl.idPermiso}"><img src="{$_layoutParams.ruta_img}accionesTabla/eliminar.png" alt="Eliminar"/></td>
                </tr>

            {/foreach}
        </table>            
    {/if}                                    
</div>     

<div id="paginacion">
    {$paginacion|default:""}     
</div>


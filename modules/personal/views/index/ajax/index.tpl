<!-- listadoPersonal -->
<div id="listadoIndex">
    {if isset($personal) && count($personal)}
        <table id="tablaListado">
            <tr>
                <th>Nombre</th>
                <th>Cargo</th>
                <th>E-mail</th>
                <th>Fecha Alta</th>                    
                <th>Activo</th>                       
                    {if Session::acceso(Session::get('level'))}
                    <th colspan="3">Acciones</th>
                    {/if}
            </tr>

            {foreach item=datos from=$personal}

                <tr>
                    <td style="width: 12%;">{$datos.nombre}</td>
                    <td style="width: 10%;">{$datos.cargo}</td>
                    <td style="width: 7%;">{$datos.email}</td>                        
                    <td style="text-align: center; width: 4%;">{$datos.fecha_Incorporacion|date_format:"%d/%m/%Y"}</td>    
                    <td style="text-align: center; width: 5%;">
                        {if $datos.activo == 1}
                            <img src="./public/img/accionesTabla/gestionada.png" title="Usuario activo"/>
                        {else}
                            <img src="./public/img/accionesTabla/noGestionada.png" title="Usuario inactivo"/>
                        {/if}
                    </td>  
                    {if Session::acceso(Session::get('level'))}
                        <td style="width: 0.4%; text-align: center;"><a href="./personal/index/editar_personal/{$datos.idPersonal}/{$datos.idCargo}"><img src="./public/img/accionesTabla/editar.png" alt="Editar"/></a></td>                        
                        <td style="width: 0.4%; text-align: center;"><a href="./personal/index/eliminar_personal/{$datos.idPersonal}/{$datos.idCargo}"><img src="./public/img/accionesTabla/eliminar.png" alt="Eliminar"/></a></td>                        
                        <td style="width: 0.4%; text-align: center;"><a href="../acl/permisos_cargo/{$datos.idCargo}"><img src="./public/img/accionesTabla/llave.png" alt="Permisos"/></a></td>            
                            {/if}
                </tr>
            {/foreach}
        </table>

    {else}

        <p><strong>No hay personal dado de alta.</strong></p>

        <p><img src="./public/img/calendario_blank.png" alt="Sin resultados"/></p>

    {/if}                       
</div>
<!-- listadoPersonal -->

<!-- Paginacion -->
<div id="paginacion">
    {$paginacion|default:""}
</div>
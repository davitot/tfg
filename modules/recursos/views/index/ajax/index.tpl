<div id="listadoIndex">
        {if isset($recursos) && count($recursos)}
            <table id="tablaListado">
                <tr>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Num. Serie</th>
                    <th>Fecha Alta</th>                    
                    <th>Disponible</th>                       
                        {if Session::acceso(Session::get('level'))}
                        <th colspan="2">Acciones</th>                        
                        {/if}

                </tr>

                {foreach item=datos from=$recursos}
                    <tr>
                        <td style="width: 12%;">{$datos.tipo}</td>
                        <td style="width: 10%;">{$datos.marca}</td>
                        <td style="width: 7%;">{$datos.modelo}</td>                        
                        <td style="width: 7%;">{$datos.num_serie}</td>
                        <td style="text-align: center; width: 4%;">{$datos.fecha_alta}</td>    
                        <td style="text-align: center; width: 5%;">
                            {if $datos.activo == 0}
                                <img src="./public/img/accionesTabla/gestionada.png" title="Recurso disponible"/>
                            {else}
                                <img src="./public/img/accionesTabla/noGestionada.png" title="Asignado a:  {$datos.empleado}  el  {$datos.fecha_alta}"/>
                            {/if}
                        </td>  
                        {if Session::acceso(Session::get('level'))}
                            <td style="width: 0.4%; text-align: center;"><a href="./recursos/index/editar_recurso/{$datos.idRecurso}"><img src="./public/img/accionesTabla/editar.png" alt="Editar"/></a></td>                        
                            <td style="width: 0.4%; text-align: center;"><a href="./recursos/index/eliminar_recurso/{$datos.idRecurso}"><img src="./public/img/accionesTabla/eliminar.png" alt="Eliminar"/></a></td>
                                {/if}                    
                {/foreach}
            </table>

        {else}
            <p><strong>No hay recursos coincidentes con el criterio.</strong></p>
            <p><img src="./public/img/calendario_blank.png" alt="Sin resultados"/></p>
        {/if}                       
    </div>

<!-- Paginacion -->
<div id="paginacion">
    {$paginacion|default:""}
</div>
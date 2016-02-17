<!-- ListadoTareas -->
<div id='listadoIndex'>            
    {if isset($tareas) && count($tareas)}
        <table id="tablaListado">
            <thead>   
                <tr>
                    <th>Personal</th>
                    <th>Tarea</th>
                    <th>Fecha inicio</th>
                    <th>Fecha fin</th>
                    <th>Finalizada</th>
                    <th colspan="2">Acciones</th>  
                </tr>
            </thead>

            {foreach item=ta from=$tareas}                
                <tr>                          
                    <td style="width: 25%;">{$ta.tecnico}</td>
                    <td style="width: 40%;">{$ta.titulo}</td>
                    <td style="text-align: center; width: 14%;">{$ta.fecha_inicio|date_format:"%d/%m/%Y"}</td>
                    {if $ta.fecha_fin == '' OR $ta.fecha_fin == '0000-00-00'}
                        <td style="text-align: center; width: 10%;">Pendiente</td>
                    {else}
                        <td style="text-align: center; width: 10%;">{$ta.fecha_fin|date_format:"%d/%m/%Y"}</td>
                    {/if}

                    <td style="text-align: center; width: 5%;">
                        {if $ta.activa == 1}                                
                            <img src="./public/img/accionesTabla/gestionada.png" alt="Gestionada"/>
                        {else}
                            <img src="./public/img/accionesTabla/noGestionada.png" alt="No Gestionada"/>
                        {/if}
                    </td>                                                                        
                    <td style="text-align: center;"><a href="./tareas/index/editar_tarea/{$ta.idTarea}"><img src="./public/img/accionesTabla/editar.png" alt="Editar"/></a></td>
                    <td style="text-align: center;"><a href="./tareas/index/eliminar_tarea/{$ta.idTarea}"><img src="./public/img/accionesTabla/eliminar.png" alt="Eliminar"/></a></td>
                </tr>
            {/foreach}
        </table>            
    {else}
        <p><strong>No hay Tareas pendientes.</strong></p>

        <p><img src="./public/img/calendario_blank.png" alt="Sin resultados"/></p>

    {/if}                 
</div>        
<!-- Paginacion -->
<div id="paginacion">
    {$paginacion|default:""} 
</div>
<link href="{$_layoutParams.root}modules/recursos/views/index/css/estilosRecursos.css" rel="stylesheet" type="text/css" />
<!-- header -->
<header>
    <h2>Gestión de Recursos</h2>        
</header>  
<!-- /header -->
<script src="js/recursos.js" type="text/javascript"></script>
<!-- Filtros -->
<div class="filtros2 subfiltros">
    <table>
        <tr class="spaceUnder">
            <td>
                <input type="text" id="nombre" placeholder="S/N...">
            </td>
            <td  style="vertical-align: middle;">
                <a href="#" onclick="paginacion();
                        return false;" id="btnBuscar">&nbsp;&nbsp;<img src="{$_layoutParams.root}public/img/icono_lupa.png" title="Buscar"/></a>
            </td>
        </tr> 
        <tr>
            <td> <select id="tipoRecurso" style="height: 24px; width: 170px;">
                    <option>
                        -- Tipo --
                    </option>
                    {if isset($recursos) && count($recursos)}
                        {foreach from=$recursos item = rec}
                            <option value='{$rec.tipo}'>
                                {$rec.tipo}   
                            </option>                    
                        {/foreach}
                    {/if}
                </select>   
            </td>
            <td> <select id="marca" style="height: 24px; width: 170px;">
                    <option>
                        -- Marca --
                    </option>
                    {if isset($marcas) && count($marcas)}
                        {foreach from=$marcas item = marca}
                            <option value='{$marca.marca}'>
                                {$marca.marca}   
                            </option>                    
                        {/foreach}
                    {/if}
                </select>   
            </td>
            <td><button type="button" class="limpiar" id="limpiarCampos">&nbsp;<img src="{$_layoutParams.root}public/img/brocha.png" alt="Limpiar"/></button></td>
        </tr>
    </table>
</div>

<!-- nav-->
<nav>
    <table style="text-align: center; font-size: 11px;">
        <tr>
            <td>
                {if Session::acceso(Session::get('level'))}  
                    <a href="{$_layoutParams.root}recursos/index/nuevo_recurso"><img src="{$_layoutParams.root}public/img/nav/agregar.png" alt="Agregar"/></a>
                    {else}                
                    <img src="{$_layoutParams.root}public/img/nav/agregar_noacceso.png" alt="No permitido"/>
                {/if}
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Nuevo
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
                <a href="{$_layoutParams.root}personal"><img src="{$_layoutParams.root}public/img/nav/atras.png" alt="Volver"/></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Volver
            </td>
        </tr>
    </table>      
</nav>

<!-- ImagenPersonal-->
<div id="imagenUpDcha">
    <img src="{$_layoutParams.root}modules/recursos/views/index/img/personal.png" alt=""/>
</div>

<div id="refrescar">
    <!-- listadoPersonal -->
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

                {foreach item=recurso from=$recursos}
                    <tr>
                        <td style="width: 12%;">{$recurso.tipo}</td>
                        <td style="width: 10%;">{$recurso.marca}</td>
                        <td style="width: 7%;">{$recurso.modelo}</td>                        
                        <td style="width: 7%;">{$recurso.num_serie}</td>
                        <td style="text-align: center; width: 4%;">{$recurso.fecha_alta|date_format:"%d/%m/%Y"}</td>    
                        <td style="text-align: center; width: 5%;">
                            {if $recurso.activo == 0}
                                <img src="{$_layoutParams.root}public/img/accionesTabla/gestionada.png" title="Recurso disponible"/>
                            {else}
                                <img src="{$_layoutParams.root}public/img/accionesTabla/noGestionada.png" title="Asignado a:  {$recurso.empleado}  el  {$recurso.fecha_alta}"/>
                            {/if}
                        </td>  
                        {if Session::acceso(Session::get('level'))}                            
                            <td style="width: 0.4%; text-align: center;"><a href="./recursos/index/editar_recurso/{$recurso.idRecurso}"><img src="./public/img/accionesTabla/editar.png" alt="Editar"/></a></td>                        
                                    {if $recurso.activo == 0}
                                <td style="width: 0.4%; text-align: center;"><img src="./public/img/accionesTabla/eliminar_nolevel.png" title="Recurso disponible"/>
                                {else}
                                <td style="width: 0.4%; text-align: center;"><a href="#" onClick="confirmarBorrado({$recurso.idRecurso})"><img src="./public/img/accionesTabla/eliminar.png" title="Liberar"/></a>
                                    {/if}
                                {/if}                    
                            {/foreach}
            </table>

        {else}

            <p><strong>No hay recursos coincidencies con el criterio.</strong></p>

            <p><img src="./public/img/calendario_blank.png" alt="Sin resultados"/></p>

        {/if}                       
    </div>
    <div id="paginacion">
        {$paginacion|default:""}
    </div>
</div>

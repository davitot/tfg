<link href="{$_layoutParams.root}modules/tareas/views/index/css/estilosTareas.css" rel="stylesheet" type="text/css" />

<!-- Header -->
<header>
    <h2>Gestión de Tareas</h2> 
     <!--{$tecnicos|@debug_print_var}-->
</header>
<!-- /Header -->


<!-- Filtros -->
<div class="filtrosT subfiltros">
    <table>
        <tr class="spaceUnder">
            <td>
                <input style="width:224px;" type="text" id="nombre" placeholder="Nombre">
            </td>

            <td  style="vertical-align: middle;">
                <a href="#" onclick="paginacion();
                        return false;" id="btnBuscar">&nbsp;&nbsp;<img src="{$_layoutParams.root}public/img/icono_lupa.png" title="Buscar"/></a>
            </td>
            <td></td>
        </tr>        
        
        <tr>
            <td>
                <select id="idPersonal" style="height: 21px;">
                    <option>
                        -- Técnico --
                    </option>
                    {if isset($tecnicos) && count($tecnicos)}
                        {foreach from=$tecnicos item = tec}
                            <option value='{$tec.idPersonal}'>
                                {$tec.nombre}   
                            </option>                    
                        {/foreach}
                    {/if}
                </select>   
            </td>
            <td></td>
            <td>
                <input type="date" id="fechaInicio" style="height: 16px;"/>
            </td>            
            <td style="vertical-align: middle;">                
                <a href="#" onclick="limpiar();
                        return false;" id="limpiarFecha">&nbsp;<img src="{$_layoutParams.root}public/img/brocha.png" title="Limpiar"/></a>               
            </td>
        </tr>
    </table>
</div>
<!-- /Filtros -->

<!-- nav -->
<nav>
    <table style="text-align: center; font-size: 11px;">
        <tr>
            <td>
                <a href="{$_layoutParams.root}tareas/index/nueva_tarea"><img src="{$_layoutParams.root}public/img/nav/agregar.png" title="Agregar tarea"/></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Nueva tarea
            </td>
        </tr>
        <tr>
            <td>
                <a href="{$_layoutParams.root}migraciones/index/tareas_tecnico"><img src="{$_layoutParams.root}public/img/nav/informe.png" title="Ver tareaas"/></a>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;&nbsp;&nbsp;Mis Tareas
            </td>
        </tr>
        <tr>
            <td>
                <a href="{$_layoutParams.root}pdf/generar_InformesTareas"><img src="{$_layoutParams.root}public/img/nav/impresora.png" title="Imprimir"/></a>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;&nbsp;&nbsp;&nbsp;Imprimir
            </td>
        </tr>
        <tr>
            <td>
                <a href="{$_layoutParams.root}"><img src="{$_layoutParams.root}public/img/nav/atras.png" title="Atras"/></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Volver
            </td>
        </tr>
    </table>                
</nav>    

<!-- Imagen -->
<div id="imagenUpDcha">
    <img src="{$_layoutParams.root}views/acl/img/gestAcl.png" alt=""/>
</div>

<!-- Refrescar -->
<div id="refrescar">
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
                            {if $ta.activa == 0}                                
                                <img src="./public/img/accionesTabla/gestionada.png" alt="Gestionada" title="Finalizada"/>
                            {else}
                                <img src="./public/img/accionesTabla/noGestionada.png" alt="No Gestionada" title="Pendiente"/>
                            {/if}
                        </td>
                        <td style="text-align: center;"><a href="./tareas/index/editar_tarea/{$ta.idTarea}"><img src="./public/img/accionesTabla/editar.png" alt="Editar"/></a></td>
                        <td style="text-align: center;"><a href="#" onClick="confirmarBorrado({$ta.idTarea}, {$ta.idPersonal}, '{$ta.tipo}')"><img src="./public/img/accionesTabla/eliminar.png" alt="Eliminar"/></a>
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
</div>

<!--<script language="javascript"> 
    mostrar(); 
</script>-->
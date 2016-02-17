<link href="{$_layoutParams.root}modules/personal/views/index/css/estilosPersonal.css" rel="stylesheet" type="text/css" />

<!-- header -->
<header>
    <h2>Gestión de Personal</h2>        
</header>
<!-- header -->

<!-- Filtros -->
<div class="filtros2 subfiltros">
    <table>
        <tr class="spaceUnder">
            <td>
                <input type="text" id="nombre" placeholder="Nombre">
            </td>
            <td  style="vertical-align: middle;">
                <a href="#" onclick="paginacion();return false;" id="btnBuscar">&nbsp;&nbsp;<img src="{$_layoutParams.root}public/img/icono_lupa.png" title="Buscar"/></a>
            </td>
        </tr>        
        <tr>
            <td>
                <select id="cargo" style="height: 20px;">
                    <option>
                        -- Cargo --
                    </option>
                    {if isset($cargos) && count($cargos)}
                        {foreach from=$cargos item = per}
                            <option value='{$per.idCargo}'>
                                {$per.descripcion}   
                            </option>                    
                        {/foreach}
                    {/if}
                </select>
            </td>
            <td>
                <input type="date" id="fechaInicio" style="height: 16px;"/>
            </td>
            <td style="vertical-align: middle;">                
                <a href="#" onclick="limpiar();return false;" id="limpiarFecha">&nbsp;<img src="{$_layoutParams.root}public/img/brocha.png" title="Limpiar"/></a>               
            </td>
        </tr>
    </table>
</div>
<!-- Filtros -->

<!-- nav-->
<nav>
    <table style="text-align: center; font-size: 11px;">
        <tr>
            <td>
                {if Session::acceso(Session::get('level'))}  
                    <a href="{$_layoutParams.root}personal/index/nuevo_personal"><img src="{$_layoutParams.root}public/img/nav/agregar.png" alt="Agregar"/></a>
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
                {if Session::acceso(Session::get('level'))}            
                    <a href="{$_layoutParams.root}acl"><img src="{$_layoutParams.root}public/img/nav/organigrama.png" alt="ACL"/></a>            
                    {else}                
                    <img src="{$_layoutParams.root}public/img/nav/organigrama_noacceso.png" alt="No permitido"/></a>            
                {/if}
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;ACL
            </td>
        </tr>
        <tr>
            <td>
                <a href="{$_layoutParams.root}recursos"><img src="{$_layoutParams.root}public/img/nav/recursos.png" alt="Recursos"/></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Recursos
            </td>
        </tr>
        <tr>
            <td>
                <a href="{$_layoutParams.root}"><img src="{$_layoutParams.root}public/img/nav/atras.png" alt="Volver"/></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Volver
            </td>
        </tr>
    </table>      
</nav>
<!-- nav-->

<!-- refrescar -->
<div id="refrescar">
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
                                <img src="{$_layoutParams.root}public/img/accionesTabla/gestionada.png" title="Usuario activo"/>
                            {else}
                                <img src="{$_layoutParams.root}public/img/accionesTabla/noGestionada.png" title="Usuario inactivo"/>
                            {/if}
                        </td>  
                        {if Session::acceso(Session::get('level'))}
                            <td style="width: 0.4%; text-align: center;"><a href="{$_layoutParams.root}personal/index/editar_personal/{$datos.idPersonal}/{$datos.idCargo}"><img src="./public/img/accionesTabla/editar.png" alt="Editar"/></a></td>                        
                            <td style="width: 0.4%; text-align: center;"><a href="{$_layoutParams.root}personal/index/eliminar_personal/{$datos.idPersonal}/{$datos.idCargo}"><img src="./public/img/accionesTabla/eliminar.png" alt="Eliminar"/></a></td>                        
                            <td style="width: 0.4%; text-align: center;"><a href="{$_layoutParams.root}acl/permisos_cargo/{$datos.idCargo}"><img src="./public/img/accionesTabla/llave.png" alt="Permisos"/></a></td>            
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
    <!-- Paginacion -->
</div>
<!-- refrescar -->

<!-- ImagenPersonal-->
<div id="imagenUpDcha">
    <img src="{$_layoutParams.root}public/img/imgsUp/personal.png" alt=""/>
</div>
<!-- ImagenPersonal-->
<link href="{$_layoutParams.root}modules/migraciones/views/index/css/estilosMigracion.css" rel="stylesheet" type="text/css" />

<!-- header -->
<header>
    <h2>Listado de Tareas de migración</h2>    
</header>  
<!-- header -->

<!-- filtros -->
<div id="filtros">
    <table>
        <th>
            Comunidad
        </th>
        <th>
            Fecha Incio
        </th>
        <th>
            Fecha Fin
        </th>        
        <tr>
            <td> <select id="comunidad" style="height: 24px;">
                    <option>
                        ...
                    </option>
                    {foreach item=comunidad from=$comunidades}                    
                        <option value='{$comunidad.comunidad}'>
                            {$comunidad.comunidad}   
                        </option>                         
                    {/foreach}
                </select>   
            </td>
            <td> 
                 <input type="date" id="fechaInicio" style="height: 16px;"/>
            </td>
            <td>  <input type="date" id="fechaFin" style="height: 16px;"/>
            </td>           
            <td><button type="button" class="limpiar" id="limpiarFiltroInforme"><img src="{$_layoutParams.root}public/img/brocha.png" alt="Limpiar"/></button></td>           
        </tr>
    </table>
</div>

<!-- nav -->        
<nav>        
    <table style="text-align: center; font-size: 11px;">
        <tr>
            <td>
                <img src="{$_layoutParams.root}public/img/nav/impresora.png" alt="nada"/>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;Imprimir
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
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <a href="{$_layoutParams.root}tareas">&nbsp;&nbsp;&nbsp;<img src="{$_layoutParams.root}public/img/nav/atras.png" alt="Agregar"/></a>
            </td>
        </tr>       
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;Volver
            </td>
        </tr>
    </table>                                           
</nav>

<!-- Refrescar -->
<div id="refrescar">
    <!-- ListadoMigracion -->
    <div id="listadoIndex" style="text-align: center;">      
        {if isset($tareas) && count($tareas)}
            <table id="tablaListado">       
                <tr>
                    <th>Comunidad</th>
                    <th>Provincia</th>
                    <th>Sede</th>
                    <th>Titulo</th>                    
                    <th style="width: 30px; ">Inicio</th>
                    <th style="width: 30px; ">Fin</th>
                </tr>
                {$comunidad=''}                
                {$provincia=''} 
                {$antComunidad=''}
                {$antProvincia=''}
                {foreach item=ta from=$tareas}
                    {$antComunidad=$comunidad}
                    {$comunidad={$ta.comunidad}}
                    {$antProvincia=$provincia}
                    {$provincia={$ta.provincia}}
                    <tr>    
                    {if $comunidad != $antComunidad}
                            <td>{$ta.comunidad}</td>
                            {$comunidad=$ta.comunidad}
                        {else}
                            <td>&nbsp;</td>
                        {/if}
                        {if $provincia != $antProvincia}
                            <td>{$ta.provincia}</td>
                            {$provincia=$ta.provincia}
                        {else}
                            <td>&nbsp;</td>
                        {/if}   
                          <td>{$ta.sede}</td> 
                         <td>
                                <a href="{$_layoutParams.root}pdf/generar_InformeTarea/{$ta.idPersonal}/{$ta.idTarea}">{$ta.titulo}</a>
                            </td>
                        <td>{$ta.fecha_inicio|date_format:"%d/%m/%Y"}</td>
                        {if $ta.fecha_fin == '' OR $ta.fecha_fin=='0000-00-00'}
                            <td style="text-align: center;"> <img src="{$_layoutParams.root}public/img/accionesTabla/noGestionada.png" title="Iniciada: {$ta.fecha_inicio|date_format:"%d/%m/%Y"}"/> </td>
                            {else}
                                {$title="Iniciada:     {$ta.fecha_inicio|date_format:"%d/%m/%Y"} \nFinalizada: {$ta.fecha_fin|date_format:"%d/%m/%Y"}"}
                                {$title= htmlentities($title)}
                            <td style="text-align: center;"> <img src="{$_layoutParams.root}public/img/accionesTabla/gestionada.png" title="{$title}"/> </td>
                            {/if}                        
                    </tr>
                {/foreach}
            </table> 
        {else}
            <p><strong>No hay resultados disponibles.&nbsp;&nbsp;&nbsp; <img src="{$_layoutParams.root}public/img/calendario_blank.png" alt="Editar"/></strong></p>
                {/if}                                
    </div>   

    <div id="contador">
        Registros: {count($tareas)}
    </div>

    <!-- Paginacion -->
    <div id="paginacion">        
        {$paginacion|default:""}
    </div>
</div>
<!-- Refrescar -->

<!-- imagenTareasTecnico -->
<div id="imagenUpDcha">
    <img src="{$_layoutParams.root}public/img/imgsUp/comunidades.png" alt=""/>
</div>
<!-- imagenTareasTecnico -->
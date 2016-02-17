<link href="{$_layoutParams.root}modules/migraciones/views/index/css/estilosMigracion.css" rel="stylesheet" type="text/css" />

<!-- header -->
<header>
    <h2>Gestión de Migraciones</h2>    
</header>  

<!-- filtros -->
<div id="filtros">
    <table>
        <th>
            Comunidad
        </th>
        <th>
            Provincia
        </th>
        <th>
            Sede
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
            <td> <select id="provincia" style="height: 24px;">
                    <option>
                        ...
                    </option>
                    {foreach item=provincia from=$provincias}                    
                        <option value='{$provincia.provincia}'>
                            {$provincia.provincia}   
                        </option>                         
                    {/foreach}
                </select>   
            </td>
            <td> <select id="sede" style="height: 24px;">
                    <option>
                        ...
                    </option>
                    {foreach item=sede from=$sedes}                    
                        <option value='{$sede.sede}'>
                            {$sede.sede}   
                        </option>                         
                    {/foreach}
                </select>   
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
                <a href="{$_layoutParams.root}migraciones/index/informe_totalesTecComu"><img src="{$_layoutParams.root}public/img/nav/impresora.png" alt="nada"/></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                Tecnicos->Comunidad
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
                <a href="{$_layoutParams.root}pdf/generar_InformeEstado"><img src="{$_layoutParams.root}public/img/nav/impresora.png" alt="nada"/></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;Imprimir
            </td>
        </tr>
        <tr>
            <td>
                <a href="{$_layoutParams.root}migraciones">&nbsp;&nbsp;&nbsp;<img src="{$_layoutParams.root}public/img/nav/atras.png" alt="Agregar"/></a>
            </td>
        </tr>       
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;Volver
            </td>
        </tr>
    </table>                                           
</nav>
<!-- nav -->        

<!-- Refrescar -->
<div id="refrescar">
    <!-- ListadoMigracion -->
    <div id="listadoIndex" style="text-align: center;">      
        {if isset($resultados) && count($resultados)}           
            <table id="tablaListado">
                <tr>                    
                    <th>Comunidad</th>
                    <th>Provincia</th>                                            
                    <th>Sede</th>     
                    <th>Organo</th>
                    <th>Pendientes</th>
                    <th>Realizadas</th>     
                    <th>No Aplica</th>                         
                </tr>
                {$comunidad=''}                
                {$provincia=''} 
                {$sede=''}
                {$antComunidad=''}
                {$antProvincia=''}
                {$antSede=''}
                {foreach item=datos from=$resultados}                
                    {$antComunidad=$comunidad}
                    {$comunidad={$datos.comunidad}}
                    {$antProvincia=$provincia}
                    {$provincia={$datos.provincia}}
                    {$antSede=$sede}
                    {$sede={$datos.sede}}
                    <tr style="text-align: center;"> 
                        {if $comunidad != $antComunidad}
                            <td>{$datos.comunidad}</td>
                            {$comunidad=$datos.comunidad}
                        {else}
                            <td>&nbsp;</td>
                        {/if}
                        {if $provincia != $antProvincia}
                            <td>{$datos.provincia}</td>
                            {$provincia=$datos.provincia}
                        {else}
                            <td>&nbsp;</td>
                        {/if} 
                        {if $sede != $antSede}
                            <td>{$datos.sede}</td>
                            {$sede=$datos.sede}
                        {else}
                            <td>&nbsp;</td>
                        {/if}                       
                        <td>{$datos.organo}</td>                                                 
                        <td style="text-align: center;">{$datos.pendientes}</td>
                        <td style="text-align: center;">{$datos.realizadas}</td>
                        <td style="text-align: center;">{$datos.no_aplica}</td>                        
                    </tr>
                {/foreach}
            </table>
        {else}
            <p><strong>No hay resultados disponibles.&nbsp;&nbsp;&nbsp; <img src="{$_layoutParams.root}/public/img/calendario_blank.png" alt="Editar"/></strong></p>
                {/if}              
    </div>   

    <div id="contador">
        Registros: {$contador}
    </div>

    <!-- Paginacion -->
    <div id="paginacion">        
        {$paginacion|default:""}
    </div>
</div>
<!-- Refrescar -->

<!-- Totales -->
<div id="resumenTotales">       
    {$i=0}
    {$total=0}
    {$totalRealizadas=0}
    {foreach item=datos from=$pendientes}             
        {if isset($datos)}
        <table id="tablaTotales">        
            <strong>{$datos.comunidad}</strong>
            <th>Realizadas</th>
            <th>Pendientes</th>
            <th>No Aplica</th>        
            <tr>
                {if isset($realizadas[$i])}
                <td style=" text-align: center;">{$realizadas[$i].realizadas}</td>
                {else}
                    <td>0</td>
                {/if}
                <td style=" text-align: center;">{$datos.pendientes}</td>
                {if isset($noAplica[$i])}
                <td style=" text-align: center;">{$noAplica[$i].noAplica}</td>
                {else}
                    <td>0</td>
                {/if}                                
            </tr>        
        </table>        
        <br/>
        {$i= $i+1}        
        {/if}
    {/foreach}
</div>
<!-- /Totales -->    

<!-- imagenMigracion -->
<div id="imagenUpDcha">
     <img src="{$_layoutParams.root}public/img/imgsUp/comunidades.png" title="Gestion de migraciones"/>
</div>
<!-- imagenMigracion -->
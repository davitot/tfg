<link href="{$_layoutParams.root}views/migracion/css/estilosMigracion.css" rel="stylesheet" type="text/css" />       

<!-- ListadoInforme -->
<div id="listadoIndex" style="auto">      
    {if isset($resultados) && count($resultados)}          
        <table id="tablaListado">
            <tr>                    
                <th>Comunidad</th>
                <th>Provincia</th>                                            
                <th>Sede</th>     
                <th>Organo</th>
                <th>Pendientes</th>
                <th>Realiadas</th>     
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
        <p><strong>No hay Resultados disponibles.&nbsp;&nbsp;&nbsp; <img src="{$_layoutParams.root}/public/img/calendario_blank.png" alt="Editar"/></strong></p>
            {/if}              
</div>   

<div id="contador">
    Registros: {$contador}
</div>

<!-- Paginacion -->
<div id="paginacion">        
    {$paginacion|default:""}
</div>

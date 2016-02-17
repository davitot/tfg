<link href="{$_layoutParams.root}views/migracion/css/estilosMigracion.css" rel="stylesheet" type="text/css" />       

<!-- ListadoTareas -->
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
                        <a href="../../../../../tfg/pdf/generar_Informe/{$ta.idPersonal}/{$ta.idTarea}">{$ta.titulo}</a>
                    </td>
                    <td>{$ta.fecha_inicio|date_format:"%d/%m/%Y"}</td>
                    {if $ta.fecha_fin == '' OR $ta.fecha_fin=='0000-00-00'}
                        <td style="text-align: center;"><img src="../../../../../tfg/public/img/accionesTabla/noGestionada.png" title="Iniciada: {$ta.fecha_inicio|date_format:"%d/%m/%Y"}"/> </td>
                        {else}
                            {$title="Iniciada:     {$ta.fecha_inicio|date_format:"%d/%m/%Y"} \nFinalizada: {$ta.fecha_fin|date_format:"%d/%m/%Y"}"}
                            {$title= htmlentities($title)}
                        <td style="text-align: center;"><img src="../../../../../tfg/public/img/accionesTabla/gestionada.png" title="{$title}"/> </td>
                        {/if}                        
                </tr>
            {/foreach}
        </table> 
    {else}
        <p><strong>No hay resultados disponibles.&nbsp;&nbsp;&nbsp; <img src="../../../../../tfg/public/img/calendario_blank.png" alt="Editar"/></strong></p>
            {/if}                                
</div>   

<div id="contador">
    Registros: {count($tareas)}
</div>

<!-- Paginacion -->
<div id="paginacion">        
    {$paginacion|default:""}
</div>

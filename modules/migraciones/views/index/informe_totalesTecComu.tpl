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
        <tr>
            <td> <select id="comunidad" style="height: 24px;">                  
                    {foreach item=comunidad from=$comunidades}                    
                        <option value='{$comunidad.comunidad}'>
                            {$comunidad.comunidad}   
                        </option>                         
                    {/foreach}
                </select>   
            </td>                           
            <td><button type="button" class="limpiar" id="limpiarFiltroInforme"><img src="{$_layoutParams.root}public/img/brocha.png" alt="Limpiar"/></button></td>           
        </tr>
    </table>
</div>
<!-- /filtros -->

<!-- nav -->        
<nav>        
    <table style="text-align: center; font-size: 11px;">
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
                &nbsp;&nbsp;&nbsp;Imprimirg
            </td>
        </tr>
        <tr>
            <td>
                <a href="{$_layoutParams.root}migraciones/index/informe_estado">&nbsp;&nbsp;&nbsp;<img src="{$_layoutParams.root}public/img/nav/atras.png" alt="Agregar"/></a>
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
    <!-- ListadoResumen -->
    <div id="TotalesxComumidad">
        {$comunidad=''}
        {$antComunidad=''} 
        {$provincia=''}
        {$antProvincia=''} 
        <table id="tablaListado">                                                              
            {foreach item=datos from=$resultados}
                {$antComunidad=$comunidad}
                {$comunidad={$datos.comunidad}}  
                {$antProvincia=$provincia}
                {$provincia=$datos.provincia}                 
                {if $comunidad != $antComunidad}                   
                    <tr style="text-align: center;">                                                             
                        <th colspan="2">{$datos.comunidad}</th>
                            {$comunidad=$datos.comunidad}                        
                    </tr>                                        
                {/if}   
                {if $provincia != $antProvincia}
                    <tr style="text-align: center;">                                                             
                        <td colspan="2"><strong>{$datos.provincia}</strong></td>
                            {$provincia=$datos.provincia}                        
                    </tr>  
                {/if}  
                <tr>
                    <td style="text-align: left;">{$datos.tecnico}</td>
                    <td style="text-align: center;">{$datos.totales}</td>                    
                </tr>               
            {/foreach}
        </table>
    </div>  
</div>
<!-- Refrescar -->


<!-- imagenMigracion -->
<div id="imagenUpDcha">
    <img src="{$_layoutParams.root}public/img/imgsUp/comunidades.png" title="Gestion de migraciones"/>
</div>
<!-- imagenMigracion -->
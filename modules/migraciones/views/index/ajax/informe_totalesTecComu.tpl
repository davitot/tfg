<link href="{$_layoutParams.root}views/migracion/css/estilosMigracion.css" rel="stylesheet" type="text/css" />       
<!-- ListadoTareas -->
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

<!-- ListadoMigracion -->
<div id="listadoIndex" style="width:auto;">      
    {if isset($migraciones) && count($migraciones)}          
        <table id="tablaListado">
            <tr>                
                <th>idLotus</th>
                <th>Nombre</th>
                <th>Cargo</th>
                <th>Fecha inicio</th>
                <th>Fecha Fin</th>
                <th>Estado Inicial</th>
                <th>Estado Final</th>                    
                <th>Observaciones</th>
            </tr>

            {foreach item=datos from=$migraciones}                   
                <tr>                    
                    <td style="cursor: pointer;text-align: center;" id="indice" onclick="load({$datos.idMigracion});">{$datos.idLotus}</td>                    
                    <td>{$datos.apellidos}, {$datos.nombre}</td>
                    <td><input type="text" class="valor" name="cargo" size="17" value="{$datos.cargo}"/></td>                    
                    <td><input type="text" class="valor" name="fechaInicio" size="17" value="{$datos.fecha_Inicio}"/></td>  
                    <td><input type="text" class="valor" name="fechaFin" size="17" value="{$datos.fecha_Fin}"/></td>  
                    <td><input type="text" class="valor" name="estado_inicial" size="15" value="{$datos.estado_inicial}"/></td> 
                    <td><input type="text" class="valor" name="estado_final" size="15" value="{$datos.estado_final}"/></td>                                                                                           
                    <td><input type="text" class="valor" name="estado_observaciones" size="80" value="{$datos.observaciones}"/></td>
                </tr>
            {/foreach}                
        </table>
    {else}
        <p><strong>No hay migraciones registradas.&nbsp;&nbsp;&nbsp; <img src="{$_layoutParams.root}/public/img/calendario_blank.png" alt="Editar"/></strong></p>
            {/if}              
</div>   

<div id="contador">
    Registros: {$contador}
</div>

<!-- Paginacion -->
<div id="paginacion">        
    {$paginacion|default:""}  
</div>

<script type="text/javascript">
    $("td").change(function () {
        var col = $(this).parent().children().index($(this));
        var row = $(this).parent().parent().children().index($(this).parent());
        var table = document.getElementById("tablaListado");

        var row1 = table.rows[row];
        var col1 = row1.cells[0];

        cellsOfRow = table.rows[0].getElementsByTagName('th');
        var titulo = cellsOfRow[col].innerHTML.toLowerCase();

        var valor = $(".valor", this).val();
        var idMigracion = col1.firstChild.nodeValue;

        aux = valor.replace(" ", ",");

        valor = [aux];

        var url = "./migraciones/index/editar_campo/" + titulo + "/" + valor + "/" + idMigracion;
        window.location.href = url;
        return false;
    });

    function load($idMigracion) {
        document.location = 'migraciones/index/editar_migracion/' + $idMigracion;
    }
    ;
</script>

<link href="{$_layoutParams.root}modules/migraciones/views/index/css/estilosMigracion.css" rel="stylesheet" type="text/css" />
<!-- header -->
<header>
    <h2>Gestión de Migraciones</h2>      
</header>  
<!-- /header -->

<!-- Filtros -->
<div class="filtros2 subfiltros">
    <table>        
        <tr>
            <td>
                <select id="proceso" style="height: 24px;">
                    <option value="">
                        - Proceso -
                    </option>
                    {if isset($procesos) && count($procesos)}
                        {foreach item=datos from=$procesos}                    
                            <option value='{$datos.proceso}'>
                                {$datos.proceso}   
                            </option>                         
                        {/foreach}
                    {/if}
                </select>                 
            </td>
            <td>
                <select id="idPersonal" style="height: 21px;">
                    <option value="">
                        - Tecnico -
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
            <td>
                <select id="idTarea" style="height: 21px;">
                    <option value="">
                        - Tarea -
                    </option>                    
                </select>   
            </td> 
        </tr>
        <tr>
            <td><select id="estado" style="height: 24px;">
                    <option value="">
                        - Estado -
                    </option>                    
                    <option value='PENDIENTE'>
                        Pendiente   
                    </option>
                    <option value='REALIZADA'>
                        Realizada
                    </option>
                    <option value='NO APLICA'>
                        No Aplica
                    </option>
                </select>   
            </td>               
            <td>
                <input type="date" id="fechaInicio" style="height: 16px;"/>
            </td>
            <td>
                <input type="date" id="fechaFin" style="height: 16px;"/>
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
                {if Session::acceso(Session::get('level'))}  
                    <a href="" onclick="mostrar('selectorFichero');
                            return false;" >&nbsp;&nbsp;<img src="{$_layoutParams.root}public/img/nav/agregar.png" title="Agregar"/></a>    
                    {else}                
                    <img src="{$_layoutParams.root}public/img/nav/agregar_noacceso.png" title="No permitido"/>
                {/if}                                                
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Importar
            </td>
        </tr>
        <tr>
            <td >
                <a href="{$_layoutParams.root}migraciones/index/informe_estado"><img src="{$_layoutParams.root}public/img/nav/informe.png" alt="Agregar"/></a>                
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Resumen
            </td>
        </tr>
        <tr>
            <td>
                <img src="{$_layoutParams.root}public/img/nav/impresora.png" title="Imprimir vista"/>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;&nbsp;&nbsp;Imprimir
            </td>
        </tr>
        <tr>
            <td>
                <a href="{$_layoutParams.root}">&nbsp;&nbsp;&nbsp;<img src="{$_layoutParams.root}public/img/nav/atras.png" alt="Agregar"/></a>
            </td>
        </tr>       
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;Volver
            </td>
        </tr>
    </table>                                           
</nav>
<!-- /nav -->  

<!-- Refrescar -->
<div id="refrescar">
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
</div>

<!-- SubirFichero -->
<div id="selectorFichero">
    <form method="post" name="form1" action="{$_layoutParams.root}migraciones/index/cargarExcel" enctype="multipart/form-data" onsubmit="return dameRuta();">        
        Seleccionar fichero: <input type="file" name="fichero" />  
        <br>
        <br>
        <br>
        <br>  
        <input type="hidden" id="excel" name="fichExcel">
        <p style="padding-left: 140px;"><input type="submit" class="button" value="Guardar"/></p>
    </form>      
</div>

<!-- Progreso -->
<div id="progreso">    
    Cargando...
</div>

<!-- imagenMigracion -->
<div id="imagenUpDcha">
    <img src="{$_layoutParams.root}public/img/imgsUp/comunidades.png" alt=""/>
</div>

<script type="text/javascript">
    function load($idMigracion) {
        document.location = 'migraciones/index/editar_migracion/' + $idMigracion;
    }
    ;
</script>
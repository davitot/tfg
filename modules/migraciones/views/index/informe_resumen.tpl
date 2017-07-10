<link href="{$_layoutParams.root}modules/migraciones/views/index/css/estilosMigracion.css" rel="stylesheet" type="text/css" />
<!-- Header {$realizadas|@var_dump} -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-push-3" >
            <div class="page-header">
                <h4>Resumen de Migraciones</h4>
            </div>
        </div>
        <!-- imagenMigracion -->
        <div class="col-md-4 col-md-push-3" style="padding-top: 2px;">
            <img class="logoUp" src="{$_layoutParams.root}public/img/imgsUp/mapas.jpg" title="Migraciones"/>
        </div>
        <!-- imagenMigracion -->
    </div>
</div>
<!-- /Header -->

<!-- Filtros -->
<div class="container">
    <div class="row">
        <div class="col-md-7 text-left filtros2 subfiltros">
            <form action="" class="form-inline">
                <div class="form-group">
                    <label for="comunidad" class="control-label">Comunidad </label>
                    <select id="comunidad"  name="comunidad" class="form-control">
                        <option default>...</option>
                        {foreach item=comunidad from=$comunidades}
                            <option value='{$comunidad.comunidad}'>
                                {$comunidad.comunidad}
                            </option>
                        {/foreach}
                    </select>
                </div>
                <div class="form-group">
                    <label for="provincia" class="control-label">Provincia: </label>
                    <select id="provincia" name="provincia" class="form-control">
                        <option default>...</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sede" class="control-label">Sede: </label>
                    <select id="sede" name="sede" class="form-control">
                        <option default>...</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="button" class="btn" id="limpiarFiltroInforme" style="background: transparent; padding-left:5px;"><i class="fa fa-times-circle"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Filtros -->

<!-- container -->
<div class="container" style="padding-top: 4px;">
    <!-- Refrescar -->
    <div class="row" id="refrescar">
        <div class="row">
            <!-- ListadoMigracion -->
            <div class="col-md-6" id="listadoIndex" style="width: auto;">
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
                    <p><strong>No hay resultados disponibles.&nbsp;&nbsp;&nbsp; <img src="{$_layoutParams.root}/public/img/noResults.png" alt="Editar"/></strong></p>
                        {/if}
            </div>
            <!-- /ListadoMigracion -->
            <!-- Totales -->
            <div class="col-md-2 text-left resumenTotales" >
                {for $i=0 to 2}
                    <table id="tablaTotales">
                        <strong>{$comunidades[$i][0]}</strong>
                        <th>Realizadas</th>
                        <th>Pendientes</th>
                        <th>No Aplica</th>
                        <tr>
                            <!--Parte de realizadas -->
                            {$encontrado=false}
                            {foreach item=realizada from=$realizadas}
                                {if isset($realizada) && ($realizada.comunidad == {$comunidades[$i][0]})}
                                    <td style="text-align: center;">{$realizada.realizadas}</td>
                                    {$encontrado= true}
                                {/if}
                            {/foreach}
                            {if !$encontrado}
                                <td>0</td>
                            {/if}
                            <!--/Parte de realizadas -->
                            <!--Parte de pendientes -->
                            {$encontrado=false}
                            {foreach item=pendiente from=$pendientes}
                                {if isset($pendiente) && ($pendiente.comunidad == {$comunidades[$i][0]})}
                                    <td style="text-align: center;">{$pendiente.pendientes}</td>
                                    {$encontrado= true}
                                {/if}
                            {/foreach}
                            {if !$encontrado}
                                <td>0</td>
                            {/if}
                            <!--/Parte de pendientes -->
                            <!--Parte de noAplica -->
                            {$encontrado=false}
                            {foreach item=noAplic from=$noAplica}
                                {if isset($noAplic) && ($noAplic.comunidad == {$comunidades[$i][0]})}
                                    <td style="text-align: center;">{$noAplic.no_aplica}</td>
                                    {$encontrado= true}
                                {/if}
                            {/foreach}
                            {if !$encontrado}
                                <td>0</td>
                            {/if}
                            <!--/Parte de noAplica -->
                        </tr>
                    </table>
                    <br/>
                {/for}
            </div>
            <div class="col-md-2 text-left resumenTotales" >
                {for $i=3 to 4}
                    <table id="tablaTotales">
                        <strong>{$comunidades[$i][0]}</strong>
                        <th>Realizadas</th>
                        <th>Pendientes</th>
                        <th>No Aplica</th>
                        <tr>
                            <!--Parte de realizadas -->
                            {$encontrado=false}
                            {foreach item=realizada from=$realizadas}
                                {if isset($realizada) && ($realizada.comunidad == {$comunidades[$i][0]})}
                                    <td style="text-align: center;">{$realizada.realizadas}</td>
                                    {$encontrado= true}
                                {/if}
                            {/foreach}
                            {if !$encontrado}
                                <td>0</td>
                            {/if}
                            <!--/Parte de realizadas -->
                            <!--Parte de pendientes -->
                            {$encontrado=false}
                            {foreach item=pendiente from=$pendientes}
                                {if isset($pendiente) && ($pendiente.comunidad == {$comunidades[$i][0]})}
                                    <td style="text-align: center;">{$pendiente.pendientes}</td>
                                    {$encontrado= true}
                                {/if}
                            {/foreach}
                            {if !$encontrado}
                                <td>0</td>
                            {/if}
                            <!--/Parte de pendientes -->
                            <!--Parte de noAplica -->
                            {$encontrado=false}
                            {foreach item=noAplic from=$noAplica}
                                {if isset($noAplic) && ($noAplic.comunidad == {$comunidades[$i][0]})}
                                    <td style="text-align: center;">{$noAplic.no_aplica}</td>
                                    {$encontrado= true}
                                {/if}
                            {/foreach}
                            {if !$encontrado}
                                <td>0</td>
                            {/if}
                            <!--/Parte de noAplica -->
                        </tr>
                    </table>
                    <br/>
                {/for}
            </div>
            <!-- /Totales -->
        </div>
        <!-- ListadoTotales -->

        <!-- Pie de pagina -->
        <div class="row">
            <!-- contador -->
            <div class="col-md-3" style="padding-top:15px;">
                Organos: <span class="badge" style="background:#274891;">{$contador}</span>
            </div>
            <!-- /contador -->

            <!-- Paginacion -->
            <div class="col-md-9 col-md-pull-2">
                {$paginacion|default:""}
            </div>
            <!-- Paginacion -->
        </div>
        <!-- /Pie de pagina -->
    </div>
    <!-- refrescar/row -->
</div>
<!-- /Container -->

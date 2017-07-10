<link href="{$_layoutParams.root}/modules/migraciones/views/index/css/estilosMigracion.css" rel="stylesheet" type="text/css" />

<<!-- Header -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-push-3" >
            <div class="page-header">
                <h4>Migraciones Realizadas por Comunidad</h4>
            </div>
        </div>
        <!-- header -->
        <!-- imagenMigracion -->
        <div class="col-md-4 col-md-push-3" style="padding-top: 2px;">
            <img class="logoUp" src="{$_layoutParams.root}public/img/imgsUp/mapas.jpg" title="Migraciones"/>
        </div>
        <!-- imagenMigracion -->
    </div>
    <!-- /Header -->

    <!-- Filtros -->
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-left filtros2 subfiltros">
                <form action="" class="form-inline">
                    <div class="form-group">
                        <label for="identificador">&nbsp;&nbsp;&nbsp;Comunidad: </label>
                        <select class="form-control" id="cargo">
                            <option>...</option>
                            {if isset($comunidades) && count($comunidades)}
                                {foreach item=comunidad from=$comunidades}
                                    <option value='{$comunidad.comunidad}'>
                                        {$comunidad.comunidad}
                                    </option>
                                {/foreach}
                            {/if}
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn" onclick="paginacion();
                                return false;" style="background: transparent"><i class="fa fa-search-plus"></i></button>
                        <button type="button" class="btn" id="limpiarFiltroInforme" style="background: transparent; padding-left:5px;"><i class="fa fa-times-circle "></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Filtros -->

    <!-- Refrescar -->
    <div class="container" style="padding-top: 7px;">
        <div class="row" id="refrescar">
            <!-- ListadoMigracion -->
            <div class="col-md-2" id="TotalesxComumidad">
                {if isset($resultados) && count($resultados)}
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
                                <table id="tablaListado">
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
                            </table>
                        {/foreach}
                    {/if}
            </div>
        </div>
    </div>
    <!-- Refrescar -->
</div>

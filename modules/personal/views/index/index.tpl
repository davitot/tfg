<link href="./modules/personal/views/index/css/estilosPersonal.css" rel="stylesheet" type="text/css" />

<!-- Header -->
<div class="container">
    <!-- header -->
    <div class="row">
        <div class="col-md-6 col-md-push-3" >
            <div class="page-header">
                <h4>Gestión de Personal</h4>
            </div>
        </div>
        <!-- ImagenPersonal-->
        <div class="col-md-4 col-md-push-3">
            <img class="logoUp" src="{$_layoutParams.root}public/img/imgsUp/personal1.png" title="Personal"/>
        </div>
        <!-- ImagenPersonal-->
    </div>
    <!-- /header -->
</div>
<!-- /Header -->

<!-- Filtros -->
<div class="container">
    <div class="row">
        <div class="col-xs-11 col-xs-push-1 col-md-8 text-left filtros2 subfiltros">
            <form action="" class="form-inline">
                <div class="form-group">
                    <input class="form-control" type="text" id="nombre" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <select class="form-control" id="cargo">
                        <option>
                            -- Cargo --
                        </option>
                        {if isset($cargos) && count($cargos)}
                            {foreach from=$cargos item = per}
                                <option value='{$per.idCargo}'>
                                    {$per.descripcion}
                                </option>
                            {/foreach}
                        {/if}
                    </select>
                </div>
                <div class="form-group">
                  <select class="form-control" id="estado">
                    <option value=''>-- Estado --</option>
                    <option value='activo'>activo</option>
                    <option value='inactivo'>inactivo</option>
                  </select>
                </div>
                <div class="form-group">
                    <input class="form-control" type="date" id="fechaInicio"/>
                    <button type="button" class="btn" onclick="paginacion();
                            return false;" style="background: transparent"><i class="fa fa-search-plus"></i></button>
                    <button type="button" class="btn" id="limpiarFecha" style="background: transparent; padding-left:5px;"><i class="fa fa-times-circle "></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Filtros -->

<!-- Refrescar -->
<div class="container" style="padding-top: 4px;" id="refrescar">
    <!-- listadoPersonal -->
    <div class="row" >
        <div class="col-xs-12 col-md-push-1 col-md-11" id="listadoIndex">
            {if isset($personal) && count($personal)}
                <table id="tablaListado">
                    <tr>
                        <th>Nombre</th>
                        <th>Cargo</th>
                        <th>E-mail</th>
                        <th>Fecha Alta</th>
                        <th>Activo</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                    {foreach item=datos from=$personal}
                        <tr>
                            <td>{$datos.nombre}</td>
                            <td>{$datos.cargo}</td>
                            <td>{$datos.email}</td>
                            <td style="text-align: center;">{$datos.fecha_Incorporacion|date_format:"%d/%m/%Y"}</td>
                            <td style="text-align: center;">
                                {if $datos.activo == 1}
                                    <img src="{$_layoutParams.root}public/img/estados/gestionada.png" title="Usuario activo"/>
                                {else}
                                    <img src="{$_layoutParams.root}public/img/estados/noGestionada.png" title="Usuario inactivo"/>
                                {/if}
                            </td>
                            {if Session::acceso(Session::get('level'))}
                                <td style="width: 0.5%; text-align: center;font-size: 0.9em"><a href="{$_layoutParams.root}personal/index/editar_personal/{$datos.idPersonal}/{$datos.idCargo}"><i class="glyphicon glyphicon-edit"></i></a></td>
                                <td style="width: 0.5%; text-align: center;font-size: 0.9em"><a href="{$_layoutParams.root}personal/index/eliminar_personal/{$datos.idPersonal}/{$datos.idCargo}"><i class="glyphicon glyphicon-trash"></i></a></td>
                                {else}
                                <td style="width: 0.5%; text-align: center;font-size: 0.9em"><i class="glyphicon glyphicon-edit"></i></td>
                                <td style="width: 0.5%; text-align: center;font-size: 0.9em"><i class="glyphicon glyphicon-trash"></i></td>
                            {/if}
                        </tr>
                    {/foreach}
                </table>
            {else}
                <br>
                <br>
                <br>
                <div class="col-md-12 text-center">
                    <strong>No hay Personal asociado al proyecto.</strong>
                    <img src="./public/img/noResults.png" alt="Sin resultados"/>
                </div>
            {/if}
        </div>
    </div>
    <!-- /listadoPersonal -->

    <!-- Pie de pagina -->
    <div class="row" style="padding-top:5px; padding-left: 17px;">
        <!-- contador -->
        <div class="col-xs-4 col-md-3" style="padding-top:15px;">
            Registros: <span class="badge" style="background:#274891;">{$contador}</span>
        </div>
        <!-- /contador -->

        <!-- Paginacion -->
        <div class="col-xs-8 col-xs-pull-2 col-md-9 col-md-pull-2">
            {$paginacion|default:""}
        </div>
        <!-- Paginacion -->
    </div>
    <!-- /Pie de pagina -->
</div>
<!-- /Refrescar -->

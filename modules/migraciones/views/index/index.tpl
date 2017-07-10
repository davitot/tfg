<link href="{$_layoutParams.root}/modules/migraciones/views/index/css/estilosMigracion.css" rel="stylesheet" type="text/css" />

<!-- Header -->
<div class="container">
    <!-- header -->
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-push-3 text-center">
            <div class="page-header">
                <h4>Listado de trabajo</h4>
            </div>
        </div>
        <!-- imagenMigracion -->
        <div class="col-md-4 col-md-push-3" style="padding-top: 2px;">
            <img class="logoUp" src="{$_layoutParams.root}public/img/imgsUp/mapas.jpg" title="Migraciones"/>
        </div>
        <!-- imagenMigracion -->
    </div>
    <!-- /header -->
</div>
<!-- /Header -->

<!-- Filtros -->
<div class="container">
    <div class="row">
        <div class="col-xs-11 col-xs-push-1 col-md-9 text-left filtros2 subfiltros">
            <form action="" class="form-inline">
                <div class="form-group">
                    <label for="nombre">Nombre / Apellidos: </label>
                    <input class="form-control" type="text" id="nombre" placeholder="..." style="width:280px;">
                </div>
                <div class="form-group">
                    <label for="identificador">&nbsp;&nbsp;&nbsp;id Lotus: </label>
                    <input type="text" class="form-control" id="identificador" placeholder="juxxxxxx">
                </div>
                <div class="form-group">
                    <button type="button" class="btn" onclick="paginacion();
                            return false;" style="background: transparent"><i class="fa fa-search-plus"></i></button>
                    <button type="button" class="btn" id="limpiarFecha" style="background: transparent; padding-left:5px;"><i class="fa fa-times-circle "></i></button>
                </div>
                &nbsp;&nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#selectorFichero" id="seleccionFichero"><i class="fa fa-floppy-o"></i> &nbsp;&nbsp;Importar fichero</a>
            </form>
        </div>
    </div>
</div>
<!-- /Filtros -->

<!-- Refrescar -->
<div class="container" style="padding-top: 4px;" id="refrescar">
    <!-- ListadoMigracion -->
    <div class="row">
        <div class="col-xs-12 col-md-push-1 col-md-11" id="listadoIndex">
            {if isset($migraciones) && count($migraciones)}
                <table id="tablaListado">
                    <tr>
                        <th>idLotus</th>
                        <th>Tecnico</th>
                        <th>Nombre</th>
                        <th>Cargo</th>
                        <th>Comunidad</th>
                        <th>Provincia</th>
                        <th>Sede</th>
                        <th>Fecha inicio</th>
                        <th>Fecha Fin</th>
                        <th>Estado Inicial</th>
                        <th>Estado Final</th>
                        <th>Observaciones</th>
                    </tr>
                    {foreach item=datos from=$migraciones}
                        {if Session::acceso(Session::get('level'))}
                            <tr onclick="load({$datos.idMigracion});">
                            {else}
                            <tr>
                            {/if}
                            <td style="cursor: pointer;text-align: center;" id="indice">{$datos.idLotus}</td>
                            <td style="text-align: center;">
                                {if $datos.idTecnico>0}
                                    <i class="glyphicon glyphicon-user" title="{$datos.tecnico}"></i>
                                {else}
                                    <i class="glyphicon glyphicon-question-sign" title="Sin asignar"></i>
                                {/if}
                            </td>
                            <td>{$datos.apellidos}, {$datos.nombre}</td>
                            <td>{$datos.cargo}</td>
                            <td>{$datos.comunidad}</td>
                            <td>{$datos.provincia}</td>
                            <td>{$datos.desc_sede}</td>
                            <td style="text-align: center;">{$datos.fecha_Inicio|date_format:"%d/%m/%Y"}</td>
                            <td style="text-align: center;">{$datos.fecha_Fin|date_format:"%d/%m/%Y"}</td>
                            <td>{$datos.estado_inicial}</td>
                            <td>{$datos.estado_final}</td>
                            <td>{$datos.observaciones}</td>
                        </tr>
                    {/foreach}
                </table>
            {else}
                <br>
                <br>
                <br>
                <div class="col-md-12 text-center">
                    <strong>No hay Migraciones cargadas.</strong>
                    <img src="./public/img/noResults.png" alt="Sin resultados"/>
                </div>
            {/if}
        </div>
    </div>
    <!-- /ListadoMigracion -->

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

<!-- Emergente Selector Fichero -->
<div id="selector">
    <div class="panel-body">
        <!-- Modal que oscurece la pantalla-->
        <div class="modal fade" id="selectorFichero" tabindex="-1" role="dialog" aria-labelledby="selectorFichero" aria-hidden="true">
            <!--Ventana que muestra el contenido -->
            <div class="modal-dialog">
                <!-- Contenido de la ventana -->
                <div class="modal-content" style="width: 420px; height: 270px; text-align: center;">
                    <!-- Titulo de la ventana -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="selectorFichero">Carga de datos desde plantilla</h4>
                    </div>
                    <!-- /Titulo de la ventana -->
                    <!-- Cuerpo de la ventana -->
                    <div class="modal-body" align="center">
                        <form method="post" name="form1" action="{$_layoutParams.root}migraciones/index/cargarExcel" enctype="multipart/form-data" onsubmit="return dameRuta();">
                            <div class="container">
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-4 text-center">
                                        <i class="fa fa-file-excel-o fa-2x" style="vertical-align: middle;"></i>
                                        <input type="file" name="fichero" data-filename-placement="inside">
                                        <small class="help-block" style="text-align: center;">Pulsar para seleccionar</small>
                                        </input>
                                        <input type="hidden" id="excel" name="fichExcel">
                                    </div>
                                </div>
                                <div class="row">
                                    <br>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <button class="btn btn-primary" type="submit">Cargar</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <!-- /Cuerpo de la ventana -->
                </div>
                <!-- /Contenido de la ventana -->
            </div>
            <!-- /Ventana que muestra el contenido -->
        </div>
        <!-- /.modal -->
    </div>
    <!-- .panel-body -->
</div>
<!-- /Emergente Selector Ficheros -->

<!-- Progreso -->
<div id="progreso">
    Cargando...
</div>
<!-- /Progreso -->
<script type="text/javascript">
    function load($idMigracion) {
        document.location = 'migraciones/index/editar_migracion/' + $idMigracion;
    }
    ;
</script>

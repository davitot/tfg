<link href="{$_layoutParams.root}modules/recursos/views/index/css/estilosRecursos.css" rel="stylesheet" type="text/css" />
<!-- Header -->
<div class="container">
    <!-- header -->
    <div class="col-md-6 col-md-push-3" >
        <div class="page-header">
            <h4>Editar Recurso</h4>
        </div>
    </div>
    <!-- /header -->
    <!-- ImagenRecursos-->
    <div class="col-md-4 col-md-push-3" style="padding-top: 5px; color: #243D59;">
          <i class="fa fa-gears fa-3x"></i>
    </div>
    <!-- /ImagenRecursos-->
</div>
<!-- /Header -->

<div class="container">
    <div class="row" style="padding-left:100px;">
        <div class="col-md-12 col-md-push-3 text-left" id="formularioRecursos" style="background: ghostwhite;">
            <div class="container">
                <div class="row">
                    <form id="form1" role="form" class="form-horizontal" method="post" style="width: 300px;text-align:left;" enctype="multipart/form-data">
                        <input type="hidden" name="guardar" value="1" />
                        <input type="hidden" name="idRecurso" value="{$datos.idTarea}" />
                        <div class="col-md-6 col-md-push-1" style="text-align: left;">
                            <div class="form-group" style="padding-top: 5px;">
                                <label for="tipo" class="control-label">Tipo: </label>
                                <input type="text" class="form-control" name="tipo" value="{if isset($datos.tipo)}{$datos.tipo}{/if}"/>
                            </div>
                            <div class="form-group" style="padding-top: 5px;">
                                <label for="marca" class="control-label">Marca:</label>
                                <input type="text" class="form-control" name="marca" value="{if isset($datos.marca)}{$datos.marca}{/if}" />
                            </div>
                            <div class="form-group" style="padding-top: 5px;">
                                <label for="modelo" class="control-label">Modelo: </label>
                                <input type="text" class="form-control" name="modelo" value="{if isset($datos.modelo)}{$datos.modelo}{/if}" />
                            </div>
                        </div>
                        <div class="col-md-6 col-md-push-3" style="text-align: left;">
                            <div class="form-group" style="padding-top: 5px; width: 170px;">
                                <label for="num_serie" class="control-label">Num. serie:</label>
                                <input type="text" class="form-control" name="num_serie" value="{if isset($datos.num_serie)}{$datos.num_serie}{/if}"  />
                            </div>
                            <div class="form-group" style="padding-top: 5px; width: 170px;">
                                <label for="fecha_alta" class="control-label">fecha de alta:</label>
                                <input type="date" class="form-control" name="fecha_alta" value="{if isset($datos.fecha_alta)}{$datos.fecha_alta}{/if}" />
                                <small class="help-block">* El nuevo recurso quedara libre para ser asignado *</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-xs-push-6">
                                <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;Guardar</button>
                            </div>
                        </div>
                    </form>
                    <br>
                </div>
                <!-- col-md-9 -->
            </div>
            <!-- /formulario -->
        </div>
        <!-- /row -->
    </div>
    <br><br>
</div>

<link href="{$_layoutParams.root}/modules/migraciones/views/index/css/estilosMigraciones.css" rel="stylesheet" type="text/css" />

<!-- Header -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-push-3" >
            <div class="page-header">
                <h4>Gestión de Migraciones</h4>
            </div>
        </div>
        <!-- header -->
        <!-- imagenMigracion -->
        <div class="col-md-4 col-md-push-3" style="padding-top: 2px;">
            <img class="logoUp" src="{$_layoutParams.root}public/img/imgsUp/mapas.jpg" title="Migraciones"/>
        </div>
        <!-- imagenMigracion -->
    </div>
</div>
<!-- /Header -->

<div class="container">
    <div class="row">
        <br/>
        <div class="col-md-10 col-md-push-1" id="formulario" style="background: ghostwhite;">
            <div class="container">
                <div class="row">
                    <!-- <div id="" style="width:713px; left: 26%; top: 5%; background: ghostwhite;"> -->
                    <form name="feditarTarea" method="post" action="">
                        <input type="hidden" name="guardar" value="1" />
                        <input type="hidden" name="idMigracion" value="{$datos.idMigracion}" />
                        <!-- Columna izquierda -->
                        <div class="col-md-3 text-left">
                            <div class="form-group">
                                <i class="glyphicon glyphicon-user"></i><label for="nombre" class="control-label">&nbsp;Nombre: </label>
                                <input type="text" class="form-control" name="nombre" value="{$datos.nombre|default:""}"></input>
                            </div>
                            <div class="form-group">
                                <i class="glyphicon glyphicon-globe"></i>
                                <label for="comunidad" class="control-label">Comunidad: </label>
                                <select id="comunidad" name="comunidad" class="form-control">
                                    <option value="{$datos.comunidad|default:""}">{$datos.comunidad|default:""}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <i class="glyphicon glyphicon-blackboard"></i>
                                <label for="sede" class="control-label">Sede: </label>
                                <select id="sede" name="sede" class="form-control">
                                    <option value="{$datos.desc_sede|default:""}">{$datos.desc_sede|default:""}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <i class="glyphicon glyphicon-calendar"></i><label for="fechaInicio" class="control-label">&nbsp;Fecha inicio: </label>
                                <input type="date" class="form-control" name="fechaInicio" value="{$datos.fecha_Inicio|default:""}"></input>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-xs-push-12">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </div>
                        <!-- /Columna izquierda -->

                        <!-- Columna central -->
                        <div class="col-md-3 text-left">
                            <div class="form-group">
                                <i class="glyphicon glyphicon-user"></i><label for="apellidos" class="control-label">&nbsp;Apellidos: </label>
                                <input type="text" class="form-control" name="apellidos" value="{$datos.apellidos|default:""}"></input>
                            </div>
                            <div class="form-group">
                                <i class="glyphicon glyphicon-tower"></i>
                                <label for="provincia" class="control-label">Provincia: </label>
                                <select id="provincia" name="provincia" class="form-control">
                                    <option value="{$datos.provincia|default:""}">{$datos.provincia|default:""}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <i class="glyphicon glyphicon-briefcase"></i>
                                <label for="organo" class="control-label">Organo: </label>
                                <select id="organo" name="organo" class="form-control">
                                    <option value="{$datos.organo|default:""}">{$datos.organo|default:""}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <i class="glyphicon glyphicon-calendar"></i><label for="fechaFin" class="control-label">&nbsp;Fecha fin: </label>
                                <input type="date" class="form-control" name="fechaFin" value="{$datos.fecha_Fin|default:""}"></input>
                            </div>
                        </div>
                        <!-- /Columna central -->
                        <!-- Columna derecha -->
                        <div class="col-md-3 text-left" id="dcha">
                            <div class="form-group">
                                <i class="glyphicon glyphicon-open-file"></i><label for="estadoInicial" class="control-label">&nbsp;Estado inicial: </label>
                                <input type="text" class="form-control" name="estadoInicial" value="{$datos.estado_inicial|default:""}"></input>
                            </div>
                            <div class="form-group">
                                <i class="glyphicon glyphicon-save-file"></i><label for="estadoFinal" class="control-label">&nbsp;Estado final: </label>
                                <input type="text" class="form-control" name="estadoFinal" value="{$datos.estado_final|default:""}"></input>
                            </div>
                            <div class="form-group">
                                <i class="glyphicon glyphicon-eye-open"></i><label for="observaciones" class="control-label">&nbsp;Observaciones: </label>
                                <textArea name="observaciones" class="form-control">{$datos.observaciones|default:""}</textArea>
                </div>
            </div>
            <!-- /Columna derecha -->
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<br><br>

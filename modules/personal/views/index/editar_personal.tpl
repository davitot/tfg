<link href="{$_layoutParams.root}modules/personal/views/index/css/estilosPersonal.css" rel="stylesheet" type="text/css" />

<!-- Funciones JS -->
<script type="text/javascript">
    function mostrar(id) {
        obj1 = document.getElementById(id);
        id1 = obj1.getAttribute("id");
        switch (id1) {
            case "listadoRecursos":
                verRecursos(obj1);
                break;
            default:
                break;
        }
    }
    ;
    function verRecursos(objeto) {
        objeto.style.display = (objeto.style.display === 'none') ? 'block' : 'none';

        if ((document.mostrarRecursos.src).indexOf('contraer') !== -1) {
            document.mostrarRecursos.src = '{$_layoutParams.ruta_img}agregar.png';
        } else {
            document.mostrarRecursos.src = '{$_layoutParams.ruta_img}contraer.png';
        }
    }
    ;
</script>
<!-- /Funciones JS -->

<!-- header -->
<div class="container">
    <div class="col-md-6 col-md-push-3" >
        <div class="page-header">
            <h4>Editar Personal </h4>
        </div>
    </div>
    <!-- header -->
    <div class="col-md-4 col-md-push-3">
        <!-- ImagenPersonal-->
        <img class="logoUp" src="{$_layoutParams.root}public/img/imgsUp/personal1.png" title="Personal"/>
        <!-- ImagenPersonal-->
    </div>
</div>
<!-- /Header -->

<!-- Formulario Edicion Personal-->
<div class="container">
    <!-- Fila Principal -->
    <div class="row">
        <!-- Contenedor Principal -->
        <div class="col-md-9 col-md-push-1" id="formulario">
            <!-- Campos Personal -->
            <div class="col-md-7 col-md-push-0">
                <form class="form-horizontal" id="formPersonal" method="post" action="" enctype="multipart/form-data">
                    <input type="hidden" name="guardar" value="1" />
                    <div class="form-group">
                        <label class="control-label col-xs-3">Nombre:</label>
                        <div class="col-xs-9">
                            <input type="text" name="nombre" class="form-control" value="{$datos.nombre|default:""}" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Cargo:</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="cargo">
                              <!--<option value="{$cargo.idCargo|default:""}">{$datos.cargo|default:""}</option>-->
                                {if isset($cargos)}
                                    {foreach from=$cargos item=cargo}
                                        {if $datos.cargo eq $cargo.descripcion}
                                            <option value="{$cargo.idCargo}" selected="selected">{$cargo.descripcion}</option>
                                        {else}
                                            <option value="{$cargo.idCargo}">{$cargo.descripcion}</option>
                                        {/if}
                                    {/foreach}
                                {/if}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Email:</label>
                        <div class="col-xs-9">
                            <input type="email" class="form-control" name="email" value="{$datos.email|default:""}" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">F. Alta:</label>
                        <div class="col-xs-9">
                            <input type="date" name="fechaIn" class="form-control" value="{$datos.fecha_Incorporacion|default:''}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Usuario:</label>
                        <div class="col-xs-9">
                            <input type="text" name="usuario" class="form-control" value="{$datos.usuario|default:""}" placeholder="Usuario"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Password:</label>
                        <div class="col-xs-9">
                            <input type="password" class="form-control" name="pass" value="{$datos.pass|default:""}" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group text-left">
                      <label class="control-label col-xs-3">Activo: </label>
                      <div class="col-xs-9">
                                <input type="checkbox" style="margin: 10px 0 0 0;" class="control-label" name="activo" value="1" {if ($datos.activo == 1)}checked="checked"{/if}/>
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-11 col-xs-push-1">
                            <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;Guardar</button>
                        </div>
                    </div>

                </form>
            </div>
            <!-- /Campos Personal -->

            <!-- Campos Recursos -->
            <div class="col-md-5 col-md-push-0">
                <!-- Contador Recursos Asignados -->
                <a href="" onclick="mostrar('listadoRecursos');
                        return false;" ><img id="mostrarRecursos" name="mostrarRecursos" src="{$_layoutParams.ruta_img}agregar.png" alt="" /><span>Recursos:</a>
                <span class="badge">{count($recursosPersonal)}</span>
                <!-- /Contador Recursos Asignados -->

                <!-- /Container Tablas Recursos -->
                <div class="container">
                    <!-- Tablas Recursos -->
                    <div id="listadoRecursos" style="display:none;">
                        <div class="row">
                            <div class="col-md-12 text-center" style="max-height: 155px; overflow-y: auto;">
                                {if isset($recursosPersonal) && count($recursosPersonal)}
                                    <br>
                                    <table id="tablaRecursos">
                                        <tr>
                                            <th>Tipo</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Asignado</th>
                                                {if Session::acceso(Session::get('level'))}
                                                <th colspan="1">Liberar</th>
                                                {/if}
                                        </tr>
                                        {foreach item=dato from=$recursosPersonal}
                                            <tr style='vertical-align: middle;'>
                                                <td>{$dato.tipo}</td>
                                                <td>{$dato.marca}</td>
                                                <td>{$dato.modelo}</td>
                                                <td style="text-align: center;">{$dato.fecha_asignacion|date_format:"%d/%m/%Y"}</td>
                                                {if Session::acceso(Session::get('level'))}
                                                    <td style="width: 0.4%; text-align: center;font-size:0.85em;"><a href="{$_layoutParams.root}personal/index/eliminar_recurso/{$datos.idPersonal}/{$dato.idRecurso}"><i class="glyphicon glyphicon-trash"></i></a></td>
                                                {/if}
                                            </tr>
                                        {/foreach}
                                    </table>
                                {else}
                                    <br/>
                                    <p style="font-size: 11.5px;">
                                        Sin recursos asignados.
                                    </p>
                                    <br/>
                                    <p>
                                        <img src="{$_layoutParams.root}public/img/recursos/portatil.png" title="portatil"/>&nbsp;
                                        <img src="{$_layoutParams.root}public/img/recursos/teclado.png" title="Teclado"/>&nbsp;
                                        <img src="{$_layoutParams.root}public/img/recursos/raton.png" title="Raton"/>&nbsp;
                                        <img src="{$_layoutParams.root}public/img/recursos/movil.png" title="Movil"/>&nbsp;
                                        <img src="{$_layoutParams.root}public/img/recursos/monitor.png" title="Monitor"/>
                                    </p>
                                {/if}
                            </div>
                            <!-- /Tabla Recursos Asignados -->
                        </div>
                        <!-- Tabla Recursos Libres -->
                        <div class="row">
                            {if isset($recursosLibres) && count($recursosLibres)}
                                <br>
                                <div class="col-md-12 col-md-push-1 text-center" style="max-height: 155px; overflow-y: auto;">
                                    <form id="form1" method="post" action="{$_layoutParams.root}personal/index/agregar_recurso" enctype="multipart/form-data">
                                        <input type="hidden" name="idPersonal" value="{$datos.idPersonal}" />
                                        <table id="tablaRecursos">
                                            <br>
                                            <th colspan='5'>Recursos Libres</th>
                                                {foreach item=dato from=$recursosLibres}
                                                <tr>
                                                    <td style='text-align:center;'>
                                                        <img src="{$_layoutParams.root}/public/img/recursos/{$dato.tipo}.png" title="Recurso"/>
                                                    </td>
                                                    <td>
                                                        {$dato.tipo}
                                                    </td>
                                                    <td>
                                                        {$dato.marca}
                                                    </td>
                                                    <td>
                                                        {$dato.modelo}
                                                    </td>
                                                    <td>
                                                        <input name="recLibres[]" type="checkbox" value="{$dato.idRecurso}">
                                                    </td>
                                                </tr>
                                            {/foreach}
                                        </table>
                                        <div class="row" style="padding-top:5px;">
                                            <div class="col-md-10 text-center">
                                                <button class="btn btn-primary btn-xs" type="submit">Asignar</button>
                                            </div>
                                        </div>
                                    </form>
                                {else}
                                    <br/>
                                    <p style="font-size: 11.5px; padding-left: 60px;">
                                        No hay recursos disponibles.
                                    </p>
                                    <br/>
                                    <p style="padding-left: 25px;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="{$_layoutParams.root}public/img/recursos/portatil.png" title="portatil"/>&nbsp;
                                        <img src="{$_layoutParams.root}public/img/recursos/teclado.png" title="Teclado"/>&nbsp;
                                        <img src="{$_layoutParams.root}public/img/recursos/raton.png" title="Raton"/>&nbsp;
                                        <img src="{$_layoutParams.root}public/img/recursos/movil.png" title="Movil"/>&nbsp;
                                        <img src="{$_layoutParams.root}public/img/recursos/monitor.png" title="Monitor"/>
                                    </p>
                                {/if}
                            </div>
                        </div>
                        <!-- /Tabla Recursos Libres -->
                    </div>
                    <!-- /Tablas Recursos -->
                </div>
            </div>
            <!-- /Container Tablas Recursos -->
        </div>
        <!-- /Campos Recursos -->
    </div>
    <!-- Fila Principal -->
    <br>
</div>
<!-- /Contenedor Principal -->
</div>
<!-- /Formulario Edicion Personal-->

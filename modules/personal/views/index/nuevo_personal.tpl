<!-- header -->
<div class="container">
    <div class="col-md-6 col-md-push-3" >
        <div class="page-header">
            <h4>Nuevo Personal </h4>
        </div>
    </div>
    <!-- header -->
    <div class="visible-md visible-lg col-md-4 col-md-push-3">
        <!-- ImagenPersonal-->
        <img class="logoUp" src="{$_layoutParams.root}public/img/imgsUp/personal1.png" title="Personal"/>
        <!-- ImagenPersonal-->
    </div>
</div>
<!-- /Header -->

<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-push-1" id="formulario" style="background: ghostwhite;">
            <br>
            <form class="form-horizontal" id="formPersonal" method="post" action="{$_layoutParams.root}personal/index/nuevo_personal" enctype="multipart/form-data">
                <input type="hidden" name="guardar" value="1" />
                <!-- Columna inquierda -->
                <div class="col-md-4 col-md-push-1 text-left">
                    <div class="form-group">
                        <i class="glyphicon glyphicon-user"></i>
                        <label class="control-label">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" value="{$datos.nombre|default:""}" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <i class="glyphicon glyphicon-briefcase"></i>
                        <label class="control-label">Cargo:</label>
                        <select name="cargo" class="form-control" name="cargo">
                            <option value=""> - seleccione - </option>
                            {foreach from=$comboItems item=cargo}
                                <option value="{$cargo.idCargo}">{$cargo.descripcion}</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="form-group">
                        <i class="glyphicon glyphicon-envelope"></i>
                        <label class="control-label">Email:</label>
                        <input type="email" class="form-control" name="email" value="{$datos.email|default:""}" placeholder="Email">
                    </div>
                </div>
                <!-- /Columna inquierda -->
                <!-- Columna derecha -->
                <div class="col-md-4 col-md-push-2 text-left">
                    <div class="form-group">
                        <i class="glyphicon glyphicon-edit"></i>
                        <label class="control-label">Usuario:</label>
                        <input type="text" name="usuario" class="form-control" value="{$datos.usuario|default:""}" placeholder="Usuario"/>
                    </div>
                    <div class="form-group">
                        <i class="glyphicon glyphicon-credit-card"></i>
                        <label class="control-label">Password:</label>
                        <input type="password" class="form-control" name="pass" value="{$datos.pass|default:""}" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <i class="glyphicon glyphicon-calendar"></i>
                        <label class="control-label">F. Alta:</label>
                        <input type="date" name="fechaAlta" class="form-control" value="{$datos.fechaAlta|default:''}" />
                    </div>
                    <br>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-xs-11 col-xs-push-0">
                            <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;Guardar</button>
                            <input type="reset" class="btn btn-info btn-sm" value="Limpiar">
                        </div>
                    </div>
                </div>
        </div>
        <!-- /Columna derecha -->
        </form>
    </div>
</div>
<br><br>

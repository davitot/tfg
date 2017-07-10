<link href="{$_layoutParams.root}/modules/informes/views/index/css/estilosInformes.css" rel="stylesheet" type="text/css" />

<!-- Header -->
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-push-3" >
      <div class="page-header">
        <!-- filtro -->
        <div class="container">
          <div class="col-md-8 text-left">
            <form action="" class="form-inline">
              <div class="form-group">
                <label class="control-label" for="year" style="padding-left:10px;"><h4 style="padding-left: 15px;">Incidencias de
                  <div class="form-group">
                      <select class="form-control" id="tipo">
                          <option value='' selected="selected">-- Todas --</option>
                          <option value='Administracion'>Administracion</option>
                          <option value='Gestion'>Gestion</option>
                          <option value='Soporte'>Soporte</option>
                      </select>
                  </div>
                  <select name="estado" class="form-control" id="estado">
                    <option value="abiertas" selected="selected">abiertas</option>
                    <option value="cerradas">cerradas</option>
                  </select>
                  en:</h4></label>
                  <strong style="padding-left: 5px;"><input type="text" class="form-control" id="year" name="year" value="2016" style="width: 100px;text-align: center;"/></strong>
                </div>
                <div class="form-group">
                  <button type="button" class="btn" id="limpiarYear" style="background: transparent; padding-left:5px;"><i class="fa fa-times-circle "></i></button>
                </div>
              </form>
            </div>
          </div>
          <!-- filtro -->
        </div>
        <!-- header -->
      </div>
    </div>
  </div>
  <!-- /Header -->

  <div class="container">
    <div class="row" id="refrescar">
      <div class="col-md-12" style="max-height:425px; overflow-y :auto;">
        <!-- Panel  -->
        {if isset($inciAbiertas) && count($inciAbiertas)}
        {foreach item=mes from=$meses}
        {$total=0}
        <div class="col-md-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
              {$mes}
            </div>
            <div class="panel-body" style="background-color: #e6e7f6; text-transform:capitalize; height: 120px;overflow-y: auto;">
              <table class="tables scroll" id="tablaListado" role="table">
                {foreach item=datos from=$inciAbiertas}
                {if $datos.mes eq $mes}
                <tr>
                  <td style="width:290px;">{$datos.tecnico}</td>
                  <td style="text-align: center;">{$datos.total}</td>
                </tr>
                {$total=$total+$datos.total}
                {/if}
                {/foreach}
                {if $total==0}
                <div class="alert alert-danger alert-dismissible" role="alert">
                  Sin incidencias registradas.
                </div>

                {/if}
              </table>
            </div>
            <div class="panel-footer">
              {if $total>0}
              Total: {$total}
              {else}
              &nbsp;
              {/if}
            </div>
          </div>
        </div>
        {/foreach}
        {/if}
      </div>
      <!-- /Panel  -->
    </div>
  </div>

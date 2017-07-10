<link href="{$_layoutParams.root}/modules/informes/views/index/css/estilosInformes.css" rel="stylesheet" type="text/css" />

<!-- Header -->
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-push-3" >
      <div class="page-header">
        <h4>Listado de trabajo</h4>
      </div>
    </div>
    <!-- header -->
    <!-- imagenMigracion -->
    <div class="col-md-4 col-md-push-3" style="padding-top: 2px;">
      <img src="{$_layoutParams.root}public/img/imgsUp/comunidades.png" alt=""/>
    </div>
    <!-- imagenMigracion -->
  </div>
</div>
<!-- /Header -->

<!-- Filtros -->
<div class="container">
  <div class="row">
    <div class="col-md-6 text-left filtros2 subfiltros">
      <form action="" class="form-inline">
        <div class="form-group">
          <label class="control-label" for="year">Mes:</label>
          <input type="text" class="form-control" id="mes" name="mes" />
        </div>
        <div class="form-group">
          <label class="control-label" for="year" style="padding-left:10px;">Año:</label>
          <input type="text" class="form-control" id="year" name="year" />
        </div>
        <div class="form-group">
          <button type="button" class="btn" onclick="paginacion();
          return false;" style="background: transparent;  padding-left:10px;"><i class="fa fa-search-plus"></i></button>
          <button type="button" class="btn" id="limpiarFecha" style="background: transparent; padding-left:5px;"><i class="fa fa-times-circle "></i></button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /Filtros -->
<br/>

<!-- Refrescar -->
<div class="container" style="padding-top: 4px;">
  <div class="row" id="refrescar">
    <!-- ListadoMigracion -->
    <div class="col-md-4 col-sm-push-1" id="listadoIndex" style="width: auto;">
      {if isset($inciAbiertas) && count($inciAbiertas)}
      {if $mes!=''}
      <h4>{$mes}</h4>
      {else}
      <h4>Totales</h4>
      {/if}
      <table class="tables scroll" id="tablaListado" role="table">
        <tr>
          <th>Tecnico</th>
          <th>Total</th>
        </tr>
        {foreach item=datos from=$inciAbiertas}
        <tr>
          <td>{$datos.tecnico}</td>
          <td style="text-align: center;">{$datos.total}</td>
        </tr>
        {/foreach}
      </table>
      {/if}
    </div>
  </div>
</div>
<!-- refrescar/row -->

<div class="col-md-12" style="max-height:460px; overflow-y :auto;">
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
            <td style="width: 290px;">{$datos.tecnico}</td>
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
  {else}
  <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    No se han registrado incidencias, seleccione otro criterio de busqueda
  </div>

  {/if}

</div>

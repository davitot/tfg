<div class="col-md-12" style="max-height:425px; overflow-y :auto;">
  <!-- Panel  -->
  {if isset($migraciones) && count($migraciones)}
  {foreach item=provincia from=$provincias}
  {$total=0}
  <div class="col-md-4">
    <div class="panel panel-primary">
      <div class="panel-heading">
        {$provincia.provincia}
      </div>
      <div class="panel-body" style="background-color: #e6e7f6; text-transform:capitalize; height: 120px;overflow-y: auto;">
        <table class="tables scroll" id="tablaListado" role="table">
          {foreach item=datos from=$migraciones}
          {if $datos.provincia eq $provincia.provincia}
          <tr>
            <td style="width:290px;">{$datos.tecnico}</td>
            <td style="text-align: center;">{$datos.total}</td>
          </tr>
          {$total=$total+$datos.total}
          {/if}
          {/foreach}
          {if $total==0}
          <div class="alert alert-danger alert-dismissible" role="alert">
            Sin Migraciones registradas.
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
    No se han registrado migraciones, seleccione otro criterio de busqueda.
  </div>
  {/if}
</div>
<!-- /Panel  -->

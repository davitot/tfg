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

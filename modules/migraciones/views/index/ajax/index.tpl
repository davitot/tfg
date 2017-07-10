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
        <td>{$datos.fecha_Inicio}</td>
        <td>{$datos.fecha_Fin}</td>
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

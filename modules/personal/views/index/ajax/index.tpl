<!-- listadoPersonal -->
<div class="row" >
  <div class="col-xs-12 col-md-push-1 col-md-11" id="listadoIndex">
    {if isset($personal) && count($personal)}
    <table id="tablaListado">
      <tr>
        <th>Nombre</th>
        <th>Cargo</th>
        <th>E-mail</th>
        <th>Fecha Alta</th>
        <th>Activo</th>
        <th colspan="2">Acciones</th>
      </tr>
      {foreach item=datos from=$personal}
      <tr>
        <td>{$datos.nombre}</td>
        <td>{$datos.cargo}</td>
        <td>{$datos.email}</td>
        <td style="text-align: center;">{$datos.fecha_Incorporacion|date_format:"%d/%m/%Y"}</td>
        <td style="text-align: center;">
          {if $datos.activo == 1}
          <img src="./public/img/estados/gestionada.png" title="Usuario activo"/>
          {else}
          <img src="./public/img/estados/noGestionada.png" title="Usuario inactivo"/>
          {/if}
        </td>
        {if Session::acceso(Session::get('level'))}
        <td style="width: 0.5%; text-align: center;font-size: 0.9em"><a href="./personal/index/editar_personal/{$datos.idPersonal}/{$datos.idCargo}"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td style="width: 0.5%; text-align: center;font-size: 0.9em"><a href="./personal/index/eliminar_personal/{$datos.idPersonal}/{$datos.idCargo}"><i class="glyphicon glyphicon-trash"></i></a></td>
        {else}
        <td style="width: 0.5%; text-align: center;font-size: 0.9em"><i class="glyphicon glyphicon-edit"></i></td>
        <td style="width: 0.5%; text-align: center;font-size: 0.9em"><i class="glyphicon glyphicon-trash"></i></td>
        {/if}
      </tr>
      {/foreach}
    </table>
      {else}
      <br>
      <br>
      <br>
      <div class="col-md-12 text-center">
        <strong>No hay Personal asociado al proyecto.</strong>
        <img src="./public/img/noResults.png" alt="Sin resultados"/>
      </div>
      {/if}
    </div>
</div>
<!-- /listadoPersonal -->

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

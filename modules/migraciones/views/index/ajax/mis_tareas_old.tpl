<!-- ListadoMisTareas -->
<div class="row" style='height:329px;'>
  <!-- Columna migraciones -->
  <div class="col-xs-12 col-md-7 col-md-push-0">
    <h4>Tareas de Migracion</h4>
    {if (Session::get('level')<=2 || Session::get('level')==5)}
    <!-- columna migraciones -->
    {if isset($migraciones) && count($migraciones)}
    <div style="height:220px; overflow-y: auto;">
    <table id="tablaListado">
      <tr>
        <th>Comunidad</th>
        <th>Provincia</th>
        <th>Sede</th>
        <th>Titulo</th>
        <th style="width: 30px; ">Inicio</th>
        <th style="width: 30px; ">Fin</th>
      </tr>
      {$comunidad=''}
      {$provincia=''}
      {$antComunidad=''}
      {$antProvincia=''}
      {foreach item=migra from=$migraciones}
        {$antComunidad=$comunidad}
        {$comunidad={$migra.comunidad}}
        {$antProvincia=$provincia}
        {$provincia={$migra.provincia}}
      <tr>
        {if $comunidad != $antComunidad}
        <td>{$migra.comunidad}</td>
        {$comunidad=$migra.comunidad}
        {else}
        <td>&nbsp;</td>
        {/if}
        {if $provincia != $antProvincia}
        <td>{$migra.provincia}</td>
        {$provincia=$migra.provincia}
        {else}
        <td>&nbsp;</td>
        {/if}
        <td>{$migra.sede}</td>
        <td>
          <a href="../../pdf/generar_InformeTarea/{$ta.idPersonal}/{$ta.idTarea}">{$migra.titulo}</a>
        </td>
        <td>{$migra.fecha_inicio|date_format:"%d/%m/%Y"}</td>
        {if $migra.fecha_fin == '' OR $migra.fecha_fin=='0000-00-00'}
        <td style="text-align: center;"> <img src="../../public/img/estados/noGestionada.png" title="Iniciada: {$ta.fecha_inicio|date_format:"%d/%m/%Y"}"/> </td>
        {else}
        {$title="Iniciada:     {$migra.fecha_inicio|date_format:"%d/%m/%Y"} \nFinalizada: {$migra.fecha_fin|date_format:"%d/%m/%Y"}"}
        {$title= htmlentities($title)}
        <td style="text-align: center;"> <img src="../../public/img/estados/gestionada.png" title="{$title}"/> </td>
        {/if}
      </tr>
      {/foreach}
    </table>
  </div>
    {else}
    <div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <i class="glyphicon glyphicon-warning-sign fa-2x"></i>
      &nbsp;&nbsp;Sin Migraciones asignadas.&nbsp;&nbsp;
      <i class="glyphicon glyphicon-warning-sign fa-2x"></i>
    </div>
    {/if}
    {else}
    <div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <i class="glyphicon glyphicon-warning-sign fa-2x"></i>
      &nbsp;&nbsp;Este perfil no da soporte a Migracion.&nbsp;&nbsp;
      <i class="glyphicon glyphicon-warning-sign fa-2x"></i>
    </div>
    {/if}
  </div>
  <!-- /Columna migraciones -->

  <!-- Columna tareas -->
  <div class="col-xs-12 col-md-4">
    <h4>Tareas de Gestion, Administracion y Soporte</h4>
    {if (Session::get('level')<=4)}
    <!-- columna migraciones -->
    {if isset($tareas) && count($tareas)}
    <div style="height:220px; overflow-y: auto;">
    <table id="tablaListado">
      <tr>
        <th>Titulo</th>
        <th>Inicio</th>
        <th>Fin</th>
      </tr>
      {foreach item=ta from=$tareas}
      <tr>
        <td>
          <a href="../../tareas/index/editar_tarea/{$ta.idTarea}/{$ta.tipo}">{$ta.titulo}</a>
        </td>
        <td>{$ta.fecha_inicio|date_format:"%d/%m/%Y"}</td>
        {if $ta.fecha_fin == '' OR $ta.fecha_fin=='0000-00-00'}
        <td style="text-align: center;"> <img src="../../public/img/estados/noGestionada.png" title="Iniciada: {$ta.fecha_inicio|date_format:"%d/%m/%Y"}"/> </td>
        {else}
        {$title="Iniciada:     {$ta.fecha_inicio|date_format:"%d/%m/%Y"} \nFinalizada: {$ta.fecha_fin|date_format:"%d/%m/%Y"}"}
        {$title= htmlentities($title)}
        <td style="text-align: center;"> <img src="../../public/img/estados/gestionada.png" title="{$title}"/> </td>
        {/if}
      </tr>
      {/foreach}
    </table>
  </div>
    {else}
    <div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <i class="glyphicon glyphicon-warning-sign fa-2x"></i>
      &nbsp;&nbsp;No dispone de tareas asignadas.&nbsp;&nbsp;
      <i class="glyphicon glyphicon-warning-sign fa-2x"></i>
    </div>
    {/if}
    {else}
    <div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <i class="glyphicon glyphicon-warning-sign fa-2x"></i>
      &nbsp;&nbsp;Perfil sin tareas de este tipo.&nbsp;&nbsp;
      <i class="glyphicon glyphicon-warning-sign fa-2x"></i>
    </div>
    {/if}
  </div>
  <!-- /Columna tareas -->
</div>
<!-- /ListadoMisTareas -->

<!-- Pie de pagina -->
<div class="row" style="padding-top:5px; padding-left: 17px;">
  <!-- contador -->
  <div class="col-xs-4 col-md-3" style="padding-top:15px;">
    Registros: <span class="badge" style="background:#274891;">{count($tareas)+count($migraciones)}</span>
  </div>
  <!-- /contador -->

  <!-- Paginacion -->
  <div class="col-xs-8 col-xs-pull-2 col-md-9 col-md-pull-2">
    {$paginacion|default:""}
  </div>
  <!-- Paginacion -->
</div>
<!-- /Pie de pagina -->

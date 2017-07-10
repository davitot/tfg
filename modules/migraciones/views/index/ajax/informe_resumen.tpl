<div class="row">
  <!-- ListadoMigracion -->
  <div class="col-md-6" id="listadoIndex" style="width: auto;">
    {if isset($resultados) && count($resultados)}
    <table id="tablaListado">
      <tr>
        <th>Comunidad</th>
        <th>Provincia</th>
        <th>Sede</th>
        <th>Organo</th>
        <th>Pendientes</th>
        <th>Realizadas</th>
        <th>No Aplica</th>
      </tr>
      {$comunidad=''}
      {$provincia=''}
      {$sede=''}
      {$antComunidad=''}
      {$antProvincia=''}
      {$antSede=''}
      {foreach item=datos from=$resultados}
      {$antComunidad=$comunidad}
      {$comunidad={$datos.comunidad}}
      {$antProvincia=$provincia}
      {$provincia={$datos.provincia}}
      {$antSede=$sede}
      {$sede={$datos.sede}}
      <tr style="text-align: center;">
        {if $comunidad != $antComunidad}
        <td>{$datos.comunidad}</td>
        {$comunidad=$datos.comunidad}
        {else}
        <td>&nbsp;</td>
        {/if}
        {if $provincia != $antProvincia}
        <td>{$datos.provincia}</td>
        {$provincia=$datos.provincia}
        {else}
        <td>&nbsp;</td>
        {/if}
        {if $sede != $antSede}
        <td>{$datos.sede}</td>
        {$sede=$datos.sede}
        {else}
        <td>&nbsp;</td>
        {/if}
        <td>{$datos.organo}</td>
        <td style="text-align: center;">{$datos.pendientes}</td>
        <td style="text-align: center;">{$datos.realizadas}</td>
        <td style="text-align: center;">{$datos.no_aplica}</td>
      </tr>
      {/foreach}
    </table>
    {else}
    <p><strong>No hay resultados disponibles.&nbsp;&nbsp;&nbsp; <img src="{$_layoutParams.root}/public/img/noResults.png" alt="Editar"/></strong></p>
    {/if}
  </div>
  <!-- /ListadoMigracion -->
  <!-- Totales -->
  <div class="col-md-2 text-left resumenTotales" >
      {for $i=0 to 2}
          <table id="tablaTotales">
              <strong>{$comunidades[$i][0]}</strong>
              <th>Realizadas</th>
              <th>Pendientes</th>
              <th>No Aplica</th>
              <tr>
                  <!--Parte de realizadas -->
                  {$encontrado=false}
                  {foreach item=realizada from=$realizadas}
                      {if isset($realizada) && ($realizada.comunidad == {$comunidades[$i][0]})}
                          <td style="text-align: center;">{$realizada.realizadas}</td>
                          {$encontrado= true}
                      {/if}
                  {/foreach}
                  {if !$encontrado}
                      <td>0</td>
                  {/if}
                  <!--/Parte de realizadas -->
                  <!--Parte de pendientes -->
                  {$encontrado=false}
                  {foreach item=pendiente from=$pendientes}
                      {if isset($pendiente) && ($pendiente.comunidad == {$comunidades[$i][0]})}
                          <td style="text-align: center;">{$pendiente.pendientes}</td>
                          {$encontrado= true}
                      {/if}
                  {/foreach}
                  {if !$encontrado}
                      <td>0</td>
                  {/if}
                  <!--/Parte de pendientes -->
                  <!--Parte de noAplica -->
                  {$encontrado=false}
                  {foreach item=noAplic from=$noAplica}
                      {if isset($noAplic) && ($noAplic.comunidad == {$comunidades[$i][0]})}
                          <td style="text-align: center;">{$noAplic.no_aplica}</td>
                          {$encontrado= true}
                      {/if}
                  {/foreach}
                  {if !$encontrado}
                      <td>0</td>
                  {/if}
                  <!--/Parte de noAplica -->
              </tr>
          </table>
          <br/>
      {/for}
  </div>
  <div class="col-md-2 text-left resumenTotales" >
      {for $i=3 to 4}
          <table id="tablaTotales">
              <strong>{$comunidades[$i][0]}</strong>
              <th>Realizadas</th>
              <th>Pendientes</th>
              <th>No Aplica</th>
              <tr>
                  <!--Parte de realizadas -->
                  {$encontrado=false}
                  {foreach item=realizada from=$realizadas}
                      {if isset($realizada) && ($realizada.comunidad == {$comunidades[$i][0]})}
                          <td style="text-align: center;">{$realizada.realizadas}</td>
                          {$encontrado= true}
                      {/if}
                  {/foreach}
                  {if !$encontrado}
                      <td>0</td>
                  {/if}
                  <!--/Parte de realizadas -->
                  <!--Parte de pendientes -->
                  {$encontrado=false}
                  {foreach item=pendiente from=$pendientes}
                      {if isset($pendiente) && ($pendiente.comunidad == {$comunidades[$i][0]})}
                          <td style="text-align: center;">{$pendiente.pendientes}</td>
                          {$encontrado= true}
                      {/if}
                  {/foreach}
                  {if !$encontrado}
                      <td>0</td>
                  {/if}
                  <!--/Parte de pendientes -->
                  <!--Parte de noAplica -->
                  {$encontrado=false}
                  {foreach item=noAplic from=$noAplica}
                      {if isset($noAplic) && ($noAplic.comunidad == {$comunidades[$i][0]})}
                          <td style="text-align: center;">{$noAplic.no_aplica}</td>
                          {$encontrado= true}
                      {/if}
                  {/foreach}
                  {if !$encontrado}
                      <td>0</td>
                  {/if}
                  <!--/Parte de noAplica -->
              </tr>
          </table>
          <br/>
      {/for}
  </div>
  <!-- /Totales -->
</div>
<!-- ListadoTotales -->

<!-- Pie de pagina -->
<div class="row">
  <!-- contador -->
  <div class="col-md-3" style="padding-top:15px;">
    Organos: <span class="badge" style="background:#274891;">{$contador}</span>
  </div>
  <!-- /contador -->

  <!-- Paginacion -->
  <div class="col-md-9 col-md-pull-2">
    {$paginacion|default:""}
  </div>
  <!-- Paginacion -->
</div>

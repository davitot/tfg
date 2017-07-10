<!-- listadoRecursos -->
<div class="row">
    <div class="col-xs-12 col-md-push-1 col-md-11" id="listadoIndex">
        {if isset($recursos) && count($recursos)}
            <table id="tablaListado">
                <tr>
                    <th colspan='2'>Tipo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Num. Serie</th>
                    <th>Fecha Alta</th>
                    <th>Disponible</th>
                    <th colspan="2">Acciones</th>
                </tr>
                {foreach item=recurso from=$recursos}
                    <tr>
                        <td style="width: 0.4%; text-align: center;"><img src=".//public/img/recursos/{$recurso.tipo}.png" title="Monitor"/></td>
                        <td>{$recurso.tipo}</td>
                        <td>{$recurso.marca}</td>
                        <td>{$recurso.modelo}</td>
                        <td>{$recurso.num_serie}</td>
                        <td style="text-align: center; width: 4%;">{$recurso.fecha_alta|date_format:"%d/%m/%Y"}</td>
                        <td style="text-align: center; width: 5%;">
                            {if $recurso.activo == 0}
                                <img src="./public/img/estados/gestionada.png" title="Recurso disponible"/>
                            {else}
                                <img src="./public/img/estados/noGestionada.png" title="Asignado a:  {$recurso.empleado}  el  {$recurso.fecha_asignacion|date_format:"%d/%m/%Y"}"/>
                            {/if}
                        </td>
                        <td style="width: 0.4%; text-align: center;">
                            {if Session::acceso(Session::get('level'))}
                                <a href="./recursos/index/editar_recurso/{$recurso.idRecurso}"><i class="glyphicon glyphicon-edit"></i></a>
                                {else}
                                <i class="glyphicon glyphicon-edit disabled"></i>
                            {/if}
                        </td>
                        <td style="width: 0.4%; text-align: center;">
                            {if !Session::acceso(Session::get('level'))}
                                <i class="glyphicon glyphicon-trash"></i>
                            {else}
                                <a href="#" onClick="confirmarBorrado({$recurso.idRecurso},{$recurso.activo})"><i class="glyphicon glyphicon-trash"></i></a>
                                {/if}
                        </td>
                    </tr>
                {/foreach}
            </table>
        {else}
            <br>
            <br>
            <br>
            <div class="col-md-12 text-center">
                <strong>No hay Recusos coincidentes.</strong>
                <img src="./public/img/noResults.png" alt="Sin resultados"/>
            </div>
        {/if}
    </div>
    <!-- /listadoRecursos -->
</div>
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

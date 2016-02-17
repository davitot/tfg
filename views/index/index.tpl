
<link href="{$_layoutParams.root}views/index/css/estilosIndex.css" rel="stylesheet" type="text/css" />

<!-- Funciones JS -->
<script type="text/javascript">
    function mostrar(id) {
        obj1 = document.getElementById(id);
        id1 = obj1.getAttribute("id");

        switch (id1) {
            case "listaTareasPtes":
                verTareas(obj1);
                break;
            case "listaReunionesPtes":
                verReuniones(obj1);
                break;
            default:
                break;
        }
    }

    function verTareas(objeto) {
        objeto.style.display = (objeto.style.display === 'none') ? 'block' : 'none';
        ocultar = document.getElementById('listaReunionesPtes');
        ocultar.style.display = 'none';
        cambiarimagen('mostrarReuniones', '{$_layoutParams.ruta_img}agregar.png');
    }

    function verReuniones(objeto) {
        objeto.style.display = (objeto.style.display === 'none') ? 'block' : 'none';
        ocultar = document.getElementById('listaTareasPtes');
        ocultar.style.display = 'none';
        cambiarimagen('mostrarTareas', '{$_layoutParams.ruta_img}agregar.png');
    }
    function cambiarimagen(id, url) {
        document.getElementById(id).src = url;
    }

</script>
<!-- /Funciones JS -->
<!-- header -->
<header>
    <h2>Migracion MS-Exchange <img src="{$_layoutParams.ruta_img}flecha.png" alt="" /> IBM Lotus </h2>
        {if Session::get('autenticado')}
        <br>
        <p>Menu principal</p>
        <br>                                              
    {else}
        <p style="text-align: center;"><img src="{$_layoutParams.ruta_img}logo_inicio.png" alt="" /> </p>
        {/if}
</header>

<!--Contador Tareas -->
<div id="contadorTareas">
    <div class="col-lg-3 col-md-4" style="font-size: 13px;">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right" style="font-size: 13px;">
                        <div class="huge" >{count($tareas)}</div>
                        <div>Tareas abiertas</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal">
                       Ver listado
                    </button>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>       
    </div>        
</div>  


<!--listaTareasPtes -->
<div id="listaTareasPtes">               
    <div class="panel-body">        
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="width: 450px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Tareas en proceso</h4>
                    </div>
                    <div class="modal-body" align="center">
                        <table id="tablaPtes">
                            {if isset($tareas) && count($tareas)}           
                                <tr>
                                    <th>Tecnico</th>
                                    <th>Titulo</th>                    
                                    <th style="width: 30px; ">Fin</th>                                        
                                </tr>

                                {foreach item=ta from=$tareas}                
                                    <tr>    
                                        {if $ta.tipo eq 'Migracion'}
                                            <td><a href="{$_layoutParams.root}pdf/generar_InformeTarea/{$ta.idPersonal}/{$ta.idTarea}">{$ta.tecnico}
                                                {else}
                                                    {$ta.tecnico}
                                                {/if}
                                        </td>
                                        <td>{$ta.titulo}</td>                                                
                                        {if $ta.fecha_fin == '' OR $ta.fecha_fin=='0000-00-00'}
                                            <td style="text-align: center;"> <img src="{$_layoutParams.root}modules/tareas/views/index/img/noGestionada.png" title="Iniciada: {$ta.fecha_inicio|date_format:"%d/%m/%Y"}"/> </td>
                                            {else}
                                                {$title="Iniciada:     {$ta.fecha_inicio|date_format:"%d/%m/%Y"} \nFinalizada: {$ta.fecha_fin|date_format:"%d/%m/%Y"}"}
                                                {$title= htmlentities($title)}
                                            <td style="text-align: center;"> <img src="{$_layoutParams.root}modules/tareas/views/index/img/gestionada.png" title="{$title}"/> </td>
                                            {/if}                        
                                    </tr>
                                {/foreach}

                            {else}
                                <tr>
                                    <td>No hay Tareas pendientes.</td>
                                    <td><img src="{$_layoutParams.ruta_img}calendario_blank.png" alt="No hay tareas"/></td>
                                </tr>           
                            {/if}    
                        </table>      
                    </div>                    
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
    <!-- .panel-body -->
</div>
<!-- /.panel -->


<div>

</div>

<!--Contador Reuniones -->    
<div id="contadorReuniones">
    <table>
        <tr>
            <td><a href="" onclick="mostrar('listaReunionesPtes');
                    return false;" ><img id="mostrarReuniones" src="{$_layoutParams.ruta_img}agregar.png" alt="" /></a></td>
            <td>Reuniones: {count($tareas)}</td>
        </tr>
    </table>
</div>

<!--listaReunionesPtes -->      
<div id="listaReunionesPtes" style='display:none;'>               
    <table id="tablaRPtes">
        {if isset($tareas) && count($tareas)}           
            <tr>
                <th>Tecnico</th>
                <th>Titulo</th>                    
                <th>Fin</th>                                        
            </tr>

            {foreach item=ta from=$tareas}                
                <tr>                        
                    <td><a href="{$_layoutParams.root}tareas/index/editar_tarea/{$ta.idTarea}">{$ta.tecnico}</a></td>
                    <td>{$ta.titulo}</td>                                                
                    {if $ta.fecha_fin == ''  OR $ta.fecha_fin=='0000-00-00'}
                        <td style="text-align: center;"> <img name="desplegable" src="{$_layoutParams.root}modules/tareas/views/index/img/noGestionada.png" alt="Pendiente"/> </td>
                        {else}
                        <td style="text-align: center;">{$ta.fecha_fin|date_format:"%d/%m/%Y"}</td>
                    {/if}                        
                </tr>
            {/foreach}

        {else}
            <tr>
                <td>No hay Tareas pendientes.</td>
                <td><img src="{$_layoutParams.ruta_img}calendario_blank.png" alt="No hay tareas"/></td>
            </tr>           
        {/if}    
    </table>      
</div>

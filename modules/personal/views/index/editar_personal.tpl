<link href="{$_layoutParams.root}modules/personal/views/index/css/estilosPersonal.css" rel="stylesheet" type="text/css" />

<!-- Funciones JS -->
<script type="text/javascript">
    function mostrar(id) {
        obj1 = document.getElementById(id);
        id1 = obj1.getAttribute("id");

        switch (id1) {
            case "listadoRecursos":
                verRecursos(obj1);
                break;
            default:
                break;
        }
    }

    function verRecursos(objeto) {
        objeto.style.display = (objeto.style.display === 'none') ? 'block' : 'none';

        if ((document.mostrarRecursos.src).indexOf('contraer') !== -1) {
            document.mostrarRecursos.src = '{$_layoutParams.ruta_img}agregar.png';
        } else {
            document.mostrarRecursos.src = '{$_layoutParams.ruta_img}contraer.png';
        }
    }
</script>
<!-- /Funciones JS -->

<!-- nav -->            
<nav>
    <table style="text-align: center; font-size: 11px;">       
        <tr>
            <td>
                <img src="{$_layoutParams.root}public/img/nav/vacio.png" alt="nada"/></a>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <img src="{$_layoutParams.root}public/img/nav/vacio.png" alt="nada"/></a>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <img src="{$_layoutParams.root}public/img/nav/vacio.png" alt="nada"/></a>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <a href="{$_layoutParams.root}personal"><img src="{$_layoutParams.root}public/img/nav/atras.png" alt="Inicio"/></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;Volver
            </td>
        </tr>
    </table>      
</nav>
<!-- /nav -->   

<!-- Formulario datos Personal-->            
<div>
    <div id="formularioEditarPersonal">  
        <form id="form1" method="post" action="">
            <input type="hidden" name="guardar" value="1" />
            <table>
                <tr>
                    <td>
                        Nombre:
                    </td>
                    <td>
                        <input type="text" name="nombre" value="{if isset($datos.nombre)}{$datos.nombre}{/if}" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Cargo:
                    </td>
                    <td>
                        <select id="cargo" name="cargo">
                            <option value="">{if isset($datos.cargo)}{$datos.cargo}{/if}</option>
                            {foreach from=$cargos item=cargo}                
                                {if $datos.cargo neq $cargo.descripcion}    
                                    <option value="{$cargo.idCargo}">{$cargo.descripcion}</option>                
                                {/if}
                            {/foreach}
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Email:
                    </td>
                    <td>
                        <input type="email" name="email" value="{if isset($datos.email)}{$datos.email}{/if}" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Fecha de alta:
                    </td>
                    <td>
                        <input type="date" name="fechaIn" value="{if isset($datos.fecha_Incorporacion)}{$datos.fecha_Incorporacion}{/if}" />
                    </td>
                <tr>
                    <td>
                        Usuario:
                    </td>
                    <td>
                        <input type="text" name="usuario" value="{if isset($datos.usuario)}{$datos.usuario}{/if}" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Password:
                    </td>
                    <td>
                        <input type="password" name="pass" value="{if isset($datos.pass)}{$datos.pass}{/if}" />
                    </td>
                </tr>    
                <tr>
                    <td>                    
                        Activo:
                    </td>
                    <td>
                        <input type="checkbox" name="activa" value="1" {if ($datos.activo == 1)}checked="checked"{/if}/>
                    </td>  
                </tr>
            </table>
            <br>
            <p style="margin-left: 27%; "><input type="submit" value="Guardar" class="button"/></p>   
            <br>
            <br>
        </form>      
    </div>
    <!-- /Formulario datos Personal-->   

    <!-- Contador Recursos Asignados -->    
    <div id="contadorRecursos">
        <table>
            <tr>
                <td><a href="" onclick="mostrar('listadoRecursos');
                        return false;" ><img id="mostrarRecursos" name="mostrarRecursos" src="{$_layoutParams.ruta_img}agregar.png" alt="" /></a></td>
                <td>Recursos asignados: {count($recursosPersonal)}</td>
            </tr>
        </table>
    </div>
    <!-- /Contador Recursos Asignados -->           

    <!-- ListadoRecursos -->   
    <div id="listadoRecursos" style='display:none;'>    
        {if isset($recursosPersonal) && count($recursosPersonal)}            
            <table id="tablaRecursos">            
                <tr>                    
                    <th colspan='2'>Tipo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Fecha Alta</th>                                    
                        {if Session::acceso(Session::get('level'))}
                        <th colspan="1">Acciones</th>
                        {/if}
                </tr>
                {foreach item=dato from=$recursosPersonal}
                    <tr style='vertical-align: middle;'>
                        <td style='text-align: center;'>
                            {if {$dato.tipo}=='Portatil'}
                                <img src="{$_layoutParams.root}/public/img/recursos/portatil.png" title="Portatil"/>
                            {else}
                                {if {$dato.tipo}=='Teclado'}
                                    <img src="{$_layoutParams.root}/public/img/recursos/teclado.png" title="Teclado"/>                               
                                {else}
                                    {if {$dato.tipo}=='Raton'}
                                        <img src="{$_layoutParams.root}/public/img/recursos/raton.png" title="Raton"/>                                    
                                    {else}
                                        {if {$dato.tipo}=='Monitor'}
                                            <img src="{$_layoutParams.root}/public/img/recursos/monitor.png" title="Monitor"/>                                    
                                        {else}
                                            <img src="{$_layoutParams.root}/public/img/recursos/movil.png" title="movil"/>
                                        {/if}                                            

                                    {/if}                                    
                                {/if}
                            {/if}
                        </td> 
                        <td>{$dato.tipo}</td>
                        <td>{$dato.marca}</td>
                        <td>{$dato.modelo}</td>                        
                        <td style="text-align: center;">{$dato.fecha_alta}</td>
                        {if Session::acceso(Session::get('level'))}
                            <td style="width: 0.4%; text-align: center;"><a href="{$_layoutParams.root}personal/index/eliminar_recurso/{$datos.idPersonal}/{$dato.idRecurso}"><img src="{$_layoutParams.root}/public/img/accionesTabla/eliminar.png" alt="Eliminar"/></a></td>                       
                                {/if}
                    </tr>
                {/foreach}                
            </table>
        {else}
            <br/>
            <p>                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="{$_layoutParams.root}public/img/recursos/portatil.png" title="portatil"/>&nbsp;
                <img src="{$_layoutParams.root}public/img/recursos/teclado.png" title="Teclado"/>&nbsp;
                <img src="{$_layoutParams.root}public/img/recursos/raton.png" title="Raton"/>&nbsp;
                <img src="{$_layoutParams.root}public/img/recursos/movil.png" title="Movil"/>&nbsp;
                <img src="{$_layoutParams.root}public/img/recursos/monitor.png" title="Monitor"/>
            </p>            
        {/if} 
        {if isset($recursosLibres) && count($recursosLibres) }
            <form id="form1" method="post" action="{$_layoutParams.root}personal/index/agregar_recurso"
                  enctype="multipart/form-data">
                <input type="hidden" name="idPersonal" value="{$datos.idPersonal}" />
                <table id="tablaRecursosLibres">
                    <br>
                    <br>
                    <th colspan='6'>Recursos Libres</th>              
                        {foreach item=dato from=$recursosLibres}
                        <tr>
                            <td style='text-align:center;'>
                                {if {$dato.tipo}=='Portatil'}
                                    <img src="{$_layoutParams.root}/public/img/recursos/portatil.png" title="Portatil"/>
                                {else}
                                    {if {$dato.tipo}=='Teclado'}
                                        <img src="{$_layoutParams.root}/public/img/recursos/teclado.png" title="Teclado"/>                               
                                    {else}
                                        {if {$dato.tipo}=='Raton'}
                                            <img src="{$_layoutParams.root}/public/img/recursos/raton.png" title="Raton"/>                                    
                                        {else}
                                            {if {$dato.tipo}=='Monitor'}
                                                <img src="{$_layoutParams.root}/public/img/recursos/monitor.png" title="Monitor"/>                                    
                                            {else}
                                                <img src="{$_layoutParams.root}/public/img/recursos/movil.png" title="movil"/>
                                            {/if}                                            

                                        {/if}                                    
                                    {/if}
                                {/if}
                            </td>                             
                            <td>                                
                                {$dato.tipo}                                            
                            </td>                
                            <td>
                                {$dato.marca}
                            </td>
                            <td>
                                {$dato.modelo}
                            </td>
                            <td>
                                <input name="recLibres[]" type="checkbox" value="{$dato.idRecurso}">
                            </td>
                        </tr> 
                    {/foreach}                  
                </table>
                <br/>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="ok" class="insertar"/>                
            </form>
        {else}            
            <br/>
            <br/>
            <p style="font-size: 11.5px;">  
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No hay recursos libres.
            </p>
            <br/>            
            <p>  
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="{$_layoutParams.root}public/img/recursos/portatil.png" title="portatil"/>&nbsp;
                <img src="{$_layoutParams.root}public/img/recursos/teclado.png" title="Teclado"/>&nbsp;
                <img src="{$_layoutParams.root}public/img/recursos/raton.png" title="Raton"/>&nbsp;
                <img src="{$_layoutParams.root}public/img/recursos/movil.png" title="Movil"/>&nbsp;
                <img src="{$_layoutParams.root}public/img/recursos/monitor.png" title="Monitor"/>
            </p>            
        {/if}
    </div>
    <!-- /ListadoRecursos -->
</div>
<!-- /Formulario datos Personal-->   
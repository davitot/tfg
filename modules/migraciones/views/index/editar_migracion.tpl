<link href="{$_layoutParams.root}modules/migraciones/views/index/css/estilosMigraciones.css" rel="stylesheet" type="text/css" />

<!-- header -->
<div class="row">
    <div class="col-md-12" style="padding-top: 5px;">
        <h1 class="page-header">Tecnico: {$persona}</h1>
    </div>       
</div>

<!-- nav  -->    
<nav>
    <table>    
        <tr>
            <td>
                <img src="{$_layoutParams.root}public/img/nav/vacio.png" alt="nada"/>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <img src="{$_layoutParams.root}public/img/nav/vacio.png" alt="nada"/>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <img src="{$_layoutParams.root}public/img/nav/vacio.png" alt="nada"/>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <a href="{$_layoutParams.root}migraciones"><img src="{$_layoutParams.root}public/img/nav/atras.png" alt="Atras"/></a>
            </td>
        </tr>       
        <tr>
            <td style="text-align: center;">
                &nbsp;&nbsp;&nbsp;Volver
            </td>
        </tr>    
    </table>
</nav>    

<!-- Formulario -->
<div id="formulario" style="width:713px; left: 26%; top: 5%; background: ghostwhite;">    
    <form name="fnuevaTarea" method="post" action="">
        <input type="hidden" name="guardar" value="1" />
        <input type="hidden" name="idMigracion" value="{$datos.idMigracion}" />        
        <table id="tablaEdicion">
            <tr>
                <td>       
                    Nombre: 
                </td>
                <td>                                
                    <input type="text" name="nombre" value="{$datos.nombre|default:""}" style="width: auto;"/>
                </td>
                <td>       
                    Apellidos: 
                </td>
                <td>                                
                    <input type="text" name="nombre" value="{$datos.apellidos|default:""}" style="width: auto;"/>
                </td>
            </tr>                                                                           
            <tr>               
                <td>Comunidad:</td>
                <td width="auto">
                    <select id="comunidad" name="comunidad">  
                        <option value="{$datos.comunidad|default:""}">{$datos.comunidad|default:""}</option>
                    </select>
                </td>           
                <td width="50">Provincia:</td>                
                <td width="80"><select id="provincia" name="provincia"> 
                        <option value="{$datos.provincia|default:""}">{$datos.provincia|default:""}</option>
                    </select>
                </td>    
            </tr>
            <tr>                
                <td width="50">Sede:</td>
                <td width="80"> <select id="sede" name="sede">   
                        <option value="{$datos.sede|default:""}">{$datos.desc_sede|default:""}</option>
                    </select> 
                </td>
                <td width="50">Organo:</td>                
                <td width="80"><select id="organo" name="organo">  
                        <option value="{$datos.organo|default:""}">{$datos.organo|default:""}</option>                       
                    </select>
                </td> 
            </tr>            
            <tr>
                <td>
                    Fecha inicio:
                </td>
                <td width="80">
                    <input type="date" name="fechaInicio" value="{$datos.fecha_Inicio|default:""}"/>
                </td>                
                <td width="80">
                    Fecha fin:
                </td>
                <td>
                    <input type="date" name="fechaFin" value="{$datos.fecha_Fin|default:""}" />
                </td>    
            </tr>
            <tr>
                <td>
                    Estado inicial:
                </td>
                <td>
                    <input type="text" name="estadoInicial" value="{$datos.estado_inicial|default:""}"/>
                </td>            
                <td>
                    Estado final:
                </td>
                <td colspan="2">
                    <input type="text" name="estadoFinal" value="{$datos.estado_final|default:""}" />
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top;" >
                    Observaciones:
                </td>
                <td colspan="4">
                    <textArea name="descripcion" style="width: 327px; height:60px;">{$datos.observaciones|default:""}</textArea>
                </td>
            </tr>
            <tr>
                <td colspan="8" align="center">
                    <input type="submit" class="btn btn-outline btn-primary" value="Guardar" />
                </td>
            </tr>
        </table>        
    </form>     
</div>               
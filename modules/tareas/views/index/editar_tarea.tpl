<link href="{$_layoutParams.root}modules/tareas/views/index/css/estilosTareas.css" rel="stylesheet" type="text/css" />

<!-- header -->
<header>
    <p style="font-size: 15px;">
        Personal asignado: {$datos.tecnico}
    </p>       
</header>

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
                <a href="{$_layoutParams.root}tareas"><img src="{$_layoutParams.root}public/img/nav/atras.png" alt="Atras"/></a>
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
<div id="formulario">
    <form name="fnuevaTarea" method="post" action="">
        <input type="hidden" name="guardar" value="1" />
        <input type="hidden" name="idTarea" value="{$datos.idTarea}" />
        <table>
            <tr>
                <td width="61">       
                    Titulo:
                </td>
                <td colspan="4" >                                
                    <input type="text" name="titulo" value="{$datos.titulo|default:""}" style="width: 330px;"/>
                </td>
            </tr>
            <tr>
                <td>        
                    Tipo:
                </td>                               
                <td colspan="4">                    
                    <input type="text" id="tipo" name="tipo" value="{$datos.tipo}" readonly="1">                         
                </td>
                </td>
            </tr>
            <tr>
                <td>        
                    <label>Personal:</label>
                </td>                                       
                <td colspan="4">                    
                    <select id="tecnicos" name="tecnicos">
                        <option value="{$datos.idPersonal|default:""}">{$datos.tecnico|default:""}</option>
                    </select>        
                </td>
            </tr>                                      
            <tr id="Administracion" style="vertical-align: text-top;display:  none;" >
                <td>&nbsp;</td>
                <td width="44">Guardia:</td>
                <td width="31"><input type="checkbox" name="guardia" value="{$datos.guardia|default:""}" {if ($datos.guardia == 1)}checked="checked"{/if}/></td>
                <td width="120">Perdida Servicio:</td>
                <td width="80"><input type="checkbox" name="noServicio" value="{$datos.noServicio|default:""}" {if ($datos.noServicio == 1)}checked="checked"{/if}/></td>
            </tr>             
            <tr id="Migracion1" style="vertical-align: text-top; display:  none;">
                <td>&nbsp;</td>
                <td width="50">Comunidad:</td>
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
            <tr id="Migracion2" style="vertical-align: text-top;display:  none;">
                <td>&nbsp;</td>
                <td width="50">Sede:</td>
                <td width="auto"> <select id="sede" name="sede">   
                        <option value="{$datos.sede|default:""}">{$datos.sede|default:""}</option>
                    </select> 
                </td>
                <td width="50">Organo:</td>                
                <td width="80"><select id="organo" name="organo">  
                        <option value="{$datos.organo|default:""}">{$datos.organo|default:""}</option>                       
                    </select>
                </td> 
            </tr>
            <tr>
                <td style="vertical-align: top;" >
                    Descripcion:
                </td>                
                <td colspan="4">
                    <textArea name="descripcion" style="width: 327px; height:60px;">{$datos.descripcion|default:""}</textArea>
                </td>                
            </tr>

            <tr>
                <td>
                    F. inicio:
                </td>
                <td colspan="4">
                    <input type="date" name="fechaInicio" value="{$datos.fecha_inicio|default:"Pendiente"}"/>
                </td>    

            <tr>
                <td>
                    F. fin:
                </td>
                <td colspan="2">
                    <input type="date" name="fechaFin" value="{$datos.fecha_fin|default:"Pendiente"}" />
                </td>            
                <td>
                    Gestionada:
                </td>
                <td>
                    <input type="checkbox" name="activa" value="{$datos.activa|default:""}" {if ($datos.activa == 0)}checked="checked"{/if}/>
                </td>             
        <tr>
            <td colspan="6" align="center">
                <input type="submit" class="button" value="Guardar" />
            </td>
        </tr>          
        </table>        
    </form>                             
</div>
                
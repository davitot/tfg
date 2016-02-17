<link href="{$_layoutParams.root}modules/migraciones/views/index/css/estilosMigraciones.css" rel="stylesheet" type="text/css" />

<!-- header -->
<header>
    <p style="font-size: 15px;">
        Migracion ({$datos.idMigracion}): {$datos.comunidad}, {$datos.provincia}, {$datos.desc_sede} 
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

<!-- Formulario 
<div id="formulario">
    <form name="fnuevaTarea" method="post" action="">
        <input type="hidden" name="guardar" value="1" />
        <input type="hidden" name="idMigracion" value="{$datos.idMigracoin}" />
        <table>
            <tr>
                <td width="61">       
                    Usuario:
                </td>
                <td colspan="4" >                                
                    <input type="text" name="nombre" value="{$datos.nombre|default:""}" style="width: 330px;"/>
                </td>
            </tr>
            <tr>
                <td>        
                    Provincia:
                </td>                               
                <td colspan="4">                    
                    <input type="text" id="provincia" name="provincia" value="{$datos.provincia}" readonly="1">                         
                </td>
                </td>
            </tr>
            <tr>
                <td>        
                    <label>Comunidad:</label>
                </td>   
                <td colspan="4">                    
                    <input type="text" id="comunidad" name="comunidad" value="{$datos.comunidad}" readonly="1">                         
                </td>
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
                    <textArea name="descripcion" style="width: 327px; height:60px;">{$datos.observaciones|default:""}</textArea>
                </td>                
            </tr>

            <tr>
                <td>
                    F. inicio:
                </td>
                <td colspan="4">
                    <input type="date" name="fechaInicio" value="{$datos.fecha_inicio|default:"Pendiente"}"/>
                </td>    
            </tr>
            <tr>
                <td>
                    F. fin:
                </td>
                <td colspan="2">
                    <input type="date" name="fechaFin" value="{$datos.fecha_fin|default:"Pendiente"}" />
                </td>    
            </tr>                                                     
            <tr>
                <td colspan="6" align="center">
                    <input type="submit" class="button" value="Guardar" />
                </td>
            </tr>          
        </table>        
    </form>     
</div>-->
                
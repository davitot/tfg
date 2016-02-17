<!-- header -->
<header>    
    <h2>
        Nueva Tarea
    </h2>
</header>
<!-- header -->

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
                <a href="{$_layoutParams.root}tareas"><img src="{$_layoutParams.root}public/img/nav/atras.png" alt="Atras"/></a>
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

<!-- formulario -->
<div id="formulario">
    <form action="" method="post" name="fnuevaTarea">
        <input type="hidden" name="guardar" value="1" />
        <table cellspacing="2" boder="0">
            <tr>
                <td width="61">Titulo:</td>
                <td colspan="4"><input style="width: 300px;" type="text" name="titulo" value="{$datos.titulo|default:""}"></td>
            </tr>
            <tr>
                <td>Tipo:</td>
                <td colspan="4">
                    <select id="tipo" name="tipo">
                        <option selected="selected"> - Tipo - </option>
                        {foreach from=$tipos item=tipo}
                            <option value="{$tipo.descripcion}">{$tipo.descripcion}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <td>Personal:</td>
                <td colspan="4">                               
                    <select id="tecnicos" name="tecnicos">
                        <option value=""> - Técnico - </option> 
                    </select>
                </td>
            </tr>
            <tr id="Administracion" style="vertical-align: text-top; display:  none">
                <td>&nbsp;</td>
                <td width="44">Guardia:</td>
                <td width="31"><input type="checkbox" name="guardia" value="activo"/></td>
                <td width="120">Perdida Servicio:</td>
                <td width="80"><input type="checkbox" name="noServicio" value="activo"/></td>
            </tr>           
            <tr id="Migracion1" style="vertical-align: text-top; display:  none">
                <td>&nbsp;</td>
                <td width="50">Comunidad:</td>
                <td width="auto">
                    <select id="comunidad" name="comunidad"></select>
                </td>
                <td width="50">Provincia:</td>
                <td width="80"><select id="provincia" name="provincia"></select></td>
            </tr>
            <tr id="Migracion2" style="vertical-align: text-top; display:  none">
                <td>&nbsp;</td>
                <td width="50">Sede:</td>
                <td width="auto"> <select id="sede" name="sede"></select></td>
                <td width="50">Organo:</td>
                <td width="80"><select id="organo" name="organo" overflow-y="scroll"></select></td>
            </tr>
            <tr>
                <td>
                    <label>Descripcion:</label>
                </td>
                <td colspan="4">
                    <textarea rows="4" cols="40" name="descripcion" value="{$datos.descripcion|default:""}" style="vertical-align: text-top; text-align: left;"></textarea>
                </td>
            </tr>
            <tr>
                <td width="85px">Fecha inicio:</td>
                <td colspan="4">
                    <input type="date" name="fechaInicio" value="{$datos.fecha_Inicio|default:""}" />
                    <img style="vertical-align: text-bottom;" src="{$_layoutParams.root}public/img/calendario_mini.png" alt=""/>
                </td>
            </tr>
            <tr>
                <td colspan="6" align="center">
                    <input type="submit" class="button" value="Guardar" />
                </td>
            </tr>
        </table>
    </form>
</div>
<!-- formulario -->

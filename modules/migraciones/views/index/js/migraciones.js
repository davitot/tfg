$(document).on('ready', function () {
    $(".pagina").live('click', function () {
        paginacion($(this).attr("pagina"));
    });

    var paginacion = function (auxPagina) {
        var pagina = 'pagina=' + auxPagina;
        var proceso = '&proceso=' + $("#proceso").val();
        var estado = '&estado=' + $("#estado").val();
        var idTecnico = '&idPersonal=' + $("#idPersonal").val();
        var idTarea = '&idTarea=' + $("#idTarea").val();
        var fechaInicio = '&fecha_Inicio=' + $("#fechaInicio").val();
        var fechaFin = '&fecha_Fin=' + $("#fechaFin").val();

        $.post(_root_ + 'migraciones/index/paginacionAjax', pagina + proceso + estado + idTecnico + idTarea + fechaInicio + fechaFin, function (data) {
            $("#refrescar").html('');
            $("#refrescar").html(data);
        });
    };

    $("#proceso").change(function () {
        if ($("#proceso").val()) {
            paginacion();
        }
        ;
    });

    $("#estado").change(function () {
        if ($("#estado").val()) {
            paginacion();
        }
        ;
    });

    $("#idPersonal").change(function () {
        var idPersonal = '&idPersonal=' + $("#idPersonal").val();
        if (!idTecnico) {
            $("#tarea").html(' <option value=""> - Tarea - </option>');
        } else {
            getTareas(idPersonal);
        }
    });


    $("#idTarea").change(function () {
        if ($("#idTarea").val()) {
            paginacion();
        }
        ;
    });

    $("#fechaInicio").change(function () {
        if ($("#fechaInicio").val()) {
            paginacion();
        }
        ;
    });

    $("#fechaFin").change(function () {
        if ($("#fechaFin").val()) {
            paginacion();
        }
        ;
    });

    $("#limpiarFecha").click(function () {
        //Limpiamos todos los filtros
        document.getElementById('proceso').options[0].selected = true;
        document.getElementById('estado').options[0].selected = true;
        document.getElementById('idPersonal').options[0].selected = true;
        document.getElementById('idTarea').options[0].selected = true;
        $('input[type=date]')[0].valueAsDate = '';
        $('input[type=date]')[1].valueAsDate = '';
        paginacion();
    });

    $("#limpiarFiltroInforme").click(function () {
        //Limpiamos todos los filtros
        document.getElementById('comunidad').options[0].selected = true;
        document.getElementById('provincia').options[0].selected = true;
        document.getElementById('sede').options[0].selected = true;
        paginacion();
    });

    $("td").change(function () {
        var col = $(this).parent().children().index($(this));
        var row = $(this).parent().parent().children().index($(this).parent());
        var table = document.getElementById("tablaListado");

        var row1 = table.rows[row];
        var col1 = row1.cells[0];

        cellsOfRow = table.rows[0].getElementsByTagName('th');
        var titulo = cellsOfRow[col].innerHTML.toLowerCase();

        var valor = $(".valor", this).val();
        var idMigracion = col1.firstChild.nodeValue;

        aux = valor.replace(" ", ",");

        valor = [aux];

        var url = "./migraciones/index/editar_campo/" + titulo + "/" + valor + "/" + idMigracion;
        window.location.href = url;
        return false;

    });

    var getTareas = function ($idTecnico) {
        $.post(_root_ + 'migraciones/index/getTareasCombo', $idTecnico, function (datos) {
            $("#idTarea").html(' <option value=""> - Tarea - </option>');
            for (var i = 0; i < datos.length; i++) {
                $("#idTarea").append('<option value="' + datos[i].idTarea + '">' + datos[i].titulo + '</option>');
            }
        }, 'json');
    };
});

$(document).on('ready', function () {
    $("body").on('click', '.pagina', function () {
        paginacion($(this).attr("pagina"));
    });

    var paginacion = function (auxPagina) {
        var pagina = 'pagina=' + auxPagina;
        var nombre = '&nombre=' + $("#nombre").val();
        var cargo = '&cargo=' + $("#cargo").val();
        var activo = '&activo=' + $("#estado").val();
        var fechaInicio = '&fechaInicio=' + $("#fechaInicio").val();

        $.post(_root_ + 'personal/index/paginacionAjax', pagina + nombre + cargo + activo + fechaInicio, function (data) {
            $("#refrescar").html('');
            $("#refrescar").html(data);
        });
    };

    $("#btnBuscar").click(function () {
        //Limpiamos todos los filtros
        paginacion();
    });

    $("#nombre").change(function () {
        if ($("#nombre").val()) {
            paginacion();
        }
        ;
    });

    $("#cargo").change(function () {
        if ($("#cargo").val()) {
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

    $("#fechaInicio").change(function () {
        if ($("#fechaInicio").val()) {
            paginacion();
        }
        ;
    });

    $("#limpiarFecha").click(function () {
        limpiar();
        paginacion();
    });

    var limpiar = function () {
        //Limpiamos todos los filtros
        document.getElementById('nombre').value = '';
        document.getElementById('cargo').options[0].selected = true;
        document.getElementById('estado').options[0].selected = true;
        $('input[type=date]')[0].valueAsDate = '';

    };


});

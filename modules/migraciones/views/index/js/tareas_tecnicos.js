$(document).on('ready', function () {
    $(".pagina").live('click', function () {
        paginacion($(this).attr("pagina"));
    });

    var paginacion = function (auxPagina) {
        var pagina = 'pagina=' + auxPagina;
        var comunidad = '&comunidad=' + $("#comunidad").val();
        var fechaFin = '&fechaFin=' + $("#fechaFin").val();
        var fechaInicio = '&fechaInicio=' + $("#fechaInicio").val();

        $.post(_root_ + 'migraciones/index/paginacionTareasTecnicos', pagina + comunidad + fechaInicio + fechaFin, function (data) {
            $("#refrescar").html('');
            $("#refrescar").html(data);
        });
    };

    $("#comunidad").change(function () {
        if ($("#comunidad").val()) {
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
     
    $("#limpiarFiltroInforme").click(function () {
        //Limpiamos todos los filtros
        document.getElementById('comunidad').options[0].selected = true;
        $('input[type=date]')[0].valueAsDate = '';
        $('input[type=date]')[1].valueAsDate = '';
        paginacion();
    }); 
    
});

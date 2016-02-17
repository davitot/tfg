$(document).on('ready', function () {
    $(".pagina").live('click', function () {
        paginacion($(this).attr("pagina"));
    });

    var paginacion = function (auxPagina) {
        var pagina = 'pagina=' + auxPagina;
        var comunidad = '&comunidad=' + $("#comunidad").val();
        var provincia = '&provincia=' + $("#provincia").val();
        var sede = '&sede=' + $("#sede").val();       

        $.post(_root_ + 'migraciones/index/paginacionInforme', pagina + comunidad + provincia + sede, function (data) {
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

    $("#provincia").change(function () {
        if ($("#provincia").val()) {
            paginacion();
        }
        ;
    });

    $("#sede").change(function () {
        if ($("#sede").val()) {
            paginacion();
        }
        ;
    });
     
    $("#limpiarFiltroInforme").click(function () {
        //Limpiamos todos los filtros
        document.getElementById('comunidad').options[0].selected = true;
        document.getElementById('provincia').options[0].selected = true;
        document.getElementById('sede').options[0].selected = true;        
        paginacion();
    }); 
    
});

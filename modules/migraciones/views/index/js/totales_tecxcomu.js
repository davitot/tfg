$(document).on('ready', function () {
    $(".pagina").live('click', function () {
        paginacion($(this).attr("pagina"));
    });

    var paginacion = function (auxPagina) {
        var pagina = 'pagina=' + auxPagina;
        var comunidad = '&comunidad=' + $("#comunidad").val();                     

        $.post(_root_ + 'migraciones/index/paginacionTareasxComu', pagina + comunidad, function (data) {
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
    
    $("#limpiarFiltroInforme").click(function () {
        //Limpiamos todos los filtros
        document.getElementById('comunidad').options[0].selected = true;      
        paginacion();
    }); 
    
});

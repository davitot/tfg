$(document).on('ready', function () {
    $(".pagina").live('click', function () {
        paginacion($(this).attr("pagina"));
    });

    var paginacion = function (auxPagina) {
        var pagina = 'pagina=' + auxPagina;
        var nombre = '&nombre=' + $("#nombre").val();
        var cargo = '&cargo=' + $("#cargo").val();
        var fechaInicio = '&fechaInicio=' + $("#fechaInicio").val();

        $.post(_root_ + 'personal/index/paginacionAjax', pagina + nombre + cargo + fechaInicio, function (data) {
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
        $('input[type=date]')[0].valueAsDate = '';
        
    };
    

});

/*
function capturar()
{
    var resultado = 0;

    var activo = document.getElementsByName("activa");
    if (activo[0].checked)
        resultado = 1;

    activo[0].value = resultado;
    document.getElementById("form1").submit();
}
;*/
    
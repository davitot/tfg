$(document).on('ready', function () {
    $(".pagina").live('click', function () {
        paginacion($(this).attr("pagina"));
    });

    var paginacion = function (auxPagina) {
        var pagina = 'pagina=' + auxPagina;
        var nombre = '&nombre=' + $("#nombre").val();
        var tipoRecurso = '&tipoRecurso=' + $("#tipoRecurso").val();
        var marca = '&marca=' + $("#marca").val();      

        $.post(_root_ + 'recursos/index/paginacionAjax', pagina + nombre + tipoRecurso + marca, function (data) {
            $("#refrescar").html('');
            $("#refrescar").html(data);
        });
    };

    $("#btnBuscar").click(function () {      
        paginacion();
    });

    $("#tipoRecurso").change(function () {
        if ($("#tipoRecurso").val()) {
            paginacion();
        };
    });

    $("#marca").change(function () {
        if ($("#marca").val()) {
            paginacion();
        };
    });

    $("#limpiarCampos").click(function () {
        //Limpiamos todos los filtros
        document.getElementById('nombre').value = '';
        document.getElementById('tipoRecurso').options[0].selected = true;
        document.getElementById('marca').options[0].selected = true;
        paginacion();
    });

});

 function capturar()
    {
        var resultado = 0;

        var activo = document.getElementsByName("activa");
        if (activo[0].checked)
            resultado = 1;

        activo[0].value = resultado;        
        document.getElementById("form1").submit();
    };
    
    
   function confirmarBorrado(idRecurso) {
    if (confirm('¿El recurso se encuentra asignado, desea liberarlo?')) {
        location.href = './recursos/index/eliminar_recurso/' + idRecurso;
    }
}
;
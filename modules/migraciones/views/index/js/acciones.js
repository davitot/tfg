var getProvincias = function ($comunidad) {
    $.post(_root_ + 'tareas/index/getProvincias', $comunidad, function (datos) {
        $("#provincia").html('<option default>...</option>');
        for (var i = 0; i < datos.length; i++) {
            $("#provincia").append('<option value="' + datos[i].provincia + '">' + datos[i].provincia + '</option>');
        }
    }, 'json');
};

var getSedes = function ($provincia) {
    $.post(_root_ + 'tareas/index/getSedes', $provincia, function (datos) {
        $("#sede").html('<option default>...</option>');
        for (var i = 0; i < datos.length; i++) {
            $("#sede").append('<option value="' + datos[i].desc_sede + '">' + datos[i].desc_sede + '</option>');
        }
    }, 'json');
};

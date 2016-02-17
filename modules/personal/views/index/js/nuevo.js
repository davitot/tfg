var getTecnicos = function ($tipo) {
    $.post(_root_ + 'tareas/index/getTecnicosCombo', $tipo, function (datos) {
        $("#tecnicos").html(' <option value=""> - Tecnico - </option>');
        for (var i = 0; i < datos.length; i++) {
            $("#tecnicos").append('<option value="' + datos[i].idPersonal + '">' + datos[i].nombre + '</option>');
        }
    }, 'json');
};

$("#tipo").change(function () {
    var tipo = '&tipo=' + $("#tipo").val();

    if (!tipo) {
        $("#tecnicos").html(' <option value=""> - Tecnico - </option>');
    } else {
        getTecnicos(tipo);
    }
});

$("#tecnicos").change(function () {
    alert("idTecnico: ".$("#tecnicos").val());
});
 
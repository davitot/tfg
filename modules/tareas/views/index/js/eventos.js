$(document).on('ready', function () {
    $("#tipo").change(function () {
        var tipo = '&tipo=' + $("#tipo").val();
        getTecnicos(tipo);
        getComunidades();
        evaluarTipo();
    });

    $("#tecnicos").focus(function () {
        var tipo = '&tipo=' + $("#tipo").val();
        if (!tipo) {
            $("#tecnicos").html(' <option value=""> - Tecnicos - </option>');
        } else {
            getTecnicos(tipo);
        }
    });

    $("#comunidad").focus(function () {
        var comunidad = '&comunidad=' + $("#comunidad").val();
        if (!comunidad) {
            $("#comunidad").html(' <option value=""> - Comunidad - </option>');
        } else {
            getComunidades($("#comunidad").val());
        }
    });


    $("#comunidad").change(function () {
        var comunidad = '&comunidad=' + $("#comunidad").val();
        if (!comunidad) {
            $("#provincia").html(' <option value=""> - Provincia - </option>');
        } else {
            getProvincias(comunidad);
        }
    });

    $("#provincia").change(function () {
        var provincia = '&provincia=' + $("#provincia").val();
        if (!provincia) {
            $("#sede").html(' <option value=""> - Sede - </option>');
        } else {
            getSedes(provincia);
        }
    });

    $("#sede").change(function () {
        var sede = '&desc_sede=' + $("#sede").val();
        if (!sede) {
            $("#organo").html(' <option value=""> - Organo - </option>');
        } else {
            getOrganos(sede);
        }
    });
}
);

var evaluarTipo = function () {

    var tipo = $("#tipo").val();

    switch (tipo) {
        case 'Administracion':
            administracion('ver');
            break;

        case 'Migracion':
            migracion('ver');
            break;

        case 'Gestion':
            migracion('ocultar');
            administracion('ocultar');
            break;

        case 'Soporte':
            migracion('ocultar');
            administracion('ocultar');
            break;

        default:
            alert('Seleccione un valor de la lista');
            break;
    }
};
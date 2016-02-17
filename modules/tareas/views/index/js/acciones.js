$(document).on('ready', function () {
    if ($("#tipo").val() === "Migracion") {
        $('#formulario').width(885);
        document.getElementById('formulario').style.left = "200px";
        document.getElementById('formulario').style.top = "57px";
        document.getElementById('Migracion1').style.display = '';
        document.getElementById('Migracion2').style.display = '';
    } else { //tamaño pequeño y centrado
        if ($("#tipo").val() === "Administracion") {
            document.getElementById('Administracion').style.display = '';
        }
        $('#formulario').width(475);
        document.getElementById('formulario').style.left = "380px";
        document.getElementById('formulario').style.top = "80px";
    }
}
);

var getTecnicos = function ($tipo) {
    $.post(_root_ + 'tareas/index/getTecnicosCombo', $tipo, function (datos) {
        $("#tecnicos").html(' <option value=""> - Tecnico - </option>');
        for (var i = 0; i < datos.length; i++) {
            $("#tecnicos").append('<option value="' + datos[i].idPersonal + '">' + datos[i].nombre + '</option>');
        }
    }, 'json');
};

var getComunidades = function ($comunidad) {
    $.post(_root_ + 'tareas/index/getComunidades', function (datos) {
        if ($comunidad) {
            $("#comunidad").html(' <option value=""> ' + $comunidad + ' </option>');
        } else {
            $("#comunidad").html(' <option value=""> - Comunidad -  </option>');
        }
        for (var i = 0; i < datos.length; i++) {
            if (datos[i].comunidad !== $comunidad) {
                $("#comunidad").append('<option value="' + datos[i].comunidad + '">' + datos[i].comunidad + '</option>');
            }
        }
    }, 'json');
};

var getProvincias = function ($comunidad) {
    $.post(_root_ + 'tareas/index/getProvincias', $comunidad, function (datos) {
        $("#provincia").html(' <option value=""> - Provincia - </option>');
        for (var i = 0; i < datos.length; i++) {
            $("#provincia").append('<option value="' + datos[i].provincia + '">' + datos[i].provincia + '</option>');
        }
    }, 'json');
};

var getSedes = function ($provincia) {
    $.post(_root_ + 'tareas/index/getSedes', $provincia, function (datos) {
        $("#sede").html(' <option value=""> - Sede - </option>');
        for (var i = 0; i < datos.length; i++) {
            $("#sede").append('<option value="' + datos[i].desc_sede + '">' + datos[i].desc_sede + '</option>');
        }
    }, 'json');
};

var getOrganos = function ($sede) {
    $.post(_root_ + 'tareas/index/getOrganos', $sede, function (datos) {
        $("#organo").html(' <option value=""> - Organo - </option>');
        for (var i = 0; i < datos.length; i++) {
            $("#organo").append('<option value="' + datos[i].organo + '">' + datos[i].organo + '</option>');
        }
    }, 'json');
};

var administracion = function ($estado) {
    if ($estado === 'ver') {
        $('#formulario').width(475);
        document.getElementById('formulario').style.left = "380px";
        document.getElementById('formulario').style.top = "80px";
        document.getElementById('Administracion').style.display = '';
        migracion('ocultar');

    } else {
        document.getElementById('Administracion').style.display = 'none';
        document.getElementById('guardia').checked = 0;
        document.getElementById('noServicio').checked = 0;
    }
};

var migracion = function ($estado) {
    if ($estado === 'ver') {
        $('#formulario').width(885);
        document.getElementById('formulario').style.left = "200px";
        document.getElementById('formulario').style.top = "60px";
        document.getElementById('Migracion1').style.display = '';
        document.getElementById('Migracion2').style.display = '';
        getComunidades();
        administracion('ocultar');
    } else {
        $('#formulario').width(475);
        document.getElementById('formulario').style.left = "380px";
        document.getElementById('formulario').style.top = "80px";
        document.getElementById('Migracion1').style.display = 'none';
        document.getElementById('Migracion2').style.display = 'none';
        document.getElementById('comunidad').selectedIndex = "0";
        document.getElementById('provincia').selectedIndex = "0";
        document.getElementById('sede').selectedIndex = "0";
    }
};
function mostrar(id) {
    obj1 = document.getElementById(id);
    verSelector(obj1);
}

function mostrarProgreso() {
    document.getElementById("selectorFichero").style.display = 'none';
    document.getElementById("tablaListado").style.display = 'none';
    document.getElementById("progreso").style.display = 'block';
}

function verSelector(objeto) {
    objeto.style.display = (objeto.style.display === 'none') ? 'block' : 'none';
}

function dameRuta() {
    document.getElementById("excel").value = document.form1.fichero.value.replace("C:\\fakepath\\", "");
    //mostrarProgreso();

    var ext = document.getElementById("excel").value;
    ext = ext.substring(ext.length - 3, ext.length);
    ext = ext.toLowerCase();
    mostrarProgreso();

    if (ext !== 'xls') {
        alert('La extension .' + ext +
                ' no es valida; Solo se admiten ficheros Excel .xls!');
        return false;
    } else
        setTimeout(function () {
            mostrar('progreso');
        }, 10000);
    return true;
}


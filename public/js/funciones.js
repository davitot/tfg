function imageOver(el, ruta) {
    if (false) {
        var src = ruta + '-over.png';
        el.style.width = el.width + "px";
        el.style.height = el.height + "px";
        el.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + src + "', sizingMethod='scale')";
        el.src = rutajs + 'web/js/clear.gif';
    } else {
        el.src = ruta + '-over.png';
    }
}

function imageOut(el, ruta) {
    if (false) {
        var src = ruta + '.png';
        el.style.width = el.width + "px";
        el.style.height = el.height + "px";
        el.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + src + "', sizingMethod='scale')";
        el.src = rutajs + 'web/js/clear.gif';
    } else {
        el.src = ruta + '.png';
    }
}

function mostrar(ruta, id, imagen) {
    obj = document.getElementById(id, imagen);
    obj.style.visibility = (obj.style.visibility === 'hidden') ? 'visible' : 'hidden';
    //obj.style.display = (obj.style.visibility === 'none') ? 'block' : 'none';

    if (document.getElementById(imagen).src === ruta + 'contraer.png') {
        cambiarimagen(imagen, ruta + 'agregar.png');
    } else {
        cambiarimagen(imagen, ruta + 'contraer.png');
    }
}

function cambiarimagen(id, url) {
    document.getElementById(id).src = url;
}
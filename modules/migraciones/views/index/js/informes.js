$(document).on('ready', function () {
  $('body').on('click','.pagina' ,function () {
    paginacion($(this).attr("pagina"));
  });


  var paginacion = function (auxPagina) {
    var pagina = 'pagina=' + auxPagina;
    var comunidad = '&comunidad=' + $("#comunidad").val();
    var provincia = '&provincia=' + $("#provincia").val();
    var sede = '&sede=' + $("#sede").val();

    $.post(_root_ + 'migraciones/index/paginacionResumen', pagina + comunidad + provincia + sede, function (data) {
      $("#refrescar").html('');
      $("#refrescar").html(data);
    });
  };

  $("#comunidad").change(function () {
    var comunidad = '&comunidad=' + $("#comunidad").val();
    if (!comunidad) {
      $("#provincia").html(' <option value=""> ... </option>');
    } else {
      document.getElementById('provincia').options[0].selected = true;
      document.getElementById('sede').options[0].selected = true;
      getProvincias(comunidad);
      paginacion();
    }
  });

  $("#provincia").change(function () {
    var provincia = '&provincia=' + $("#provincia").val();
    if (!provincia) {
      $("#sede").html(' <option value=""> ... </option>');
    } else {    
      document.getElementById('sede').options[0].selected = true;
      getSedes(provincia);
      paginacion();
    }
  });

  $("#sede").change(function () {
    if ($("#sede").val()) {
      paginacion();
    }
  });

  $("#limpiarFiltroInforme").click(function () {
    //Limpiamos todos los filtros
    document.getElementById('comunidad').options[0].selected = true;
    document.getElementById('provincia').options[0].selected = true;
    document.getElementById('sede').options[0].selected = true;
    paginacion();
  });
});

$(document).on('ready', function () {
  $('body').on('click','.pagina' ,function () {
    paginacion($(this).attr("pagina"));
  });
  $('input[type=file]').bootstrapFileInput();

  var paginacion = function (auxPagina) {
    var pagina = 'pagina=' + auxPagina;
    var nombre = '&nombre=' + $("#nombre").val();
    var identificador = '&identificador=' + $("#identificador").val();

    $.post(_root_ + 'migraciones/index/paginacionAjax', pagina + nombre + identificador, function (data) {
      $("#refrescar").html('');
      $("#refrescar").html(data);
    });
  };

  $("#nombre").change(function () {
    if ($("#nombre").val()) {
      paginacion();
    }
    ;
  });

  $("#identificador").change(function () {
    if ($("#identificador").val()) {
      paginacion();
    }
    ;
  });

  $("#limpiarFecha").click(function () {
    //Limpiamos todos los filtros
    document.getElementById('nombre').value = '';
    document.getElementById('identificador').value = '';
    paginacion();
  });

  $("#limpiarFiltroInforme").click(function () {
    //Limpiamos todos los filtros
    document.getElementById('comunidad').options[0].selected = true;
    document.getElementById('provincia').options[0].selected = true;
    document.getElementById('sede').options[0].selected = true;
    paginacion();
  });

  $("td").change(function () {
    var col = $(this).parent().children().index($(this));
    var row = $(this).parent().parent().children().index($(this).parent());
    var table = document.getElementById("tablaListado");

    var row1 = table.rows[row];
    var col1 = row1.cells[0];

    cellsOfRow = table.rows[0].getElementsByTagName('th');
    var titulo = cellsOfRow[col].innerHTML.toLowerCase();

    var valor = $(".valor", this).val();
    var idMigracion = col1.firstChild.nodeValue;

    aux = valor.replace(" ", ",");

    valor = [aux];

    var url = "./migraciones/index/editar_campo/" + titulo + "/" + valor + "/" + idMigracion;
    window.location.href = url;
    return false;
  });

  var getTareas = function ($idPersonal) {
    if($idPersonal){
      $.post(_root_ + 'tareas/index/getTareasCombo', $idPersonal, function (datos) {
        $("#idTarea").html(' <option value=""> - Tarea - </option>');
        for (var i = 0; i < datos.length; i++) {
          $("#idTarea").append('<option value="' + datos[i].idTarea + '">' + datos[i].titulo + '</option>');
        }
      }, 'json');
    }else{
      $.post(_root_ + 'tareas/index/getTareas', function (datos) {
        $("#idTarea").html(' <option value=""> - Tarea - </option>');
        for (var i = 0; i < datos.length; i++) {
          $("#idTarea").append('<option value="' + datos[i].idTarea + '">' + datos[i].titulo + '</option>');
        }
      }, 'json');
    }
  };
});

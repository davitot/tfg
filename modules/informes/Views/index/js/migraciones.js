$(document).ready(function()
{
  var refrescar = function (){
    var comunidad = '&comunidad=' + $("#comunidad").val();
    $.post(_root_ + 'informes/index/paginacionMigraciones', comunidad, function (data) {
        $("#refrescar").html('');
        $("#refrescar").html(data);
    });
  }

  $("#comunidad").change(function () {
      refrescar();
  });

  $("#limpiarComunidad").click(function () {
    //Limpiamos todos los filtros
    document.getElementById('comunidad').options[0].selected = true;
    refrescar();
  });

});

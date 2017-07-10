$(document).ready(function()
{
  var refrescar = function (){
    var mes = '&mes=' + $("#mes").val();
    $.post(_root_ + 'informes/index/paginacionInciAbiertas', mes, function (data) {
        $("#refrescar").html('');
        $("#refrescar").html(data);
    });
  }

  var refrescarIndex = function (){
    var year = '&year=' + $("#year").val();
    var estado = '&estado=' + $("#estado").val();
    var tipo = '&tipo=' + $("#tipo").val();

    $.post(_root_ + 'informes/index/paginacionIndex', year + estado + tipo, function (data) {
        $("#refrescar").html('');
        $("#refrescar").html(data);
    });
  }

  $("#year").datepicker( {
    format: "yyyy",
    viewMode: "years",
    minViewMode: "years"
  }).on('changeDate', function(e){
    $(this).datepicker('hide');
  });

  $("#year").change(function () {
      refrescarIndex();
  });

  $("#estado").change(function () {
    refrescarIndex();
  });

  $("#tipo").change(function () {
    refrescarIndex();
  });


  $("#limpiarYear").click(function () {
    //Limpiamos todos los filtros
    document.getElementById('year').value='2016';
    document.getElementById('estado').options[0].selected = true;
    document.getElementById('tipo').options[0].selected = true;
    refrescarIndex();
  });

  $("#limpiarMes").click(function () {
    //Limpiamos todos los filtros
    document.getElementById('mes').value='';
    refrescar();
  });

});

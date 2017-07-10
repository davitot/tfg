$(document).ready(function () {
  var data= [];

  for(var i=0;i<totales.length;i++)
  {
    data[i]={provincias: totales[i]['provincia'], realizadas: totales[i]['realizadas'] , pendientes: totales[i]['pendientes']};

  }
  Morris.Bar({
    // ID of the element in which to draw the chart.
    element: 'grafico',
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    data: data,
    // The name of the data record attribute that contains x-values.
    xkey: 'provincias',
    // A list of names of data record attributes that contain y-values.
    ykeys: ['realizadas', 'pendientes'],
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ['Realizadas', 'Pendientes'],
    fillOpacity: 0.6,
    hideHover: 'auto',
    behaveLikeLine: true,
    resize: false,
    pointFillColors:['#ffffff'],
    pointStrokeColors: ['black'],
    barColors: function(row, series, type) {
      if(series.key == 'pendientes')
      {
        return "red";
      }
      else
      {
        return "green";
      }
    }
  });
});

function limpiar($elemento) {
  var d = document.getElementById("$elemento");
  while (d.hasChildNodes())
  d.removeChild(d.firstChild);
}

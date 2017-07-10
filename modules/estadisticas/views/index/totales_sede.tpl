<link href="{$_layoutParams.root}modules/estadisticas/views/index/css/estilosEstadisticas.css" rel="stylesheet" type="text/css" />

<script>
{if isset($resultados)}
var totales = {$resultados|json_encode};
{/if}
</script>
<div class="row">
  <!-- header -->
  <div class="col-md-6 col-md-push-3" >
    <div class="page-header">
      <h4>Totales por Sede</h4>
      <h4></h4>
    </div>
  </div>
  <!-- header -->
</div>

<div class="container-fluid">
  <br>
  <div class="row">
    <div class="col-md-11">
      <div class"row">
        <div class="container">
          <div class="row">
            <!-- Botones -->
            <div  class="col-xs-4 col-sm-4 col-md-4 text-left">
              <a href="{$_layoutParams.root}estadisticas" type="button" class="btn btn-primary">Comunidades</a>
              <a href="{$_layoutParams.root}estadisticas/index/totales_provincias" type="button" class="btn btn-primary">Provincias</a>
              <a href="{$_layoutParams.root}estadisticas/index/totales_sedes" type="button" class="btn btn-primary disabled">Sedes</a>
            </div>
          </div>
            <!-- /Botones -->
            <!-- Grafico -->
            <div class"row">
              <div  class="col-xs-7 col-sm-9 col-md-10" style="max-width: 900px;">
                <div id="grafico"></div>
              </div>
              <!-- /Grafico -->
              <br/><br/>
              <!-- Leyenda -->
              <div  class="col-xs-5 col-sm-3 col-md-2 text-center">
                <div class="recuadro">
                  <label class="label" Style="background-color: none;color: black;">&nbsp;&nbsp;&nbsp;&nbsp;Leyenda&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                  <label class="label" Style="background-color: green;">&nbsp;&nbsp;&nbsp;&nbsp;Realizadas&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                  <label class="label" Style="background-color: red;">&nbsp;&nbsp;&nbsp;&nbsp;Pendientes&nbsp;&nbsp;&nbsp;&nbsp;</label><br/>
                </div>
              </div>
              <!-- /Leyenda -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

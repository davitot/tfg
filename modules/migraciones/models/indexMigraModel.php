<?php

class indexMigraModel extends Model {

  /**
  * Constructor por defecto de la clase
  */
  public function __construct() {
    parent::__construct();
    Session::tiempo();
  }

  /**
  * obtiene el total de registros de la tabla migraciones.
  * @return type array
  */
  public function getMigraciones($condicion = false) {
    $migraciones = $this->_db->query("select *, (select nombre from personal where personal.idPersonal = migraciones.idTecnico) as tecnico from migraciones where idMigracion is not null $condicion order BY " .
    "comunidad, provincia, desc_sede, organo, tipo, apellidos, nombre");
    return $migraciones->fetchAll();
  }

  /**
  * Devuelve los datos de una migracion para su edicion
  * @param type $idMigracion
  * @param type $condicion
  * @return type
  */
  public function getMigracion($idMigracion, $condicion = false) {
    $migraciones = $this->_db->query("select * from migraciones where idMigracion = $idMigracion $condicion ");
    return $migraciones->fetch();
  }

  /**
  * Obtiene los totales de realizadas, pendientes y no aplica por comunidad,
  * provincia y sede
  * @param type $condicion
  * @return type
  */
  public function getResultados($condicion = false) {

    $auxResultados = $this->_db->query("select * from informe_migraciones where comunidad!='' $condicion order BY " .
    "comunidad, provincia, sede, organo");
    $resultados = $auxResultados->fetchAll();
    return $resultados;
  }

  /**
  * Devuelve el total de realizadas por com->prov->sede->tecnico
  * @return type
  */
  public function getRealizadas() {
    $auxRealizadas = $this->_db->query("select comunidad, sum(realizadas) as realizadas from migraciones_realizadas group by comunidad order by comunidad");
    $realizadas = $auxRealizadas->fetchAll();
    return $realizadas;
  }

  /**
  * Devuelve el total de pendientes por com->prov->sede->tecnico
  * @return type
  */
  public function getPendientes() {
    $auxPendientes = $this->_db->query("select comunidad, sum(Pendientes) as pendientes from migraciones_pendientes group by comunidad order by comunidad");
    $pendientes = $auxPendientes->fetchAll();
    return $pendientes;
  }

  /**
  * Devuelve el total de no aplica por com->prov->sede->tecnico
  * @return type
  */
  public function getNoaplica() {
    $auxNoaplica = $this->_db->query("select comunidad, sum(No_aplica)as no_aplica from migraciones_noaplica group by comunidad order by comunidad");
    $noAplica = $auxNoaplica->fetchAll();
    return $noAplica;
  }

  /**
  * Devuelve la cantidad de registros con realizadas, pendientes o no aplica
  * que tienen algun organo con algun estado mayor de cero.
  * @param type $condicion
  * @return type
  */
  public function getContadorResultados($condicion = false) {
    $contador = $this->_db->query("select count(comunidad) from informe_migraciones where comunidad != '' $condicion");
    $auxContador = $contador->fetch();
    return $auxContador[0];
  }

  public function getTareasCombo($idTecnico) {
    try {
      $sql = "select * from listado_tareas where idPersonal=$idTecnico " .
      "order by fecha_Inicio";

      $auxTareas = $this->_db->query($sql);
      $tar = $auxTareas->fetchAll();
      print_r("getTareasComboModel:" . $tar[0]['idTarea']);
      print_r("getTareasComboModel:" . $tar[1]['idTarea']);
      exit();
      return $tar;
    } catch (Exception $e) {
      $this->_db->rollBack();
      echo $e->getMessage();
    }
  }

  /**
  * Devuelve las comunidades que tienen algun organo insertado en migraciones.
  * @return type
  */
  public function getComunidades($idTecnico=false) {
    $condicion='';

    if($idTecnico && Session::get('level')>2){
      $condicion.= " AND idTecnico = '$idTecnico'";
    }
    $auxComunidad = $this->_db->query("select distinct comunidad from migraciones where idMigracion is not null $condicion order by comunidad");
    $comunidades = $auxComunidad->fetchAll();
    return $comunidades;
  }

  /**
  * Devuelve las provincias que tienen algun organo insertado en migraciones.
  * @return type
  */
  public function getProvincias($condicion = false) {
    $auxProvincias = $this->_db->query("select distinct provincia from informe_migraciones where provincia is not NULL $condicion order by provincia");
    $provincias = $auxProvincias->fetchAll();
    return $provincias;
  }

  /**
  * Devuelve las sedes que tienen algun organo insertado en migraciones.
  * @return type
  */
  public function getSedes($condicion = false) {
    $auxSedes = $this->_db->query("select distinct sede from informe_migraciones where sede is not NULL $condicion  order by sede");
    $sedes = $auxSedes->fetchAll();
    return $sedes;
  }

  /**
  * Devuelve to total de registros que hay en la tabla migraciones
  * @param type $condicion
  * @return type
  */
  public function getRegistros($condicion = false) {
    $contador = $this->_db->query("select count(idMigracion) from migraciones where idMigracion > 0 $condicion");
    $auxContador = $contador->fetch();
    return $auxContador[0];
  }

  /**
  * Devuelve los procesos insertados en migraciones.
  * @return type
  */
  public function getProcesos() {
    $migraciones = $this->_db->query("SELECT distinct proceso FROM migraciones order by proceso");
    return $migraciones->fetchAll();
  }

  /**
  * Devuelve los totales realizados por un tecnico agrupados por comunidad
  * @param type $condicion
  * @return type
  */
  public function getTotalesXcomu($condicion = false) {
    $totales = $this->_db->query("select * from migraciones_tecnicoxcomunidad where totales > 0 $condicion");
    $auxTotales = $totales->fetchall();
    return $auxTotales;
  }

  /**
  * Obtiene las tareas segun la jerarquia de cargos
  * @param type $idPersonal
  * @param type $level
  * @return type
  */
  public function getTareasTecnico($idPersonal, $level, $condicion= false) {
    try {
      switch ($level) {

        case 1:
        //Es jefe de proyecto y puede ver todo
        $sql = "select * from listado_tareas where idTarea is not null AND activa= 1 $condicion" .
        "order by comunidad, fecha_Inicio, idCargo, tecnico";
        break;

        case 2:
        //Es un jefe de equipo lo suyo y los tecnicos de migracion (level 5)
        $sql = "select * from listado_tareas " .
        "where (idCargo = '2' OR idCargo = '5') $condicion" .
        "order by comunidad, fecha_Inicio, idCargo, tecnico";
        break;

        default :
        //Es un cargo que solo puede ver sus tareas
        $sql = "select * from listado_tareas " .
        "where idPersonal = '$idPersonal' $condicion" .
        "order by comunidad, fecha_Inicio, idCargo, tecnico";
        break;
      }
      //  print_r($sql . '  /////////////////////////////////');
      $auxTareas = $this->_db->query($sql);
      $tar = $auxTareas->fetchAll();
      /*print_r($tar);
      exit();*/
      return $tar;
    } catch (Exception $e) {
      $this->_db->rollBack();
      echo $e->getMessage();
    }
  }

  /**
  * Inserta una serie de registros en la tabla migraciones.
  * @param type $migraciones
  */
  public function insertarMigracion($migraciones) {

    try {
      for ($i = 1; $i <= count($migraciones); $i++) {
        //Validamos para no repetir registros
        $validar = $this->validaMigracion($migraciones[$i]['idLotus']);

        if ($validar) {
          $stmt = $this->_db->prepare("INSERT INTO migraciones (proceso, tipo, nif, nombre, apellidos, cargo, " .
          "vip, organo, comunidad, provincia, desc_sede, telefono, direccion, traveler, servidorNotes, " .
          "password, idLotus, correoNotes, fecha_Planificada, fecha_Inicio, fecha_Fin, estado_inicial, estado_final, observaciones, incidencia)" .
          " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
          $lista = array(
            $migraciones[$i]['proceso'],
            $migraciones[$i]['tipo'],
            $migraciones[$i]['nif'],
            $migraciones[$i]['nombre'],
            $migraciones[$i]['apellidos'],
            $migraciones[$i]['cargo'],
            $migraciones[$i]['vip'],
            $migraciones[$i]['organo'],
            $migraciones[$i]['comunidad'],
            $migraciones[$i]['provincia'],
            $migraciones[$i]['desc_sede'],
            $migraciones[$i]['telefono'],
            $migraciones[$i]['direccion'],
            $migraciones[$i]['traveler'],
            $migraciones[$i]['servidorNotes'],
            $migraciones[$i]['password'],
            $migraciones[$i]['idLotus'],
            $migraciones[$i]['correonotes'],
            $migraciones[$i]['fecha_Planificada'],
            $migraciones[$i]['fecha_Inicio'],
            $migraciones[$i]['fecha_Fin'],
            $migraciones[$i]['estado_inicial'],
            $migraciones[$i]['estado_final'],
            $migraciones[$i]['observaciones'],
            $migraciones[$i]['incidencia']
          );
          $stmt->execute($lista);
        }
      }
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  /**
  *
  **/
  public function editarMigracion($idMigracion, $idTecnico, $estadoInicial, $estadoFinal, $fechaInicio, $fechaFin, $observaciones) {
    try {
      $idMigracion = (int) $idMigracion;
      $idTecnico = (int) $idTecnico;
      $estadoInicial = (string) $estadoInicial;
      $estadoFinal = (string) $estadoFinal;
      $fechaInicio = (string) $fechaInicio;
      $fechaFin = (string) $fechaFin;
      $observaciones = (string) $observaciones;

      if($estadoInicial == "REALIZADA" && $estadoFinal == "REALIZADA"){
        $fechaFin= null;
      }

      if($fechaFin == '0000-00-00' || $fechaFin == '' || $fechaInicio == '0000-00-00' || $fechaInicio == '' || $estadoInicial == "PENDIENTE" || $estadoFinal == "PENDIENTE"){
        $fechaFin = null;
      }

      /*if($fechaInicio == '0000-00-00' || $fechaInicio == ''){
        $fechaInicio = null;
      }*/

      $this->_db->prepare("update migraciones set idTecnico = :idTecnico, fecha_Inicio = :fechaInicio, fecha_Fin = :fechaFin, " .
      "estado_inicial = :estadoInicial, estado_final = :estadoFinal, observaciones = :observaciones " .
      "WHERE idMigracion=:idMigracion; ")
      ->execute(
      array(
        ':idMigracion' => $idMigracion,
        ':idTecnico' => $idTecnico,
        ':estadoInicial' => $estadoInicial,
        ':estadoFinal' => $estadoFinal,
        ':fechaInicio' => $fechaInicio,
        ':fechaFin' => $fechaFin,
        ':observaciones' => $observaciones
      ));
    } catch (Exception $e) {
      $this->_db->rollBack();
      echo $e->getMessage();
    }
  }

  /**
  * Verifica si ya existe el usuario para no duplicar
  * @param type $idLotus
  * @return boolean
  */
  public function validaMigracion($idLotus) {
    $migracion = $this->_db->query("select count(idLotus) from migracion where idLotus = '$idLotus'");
    if ($migracion > 0) {
      return false;
    }
    return true;
  }

  /**
  * Vuelca un listado de usuarios segun una plantilla en excel
  * @return boolean
  */
  public function cargarDatos($fichero) {
    $nombreArchivo = $fichero;
    // Cargo la hoja de cálculo
    $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);

    //Asigno la hoja de calculo activa
    $objPHPExcel->setActiveSheetIndex(0);
    //Obtengo el numero de filas del archivo
    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

    $informacion[] = [];
    //Contador de elementos cargados en el array
    $j = 0;

    for ($i = 1; $i <= $numRows; $i++) {
      $informacion[$j] = array(
        'proceso' => $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue(),
        'tipo' => $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue(),
        'nif' => $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue(),
        'nombre' => $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue(),
        'apellidos' => $objPHPExcel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue(),
        'cargo' => $objPHPExcel->getActiveSheet()->getCell('I' . $i)->getCalculatedValue(),
        'vip' => $objPHPExcel->getActiveSheet()->getCell('J' . $i)->getCalculatedValue(),
        'organo' => $objPHPExcel->getActiveSheet()->getCell('K' . $i)->getCalculatedValue(),
        'comunidad' => $objPHPExcel->getActiveSheet()->getCell('L' . $i)->getCalculatedValue(),
        'provincia' => $objPHPExcel->getActiveSheet()->getCell('M' . $i)->getCalculatedValue(),
        'desc_sede' => $objPHPExcel->getActiveSheet()->getCell('N' . $i)->getCalculatedValue(),
        'telefono' => $objPHPExcel->getActiveSheet()->getCell('P' . $i)->getCalculatedValue(),
        'direccion' => $objPHPExcel->getActiveSheet()->getCell('Q' . $i)->getCalculatedValue(),
        'traveler' => $objPHPExcel->getActiveSheet()->getCell('T' . $i)->getCalculatedValue(),
        'servidorNotes' => $objPHPExcel->getActiveSheet()->getCell('U' . $i)->getCalculatedValue(),
        'password' => $objPHPExcel->getActiveSheet()->getCell('V' . $i)->getCalculatedValue(),
        'idLotus' => $objPHPExcel->getActiveSheet()->getCell('Y' . $i)->getCalculatedValue(),
        'correonotes' => $objPHPExcel->getActiveSheet()->getCell('Z' . $i)->getCalculatedValue(),
        'fecha_Planificada' => $objPHPExcel->getActiveSheet()->getCell('AB' . $i)->getCalculatedValue(),
        'fecha_Inicio' => $objPHPExcel->getActiveSheet()->getCell('AS' . $i)->getCalculatedValue(),
        'fecha_Fin' => $objPHPExcel->getActiveSheet()->getCell('AT' . $i)->getCalculatedValue(),
        'estado_inicial' => $objPHPExcel->getActiveSheet()->getCell('AU' . $i)->getCalculatedValue(),
        'estado_final' => $objPHPExcel->getActiveSheet()->getCell('AV' . $i)->getCalculatedValue(),
        'observaciones' => $objPHPExcel->getActiveSheet()->getCell('AW' . $i)->getCalculatedValue(),
        'incidencia' => $objPHPExcel->getActiveSheet()->getCell('AX' . $i)->getCalculatedValue()
      );
      $j = $j + 1;
    }
    //El primer elemento es la cabecera
    unset($informacion[0]);
    $this->insertarMigracion($informacion);
    return true;
  }

}

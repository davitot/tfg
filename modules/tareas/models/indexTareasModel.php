<?php

class indexTareasModel extends Model {

    /**
     * Contructor de la clase por defecto
     */
    public function __construct() {
        parent::__construct();
        Session::tiempo();
    }

    /**
     * Obtiene todas las tareas del sistema
     * @return type array
     */
    public function getTareas($condicion = false) {
        try {
            $auxTareas = $this->_db->query("select * from listado_tareas where activa !=2 $condicion" .
                    " order by fecha_inicio");
            $tar = $auxTareas->fetchAll();
            return $tar;
        } catch (Exception $e) {
            $this->_db->rollBack();
            echo $e->getMessage();
        }
    }

    /**
     * Obtiene el detalle de una tarea
     * @param type $idTarea
     * @return type
     */
    public function getTarea($idTarea) {
        try {
            $sql = "select * from listado_tareas " .
                    "where idTarea = '$idTarea'";
            $auxTarea = $this->_db->query($sql);
            $tar = $auxTarea->fetch();
            return $tar;
        } catch (Exception $e) {
            $this->_db->rollBack();
            echo $e->getMessage();
        }
    }

    /**
     * Obtiene las tareas segun la jerarquia de cargos
     * @param type $idPersonal
     * @param type $level
     * @return type
     */
    public function getTareasTecnico($level = false) {
        try {
            switch ($level) {

                case 1:
                    //Es jefe de proyecto y puede ver todo
                    $sql = "select * from listado_tareas " .
                            "order by fecha_Inicio, idCargo, tecnico";
                    break;

                case 2:
                    //Es un jefe de equipo lo suyo y los tecnicos de migracion (level 5)
                    $sql = "select * from listado_tareas " .
                            "where (idCargo = '2' OR idCargo = '5') " .
                            "order by fecha_Fin, fecha_Inicio, idCargo, tecnico";
                    break;

                default :
                    //Es un cargo que solo puede ver sus tareas              
                    $idPersonal = Session::get('id_usuario');
                    $sql = "select * from listado_tareas " .
                            "where idPersonal = '$idPersonal' " .
                            "order by fecha_Inicio, idCargo, tecnico";
                    break;
            }

            $auxTareas = $this->_db->query($sql);
            $tar = $auxTareas->fetchAll();
            return $tar;
        } catch (Exception $e) {
            $this->_db->rollBack();
            echo $e->getMessage();
        }
    }

    public function getTareasCombo($idTecnico) {
        try {

            $sql = "select * from listado_tareas where idTecnico=$idTecnico " .
                    "order by fecha_Inicio, idCargo, tecnico";

            $auxTareas = $this->_db->query($sql);
            $tar = $auxTareas->fetchAll();
            return $tar;
        } catch (Exception $e) {
            $this->_db->rollBack();
            echo $e->getMessage();
        }
    }

    /**
     * Obtiene el personal dado de alta que tiene tareas asignadas
     * @return type
     */
    public function getTecnicos($condicion= false) {
        $auxTecnicos = $this->_db->query("select distinct p.idPersonal, p.nombre from personal p, personal_has_tareas pht where p.idPersonal in (Select pht.idPersonal) $condicion order by idCargo");
        $tec = $auxTecnicos->fetchAll();
        return $tec;
    }

    /**
     * Obtiene las comunidades con migraciones cargadas.
     */
    public function getComunidades() {
        $auxComunidades = $this->_db->query("select distinct comunidad from migraciones order by comunidad");
        $comunidades = $auxComunidades->fetchAll();
        return $comunidades;
    }

    /**
     * Obtiene las Provincias en funcion de su comunidad con migraciones cargadas.
     */
    public function getProvincias($comunidad) {
        $auxProvincia = $this->_db->query("select distinct provincia from migraciones where comunidad= '$comunidad' order by provincia");
        $provincias = $auxProvincia->fetchAll();
        return $provincias;
    }

    /**
     * Obtiene las Provincias en funcion de su comunidad con migraciones cargadas.
     */
    public function getSedes($provincia) {
        $auxProvincia = $this->_db->query("select distinct desc_sede from migraciones where provincia= '$provincia' order by provincia");
        $provincias = $auxProvincia->fetchAll();
        return $provincias;
    }

    /**
     * 
     * @param type $sede
     * @return type
     */
    public function getOrganos($sede) {
        $auxOrganos = $this->_db->query("select distinct organo from migraciones where desc_sede= '$sede' order by organo");
        $organos = $auxOrganos->fetchAll();
        return $organos;
    }

    /**
     * Obtiene los tecnicos segun el cargo del usuario logeado
     * @param type $tipo
     * @return type
     */
    public function getTecnicosCombo($tipo) {
        try {
            switch ($tipo) {
                case 'Gestion':
                    $condicion = "AND (idCargo ='2' OR idCargo ='1')";
                    break;
                case 'Administracion':
                    $condicion = "AND idCargo ='3'";
                    break;
                case 'Soporte':
                    $condicion = "AND idCargo ='4'";
                    break;
                case 'Migracion':
                    $condicion = "AND (idCargo ='5' OR idCargo='2')";
                    break;
                default :
                    break;
            }

            $ciudades = $this->_db->query(
                    "select * from personal where activo = 1 $condicion"
            );

            $ciudades->setFetchMode(PDO::FETCH_ASSOC);
            return $ciudades->fetchAll();
        } catch (Exception $e) {
            $this->_db->rollBack();
            echo $e->getMessage();
        }
    }

    /**
     * Devuelbe las tareas abiertas por tecnico logeado y no finalizadas
     * @param type $idPersonal
     * @return type
     */
    public function getTareasAbiertasTecnico($idPersonal) {
        $auxTareas = $this->_db->query("select * from listado_tareas where idPersonal = '$idPersonal'" .
                "and activa = '1'"
        );
        $tar = $auxTareas->fetchAll();
        return $tar;
    }

    /**
     * Devuelve los tipos de tareas para carga de combos
     * @return type
     */
    public function getTiposTarea() {
        $auxTipos = $this->_db->query("select descripcion from tipos_tarea"
        );
        $tipos = $auxTipos->fetchAll();
        return $tipos;
    }

    /**
     * Retorna si una tarea está activa o no
     * @param type $idTarea
     * @return type
     */
    public function isActiva($idTarea) {
        $auxTareas = $this->_db->query("select gestionada from tareas where idtarea='$idTarea' AND gestionada='0'"
        );
        $tar = $auxTareas->fetch();
        return $tar;
    }

    /**
     * Inserta en la base de datos de union el idPersonal e idTarea
     * @param type $auxIdPersonal
     * @param type $auxIdTarea
     */
    public function asignarTareaPersonal($auxIdPersonal, $auxIdTarea) {
        try {
            $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->_db->beginTransaction();
            $idPersonal = (int) $auxIdPersonal;
            $idTarea = (int) $auxIdTarea;

            $this->_db->prepare("INSERT INTO personal_has_tareas (idPersonal, idTarea)" .
                    " VALUES (:idPersonal, :idTarea)")->execute(
                    array(
                        ':idPersonal' => $idPersonal,
                        ':idTarea' => $idTarea,
            ));
            $this->_db->commit();
        } catch (Exception $e) {
            $this->_db->rollBack();
            echo $e->getMessage();
        }
    }

    /**
     * Inserta en la base de datos de union el idPersonal e idTarea
     * @param type $auxIdPersonal
     * @param type $auxIdTarea
     */
    public function asignarTecnicoMigracion($auxIdPersonal, $auxIdTarea, $fechaPlanificada, $comunidad, $provincia, $sede, $organo) {
        try {
            $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->_db->beginTransaction();
            $idTecnico = (int) $auxIdPersonal;
            $idTarea = (int) $auxIdTarea;


            $this->_db->prepare("UPDATE migraciones SET idTecnico = :idTecnico, idTarea = :idTarea, fecha_Planificada = :fechaPlanificada " .
                    "WHERE comunidad = :comunidad and provincia = :provincia and desc_sede = :sede and organo = :organo;")->execute(
                    array(
                        ':idTecnico' => $idTecnico,
                        ':idTarea' => $idTarea,
                        ':fechaPlanificada' => $fechaPlanificada,
                        ':comunidad' => $comunidad,
                        ':provincia' => $provincia,
                        ':sede' => $sede,
                        ':organo' => $organo
            ));
            $this->_db->commit();
            $this->asignarTareaPersonal($idTecnico, $idTarea);
        } catch (Exception $e) {
            $this->_db->rollBack();
            echo $e->getMessage();
        }
    }

    /**
     * Inserta una nueva tarea
     * @param type $titulo
     * @param type $tipo
     * @param type $idPersonal
     * @param type $descripcion
     * @param type $fechaInicio
     */
    public function nuevaTarea($titulo, $tipo, $idPersonal, $idCargo, $descripcion, $fechaInicio, $guardia, $noServicio, $comunidad, $provincia, $sede, $organo) {
        try {
            $this->_db->prepare("INSERT INTO tareas (tipo, idPersonal_P, idCargo_C, titulo, descripcion, fecha_inicio, guardia, noServicio, comunidad, provincia, sede, organo) " .
                    "VALUES (:tipo, :idPersonal_P, :idCargo_C, :titulo,  :descripcion, :fecha_inicio, :guardia, :noServicio, :comunidad, :provincia, :sede, :organo)")->execute(
                    array(
                        ':tipo' => $tipo,
                        ':idPersonal_P' => $idPersonal,
                        ':idCargo_C' => $idCargo,
                        ':titulo' => $titulo,
                        ':descripcion' => $descripcion,
                        ':fecha_inicio' => $fechaInicio,
                        ':guardia' => $guardia,
                        ':noServicio' => $noServicio,
                        ':comunidad' => $comunidad,
                        ':provincia' => $provincia,
                        ':sede' => $sede,
                        ':organo' => $organo
            ));

            $auxUltimaT = $this->_db->query("select MAX(idTarea) from tareas");
            $ultimaT = $auxUltimaT->fetch();
            $this->asignarTecnicoMigracion($idPersonal, $ultimaT[0], $fechaInicio, $comunidad, $provincia, $sede, $organo);
        } catch (Exception $e) {
            $this->_db->rollBack();
            echo $e->getMessage();
        }
    }

    /**
     * Edita una tarea
     * @param type $auxIdTarea
     * @param type $descripcion
     * @param type $fechaInicio
     * @param type $fechaFin
     * @param int $gestionada
     */
    public function editarTarea($auxIdTarea, $titulo, $tipo, $tecnico, $descripcion, $fechaInicio, $fechaFin, $activa, $guardia, $noServicio, $comunidad, $provincia, $sede, $organo) {
        try {
            $idTarea = (int) $auxIdTarea;
            $auxIdCargo = $this->_db->query("select idCargo from personal where idPersonal='$tecnico' AND activo='1'");
            $idCargo = $auxIdCargo->fetch();

            if ($activa == 1) {
                $fechaFin = null;
            }

            $this->_db->prepare("UPDATE tareas SET tipo = :tipo," .
                            " idPersonal_P = :idPersonal_P, idCargo_C = :idCargo_C, titulo = :titulo, descripcion = :descripcion, " .
                            "fecha_inicio=:fechaInicio, fecha_fin=:fechaFin, activa=:activa, guardia=:guardia," .
                            " noServicio=:noServicio, comunidad=:comunidad, provincia=:provincia, sede=:sede, organo=:organo " .
                            "WHERE idtarea=:idTarea;")
                    ->execute(
                            array(
                                ':idTarea' => $idTarea,
                                ':tipo' => $tipo,
                                ':titulo' => $titulo,
                                ':idPersonal_P' => $tecnico,
                                ':idCargo_C' => $idCargo[0],
                                ':descripcion' => $descripcion,
                                ':fechaInicio' => $fechaInicio,
                                ':fechaFin' => $fechaFin,
                                ':activa' => $activa,
                                ':guardia' => $guardia,
                                ':noServicio' => $noServicio,
                                ':comunidad' => $comunidad,
                                ':provincia' => $provincia,
                                ':sede' => $sede,
                                ':organo' => $organo
            ));
            $this->asignarTecnicoMigracion($tecnico, $idTarea, $fechaInicio, $comunidad, $provincia, $sede, $organo);
        } catch (Exception $e) {
            $this->_db->rollBack();
            echo $e->getMessage();
        }
    }

    /**
     * Da de baja una tarea
     * Dar de baja implica eliminar la tarea de la bbdd.
     * @param type $auxId
     * @param type $auxIdCargo
     */
    public function eliminarTarea($auxIdTarea, $auxIdPersonal) {
        try {
            $idTarea = (int) $auxIdTarea;
            $idPersonal = (int) $auxIdPersonal;

            $resultado1 = $this->_db->query("DELETE FROM personal_has_tareas WHERE idtarea = $idTarea AND idPersonal= $idPersonal");

            $resultado2 = $this->_db->query("DELETE FROM tareas WHERE idtarea = $idTarea");

            if (!$resultado1 || !$resultado2) {
                return false;
            }
            return true;
        } catch (Exception $e) {
            $this->_db->rollBack();
            echo $e->getMessage();
        }
    }

}

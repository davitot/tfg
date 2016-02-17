<?php

class pdfModel extends Model {

    private $_pdf;

    /**
     * Contructor de la clase por defecto
     */
    public function __construct() {
        parent::__construct();
        //Session::tiempo();
    }

    /**
     * Muestra el informe de una tarea concreta.
     * @param type $migraciones
     */
    public function generarInformeTarea($migraciones) {
        //Orientacion, medida, tamaño pagina
        $this->_pdf = new FPDF('L', 'mm', 'A4');
        $this->_pdf->AddPage();
        $this->Header();
        $this->TituloArchivo('Tarea Migracion', '12/02/2016', $migraciones[0]['comunidad'] . ' - ' . $migraciones[0]['provincia'] . ' - ' . $migraciones[0]['desc_sede']);
        $this->TablaTareaTecnico($migraciones);
        $this->_pdf->Output('listadoTarea.pdf', 'I');
    }

    /**
     * Muestra el listado de Estado
     * @param type $migraciones
     */
    public function generarInformeEstado($migraciones) {
        //Orientacion, medida, tamaño pagina
        $this->_pdf = new FPDF('L', 'mm', 'A4');
        $this->_pdf->AddPage();
        $this->Header();
        $this->TituloArchivo('Informe Estado Migraciones', false, false);
        $this->TablaResultadosEstado($migraciones);
        $this->_pdf->Output('pdf1.pdf', 'I');
    }

    /**
     * Tabla totales de tareas registradas
     * @param type $tareas
     */
    public function generarInformesTareas($tareas) {
        //Orientacion, medida, tamaño pagina
        $this->_pdf = new FPDF('L', 'mm', 'A4');
        $this->_pdf->AddPage();
        $this->Header();
        $this->TituloArchivo('Informe Tareas', false, false);
        $this->TablaResultadosTareas($tareas);
        $this->_pdf->Output('listadoTareas.pdf', 'I');
    }

    /**
     *  Titulo del listado
     * @param type $titulo
     * @param type $fecha
     * @param type $organo
     */
    function TituloArchivo($titulo = false, $fecha = false, $organo = false) {
        $this->posicionar(0.5, 27);
        //Arial 12        
        $this->_pdf->SetFont('Arial', '', 12);
        //Color de fondo
        $this->_pdf->SetFillColor(200, 220, 255);
        //Título        
        $this->_pdf->Cell(0, 6, utf8_decode($titulo), 0, 1, 'L', true);

        if (isset($fecha) && $fecha) {
            $this->posicionar(0.80, 33);
            $this->_pdf->SetFont('Arial', '', 10);
            $this->_pdf->Cell(0, 6, utf8_decode(" Fecha: $fecha"), 0, 1, 'L', true);
        }
        if (isset($organo) && $organo) {
            $this->_pdf->SetFont('Arial', '', 10);
            $this->_pdf->SetFillColor(200, 220, 255);
            $this->_pdf->Cell(0, 6, utf8_decode(" Sede: $organo"), 0, 1, 'L', false);
        }
    }

    private function posicionar($derecha, $abajo) {
        $this->_pdf->SetY($derecha);
        $this->_pdf->Ln($abajo);
    }

    /**
     * Muestra la tarea asignada a un tecnico de migracion
     * @param type $tareas
     */
    private function TablaTareaTecnico($migraciones) {
        $this->_pdf->SetY(46);
        //Colores, ancho de línea y fuente en negrita
        $this->_pdf->SetFillColor(176, 176, 176);
        $this->_pdf->SetTextColor(255);
        $this->_pdf->SetDrawColor(97, 97, 97);
        $this->_pdf->SetLineWidth(.3);
        $this->_pdf->SetFont('Arial', 'B', 8);
        //Cabecera
        $this->_pdf->Cell(15, 5, 'Tipo', 1, 0, 'C', 1);
        $this->_pdf->Cell(60, 5, 'Nombre', 1, 0, 'C', 1);
        $this->_pdf->Cell(41.5, 5, 'Cargo', 1, 0, 'C', 1);
        $this->_pdf->Cell(20, 5, 'Traveler', 1, 0, 'C', 1);
        $this->_pdf->Cell(20, 5, 'Estado', 1, 0, 'C', 1);
        $this->_pdf->Cell(20, 5, 'Finalizada', 1, 0, 'C', 1);
        $this->_pdf->Cell(100, 5, 'Observaciones', 1, 0, 'C', 1);

        $this->_pdf->Ln();
        //Restauración de colores y fuentes
        $this->_pdf->SetFillColor(224, 235, 255);
        $this->_pdf->SetTextColor(0);
        $this->_pdf->SetFont('');
        //Datos
        $fill = true;
        foreach ($migraciones as $migracion) {
            if ($fill == false) {
                $fill = true;
            } else {
                $fill = false;
            }
            $this->_pdf->Cell(15, 6, utf8_decode($migracion['tipo']), 1, 0, 'C', $fill);
            $this->_pdf->Cell(60, 6, utf8_decode($migracion['nombre']) . ' ' . utf8_decode($migracion['apellidos']), 1, 0, 'L', $fill);
            $this->_pdf->Cell(41.5, 6, utf8_decode($migracion['cargo']), 1, 0, 'L', $fill);
            $this->_pdf->Cell(20, 6, $migracion['traveler'], 1, 0, 'C', $fill);
            $this->_pdf->Cell(20, 6, $migracion['estado_inicial'], 1, 0, 'C', $fill);
            $this->_pdf->Cell(20, 6, $migracion['fecha_Fin'], 1, 0, 'C', $fill);
            $this->_pdf->Cell(100, 6, $migracion['observaciones'], 1, 0, 'L', $fill);
            $this->_pdf->Ln();
        }
        $this->_pdf->Cell(276.5, 0, '', 'T');
    }

    /**
     * Muestra la tarea asignada a un tecnico de migracion
     * @param type $tareas
     */
    private function TablaResultadosTareas($tareas) {
        $this->_pdf->SetY(36);
        //Colores, ancho de línea y fuente en negrita
        $this->_pdf->SetFillColor(176, 176, 176);
        $this->_pdf->SetTextColor(255);
        $this->_pdf->SetDrawColor(97, 97, 97);
        $this->_pdf->SetLineWidth(.3);
        $this->_pdf->SetFont('Arial', 'B', 8);
        //Cabecera
        $this->_pdf->Cell(60, 5, 'Personal', 1, 0, 'C', 1);
        $this->_pdf->Cell(100, 5, 'Tarea', 1, 0, 'C', 1);
        $this->_pdf->Cell(20, 5, 'Fecha Inicio', 1, 0, 'C', 1);
        $this->_pdf->Cell(20, 5, 'Fecha Fin', 1, 0, 'C', 1);
        $this->_pdf->Cell(20, 5, 'Finalizada', 1, 0, 'C', 1);

        $this->_pdf->Ln();
        //Restauración de colores y fuentes
        $this->_pdf->SetFillColor(224, 235, 255);
        $this->_pdf->SetTextColor(0);
        $this->_pdf->SetFont('');
        //Datos
        $fill = true;
        foreach ($tareas as $tarea) {
            if ($fill == false) {
                $fill = true;
            } else {
                $fill = false;
            }
            $this->_pdf->Cell(60, 6, utf8_decode($tarea['tecnico']), 1, 0, 'L', $fill);
            $this->_pdf->Cell(100, 6, utf8_decode($tarea['titulo']), 1, 0, 'L', $fill);
            $this->_pdf->Cell(20, 6, $tarea['fecha_inicio'], 1, 0, 'C', $fill);
            $this->_pdf->Cell(20, 6, $tarea['fecha_fin'], 1, 0, 'C', $fill);
            $this->_pdf->Cell(20, 6, $tarea['activa'], 1, 0, 'C', $fill);
            $this->_pdf->Ln();
        }
        $this->_pdf->Cell(210, 0, '', 'T');
    }

    /**
     * Muestra una foto del estado en tiempo real de las migraciones
     * @param type $migraciones
     */
    private function TablaResultadosEstado($migraciones) {
        $this->_pdf->SetY(36);
        //Colores, ancho de línea y fuente en negrita        
        $this->_pdf->SetFillColor(176, 176, 176);
        $this->_pdf->SetTextColor(255);
        $this->_pdf->SetDrawColor(97, 97, 97);
        $this->_pdf->SetLineWidth(.3);
        $this->_pdf->SetFont('Arial', 'B', 8);
        //Cabecera        
        $this->_pdf->Cell(30, 5, 'Comunidad', 1, 0, 'C', 1);
        $this->_pdf->Cell(30, 5, 'Provincia', 1, 0, 'C', 1);
        $this->_pdf->Cell(30, 5, 'Sede', 1, 0, 'C', 1);
        $this->_pdf->Cell(80, 5, 'Organo', 1, 0, 'C', 1);
        $this->_pdf->Cell(15, 5, 'Pendientes', 1, 0, 'C', 1);
        $this->_pdf->Cell(15, 5, 'Realizadas', 1, 0, 'C', 1);
        $this->_pdf->Cell(15, 5, 'No Aplica', 1, 0, 'C', 1);

        $this->_pdf->Ln();
        //Restauración de colores y fuentes
        $this->_pdf->SetFillColor(224, 235, 255);
        $this->_pdf->SetTextColor(0);
        $this->_pdf->SetFont('');
        //Datos   
        $fill = true;
        $comunidad = '';
        $provincia = '';
        $sede = '';
        $antComunidad = '';
        $antProvincia = '';
        $antSede = '';
        foreach ($migraciones as $elemento) {
            if ($fill == false) {
                $fill = true;
            } else {
                $fill = false;
            }
            $antComunidad = $comunidad;
            $comunidad = $elemento['comunidad'];
            $antProvincia = $provincia;
            $provincia = $elemento['provincia'];
            $antSede = $sede;
            $sede = $elemento['sede'];

            if ($comunidad != $antComunidad) {
                $this->_pdf->Cell(30, 6, utf8_decode($elemento['comunidad']), 1, 0, 'L', $fill);
                $comunidad = $elemento['comunidad'];
            } else {
                $this->_pdf->Cell(30, 6, '', 1, 0, 'L', $fill);
            }
            if ($provincia != $antProvincia) {
                $this->_pdf->Cell(30, 6, utf8_decode($elemento['provincia']), 1, 0, 'L', $fill);
                $provincia = $elemento['provincia'];
            } else {
                $this->_pdf->Cell(30, 6, '', 1, 0, 'L', $fill);
            }
            if ($provincia != $antProvincia) {
                $this->_pdf->Cell(30, 6, utf8_decode($elemento['sede']), 1, 0, 'L', $fill);
                $sede = $elemento['sede'];
            } else {
                $this->_pdf->Cell(30, 6, '', 1, 0, 'L', $fill);
            }
            $this->_pdf->Cell(80, 6, utf8_decode($elemento['organo']), 1, 0, 'L', $fill);
            $this->_pdf->Cell(15, 6, $elemento['pendientes'], 1, 0, 'C', $fill);
            $this->_pdf->Cell(15, 6, $elemento['realizadas'], 1, 0, 'C', $fill);
            $this->_pdf->Cell(15, 6, utf8_decode($elemento['no_aplica']), 1, 0, 'C', $fill);
            $this->_pdf->Ln();
        }
        $this->_pdf->Cell(280, 0, '', 'T');
    }

    /**
     * Cabecera
     */
    private function Header() {
        $this->_pdf->Image('./public/img/logos/lotus.png', 10, 7, 15);
        $this->_pdf->SetFont('Arial', 'B', 14);
        $this->_pdf->Cell(16);
        $this->_pdf->Cell(20, 10, utf8_decode('Planificacion Tareas Migración'), 0, 0, 'L');
    }

    /*
     * Muestra el listado de los resultado del resumen.
     * 
     */

    private function TablaResultadosResumen($migraciones) {
        //Colores, ancho de línea y fuente en negrita      
        $this->_pdf->SetY(53);
        $this->_pdf->SetFillColor(176, 176, 176);
        $this->_pdf->SetTextColor(255);
        $this->_pdf->SetDrawColor(97, 97, 97);
        $this->_pdf->SetLineWidth(.3);
        $this->_pdf->SetFont('Arial', 'B', 8);

        //Cabecera        
        $i = 0;
        $total = 0;
        $totalRealizadas = 0;
        foreach ($datos as $pendientes) {
            if (isset($datos)) {
                $this->_pdf->Cell(30, 5, datos['Comunidad'], 1, 0, 'C', 1);
                $this->_pdf->Ln();
                $this->_pdf->Cell(15, 5, 'Pendientes', 1, 0, 'C', 1);
                $this->_pdf->Cell(15, 5, 'Realizadas', 1, 0, 'C', 1);
                $this->_pdf->Cell(15, 5, 'No Aplica', 1, 0, 'C', 1);
                $this->_pdf->Ln();
                $this->_pdf->Cell(15, 6, datos['pendientes'], 1, 0, 'C', $fill);
                $this->_pdf->Cell(15, 6, datos['realizadas'], 1, 0, 'C', $fill);
                $this->_pdf->Cell(15, 6, utf8_decode(datos['no_aplica']), 1, 0, 'C', $fill);

                $this->_pdf->Ln();
                //Restauración de colores y fuentes
                $this->_pdf->SetFillColor(224, 235, 255);
                $this->_pdf->SetTextColor(0);
                $this->_pdf->SetFont('');
            }
            $this->_pdf->Cell(280, 0, '', 'T');
        }
    }

    /* Pie de página
      private function Footer() {
      $this->_pdf->SetY(2);
      $this->_pdf->Setx(10);
      $this->_pdf->SetFont('Arial', 'I', 8);
      $this->_pdf->Cell(0, 10, 'Pag. ' . $this->_pdf->PageNo(), 0, 0, 'C');
      } */
}

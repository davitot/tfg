<?php

class pdfController extends Controller {
    /*
     * SetCell -> (Ancho, alto, texto, borde, donde escribe(0 dcha, 1 inicio 
     * siguiente linea, 2 debajo), aling (L, C, R), Fill(Treu, False))
     * 
     * OutPut()->[string nombre, string destino] I fichero al navegador -> guardar como
     * D listo para descarga, F guarda en local (Raiz del Proyecto. 
     * 
     */

    private $_pdf;
    private $_migraciones;

    public function __construct() {
        parent::__construct();
        $this->_pdf = $this->loadModel('pdf');        
        $this->getLibrary('pdf/fpdf');
    }

    public function index() {
        
    }

    public function generar_InformeTarea($idTecnico, $idTarea) {        
        $this->_migraciones = $this->loadModel('indexMigra', 'migraciones');       
        $condicion = ' AND idTecnico= ' . $idTecnico . ' and idTarea= ' . $idTarea;
        $migraciones = $this->_migraciones->getMigraciones($condicion);
        $this->_pdf->generarInformeTarea($migraciones);
    }
    
     public function generar_InformesTareas() {
        $_tareas= $this->loadModel('indexTareas', 'tareas');
        $tareas= $_tareas->getTareasTecnico();
        $this->_pdf->generarInformesTareas($tareas);
    }
    

    public function generar_InformeEstado() {
        $this->getLibrary('pdf/fpdf');
         $this->_migraciones = $this->loadModel('indexMigra', 'migraciones');
        $migraciones = $this->_migraciones->getResultados();
        $this->_pdf->generarInformeEstado($migraciones);
    }

}

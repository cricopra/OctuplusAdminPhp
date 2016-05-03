<?php

/*
 * SNavia
 * Playtech
 * 2013
 */

include_once(dirname(__FILE__) . '/../config/config.php');
include_once(dirname(__FILE__) . '/../init.php');
include_once (_APP_TOOL_DIR_ . "excel/ExcelReportManager.php");

class ReportExportarOficinasExcel extends ExcelReportManager {
    public function write($rcOficinas, $sbNombreExcel){
        try{
            $this->setName($sbNombreExcel);
            $this->setData($this->prepareData($rcOficinas));
            $this->setTitles(array("Id", "Title", "Ubicación", "Colaborador", "Oficina", "DIR_EST", "Telefono", "Horario de Atencion", "Latitud", "Longitud"));

            $this->writeFile();
        }
        catch(Exception $e){
            throw $e;
        }
    }
    
    private function prepareData($objData){
        $rcData = array();
        
        foreach ($objData as $objOficina) {
            $rcData[] = array(
                $objOficina['codigo'],
                "\"".$objOficina['codigo']."\"",
                "\"Colombia|".$objOficina['departamento']."|".$objOficina['ciudad']."\"",
                "\"".$objOficina['nombrecolaborador']."\"",
                "\"".$objOficina['descripcion']."\"",
                "\"".$objOficina['direccion']."\"",
                "\"".$objOficina['telefono']."\"",
                "\"".$objOficina['horario']."\"",
                "\"".$objOficina['latitud']."\"",
                "\"".$objOficina['longitud']."\""
            );
        }
        
        return $rcData;
    }
}

?>
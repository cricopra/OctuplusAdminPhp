<?php

/*
 * PlayTech
 * SNavia
 */

include_once(dirname(__FILE__) . "/../../init.php");

class ExcelReportManager {

    private $rcTitles;
    private $rcData;
    private $sbName;
    private $sbExtension;
    private $sbFileName;
    private $sbSeparator;
    private $sbEndLine;
    private $sbContentFile;
    private $sbPublicURI;

    public function __construct() {
        $this->rcTitles = array();
        $this->rcData = array();
        $this->sbName = 'report';
        $this->sbExtension = 'csv';
        $this->sbFileName = NULL;
        $this->sbSeparator = ';';
        $this->sbEndLine = chr(10) . chr(13);
    }

    public function writeFile($sbContentFile = NULL){
        try{
            $this->sbFileName = _APP_FILE_EXCEL_DIR_ . $this->sbName . '.' . $this->sbExtension;
            $this->sbPublicURI = _APP_PUBLIC_EXCEL_FILES_ . $this->sbName . '.' . $this->sbExtension;
            $this->sbName = $this->sbName . '.' . $this->sbExtension;

            $file = @fopen($this->sbFileName, 'w+');
            $this->sbContentFile = "";

            if(is_array($this->rcData) && is_array($this->rcTitles)){
                $this->sbContentFile = $this->geTitlesAsFile();
                $this->sbContentFile .= $this->getDataAsFile();
            }

            if(!empty($sbContentFile))
                $this->sbContentFile = $sbContentFile;

            fwrite($file, $this->sbContentFile);
            fclose($file);
            
            return TRUE;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    public function Output($blDeleteFile = FALSE) {
        if(empty($this->sbFileName))
            return;

        header("Content-Disposition: attachment; filename=" . $this->sbName);
        header("Content-type: application/octetstream");
        header("Content-Length: ".filesize($this->sbFileName));
        readfile($this->sbFileName);

        if($blDeleteFile)
            @unlink($this->sbFileName);
    }

    public function geTitlesAsFile(){
        $sbTitles = '';

        foreach ($this->rcTitles as $title) {
            $sbTitles .= $title . $this->sbSeparator;
        }
        $sbTitles = (sizeof($this->rcTitles)) ? substr($sbTitles, 0, -1) . $this->sbEndLine : $sbTitles;

        return $sbTitles;
    }

    public function getDataAsFile(){
        $sbData = '';

        foreach ($this->rcData as $rcDataLine) {
            if(is_array($rcDataLine)){
                foreach ($rcDataLine as $data)
                    $sbData .= $data . $this->sbSeparator;

                $sbData .= $this->sbEndLine;
            }
        }

        return $sbData;
    }

    public function checkIntegrityData($blReturn = FALSE){
        $nuColsTitles = sizeof($this->getTitles());
        $blOk = TRUE;

        foreach ($this->getData() as $rcDataLine)
            if(sizeof($rcDataLine) != $nuColsTitles){
                $blOk = FALSE;
                break;
            }

        if(!$blOk)
            if($blReturn)
                return FALSE;
            else
                Tools::dialogMsg('Error al generar reporte', 'Los t&iacute;tulos no corresponden con las columnas de datos.', TRUE);

        else
            return TRUE;
    }

    /*Getter and Setter*/
    
    public function setTitles($rcTitles = array()){
        $this->rcTitles = $rcTitles;
    }

    public function setData($rcData = array()){
        $this->rcData = $rcData;
    }

    public function setName($sbName = 'report') {
        $this->sbName = $sbName;
    }

    public function setExtension($sbExtension = 'csv') {
        $this->sbExtension = $sbExtension;
    }

    public function setSeparator($sbSeparator = ';'){
        $this->sbSeparator = $sbSeparator;
    }

    public function setEndLine($sbEndLine = '\r\n'){
        $this->sbEndLine = $sbEndLine;
    }

    public function getTitles(){
        return $this->rcTitles;
    }

    public function getData(){
        return $this->rcData;
    }

    public function getEndLine(){
        return $this->sbEndLine;
    }
    
    public function getPublicURIFile(){
        return $this->sbPublicURI;
    }
}

?>
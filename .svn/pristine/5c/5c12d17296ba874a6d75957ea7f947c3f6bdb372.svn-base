<?php

/*
 * SNavia
 * Playtech
 * 2013
 */

include_once(dirname(__FILE__) . '/../config/config.php');
include_once(dirname(__FILE__) . '/../init.php');

class ReportPromedioEntregaPDF extends PDFManager {
    public function draw($rcParams = array()){
        try{
            if (!is_array($rcParams) || !array_change_key_case($rcParams, CASE_UPPER))
                throw new InvalidArgumentException("Argumentos invalidos");
            
            $rcParams = array_change_key_case($rcParams, CASE_UPPER);
            $objData = isset($rcParams['DATA']) ? $rcParams['DATA'] : array();
            
            $this->AddPage('P');
            
            $this->Cell($this->getWidthCell() - 4, $this->getHeightCell(), 'Item', 'B', 0, 'C');
            $this->Cell($this->getWidthCell() + 111, $this->getHeightCell(), 'Usuario', 'B', 0, 'C');
            $this->Cell($this->getWidthCell() + 38, $this->getHeightCell(), 'Total Entregas / Entregas Finalizadas', 'B', 1, 'C');
            
            $nuIndex = 1;
            foreach ($objData as $nuIdUsuario => $rcData) {
                $this->Cell($this->getWidthCell() - 4, $this->getHeightCell(), $nuIndex++, 'B', 0, 'R');
                $this->Cell($this->getWidthCell() + 111, $this->getHeightCell(), Tools::CapitalizeWords($rcData['usuario']), 'B', 0, 'L');
                $this->Cell($this->getWidthCell() + 38, $this->getHeightCell(), $rcData['promedio'], 'B', 1, 'R');
            }
        
            $sbName = (isset($rcParams['NOMBRE']) ? strval($rcParams['NOMBRE']) : 'pdf') . '.pdf';
            $sbPath = _APP_FILES_DIR.'pdf/' . $sbName;
            $this->Output($sbPath, 'F');
            
            return $sbName;
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }
}

?>
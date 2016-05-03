<?php

include_once(dirname(__FILE__) . '/../config/config.php');
include_once(dirname(__FILE__) . '/../init.php');

class Trabajador extends RouteController {

    public function executeIndex() {
        try {
            global $smarty;
            
            $rcSedes = ApiSede::getByUsuario(array(), FALSE);
            $js_files = array(_APP_JS_DIR_ . 'trabajador.js');
            
            $smarty->assign(array(
                'JS_FILES' => $js_files,
                'SEDES' => array_key_exists('sedes', $rcSedes) ? $rcSedes['sedes'] : array()
            ));
            
            $smarty->display(_APP_TPL_DIR_ . 'trabajador.tpl');
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }
    
    public function executeActualizar(){
        try {
            Tools::CheckSession();
            
            return ApiTrabajador::actualizar(array(
                'id' => Tools::GetValue('Codigo', ''),
                'idSede' => Tools::GetValue('Sede', INT_NULL),
                'documento' => Tools::GetValue('Documento', ''),
                'nombres' => Tools::GetValue('Nombres', ''),
                'apellidos' => Tools::GetValue('Apellidos', ''),
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }
    
    public function executeEliminar(){
        try {
            Tools::CheckSession();
            
            return ApiTrabajador::eliminar(array(
                'id' => Tools::GetValue('Codigo', '')
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }
    
    public function executeFilter(){
        try {
            Tools::CheckSession();
            
            $rcSort = Tools::GetValue('sort', array());
                        
            return ApiTrabajador::filter(array(
                'page' => Tools::GetValue('current', 1),
                'limit' => Tools::GetValue('rowCount', 10),
                'filter' => Tools::GetValue('searchPhrase', ''),
                'sortBy' => sizeof($rcSort) ? key($rcSort) : '',
                'sortMethod' => sizeof($rcSort) ? $rcSort[key($rcSort)] : ''
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }
}

$objTrabajador = new Trabajador();
$sbAction = Tools::GetValue('action');
print($objTrabajador->execute($objTrabajador, $sbAction));
?>
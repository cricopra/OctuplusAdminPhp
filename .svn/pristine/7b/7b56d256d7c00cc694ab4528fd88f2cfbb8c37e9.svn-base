<?php

include_once(dirname(__FILE__) . '/../config/config.php');
include_once(dirname(__FILE__) . '/../init.php');

class Item extends RouteController {

    public function executeIndex() {
        try {
            global $smarty;
            
            $rcSedes = ApiSede::getByUsuario(array(), FALSE);
            $js_files = array(_APP_JS_DIR_ . 'item.js');
            
            $smarty->assign(array(
                'JS_FILES' => $js_files,
                'SEDES' => array_key_exists('sedes', $rcSedes) ? $rcSedes['sedes'] : array()
            ));
            
            $smarty->display(_APP_TPL_DIR_ . 'item.tpl');
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }
    
    public function executeActualizar(){
        try {
            Tools::CheckSession();
            
            return ApiItem::actualizar(array(
                'id' => Tools::GetValue('Codigo', ''),
                'idSede' => Tools::GetValue('Sede', INT_NULL),
                'nombre' => Tools::GetValue('Nombre', '')
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }
    
    public function executeEliminar(){
        try {
            Tools::CheckSession();
            
            return ApiItem::eliminar(array(
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
                        
            return ApiItem::filter(array(
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

$objItem = new Item();
$sbAction = Tools::GetValue('action');
print($objItem->execute($objItem, $sbAction));
?>
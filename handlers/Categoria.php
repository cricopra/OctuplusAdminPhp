<?php

include_once(dirname(__FILE__) . '/../config/config.php');
include_once(dirname(__FILE__) . '/../init.php');

class Categoria extends RouteController {

    public function executeIndex() {
        try {
            global $smarty;
            
            $rcUnidadesNegocio = ApiUnidadNegocio::getByUsuario(array(), FALSE);
            $js_files = array(_APP_JS_DIR_ . 'categoria.js');
            
            $smarty->assign(array(
                'JS_FILES' => $js_files,
                'UNIDADES_NEGOCIO' => array_key_exists('unidadesNegocio', $rcUnidadesNegocio) ? $rcUnidadesNegocio['unidadesNegocio'] : array()
            ));
            
            $smarty->display(_APP_TPL_DIR_ . 'categoria.tpl');
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }
    
    public function executeActualizar(){
        try {
            Tools::CheckSession();
            
            return ApiCategoria::actualizar(array(
                'id' => Tools::GetValue('Codigo', ''),
                'idUnidadNegocio' => Tools::GetValue('UnidadNegocio', INT_NULL),
                'nombre' => Tools::GetValue('Nombre', '')
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }
    
    public function executeEliminar(){
        try {
            Tools::CheckSession();
            
            return ApiCategoria::eliminar(array(
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
                        
            return ApiCategoria::filter(array(
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

$objCategoria = new Categoria();
$sbAction = Tools::GetValue('action');
print($objCategoria->execute($objCategoria, $sbAction));
?>
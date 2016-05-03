<?php

include_once(dirname(__FILE__) . '/../config/config.php');
include_once(dirname(__FILE__) . '/../init.php');

class Chance extends RouteController {

    public function executeIndex() {
        try {
            global $smarty;
            
            $js_files = array(_APP_JS_DIR_ . 'chance.js');
            
            $smarty->assign(array(
                'JS_FILES' => $js_files
            ));
            
            $smarty->display(_APP_TPL_DIR_ . 'chance.tpl');
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

    public function executeActualizarProducto() {
        try {            
            return ApiChance::GuardarProducto(array(
                        'Codigo' => Tools::GetValue('Codigo', ''),
                        'Nombre' => Tools::GetValue('Nombre', ''),
                        'ValorPeso' => Tools::GetValue('ValorPeso', ''),
                        'Orden' => Tools::GetValue('Orden', '')
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

    public function executeEliminar() {
        try {
            return ApiChance::EliminarProducto(array(
                'Codigo' => Tools::GetValue('id', INT_NULL)
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

}

$objChance = new Chance();
$sbAction = Tools::GetValue('action');
print($objChance->execute($objChance, $sbAction));
?>
<?php

include_once(dirname(__FILE__) . '/../config/config.php');
include_once(dirname(__FILE__) . '/../init.php');

class TiposVehiculo extends RouteController {

    public function executeIndex() {
        try {
            global $smarty;

            $rcTipoVehiculoGeneral = ApiTipoVehiculo::getTipoVehiculoGeneral(array(), FALSE);
            $rcEmpresas = ApiEmpresa::get(array(), FALSE);
            $js_files = array(_APP_JS_DIR_ . 'tipoVehiculo.js');

            $smarty->assign(array(
                'JS_FILES' => $js_files,
                'TIPO_VEHICULOS_GENERAL' => array_key_exists('tiposVehiculoGeneral', $rcTipoVehiculoGeneral) ? $rcTipoVehiculoGeneral['tiposVehiculoGeneral'] : array(),
                'EMPRESAS' => array_key_exists('empresas', $rcEmpresas) ? $rcEmpresas['empresas'] : array()
            ));

            $smarty->display(_APP_TPL_DIR_ . 'tipoVehiculo.tpl');
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

    public function executeActualizar() {
        try {
            Tools::CheckSession();

            return ApiTipoVehiculo::actualizar(array(
                        'id' => Tools::GetValue('Codigo', ''),
                        'idtipovehiculogeneral' => Tools::GetValue('nuTipoVehiculoGeneral', ''),
                        'idempresa' => Tools::GetValue('nuIdempresa', ''),
                        'estado' => Tools::GetValue('sbEstado', '')
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

    public function executeEliminar() {
        try {
            Tools::CheckSession();

            return ApiTipoVehiculo::eliminar(array(
                        'id' => Tools::GetValue('Codigo', '')
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

    public function executeFilter() {
        try {
            Tools::CheckSession();

            $rcSort = Tools::GetValue('sort', array());

            return ApiTipoVehiculo::filter(array(
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

    public function executeActulizarTiposVehiculos() {
        try {
            Tools::CheckSession();
            $rcTipoVehiculoGeneral = ApiTipoVehiculo::getTipoVehiculoGeneral(array(), FALSE);
            echo  json_encode(array_key_exists('tiposVehiculoGeneral', $rcTipoVehiculoGeneral) ? $rcTipoVehiculoGeneral['tiposVehiculoGeneral'] : array());
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }
    
}

$objTiposVehiculo = new TiposVehiculo();
$sbAction = Tools::GetValue('action');
print($objTiposVehiculo->execute($objTiposVehiculo, $sbAction));
?>
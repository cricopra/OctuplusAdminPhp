<?php

include_once(dirname(__FILE__) . '/../config/config.php');
include_once(dirname(__FILE__) . '/../init.php');

class UnidadNegocio extends RouteController {

    public function executeIndex() {
        try {
            global $smarty;

            $rcUnidadNegocioGeneral = ApiUnidadNegocio::getUnidadNegocioGeneral(array(), FALSE);
            $rcSedes = ApiSede::getByUsuario(array(), FALSE);
            $js_files = array(_APP_JS_DIR_ . 'unidadNegocio.js');

            $smarty->assign(array(
                'JS_FILES' => $js_files,
                'UNIDAD_NEGOCIO_GENERAL' => array_key_exists('unidadNegocioGeneral', $rcUnidadNegocioGeneral) ? $rcUnidadNegocioGeneral['unidadNegocioGeneral'] : array(),
                'SEDES' => array_key_exists('sedes', $rcSedes) ? $rcSedes['sedes'] : array()
            ));

            $smarty->display(_APP_TPL_DIR_ . 'unidadNegocio.tpl');
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

    public function executeActualizar() {
        try {
            Tools::CheckSession();

            return ApiUnidadNegocio::actualizar(array(
                        'id' => Tools::GetValue('Codigo', ''),
                        'idunidadnegociogeneral' => Tools::GetValue('nuIdUnidadNegocioGeneral', ''),
                        'idsede' => Tools::GetValue('nuIdSede', INT_NULL),
                        'estado' => Tools::GetValue('sbEstado', ''),
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

    public function executeEliminar() {
        try {
            Tools::CheckSession();

            return ApiUnidadNegocio::eliminar(array(
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

            return ApiUnidadNegocio::filter(array(
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

    public function executeLoadCiduadByDepartamento() {
        try {
            Tools::CheckSession();
            return ApiUnidadNegocio::LoadCiduadByDepartamento(array(
                        'nuCodigoDepartamento' => Tools::GetValue('nuCodigoDepartamento', '')
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

    public function executeActulizarUnidadNegocio() {
        try {
            Tools::CheckSession();
            $rcUnidadNegocioGeneral = ApiUnidadNegocio::getUnidadNegocioGeneral(array(), FALSE);
            echo json_encode(array_key_exists('unidadNegocioGeneral', $rcUnidadNegocioGeneral) ? $rcUnidadNegocioGeneral['unidadNegocioGeneral'] : array());
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

}

$objUnidadNegocio = new UnidadNegocio();
$sbAction = Tools::GetValue('action');
print($objUnidadNegocio->execute($objUnidadNegocio, $sbAction));
?>
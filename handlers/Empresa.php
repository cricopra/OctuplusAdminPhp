<?php
include_once(dirname(__FILE__) . '/../config/config.php');
include_once(dirname(__FILE__) . '/../init.php');

class Empresa extends RouteController {

    public function executeIndex() {
        try {
            global $smarty;

            $js_files = array(_APP_JS_DIR_ . 'empresa.js');

            $smarty->assign(array(
                'JS_FILES' => $js_files
            ));

            $smarty->display(_APP_TPL_DIR_ . 'empresa.tpl');
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

    public function executeActualizar() {
        try {
            Tools::CheckSession();

            return ApiEmpresa::actualizar(array(
                        'id' => Tools::GetValue('Codigo', ''),
                        'nombre' => Tools::GetValue('sbNombre', ''),
                        'nit' => Tools::GetValue('sbNit', ''),
                        'dominio' => Tools::GetValue('sbDominio', '')
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

    public function executeEliminar() {
        try {
            Tools::CheckSession();

            return ApiEmpresa::eliminar(array(
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

            return ApiEmpresa::filter(array(
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

$objEmpresa = new Empresa();
$sbAction = Tools::GetValue('action');
print($objEmpresa->execute($objEmpresa, $sbAction));
?>
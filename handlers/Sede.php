<?php

include_once(dirname(__FILE__) . '/../config/config.php');
include_once(dirname(__FILE__) . '/../init.php');

class Sede extends RouteController {

    public function executeIndex() {
        try {
            global $smarty;

            $rcDepartamentos = ApiSede::getDepartamentos(array(), FALSE);
            $js_files = array(_APP_JS_DIR_ . 'sede.js');
            $rcEmpresas = ApiEmpresa::get(array(), FALSE);
            $mostrarEmpresas = (Tools::getSession(VAR_SESSION_USER) == ID_USER_SUPER_ADMIN) ? 'TRUE' : 'FALSE';

            $smarty->assign(array(
                'JS_FILES' => $js_files,
                'DEPARTAMENTOS' => array_key_exists('departamentos', $rcDepartamentos) ? $rcDepartamentos['departamentos'] : array(),
                'EMPRESAS' => array_key_exists('empresas', $rcEmpresas) ? $rcEmpresas['empresas'] : array(),
                'MOSTRAREMPRESAS' => $mostrarEmpresas
            ));

            $smarty->display(_APP_TPL_DIR_ . 'sede.tpl');
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

    public function executeActualizar() {
        try {
            Tools::CheckSession();

            return ApiSede::actualizar(array(
                        'id' => Tools::GetValue('Codigo', ''),
                        'nombre' => Tools::GetValue('sbNombreSede', ''),
                        'direccion' => Tools::GetValue('sbDireccion', ''),
                        //'sbBarrio' => Tools::GetValue('sbBarrio', ''),
                        'idciudad' => Tools::GetValue('nuCodigoCiudad', INT_NULL),
                        'telefono' => Tools::GetValue('sbTelefono', ''),
                        'celular' => Tools::GetValue('sbCelular', ''),
                        'estado' => Tools::GetValue('sbEstado', ''),
                        'idempresa' => Tools::GetValue('sbEmpresa', ''),
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

    public function executeEliminar() {
        try {
            Tools::CheckSession();

            return ApiSede::eliminar(array(
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

            return ApiSede::filter(array(
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
            return ApiSede::LoadCiduadByDepartamento(array(
                        'nuCodigoDepartamento' => Tools::GetValue('nuCodigoDepartamento', '')
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

}

$objSede = new Sede();
$sbAction = Tools::GetValue('action');
print($objSede->execute($objSede, $sbAction));
?>
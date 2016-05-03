<?php

include_once(dirname(__FILE__) . '/../config/config.php');
include_once(dirname(__FILE__) . '/../init.php');

class Producto extends RouteController {

    public function executeIndex() {
        try {
            global $smarty;

            $rcItems = ApiItem::getByUsuario(array(), FALSE);
            $rcCategorias = ApiCategoria::getByUsuario(array(), FALSE);
            $rcTiposVeh = ApiTipoVehiculo::getByUsuario(array(), FALSE);
            $js_files = array(_APP_JS_DIR_ . 'producto.js');

            $smarty->assign(array(
                'JS_FILES' => $js_files,
                'ITEMS' => array_key_exists('items', $rcItems) ? $rcItems['items'] : array(),
                'CATEGORIAS' => array_key_exists('categorias', $rcCategorias) ? $rcCategorias['categorias'] : array(),
                'TIPOS_VEHICULO' => array_key_exists('tiposVehiculo', $rcTiposVeh) ? $rcTiposVeh['tiposVehiculo'] : array()
            ));

            $smarty->display(_APP_TPL_DIR_ . 'producto.tpl');
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

    public function executeActualizar() {
        try {
            Tools::CheckSession();

            return ApiProducto::actualizar(array(
                        'id' => Tools::GetValue('Codigo', ''),
                        'nombre' => Tools::GetValue('Nombre', ''),
                        'descripcion' => Tools::GetValue('Descripcion', ''),
                        'idCategoria' => Tools::GetValue('Categoria', INT_NULL),
                        'idTipoVehiculo' => Tools::GetValue('TipoVehiculo', INT_NULL),
                        'valor' => Tools::GetValue('Valor', INT_NULL),
                        'items' => strlen(Tools::GetValue('Items', '')) ? explode(',', Tools::GetValue('Items', '')) : array()
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

    public function executeEliminar() {
        try {
            Tools::CheckSession();

            return ApiProducto::eliminar(array(
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

            return ApiProducto::filter(array(
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

    public function executeGetProductosByUsuarioTipoVehiculo() {
        Tools::CheckSession();
        return ApiProducto::GetProductosByUsuarioTipoVehiculo(array(
                    'idTipoVehiculo' => Tools::GetValue('nuIdTipoVehiculo', INT_NULL)
        ));
    }

}

$objProducto = new Producto();
$sbAction = Tools::GetValue('action');
print($objProducto->execute($objProducto, $sbAction));
?>
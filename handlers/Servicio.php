<?php

include_once(dirname(__FILE__) . '/../config/config.php');
include_once(dirname(__FILE__) . '/../init.php');

class Servicio extends RouteController {

    public function executeIndex() {
        try {
            global $smarty;

            $rcTrabajadores = ApiTrabajador::getByUsuario(array(), FALSE);
            $rcTipoVehiculosByUsuario = ApiTipoVehiculo::getByUsuario(array(), FALSE);
            $js_files = array(_APP_JS_DIR_ . 'servicio.js');

            $smarty->assign(array(
                'JS_FILES' => $js_files,
                'TRABAJADORES' => array_key_exists('trabajadores', $rcTrabajadores) ? $rcTrabajadores['trabajadores'] : array(),
                'TIPOS_VEHICULO' => array_key_exists('tiposVehiculo', $rcTipoVehiculosByUsuario) ? $rcTipoVehiculosByUsuario['tiposVehiculo'] : array(),
                'ESTADOS' => array(
                    SRV_ACTIVO => SRV_ACTIVO_LBL,
                    SRV_INACTIVO => SRV_INACTIVO_LBL,
                    SRV_INICIADO => SRV_INICIADO_LBL,
                    SRV_TERMINADO => SRV_TERMINADO_LBL,
                    SRV_ENTREGADO => SRV_ENTREGADO_LBL
                )
            ));

            $smarty->display(_APP_TPL_DIR_ . 'servicio.tpl');
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

    public function executeActualizarEstado() {
        try {
            Tools::CheckSession();

            return ApiServicio::actualizarEstado(array(
                        'id' => Tools::GetValue('Codigo', ''),
                        'estado' => Tools::GetValue('Estado', '')
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

    public function executeReasignar() {
        try {
            Tools::CheckSession();

            return ApiServicio::reasignar(array(
                        'id' => Tools::GetValue('Codigo', ''),
                        'idTrabajador' => Tools::GetValue('Trabajador', INT_NULL)
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

    public function executeFiltrar() {
        try {
            Tools::CheckSession();

            return ApiServicio::filtrar(array(
                        'fechaInicial' => (Tools::GetValue('FechaInicial', '') ? Tools::GetValue('FechaInicial', '') : date("Y-m-d")),
                        'fechaFinal' => (Tools::GetValue('FechaFinal', '') ? Tools::GetValue('FechaFinal', '') : date("Y-m-d")),
                        'idTrabajador' => Tools::GetVal(Tools::GetValue('Trabajador', INT_NULL), INT_NULL),
                        'estado' => Tools::GetValue('Estado', ''),
                        'placa' => Tools::GetValue('Placa', ''),
                        'documento' => Tools::GetValue('Documento', '')
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

    public function executeValidarReingresoVehiculo() {
        try {
            Tools::CheckSession();
            return ApiServicio::validarReingresoVehiculo(array(
                        'placa' => strtoupper(Tools::GetValue('sbPlaca', ''))
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

    public function executeRegistrarServicio() {
        try {
            Tools::CheckSession();
            return ApiServicio::registrarServicio(array(
                        'idTipoVehiculo' => Tools::GetValue('nuIdTipoVehiculo', ''),
                        'productos' => Tools::GetValue('productos', ''),
                        'placa' => strtoupper(Tools::GetValue('sbPlaca', '')),
                        'documento' => Tools::GetValue('sbDocumento', ''),
                        'cliente' => strtoupper(Tools::GetValue('sbCliente', '')),
                        'celular' => Tools::GetValue('sbCelular', ''),
                        'idTrabajador' => Tools::GetValue('nuIdTrabajador', ''),
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

    public function executeGetClienteByPlaca() {
        Tools::CheckSession();
        return ApiServicio::GetClienteByPlaca(array(
                    'placa' => strtoupper(Tools::GetValue('sbPlaca', ''))
        ));
    }

}

$objServicio = new Servicio();
$sbAction = Tools::GetValue('action');
print($objServicio->execute($objServicio, $sbAction));
?>
<?php

class ApiServicio extends HelperApi {

    public static function filtrar($rcParams = array(), $blRespJSON = true) {
        try {
            $objWS = new WebServiceRest();

            $rcParams['idUsuario'] = Tools::GetSession(VAR_SESSION_USER);

            if ($objWS->post(WS_FILTRAR_SERVICIOS, $rcParams)) {
                return HelperApi::Response($objWS->getResponse(FALSE), $blRespJSON);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function actualizarEstado($rcParams = array(), $blRespJSON = true) {
        try {
            $objWS = new WebServiceRest();

            $rcParams['idUsuario'] = Tools::GetSession(VAR_SESSION_USER);

            if ($objWS->post(WS_ACTUALIZAR_ESTADO_SERVICIO, $rcParams)) {
                return HelperApi::Response($objWS->getResponse(FALSE), $blRespJSON);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function reasignar($rcParams = array(), $blRespJSON = true) {
        try {
            $objWS = new WebServiceRest();

            $rcParams['idUsuario'] = Tools::GetSession(VAR_SESSION_USER);

            if ($objWS->post(WS_REASIGNAR_SERVICIO, $rcParams)) {
                return HelperApi::Response($objWS->getResponse(FALSE), $blRespJSON);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function validarReingresoVehiculo($rcParams = array(), $blRespJSON = true) {
        try {
            $objWS = new WebServiceRest();

            $rcParams['idUsuario'] = Tools::GetSession(VAR_SESSION_USER);

            if ($objWS->post(WS_VALIDAR_REINGRESO_VEHICULO, $rcParams)) {
                return HelperApi::Response($objWS->getResponse(FALSE), $blRespJSON);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function registrarServicio($rcParams = array(), $blRespJSON = true) {
        try {
            $objWS = new WebServiceRest();

            $rcParams['idUsuario'] = Tools::GetSession(VAR_SESSION_USER);

            if ($objWS->post(WS_REGISTRAR_SERVICIO, $rcParams)) {
                return HelperApi::Response($objWS->getResponse(FALSE), $blRespJSON);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function GetClienteByPlaca($rcParams = array(), $blRespJSON = true) {
        try {
            $objWS = new WebServiceRest();

            $rcParams['idUsuario'] = Tools::GetSession(VAR_SESSION_USER);

            if ($objWS->post(WS_OBTENER_CLIENTE_BY_PLACA, $rcParams)) {
                return HelperApi::Response($objWS->getResponse(FALSE), $blRespJSON);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

}

?>
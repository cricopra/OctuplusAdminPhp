<?php

class ApiTipoVehiculo extends HelperApi {

    public static function actualizar($rcParams = array(), $blRespJSON = true) {
        try {
            $objWS = new WebServiceRest();
            $rcParams['idUsuario'] = Tools::GetSession(VAR_SESSION_USER);

            if ($objWS->post(WS_ACTUALIZAR_TIPO_VEHICULO, $rcParams)) {
                return HelperApi::Response($objWS->getResponse(FALSE), $blRespJSON);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function get($rcParams = array(), $blRespJSON = true) {
        try {
            $objWS = new WebServiceRest();

            if ($objWS->post(WS_OBTENER_TIPO_VEHICULO, $rcParams)) {
                return HelperApi::Response($objWS->getResponse(FALSE), $blRespJSON);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function filter($rcParams = array(), $blRespJSON = true) {
        try {
            $objWS = new WebServiceRest();

            $rcParams['idUsuario'] = Tools::GetSession(VAR_SESSION_USER);
            $rcParams['table'] = TBL_TIPO_VEHICULO;

            if ($objWS->post(WS_FILTER_DATAGRID, $rcParams)) {
                return HelperApi::Response($objWS->getResponse(FALSE), $blRespJSON);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function eliminar($rcParams = array(), $blRespJSON = true) {
        try {
            $objWS = new WebServiceRest();

            $rcParams['idUsuario'] = Tools::GetSession(VAR_SESSION_USER);

            if ($objWS->post(WS_ELIMINAR_TIPO_VEHICULO, $rcParams)) {
                return HelperApi::Response($objWS->getResponse(FALSE), $blRespJSON);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function getByUsuario($rcParams = array(), $blRespJSON = true) {
        try {
            $objWS = new WebServiceRest();

            $rcParams['idUsuario'] = Tools::GetSession(VAR_SESSION_USER);

            if ($objWS->post(WS_OBTENER_TIPO_VEH_USUARIO, $rcParams)) {
                return HelperApi::Response($objWS->getResponse(FALSE), $blRespJSON);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function getTipoVehiculoGeneral($rcParams = array(), $blRespJSON = true) {
        try {
            $objWS = new WebServiceRest();
            $rcParams['idUsuario'] = Tools::GetSession(VAR_SESSION_USER);
            if ($objWS->post(WS_OBTENER_TIPO_VEHICULO_GENERAL, $rcParams)) {
                return HelperApi::Response($objWS->getResponse(FALSE), $blRespJSON);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}

?>
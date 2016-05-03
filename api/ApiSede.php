<?php

class ApiSede extends HelperApi {

    public static function actualizar($rcParams = array(), $blRespJSON = true) {
        try {
            $objWS = new WebServiceRest();

            $rcParams['idUsuario'] = Tools::GetSession(VAR_SESSION_USER);

            if ($objWS->post(WS_ACTUALIZAR_SEDE, $rcParams)) {
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

            if ($objWS->post(WS_OBTENER_SEDES_USUARIO, $rcParams)) {
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
            $rcParams['table'] = TBL_SEDE;

            if ($objWS->post(WS_FILTER_DATAGRID, $rcParams)) {
                return HelperApi::Response($objWS->getResponse(FALSE), $blRespJSON);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function getDepartamentos($rcParams = array(), $blRespJSON = true) {
        try {
            $objWS = new WebServiceRest();

            $rcParams['idUsuario'] = Tools::GetSession(VAR_SESSION_USER);

            if ($objWS->post(WS_OBTENER_DEPARTAMENTOS, $rcParams)) {
                return HelperApi::Response($objWS->getResponse(FALSE), $blRespJSON);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function LoadCiduadByDepartamento($rcParams = array(), $blRespJSON = true) {
        try {
            $objWS = new WebServiceRest();

            $rcParams['idUsuario'] = Tools::GetSession(VAR_SESSION_USER);

            if ($objWS->post(WS_OBTENER_CIUDADES_BY_DEPARTAMENTO, $rcParams)) {
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

            if ($objWS->post(WS_ELIMINAR_SEDE, $rcParams)) {
                return HelperApi::Response($objWS->getResponse(FALSE), $blRespJSON);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

}

?>
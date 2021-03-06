<?php

class ApiUsuario extends HelperApi {

    public static function Login($rcParams = array(), $blRespJSON = true) {
        try {
            $objWS = new WebServiceRest();

            $rcParams['tipo'] = USUARIO_WEB;

            if ($objWS->post(WS_AUTENTICAR_USUARIO, $rcParams)) {
                $objResponse = $objWS->getResponse(FALSE);

                Tools::SetSession(VAR_SESSION_USER, $objResponse['id']);
                Tools::SetSession(VAR_SESSION_LOGIN, $objResponse['login']);
                Tools::SetSession(VAR_SESSION_NAME, $objResponse['nombre']);
                Tools::SetSession(VAR_SESSION_FULLNAME, $objResponse['fullname']);
                Tools::SetSession(VAR_SESSION_DOMINIO, $rcParams['dominio']);

                return HelperApi::Response($objResponse, $blRespJSON);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function actualizar($rcParams = array(), $blRespJSON = true) {
        try {
            $objWS = new WebServiceRest();

            $rcParams['idUsuario'] = Tools::GetSession(VAR_SESSION_USER);

            if ($objWS->post(WS_ACTUALIZAR_USUARIO, $rcParams)) {
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

            if ($objWS->post(WS_ELIMINAR_USUARIO, $rcParams)) {
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

            if ($objWS->post(WS_OBTENER_USUARIOS_USUARIO, $rcParams)) {
                return HelperApi::Response($objWS->getResponse(FALSE), $blRespJSON);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function actualizarPerfil($rcParams = array(), $blRespJSON = true) {
        try {
            $objWS = new WebServiceRest();

            $rcParams['idUsuario'] = Tools::GetSession(VAR_SESSION_USER);

            if ($objWS->post(WS_ACTUALIZAR_PERFIL_USUARIO, $rcParams)) {
                return HelperApi::Response($objWS->getResponse(FALSE), $blRespJSON);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function restablecerClave($rcParams = array(), $blRespJSON = true) {
        try {
            $objWS = new WebServiceRest();

            $rcParams['idUsuario'] = Tools::GetSession(VAR_SESSION_USER);

            if ($objWS->post(WS_RESTABLECER_CLAVE_USUARIO, $rcParams)) {
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
            $rcParams['table'] = TBL_USUARIO;

            if ($objWS->post(WS_FILTER_DATAGRID, $rcParams)) {
                return HelperApi::Response($objWS->getResponse(FALSE), $blRespJSON);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function PruebaMysql($rcParams = array(), $blRespJSON = true) {
        try {
            $objWS = new WebServiceRest();

            if ($objWS->post(WS_TEST_MYSQL, $rcParams)) {
                $objResponse = $objWS->getResponse(FALSE);

                return HelperApi::Response($objResponse, $blRespJSON);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

}

?>
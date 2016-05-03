<?php

class ApiOpcion extends HelperApi {

    public static function get($rcParams = array(), $blRespJSON = true) {
        try{
            $objWS = new WebServiceRest();
            
            $rcParams['idUsuario'] = Tools::GetSession(VAR_SESSION_USER);
            
            if($objWS->post(WS_OBTENER_OPCIONES, $rcParams)){
                return HelperApi::Response($objWS->getResponse(FALSE), $blRespJSON);
            }
        }
        catch(Exception $e){
            throw $e;
        }
    }
    
    public static function getByUsuario($rcParams = array(), $blRespJSON = true) {
        try{
            $objWS = new WebServiceRest();
            
            $rcParams['idUsuario'] = Tools::GetSession(VAR_SESSION_USER);
            
            if($objWS->post(WS_OBTENER_OPCIONES_USUARIO, $rcParams)){
                return HelperApi::Response($objWS->getResponse(FALSE), $blRespJSON);
            }
        }
        catch(Exception $e){
            throw $e;
        }
    }
}

?>
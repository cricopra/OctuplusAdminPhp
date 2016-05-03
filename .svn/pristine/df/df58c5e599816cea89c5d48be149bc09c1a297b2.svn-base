<?php

class ApiTrabajador extends HelperApi {

    public static function actualizar($rcParams = array(), $blRespJSON = true) {
        try{
            $objWS = new WebServiceRest();
            
            $rcParams['idUsuario'] = Tools::GetSession(VAR_SESSION_USER);
            
            if($objWS->post(WS_ACTUALIZAR_TRABAJADOR, $rcParams)){
                return HelperApi::Response($objWS->getResponse(FALSE), $blRespJSON);
            }
        }
        catch(Exception $e){
            throw $e;
        }
    }
    
    public static function eliminar($rcParams = array(), $blRespJSON = true) {
        try{
            $objWS = new WebServiceRest();
            
            $rcParams['idUsuario'] = Tools::GetSession(VAR_SESSION_USER);
            
            if($objWS->post(WS_ELIMINAR_TRABAJADOR, $rcParams)){
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
            
            if($objWS->post(WS_OBTENER_TRABAJADORES_USUARIO, $rcParams)){
                return HelperApi::Response($objWS->getResponse(FALSE), $blRespJSON);
            }
        }
        catch(Exception $e){
            throw $e;
        }
    }
    
    public static function filter($rcParams = array(), $blRespJSON = true) {
        try{
            $objWS = new WebServiceRest();
            
            $rcParams['idUsuario'] = Tools::GetSession(VAR_SESSION_USER);
            $rcParams['table'] = TBL_TRABAJADOR;
            
            if($objWS->post(WS_FILTER_DATAGRID, $rcParams)){
                return HelperApi::Response($objWS->getResponse(FALSE), $blRespJSON);
            }
        }
        catch(Exception $e){
            throw $e;
        }
    }
}

?>
<?php

class WebServiceRest {

    private $sbUrl;
    private $sbService;
    private $rcParams;
    private $sbResponse;
    private $objResponseDecode;

    function __construct() {
        $this->sbService = '';
        $this->rcParams = array();
        $this->sbResponse = '';
        $this->objResponseDecode = array();
    }

    private function getResponsePlain() {
        return $this->sbResponse;
    }

    private function getResponseDecode() {
        return $this->objResponseDecode;
    }
    
    public function getResponse($asJson = TRUE){
        return $asJson ? $this->getResponseDecode() : $this->getResponsePlain();
    }

    public function post($service, $params = array()) {
        $this->sbUrl = 'http://' . _SERVER_ . ':' . _PORT_ . '/' . _JAVA_DIRECTORY_ . '/' . _JAVA_DIRECTORY_NS_ . '/' . _WEB_SERVICE_;
        $this->sbService = $service;
        $this->rcParams = $params;
        
        $objRC = RestClient::post($this->sbUrl, array(
            'service' => $this->sbService,
            'params' => json_encode($this->rcParams)
        ), NULL, NULL, "application/x-www-form-urlencoded");
        
        $sbResponse = urldecode($objRC->getResponse());
        $sbResponse = str_replace("\n", "", $sbResponse);
        $sbResponse = str_replace('\\', '', $sbResponse);
        $objResponse = json_decode($sbResponse, TRUE);

        if (isset($objResponse['status']) && $objResponse['status']) {
            $this->sbResponse = isset($objResponse['data']) ? $objResponse['data'] : '{}';
            $this->objResponseDecode = json_encode($this->sbResponse);

            return TRUE;
        } else {
            if (empty($sbResponse)) {
                throw new Exception('No se pudo conectar con el servidor', 404);
            }
            
            $objError = $objResponse['error'];

            throw new AppException(isset($objError['msg']) ? $objError['msg'] : 'Sin Mensaje', isset($objError['code']) ? $objError['code'] : 10);
        }
    }

}

?>

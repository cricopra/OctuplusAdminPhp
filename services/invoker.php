<?php

try{
    include_once(dirname(__FILE__) . '/../config/config.php');
    include_once(dirname(__FILE__) . '/../init.php');

    $action = Tools::GetValue('action', NULL);
    $args = json_decode(Tools::GetValue('args', '{}'), TRUE);
    $callback = Tools::GetValue('callback', 'auto_callback');
    
    $log = fopen('log.txt', 'a+');    
    fwrite($log, "\r\nFecha->" . date('Y-m-d H:i:s') . "\r\nAction->" . $action . "\r\nArgs->" . Tools::GetValue('args', '{}') . "\r\nCallback->" . $callback . "\r\n");    
    fclose($log);

    if(!empty($action) && is_array($args) && !empty($callback)){
        $response = array();

        switch ($action) {
            case SERV_GET_PRODUCTOS:
                $response = HelperApi::Response(ApiProductos::GetProductoSync($args, NULL, PDO::FETCH_GROUP | PDO::FETCH_UNIQUE | PDO::FETCH_ASSOC), TRUE);

                break;
            case SERV_GET_OFICINAS:
                $response = HelperApi::Response(ApiOficinas::GetOficinasSync($args, NULL, PDO::FETCH_GROUP | PDO::FETCH_UNIQUE | PDO::FETCH_ASSOC), TRUE);

                break;
            case SERV_GET_PRODUCTOS_CHANCE:
                $response = HelperApi::Response(ApiChance::GetProductosSync($args, NULL, PDO::FETCH_GROUP | PDO::FETCH_UNIQUE | PDO::FETCH_ASSOC), TRUE);

                break;
            case SERV_GET_RESULTADOS:
                $response = HelperApi::Response(ApiResultados::Consultar(), TRUE);

                break;
            case SERV_GET_VALOR_GIRO:
                $response = HelperApi::Response(ApiSuperGiros::ConsultarValorGiro($args), TRUE);

                break;
            case SERV_GET_VALORES_GIRO:
                $response = HelperApi::Response(ApiSuperGiros::GetValoresSync($args, NULL, PDO::FETCH_GROUP | PDO::FETCH_UNIQUE | PDO::FETCH_ASSOC), TRUE);

                break;

            default:
                break;
        }

        print($callback . '(' . json_encode($response) . ')');
    }
    else {
        throw new InvalidArgumentException("Argumentos invalidos");
    }
}
catch(Exception $e){
    header('HTTP/1.0 404 Excepcion en tiempo de ejecucion');
    die($e->getMessage());
}

?>

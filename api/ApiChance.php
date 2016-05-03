<?php

class ApiChance extends HelperApi {

    public static function ConsultarProductos($rcColumns = array(), $fetch = PDO::FETCH_ASSOC) {
        try {
            global $SQL_CNN;
            
            $sbFields = is_array($rcColumns) && sizeof($rcColumns) ? implode(',', $rcColumns) : "*";
            $sbEstado = EST_ACTIVO;
            
            $SQL = "SELECT " . $sbFields . " FROM productos_chance WHERE estado = ? ORDER BY orden";
            $smtp = $SQL_CNN->prepare($SQL);
            $smtp->bindParam(1, $sbEstado);
            $smtp->execute();
            
            $objData = $smtp->fetchAll($fetch);
            
            return HelperApi::Response($objData, FALSE);
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    private static function GetMaxVersion($def = 0){
        try {
            global $SQL_CNN;
            
            $version = 0;
            $SQL = "SELECT MAX(version) AS version FROM productos_chance";
            $smtp = $SQL_CNN->prepare($SQL);
            if($smtp->execute()){
                $objData = $smtp->fetchObject();

                $version = empty($objData->version) || $objData->version == "" ? 0 : $objData->version;
            }
            $version++;
            
            return $version;
        }
        catch(Exception $e){
            return isset($def) ? $def : 0;
        }
    }

    public static function GuardarProducto($rcParams = array()) {
        try {
            global $SQL_CNN;
            
            $version = self::GetMaxVersion();
            
            if((isset($rcParams['Codigo']) && !is_null($rcParams['Codigo']) && is_numeric($rcParams['Codigo']))){
                $nuIdx = 1;
                $SQL = "UPDATE productos_chance SET nombre = ?, valor_peso = ?, orden = ?, version = ? WHERE id = ?";
                $smtp = $SQL_CNN->prepare($SQL);
                $smtp->bindParam($nuIdx++, $rcParams['Nombre']);
                $smtp->bindParam($nuIdx++, $rcParams['ValorPeso']);
                $smtp->bindParam($nuIdx++, $rcParams['Orden']);
                $smtp->bindParam($nuIdx++, $version);
                $smtp->bindParam($nuIdx++, $rcParams['Codigo']);
            }
            else{
                $nuIdx = 1;
                $SQL = "INSERT INTO productos_chance(nombre,valor_peso,orden,version) VALUES(?,?,?,?)";
                $smtp = $SQL_CNN->prepare($SQL);
                $smtp->bindParam($nuIdx++, $rcParams['Nombre']);
                $smtp->bindParam($nuIdx++, $rcParams['ValorPeso']);
                $smtp->bindParam($nuIdx++, $rcParams['Orden']);
                $smtp->bindParam($nuIdx++, $version);
            }
            
            if(!$smtp->execute()){
                $rcError = $SQL_CNN->errorInfo();
                throw new AppException($rcError[2], $rcError[1]);
            }
            
            return HelperApi::Response(ApiChance::ConsultarProductos(array('CONCAT(orden,"-",id) AS k, productos_chance.*'), PDO::FETCH_GROUP | PDO::FETCH_ASSOC | PDO::FETCH_UNIQUE), TRUE);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function EliminarProducto($rcParams = array()) {
        try{
            global $SQL_CNN;
            
            if (!is_array($rcParams) || !sizeof($rcParams)){
                throw new InvalidArgumentException("Argumentos invalidos");
            }
            
            $nuIdx = 1;
            $sbEstado = EST_INACTIVO;
            $nuVersion = self::GetMaxVersion();
            
            $SQL = "UPDATE productos_chance SET version = ?, estado = ? WHERE id = ?";
            $smtp = $SQL_CNN->prepare($SQL);
            $smtp->bindParam($nuIdx++, $nuVersion);
            $smtp->bindParam($nuIdx++, $sbEstado);
            $smtp->bindParam($nuIdx++, $rcParams['Codigo']);

            if(!$smtp->execute()){
                $rcError = $SQL_CNN->errorInfo();
                throw new AppException($rcError[2], $rcError[1]);
            }
            
            return HelperApi::Response(array(), TRUE);
        }
        catch(Exception $e){
            throw $e;
        }
    }
    
    public static function GetProductosSync($rcParams = array(), $rcColumns = array(), $fetch = PDO::FETCH_ASSOC) {
        try {
            global $SQL_CNN;
            
            $nuIdx = 1;
            $sbFields = is_array($rcColumns) && sizeof($rcColumns) ? implode(',', $rcColumns) : "id, nombre, (valor_peso/".VALOR_IVA.") as valor_peso, orden, version, estado";
            $nuVersion = $rcParams['version'];
            
            $SQL = "SELECT " . $sbFields . " FROM productos_chance WHERE version > ? ORDER BY orden";
            $smtp = $SQL_CNN->prepare($SQL);
            $smtp->bindParam($nuIdx++, $nuVersion);
            $smtp->execute();
            
            $objData = $smtp->fetchAll($fetch);
            
            return HelperApi::Response($objData, FALSE);
        } catch (Exception $e) {
            throw $e;
        }
    }
}

?>
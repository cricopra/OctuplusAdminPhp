<?php

include_once(dirname(__FILE__) . '/../config/config.php');
include_once(dirname(__FILE__) . '/../init.php');

class Usuario extends RouteController {

    public function executeIndex() {
        try {
            global $smarty;
            
            $rcSedes = ApiSede::getByUsuario(array(), FALSE);
            $rcTiposUsuario = array(
                USUARIO_WEB => USUARIO_WEB_LBL,
                USUARIO_MOVIL => USUARIO_MOVIL_LBL
            );
            $js_files = array(_APP_JS_DIR_ . 'usuario.js');
            
            $smarty->assign(array(
                'JS_FILES' => $js_files,
                'TIPOS' => $rcTiposUsuario,
                'DOMINIO' => Tools::GetSession(VAR_SESSION_DOMINIO),
                'SEDES' => array_key_exists('sedes', $rcSedes) ? $rcSedes['sedes'] : array()
            ));
            
            $smarty->display(_APP_TPL_DIR_ . 'usuario.tpl');
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }
    
    public function executeActualizar(){
        try {
            Tools::CheckSession();
            
            $rcLogin = explode('@', Tools::GetValue('Login', ''));
            $sbUsuario = sizeof($rcLogin) ? $rcLogin[0] : Tools::GetValue('Login', '');
            $sbDominio = sizeof($rcLogin) > 1 ? $rcLogin[1] : '';
            
            return ApiUsuario::actualizar(array(
                'id' => Tools::GetValue('Codigo', ''),
                'usuario' => $sbUsuario,
                'dominio' => $sbDominio,
                'nombre' => Tools::GetValue('Nombre', ''),
                'clave' => md5(Tools::GetValue('Clave', '')),
                'tipo' => Tools::GetValue('Tipo', USUARIO_WEB),
                'sedes' => strlen(Tools::GetValue('Sedes', '')) ? explode(',', Tools::GetValue('Sedes', '')) : array()
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }
    
    public function executeEliminar(){
        try {
            Tools::CheckSession();
            
            return ApiUsuario::eliminar(array(
                'id' => Tools::GetValue('Codigo', '')
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }
    
    public function executeFilter(){
        try {
            Tools::CheckSession();
            
            $rcSort = Tools::GetValue('sort', array());
                        
            return ApiUsuario::filter(array(
                'page' => Tools::GetValue('current', 1),
                'limit' => Tools::GetValue('rowCount', 10),
                'filter' => Tools::GetValue('searchPhrase', ''),
                'sortBy' => sizeof($rcSort) ? key($rcSort) : '',
                'sortMethod' => sizeof($rcSort) ? $rcSort[key($rcSort)] : ''
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }
}

$objUsuario = new Usuario();
$sbAction = Tools::GetValue('action');
print($objUsuario->execute($objUsuario, $sbAction));
?>
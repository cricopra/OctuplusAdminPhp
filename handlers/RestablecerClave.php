<?php

include_once(dirname(__FILE__) . '/../config/config.php');
include_once(dirname(__FILE__) . '/../init.php');

class RestablecerClave extends RouteController {

    public function executeIndex() {
        try {
            global $smarty;
            
            $js_files = array(_APP_JS_DIR_ . 'restablecerClave.js');
            $rcUsuarios = ApiUsuario::getByUsuario(array(), FALSE);
            
            $smarty->assign(array(
                'JS_FILES' => $js_files,
                'USUARIOS' => array_key_exists('usuarios', $rcUsuarios) ? $rcUsuarios['usuarios'] : array()
            ));
            
            $smarty->display(_APP_TPL_DIR_ . 'restablecerClave.tpl');
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }
    
    public function executeActualizar(){
        try {
            Tools::CheckSession();
            
            return ApiUsuario::restablecerClave(array(
                'id' => Tools::GetValue('Codigo', ''),
                'pwdLogin' => md5(Tools::GetValue('PwdLogin', '')),
                'pwdNueva' => md5(Tools::GetValue('PwdNueva', ''))
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }
}

$objRestablecerClave = new RestablecerClave();
$sbAction = Tools::GetValue('action');
print($objRestablecerClave->execute($objRestablecerClave, $sbAction));
?>
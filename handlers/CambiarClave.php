<?php

include_once(dirname(__FILE__) . '/../config/config.php');
include_once(dirname(__FILE__) . '/../init.php');

class CambiarClave extends RouteController {

    public function executeIndex() {
        try {
            global $smarty;
            
            $js_files = array(_APP_JS_DIR_ . 'cambiarClave.js');
            $rcUsuarios = ApiUsuario::getByUsuario(array(), FALSE);
            
            $smarty->assign(array(
                'JS_FILES' => $js_files,
                'USUARIOS' => array_key_exists('usuarios', $rcUsuarios) ? $rcUsuarios['usuarios'] : array()
            ));
            
            $smarty->display(_APP_TPL_DIR_ . 'cambiarClave.tpl');
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }
    
    public function executeActualizar(){
        try {
            Tools::CheckSession();
            
            return ApiUsuario::restablecerClave(array(
                'id' => Tools::GetSession(VAR_SESSION_USER),
                'pwdLogin' => md5(Tools::GetValue('PwdActual', '')),
                'pwdNueva' => md5(Tools::GetValue('PwdNueva', ''))
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }
}

$objCambiarClave = new CambiarClave();
$sbAction = Tools::GetValue('action');
print($objCambiarClave->execute($objCambiarClave, $sbAction));
?>
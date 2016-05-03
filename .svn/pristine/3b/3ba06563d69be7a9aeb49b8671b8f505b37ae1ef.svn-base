<?php

include_once(dirname(__FILE__) . '/../config/config.php');
include_once(dirname(__FILE__) . '/../init.php');

class Perfil extends RouteController {

    public function executeIndex() {
        try {
            global $smarty;
            
            $js_files = array(_APP_JS_DIR_ . 'perfil.js');
            $rcUsuarios = ApiUsuario::getByUsuario(array(), FALSE);
            $rcOpciones = ApiOpcion::get(array(), FALSE);
                        
            $smarty->assign(array(
                'JS_FILES' => $js_files,
                'USUARIOS' => array_key_exists('usuarios', $rcUsuarios) ? $rcUsuarios['usuarios'] : array(),
                'OPCIONES' => array_key_exists('opciones', $rcOpciones) ? $rcOpciones['opciones'] : array(),
            ));
            
            $smarty->display(_APP_TPL_DIR_ . 'perfil.tpl');
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }
    
    public function executeGetOpcionesUsuario(){
        try {
            Tools::CheckSession();
            
            return ApiOpcion::getByUsuario(array(
                'id' => Tools::GetValue('Codigo', '')
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }
    
    public function executeActualizarOpcionesUsuario(){
        try {
            Tools::CheckSession();
                        
            return ApiUsuario::actualizarPerfil(array(
                'id' => Tools::GetValue('Codigo', ''),
                'opciones' => strlen(Tools::GetValue('Opciones', '')) ? explode(',', Tools::GetValue('Opciones', '')) : array()
            ));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }
}

$objPerfil = new Perfil();
$sbAction = Tools::GetValue('action');
print($objPerfil->execute($objPerfil, $sbAction));
?>
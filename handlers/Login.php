<?php

/*
 * SNavia
 * Playtech
 * 2013
 */

include_once(dirname(__FILE__) . '/../config/config.php');
include_once(dirname(__FILE__) . '/../init.php');

class Login extends RouteController {

    public function executeLogin() {
        try {
            $rcLogin = explode('@', Tools::GetValue('user', ''));
            $sbUsuario = sizeof($rcLogin) ? $rcLogin[0] : Tools::GetValue('user', '');
            $sbDominio = sizeof($rcLogin) > 1 ? $rcLogin[1] : '';

            return ApiUsuario::Login(array('usuario' => $sbUsuario, 'clave' => md5(Tools::GetValue('pwd', '')), 'dominio' => $sbDominio));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

    public function executePruebaMysql() {
        try {
            $rcLogin = explode('@', Tools::GetValue('user', ''));
            $sbUsuario = sizeof($rcLogin) ? $rcLogin[0] : Tools::GetValue('user', '');
            $sbDominio = sizeof($rcLogin) > 1 ? $rcLogin[1] : '';

            return ApiUsuario::PruebaMysql(array('usuario' => $sbUsuario, 'clave' => md5(Tools::GetValue('pwd', '')), 'dominio' => $sbDominio));
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

}

$objLogin = new Login();
$sbAction = Tools::GetValue('action', '');
print($objLogin->execute($objLogin, $sbAction));
?>
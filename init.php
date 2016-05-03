<?php

/* Server Params */
$server_host = htmlspecialchars($_SERVER['HTTP_HOST'], ENT_COMPAT, 'UTF-8');
$protocol = 'http://';

define('_APP_BASE_URL_', $protocol . $server_host);

global $smarty;
global $SQL_CNN;
if (isset($smarty)) {

    ob_start();

    require_once(dirname(__FILE__) . '/general/define.php');

    $smarty->assign(array(
        'BASE_DIR' => _APP_BASE_URL_ . __APP_BASE_URI__,
        'BASE_DIR_HANDLERS' => _APP_BASE_URL_ . __APP_BASE_URI__ . 'handlers/',
        'PROTOCOL' => $protocol,
        'IMG_DIR' => _APP_IMG_DIR_,
        'CSS_DIR' => _APP_CSS_DIR_,
        'JS_DIR' => _APP_JS_DIR_,
        'TPL_DIR' => _APP_TPL_DIR_,
        'APP_NAME' => NOMBRE_APP,
        '_APP_NAME_' => _APP_NAME_,
        'DATE_NOW' => Tools::GetDateNow(),
        'INT_NULL' => INT_NULL,
        'SI' => SI,
        'NO' => NO,
        'PDF' => PDF,
        'EXCEL' => EXCEL,
        'PERMISOS' => array(
            'TRABAJADORES' => PERFIL_ADMIN_TRABAJADOR,
            'CATEGORIAS' => PERFIL_ADMIN_CATEGORIAS,
            'ITEMS' => PERFIL_ADMIN_ITEMS,
            'USUARIOS' => PERFIL_ADMIN_USUARIOS,
            'PRODUCTOS' => PERFIL_ADMIN_PRODUCTOS,
            'PERFIL_USUARIO' => PERFIL_ADMIN_PERFIL_USUARIO,
            'RESTABLECER_CLAVE' => PERFIL_RESTABLECER_CLAVE,
            'SERVICIOS' => PERFIL_ADMIN_SERVICIOS,
            'SEDES' => PERFIL_ADMIN_SEDES,
            'UNIDADES_NEGOCIO' => PERFIL_ADMIN_UNIDAD_NEGOCIO,
            'EMPRESAS' => PERFIL_ADMIN_EMPRESAS,
            'TIPOS_VEHICULO' => PERFIL_ADMIN_TIPOS_VEHICULO
        )
    ));
}

?>
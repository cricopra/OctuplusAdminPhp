<?php

/*
 * SNavia
 * Para defines de archivos .php usar _APP_ROOT_DIR
 * Y para defines de otros archivos(.js,.css,img) usar __APP_BASE_URI__
 */

/* Improve PHP configuration to prevent issues */
@ini_set('display_errors', 'on');
@ini_set('upload_max_filesize', '100M');
@ini_set('default_charset', 'utf-8');

/* Correct Apache charset */
header('Content-Type: text/html; charset=utf-8');

include(dirname(__FILE__) . '/settings.php');

$currentDir = dirname(__FILE__);

function autoloadClasses($className) {
    if (!class_exists($className, false)) {
        $fClass = realpath(dirname(__FILE__) . '/..') . '/classes/' . $className . '.php';

        if (strcasecmp(substr($className, 0, strlen('Api')), 'Api') === 0) {
            $fClass = realpath(dirname(__FILE__) . '/..') . '/api/' . $className . '.php';
        } else if (strcasecmp(substr($className, 0, strlen('Report')), 'Report') === 0) {
            $fClass = realpath(dirname(__FILE__) . '/..') . '/reports/' . $className . '.php';
        }

        if (is_file($fClass)) {
            require_once($fClass);
        }
    }
}

spl_autoload_register('autoloadClasses');

/*
 * Directories
 */
define('_APP_ROOT_DIR_', realpath($currentDir . '/..'));
define('_APP_CLASS_DIR_', _APP_ROOT_DIR_ . '/classes/');
define('_APP_API_DIR', _APP_ROOT_DIR_ . '/api/');
define('_APP_IMG_DIR_', __APP_BASE_URI__ . 'images/');
define('_APP_TOOL_DIR_', _APP_ROOT_DIR_ . '/tools/');
define('_APP_SMARTY_DIR_', _APP_TOOL_DIR_ . 'smarty/');
define('_APP_FPDF_DIR_', _APP_TOOL_DIR_ . '/fpdf/');
define('_APP_JS_DIR_', __APP_BASE_URI__ . 'js/');
define('_APP_CSS_DIR_', __APP_BASE_URI__ . 'css/');
define('_APP_TPL_DIR_', _APP_ROOT_DIR_ . '/tpl/');
define('_APP_REPORT_DIR_', _APP_ROOT_DIR_ . '/reports/');
define('_APP_PUBLIC_EXCEL_FILES_',__APP_BASE_URI__.'/files/excel/');
define('_APP_FILE_EXCEL_DIR_',_APP_ROOT_DIR_.'/files/excel/');
define('_APP_GENERAL_DIR', _APP_ROOT_DIR_ . '/general/');
define('_APP_FILES_DIR', _APP_ROOT_DIR_ . '/files/');

/*
 * Sessions
 */

define('KEY_SESSION', 'SKELETON_' . __APP_BASE_URI__ . "_");
define('VAR_SESSION_USER', KEY_SESSION . 'USER');
define('VAR_SESSION_LOGIN', KEY_SESSION . 'LOGIN');
define('VAR_SESSION_NAME', KEY_SESSION . 'NAME');
define('VAR_SESSION_FULLNAME', KEY_SESSION . 'FULLNAME');
define('VAR_SESSION_DOMINIO', KEY_SESSION . 'DOMINIO');

/*
 * Smarty
 */
include(dirname(__FILE__) . '/smarty.config.php');
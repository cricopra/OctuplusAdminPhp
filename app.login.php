<?php

include(dirname(__FILE__) . '/config/config.php');
include(dirname(__FILE__) . '/init.php');

print "<script type='text/javascript' src='" . _APP_JS_DIR_ . "define.js'></script>";
print "<script type='text/javascript'>" .
        "Define.APP_BASE_URI = '" . __APP_BASE_URI__ . "';" .
        "Define.BASE_DIR = '" . _APP_BASE_URL_ . __APP_BASE_URI__ . "';" .
        "Define.BASE_DIR_HANDLERS = '" . _APP_BASE_URL_ . __APP_BASE_URI__ . 'handlers/' . "';" .
        "Define.BASE_DIR_IMG = '" . _APP_BASE_URL_ . __APP_BASE_URI__ . 'images/' . "';" .
        "</script>";

/*
 * Verificar sesion activa
 */
$userLogged = Tools::GetSession(VAR_SESSION_USER);

if (!empty($userLogged)) {
    header("Location: home");
}
else{
    global $smarty;

    $css_files[_APP_CSS_DIR_ . 'validationEngine/validationEngine.jquery.css'] = 'all';
    $css_files[_APP_CSS_DIR_ . 'bootstrap/bootstrap.min.css'] = 'all';
    $css_files[_APP_CSS_DIR_ . 'app.css'] = 'all';
    $css_files[_APP_CSS_DIR_ . 'xstrap/xb.css'] = 'all';
    $css_files[_APP_CSS_DIR_ . 'override.css'] = 'all';
    $css_files[_APP_CSS_DIR_ . 'login.css'] = 'all';

    $js_files = array(
        _APP_JS_DIR_ . 'jquery.core/jquery.min.js',
        _APP_JS_DIR_ . 'extend.js',
        _APP_JS_DIR_ . 'global.js',
        _APP_JS_DIR_ . 'validationEngine/languages/jquery.validationEngine-es.js',
        _APP_JS_DIR_ . 'validationEngine/jquery.validationEngine.js',
        _APP_JS_DIR_ . 'bootstrap/bootstrap.min.js',
        _APP_JS_DIR_ . 'xstrap/xBootstrapModal.js',
        _APP_JS_DIR_ . 'xstrap/xBootstrapAlert.js',
        _APP_JS_DIR_ . 'xstrap/xToast.js',
        _APP_JS_DIR_ . 'xstrap/xPop.js',
        _APP_JS_DIR_ . 'sugar/sugar.min.js',
        _APP_JS_DIR_ . 'login.js'
    );

    if (isset($css_files) AND !empty($css_files))
        $smarty->assign('CSS_FILES', $css_files);
    if (isset($js_files) AND !empty($js_files))
        $smarty->assign('JS_FILES', $js_files);

    $smarty->display(_APP_TPL_DIR_ . 'login.tpl');
}

?>


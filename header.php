<?php
require_once(dirname(__FILE__).'/init.php');

global $smarty;

/* CSS */
$css_files[_APP_CSS_DIR_ . 'validationEngine/validationEngine.jquery.css'] = 'all';
$css_files[_APP_CSS_DIR_ . 'bootstrap/bootstrap.min.css'] = 'all';
$css_files[_APP_CSS_DIR_ . 'jquery.ui/jquery-ui.min.css'] = 'all';
$css_files[_APP_CSS_DIR_ . 'datagrid/jquery.bootgrid.min.css'] = 'all';
$css_files[_APP_CSS_DIR_ . 'app.css'] = 'all';
$css_files[_APP_CSS_DIR_ . 'xstrap/xb.css'] = 'all';
$css_files[_APP_CSS_DIR_ . 'override.css'] = 'all';

/* JS */

$js_files = array(
    _APP_JS_DIR_ . 'jquery.core/jquery.min.js',
    _APP_JS_DIR_ . 'jquery.ui/jquery-ui.min.js',
    _APP_JS_DIR_ . 'jquery.ui/datepicker-es.js',
    _APP_JS_DIR_ . 'datagrid/jquery.bootgrid.js',
    _APP_JS_DIR_ . 'datagrid/jquery.bootgrid.fa.min.js',
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
    _APP_JS_DIR_ . 'override.js',
    _APP_JS_DIR_ . 'menu.js'
);

if(isset($css_files) AND !empty($css_files)) $smarty->assign('CSS_FILES', $css_files);
if(isset($js_files) AND !empty($js_files)) $smarty->assign('JS_FILES', $js_files);

$smarty->display(_APP_TPL_DIR_.'header.tpl');

?>
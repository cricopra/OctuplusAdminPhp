<?php

require_once(_APP_SMARTY_DIR_ . 'libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = _APP_TPL_DIR_;
$smarty->compile_dir = _APP_SMARTY_DIR_ . 'compile';
$smarty->cache_dir = _APP_SMARTY_DIR_ . 'cache';
$smarty->config_dir = _APP_SMARTY_DIR_ . 'configs';
$smarty->caching = false;
$smarty->force_compile = true;
?>
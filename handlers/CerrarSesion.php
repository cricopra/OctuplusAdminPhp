<?php

include_once(dirname(__FILE__) . '/../config/config.php');
include_once(dirname(__FILE__) . '/../init.php');

Tools::DestroySession();

HelperApi::Response(array(
    'status' => TRUE,
    'redirect' => _APP_BASE_URL_ . __APP_BASE_URI__ . 'index.php'
));
?>
<?php

include(dirname(__FILE__) . '/config/config.php');
include(dirname(__FILE__) . '/init.php');

print "<script type='text/javascript' src='" . _APP_JS_DIR_ . "define.js'></script>";
print "<script type='text/javascript'>" .
        "Define.APP_BASE_URI = '" . __APP_BASE_URI__ . "';" .
        "Define.BASE_DIR = '" . _APP_BASE_URL_ . __APP_BASE_URI__ . "';" .
        "Define.BASE_DIR_HANDLERS = '" . _APP_BASE_URL_ . __APP_BASE_URI__ . 'handlers/' . "';" .
        "Define.BASE_DIR_IMG = '" . _APP_BASE_URL_ . __APP_BASE_URI__ . 'images/' . "';" .
        "Define.SERVICIO_LBL['" . SRV_ACTIVO . "'] = '" . SRV_ACTIVO_LBL . "';" .
        "Define.SERVICIO_LBL['" . SRV_INACTIVO . "'] = '" . SRV_INACTIVO_LBL . "';" .
        "Define.SERVICIO_LBL['" . SRV_INICIADO . "'] = '" . SRV_INICIADO_LBL . "';" .
        "Define.SERVICIO_LBL['" . SRV_TERMINADO . "'] = '" . SRV_TERMINADO_LBL . "';" .
        "Define.SERVICIO_LBL['" . SRV_ENTREGADO . "'] = '" . SRV_ENTREGADO_LBL . "';" .
        "</script>";

/*
 * Verificar sesion activa
 */
$userLogged = Tools::GetSession(VAR_SESSION_USER);

if (!empty($userLogged)) {
    include(dirname(__FILE__) . '/header.php');
    include(dirname(__FILE__) . '/body.php');
    include(dirname(__FILE__) . '/footer.php');
}
else{
    header("Location: login");
}

?>
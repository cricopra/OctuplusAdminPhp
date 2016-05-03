<?php

global $smarty;
$rcOpciones = ApiOpcion::getByUsuario(array('id' => Tools::GetSession(VAR_SESSION_USER)), FALSE);
$rcOpciones = array_key_exists('opciones', $rcOpciones) ? $rcOpciones['opciones'] : array();

$smarty->assign(array(
    'USUARIO' => Tools::GetSession(VAR_SESSION_NAME),
    'FULLNAME' => Tools::GetSession(VAR_SESSION_FULLNAME),
    'JSON_OPCIONES' => json_encode($rcOpciones),
    'OPCIONES' => $rcOpciones
));
$smarty->display(_APP_TPL_DIR_ . 'body.tpl');
?>
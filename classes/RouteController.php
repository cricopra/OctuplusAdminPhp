<?php

/*
 * SNavia
 * Playtech
 * 2013
 */

class RouteController {

    function execute($class, $action) {
        try {
            if (is_callable(array($class, 'execute' . $action))) {
                return call_user_func(array($class, 'execute' . $action));
            } else {
                throw new BadFunctionCallException('El metodo ' . $action . ' no hace parte del modulo ' . get_class($class));
            }
        } catch (Exception $e) {
            Tools::ThrowError($e);
        }
    }

}

?>
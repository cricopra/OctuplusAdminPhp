<?php

/*
 * SNavia
 * Playtech
 * 2013
 */

class HelperApi{
    static public function Response($rcReturn = array(), $blRespJSON = true){
         return $blRespJSON ? json_encode($rcReturn) : $rcReturn;
    }
}
?>
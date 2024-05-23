<?php

class Funciones{

static public function estaActivo($ruta) {
    
    $uri = $_SERVER['REQUEST_URI'];
    if(strpos($uri, $ruta) !== false) {
        return true;
    }
    return false;
}


}
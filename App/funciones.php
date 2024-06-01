<?php

class Funciones{



 // Llave de encriptación
 const ENCRYPTION_KEY = 'es1921022834';
static public function estaActivo($ruta) {
    
    $uri = $_SERVER['REQUEST_URI'];
    if(strpos($uri, $ruta) !== false) {
        return true;
    }
    return false;
}


   // Encripta un texto utilizando AES-256-CBC
   static public function encrypt($text) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC'));
    $encrypted = openssl_encrypt($text, 'AES-256-CBC', self::ENCRYPTION_KEY, 0, $iv);
    if ($encrypted === false) {
        throw new Exception("Encriptación fallida");
    }
    return base64_encode($iv . $encrypted);
}

// Desencripta un texto encriptado utilizando AES-256-CBC
static public function decrypt($encryptedText) {
    $data = base64_decode($encryptedText);
    $iv_length = openssl_cipher_iv_length('AES-256-CBC');
    $iv = substr($data, 0, $iv_length);
    $encrypted = substr($data, $iv_length);
    $decrypted = openssl_decrypt($encrypted, 'AES-256-CBC', self::ENCRYPTION_KEY, 0, $iv);
    if ($decrypted === false) {
        throw new Exception("Desencriptación fallida");
    }
    return $decrypted;

}



}
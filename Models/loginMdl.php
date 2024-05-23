<?php
include_once "conexion.php";


class LoginMdl{
    
    static public function validarLoginMdl($tabla, $datos){
         $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuario = :usuario AND pass = :pass");
         $PDO->bindParam(":usuario",$datos["usuario"],PDO::PARAM_STR);
         $PDO->bindParam(":pass",$datos["password"],PDO::PARAM_STR);
         $PDO->execute();
         return $PDO->fetch();

    }
}

        
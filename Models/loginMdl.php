<?php
include_once "CANP_conexion.php";

class LoginMdl{

   
    static public function validarLoginMdl($tabla, $datos){
         $PDO = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Usuario = :usuario AND Password = :pass");
         $PDO->bindParam(":usuario",$datos["usuario"],PDO::PARAM_STR);
         $PDO->bindParam(":pass",$datos["password"],PDO::PARAM_STR);
         $PDO->execute();
         return $PDO->fetch();

    }
}

        
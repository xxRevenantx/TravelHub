<?php

require_once "CANP_conexion.php";

class UsuariosMdl {

    // Método para registrar un usuario
    public static function canp_registrar_usuario_mdl($datosUsuario) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO tblusuarios (Usuario, Nombre, Apellido, Email, Password, Rol) VALUES (:usuario, :nombre, :apellido, :email, :password, :rol)");

        $stmt->bindParam(":usuario", $datosUsuario['usuario'], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datosUsuario['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datosUsuario['apellido'], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datosUsuario['email'], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datosUsuario['password'], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $datosUsuario['rol'], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt = null;
    }

    // Método para leer todos los usuarios
    public static function canp_leer_usuarios_mdl() {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM tblusuarios");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Método para leer un usuario por id
    public static function canp_leer_usuario_id_mdl($idUsuario) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM tblusuarios WHERE id_usuario = :idUsuario");
        $stmt->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    // Método para actualizar un usuario
    public static function canp_actualizar_usuario_mdl($datosUsuario) {
        $stmt = Conexion::conectar()->prepare("UPDATE tblusuarios SET Usuario = :usuario, Nombre = :nombre, Apellido = :apellido, Email = :email, Password = :password, Rol = :rol WHERE id_usuario = :id");

        $stmt->bindParam(":usuario", $datosUsuario['usuario'], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datosUsuario['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datosUsuario['apellido'], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datosUsuario['email'], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datosUsuario['password'], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $datosUsuario['rol'], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datosUsuario['id'], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt = null;
    }

    // Método para eliminar un usuario
    public static function canp_eliminar_usuario_mdl($idUsuario) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM tblusuarios WHERE id_usuario = :idUsuario");
        $stmt->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt = null;
    }

}

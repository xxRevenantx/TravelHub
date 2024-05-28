<?php

class UsuariosCtr {

    // Función para registrar un usuario
    public static function canp_registrar_usuario_ctr($datosUsuario) {
        $respuesta = UsuariosMdl::canp_registrar_usuario_mdl($datosUsuario);
        return $respuesta; // Esto podría devolver, por ejemplo, un mensaje de éxito o error
    }

    // Función para leer los datos de todos los usuarios
    public static function canp_leer_usuarios_ctr() {
        $respuesta = UsuariosMdl::canp_leer_usuarios_mdl();
        return $respuesta; // Devuelve los datos de los usuarios o un mensaje de error
    }

    // Función para leer los datos por id 
    public static function canp_leer_usuario_id_ctr($usuario) {
        $respuesta = UsuariosMdl::canp_leer_usuario_id_mdl($usuario);
        return $respuesta; // Devuelve los datos del usuario o un mensaje de error
    }

    // Función para actualizar los datos de un usuario
    public static function canp_actualizar_usuario_ctr($datosUsuario) {
        $respuesta = UsuariosMdl::canp_actualizar_usuario_mdl($datosUsuario);
        return $respuesta; // Devuelve un mensaje de éxito o error
    }

    // Función para eliminar un usuario
    public static function canp_eliminar_usuario_ctr($idUsuario) {
        // Validar si el usuario puede ser eliminado
        $db = Conexion::conectar();
        $stmt = $db->prepare("SELECT fn_validar_eliminacion_destino(:idUsuario) AS puede_eliminar");
        $stmt->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado['puede_eliminar']) {
            // No se puede eliminar, devolver un mensaje de error
            return "No se puede eliminar el usuario porque está vinculado a un destino.";
        } else {
            // Se puede eliminar, proceder con la eliminación
            $respuesta = UsuariosMdl::canp_eliminar_usuario_mdl($idUsuario);
            return $respuesta; // Devuelve un mensaje de éxito o error
        }
    }

}

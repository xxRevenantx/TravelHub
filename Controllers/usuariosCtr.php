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
        $respuesta = UsuariosMdl::canp_eliminar_usuario_mdl($idUsuario);
        return $respuesta; // Devuelve un mensaje de éxito o error
    }

 // Función para leer los datos de los roles
 public static function canp_leer_rol_id_ctr($rol) {
    $respuesta = UsuariosMdl::canp_leer_rol_id_mdl($rol);
    return $respuesta; // Devuelve los datos de los usuarios o un mensaje de error
}


}

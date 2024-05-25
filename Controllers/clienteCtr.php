<?php
class ClienteCtr {

    // Función para registrar un cliente
    public static function canp_registrar_cliente_ctr($datosCliente) {
        $respuesta = ClienteMdl::canp_registrar_cliente_mdl($datosCliente);
        return $respuesta; // Esto podría devolver, por ejemplo, un mensaje de éxito o error
    }

    // Función para leer los datos de un cliente
    public static function canp_leer_clientes_ctr() {
        $respuesta = ClienteMdl::canp_leer_clientes_mdl();
        return $respuesta; // Devuelve los datos del cliente o un mensaje de error
    }
    // Función para leer los datos de un cliente por id
    public static function canp_leer_cliente_id_ctr($idCliente) {
        $respuesta = ClienteMdl::canp_leer_cliente_id_mdl($idCliente);
        return $respuesta; // Devuelve los datos del cliente o un mensaje de error
    }

    // Función para actualizar los datos de un cliente
    public static function canp_actualizar_cliente_ctr($datosCliente) {
        $respuesta = ClienteMdl::canp_actualizar_cliente_mdl($datosCliente);
        return $respuesta; // Devuelve un mensaje de éxito o error
    }

    // Función para eliminar un cliente
    public static function canp_eliminar_cliente_ctr($idCliente) {
        $respuesta = ClienteMdl::canp_eliminar_cliente_mdl($idCliente);
        return $respuesta; // Devuelve un mensaje de éxito o error
    }

}
<?php
class ReservasCtr {

    // Función para registrar una reserva
    public static function canp_registrar_reserva_ctr($datosReserva) {
        $respuesta = ReservasMdl::canp_registrar_reserva_mdl($datosReserva);
        return $respuesta; // Esto podría devolver, por ejemplo, un mensaje de éxito o error
    }

    // Función para leer los datos de todas las reservas
    public static function canp_leer_reservas_ctr() {
        $respuesta = ReservasMdl::canp_leer_reservas_mdl();
        return $respuesta; // Devuelve los datos de las reservas o un mensaje de error
    }

    // Función para leer los datos de una reserva por id
    public static function canp_leer_reserva_id_ctr($idReserva) {
        $respuesta = ReservasMdl::canp_leer_reserva_id_mdl($idReserva);
        return $respuesta; // Devuelve los datos de la reserva o un mensaje de error
    }

    // Función para actualizar los datos de una reserva
    public static function canp_actualizar_reserva_ctr($datosReserva) {
        $respuesta = ReservasMdl::canp_actualizar_reserva_mdl($datosReserva);
        return $respuesta; // Devuelve un mensaje de éxito o error
    }

    // Función para eliminar una reserva
    public static function canp_eliminar_reserva_ctr($idReserva) {
        $respuesta = ReservasMdl::canp_eliminar_reserva_mdl($idReserva);
        return $respuesta; // Devuelve un mensaje de éxito o error
    }
}
?>

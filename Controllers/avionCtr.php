<?php

class AvionCtr {

    // Función para registrar un avión
    public static function canp_registrar_avion_ctr($datosAvion) {
        $respuesta = AvionMdl::canp_registrar_avion_mdl($datosAvion);
        return $respuesta; // Esto podría devolver, por ejemplo, un mensaje de éxito o error
    }

    // Función para leer los datos de todos los aviones
    public static function canp_leer_aviones_ctr() {
        $respuesta = AvionMdl::canp_leer_aviones_mdl();
        return $respuesta; // Devuelve los datos de los aviones o un mensaje de error
    }

    // Función para leer los datos por id 
    public static function canp_leer_avion_id_ctr($avion) {
        $respuesta = AvionMdl::canp_leer_avion_id_mdl($avion);
        return $respuesta; // Devuelve los datos del avión o un mensaje de error
    }

    // Función para actualizar los datos de un avión
    public static function canp_actualizar_avion_ctr($datosAvion) {
        $respuesta = AvionMdl::canp_actualizar_avion_mdl($datosAvion);
        return $respuesta; // Devuelve un mensaje de éxito o error
    }

    // Función para eliminar un avión
    public static function canp_eliminar_avion_ctr($eliminarAvion) {
        $respuesta = AvionMdl::canp_eliminar_avion_mdl($eliminarAvion);
        return $respuesta; // Devuelve un mensaje de éxito o error
    }

}

<?php

class TransporteTerrestreCtr {

    // Función para registrar un transporte terrestre
    public static function canp_registrar_transporte_terrestre_ctr($datosTransporte) {
            // Validación de la placa: numérica y exactamente 6 caracteres
            if (!preg_match('/^\d{6}$/', $datosTransporte['placa'])) {
                return false;
            }
        $respuesta = TransporteTerrestreMdl::canp_registrar_transporte_terrestre_mdl($datosTransporte);
        return $respuesta; // Esto podría devolver, por ejemplo, un mensaje de éxito o error
    }

    // Función para leer los datos de todos los transportes terrestres
    public static function canp_leer_transportes_terrestres_ctr() {
        $respuesta = TransporteTerrestreMdl::canp_leer_transportes_terrestres_mdl();
        return $respuesta; // Devuelve los datos de los transportes terrestres o un mensaje de error
    }

    // Función para leer los datos de un transporte terrestre por ID
    public static function canp_leer_transporte_terrestre_id_ctr($idTransporte) {
        $respuesta = TransporteTerrestreMdl::canp_leer_transporte_terrestre_id_mdl($idTransporte);
        return $respuesta; // Devuelve los datos del transporte terrestre o un mensaje de error
    }

    // Función para actualizar los datos de un transporte terrestre
    public static function canp_actualizar_transporte_terrestre_ctr($datosTransporte) {
            // Validación de la placa: numérica y exactamente 6 caracteres
        if (!preg_match('/^\d{6}$/', $datosTransporte['placa'])) {
                echo json_encode(["error" => "La placa debe ser un valor numérico y contener exactamente 6 caracteres."]);
                return;
        }
        $respuesta = TransporteTerrestreMdl::canp_actualizar_transporte_terrestre_mdl($datosTransporte);
        return $respuesta; // Devuelve un mensaje de éxito o error
    }

    // Función para eliminar un transporte terrestre
    public static function canp_eliminar_transporte_terrestre_ctr($idTransporte) {

        $respuesta = TransporteTerrestreMdl::canp_eliminar_transporte_terrestre_mdl($idTransporte);
        return $respuesta; // Devuelve un mensaje de éxito o error
    }

}

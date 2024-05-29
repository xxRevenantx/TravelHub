<?php
class DestinoCtr {

// Función para registrar un destino
public static function canp_registrar_destino_ctr($datosDestino) {
    $respuesta = DestinoMdl::canp_registrar_destino_mdl($datosDestino);
    return $respuesta; // Esto podría devolver, por ejemplo, un mensaje de éxito o error
}

// Función para leer los datos de todos los destinos
public static function canp_leer_destinos_ctr() {
    $respuesta = DestinoMdl::canp_leer_destinos_mdl();
    return $respuesta; // Devuelve los datos de los destinos o un mensaje de error
}

// Función para leer los datos de un destino por ID
public static function canp_leer_destino_id_ctr($idDestino) {
    $respuesta = DestinoMdl::canp_leer_destino_id_mdl($idDestino);
    return $respuesta; // Devuelve los datos del destino o un mensaje de error
}
// Función para actualizar destinos
public static function canp_actualizar_destino_ctr($datosDestino) {
    $respuesta = DestinoMdl::canp_actualizar_destino_mdl($datosDestino);
    return $respuesta; // Devuelve los datos del destino o un mensaje de error
}



// Función para eliminar un destino
public static function canp_eliminar_destino_ctr($idDestino) {
    $respuesta = DestinoMdl::canp_eliminar_destino_mdl($idDestino);
    return $respuesta; // Devuelve un mensaje de éxito o error
}


/// ================ TIPOS DE DESTINOS =====================

  // Función para registrar un tipo de destino
  public static function canp_registrar_tipo_destino_ctr($datosTipoDestino) {
    $respuesta = DestinoMdl::canp_registrar_tipo_destino_mdl($datosTipoDestino);
    return $respuesta; // Esto podría devolver, por ejemplo, un mensaje de éxito o error
}

// Función para leer los datos de todos los tipos de destinos
public static function canp_leer_tipos_destinos_ctr() {
    $respuesta = DestinoMdl::canp_leer_tipos_destinos_mdl();
    return $respuesta; // Devuelve los datos de los tipos de destinos o un mensaje de error
}

// Función para leer los datos de un tipo de destino por ID
public static function canp_leer_tipo_destino_id_ctr($idTipoDestino) {
    $respuesta = DestinoMdl::canp_leer_tipo_destino_id_mdl($idTipoDestino);
    return $respuesta; // Devuelve los datos del tipo de destino o un mensaje de error
}

// Función para actualizar los datos de un tipo de destino
public static function canp_actualizar_tipo_destino_ctr($datosTipoDestino) {
    $respuesta = DestinoMdl::canp_actualizar_tipo_destino_mdl($datosTipoDestino);
    return $respuesta; // Devuelve un mensaje de éxito o error
}

// Función para eliminar un tipo de destino
public static function canp_validar_eliminacion_tipo_destino_ctr($idTipoDestino) {
    $respuesta = DestinoMdl::canp_validar_eliminacion_tipo_destino_mdl($idTipoDestino);
    return $respuesta; // Devuelve un mensaje de éxito o error
}


}
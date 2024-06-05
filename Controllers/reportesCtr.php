<?php

class ReportesCtr{

    // Función para leer los datos de Reportes
public static function canp_leer_reportes_ctr($datosReportes) {
    $respuesta = ReportesMdl::canp_leer_reportes_mdl($datosReportes);
    return $respuesta; // Devuelve los datos
}
    // Función para leer el mes
public static function canp_leer_mes_ctr($soloMes, $soloAnio) {
    $respuesta = ReportesMdl::canp_leer_mes_mdl($soloMes, $soloAnio);
    return $respuesta; // Devuelve los datos
}


    // Función para obtener el clientes por tipo de destino
public static function canp_leer_destino_cliente_ctr($idTipoDestinoCliente, $fechaVueloCliente, $idDestinoCliente) {
    $respuesta = ReportesMdl::canp_leer_destino_cliente_mdl($idTipoDestinoCliente, $fechaVueloCliente, $idDestinoCliente);
    return $respuesta; // Devuelve los datos 
}


}
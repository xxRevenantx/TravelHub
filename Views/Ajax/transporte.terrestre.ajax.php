<?php

require_once "../../Models/transporteTerrestreMdl.php";
require_once "../../Controllers/transporteTerrestreCtr.php";

class TransporteTerrestreAjax {

    // INSERTAR
    public $tipoTransporte;
    public $placa;
    public $capacidad;
    public $anioFabricacion;
    public $empresaPropietaria;

    // EDITAR
    public $idTransporte;
    // ACTUALIZAR
    public $idTransporteA;
    public $tipoTransporteA;
    public $placaA;
    public $capacidadA;
    public $anioFabricacionA;
    public $empresaPropietariaA;

    // ELIMINAR
    public $eliminarTransporte;

    // REGISTRAR TRANSPORTE TERRESTRE
    public function canp_registrar_transporte_terrestre_ajax() {
        $datosTransporte = [
            'tipo_transporte' => $this->tipoTransporte,
            'placa' => $this->placa,
            'capacidad_pasajeros' => $this->capacidad,
            'anio_fabricacion' => $this->anioFabricacion,
            'empresa_propietaria' => $this->empresaPropietaria
        ];
        $respuesta = TransporteTerrestreCtr::canp_registrar_transporte_terrestre_ctr($datosTransporte);
        echo json_encode($respuesta);
    }

    // LEER TRANSPORTE TERRESTRE
    public function canp_leer_transporte_terrestre_id_ajax() {
        $idTransporte = $_POST['idTransporte']; // El ID del transporte terrestre a leer, enviado desde AJAX
        $respuesta = TransporteTerrestreCtr::canp_leer_transporte_terrestre_id_ctr($idTransporte);
        echo json_encode($respuesta);
    }

    // ACTUALIZAR TRANSPORTE TERRESTRE
    public function canp_actualizar_transporte_terrestre_ajax() {
        $datosTransporte = [
            'id_transporteterrestre' => $this->idTransporteA,
            'tipo_transporte' => $this->tipoTransporteA,
            'placa' => $this->placaA,
            'capacidad_pasajeros' => $this->capacidadA,
            'anio_fabricacion' => $this->anioFabricacionA,
            'empresa_propietaria' => $this->empresaPropietariaA
        ];
        $respuesta = TransporteTerrestreCtr::canp_actualizar_transporte_terrestre_ctr($datosTransporte);
        echo json_encode($respuesta);
    }

    // ELIMINAR TRANSPORTE TERRESTRE
    public function canp_eliminar_transporte_terrestre_ajax() {
        $eliminarTransporte = $this->eliminarTransporte; // El ID del transporte terrestre a eliminar, enviado desde AJAX
        $respuesta = TransporteTerrestreCtr::canp_eliminar_transporte_terrestre_ctr($eliminarTransporte);
        echo json_encode($respuesta);
    }

}

// REGISTRAR TRANSPORTE TERRESTRE
if(isset($_POST["tipoTransporte"])) {
    $a = new TransporteTerrestreAjax();
    $a->tipoTransporte = $_POST["tipoTransporte"];
    $a->placa = $_POST["placa"];
    $a->capacidad = $_POST["capacidad"];
    $a->anioFabricacion = $_POST["anioFabricacion"];
    $a->empresaPropietaria = $_POST["empresaPropietaria"];
    $a->canp_registrar_transporte_terrestre_ajax();
}

// LEER TRANSPORTE TERRESTRE
if(isset($_POST["idTransporte"])) {
    $a = new TransporteTerrestreAjax();
    $a->idTransporte = $_POST["idTransporte"];
    $a->canp_leer_transporte_terrestre_id_ajax();
}

// ACTUALIZAR TRANSPORTE TERRESTRE
if(isset($_POST["idTransporteA"])) {
    $a = new TransporteTerrestreAjax();
    $a->idTransporteA = $_POST["idTransporteA"];
    $a->tipoTransporteA = $_POST["tipoTransporteA"];
    $a->placaA = $_POST["placaA"];
    $a->capacidadA = $_POST["capacidadA"];
    $a->anioFabricacionA = $_POST["anioFabricacionA"];
    $a->empresaPropietariaA = $_POST["empresaPropietariaA"];
    $a->canp_actualizar_transporte_terrestre_ajax();
}

// ELIMINAR TRANSPORTE TERRESTRE
if(isset($_POST["eliminarTransporte"])) {
    $a = new TransporteTerrestreAjax();
    $a->eliminarTransporte = $_POST["eliminarTransporte"];
    $a->canp_eliminar_transporte_terrestre_ajax();
}
?>

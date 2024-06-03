<?php

require_once "../../Models/reservasMdl.php";
require_once "../../Controllers/reservasCtr.php";

/* CLASE  */
class ReservasAjax {

    // INSERTAR
    public $clienteReserva;
    public $destinoReserva;
    public $tipoDestinoReserva;
    public $fecha_reserva;
    public $fecha_vuelo;

    // EDITAR
    public $idReservaEditar;

    // ACTUALIZAR
    public $idReservaA;
    public $clienteReservaA;
    public $destinoReservaA;
    public $tipoDestinoReservaA;
    public $fecha_reservaA;
    public $fecha_vueloA;

    // ELIMINAR
    public $eliminarReserva;

    // REGISTRAR RESERVA
    public function registrar_reserva_ajax() {
        if (empty($this->clienteReserva) || empty($this->destinoReserva) || empty($this->tipoDestinoReserva) || empty($this->fecha_reserva) || empty($this->fecha_vuelo)) {
            echo json_encode(["error" => "Todos los campos son obligatorios."]);
            return;
        }

        $datosReserva = [
            'clienteReserva' => $this->clienteReserva,
            'destinoReserva' => $this->destinoReserva,
            'tipoDestinoReserva' => $this->tipoDestinoReserva,
            'fecha_reserva' => $this->fecha_reserva,
            'fecha_vuelo' => $this->fecha_vuelo
        ];

        $respuesta = ReservasCtr::canp_registrar_reserva_ctr($datosReserva);
        echo json_encode($respuesta);
    }

    // LEER RESERVA
    public function leer_reserva_id_ajax() {
        $idReserva = $this->idReservaEditar;
        $respuesta = ReservasCtr::canp_leer_reserva_id_ctr($idReserva);
        echo json_encode($respuesta);
    }

    // ACTUALIZAR RESERVA
    public function actualizar_reserva_ajax() {
        if (empty($this->clienteReservaA) || empty($this->destinoReservaA) || empty($this->tipoDestinoReservaA) || empty($this->fecha_reservaA) || empty($this->fecha_vueloA)) {
            echo json_encode(["error" => "Todos los campos son obligatorios."]);
            return;
        }

        $datosReserva = [
            'idReserva' => $this->idReservaA,
            'clienteReserva' => $this->clienteReservaA,
            'destinoReserva' => $this->destinoReservaA,
            'tipoDestinoReserva' => $this->tipoDestinoReservaA,
            'fecha_reserva' => $this->fecha_reservaA,
            'fecha_vuelo' => $this->fecha_vueloA
        ];

        $respuesta = ReservasCtr::canp_actualizar_reserva_ctr($datosReserva);
        echo json_encode($respuesta);
    }

    // ELIMINAR RESERVA
    public function eliminar_reserva_ajax() {
        $eliminarReserva = $this->eliminarReserva; // El ID de la reserva a eliminar, enviado desde AJAX
        $respuesta = ReservasCtr::canp_eliminar_reserva_ctr($eliminarReserva);
        echo json_encode($respuesta);
    }
}

// REGISTRAR RESERVA
if (isset($_POST["clienteReserva"])) {
    $r = new ReservasAjax();
    $r->clienteReserva = $_POST["clienteReserva"];
    $r->destinoReserva = $_POST["destinoReserva"];
    $r->tipoDestinoReserva = $_POST["tipoDestinoReserva"];
    $r->fecha_reserva = $_POST["fecha_reserva"];
    $r->fecha_vuelo = $_POST["fecha_vuelo"];
    $r->registrar_reserva_ajax();
}

// LEER
if (isset($_POST["idReserva"])) {
    $r = new ReservasAjax();
    $r->idReservaEditar = $_POST["idReserva"];
    $r->leer_reserva_id_ajax();
}

// ACTUALIZAR
if (isset($_POST["idReservaA"])) {
    $r = new ReservasAjax();
    $r->idReservaA = $_POST["idReservaA"];
    $r->clienteReservaA = $_POST["clienteReservaA"];
    $r->destinoReservaA = $_POST["destinoReservaA"];
    $r->tipoDestinoReservaA = $_POST["tipoDestinoReservaA"];
    $r->fecha_reservaA = $_POST["fecha_reservaA"];
    $r->fecha_vueloA = $_POST["fecha_vueloA"];
    $r->actualizar_reserva_ajax();
}

// ELIMINAR
if (isset($_POST["eliminarReserva"])) {
    $r = new ReservasAjax();
    $r->eliminarReserva = $_POST["eliminarReserva"];
    $r->eliminar_reserva_ajax();
}
?>

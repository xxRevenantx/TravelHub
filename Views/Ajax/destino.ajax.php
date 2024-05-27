<?php

require_once "../../Models/destinosMdl.php";
require_once "../../Controllers/destinosCtr.php";

class DestinoAjax {

    // EDITAR
    public $idDestino;

    // REGISTRAR
    public $destino;
    public $avion1;
    public $avion2;
    public $transporte1;
    public $transporte2;
    public $pais;
    public $resena;
    public $coordenadas;

    // ACTUALIZAR
    public $idDestinoA;
    public $destinoA;
    public $avion1A;
    public $avion2A;
    public $transporte1A;
    public $transporte2A;
    public $paisA;
    public $resenaA;
    public $coordenadasA;

    // ELIMINAR
    public $eliminarDestino;

    // REGISTRAR DESTINO
    public function canp_registrar_destino_ajax() {
        $datosDestino = [
            'destino' => $this->destino,
            'avion1' => $this->avion1,
            'avion2' => $this->avion2,
            'transporte1' => $this->transporte1,
            'transporte2' => $this->transporte2,
            'pais' => $this->pais,
            'resena' => $this->resena,
            'coordenadas' => $this->coordenadas
        ];
        $respuesta = DestinoCtr::canp_registrar_destino_ctr($datosDestino);
        echo json_encode($respuesta);
    }

    // LEER DESTINO POR ID
    public function canp_leer_destino_id_ajax() {
        $idDestino = $this->idDestino; // El ID del destino a leer, enviado desde AJAX
        $respuesta = DestinoCtr::canp_leer_destino_id_ctr($idDestino);
        echo json_encode($respuesta);
    }

    // ACTUALIZAR DESTINO
    public function canp_actualizar_destino_ajax() {
        $datosDestino = [
            'id' => $this->idDestinoA,
            'destino' => $this->destinoA,
            'avion1' => $this->avion1A,
            'avion2' => $this->avion2A,
            'transporte1' => $this->transporte1A,
            'transporte2' => $this->transporte2A,
            'pais' => $this->paisA,
            'resena' => $this->resenaA,
            'coordenadas' => $this->coordenadasA
        ];
        $respuesta = DestinoCtr::canp_actualizar_destino_ctr($datosDestino);
        echo json_encode($respuesta);
    }

    // ELIMINAR DESTINO
    public function canp_eliminar_destino_ajax() {
        $eliminarDestino = $this->eliminarDestino;
        $respuesta = DestinoCtr::canp_eliminar_destino_ctr($eliminarDestino);
        echo json_encode($respuesta);
    }
}

// REGISTRAR DESTINO
if (isset($_POST["destino"])) {
    $d = new DestinoAjax();
    $d->destino = $_POST["destino"];
    $d->avion1 = $_POST["avion1"];
    $d->avion2 = $_POST["avion2"];
    $d->transporte1 = $_POST["transporte1"];
    $d->transporte2 = $_POST["transporte2"];
    $d->pais = $_POST["pais"];
    $d->resena = $_POST["resena"];
    $d->coordenadas = $_POST["coordenadas"];
    $d->canp_registrar_destino_ajax();
}

// LEER POR ID
if (isset($_POST["idDestino"])) {
    $d = new DestinoAjax();
    $d->idDestino = $_POST["idDestino"];
    $d->canp_leer_destino_id_ajax();
}

// ACTUALIZAR
if (isset($_POST["destinoA"])) {
    $d = new DestinoAjax();
    $d->idDestinoA = $_POST["idDestinoA"];
    $d->destinoA = $_POST["destinoA"];
    $d->avion1A = $_POST["avion1A"];
    $d->avion2A = $_POST["avion2A"];
    $d->transporte1A = $_POST["transporte1A"];
    $d->transporte2A = $_POST["transporte2A"];
    $d->paisA = $_POST["paisA"];
    $d->resenaA = $_POST["resenaA"];
    $d->coordenadasA = $_POST["coordenadasA"];
    $d->canp_actualizar_destino_ajax();
}

// ELIMINAR
if (isset($_POST["eliminarDestino"])) {
    $d = new DestinoAjax();
    $d->eliminarDestino = $_POST["eliminarDestino"];
    $d->canp_eliminar_destino_ajax();
}

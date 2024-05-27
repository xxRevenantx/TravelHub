<?php

require_once "../../Models/destinosMdl.php";
require_once "../../Controllers/destinosCtr.php";

class TipoDestinoAjax {

    //EDITAR
    public $idTipoDestino;

    // REGISTRAR

    public $nombreDestino;
    public $actividadesPopulares;
    public $epocaSugerida;


    //ACTUALIZAR
    public $idA;
    public $nombreDestinoA;
    public $actividadesPopularesA;
    public $epocaSugeridaA;

    // ELIMINAR
    public $eliminarTipoDestino;

    // REGISTRAR TIPO DE DESTINO
    public function canp_registrar_tipo_destino_ajax() {
        $datosTipoDestino = [
            'nombreDestino' => $this->nombreDestino,
            'actividadesPopulares' => $this->actividadesPopulares,
            'epocaSugerida' => $this->epocaSugerida
        ];
        $respuesta = DestinoCtr::canp_registrar_tipo_destino_ctr($datosTipoDestino);
        echo json_encode($respuesta);
    }

    // LEER TIPO DE DESTINO POR ID
    public function canp_leer_tipo_destino_id_ajax() {
        $idTipoDestino = $this->idTipoDestino; // El ID del tipo de destino a leer, enviado desde AJAX
        $respuesta = DestinoCtr::canp_leer_tipo_destino_id_ctr($idTipoDestino);
        echo json_encode($respuesta);
    }

    // ACTUALIZAR TIPO DE DESTINO
    public function canp_actualizar_tipo_destino_ajax() {
        $datosTipoDestino = [
            'id' => $this->idA,
            'nombreDestino' => $this->nombreDestinoA,
            'actividadesPopulares' => $this->actividadesPopularesA,
            'epocaSugerida' => $this->epocaSugeridaA
        ];
        $respuesta = DestinoCtr::canp_actualizar_tipo_destino_ctr($datosTipoDestino);
        echo json_encode($respuesta);
    }

    // ELIMINAR TIPO DE DESTINO
    public function canp_eliminar_tipo_destino_ajax() {
        $eliminarTipoDestino = $this->eliminarTipoDestino;
        $respuesta = DestinoCtr::canp_eliminar_tipo_destino_ctr($eliminarTipoDestino);
        echo json_encode($respuesta);
    }
}

// REGISTRAR TIPO DE DESTINO
if (isset($_POST["nombreDestino"])) {
    $td = new TipoDestinoAjax();
    $td->nombreDestino = $_POST["nombreDestino"];
    $td->actividadesPopulares = $_POST["actividadesPopulares"];
    $td->epocaSugerida = $_POST["epocaSugerida"];
    $td->canp_registrar_tipo_destino_ajax();
}

// LEER POR ID
if (isset($_POST["idTipoDestino"])) {
    $td = new TipoDestinoAjax();
    $td->idTipoDestino = $_POST["idTipoDestino"];
    $td->canp_leer_tipo_destino_id_ajax();
}

// ACTUALIZAR
if (isset($_POST["nombreDestinoA"])) {
    $td = new TipoDestinoAjax();
    $td->idA = $_POST["idA"];
    $td->nombreDestinoA = $_POST["nombreDestinoA"];
    $td->actividadesPopularesA = $_POST["actividadesPopularesA"];
    $td->epocaSugeridaA = $_POST["epocaSugeridaA"];
    $td->canp_actualizar_tipo_destino_ajax();
}

// ELIMINAR
if (isset($_POST["eliminarTipoDestino"])) {
    $td = new TipoDestinoAjax();
    $td->eliminarTipoDestino = $_POST["eliminarTipoDestino"];
    $td->canp_eliminar_tipo_destino_ajax();
}

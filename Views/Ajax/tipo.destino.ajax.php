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
          // Convertir a minúsculas para hacer la validación insensible a mayúsculas y minúsculas
          $epocaSugeridaNormalizada = strtolower($this->epocaSugerida);

          // Lista de épocas válidas
          $epocasValidas = ['primavera', 'verano', 'otoño', 'invierno'];
  
          // Validar que la época sugerida sea una de las permitidas
          if (!in_array($epocaSugeridaNormalizada, $epocasValidas)) {
              echo json_encode(['error' => 'La época sugerida debe ser Primavera, Verano, Otoño o Invierno.']);
              return;
          }

          // Lista de actividades válidas
        $actividadesValidas = [
            'paseo en lancha',
            'tour por la ciudad',
            'recorrido del centro histórico',
            'visita a museos',
            'visita a acuarios'
        ];

        // Convertir a minúsculas para hacer la validación insensible a mayúsculas y minúsculas
        $actividadesPopularesNormalizadas = strtolower($this->actividadesPopulares);

        // Validar que las actividades populares sean una de las permitidas
        if (!in_array($actividadesPopularesNormalizadas, $actividadesValidas)) {
            echo json_encode(['error' => 'Las actividades populares deben ser una de las siguientes: paseo en lancha, tour por la ciudad, recorrido del centro histórico, visita a museos, visita a acuarios.']);
            return;
        }

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
             // Convertir a minúsculas para hacer la validación insensible a mayúsculas y minúsculas
          $epocaSugeridaNormalizada = strtolower($this->epocaSugeridaA);

          // Lista de épocas válidas
          $epocasValidas = ['primavera', 'verano', 'otoño', 'invierno'];
  
          // Validar que la época sugerida sea una de las permitidas
          if (!in_array($epocaSugeridaNormalizada, $epocasValidas)) {
              echo json_encode(['error' => 'La época sugerida debe ser Primavera, Verano, Otoño o Invierno.']);
              return;
          }


            // Lista de actividades válidas
            $actividadesValidas = [
                'paseo en lancha',
                'tour por la ciudad',
                'recorrido del centro histórico',
                'visita a museos',
                'visita a acuarios'
            ];

            // Convertir a minúsculas para hacer la validación insensible a mayúsculas y minúsculas
            $actividadesPopularesNormalizadas = strtolower($this->actividadesPopularesA);

            // Validar que las actividades populares sean una de las permitidas
            if (!in_array($actividadesPopularesNormalizadas, $actividadesValidas)) {
                echo json_encode(['error' => 'Las actividades populares deben ser una de las siguientes: paseo en lancha, tour por la ciudad, recorrido del centro histórico, visita a museos, visita a acuarios.']);
                return;
            }


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
        $respuesta = DestinoCtr::canp_validar_eliminacion_tipo_destino_ctr($eliminarTipoDestino);
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
    $td->eliminarTipoDestino = intval($_POST["eliminarTipoDestino"]);
    $td->canp_eliminar_tipo_destino_ajax();
}

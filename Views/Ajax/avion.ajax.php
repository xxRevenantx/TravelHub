
<?php

require_once "../../Models/avionMdl.php";
require_once "../../Controllers/avionCtr.php";

        
/* CLASE  */
        
class AvionAjax{


   // INSERTAR
   public $numeroSerie;
   public $modelo;
   public $capacidadAsientos;
   public $empresaPropietaria;

   // EDITAR
   public $idAvion;
   // ACTUALIZAR
   public $idAvionA;
   public $numeroSerieA;
   public $modeloA;
   public $capacidadAsientosA;
   public $empresaPropietariaA;

   // EDITAR
   public $eliminarAvion;



   // REGISTRAR AVIÓN
   public function canp_registrar_avion_ajax(){

    
    // Validación del número de serie: alfanumérico y exactamente 10 caracteres
    if (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9]{10}$/', $this->numeroSerie)) {
        echo json_encode(["error" => "El número de serie debe ser alfanumérico y contener exactamente 10 caracteres, incluyendo al menos una letra y un número."]);
        return;
    }

        $datosAvion = [
            'numeroSerie' => $this->numeroSerie,
            'modelo' => $this->modelo,
            'capacidadAsientos' => $this->capacidadAsientos,
            'empresaPropietaria' => $this->empresaPropietaria
        ];


        $respuesta = AvionCtr::canp_registrar_avion_ctr($datosAvion);
        echo json_encode($respuesta);
    }

   // LEER AVIÓN
    public function canp_leer_avion_id_ajax(){
        $idAvion = $_POST['idAvion']; // El ID del avión a leer, enviado desde AJAX
        $respuesta = AvionCtr::canp_leer_avion_id_ctr($idAvion);
        echo json_encode($respuesta);
    }

    // ACTUALIZAR AVIÓN
    public function canp_actualizar_avion_ajax(){

    // Validación del número de serie: alfanumérico y exactamente 10 caracteres
    if (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9]{10}$/', $this->numeroSerieA)) {
        echo json_encode(["error" => "El número de serie debe ser alfanumérico y contener exactamente 10 caracteres, incluyendo al menos una letra y un número."]);
        return;
    }

    
        $datosAvion = [
            'idAvion' => $this->idAvionA,
            'numeroSerie' => $this->numeroSerieA,
            'modelo' => $this->modeloA,
            'capacidadAsientos' => $this->capacidadAsientosA,
            'empresaPropietaria' => $this->empresaPropietariaA
        ];
        $respuesta = AvionCtr::canp_actualizar_avion_ctr($datosAvion);
        echo json_encode($respuesta);
    }

    // ELIMINAR AVIÓN
    public function canp_eliminar_avion_ajax(){
        $eliminarAvion = $this->eliminarAvion; // El ID del avión a eliminar, enviado desde AJAX
        $respuesta = AvionCtr::canp_eliminar_avion_ctr($eliminarAvion);
        echo json_encode($respuesta);
    }


}


// REGISTRAR AVIÓN
if(isset($_POST["numeroSerie"])) {
    $a = new AvionAjax();
    $a->numeroSerie = $_POST["numeroSerie"];
    $a->modelo = $_POST["modelo"];
    $a->capacidadAsientos = $_POST["capacidadAsientos"];
    $a->empresaPropietaria = $_POST["empresaPropietaria"];
    $a->canp_registrar_avion_ajax();
}
// LEER
if(isset($_POST["idAvion"])) {
    $a = new AvionAjax();
    $a->idAvion = $_POST["idAvion"];
    $a->canp_leer_avion_id_ajax();
}

// ACTUALIZAR
if(isset($_POST["idAvionA"])) {
    $a = new AvionAjax();
    $a->idAvionA = $_POST["idAvionA"];  
    $a->numeroSerieA = $_POST["numeroSerieA"];
    $a->modeloA = $_POST["modeloA"];
    $a->capacidadAsientosA = $_POST["capacidadAsientosA"];
    $a->empresaPropietariaA = $_POST["empresaPropietariaA"];
    $a->canp_actualizar_avion_ajax();
}

if(isset($_POST["eliminarAvion"])) {
    $a = new AvionAjax();
    $a->eliminarAvion = $_POST["eliminarAvion"]; 
    $a->canp_eliminar_avion_ajax();
}
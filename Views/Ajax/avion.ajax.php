
<?php

require_once "../../Models/avionMdl.php";
require_once "../../Controllers/avionCtr.php";


require_once "../../App/funciones.php";
        
/* CLASE  */
        
class AvionAjax{


   // SUPERVISOR
   public $numeroSerie;
   public $modelo;
   public $capacidadAsientos;
   public $empresaPropietaria;

   // REGISTRAR AVIÓN
   public function canp_registrar_avion_ajax(){
    $datosAvion = [
        'numeroSerie' => $this->numeroSerie,
        'modelo' => $this->modelo,
        'capacidadAsientos' => $this->capacidadAsientos,
        'empresaPropietaria' => $this->empresaPropietaria
    ];
    //   $respuesta = AvionCtr::canp_registrar_avion_ctr();
      echo json_encode($datosAvion);
   }

   // LEER AVIÓN
    public function canp_leer_avion_ajax(){
        $idAvion = $_POST['idAvion']; // El ID del avión a leer, enviado desde AJAX
        $respuesta = AvionCtr::canp_leer_avion_ctr($idAvion);
        echo json_encode($respuesta);
    }

    // ACTUALIZAR AVIÓN
    public function canp_actualizar_avion_ajax(){
        $respuesta = AvionCtr::canp_actualizar_avion_ctr($_POST);
        echo json_encode($respuesta);
    }

    // ELIMINAR AVIÓN
    public function canp_eliminar_avion_ajax(){
        $idAvion = $_POST['idAvion']; // El ID del avión a eliminar, enviado desde AJAX
        $respuesta = AvionCtr::canp_eliminar_avion_ctr($idAvion);
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
if(isset($_POST["btnLeerAvion"])) {
    $a = new AvionAjax();
    $a->numeroSerie = $_POST["numeroSerie"];
    $a->canp_leer_avion_ajax();
}

// ACTUALIZAR
if(isset($_POST["btnActualizarAvion"])) {
    $a = new AvionAjax();
    $a->id = $_POST["id"];  // Asumiendo que 'id' es un campo oculto en tu formulario de actualización
    $a->numeroSerie = $_POST["numeroSerie"];
    $a->modelo = $_POST["modelo"];
    $a->capacidadAsientos = $_POST["capacidadAsientos"];
    $a->empresaPropietaria = $_POST["empresaPropietaria"];
    $a->canp_actualizar_avion_ajax();
}

if(isset($_POST["btnEliminarAvion"])) {
    $a = new AvionAjax();
    $a->id = $_POST["id"];  // Asumiendo que 'id' es un campo oculto o de alguna forma se ha enviado al servidor
    $a->canp_eliminar_avion_ajax();
}
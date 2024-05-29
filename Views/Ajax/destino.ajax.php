<?php

require_once "../../Models/destinosMdl.php";
require_once "../../Controllers/destinosCtr.php";



class DestinoAjax {

    // EDITAR
    public $idDestino;

    // REGISTRAR
    public $destino;
    public $tipodestino;
    public $avion1;
    public $avion2;
    public $transporte1;
    public $transporte2;
    public $pais;
    public $resena;
    public $coordenadas;
    public $imagen;
    public $tmp;

    // ACTUALIZAR
    public $idDestinoActualizar;
    public $destinoA;
    public $tipodestinoA;
    public $avion1A;
    public $avion2A;
    public $transporte1A;
    public $transporte2A;
    public $paisA;
    public $resenaA;
    public $coordenadasA;
    public $imagenA;
    public $tmpA;
    public $imagenDB;

    // ELIMINAR
    public $eliminarDestino;

    // REGISTRAR DESTINO
    public function canp_registrar_destino_ajax() {

         // Manejar la imagen
         if(isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0) {
            $nombreArchivo =  $this->imagen;
            $archivoTmp =     $this->tmp;
            $directorioDestino = "../../Views/assets/imagenes/destinos/";
            $rutaArchivo = $directorioDestino . basename($nombreArchivo);

            // Crear el directorio si no existe
            if (!file_exists($directorioDestino)) {
                mkdir($directorioDestino, 0777, true);
            }

            // Mover el archivo subido al directorio de destino
            if(move_uploaded_file($archivoTmp, $rutaArchivo)) {
                // Guardar la ruta del archivo en la base de datos
            
                    $datosDestino = [
                        'destino' => $this->destino,
                        'tipodestino' => $this->tipodestino,
                        'avion1' => $this->avion1,
                        'avion2' => $this->avion2,
                        'transporte1' => $this->transporte1,
                        'transporte2' => $this->transporte2,
                        'pais' => $this->pais,
                        'resena' => $this->resena,
                        'coordenadas' => $this->coordenadas,
                        'imagen' => $rutaArchivo // Ruta del archivo en el servidor

                    ];
                $respuesta = DestinoCtr::canp_registrar_destino_ctr($datosDestino);
                echo json_encode($respuesta);
            } else {
                echo json_encode(["error" => "Error al mover el archivo"]);
            }
        } else {
            echo json_encode(["error" => "Error al cargar la imagen"]);
        }
    }


    // LEER DESTINO POR ID
    public function canp_leer_destino_id_ajax() {
        $idDestino = $this->idDestino; // El ID del destino a leer, enviado desde AJAX
        $respuesta = DestinoCtr::canp_leer_destino_id_ctr($idDestino);
        echo json_encode($respuesta);
    }

    // ACTUALIZAR DESTINO
    public function canp_actualizar_destino_ajax() {

             // Manejar la imagen
             if(isset($_FILES["imagenA"]) && $_FILES["imagenA"]["error"] == 0) {
                $nombreArchivo =  $this->imagenA;
                $archivoTmp =     $this->tmpA;
                $directorioDestino = "../../Views/assets/imagenes/destinos/";
                $rutaArchivo = $directorioDestino . basename($nombreArchivo);
    
                // Crear el directorio si no existe
                if (!file_exists($directorioDestino)) {
                    mkdir($directorioDestino, 0777, true);
                }
    
                // Mover el archivo subido al directorio de destino
                if(move_uploaded_file($archivoTmp, $rutaArchivo)) {
                    // Guardar la ruta del archivo en la base de datos
                    $datosDestino = [
                        'id' => $this->idDestinoActualizar,
                        'destino' => $this->destinoA,
                        'tipodestino' => $this->tipodestinoA,
                        'avion1' => $this->avion1A,
                        'avion2' => $this->avion2A,
                        'transporte1' => $this->transporte1A,
                        'transporte2' => $this->transporte2A,
                        'pais' => $this->paisA,
                        'resena' => $this->resenaA,
                        'coordenadas' => $this->coordenadasA,
                        'imagen' => $rutaArchivo // Ruta del archivo en el servidor
                    ];
                    $respuesta = DestinoCtr::canp_actualizar_destino_ctr($datosDestino);
                    echo json_encode($respuesta);
                } else {
                    echo json_encode(["error" => "Error al mover el archivo"]);
                }
            } else {
                // Guardar la ruta del archivo en la base de datos
                $datosDestino = [
                    'id' => $this->idDestinoActualizar,
                    'destino' => $this->destinoA,
                    'tipodestino' => $this->tipodestinoA,
                    'avion1' => $this->avion1A,
                    'avion2' => $this->avion2A,
                    'transporte1' => $this->transporte1A,
                    'transporte2' => $this->transporte2A,
                    'pais' => $this->paisA,
                    'resena' => $this->resenaA,
                    'coordenadas' => $this->coordenadasA,
                    'imagen' => $this->imagenDB // Ruta del archivo en el servidor
                ];
                    $respuesta = DestinoCtr::canp_actualizar_destino_ctr($datosDestino);
                    echo json_encode($respuesta);
            }




      
      
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
    $d->tipodestino = $_POST["tipodestino"];
    $d->avion1 = $_POST["avion1"];
    $d->avion2 = $_POST["avion2"];
    $d->transporte1 = $_POST["transporte1"];
    $d->transporte2 = $_POST["transporte2"];
    $d->pais = $_POST["pais"];
    $d->resena = $_POST["resena"];
    $d->coordenadas = $_POST["coordenadas"];
    $d->imagen = !empty($_FILES["imagen"]["name"])?$_FILES["imagen"]["name"]:"";
    $d->tmp = !empty($_FILES["imagen"]["tmp_name"])?$_FILES["imagen"]["tmp_name"]:"";
    $d->canp_registrar_destino_ajax();
}

// LEER POR ID
if (isset($_POST["idDestino"])) {
    $d = new DestinoAjax();
    $d->idDestino = $_POST["idDestino"];
    $d->canp_leer_destino_id_ajax();
}

// ACTUALIZAR
if (isset($_POST["idDestinoActualizar"])) {
    $d = new DestinoAjax();
    $d->idDestinoActualizar = $_POST["idDestinoActualizar"];
    $d->destinoA = $_POST["destinoA"];
    $d->tipodestinoA = $_POST["tipodestinoA"];
    $d->avion1A = $_POST["avion1A"];
    $d->avion2A = $_POST["avion2A"];
    $d->transporte1A = $_POST["transporte1A"];
    $d->transporte2A = $_POST["transporte2A"];
    $d->paisA = $_POST["paisA"];
    $d->resenaA = $_POST["resenaA"];
    $d->coordenadasA = $_POST["coordenadasA"];
    $d->imagenDB = $_POST["imagenDB"];
    $d->imagenA = !empty($_FILES["imagenA"]["name"])?$_FILES["imagenA"]["name"]:"";
    $d->tmpA = !empty($_FILES["imagenA"]["tmp_name"])?$_FILES["imagenA"]["tmp_name"]:"";
    $d->canp_actualizar_destino_ajax();
}

// ELIMINAR
if (isset($_POST["eliminarDestino"])) {
    $d = new DestinoAjax();
    $d->eliminarDestino = $_POST["eliminarDestino"];
    $d->canp_eliminar_destino_ajax();
}

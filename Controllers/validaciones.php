<?php

class Validaciones {

      // Función para limpiar los inputs
    static public function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
        

    // Validacion Destinos
    static public function DestinoCtr(){

        // Verificar si el formulario ha sido enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnDestino'])) {
            try {
                // Recuperar datos del formulario
                $destino = $_POST['destino'] ?? '';
                $avion1 = $_POST['avion1'] ?? '';
                $avion2 = $_POST['avion2'] ?? '';
                $transporte1 = $_POST['transporte1'] ?? '';
                $transporte2 = $_POST['transporte2'] ?? '';
                $pais = $_POST['pais'] ?? '';
                $resena = $_POST['resena'] ?? '';
                $coordenadas = $_POST['coordenadas'] ?? '';
        
                $errores = [];
        
                // Validaciones básicas
                if (empty($destino)) {
                    $errores[] = "* El nombre del destino es requerido.";
                }
                if (empty($avion1)) {
                    $errores[] = "* El campo Avión 1 es requerido.";
                }
                if (empty($avion2)) {
                    $errores[] = "* El campo Avión 2 es requerido.";
                }
                if (empty($transporte1)) {
                    $errores[] = "* El transporte terrestre 1 es requerido.";
                }
                if (empty($transporte2)) {
                    $errores[] = "* El transporte terrestre 2 es requerido.";
                }
                if (empty($pais)) {
                    $errores[] = "* El país es requerido.";
                }
                if (empty($resena)) {
                    $errores[] = "* La reseña es requerida.";
                }
                if (empty($coordenadas) || !preg_match("/^[-+]?[0-9]*\.?[0-9]+,\s*[-+]?[0-9]*\.?[0-9]+$/", $coordenadas)) {
                    $errores[] = "* Las coordenadas deben tener un formato válido (ej. 35.6895, 139.6917).";
                }
        
                // Mostrar errores o procesar datos
                if (count($errores) > 0) {
                    foreach ($errores as $error) {
                        echo "<div style='color: red;'>$error</div>";
                    }
                } else {
                    echo "<div class='alert-validacion success'>&#x2714; Destino validado correctamente.</div>";
                }
            } catch (Exception $e) {
                echo "<div style='color: red;'>Error: " . $e->getMessage() . "</div>";
            }
        }
        
    }


    // Validación Tipo de Destino
    static public function TipoDestinoCtr(){
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btntTipoDestino'])) {
            try {
                // Recuperar datos del formulario
                $nombreDestino = $_POST['nombreDestino'] ?? '';
                $actividadesPopulares = $_POST['actividadesPopulares'] ?? '';
                $epocaSugerida = $_POST['epocaSugerida'] ?? '';
        
                $errores = [];
        
                // Validaciones básicas
                if (empty($nombreDestino)) {
                    $errores[] = "* El nombre del destino es requerido.";
                }
                if (empty($actividadesPopulares)) {
                    $errores[] = "* Las actividades populares son requeridas.";
                }
                if (empty($epocaSugerida)) {
                    $errores[] = "* La época sugerida es requerida.";
                }
        
                // Mostrar errores o procesar datos
                if (count($errores) > 0) {
                    foreach ($errores as $error) {
                        echo "<div style='color: red;'>$error</div>";
                    }
                } else {
                    echo "<div class='alert-validacion success'>&#x2714; Tipo de Destino validado correctamente.</div>";
                }
            } catch (Exception $e) {
                // Manejar la excepción
                echo "<div style='color: red;'>Error: " . $e->getMessage() . "</div>";
            }
        }
    }


    // Validación del Transporte Terrestre
    static public function TransporteTerrestreCtr(){

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnTransporteTerrestre'])) {
            try {
                // Clase Validaciones supuesta para limpiar los inputs
                $tipoTransporte = Validaciones::clean_input($_POST["tipoTransporte"]);
                $placa = Validaciones::clean_input($_POST["placa"]);
                $capacidad = $_POST["capacidad"];
                $anioFabricacion = $_POST["anioFabricacion"];
                $empresa = Validaciones::clean_input($_POST["empresa"]);
            
                // Iniciar las validaciones
                $errores = [];
            
                // Validar tipo de transporte
                if (empty($tipoTransporte)) {
                    $errores[] = "* El tipo de transporte es obligatorio.";
                } elseif (!preg_match("/^[a-zA-Z\s]+$/", $tipoTransporte)) {
                    $errores[] = "* El tipo de transporte solo puede contener letras y espacios.";
                }
            
                // Validar placa
                if (empty($placa)) {
                    $errores[] = "* La placa es obligatoria.";
                } elseif (!preg_match("/^[a-zA-Z0-9]+$/", $placa)) {
                    $errores[] = "* La placa solo puede contener letras y números sin espacios.";
                }
            
                // Validar capacidad de pasajeros
                if (!filter_var($capacidad, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1, "max_range" => 80]])) {
                    $errores[] = "* La capacidad de pasajeros debe ser un número entero entre 1 y 80.";
                }
            
                // Validar año de fabricación
                if (!filter_var($anioFabricacion, FILTER_VALIDATE_INT, ["options" => ["min_range" => 2000, "max_range" => 2024]])) {
                    $errores[] = "* El año de fabricación debe ser un número entero entre 2000 y 2024.";
                }
            
                // Validar empresa propietaria
                if (empty($empresa)) {
                    $errores[] = "* El nombre de la empresa propietaria es obligatorio.";
                } elseif (!preg_match("/^[a-zA-Z\s]+$/", $empresa)) {
                    $errores[] = "* El nombre de la empresa solo puede contener letras y espacios.";
                }
            
                // Verificar si hay errores
                if (!empty($errores)) {
                    foreach ($errores as $error) {
                        echo "<p style='color: red;'>$error</p>";
                    }
                } else {
                    echo "<div class='alert-validacion success'>&#x2714; Transporte validado correctamente.</div>";
                }
            } catch (Exception $e) {
                // Manejar la excepción
                echo "<div style='color: red;'>Error en el proceso: " . $e->getMessage() . "</div>";
            }
        }


    }


    // Validación del Avión
    static public function AvionCtr(){
        // Verificar si el formulario ha sido enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $numeroSerie = $_POST['numeroSerie'] ?? '';
                $modelo = $_POST['modelo'] ?? '';
                $capacidadAsientos = $_POST['capacidadAsientos'] ?? '';
                $empresaPropietaria = $_POST['empresaPropietaria'] ?? '';

                $errores = [];

                // Validación del número de serie
                if (empty($numeroSerie)) {
                    $errores[] = "* El número de serie es requerido.";
                } elseif (!preg_match("/^[0-9A-Z]{12}$/", $numeroSerie)) {
                    $errores[] = "* El número de serie debe tener 12 caracteres alfanuméricos.";
                }

                // Validación del modelo
                if (empty($modelo)) {
                    $errores[] = "* El modelo es requerido.";
                } elseif (!preg_match("/^[a-zA-Z0-9 ]+$/", $modelo)) {
                    $errores[] = "* El modelo solo puede contener letras, números y espacios.";
                }

                // Validación de la capacidad de asientos
                if (empty($capacidadAsientos)) {
                    $errores[] = "* La capacidad de asientos es requerida.";
                } elseif (!filter_var($capacidadAsientos, FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 80)))) {
                    $errores[] = "* La capacidad de asientos debe ser un número entre 1 y 80.";
                }

                // Validación de la empresa propietaria
                if (empty($empresaPropietaria)) {
                    $errores[] = "* La empresa propietaria es requerida.";
                } elseif (!preg_match("/^[a-zA-Z0-9 ]+$/", $empresaPropietaria)) {
                    $errores[] = "* La empresa propietaria solo puede contener letras, números y espacios.";
                }

                // Mostrar errores o procesar datos
                if (count($errores) > 0) {
                    foreach ($errores as $error) {
                        echo "<div style='color: red;'>$error</div>";
                    }
                } else {
                    echo "<div class='alert-validacion success'>&#x2714; Avión validado correctamente.</div>";
                }
            } catch (Exception $e) {
                // Manejar la excepción
                echo "<div style='color: red;'>Error: " . $e->getMessage() . "</div>";
            }
        }
    }


    // Validación del Cliente
    static public function ClienteCtr(){
  
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnCliente'])) {
            try {
                // Recuperar datos del formulario
                $nombre = $_POST['nombre'] ?? '';
                $primerApellido = $_POST['primerApellido'] ?? '';
                $segundoApellido = $_POST['segundoApellido'] ?? '';
                $rfc = $_POST['rfc'] ?? '';
                $curp = $_POST['curp'] ?? '';
                $fechaRegistro = $_POST['fechaRegistro'] ?? '';
        
                $errores = [];
        
                // Validaciones
                if (empty($nombre) || !preg_match("/^[a-zA-Z ]+$/", $nombre)) {
                    $errores[] = "* El nombre solo debe contener letras.";
                }
                if (empty($primerApellido) || !preg_match("/^[a-zA-Z ]+$/", $primerApellido)) {
                    $errores[] = "* El primer apellido solo debe contener letras.";
                }
                if (empty($segundoApellido) || !preg_match("/^[a-zA-Z ]+$/", $segundoApellido)) {
                    $errores[] = "* El segundo apellido solo debe contener letras.";
                }
                if (empty($rfc) || !preg_match("/^[A-Z0-9]{13}$/", $rfc)) {
                    $errores[] = "* El RFC debe tener una longitud exacta de 13 caracteres alfanuméricos.";
                }
                if (empty($curp) || !preg_match("/^[A-Z0-9]{18}$/", $curp)) {
                    $errores[] = "* La CURP debe tener una longitud exacta de 18 caracteres alfanuméricos.";
                }
                if (empty($fechaRegistro) || !preg_match("/^\d{4}-\d{2}-\d{2}$/", $fechaRegistro)) {
                    $errores[] = "* La fecha de registro debe seguir el formato AAAA-MM-DD.";
                }
        
                // Mostrar errores o procesar datos
                if (count($errores) > 0) {
                    foreach ($errores as $error) {
                        echo "<div style='color: red;'>$error</div>";
                    }
                } else {
                    echo "<div class='alert-validacion success'>&#x2714; Cliente validado correctamente.</div>";
                }
            } catch (Exception $e) {
                echo "<div style='color: red;'>Error: " . $e->getMessage() . "</div>";
            }
        }

        
    }
}
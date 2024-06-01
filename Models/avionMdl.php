<?php
include_once "CANP_conexion.php";
class AvionMdl {

// Función para registrar un nuevo avión
public static function canp_registrar_avion_mdl($datosAvion) {
    try {

           // Validación básica en el modelo 
        if (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9]{10}$/', $datosAvion['numeroSerie'])) {
        return false;
        }
        
        $db = Conexion::conectar();
        $sql = "INSERT INTO tblavion (numero_serie, modelo, capacidad_asientos, empresa_propietaria) VALUES (:numeroSerie, :modelo, :capacidadAsientos, :empresaPropietaria)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':numeroSerie', $datosAvion["numeroSerie"]);
        $stmt->bindParam(':modelo', $datosAvion["modelo"]);
        $stmt->bindParam(':capacidadAsientos', $datosAvion["capacidadAsientos"]);
        $stmt->bindParam(':empresaPropietaria', $datosAvion["empresaPropietaria"]);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    
       
    } catch (PDOException $e) {
        return "Error al registrar el avión: " . $e->getMessage();
    }
}

// Función para leer los datos de un avión específico
public static function canp_leer_avion_id_mdl($avion) {
    try {
        $db = Conexion::conectar();
        $sql = "SELECT * FROM tblavion WHERE id_avion = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $avion);
        $stmt->execute();
        return $stmt->fetch();
    } catch (PDOException $e) {
        return "Error al leer datos del avión: " . $e->getMessage();
    }
}
// Función para leer los datos de un avión 
public static function canp_leer_aviones_mdl() {
    try {
        $db = Conexion::conectar();
        $sql = "SELECT * FROM tblavion";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        return "Error al leer datos del avión: " . $e->getMessage();
    }
}

// Función para actualizar un avión
public static function canp_actualizar_avion_mdl($datosAvion) {
    try {
        if (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9]{10}$/', $datosAvion['numeroSerie'])) {
            return false;
        }
      
        $db = Conexion::conectar();
        $sql = "UPDATE tblavion SET numero_serie =:numero_serie, modelo = :modelo, capacidad_asientos = :capacidadAsientos, empresa_propietaria = :empresaPropietaria WHERE id_avion = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':numero_serie', $datosAvion["numeroSerie"]);
        $stmt->bindParam(':modelo', $datosAvion["modelo"]);
        $stmt->bindParam(':capacidadAsientos', $datosAvion["capacidadAsientos"]);
        $stmt->bindParam(':empresaPropietaria', $datosAvion["empresaPropietaria"]);
        $stmt->bindParam(':id', $datosAvion["idAvion"]);
       
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    
    } catch (PDOException $e) {
        return "Error al actualizar el avión: " . $e->getMessage();
    }
}

// Función para eliminar un avión
public static function canp_eliminar_avion_mdl($eliminarAvion) {
    try {
        $db = Conexion::conectar();
        $sql = "DELETE FROM tblavion WHERE id_avion  = :eliminarAvion";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':eliminarAvion', $eliminarAvion);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    } catch (PDOException $e) {
        return "Error al eliminar el avión: " . $e->getMessage();
    }
}
}
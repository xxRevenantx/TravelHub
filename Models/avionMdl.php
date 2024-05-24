<?php
class AvionMdl {

// Función para registrar un nuevo avión
public static function canp_registrar_avion_mdl($numeroSerie, $modelo, $capacidadAsientos, $empresaPropietaria) {
    try {
        $db = Conexion::conectar();
        $sql = "INSERT INTO aviones (numero_serie, modelo, capacidad_asientos, empresa_propietaria) VALUES (:numeroSerie, :modelo, :capacidadAsientos, :empresaPropietaria)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':numeroSerie', $numeroSerie);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':capacidadAsientos', $capacidadAsientos);
        $stmt->bindParam(':empresaPropietaria', $empresaPropietaria);
        $stmt->execute();
        return "Avión registrado exitosamente.";
    } catch (PDOException $e) {
        return "Error al registrar el avión: " . $e->getMessage();
    }
}

// Función para leer los datos de un avión específico
public static function canp_leer_avion_mdl($numeroSerie) {
    try {
        $db = Conexion::conectar();
        $sql = "SELECT * FROM aviones WHERE numero_serie = :numeroSerie";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':numeroSerie', $numeroSerie);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return "Error al leer datos del avión: " . $e->getMessage();
    }
}

// Función para actualizar un avión
public static function canp_actualizar_avion_mdl($numeroSerie, $modelo, $capacidadAsientos, $empresaPropietaria) {
    try {
        $db = Conexion::conectar();
        $sql = "UPDATE aviones SET modelo = :modelo, capacidad_asientos = :capacidadAsientos, empresa_propietaria = :empresaPropietaria WHERE numero_serie = :numeroSerie";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':capacidadAsientos', $capacidadAsientos);
        $stmt->bindParam(':empresaPropietaria', $empresaPropietaria);
        $stmt->bindParam(':numeroSerie', $numeroSerie);
        $stmt->execute();
        return "Avión actualizado exitosamente.";
    } catch (PDOException $e) {
        return "Error al actualizar el avión: " . $e->getMessage();
    }
}

// Función para eliminar un avión
public static function canp_eliminar_avion_mdl($numeroSerie) {
    try {
        $db = Conexion::conectar();
        $sql = "DELETE FROM aviones WHERE numero_serie = :numeroSerie";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':numeroSerie', $numeroSerie);
        $stmt->execute();
        return "Avión eliminado exitosamente.";
    } catch (PDOException $e) {
        return "Error al eliminar el avión: " . $e->getMessage();
    }
}
}
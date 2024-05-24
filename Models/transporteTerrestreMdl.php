<?php
class TransporteTerrestreMdl {

    // Función para añadir un nuevo transporte terrestre
    public static function canp_registrar_transporte_terrestre($tipoTransporte, $placa, $capacidad, $anioFabricacion, $empresa) {
        try {
            $db = Conexion::conectar();
            $sql = "INSERT INTO transporte_terrestre (tipoTransporte, placa, capacidad, anioFabricacion, empresa) VALUES (:tipoTransporte, :placa, :capacidad, :anioFabricacion, :empresa)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':tipoTransporte', $tipoTransporte);
            $stmt->bindParam(':placa', $placa);
            $stmt->bindParam(':capacidad', $capacidad);
            $stmt->bindParam(':anioFabricacion', $anioFabricacion);
            $stmt->bindParam(':empresa', $empresa);
            $stmt->execute();
            return "Transporte terrestre registrado exitosamente.";
        } catch (PDOException $e) {
            return "Error al registrar transporte terrestre: " . $e->getMessage();
        }
    }

    // Función para obtener los datos de un transporte terrestre específico
    public static function canp_leer_transporte_terrestre($id) {
        try {
            $db = Conexion::conectar();
            $sql = "SELECT * FROM transporte_terrestre WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error al leer datos del transporte terrestre: " . $e->getMessage();
        }
    }

    // Función para actualizar un transporte terrestre
    public static function canp_actualizar_transporte_terrestre($id, $tipoTransporte, $placa, $capacidad, $anioFabricacion, $empresa) {
        try {
            $db = Conexion::conectar();
            $sql = "UPDATE transporte_terrestre SET tipoTransporte = :tipoTransporte, placa = :placa, capacidad = :capacidad, anioFabricacion = :anioFabricacion, empresa = :empresa WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':tipoTransporte', $tipoTransporte);
            $stmt->bindParam(':placa', $placa);
            $stmt->bindParam(':capacidad', $capacidad);
            $stmt->bindParam(':anioFabricacion', $anioFabricacion);
            $stmt->bindParam(':empresa', $empresa);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return "Transporte terrestre actualizado exitosamente.";
        } catch (PDOException $e) {
            return "Error al actualizar transporte terrestre: " . $e->getMessage();
        }
    }

    // Función para eliminar un transporte terrestre
    public static function canp_eliminar_transporte_terrestre($id) {
        try {
            $db = Conexion::conectar();
            $sql = "DELETE FROM transporte_terrestre WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return "Transporte terrestre eliminado exitosamente.";
        } catch (PDOException $e) {
            return "Error al eliminar transporte terrestre: " . $e->getMessage();
        }
    }
}

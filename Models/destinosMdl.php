<?php
class Destino {

// Función para añadir un nuevo destino
public static function canp_registrar_destino($destino, $avion1, $avion2, $transporte1, $transporte2, $pais, $resena, $coordenadas) {
    try {
        $db = Conexion::conectar();
        $sql = "INSERT INTO destinos (nombre, avion1, avion2, transporte1, transporte2, pais, resena, coordenadas) VALUES (:destino, :avion1, :avion2, :transporte1, :transporte2, :pais, :resena, :coordenadas)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':destino', $destino);
        $stmt->bindParam(':avion1', $avion1);
        $stmt->bindParam(':avion2', $avion2);
        $stmt->bindParam(':transporte1', $transporte1);
        $stmt->bindParam(':transporte2', $transporte2);
        $stmt->bindParam(':pais', $pais);
        $stmt->bindParam(':resena', $resena);
        $stmt->bindParam(':coordenadas', $coordenadas);
        $stmt->execute();
        return "Destino añadido exitosamente.";
    } catch (PDOException $e) {
        return "Error al añadir destino: " . $e->getMessage();
    }
}

// Función para obtener los datos de un destino específico
public static function canp_leer_destino($id) {
    try {
        $db = Conexion::conectar();
        $sql = "SELECT * FROM destinos WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return "Error al leer datos del destino: " . $e->getMessage();
    }
}

// Función para actualizar un destino
public static function canp_actualizar_destino($id, $destino, $avion1, $avion2, $transporte1, $transporte2, $pais, $resena, $coordenadas) {
    try {
        $db = Conexion::conectar();
        $sql = "UPDATE destinos SET nombre = :destino, avion1 = :avion1, avion2 = :avion2, transporte1 = :transporte1, transporte2 = :transporte2, pais = :pais, resena = :resena, coordenadas = :coordenadas WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':destino', $destino);
        $stmt->bindParam(':avion1', $avion1);
        $stmt->bindParam(':avion2', $avion2);
        $stmt->bindParam(':transporte1', $transporte1);
        $stmt->bindParam(':transporte2', $transporte2);
        $stmt->bindParam(':pais', $pais);
        $stmt->bindParam(':resena', $resena);
        $stmt->bindParam(':coordenadas', $coordenadas);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return "Destino actualizado exitosamente.";
    } catch (PDOException $e) {
        return "Error al actualizar destino: " . $e->getMessage();
    }
}

// Función para eliminar un destino
public static function canp_eliminar_destino($id) {
    try {
        $db = Conexion::conectar();
        $sql = "DELETE FROM destinos WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return "Destino eliminado exitosamente.";
    } catch (PDOException $e) {
        return "Error al eliminar destino: " . $e->getMessage();
    }
}
}

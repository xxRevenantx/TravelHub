<?php
include_once "CANP_conexion.php";


class DestinoMdl {

// Función para añadir un nuevo destino
public static function canp_registrar_destino_mdl($destino, $avion1, $avion2, $transporte1, $transporte2, $pais, $resena, $coordenadas) {
    try {
        $db = Conexion::conectar();
        $sql = "INSERT INTO tbldestino (nombre, avion1, avion2, transporte1, transporte2, pais, resena, coordenadas) VALUES (:destino, :avion1, :avion2, :transporte1, :transporte2, :pais, :resena, :coordenadas)";
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

// Función para obtener los datos de los destinos
public static function canp_leer_destinos_mdl() {
    try {
        $db = Conexion::conectar();
        $sql = "SELECT * FROM tbldestino";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        return "Error al leer datos del destino: " . $e->getMessage();
    }
}

// Función para actualizar un destino
public static function canp_actualizar_destino_mdl($id, $destino, $avion1, $avion2, $transporte1, $transporte2, $pais, $resena, $coordenadas) {
    try {
        $db = Conexion::conectar();
        $sql = "UPDATE tbldestino SET nombre = :destino, avion1 = :avion1, avion2 = :avion2, transporte1 = :transporte1, transporte2 = :transporte2, pais = :pais, resena = :resena, coordenadas = :coordenadas WHERE id = :id";
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
public static function canp_eliminar_destino_mdl($id) {
    try {
        $db = Conexion::conectar();
        $sql = "DELETE FROM tbldestino WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return "Destino eliminado exitosamente.";
    } catch (PDOException $e) {
        return "Error al eliminar destino: " . $e->getMessage();
    }
}

/// ================ TIPOS DE DESTINOS =====================

    // Función para añadir un nuevo tipo de destino
    public static function canp_registrar_tipo_destino_mdl($nombre, $descripcion) {
        try {
            $db = Conexion::conectar();
            $sql = "INSERT INTO tbldestino (nombre, descripcion) VALUES (:nombre, :descripcion)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->execute();
            return "Tipo de destino añadido exitosamente.";
        } catch (PDOException $e) {
            return "Error al añadir tipo de destino: " . $e->getMessage();
        }
    }

    // Función para obtener los datos de todos los tipos de destinos
    public static function canp_leer_tipos_destinos_mdl() {
        try {
            $db = Conexion::conectar();
            $sql = "SELECT * FROM tbldestino";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return "Error al leer datos de tipos de destino: " . $e->getMessage();
        }
    }

    // Función para actualizar un tipo de destino
    public static function canp_actualizar_tipo_destino_mdl($id, $nombre, $descripcion) {
        try {
            $db = Conexion::conectar();
            $sql = "UPDATE tbldestino SET nombre = :nombre, descripcion = :descripcion WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return "Tipo de destino actualizado exitosamente.";
        } catch (PDOException $e) {
            return "Error al actualizar tipo de destino: " . $e->getMessage();
        }
    }

    // Función para eliminar un tipo de destino
    public static function canp_eliminar_tipo_destino_mdl($id) {
        try {
            $db = Conexion::conectar();
            $sql = "DELETE FROM tbldestino WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return "Tipo de destino eliminado exitosamente.";
        } catch (PDOException $e) {
            return "Error al eliminar tipo de destino: " . $e->getMessage();
        }
    }


}

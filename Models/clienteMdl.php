<?php
class ClienteMdl {

// Función para añadir un nuevo cliente
public static function canp_registrar_cliente_mdl($datosCliente) {
    try {
        $db = Conexion::conectar();
        $sql = "INSERT INTO tblcliente (nombre, primerApellido, segundo_apellido, lugarNacimiento, fechaNacimiento, sexo, rfc, fechaRegistro) VALUES (:nombre, :primerApellido, :segundoApellido, :estado, :lugarNacimiento, :sexo, :rfc, :fechaRegistro)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':primerApellido', $primerApellido);
        $stmt->bindParam(':segundoApellido', $segundoApellido);
        $stmt->bindParam(':lugarNacimiento', $lugarNacimiento);
        $stmt->bindParam(':fechaNacimiento', $fechaNacimiento);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':rfc', $rfc);
        $stmt->bindParam(':fechaRegistro', $fechaRegistro);
        $stmt->execute();
        return "Cliente registrado exitosamente.";
    } catch (PDOException $e) {
        return "Error al registrar cliente: " . $e->getMessage();
    }
}

// Función para obtener los datos de un cliente específico
public static function canp_leer_cliente_mdl($id) {
    try {
        $db = Conexion::conectar();
        $sql = "SELECT * FROM clientes WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return "Error al leer datos del cliente: " . $e->getMessage();
    }
}

// Función para actualizar un cliente
public static function canp_actualizar_cliente_mdl($id, $nombre, $primerApellido, $segundoApellido, $estado, $fechaNacimiento, $sexo, $rfc, $fechaRegistro) {
    try {
        $db = Conexion::conectar();
        $sql = "UPDATE clientes SET nombre = :nombre, primerApellido = :primerApellido, segundoApellido = :segundoApellido, estado = :estado, fechaNacimiento = :fechaNacimiento, sexo = :sexo, rfc = :rfc, fechaRegistro = :fechaRegistro WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':primerApellido', $primerApellido);
        $stmt->bindParam(':segundoApellido', $segundoApellido);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':fechaNacimiento', $fechaNacimiento);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':rfc', $rfc);
        $stmt->bindParam(':fechaRegistro', $fechaRegistro);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return "Cliente actualizado exitosamente.";
    } catch (PDOException $e) {
        return "Error al actualizar cliente: " . $e->getMessage();
    }
}

// Función para eliminar un cliente
public static function canp_eliminar_cliente_mdl($id) {
    try {
        $db = Conexion::conectar();
        $sql = "DELETE FROM clientes WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return "Cliente eliminado exitosamente.";
    } catch (PDOException $e) {
        return "Error al eliminar cliente: " . $e->getMessage();
    }
}
}

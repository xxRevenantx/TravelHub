<?php
include_once "CANP_conexion.php";
class ClienteMdl {

// Función para añadir un nuevo cliente
public static function canp_registrar_cliente_mdl($datosCliente) {
    try {
        $db = Conexion::conectar();
        $sql = "INSERT INTO tblcliente (nombre, primer_apellido, segundo_apellido, lugarNacimiento, fechaNacimiento, sexo, RFC, CURP, fecha_registro) VALUES (:nombre, :primerApellido, :segundoApellido, :lugarNacimiento, :fechaNacimiento, :sexo, :rfc, :curp, :fechaRegistro)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nombre', $datosCliente["nombre"]);
        $stmt->bindParam(':primerApellido', $datosCliente["primerApellido"]);
        $stmt->bindParam(':segundoApellido', $datosCliente["segundoApellido"]);
        $stmt->bindParam(':lugarNacimiento', $datosCliente["lugarNacimiento"]);
        $stmt->bindParam(':fechaNacimiento', $datosCliente["fechaNacimiento"]);
        $stmt->bindParam(':sexo', $datosCliente["sexo"]);
        $stmt->bindParam(':rfc', $datosCliente["rfc"]);
        $stmt->bindParam(':curp', $datosCliente["curp"]);
        $stmt->bindParam(':fechaRegistro', $datosCliente["fechaRegistro"]);
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
        
    } catch (PDOException $e) {
        return $e;
    }
}

// Función para obtener los datos de los clientes
public static function canp_leer_clientes_mdl() {
    try {
        $db = Conexion::conectar();
        $sql = "SELECT * FROM tblcliente";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        return "Error al leer datos del cliente: " . $e->getMessage();
    }
}
// Función para obtener los datos de un cliente específico
public static function canp_leer_cliente_id_mdl($id) {
    try {
        $db = Conexion::conectar($id);
        $sql = "SELECT * FROM tblcliente WHERE id_cliente = :id_cliente";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id_cliente', $id);
        $stmt->execute();
        return $stmt->fetch();
    } catch (PDOException $e) {
        return "Error al leer datos del cliente: " . $e->getMessage();
    }
}

// Función para actualizar un cliente
public static function canp_actualizar_cliente_mdl($datosCliente) {
    try {
        $db = Conexion::conectar();
        $sql = "UPDATE tblcliente SET nombre = :nombre, primer_pellido = :primerApellido, segundo_apellido = :segundoApellido, lugarNacimiento = :lugarNacimiento, fechaNacimiento = :fechaNacimiento, sexo = :sexo, RFC = :rfc, CURP = :CURP, fecha_registro = :fechaRegistro WHERE id_cliente = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nombre', $datosCliente["nombre"]);
        $stmt->bindParam(':primerApellido', $datosCliente["primerApellido"]);
        $stmt->bindParam(':segundoApellido', $datosCliente["segundoApellido"]);
        $stmt->bindParam(':lugarNacimiento', $datosCliente["lugarNacimiento"]);
        $stmt->bindParam(':fechaNacimiento', $datosCliente["fechaNacimiento"]);
        $stmt->bindParam(':sexo', $datosCliente["sexo"]);
        $stmt->bindParam(':rfc', $datosCliente["rfc"]);
        $stmt->bindParam(':curp', $datosCliente["curp"]);
        $stmt->bindParam(':fechaRegistro', $datosCliente["fechaRegistro"]);
        $stmt->bindParam(':id', $datosCliente["id"]);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
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

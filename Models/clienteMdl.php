<?php
include_once "CANP_conexion.php";
class ClienteMdl {

// Función para añadir un nuevo cliente
public static function canp_registrar_cliente_mdl($datosCliente) {
    try {
        $db = Conexion::conectar();
        $sql = "INSERT INTO tblcliente (nombre, primer_apellido, segundo_apellido, lugarNacimiento, fechaNacimiento, sexo, RFC, CURP, fecha_registro, id_rol) VALUES (:nombre, :primerApellido, :segundoApellido, :lugarNacimiento, :fechaNacimiento, :sexo, :rfc, :curp, :fechaRegistro, :id_rol)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nombre', $datosCliente["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(':primerApellido', $datosCliente["primerApellido"], PDO::PARAM_STR);
        $stmt->bindParam(':segundoApellido', $datosCliente["segundoApellido"], PDO::PARAM_STR);
        $stmt->bindParam(':lugarNacimiento', $datosCliente["lugarNacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(':fechaNacimiento', $datosCliente["fechaNacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(':sexo', $datosCliente["sexo"], PDO::PARAM_STR);
        $stmt->bindParam(':rfc', $datosCliente["rfc"], PDO::PARAM_STR);
        $stmt->bindParam(':curp', $datosCliente["curp"], PDO::PARAM_STR);
        $stmt->bindParam(':fechaRegistro', $datosCliente["fechaRegistro"], PDO::PARAM_STR);
        $stmt->bindParam(':id_rol', $datosCliente["idRol"], PDO::PARAM_INT);
        
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
        $sql = "UPDATE tblcliente SET nombre = :nombre, primer_apellido = :primerApellido, segundo_apellido = :segundoApellido, lugarNacimiento = :lugarNacimiento, fechaNacimiento = :fechaNacimiento, sexo = :sexo, RFC = :rfc, CURP = :CURP, fecha_registro = :fechaRegistro WHERE id_cliente = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nombre', $datosCliente["nombre"]);
        $stmt->bindParam(':primerApellido', $datosCliente["primerApellido"]);
        $stmt->bindParam(':segundoApellido', $datosCliente["segundoApellido"]);
        $stmt->bindParam(':lugarNacimiento', $datosCliente["lugarNacimiento"]);
        $stmt->bindParam(':fechaNacimiento', $datosCliente["fechaNacimiento"]);
        $stmt->bindParam(':sexo', $datosCliente["sexo"]);
        $stmt->bindParam(':rfc', $datosCliente["rfc"]);
        $stmt->bindParam(':CURP', $datosCliente["curp"]);
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
public static function canp_eliminar_cliente_mdl($idCliente) {
    try {
        $db = Conexion::conectar();
        $sql = "DELETE FROM tblcliente WHERE id_cliente = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $idCliente);
        $stmt->execute();
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    } catch (PDOException $e) {
        return "Error al eliminar cliente: " . $e->getMessage();
    }
}
}

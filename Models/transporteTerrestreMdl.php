<?php
include_once 'CANP_conexion.php';
class TransporteTerrestreMdl {

    // Función para añadir un nuevo transporte terrestre
    public static function canp_registrar_transporte_terrestre_mdl($datosTransporte) {
        try {
            $db = Conexion::conectar();
            $sql = "INSERT INTO  tbltransporteterrestre (tipo_Transporte, placa, capacidad_pasajeros, anio_fabricacion, empresa_propietaria) VALUES (:tipoTransporte, :placa, :capacidad, :anioFabricacion, :empresa)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':tipoTransporte', $datosTransporte["tipo_transporte"]);
            $stmt->bindParam(':placa', $datosTransporte["placa"]);
            $stmt->bindParam(':capacidad', $datosTransporte["capacidad_pasajeros"]);
            $stmt->bindParam(':anioFabricacion', $datosTransporte["anio_fabricacion"]);
            $stmt->bindParam(':empresa', $datosTransporte["empresa_propietaria"]);
            if( $stmt->execute()){
                return true;
            }else{
                return false;
            }
           
           
        } catch (PDOException $e) {
            return "Error al registrar transporte terrestre: " . $e->getMessage();
        }
    }

    // Función para obtener los datos de los transportes
    public static function canp_leer_transportes_terrestres_mdl() {
        try {
            $db = Conexion::conectar();
            $sql = "SELECT * FROM  tbltransporteterrestre";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return "Error al leer datos del transporte terrestre: " . $e->getMessage();
        }
    }
    // Función para obtener los datos de un transporte terrestre específico
    public static function canp_leer_transporte_terrestre_id_mdl($id) {
        try {
            $db = Conexion::conectar();
            $sql = "SELECT * FROM  tbltransporteterrestre WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error al leer datos del transporte terrestre: " . $e->getMessage();
        }
    }

    // Función para actualizar un transporte terrestre
    public static function canp_actualizar_transporte_terrestre_mdl($id, $tipoTransporte, $placa, $capacidad, $anioFabricacion, $empresa) {
        try {
            $db = Conexion::conectar();
            $sql = "UPDATE  tbltransporteterrestre SET tipoTransporte = :tipoTransporte, placa = :placa, capacidad = :capacidad, anioFabricacion = :anioFabricacion, empresa = :empresa WHERE id = :id";
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
    public static function canp_eliminar_transporte_terrestre_mdl($id) {
        try {
            $db = Conexion::conectar();
            $sql = "DELETE FROM  tbltransporteterrestre WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return "Transporte terrestre eliminado exitosamente.";
        } catch (PDOException $e) {
            return "Error al eliminar transporte terrestre: " . $e->getMessage();
        }
    }
}

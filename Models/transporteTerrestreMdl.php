<?php
include_once 'CANP_conexion.php';
class TransporteTerrestreMdl {

    // Función para añadir un nuevo transporte terrestre
    public static function canp_registrar_transporte_terrestre_mdl($datosTransporte) {

        try {
             // Segunda capa de validación para garantizar la integridad de los datos
             if (!preg_match('/^\d{6}$/', $datosTransporte['placa'])) {
                return ["error" => "La placa debe ser un valor numérico y contener exactamente 6 caracteres."];
            }
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
            $sql = "SELECT * FROM  tbltransporteterrestre WHERE id_transpterrestre = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            return "Error al leer datos del transporte terrestre: " . $e->getMessage();
        }
    }

    // Función para actualizar un transporte terrestre
    public static function canp_actualizar_transporte_terrestre_mdl($datosTransporte) {
        try {
             // Segunda capa de validación para garantizar la integridad de los datos
             if (!preg_match('/^\d{6}$/', $datosTransporte['placa'])) {
                return ["error" => "La placa debe ser un valor numérico y contener exactamente 6 caracteres."];
            }
            $db = Conexion::conectar();
            $sql = "UPDATE  tbltransporteterrestre SET tipo_transporte = :tipo_transporte, placa = :placa, capacidad_pasajeros = :capacidad_pasajeros, anio_fabricacion = :anio_fabricacion, empresa_propietaria = :empresa_propietaria WHERE id_transpterrestre = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':tipo_transporte', $datosTransporte["tipo_transporte"]);
            $stmt->bindParam(':placa', $datosTransporte["placa"]);
            $stmt->bindParam(':capacidad_pasajeros', $datosTransporte["capacidad_pasajeros"]);
            $stmt->bindParam(':anio_fabricacion', $datosTransporte["anio_fabricacion"]);
            $stmt->bindParam(':empresa_propietaria', $datosTransporte["empresa_propietaria"]);
            $stmt->bindParam(':id', $datosTransporte["id_transporteterrestre"]);
            if( $stmt->execute()){
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            return "Error al actualizar transporte terrestre: " . $e->getMessage();
        }
    }

    // Función para eliminar un transporte terrestre
    public static function canp_eliminar_transporte_terrestre_mdl($idTransporte) {
        try {
            $db = Conexion::conectar();
            $sql = "DELETE FROM  tbltransporteterrestre WHERE id_transpterrestre = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $idTransporte);
            if( $stmt->execute()){
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            return "Error al eliminar transporte terrestre: " . $e->getMessage();
        }
    }
}

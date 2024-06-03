<?php
include_once "CANP_conexion.php";

class ReservasMdl {

    // Función para registrar una nueva reserva
    public static function canp_registrar_reserva_mdl($datosReserva) {
        try {
            $db = Conexion::conectar();
            $sql = "INSERT INTO tblreservas (id_cliente, id_destino, id_tipodestino, fecha_reserva, fecha_vuelo) VALUES (:clienteReserva, :destinoReserva, :tipoDestinoReserva, :fecha_reserva, :fecha_vuelo)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':clienteReserva', $datosReserva["clienteReserva"]);
            $stmt->bindParam(':destinoReserva', $datosReserva["destinoReserva"]);
            $stmt->bindParam(':tipoDestinoReserva', $datosReserva["tipoDestinoReserva"]);
            $stmt->bindParam(':fecha_reserva', $datosReserva["fecha_reserva"]);
            $stmt->bindParam(':fecha_vuelo', $datosReserva["fecha_vuelo"]);
            if($stmt->execute()){
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error al registrar la reserva: " . $e->getMessage();
        }
    }

    // Función para leer los datos de una reserva específica
    public static function canp_leer_reserva_id_mdl($idReserva) {
        try {
            $db = Conexion::conectar();
            $sql = "SELECT * FROM tblreservas WHERE id_reserva = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $idReserva);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            return "Error al leer datos de la reserva: " . $e->getMessage();
        }
    }

    // Función para leer los datos de todas las reservas
    public static function canp_leer_reservas_mdl() {
        try {
            $db = Conexion::conectar();
            $sql = "SELECT * FROM tblreservas";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return "Error al leer datos de las reservas: " . $e->getMessage();
        }
    }

    // Función para actualizar una reserva
    public static function canp_actualizar_reserva_mdl($datosReserva) {
        try {
            $db = Conexion::conectar();
            $sql = "UPDATE tblreservas SET id_cliente = :clienteReserva, id_destino = :destinoReserva, id_tipodestino = :tipoDestinoReserva, fecha_reserva = :fecha_reserva, fecha_vuelo = :fecha_vuelo WHERE id_reserva = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':clienteReserva', $datosReserva["clienteReserva"]);
            $stmt->bindParam(':destinoReserva', $datosReserva["destinoReserva"]);
            $stmt->bindParam(':tipoDestinoReserva', $datosReserva["tipoDestinoReserva"]);
            $stmt->bindParam(':fecha_reserva', $datosReserva["fecha_reserva"]);
            $stmt->bindParam(':fecha_vuelo', $datosReserva["fecha_vuelo"]);
            $stmt->bindParam(':id', $datosReserva["idReserva"]);
            if($stmt->execute()){
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error al actualizar la reserva: " . $e->getMessage();
        }
    }

    // Función para eliminar una reserva
    public static function canp_eliminar_reserva_mdl($idReserva) {
        try {
            $db = Conexion::conectar();
            $sql = "DELETE FROM tblreservas WHERE id_reserva = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $idReserva);
            if($stmt->execute()){
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error al eliminar la reserva: " . $e->getMessage();
        }
    }
}
?>

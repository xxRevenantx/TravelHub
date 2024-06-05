<?php
include_once "CANP_conexion.php";


class ReportesMdl {

    // Función para obtener los reportes desde la base de datos
    public static function canp_leer_reportes_mdl($datosReportes) {
        try {
            $stmt = Conexion::conectar()->prepare("
                SELECT 
                    YEAR(fecha_reserva) AS anio, 
                    MONTH(fecha_reserva) AS mes, 
                    COUNT(*) AS total_reservas
                FROM tblreservas
                WHERE (YEAR(fecha_reserva) BETWEEN :comienzoAnio AND :finAno)
                AND (MONTH(fecha_reserva) BETWEEN :comienzoMesNumero AND :finMesNumero)
                GROUP BY anio, mes
                ORDER BY anio, mes
            ");
            $stmt->bindParam(":comienzoAnio", $datosReportes['comienzoAnio'], PDO::PARAM_INT);
            $stmt->bindParam(":comienzoMesNumero", $datosReportes['comienzoMesNumero'], PDO::PARAM_INT);
            $stmt->bindParam(":finAno", $datosReportes['finAno'], PDO::PARAM_INT);
            $stmt->bindParam(":finMesNumero", $datosReportes['finMesNumero'], PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Función para obtener el mes
    public static function canp_leer_mes_mdl($soloMes, $soloAnio) {
        try {
            $stmt = Conexion::conectar()->prepare("
            SELECT 
            YEAR(r.fecha_reserva) AS anio, 
            MONTH(r.fecha_reserva) AS mes, 
            r.fecha_vuelo,
            r.id_destino,
            d.nombre_destino,
            r.id_tipodestino,
            t.Nombre_destino AS nombre_tipodestino,
            c.nombre,
            COUNT(*) AS total_reservas
        FROM tblreservas r
        JOIN tbldestino d ON r.id_destino = d.id_destino
        JOIN tbltipodestino t ON r.id_tipodestino = t.id_tipodestino
        JOIN tblcliente c ON r.id_cliente = c.id_cliente
        WHERE MONTH(r.fecha_reserva) = :mes AND YEAR(r.fecha_reserva) = :anio
        GROUP BY anio, mes, fecha_vuelo, r.id_destino
        ORDER BY anio, mes, fecha_vuelo
            ");
            $stmt->bindParam(":mes", $soloMes, PDO::PARAM_INT);
            $stmt->bindParam(":anio", $soloAnio, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Función para obtener el clientes por tipo de destino
    public static function canp_leer_destino_cliente_mdl($idTipoDestinoCliente, $fechaVueloCliente, $idDestinoCliente) {
        try {
            $stmt = Conexion::conectar()->prepare("
                    SELECT 
                    r.id_cliente, 
                    r.id_destino, 
                    r.id_tipodestino, 
                    r.fecha_vuelo,
                    r.fecha_reserva,
                    c.nombre,
                    c.primer_apellido,
                    c.segundo_apellido,
                    c.fecha_registro,
                    d.nombre_destino
                FROM tblreservas r
                JOIN tblcliente c ON r.id_cliente = c.id_cliente
                JOIN tbldestino d ON r.id_destino = d.id_destino
                WHERE r.id_destino = :id_destino 
                AND r.id_tipodestino = :id_tipodestino 
                AND r.fecha_vuelo = :fecha_vuelo
            ");
            $stmt->bindParam(":id_destino", $idDestinoCliente, PDO::PARAM_INT);
            $stmt->bindParam(":id_tipodestino", $idTipoDestinoCliente, PDO::PARAM_INT);
            $stmt->bindParam(":fecha_vuelo", $fechaVueloCliente, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
<?php
include_once "CANP_conexion.php";


class DestinoMdl {

// Función para añadir un nuevo destino
public static function canp_registrar_destino_mdl($datosDestino) {
    try {
     
        $db = Conexion::conectar();
        $sql = "INSERT INTO tbldestino (nombre_destino, id_tipodestino, id_avion1, id_avion2, id_transpterrestre1, id_transpterrestre2, pais, resenia, coordenadas, imagen_destino) VALUES (:nombre_destino,:id_tipodestino, :id_avion1, :id_avion2, :id_transpterrestre1, :id_transpterrestre2, :pais, :resenia, :coordenadas, :imagen_destino)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nombre_destino', $datosDestino["destino"]);
        $stmt->bindParam(':id_tipodestino', $datosDestino["tipodestino"]);
        $stmt->bindParam(':id_avion1', $datosDestino["avion1"]);
        $stmt->bindParam(':id_avion2', $datosDestino["avion2"]);
        $stmt->bindParam(':id_transpterrestre1', $datosDestino["transporte1"]);
        $stmt->bindParam(':id_transpterrestre2', $datosDestino["transporte2"]);
        $stmt->bindParam(':pais', $datosDestino["pais"]);
        $stmt->bindParam(':resenia', $datosDestino["resena"]);
        $stmt->bindParam(':coordenadas', $datosDestino["coordenadas"]);
        $stmt->bindParam(':imagen_destino', $datosDestino["imagen"]);
        if( $stmt->execute()){
            return true;
        }else{
            false;
        }
        
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
// Función para obtener los datos de los destinos por un id en especifico
public static function canp_leer_destino_id_mdl($idDestino) {
    try {
        $db = Conexion::conectar();
        $sql = "SELECT * FROM tbldestino WHERE id_destino = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $idDestino);
        $stmt->execute();
        return $stmt->fetch();
    } catch (PDOException $e) {
        return "Error al leer datos del destino: " . $e->getMessage();
    }
}

// Función para actualizar un destino
public static function canp_actualizar_destino_mdl($datosDestino) {

    try {
        $db = Conexion::conectar();
        $sql = "UPDATE tbldestino SET nombre_destino = :nombre_destino, id_tipodestino = :id_tipodestino, id_avion1 = :id_avion1, id_avion2 = :id_avion2, id_transpterrestre1 = :id_transpterrestre1, id_transpterrestre2 = :id_transpterrestre2, pais = :pais, resenia = :resenia, coordenadas = :coordenadas, imagen_destino = :imagen_destino WHERE id_destino = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nombre_destino', $datosDestino["destino"]);
        $stmt->bindParam(':id_tipodestino', $datosDestino["tipodestino"]);
        $stmt->bindParam(':id_avion1', $datosDestino["avion1"]);
        $stmt->bindParam(':id_avion2', $datosDestino["avion2"]);
        $stmt->bindParam(':id_transpterrestre1', $datosDestino["transporte1"]);
        $stmt->bindParam(':id_transpterrestre2', $datosDestino["transporte2"]);
        $stmt->bindParam(':pais', $datosDestino["pais"]);
        $stmt->bindParam(':resenia', $datosDestino["resena"]);
        $stmt->bindParam(':imagen_destino', $datosDestino["imagen"]);
        $stmt->bindParam(':coordenadas', $datosDestino["coordenadas"]);
        $stmt->bindParam(':id', $datosDestino["id"]);
        if( $stmt->execute()){
            return true;
        }else{
            false;
        }
    } catch (PDOException $e) {
        return "Error al actualizar destino: " . $e->getMessage();
    }
}

// Función para eliminar un destino
public static function canp_eliminar_destino_mdl($id) {
    try {
        $db = Conexion::conectar();
        $sql = "DELETE FROM tbldestino WHERE id_destino = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        if( $stmt->execute()){
            return true;
        }else{
            false;
        }
    } catch (PDOException $e) {
        return "Error al eliminar destino: " . $e->getMessage();
    }
}

/// ================ TIPOS DE DESTINOS ===================== ////

    // Función para añadir un nuevo tipo de destino
    public static function canp_registrar_tipo_destino_mdl($datosTipoDestino) {
        try {
            $epocaSugeridaNormalizada = strtolower($datosTipoDestino["epocaSugerida"]);
            $epocasValidas = ['primavera', 'verano', 'otoño', 'invierno'];
    
            if (!in_array($epocaSugeridaNormalizada, $epocasValidas)) {
                return false;
            }

                    // Lista de actividades válidas
                $actividadesValidas = [
                    'paseo en lancha',
                    'tour por la ciudad',
                    'recorrido del centro histórico',
                    'visita a museos',
                    'visita a acuarios'
                ];

                // Convertir a minúsculas para hacer la validación insensible a mayúsculas y minúsculas
                $actividadesPopularesNormalizadas = strtolower($datosTipoDestino["actividadesPopulares"]);

                // Validar que las actividades populares sean una de las permitidas
                if (!in_array($actividadesPopularesNormalizadas, $actividadesValidas)) {
                    return false;
                }



            $db = Conexion::conectar();
            $sql = "INSERT INTO tbltipodestino (Nombre_destino, Actividades_populares, Epoca_sugerida) VALUES (:Nombre_destino, :Actividades_populares, :Epoca_sugerida)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':Nombre_destino', $datosTipoDestino["nombreDestino"]);
            $stmt->bindParam(':Actividades_populares', $datosTipoDestino["actividadesPopulares"]);
            $stmt->bindParam(':Epoca_sugerida', $datosTipoDestino["epocaSugerida"]);
           if( $stmt->execute()){
            return true;
           }else{
            return false;
           }
           
        } catch (PDOException $e) {
            return "Error al añadir tipo de destino: " . $e->getMessage();
        }
    }

    // Función para obtener los datos de todos los tipos de destinos
    public static function canp_leer_tipos_destinos_mdl() {
        try {
            $db = Conexion::conectar();
            $sql = "SELECT * FROM tbltipodestino";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return "Error al leer datos de tipos de destino: " . $e->getMessage();
        }
    }
    // Función para obtener los datos de un id en espicífico
    public static function canp_leer_tipo_destino_id_mdl($idTipoDestino) {
        try {
            $db = Conexion::conectar();
            $sql = "SELECT * FROM tbltipodestino WHERE id_tipodestino = :id_tipodestino";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id_tipodestino', $idTipoDestino);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            return "Error al leer datos de tipos de destino: " . $e->getMessage();
        }
    }

    // Función para actualizar un tipo de destino
    public static function canp_actualizar_tipo_destino_mdl($datosTipoDestino) {
        try {
            $epocaSugeridaNormalizada = strtolower($datosTipoDestino["epocaSugerida"]);
            $epocasValidas = ['primavera', 'verano', 'otoño', 'invierno'];
    
            if (!in_array($epocaSugeridaNormalizada, $epocasValidas)) {
                return false;
            }

                    // Lista de actividades válidas
                $actividadesValidas = [
                    'paseo en lancha',
                    'tour por la ciudad',
                    'recorrido del centro histórico',
                    'visita a museos',
                    'visita a acuarios'
                ];

                // Convertir a minúsculas para hacer la validación insensible a mayúsculas y minúsculas
                $actividadesPopularesNormalizadas = strtolower($datosTipoDestino["actividadesPopulares"]);

                // Validar que las actividades populares sean una de las permitidas
                if (!in_array($actividadesPopularesNormalizadas, $actividadesValidas)) {
                    return false;
                }

            $db = Conexion::conectar();
            $sql = "UPDATE tbltipodestino SET Nombre_destino = :Nombre_destino, Actividades_populares = :Actividades_populares, Epoca_sugerida = :Epoca_sugerida WHERE id_tipodestino = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':Nombre_destino', $datosTipoDestino["nombreDestino"]);
            $stmt->bindParam(':Actividades_populares', $datosTipoDestino["actividadesPopulares"]);
            $stmt->bindParam(':Epoca_sugerida', $datosTipoDestino["epocaSugerida"]);
            $stmt->bindParam(':id', $datosTipoDestino["id"]);
            if( $stmt->execute()){
                return true;
               }else{
                return false;
               }
        } catch (PDOException $e) {
            return "Error al actualizar tipo de destino: " . $e->getMessage();
        }
    }

        // Función para eliminar un tipo de destino
        public static function canp_validar_eliminacion_tipo_destino_mdl($id) {
            try {
                $db = Conexion::conectar();
                $sql = "SELECT canp_validar_eliminacion_tipo_destino(:id) AS puedeEliminar";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $row = $stmt->fetch();

                if ($row['puedeEliminar']) {
                    // Proceder a eliminar el tipo de destino
                    $sqlEliminar = "DELETE FROM tbltipodestino WHERE id_tipodestino = :id";
                    $stmtEliminar = $db->prepare($sqlEliminar);
                    $stmtEliminar->bindParam(':id', $id, PDO::PARAM_INT);
                    $stmtEliminar->execute();

                   return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                return "Error al eliminar tipo de destino: " . $e->getMessage();
            }
        }


}

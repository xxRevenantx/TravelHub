<?php

class Conexion {
    // Constantes de configuración para la conexión a la base de datos
    private const DB_HOST = 'localhost'; // Host de la base de datos
    private const DB_NAME = 'travelhub'; // Nombre de la base de datos
    private const DB_USER = 'root'; // Usuario de la base de datos
    private const DB_PASSWORD = ''; // Contraseña del usuario de la base de datos
    // Opciones de configuración de PDO
    private const DB_OPTIONS = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Configura PDO para lanzar excepciones en caso de error
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Configura el modo de obtención por defecto a array asociativo
    ];

    public static function conectar() {
        try {
            // Formatea y prepara la cadena de conexión usando sprintf para mayor claridad
            $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8', self::DB_HOST, self::DB_NAME);
            // Crea una nueva instancia de PDO con los parámetros definidos
            $link = new PDO($dsn, self::DB_USER, self::DB_PASSWORD, self::DB_OPTIONS);
            return $link; // Retorna el objeto de conexión
			// echo $link;
        } catch (PDOException $e) {
            // Captura y registra cualquier excepción relacionada con la conexión a la base de datos
            error_log('Error de conexión: ' . $e->getMessage());
            return null; // Retorna null en caso de error
        }
    }
}
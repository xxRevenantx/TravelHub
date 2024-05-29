DELIMITER //

CREATE FUNCTION canp_validar_eliminacion_tipo_destino(tipo_destino_id INT) 
RETURNS BOOLEAN
BEGIN
    DECLARE resultado INT;
    
    -- Verificar si el tipo de destino está vinculado a algún destino
    SELECT COUNT(*) INTO resultado
    FROM tbldestino
    WHERE id_tipodestino = tipo_destino_id;

    -- Si el resultado es mayor que 0, el tipo de destino no puede ser eliminado
    IF resultado > 0 THEN
        RETURN FALSE;
    ELSE
        RETURN TRUE;
    END IF;
END //

DELIMITER ;
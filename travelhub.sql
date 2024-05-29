-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2024 a las 05:13:33
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `travelhub`
--

DELIMITER $$
--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `canp_validar_eliminacion_tipo_destino` (`tipo_destino_id` INT) RETURNS TINYINT(1)  BEGIN
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
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id_admin` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `primer_apellido` varchar(255) NOT NULL,
  `segundo_apellido` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblavion`
--

CREATE TABLE `tblavion` (
  `id_avion` int(11) NOT NULL,
  `numero_serie` varchar(255) DEFAULT NULL,
  `modelo` varchar(255) DEFAULT NULL,
  `capacidad_asientos` int(11) NOT NULL,
  `empresa_propietaria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tblavion`
--

INSERT INTO `tblavion` (`id_avion`, `numero_serie`, `modelo`, `capacidad_asientos`, `empresa_propietaria`) VALUES
(4, '123456789ABC', 'Boeing 747', 67, 'Aerolíneas Internacionales'),
(5, '987654321DEF', 'Airbus A380', 50, 'Global Airways'),
(6, '234567891ABC', 'Boeing 737', 78, 'Aerolíneas Internacionales'),
(7, '876543219DEF', 'Airbus A320', 80, 'Continental Flights'),
(8, '345678912ABC', 'Boeing 777', 34, 'Global Airways'),
(9, '765432198DEF', 'Boeing 787', 42, 'Sky Partners'),
(10, '456789123ABC', 'Airbus A350', 24, 'Continental Flights'),
(11, '654321987DEF', 'Boeing 737 MAX', 20, 'Sky Partners'),
(12, '567891234ABC', 'Embraer E190', 5, 'Regional Jet'),
(13, '543219876DEF', 'Bombardier Q400', 67, 'Regional Jet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblbitacora`
--

CREATE TABLE `tblbitacora` (
  `id_bitacora` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `tipo_usuario` varchar(50) NOT NULL,
  `accion_realizada` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcliente`
--

CREATE TABLE `tblcliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `primer_apellido` varchar(255) NOT NULL,
  `segundo_apellido` varchar(255) DEFAULT NULL,
  `lugarNacimiento` varchar(20) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `RFC` varchar(13) NOT NULL,
  `CURP` varchar(18) NOT NULL,
  `fecha_registro` date NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldestino`
--

CREATE TABLE `tbldestino` (
  `id_destino` int(11) NOT NULL,
  `id_tipodestino` int(11) DEFAULT NULL,
  `id_avion1` int(11) DEFAULT NULL,
  `id_avion2` int(11) DEFAULT NULL,
  `id_transpterrestre1` int(11) DEFAULT NULL,
  `id_transpterrestre2` int(11) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL,
  `resenia` varchar(255) DEFAULT NULL,
  `coordenadas` varchar(255) DEFAULT NULL,
  `imagen_destino` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbldestino`
--

INSERT INTO `tbldestino` (`id_destino`, `id_tipodestino`, `id_avion1`, `id_avion2`, `id_transpterrestre1`, `id_transpterrestre2`, `pais`, `resenia`, `coordenadas`, `imagen_destino`) VALUES
(8, 1, 6, 8, 5, 6, 'Arabia Saudita', 'Cancún', '35.6895, 139.6917', 0x2e2e2f2e2e2f56696577732f6173736574732f696d6167656e65732f64657374696e6f732f686f7573652e6a7067);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblroles`
--

CREATE TABLE `tblroles` (
  `Id_rol` int(11) NOT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tblroles`
--

INSERT INTO `tblroles` (`Id_rol`, `rol`) VALUES
(1, 'Admin'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipodestino`
--

CREATE TABLE `tbltipodestino` (
  `id_tipodestino` int(11) NOT NULL,
  `Nombre_destino` varchar(255) NOT NULL,
  `Actividades_populares` varchar(255) NOT NULL,
  `Epoca_sugerida` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbltipodestino`
--

INSERT INTO `tbltipodestino` (`id_tipodestino`, `Nombre_destino`, `Actividades_populares`, `Epoca_sugerida`) VALUES
(1, 'Cancún', 'Buceo, Snorkel, Fiesta', 'Verano'),
(2, 'París', 'Museos, Gastronomía, Paseos en barco', 'Primavera'),
(3, 'Tokio', 'Tecnología, Cultura pop, Compras', 'Otoño'),
(4, 'Nueva York', 'Teatros, Rascacielos, Central Park', 'Invierno'),
(5, 'Sídney', 'Surf, Ópera, Puentes', 'Verano'),
(6, 'Roma', 'Historia, Arquitectura, Gastronomía', 'Primavera'),
(7, 'Londres', 'Museos, Historia, Compras', 'Otoño'),
(8, 'Barcelona', 'Playas, Arquitectura, Fútbol', 'Verano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltransporteterrestre`
--

CREATE TABLE `tbltransporteterrestre` (
  `id_transpterrestre` int(11) NOT NULL,
  `tipo_transporte` varchar(255) DEFAULT NULL,
  `placa` varchar(255) DEFAULT NULL,
  `capacidad_pasajeros` int(11) NOT NULL,
  `anio_fabricacion` int(11) NOT NULL,
  `empresa_propietaria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbltransporteterrestre`
--

INSERT INTO `tbltransporteterrestre` (`id_transpterrestre`, `tipo_transporte`, `placa`, `capacidad_pasajeros`, `anio_fabricacion`, `empresa_propietaria`) VALUES
(1, 'Autobús', 'ABC1234', 60, 2015, 'Transporte Urbano SA'),
(2, 'Taxi', 'XYZ5678', 4, 2018, 'Taxis Rápidos SRL'),
(3, 'Autobús', 'DEF9012', 45, 2014, 'Viajes Seguros SL'),
(4, 'Minivan', 'GHI3456', 7, 2019, 'Transportes Familiares S.A.'),
(5, 'Camioneta', 'JKL7890', 5, 2017, 'Transportes del Norte S.A.'),
(6, 'Taxi', 'MNO1234', 4, 2016, 'Taxis Express SL'),
(7, 'Autobús', 'PQR5678', 60, 2013, 'Rutas Confortables S.A.'),
(8, 'Minivan', 'STU9012', 8, 2020, 'Servicios Ejecutivos SRL'),
(9, 'Camioneta', 'VWX3456', 6, 2015, 'Carga y Transporte SA'),
(10, 'Autobús', 'YZA7890', 55, 2012, 'Transporte Escolar SA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuarios`
--

CREATE TABLE `tblusuarios` (
  `Id_usuario` int(11) NOT NULL,
  `Usuario` varchar(255) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tblusuarios`
--

INSERT INTO `tblusuarios` (`Id_usuario`, `Usuario`, `Nombre`, `Apellido`, `Email`, `Password`, `Rol`) VALUES
(1, 'admin_CANP', 'Carlos Alberto', 'Nunez', 'carlos@gmail.com', 'es1921022834', 1),
(2, 'cliente_CANP', 'Carlos', 'Nuñez', 'carlos@gmail.com', 'es1921022834', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `tblavion`
--
ALTER TABLE `tblavion`
  ADD PRIMARY KEY (`id_avion`);

--
-- Indices de la tabla `tblbitacora`
--
ALTER TABLE `tblbitacora`
  ADD PRIMARY KEY (`id_bitacora`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tblcliente`
--
ALTER TABLE `tblcliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `tblcliente_ibfk_1` (`id_rol`);

--
-- Indices de la tabla `tbldestino`
--
ALTER TABLE `tbldestino`
  ADD PRIMARY KEY (`id_destino`),
  ADD KEY `id_tipodestino` (`id_tipodestino`),
  ADD KEY `id_avion1` (`id_avion1`),
  ADD KEY `id_avion2` (`id_avion2`),
  ADD KEY `id_transpterrestre1` (`id_transpterrestre1`),
  ADD KEY `id_transpterrestre2` (`id_transpterrestre2`);

--
-- Indices de la tabla `tblroles`
--
ALTER TABLE `tblroles`
  ADD PRIMARY KEY (`Id_rol`);

--
-- Indices de la tabla `tbltipodestino`
--
ALTER TABLE `tbltipodestino`
  ADD PRIMARY KEY (`id_tipodestino`);

--
-- Indices de la tabla `tbltransporteterrestre`
--
ALTER TABLE `tbltransporteterrestre`
  ADD PRIMARY KEY (`id_transpterrestre`);

--
-- Indices de la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD PRIMARY KEY (`Id_usuario`),
  ADD KEY `Rol` (`Rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblavion`
--
ALTER TABLE `tblavion`
  MODIFY `id_avion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tblbitacora`
--
ALTER TABLE `tblbitacora`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblcliente`
--
ALTER TABLE `tblcliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbldestino`
--
ALTER TABLE `tbldestino`
  MODIFY `id_destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tblroles`
--
ALTER TABLE `tblroles`
  MODIFY `Id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbltipodestino`
--
ALTER TABLE `tbltipodestino`
  MODIFY `id_tipodestino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tbltransporteterrestre`
--
ALTER TABLE `tbltransporteterrestre`
  MODIFY `id_transpterrestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblbitacora`
--
ALTER TABLE `tblbitacora`
  ADD CONSTRAINT `tblbitacora_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbladmin` (`id_admin`),
  ADD CONSTRAINT `tblbitacora_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tblcliente` (`id_cliente`);

--
-- Filtros para la tabla `tblcliente`
--
ALTER TABLE `tblcliente`
  ADD CONSTRAINT `tblcliente_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `tblusuarios` (`Id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbldestino`
--
ALTER TABLE `tbldestino`
  ADD CONSTRAINT `tbldestino_ibfk_1` FOREIGN KEY (`id_tipodestino`) REFERENCES `tbltipodestino` (`id_tipodestino`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbldestino_ibfk_2` FOREIGN KEY (`id_avion1`) REFERENCES `tblavion` (`id_avion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbldestino_ibfk_3` FOREIGN KEY (`id_avion2`) REFERENCES `tblavion` (`id_avion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbldestino_ibfk_4` FOREIGN KEY (`id_transpterrestre1`) REFERENCES `tbltransporteterrestre` (`id_transpterrestre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbldestino_ibfk_5` FOREIGN KEY (`id_transpterrestre2`) REFERENCES `tbltransporteterrestre` (`id_transpterrestre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD CONSTRAINT `tblusuarios_ibfk_1` FOREIGN KEY (`Rol`) REFERENCES `tblroles` (`Id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

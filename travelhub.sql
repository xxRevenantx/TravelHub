-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2024 a las 21:58:16
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

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
(4, '1234567ACu', 'Boeing 747', 67, 'Aerolíneas Internacionales'),
(5, '987654321D', 'Airbus A380', 50, 'Global Airways'),
(6, '234567891A', 'Boeing 737', 78, 'Aerolíneas Internacionales'),
(7, '876543219D', 'Airbus A320', 80, 'Continental Flights'),
(8, '345678912A', 'Boeing 777', 34, 'Global Airways'),
(9, '765432198D', 'Boeing 787', 42, 'Sky Partners'),
(10, '456789123A', 'Airbus A350', 24, 'Continental Flights'),
(11, '654321987D', 'Boeing 737 MAX', 20, 'Sky Partners'),
(12, '567891234A', 'Embraer E190', 5, 'Regional Jet'),
(25, '123456789T', 'Boeing 747', 67, 'Aerolíneas Internacionales');

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
  `lugarNacimiento` varchar(255) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `RFC` varchar(13) NOT NULL,
  `CURP` varchar(18) NOT NULL,
  `fecha_registro` date NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tblcliente`
--

INSERT INTO `tblcliente` (`id_cliente`, `nombre`, `primer_apellido`, `segundo_apellido`, `lugarNacimiento`, `fechaNacimiento`, `sexo`, `RFC`, `CURP`, `fecha_registro`, `id_rol`) VALUES
(1, 'Liliana', 'Lopez', 'Gonzalez', 'AS', '1989-10-31', 'H', 'JPG12356789AA', 'LOGL891031HASPNLR5', '2023-10-31', 2),
(2, 'Jorge', 'Sandoval', 'Ramirez', 'GT', '1980-12-05', 'H', 'SHD123456789A', 'SARJ801205HGTNMRQ3', '2023-11-05', 2),
(3, 'Andrea', 'Hinojosa', 'Vazquez', 'AS', '1990-08-15', 'M', 'JPG12356789BF', 'HIVA900815MASNZNA9', '2023-11-18', 2),
(4, 'Arturo', 'Cruz', 'Villegas', 'CS', '1995-12-05', 'H', 'SHD123456789A', 'CUVA951205HCSRLRY2', '2023-12-13', 2),
(5, 'Valentin', 'Rojas', 'Mendoza', 'DF', '1992-04-06', 'H', 'JPG12356789BB', 'ROMV920406HDFJNLM5', '2023-12-15', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldestino`
--

CREATE TABLE `tbldestino` (
  `id_destino` int(11) NOT NULL,
  `nombre_destino` varchar(255) NOT NULL,
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

INSERT INTO `tbldestino` (`id_destino`, `nombre_destino`, `id_tipodestino`, `id_avion1`, `id_avion2`, `id_transpterrestre1`, `id_transpterrestre2`, `pais`, `resenia`, `coordenadas`, `imagen_destino`) VALUES
(49, 'Cancún', 1, 4, 5, 1, 2, 'México', 'Destino turístico popular por sus playas y vida nocturna', '21.1619, -86.8515', 0x63616e63756e2e6a7067),
(50, 'Playa del Carmen', 1, 6, 7, 3, 4, 'México', 'Famosa por sus claras aguas caribeñas', '20.6296, -87.0739', 0x706c61796164656c6361726d656e2e6a7067),
(51, 'Tulum', 1, 8, 9, 5, 6, 'México', 'Conocido por sus ruinas mayas frente al mar', '20.2114, -87.4654', 0x74756c756d2e6a7067),
(52, 'Chichen Itza', 2, 10, 11, 7, 8, 'México', 'Uno de los principales sitios arqueológicos de la península de Yucatán', '20.6843, -88.5678', 0x6368696368656e69747a612e6a7067),
(53, 'Cozumel', 1, 12, 4, 9, 10, 'México', 'Isla en el Caribe Mexicano famosa por el buceo en arrecifes de coral', '20.4230, -86.9224', 0x636f7a756d656c2e6a7067),
(54, 'Los Cabos', 1, 4, 5, 1, 2, 'México', 'Destino turístico conocido por sus playas y vida nocturna', '22.8905, -109.9167', 0x6c6f736361626f732e6a7067),
(55, 'Puerto Vallarta', 1, 6, 7, 3, 4, 'México', 'Ciudad costera conocida por su malecón y playas', '20.6534, -105.2253', 0x70756572746f76616c6c617274612e6a7067),
(56, 'Mazatlán', 1, 8, 9, 5, 6, 'México', 'Ciudad portuaria conocida por sus playas y el carnaval', '23.2494, -106.4111', 0x6d617a61746c616e2e6a7067),
(57, 'Acapulco', 1, 10, 11, 7, 8, 'México', 'Famoso destino turístico por sus playas y vida nocturna', '16.8638, -99.8816', 0x61636170756c636f2e6a7067),
(58, 'Ixtapa', 1, 12, 4, 9, 10, 'México', 'Destino turístico conocido por sus resorts y playas', '17.6634, -101.6050', 0x6978746170612e6a7067),
(59, 'Zihuatanejo', 1, 4, 5, 1, 2, 'México', 'Pequeña ciudad pesquera conocida por sus playas y bahía', '17.6389, -101.5538', 0x7a6968756174616e656a6f2e6a7067),
(60, 'Huatulco', 1, 6, 7, 3, 4, 'México', 'Destino turístico conocido por sus nueve bahías y playas', '15.8467, -96.3195', 0x68756174756c636f2e6a7067),
(61, 'Manzanillo', 1, 8, 9, 5, 6, 'México', 'Puerto y destino turístico conocido por sus playas', '19.1048, -104.3158', 0x6d616e7a616e696c6c6f2e6a7067),
(62, 'Veracruz', 3, 10, 11, 7, 8, 'México', 'Ciudad portuaria conocida por su música y danzas tradicionales', '19.1738, -96.1342', 0x766572616372757a2e6a7067),
(63, 'Oaxaca', 2, 12, 4, 9, 10, 'México', 'Ciudad conocida por su arquitectura colonial y festividades', '17.0732, -96.7266', 0x6f61786163612e6a7067),
(64, 'Puebla', 2, 4, 5, 1, 2, 'México', 'Ciudad conocida por su gastronomía y arquitectura colonial', '19.0413, -98.2062', 0x707565626c612e6a7067),
(65, 'Guanajuato', 2, 6, 7, 3, 4, 'México', 'Ciudad histórica conocida por su arquitectura y minas', '21.0190, -101.2574', 0x6775616e616a7561746f2e6a7067),
(66, 'San Miguel de Allende', 2, 8, 9, 5, 6, 'México', 'Ciudad conocida por su arquitectura colonial y arte', '20.9144, -100.7435', 0x73616e6d696775656c6465616c6c656e64652e6a7067),
(67, 'Morelia', 2, 10, 11, 7, 8, 'México', 'Ciudad conocida por su arquitectura colonial y festividades', '19.7008, -101.1844', 0x6d6f72656c69612e6a7067),
(68, 'Querétaro', 2, 12, 4, 9, 10, 'México', 'Ciudad histórica conocida por su arquitectura colonial', '20.5888, -100.3899', 0x71756572657461726f2e6a7067),
(69, 'Taxco', 2, 4, 5, 1, 2, 'México', 'Ciudad conocida por su arquitectura colonial y minas de plata', '18.5566, -99.6051', 0x746178636f2e6a7067),
(70, 'Tlaxcala', 2, 6, 7, 3, 4, 'México', 'Pequeña ciudad conocida por su arquitectura colonial', '19.3182, -98.2375', 0x746c617863616c612e6a7067),
(71, 'Cholula', 2, 8, 9, 5, 6, 'México', 'Ciudad conocida por sus pirámides y arquitectura colonial', '19.0648, -98.3030', 0x63686f6c756c612e6a7067),
(72, 'Teotihuacán', 2, 10, 11, 7, 8, 'México', 'Sitio arqueológico conocido por sus pirámides', '19.6925, -98.8435', 0x74656f746968756163616e2e6a7067),
(73, 'Palenque', 2, 12, 4, 9, 10, 'México', 'Sitio arqueológico conocido por sus ruinas mayas', '17.4849, -91.9810', 0x70616c656e7175652e6a7067),
(74, 'Calakmul', 2, 4, 5, 1, 2, 'México', 'Sitio arqueológico maya en la selva de Campeche', '18.1050, -89.8108', 0x63616c616b6d756c2e6a7067),
(75, 'Tajín', 2, 6, 7, 3, 4, 'México', 'Sitio arqueológico conocido por sus pirámides totonacas', '20.4470, -97.3811', 0x74616a696e2e6a7067),
(76, 'Monte Albán', 2, 8, 9, 5, 6, 'México', 'Sitio arqueológico zapoteca en Oaxaca', '17.0433, -96.7678', 0x6d6f6e7465616c62616e2e6a7067),
(77, 'Mitla', 2, 10, 11, 7, 8, 'México', 'Sitio arqueológico zapoteca conocido por sus mosaicos', '16.9183, -96.3581', 0x6d69746c612e6a7067),
(78, 'Uxmal', 2, 12, 4, 9, 10, 'México', 'Sitio arqueológico maya en Yucatán', '20.3600, -89.7686', 0x75786d616c2e6a7067),
(79, 'Izamal', 2, 4, 5, 1, 2, 'México', 'Ciudad conocida como la \"Ciudad de los Cerros\"', '20.9386, -89.0216', 0x697a616d616c2e6a7067),
(80, 'San Cristóbal de las Casas', 2, 6, 7, 3, 4, 'México', 'Ciudad conocida por su arquitectura colonial y cultura indígena', '16.7370, -92.6373', 0x73616e63726973746f62616c2e6a7067),
(81, 'Tuxtla Gutiérrez', 2, 8, 9, 5, 6, 'México', 'Capital de Chiapas conocida por su zoológico y cañón del Sumidero', '16.7528, -93.1167', 0x747578746c612e6a7067),
(82, 'Tapachula', 2, 10, 11, 7, 8, 'México', 'Ciudad fronteriza conocida por su comercio', '14.9089, -92.2614', 0x746170616368756c612e6a7067),
(83, 'Chetumal', 2, 12, 4, 9, 10, 'México', 'Capital de Quintana Roo conocida por su bahía', '18.5018, -88.2961', 0x63686574756d616c2e6a7067),
(84, 'Xcaret', 2, 4, 5, 1, 2, 'México', 'Parque ecológico y arqueológico en la Riviera Maya', '20.5781, -87.1198', 0x7863617265742e6a7067),
(85, 'Bacalar', 2, 6, 7, 3, 4, 'México', 'Conocido por su Laguna de los Siete Colores', '18.6760, -88.3887', 0x626163616c61722e6a7067),
(86, 'Isla Mujeres', 1, 8, 9, 5, 6, 'México', 'Isla caribeña conocida por sus playas y vida marina', '21.2329, -86.7317', 0x69736c616d756a657265732e6a7067),
(87, 'Holbox', 1, 10, 11, 7, 8, 'México', 'Isla tranquila conocida por sus playas y tiburones ballena', '21.5218, -87.3230', 0x686f6c626f782e6a7067),
(88, 'Puerto Morelos', 1, 12, 4, 9, 10, 'México', 'Pequeña ciudad costera conocida por sus arrecifes de coral', '20.8403, -86.8877', 0x70756572746f6d6f72656c6f732e6a7067),
(89, 'Punta Cana', 1, 4, 5, 1, 2, 'República Dominicana', 'Destino turístico conocido por sus playas y resorts', '18.5601, -68.3725', 0x70756e746163616e612e6a7067),
(90, 'La Romana', 1, 6, 7, 3, 4, 'República Dominicana', 'Ciudad conocida por sus playas y golf', '18.4256, -68.9724', 0x6c61726f6d616e612e6a7067),
(91, 'Santo Domingo', 2, 8, 9, 5, 6, 'República Dominicana', 'Capital del país conocida por su historia y arquitectura colonial', '18.4861, -69.9312', 0x73616e746f646f6d696e676f2e6a7067),
(92, 'San Juan', 2, 10, 11, 7, 8, 'Puerto Rico', 'Capital de la isla conocida por su arquitectura colonial y playas', '18.4655, -66.1057', 0x73616e6a75616e2e6a7067),
(93, 'Ponce', 2, 12, 4, 9, 10, 'Puerto Rico', 'Ciudad conocida por su arquitectura y museos', '18.0111, -66.6141', 0x706f6e63652e6a7067),
(94, 'Mayagüez', 2, 4, 5, 1, 2, 'Puerto Rico', 'Ciudad costera conocida por su universidad y zoológico', '18.2018, -67.1450', 0x6d6179616775657a2e6a7067),
(95, 'Arecibo', 2, 6, 7, 3, 4, 'Puerto Rico', 'Conocido por su observatorio y playas', '18.4721, -66.7163', 0x6172656369626f2e6a7067),
(96, 'Fajardo', 2, 8, 9, 5, 6, 'Puerto Rico', 'Ciudad costera conocida por sus reservas naturales y playas', '18.3258, -65.6523', 0x66616a6172646f2e6a7067),
(97, 'Dubrovnik', 3, 5, 6, 2, 3, 'Croacia', 'Ciudad conocida por su casco antiguo rodeado de murallas', '42.6507, 18.0944', 0x647562726f766e696b2e6a7067),
(98, 'Bali', 1, 7, 8, 4, 5, 'Indonesia', 'Destino turístico famoso por sus playas y templos', '-8.3405, 115.0920', 0x62616c692e6a7067),
(99, 'Kyoto', 2, 9, 10, 6, 7, 'Japón', 'Ciudad famosa por sus templos clásicos y jardines', '35.0116, 135.7681', 0x6b796f746f2e6a7067),
(100, 'Reykjavik', 4, 11, 12, 8, 9, 'Islandia', 'Capital de Islandia conocida por su vida cultural y geotermia', '64.1355, -21.8954', 0x7265796b6a6176696b2e6a7067),
(101, 'Santorini', 1, 6, 7, 3, 4, 'Grecia', 'Isla famosa por sus vistas, puestas de sol y casas encaladas', '36.3932, 25.4615', 0x73616e746f72696e692e6a7067),
(102, 'Petra', 2, 8, 9, 5, 6, 'Jordania', 'Ciudad histórica y arqueológica famosa por sus estructuras talladas en roca', '30.3285, 35.4444', 0x70657472612e6a7067),
(103, 'Budapest', 3, 10, 11, 7, 8, 'Hungría', 'Capital conocida por su arquitectura y sus baños termales', '47.4979, 19.0402', 0x62756461706573742e6a7067),
(104, 'Seúl', 2, 12, 4, 9, 10, 'Corea del Sur', 'Capital moderna famosa por sus rascacielos y templos budistas', '37.5665, 126.9780', 0x7365756c2e6a7067),
(105, 'Cartagena', 3, 5, 6, 2, 3, 'Colombia', 'Ciudad costera famosa por su casco antiguo colonial', '10.3910, -75.4794', 0x636172746167656e612e6a7067),
(106, 'Cusco', 2, 7, 8, 4, 5, 'Perú', 'Ciudad conocida por ser la antigua capital del Imperio Inca', '-13.5319, -71.9675', 0x637573636f2e6a7067),
(107, 'Marrakech', 4, 9, 10, 6, 7, 'Marruecos', 'Ciudad famosa por sus mercados, palacios y jardines', '31.6295, -7.9811', 0x6d617272616b6563682e6a7067),
(108, 'Dubái', 5, 11, 12, 8, 9, 'Emiratos Árabes Unidos', 'Ciudad conocida por su modernidad y rascacielos como el Burj Khalifa', '25.2048, 55.2708', 0x64756261692e6a7067),
(109, 'Lisboa', 3, 6, 7, 3, 4, 'Portugal', 'Capital conocida por sus colinas, tranvías y arquitectura', '38.7223, -9.1393', 0x6c6973626f612e6a7067),
(110, 'Buenos Aires', 3, 8, 9, 5, 6, 'Argentina', 'Capital conocida por su vida nocturna, tango y arquitectura europea', '-34.6037, -58.3816', 0x6275656e6f7361697265732e6a7067),
(111, 'Copenhague', 4, 10, 11, 7, 8, 'Dinamarca', 'Capital conocida por su cultura ciclista y el puerto de Nyhavn', '55.6761, 12.5683', 0x636f70656e68616775652e6a7067),
(112, 'Praga', 3, 12, 4, 9, 10, 'Chequia', 'Capital famosa por su casco antiguo, el Puente de Carlos y el Castillo de Praga', '50.0755, 14.4378', 0x70726167612e6a7067),
(113, 'Moscú', 2, 5, 6, 2, 3, 'Rusia', 'Capital famosa por el Kremlin, la Plaza Roja y la Catedral de San Basilio', '55.7558, 37.6173', 0x6d6f7363752e6a7067),
(114, 'Hanoi', 2, 7, 8, 4, 5, 'Vietnam', 'Capital conocida por su arquitectura, cultura y el barrio antiguo', '21.0285, 105.8542', 0x68616e6f692e6a7067),
(115, 'Sídney', 5, 9, 10, 6, 7, 'Australia', 'Ciudad famosa por su Ópera, el puente del puerto y playas', '-33.8688, 151.2093', 0x7369646e65792e6a7067),
(116, 'El Cairo', 4, 11, 12, 8, 9, 'Egipto', 'Capital conocida por las pirámides de Giza y el Museo Egipcio', '30.0444, 31.2357', 0x656c636169726f2e6a7067),
(117, 'Bangkok', 5, 6, 7, 3, 4, 'Tailandia', 'Capital famosa por sus templos, palacios y vida nocturna', '13.7563, 100.5018', 0x62616e676b6f6b2e6a7067),
(118, 'Nairobi', 4, 8, 9, 5, 6, 'Kenia', 'Capital conocida por el Parque Nacional de Nairobi y sus rascacielos', '-1.2921, 36.8219', 0x6e6169726f62692e6a7067),
(119, 'Lima', 3, 10, 11, 7, 8, 'Perú', 'Capital famosa por su casco antiguo colonial y su gastronomía', '-12.0464, -77.0428', 0x6c696d612e6a7067),
(120, 'Ciudad del Cabo', 5, 12, 4, 9, 10, 'Sudáfrica', 'Ciudad conocida por la Montaña de la Mesa y el Cabo de Buena Esperanza', '-33.9249, 18.4241', 0x63697564616464656c6361626f2e6a7067),
(121, 'Ámsterdam', 4, 5, 6, 2, 3, 'Países Bajos', 'Capital famosa por sus canales, museos y arquitectura', '52.3676, 4.9041', 0x616d7374657264616d2e6a7067),
(122, 'Venecia', 1, 7, 8, 4, 5, 'Italia', 'Ciudad famosa por sus canales, góndolas y arquitectura', '45.4408, 12.3155', 0x76656e656369612e6a7067),
(123, 'Berlín', 2, 9, 10, 6, 7, 'Alemania', 'Capital conocida por su historia, arte y arquitectura moderna', '52.5200, 13.4050', 0x6265726c696e2e6a7067),
(124, 'Toronto', 4, 11, 12, 8, 9, 'Canadá', 'Ciudad famosa por la Torre CN y su diversidad cultural', '43.6532, -79.3832', 0x746f726f6e746f2e6a7067),
(125, 'Santiago', 3, 6, 7, 3, 4, 'Chile', 'Capital conocida por sus parques, museos y montañas', '-33.4489, -70.6693', 0x73616e746961676f2e6a7067),
(126, 'Atenas', 3, 8, 9, 5, 6, 'Grecia', 'Capital conocida por sus ruinas antiguas y el Partenón', '37.9838, 23.7275', 0x6174656e61732e6a7067),
(127, 'Viena', 3, 10, 11, 7, 8, 'Austria', 'Capital conocida por su música clásica, palacios y museos', '48.2082, 16.3738', 0x7669656e612e6a7067),
(128, 'Madrid', 4, 12, 4, 9, 10, 'España', 'Capital conocida por su arte, cultura y gastronomía', '40.4168, -3.7038', 0x6d61647269642e6a7067),
(129, 'Estambul', 5, 5, 6, 2, 3, 'Turquía', 'Ciudad famosa por su historia, mezquitas y el Gran Bazar', '41.0082, 28.9784', 0x657374616d62756c2e6a7067),
(130, 'Oslo', 4, 7, 8, 4, 5, 'Noruega', 'Capital conocida por sus museos, parques y fiordos', '59.9139, 10.7522', 0x6f736c6f2e6a7067),
(131, 'Helsinki', 4, 9, 10, 6, 7, 'Finlandia', 'Capital conocida por su diseño, arquitectura y parques', '60.1695, 24.9354', 0x68656c73696e6b692e6a7067),
(132, 'Bruselas', 3, 11, 12, 8, 9, 'Bélgica', 'Capital famosa por su arquitectura, chocolates y cervezas', '50.8503, 4.3517', 0x62727573656c61732e6a7067),
(133, 'Dublín', 4, 6, 7, 3, 4, 'Irlanda', 'Capital conocida por su literatura, música y pubs', '53.3498, -6.2603', 0x6475626c696e2e6a7067),
(134, 'Zurich', 5, 8, 9, 5, 6, 'Suiza', 'Ciudad conocida por sus bancos, lagos y calidad de vida', '47.3769, 8.5417', 0x7a75726963682e6a7067),
(135, 'Estocolmo', 4, 10, 11, 7, 8, 'Suecia', 'Capital conocida por sus islas, museos y diseño', '59.3293, 18.0686', 0x6573746f636f6c6d6f2e6a7067),
(136, 'Varsovia', 3, 12, 4, 9, 10, 'Polonia', 'Capital conocida por su historia, arquitectura y cultura', '52.2297, 21.0122', 0x766172736f7669612e6a7067),
(137, 'Edimburgo', 3, 5, 6, 2, 3, 'Reino Unido', 'Ciudad conocida por su castillo, festivales y colinas', '55.9533, -3.1883', 0x6564696d627572676f2e6a7067),
(138, 'Múnich', 3, 7, 8, 4, 5, 'Alemania', 'Ciudad famosa por su Oktoberfest, parques y museos', '48.1351, 11.5820', 0x6d756e6963682e6a7067),
(139, 'Bratislava', 2, 9, 10, 6, 7, 'Eslovaquia', 'Capital conocida por su casco antiguo y castillo', '48.1486, 17.1077', 0x6272617469736c6176612e6a7067),
(140, 'Luxemburgo', 2, 11, 12, 8, 9, 'Luxemburgo', 'Capital conocida por sus fortalezas y casco antiguo', '49.6117, 6.1319', 0x6c7578656d627572676f2e6a7067),
(141, 'Sofía', 2, 6, 7, 3, 4, 'Bulgaria', 'Capital conocida por su arquitectura ortodoxa y cultura', '42.6977, 23.3219', 0x736f6669612e6a7067),
(142, 'Sarajevo', 2, 8, 9, 5, 6, 'Bosnia y Herzegovina', 'Capital conocida por su historia, cultura y diversidad', '43.8563, 18.4131', 0x736172616a65766f2e6a7067);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblreservas`
--

CREATE TABLE `tblreservas` (
  `id_reserva` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_destino` int(11) NOT NULL,
  `id_tipodestino` int(11) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `fecha_vuelo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

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
(1, 'Playa', 'visita a acuarios', 'invierno'),
(2, 'Histórico', 'recorrido del centro histórico', 'otoño'),
(3, 'Playa', 'Visita a acuarios', 'Verano'),
(4, 'Extranjero', 'Visita a museos', 'Invierno'),
(5, 'Histórico', 'Tour por la ciudad', 'Primavera'),
(6, 'Playa', 'Recorrido del centro histórico', 'Otoño'),
(7, 'Extranjero', 'Paseo en lancha', 'Verano'),
(8, 'Histórico', 'Visita a museos', 'Primavera'),
(9, 'Playa', 'Tour por la ciudad', 'Primavera'),
(11, 'Playa', 'paseo en lancha', 'verano'),
(12, 'Playa', 'visita a acuarios', 'primavera');

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
(1, 'Autobús', '123336', 60, 2015, 'Transporte Urbano SA'),
(2, 'Taxi', 'XYZ5678', 4, 2018, 'Taxis Rápidos SRL'),
(3, 'Autobús', 'DEF9012', 45, 2014, 'Viajes Seguros SL'),
(4, 'Minivan', 'GHI3456', 7, 2019, 'Transportes Familiares S.A.'),
(5, 'Camioneta', 'JKL7890', 5, 2017, 'Transportes del Norte S.A.'),
(6, 'Taxi', 'MNO1234', 4, 2016, 'Taxis Express SL'),
(7, 'Autobús', 'PQR5678', 60, 2013, 'Rutas Confortables S.A.'),
(8, 'Minivan', 'STU9012', 8, 2020, 'Servicios Ejecutivos SRL'),
(9, 'Camioneta', 'VWX3456', 6, 2015, 'Carga y Transporte SA'),
(10, 'Autobús', 'YZA7890', 55, 2012, 'Transporte Escolar SA'),
(13, 'Autobús', '123455', 50, 2015, 'Transporte Urbano SA'),
(18, 'taxi', '123459', 56, 2023, 'Transporte Urbano SA');

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
-- Indices de la tabla `tblreservas`
--
ALTER TABLE `tblreservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_destino` (`id_destino`),
  ADD KEY `id_tipodestino` (`id_tipodestino`),
  ADD KEY `id_cliente` (`id_cliente`);

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
  MODIFY `id_avion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `tblbitacora`
--
ALTER TABLE `tblbitacora`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblcliente`
--
ALTER TABLE `tblcliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbldestino`
--
ALTER TABLE `tbldestino`
  MODIFY `id_destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT de la tabla `tblreservas`
--
ALTER TABLE `tblreservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblroles`
--
ALTER TABLE `tblroles`
  MODIFY `Id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbltipodestino`
--
ALTER TABLE `tbltipodestino`
  MODIFY `id_tipodestino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tbltransporteterrestre`
--
ALTER TABLE `tbltransporteterrestre`
  MODIFY `id_transpterrestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  ADD CONSTRAINT `tblcliente_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `tblroles` (`Id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `tblreservas`
--
ALTER TABLE `tblreservas`
  ADD CONSTRAINT `tblreservas_ibfk_1` FOREIGN KEY (`id_destino`) REFERENCES `tbldestino` (`id_destino`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblreservas_ibfk_2` FOREIGN KEY (`id_tipodestino`) REFERENCES `tbltipodestino` (`id_tipodestino`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblreservas_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `tblcliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD CONSTRAINT `tblusuarios_ibfk_1` FOREIGN KEY (`Rol`) REFERENCES `tblroles` (`Id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

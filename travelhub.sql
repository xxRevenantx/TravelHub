-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2024 a las 07:47:20
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
(1, 'Liliana', 'Lopez', 'Gonzalez', 'AS', '1989-10-31', 'H', 'JPG12356789AA', 'LOGL891031HASPNLI0', '2023-10-31', 2),
(2, 'Jorge', 'Sandoval', 'Ramirez', 'GT', '1980-12-05', 'H', 'SHD123456789A', 'SARJ801205HGTNMRQ3', '2023-11-05', 2),
(3, 'Andrea', 'Hinojosa', 'Vazquez', 'AS', '1990-08-15', 'M', 'JPG12356789BF', 'HIVA900815MASNZNA9', '2023-11-18', 2),
(4, 'Arturo', 'Cruz', 'Villegas', 'CS', '1995-12-05', 'H', 'SHD123456789A', 'CUVA951205HCSRLRY2', '2023-12-13', 2),
(5, 'Valentin', 'Rojas', 'Mendoza', 'DF', '1992-04-06', 'H', 'JPG12356789BB', 'ROMV920406HDFJNLM5', '2023-12-15', 2),
(6, 'Alberto', 'Gracia', 'Barela', 'ZS', '1972-05-16', 'M', 'LKHQ693585FNX', 'CWLC643323VCUS14HX', '2024-05-30', 2),
(7, 'Ariadna', 'Avalos', 'Galindo', 'PL', '1989-12-04', 'H', 'GFGI734755BXX', 'LBFA208653MBCG49HX', '2024-02-29', 2),
(8, 'Salvador', 'Collado', 'Galvez', 'YN', '1990-10-14', 'H', 'NDAW314784FXX', 'VZAL049932IPEB75YX', '2024-03-03', 2),
(9, 'Espartaco', 'Gonzalez', 'Medrano', 'MS', '1996-07-27', 'M', 'ZUES402109YZX', 'TCUA887896QIMJ63QX', '2024-03-09', 2),
(10, 'Marisol', 'Botello', 'Barraza', 'PL', '1980-04-04', 'M', 'IXIY583628IKX', 'AUFO730523SGQC65WX', '2024-03-25', 2),
(11, 'Graciela', 'Sepulveda', 'Melendez', 'MC', '1958-10-07', 'M', 'LVGC922080JXX', 'GCKF986742KHCT14UX', '2024-05-18', 2),
(12, 'Fabiola', 'Galindo', 'Puga', 'CL', '1970-07-28', 'H', 'YDCR950317COX', 'FBOQ468171EQVP76TX', '2024-03-23', 2),
(13, 'Vicente', 'Valverde', 'Olivera', 'NL', '1972-01-06', 'M', 'UWQI896291INX', 'KGCN454334WGVX44PX', '2024-02-19', 2),
(14, 'Estefania', 'Ulloa', 'Franco', 'YN', '1949-08-15', 'H', 'MIAH613336TGX', 'GVSF474742KVDW26CX', '2024-02-14', 2),
(15, 'Isabela', 'Espino', 'Mateo', 'VZ', '1964-09-23', 'H', 'EPLP498036POX', 'DTBT365545OCCZ09JX', '2024-01-31', 2),
(16, 'Concepcion', 'Zuniga', 'Murillo', 'AS', '1947-06-07', 'M', 'VVLB385218SFX', 'ZUMC470607MASNRNF0', '2024-04-08', 2),
(17, 'Daniel', 'Aponte', 'Quintana', 'MC', '1934-08-11', 'M', 'FFHI718541RHX', 'FXZB515615LDGR75BX', '2024-05-09', 2),
(18, 'Ramon', 'Acevedo', 'Romo', 'OC', '2006-05-16', 'M', 'NGIN083818ZAX', 'UGBA208996VMNJ89AX', '2024-01-02', 2),
(19, 'Ana Maria', 'Vargas', 'Hidalgo', 'DG', '1997-05-08', 'H', 'GLSS399904WSX', 'ZJMW384920WFQC26KX', '2024-02-19', 2),
(20, 'Julio', 'Tapia', 'Estrada', 'OC', '1962-02-15', 'H', 'KZGW612148PQX', 'TAEJ620215HOCPSLX6', '2024-04-15', 2),
(21, 'Estela', 'Vasquez', 'Zepeda', 'CH', '1954-06-12', 'H', 'PGZR467560HLX', 'VCVI832518BXZL72QX', '2024-02-28', 2),
(22, 'Aurelio', 'Fonseca', 'de Leon', 'JC', '1999-04-04', 'M', 'GVZO647042XWX', 'FMIC552372DNOS56CX', '2024-01-31', 2),
(23, 'Guadalupe', 'Carbajal', 'Laureano', 'NT', '1952-02-10', 'H', 'RIWB120564VLX', 'BSCA113343AIIP22KX', '2024-03-03', 2),
(24, 'Dario', 'Valdes', 'Acosta', 'TS', '2003-01-29', 'H', 'RRGJ368450HFX', 'GGSK551114PFFL83BX', '2024-02-08', 2),
(25, 'Fabiola', 'Aponte', 'Villasenor', 'PL', '1936-01-13', 'H', 'GSVZ599414CIX', 'GSWI313964RNTN17FX', '2024-03-01', 2),
(26, 'Ignacio', 'Perales', 'Tafoya', 'MS', '1945-12-28', 'H', 'LAPW423660AAX', 'BAUP587107HVDP61CX', '2024-06-01', 2),
(27, 'Serafin', 'Quesada', 'Grijalva', 'NT', '1977-01-12', 'M', 'RISQ927954QFX', 'LKAT493251SQVM93DX', '2024-04-27', 2),
(28, 'Luis Manuel', 'Espinoza', 'Garibay', 'NT', '1943-03-09', 'M', 'ZGBQ923195KSX', 'FHJW012162ADSZ35UX', '2024-01-28', 2),
(29, 'Barbara', 'Ocampo', 'Bueno', 'QR', '1989-11-09', 'H', 'URWG041574RNX', 'UKKW352786UVER67YX', '2024-02-22', 2),
(30, 'Gloria', 'Becerra', 'Partida', 'TL', '1939-03-26', 'M', 'PXUT086647HJX', 'XNTL210503SKCT03GX', '2024-02-29', 2),
(31, 'Fabiola', 'Valadez', 'Solorio', 'HG', '1955-06-02', 'M', 'BGAV492752BTX', 'VASF550602MHGLLBS5', '2024-03-11', 2),
(32, 'Georgina', 'Portillo', 'Reyes', 'BS', '1974-10-12', 'M', 'TICZ198663MAX', 'WODK663818LRCA61JX', '2024-05-10', 2),
(33, 'Elias', 'Soto', 'Navarro', 'HG', '1933-07-20', 'M', 'GTOP413485QNX', 'CBLB165323TLVU51AX', '2024-05-30', 2),
(34, 'Clara', 'Tirado', 'Zedillo', 'CS', '1965-10-25', 'M', 'EEGF140604QBX', 'OVRS241659YKLG17PX', '2024-02-01', 2),
(35, 'Omar', 'de la O', 'Tellez', 'MS', '1948-03-26', 'M', 'LXLQ913169MYX', 'DLBZ594789JSTI07BX', '2024-03-06', 2),
(36, 'Alfonso', 'Haro', 'Altamirano', 'CH', '1966-07-23', 'M', 'PMEO356990UVX', 'PZAL964211GGWY88ZX', '2024-03-09', 2),
(37, 'Abraham', 'Ibarra', 'Marin', 'MN', '1960-02-04', 'H', 'WCLA933504DCX', 'XLYU778154FIUD23PX', '2024-04-06', 2),
(38, 'Oliver', 'Garcia', 'Cantu', 'OC', '1978-01-04', 'H', 'DJXK471129PJX', 'LQLY034713VFSF71ZX', '2024-04-22', 2),
(39, 'Bernabe', 'Maya', 'Holguin', 'HG', '1994-09-29', 'H', 'BKCO417206YWX', 'MGQQ566878NMUU27UX', '2024-04-16', 2),
(40, 'Samuel', 'Arevalo', 'Molina', 'DG', '1986-11-15', 'H', 'QDZI777532QZX', 'QMAZ512961LGGX36XX', '2024-03-31', 2),
(41, 'Genaro', 'Valverde', 'Padron', 'QT', '1968-10-02', 'H', 'GBTA830516MDX', 'BLDT362272ABHV03NX', '2024-05-28', 2),
(42, 'Jose Maria', 'Hernandez', 'Valles', 'MC', '1947-11-25', 'H', 'UNLQ134347YWX', 'KTTR858146BLGK17UX', '2024-03-12', 2),
(43, 'Isabela', 'Madrigal', 'Bermudez', 'SR', '1955-11-11', 'H', 'RZYI808088PWX', 'CWSG572155BOGI64ZX', '2024-01-03', 2),
(44, 'Camilo', 'Pelayo', 'Amador', 'VZ', '1997-11-18', 'M', 'OJWN094259BEX', 'XSTF125794FOQA08CX', '2024-01-09', 2),
(45, 'Pablo', 'Rojas', 'de la Cruz', 'VZ', '1981-08-08', 'M', 'SGUX221701WAX', 'OTUX014555EIVA24XX', '2024-03-25', 2),
(46, 'Augusto', 'Saucedo', 'Villasenor', 'VZ', '1991-07-06', 'M', 'ZKMS477714WFX', 'BZNE558177YVVC15DX', '2024-02-15', 2),
(47, 'Gabriela', 'Cordova', 'Villasenor', 'DF', '1992-10-14', 'H', 'MHYW625980VBX', 'BAEW621614FDPF70ZX', '2024-02-02', 2),
(48, 'Ramon', 'Arenas', 'Raya', 'GT', '1988-01-02', 'H', 'GLUE366717QQX', 'NLVH053317FXEN36OX', '2024-01-08', 2),
(49, 'Diego', 'Benavidez', 'Barrientos', 'DF', '2000-06-04', 'M', 'DHJO225585DJX', 'MDNJ690846YEIT73MX', '2024-02-10', 2),
(50, 'Wendolin', 'Pizarro', 'Coronado', 'HG', '1956-03-05', 'H', 'BUYG942961YVX', 'PDUQ732170UPDC53IX', '2024-03-02', 2),
(51, 'Victoria', 'Alcaraz', 'Melgar', 'QT', '1997-03-27', 'H', 'BEYV494128CGX', 'OYDD692828BKJZ10OX', '2024-05-26', 2),
(52, 'Rodolfo', 'Lozada', 'Perales', 'SL', '1950-07-26', 'M', 'GKQY492324IKX', 'FVUH357194EECU01QX', '2024-03-08', 2),
(53, 'Celia', 'Tejeda', 'Prado', 'CS', '1934-11-29', 'H', 'CXIX372500NWX', 'OEHL199291VDHW30UX', '2024-02-03', 2),
(54, 'Alfonso', 'Laboy', 'Corrales', 'GR', '1978-07-01', 'M', 'YRUH816227ZMX', 'EDZK537890SCMO51UX', '2024-01-27', 2),
(55, 'Abraham', 'Vela', 'Guerrero', 'CS', '1959-09-16', 'H', 'DHYM052796DJX', 'RCNE604907YCUQ07CX', '2024-03-06', 2),
(56, 'Clemente', 'Fierro', 'Carrillo', 'TS', '1999-07-13', 'M', 'ITWB313012AXX', 'ECJI953312EKVQ77KX', '2024-03-13', 2),
(57, 'Francisco', 'Ornelas', 'Casas', 'SL', '1999-04-28', 'H', 'WKPM632297FSX', 'XDGK670803TAGR91IX', '2024-02-15', 2),
(58, 'Aida', 'Gamez', 'Ruiz', 'MS', '1965-07-22', 'H', 'YDXR709478XYX', 'YXPW112201HHYD70RX', '2024-03-20', 2),
(59, 'Geronimo', 'Ibarra', 'Iglesias', 'VZ', '1960-04-05', 'M', 'KKRC496137WFX', 'RYAN288192CHOM80LX', '2024-05-20', 2),
(60, 'Hector', 'Morales', 'Fuentes', 'SR', '1981-10-07', 'H', 'XBFL854587OTX', 'EPXT632457HJWG65JX', '2024-02-27', 2),
(61, 'Angel', 'Marin', 'Burgos', 'PL', '1980-08-02', 'H', 'HDKT688594LEX', 'JRNN078163PRVR39RX', '2024-02-13', 2),
(62, 'Amador', 'Ybarra', 'Maldonado', 'QR', '1964-11-29', 'H', 'LLGX884314DGX', 'AMWK411716UHMI35JX', '2024-02-16', 2),
(63, 'Barbara', 'Puga', 'Acosta', 'VZ', '1958-03-10', 'M', 'FWEC900751FGX', 'PHJI375310GSTB75MX', '2024-02-27', 2),
(64, 'Jacinto', 'Luna', 'Pabon', 'CL', '2003-10-16', 'H', 'YCPU600950QUX', 'PXSI704634CIVD14JX', '2024-05-10', 2),
(65, 'Ignacio', 'Fajardo', 'Orta', 'SL', '1991-07-02', 'M', 'QPZC569536FWX', 'BVGR514114UUJE67OX', '2024-03-30', 2),
(66, 'Emiliano', 'Sanchez', 'Lucio', 'CH', '1987-05-31', 'H', 'RWDM844196KDX', 'WMAC522702ZIWQ42UX', '2024-02-06', 2),
(67, 'Jose Emilio', 'Briones', 'Longoria', 'MN', '1955-04-02', 'H', 'SBMC295399ANX', 'JEYA350935MVAN26DX', '2024-03-02', 2),
(68, 'Clemente', 'Olivarez', 'Ruelas', 'TC', '1935-10-01', 'H', 'WMKS425034WIX', 'JLMW355313HWZJ85UX', '2024-04-02', 2),
(69, 'Eugenio', 'Gamboa', 'Maestas', 'PL', '1942-02-17', 'H', 'MHIV327575PFX', 'RNNG282596ESUZ68DX', '2024-05-10', 2),
(70, 'Amanda', 'Quinones', 'Hernadez', 'JC', '1952-04-07', 'H', 'KWBA490731ATX', 'SWJV998348WYHM83WX', '2024-04-02', 2),
(71, 'Josefina', 'Carvajal', 'Castaneda', 'VZ', '1937-03-25', 'M', 'AEHT080659TGX', 'DRVS619191WDKV92DX', '2024-02-27', 2),
(72, 'Agustin', 'Aguayo', 'Tamayo', 'SR', '1999-03-09', 'H', 'PEUD202803HLX', 'PERS304552NNKC76VX', '2024-05-22', 2),
(73, 'Itzel', 'Gracia', 'Guajardo', 'NL', '1983-05-14', 'H', 'QERF841654MXX', 'MALP464768XUZU82EX', '2024-05-15', 2),
(74, 'Isabel', 'Jiminez', 'Luna', 'MC', '1957-01-02', 'H', 'HJGZ015324KBX', 'MDGL621007PJBB82XX', '2024-05-17', 2),
(75, 'Silvano', 'Corrales', 'Duran', 'PL', '1993-09-19', 'M', 'KZJS958512GSX', 'HWME768309IBTS75AX', '2024-04-21', 2),
(76, 'Rafael', 'Munguia', 'Jasso', 'MN', '1935-11-14', 'H', 'AUKD048385ERX', 'BSJP313147KJCQ67HX', '2024-04-13', 2),
(77, 'Citlali', 'Garibay', 'Santiago', 'NT', '1970-05-28', 'H', 'LTMA836999MXX', 'SVKQ352342NEKK56ZX', '2024-03-23', 2),
(78, 'Marcela', 'Berrios', 'Rivas', 'VZ', '1972-10-11', 'H', 'XHQB530595BYX', 'YYAI821585WZTM78FX', '2024-01-14', 2),
(79, 'Silvano', 'Villagomez', 'Rivera', 'OC', '1995-02-18', 'H', 'IMMJ790131RIX', 'TCKA631830UVGT38CX', '2024-01-24', 2),
(80, 'Hugo', 'Ybarra', 'Vanegas', 'GT', '1975-01-12', 'H', 'NCIV445290IIX', 'DFZQ782656WKFU32VX', '2024-04-11', 2),
(81, 'Ruben', 'Gamez', 'Avalos', 'MC', '1969-02-21', 'M', 'XGBG229709ZYX', 'OLJP092294SCLS71QX', '2024-02-14', 2),
(82, 'Fabiola', 'Romero', 'Romo', 'CH', '1975-06-16', 'H', 'CAKF154879LDX', 'GRYO451115MGCQ00XX', '2024-03-19', 2),
(83, 'Octavio', 'Gil', 'Ortega', 'ZS', '1997-08-08', 'M', 'AVAB116788CFX', 'KAQT399915ZZGZ55GX', '2024-01-26', 2),
(84, 'Angelica', 'Vergara', 'Rubio', 'NL', '1958-08-01', 'M', 'PVUJ692785DPX', 'ANXR192944KVPW21XX', '2024-05-31', 2),
(85, 'Teodoro', 'Velasco', 'Porras', 'CS', '1959-06-12', 'H', 'AWZN865866ALX', 'MWRR686142OYPS28PX', '2024-03-31', 2),
(86, 'Homero', 'Valenzuela', 'Velazquez', 'CS', '1953-12-18', 'H', 'OFFU986831JNX', 'UJLT902458RWRY21HX', '2024-03-22', 2),
(87, 'Maria Jose', 'Garay', 'Cortes', 'QR', '1980-02-12', 'H', 'YUPM932249VOX', 'NYMA445882VWTQ62SX', '2024-02-21', 2),
(88, 'Jacobo', 'Gastelum', 'Carmona', 'GT', '1992-07-05', 'M', 'WISK085885VTX', 'ANXQ087527VLEZ19GX', '2024-04-24', 2),
(89, 'Maximiliano', 'Zarate', 'Barajas', 'TS', '1942-09-20', 'H', 'SCXW394461CBX', 'QXIC982260DXJQ11JX', '2024-01-07', 2),
(90, 'Jaime', 'Mojica', 'Moya', 'SL', '1965-04-04', 'M', 'GMNX270841AKX', 'CTUZ047318HODM54OX', '2024-01-15', 2),
(91, 'Ruby', 'Mayorga', 'Saiz', 'NL', '1983-03-05', 'M', 'NHSK375154QMX', 'HLCO037174MTQA48HX', '2024-01-07', 2),
(92, 'Irma', 'Garibay', 'Uribe', 'TS', '1944-08-11', 'M', 'XCPI066358JVX', 'BKHM906243UFXA05DX', '2024-01-07', 2),
(93, 'Juan', 'Adame', 'Orellana', 'MC', '1941-03-10', 'H', 'ZLWV871560TMX', 'JDBF512130SQDU11MX', '2024-01-01', 2),
(94, 'Sonia', 'Pantoja', 'Mercado', 'TC', '1988-12-20', 'M', 'HVNN262989EBX', 'WDJP929983EBUJ76CX', '2024-05-19', 2),
(95, 'Cesar', 'Olivarez', 'Miranda', 'TC', '1993-01-13', 'H', 'VWII643950XNX', 'CZZW615395QOBF69LX', '2024-04-11', 2),
(96, 'Gilberto', 'Saenz', 'Orozco', 'SR', '1933-12-30', 'M', 'APEY612746EWX', 'PHDV863368BRCC96AX', '2024-01-02', 2),
(97, 'Esperanza', 'Llamas', 'Pena', 'SR', '1973-03-21', 'M', 'TPSL733082XGX', 'FRKZ468455GINQ62LX', '2024-04-24', 2),
(98, 'Lilia', 'Salgado', 'Angulo', 'TL', '1975-04-16', 'M', 'NPSN218007TGX', 'PCFF379276UQXY87EX', '2024-01-21', 2),
(99, 'Javier', 'Peres', 'Espinal', 'SR', '1950-07-05', 'M', 'PYDC538486BFX', 'ZVUX969425PTUF90HX', '2024-04-23', 2),
(100, 'Martin', 'Pulido', 'Henriquez', 'SR', '1971-03-31', 'H', 'UCVL838776VHX', 'NAQP663604CAOW29YX', '2024-04-18', 2),
(101, 'Zoe', 'Cortez', 'Colunga', 'TC', '2000-02-18', 'M', 'VWGL460275PSX', 'IMRF868084YIQZ87DX', '2024-05-02', 2),
(102, 'Jaime', 'Gollum', 'Longoria', 'DG', '1935-09-11', 'H', 'HKTU921326PWX', 'BSNQ390373JYBE27DX', '2024-05-24', 2),
(103, 'Mauricio', 'Trujillo', 'Torrez', 'TL', '1987-05-10', 'M', 'ZCWR216067JIX', 'RUNJ634951PNMT18JX', '2024-04-05', 2),
(104, 'Gloria', 'Sanches', 'Tijerina', 'ZS', '1946-01-21', 'H', 'HUVL898688ETX', 'RAFV677975TVPX72IX', '2024-04-14', 2),
(105, 'Liliana', 'de la Cruz', 'Mireles', 'TL', '1994-06-16', 'H', 'EYQI188109RFX', 'HTAY050833NZJH79ZX', '2024-01-13', 2),
(106, 'Serafin', 'Orta', 'Posada', 'BS', '1979-06-06', 'M', 'ONYZ027926CWX', 'GQKM525924WRTL78KX', '2024-02-21', 2),
(107, 'Rolando', 'Montero', 'Flores', 'TL', '1983-08-10', 'M', 'TTPX371765WCX', 'VSBM553764EMXV97YX', '2024-05-14', 2),
(108, 'Zoe', 'Arguello', 'Ruiz', 'QR', '1975-08-25', 'H', 'ZQDO902326PQX', 'WIMM223080YUMA29KX', '2024-01-13', 2),
(109, 'Raul', 'Heredia', 'Mesa', 'CL', '1946-01-17', 'H', 'JMZK748584HCX', 'EUYN747660LJQP99OX', '2024-01-06', 2),
(110, 'Diana', 'Rojo', 'Enriquez', 'TC', '1954-12-25', 'H', 'HUZC679532RQX', 'ZYLH894032IQFC63RX', '2024-01-25', 2),
(111, 'Maria del Carmen', 'Martinez', 'Blanco', 'CC', '1953-09-07', 'H', 'WMBG255906WNX', 'HOTY669817RDYM07YX', '2024-04-20', 2),
(112, 'Jose Carlos', 'Bravo', 'Soria', 'TS', '1948-11-30', 'M', 'LGIW716464ZYX', 'APMR760490UBAD21XX', '2024-05-01', 2),
(113, 'Paola', 'Urrutia', 'Naranjo', 'TL', '1982-09-22', 'M', 'KXCP497308RLX', 'EKZW721312OPKT54PX', '2024-04-08', 2),
(114, 'Aurora', 'Escobar', 'Cornejo', 'QT', '1962-09-06', 'H', 'GWVV568807UTX', 'PLDF822818EQQQ76HX', '2024-03-26', 2),
(115, 'Caridad', 'Rosas', 'Serrato', 'QR', '1962-12-15', 'M', 'TCVJ088898IGX', 'WBWL282303ZXEG82YX', '2024-03-28', 2),
(116, 'Georgina', 'Madrid', 'Merino', 'JC', '1996-02-27', 'H', 'LPTZ609836CRX', 'LOPY660383PTKL43DX', '2024-03-19', 2),
(117, 'Indira', 'Bonilla', 'Gil', 'SL', '2006-01-06', 'H', 'LPMU074757LVX', 'BOGQ422564WHTA19OX', '2024-03-18', 2),
(118, 'Maria Elena', 'Pineda', 'Amaya', 'ZS', '1961-12-12', 'M', 'FASH020914IMX', 'HVHG616288CZMN52FX', '2024-04-11', 2),
(119, 'Bernardo', 'Rubio', 'de Anda', 'DF', '1945-08-24', 'M', 'KHVG592753JTX', 'TUNZ474946UWLT57YX', '2024-02-26', 2),
(120, 'Mayte', 'Villareal', 'Ruelas', 'CH', '1976-01-16', 'M', 'HFQZ509136DSX', 'RWZB776924QEVL65EX', '2024-05-08', 2),
(121, 'Linda', 'Riojas', 'Munguia', 'ZS', '1955-03-10', 'H', 'QQTT861161MMX', 'SDMA960501SNQM87OX', '2024-04-17', 2),
(122, 'Ivonne', 'Carranza', 'Sanabria', 'SP', '1940-05-27', 'M', 'JYBQ035792UOX', 'ETQN333262OMUA05YX', '2024-05-06', 2),
(123, 'Fernando', 'Armenta', 'Ayala', 'TS', '1935-12-21', 'M', 'LFNW298927CUX', 'HVBB808956LEWD46PX', '2024-02-22', 2),
(124, 'Berta', 'Garibay', 'Muro', 'SP', '2005-06-23', 'M', 'YEMU655612WQX', 'XMHH374414FYLX20DX', '2024-01-02', 2),
(125, 'Catalina', 'Quinonez', 'Arce', 'CL', '2002-11-10', 'M', 'YIHB436081NMX', 'VXLH582082GXAC38BX', '2024-06-01', 2),
(126, 'Espartaco', 'Guajardo', 'Arenas', 'PL', '1966-04-23', 'M', 'NRVO674829YXX', 'XFZG668241ACTG54JX', '2024-05-13', 2),
(127, 'Uriel', 'Valdivia', 'Bustos', 'NT', '1994-09-20', 'M', 'YLHS068112GGX', 'KTJK283385KFJU83GX', '2024-01-15', 2),
(128, 'Elias', 'Barrios', 'Ozuna', 'PL', '1965-10-08', 'H', 'JONS632339PQX', 'RGTH688277MSIO21TX', '2024-01-30', 2),
(129, 'Sandra', 'Gamez', 'Orosco', 'QT', '2005-10-01', 'H', 'FHPG145383PVX', 'VBSB855553JNWS42MX', '2024-05-17', 2),
(130, 'Miguel Angel', 'Anaya', 'Rosado', 'VZ', '1942-06-28', 'H', 'RYXM338111DSX', 'CRAH710603YMJP69DX', '2024-04-02', 2),
(131, 'Perla', 'Franco', 'Lerma', 'MN', '1991-01-21', 'M', 'XJWC821327DYX', 'BVXE661591YABJ20YX', '2024-01-03', 2),
(132, 'Rene', 'Tejada', 'Manzanares', 'CS', '1988-08-30', 'H', 'RRJQ583282NAX', 'NWYH413080SVBE80BX', '2024-01-02', 2),
(133, 'Virginia', 'Duran', 'Reyna', 'CL', '1963-11-01', 'M', 'MFDJ982320FSX', 'LUWN423125UAZG81DX', '2024-02-26', 2),
(134, 'Adan', 'Villa', 'Pabon', 'CC', '1943-03-07', 'M', 'CDFQ704977HSX', 'GVJN505181HFUE63FX', '2024-04-22', 2),
(135, 'Tania', 'Castellanos', 'Carrillo', 'BC', '1971-09-29', 'H', 'PRTW407037ILX', 'UBLQ562969QKDP36AX', '2024-02-04', 2),
(136, 'Victoria', 'Salinas', 'Ledesma', 'MS', '1943-03-02', 'M', 'EWHJ326593OQX', 'ZGTN269341JZED63IX', '2024-05-23', 2),
(137, 'Rosa', 'Fierro', 'Mota', 'SP', '1960-10-06', 'M', 'SXCW834516NCX', 'ZKAX585384YOPP95UX', '2024-02-12', 2),
(138, 'Vicente', 'Naranjo', 'Abreu', 'VZ', '1947-04-23', 'M', 'QSYW544397WBX', 'PUIO912390AGPK06XX', '2024-05-27', 2),
(139, 'Ricardo', 'Monroy', 'Posada', 'CH', '1962-04-13', 'H', 'AMBL434830XTX', 'BRAB799524PXWD95TX', '2024-01-31', 2),
(140, 'Citlali', 'Osorio', 'Escobar', 'BS', '1957-01-06', 'H', 'DTXN405350CBX', 'ITTF037899ALYR07CX', '2024-04-26', 2),
(141, 'Emilio', 'Soria', 'Negron', 'JC', '2000-07-06', 'M', 'CMUQ209146NMX', 'GJNP119860KAZY93VX', '2024-05-07', 2),
(142, 'Rebeca', 'Portillo', 'Echeverria', 'NL', '1981-01-01', 'H', 'TOKG972486CPX', 'JHKM420438BCVM01TX', '2024-04-02', 2),
(143, 'Modesto', 'Medina', 'Concepcion', 'TC', '1968-03-30', 'H', 'VSNY432060ACX', 'GWRS723821RDRN82HX', '2024-05-21', 2),
(144, 'Juana', 'Tello', 'Alcaraz', 'GR', '2001-06-09', 'M', 'VHVZ897206SEX', 'QOIO145419XUVY89TX', '2024-04-04', 2),
(145, 'Ruby', 'Bravo', 'Mena', 'TC', '1964-10-07', 'M', 'BOJO361276UCX', 'XGIY687570FQBT83WX', '2024-05-08', 2),
(146, 'Humberto', 'Anaya', 'Pedraza', 'TL', '1968-12-08', 'M', 'FPGY055235NRX', 'PLWY972910DHEG28QX', '2024-02-10', 2),
(147, 'Gloria', 'Altamirano', 'Casillas', 'OC', '1967-01-14', 'H', 'BPDK228578QFX', 'ITGM381377QJMT58FX', '2024-04-19', 2),
(148, 'Emilio', 'Ceja', 'Ojeda', 'GT', '1994-04-06', 'M', 'PGKP016301VXX', 'PXOJ601940CJBD91YX', '2024-05-21', 2),
(149, 'Nicolas', 'Garica', 'Avalos', 'MC', '1944-05-21', 'M', 'IDGC681833OKX', 'MEWA150746ACNW05KX', '2024-02-22', 2),
(150, 'Asuncion', 'Reynoso', 'Urrutia', 'HG', '1952-01-14', 'H', 'BLSM334975OJX', 'SNRT628484LZLI34YX', '2024-04-08', 2);

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
(1, 'Manzanillo, Col.', 1, 6, 8, 2, 5, 'México', 'Manzanillo es un puerto y destino turístico en el estado de Colima, conocido por sus hermosas playas de arena dorada y aguas cristalinas.', '13.1631, 72.5450', 0x2e2e2f2e2e2f56696577732f6173736574732f696d6167656e65732f64657374696e6f732f696d616765732e6a666966),
(2, 'Boston', 4, 9, 8, 6, 6, 'Estados Unidos', 'Boston, ubicada en la costa este de los Estados Unidos, es una ciudad rica en historia y cultura.', '13.1631, 72.5450', 0x2e2e2f2e2e2f56696577732f6173736574732f696d6167656e65732f64657374696e6f732f626f73746f6e2d6d6173736163687573657474732d424f53544f4e5447303232312d37313961656632656562316334393239623663383339373135653334613639652e6a7067),
(3, 'Guanajuato, Gto.', 5, 10, 5, 1, 2, 'México', 'Guanajuato es una ciudad colonial en el centro de México, famosa por sus coloridas calles empedradas, túneles subterráneos y su rica historia minera.', '13.1631, 72.5450', 0x2e2e2f2e2e2f56696577732f6173736574732f696d6167656e65732f64657374696e6f732f3132303070782d4775616e61677561746f5f61745f6e696768742e6a7067),
(4, 'New York', 4, 8, 6, 3, 8, 'Estados Unidos', 'Nueva York es una de las ciudades más icónicas del mundo, conocida por su impacto significativo en comercio, finanzas, medios de comunicación, arte, moda y entretenimiento. Lugares emblemáticos como la Estatua de la Libertad, Central Park, Times Square y ', '13.1631, 72.5450', 0x2e2e2f2e2e2f56696577732f6173736574732f696d6167656e65732f64657374696e6f732f4e65775f796f726b5f74696d65735f7371756172652d74657261626173732e6a7067);

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

--
-- Volcado de datos para la tabla `tblreservas`
--

INSERT INTO `tblreservas` (`id_reserva`, `id_cliente`, `id_destino`, `id_tipodestino`, `fecha_reserva`, `fecha_vuelo`) VALUES
(1, 1, 1, 3, '2024-01-17', '2024-01-01'),
(2, 2, 1, 3, '2024-01-02', '2024-01-01'),
(3, 42, 4, 4, '2024-02-02', '2024-02-03'),
(4, 65, 4, 4, '2024-01-04', '2024-01-25'),
(5, 87, 4, 4, '2024-01-05', '2024-01-25'),
(6, 13, 2, 4, '2024-01-06', '2024-01-10'),
(7, 26, 2, 4, '2024-01-07', '2024-01-10'),
(8, 39, 2, 4, '2024-01-08', '2024-01-10'),
(9, 54, 2, 4, '2024-01-09', '2024-01-10'),
(10, 67, 2, 4, '2024-01-10', '2024-01-10'),
(11, 75, 2, 4, '2024-01-11', '2024-01-10'),
(12, 89, 2, 4, '2024-01-12', '2024-01-10'),
(13, 94, 2, 4, '2024-01-13', '2024-01-10'),
(14, 103, 2, 4, '2024-01-14', '2024-01-10'),
(15, 112, 2, 4, '2024-01-15', '2024-01-10'),
(16, 127, 2, 4, '2024-01-16', '2024-01-10'),
(17, 139, 2, 4, '2024-01-17', '2024-01-10'),
(18, 142, 2, 4, '2024-01-18', '2024-01-10'),
(19, 149, 2, 4, '2024-01-19', '2024-01-10'),
(20, 12, 2, 4, '2024-01-20', '2024-01-10'),
(21, 24, 3, 8, '2024-01-21', '2024-01-18'),
(22, 37, 3, 8, '2024-01-22', '2024-01-18'),
(23, 53, 3, 8, '2024-01-23', '2024-01-18'),
(24, 68, 3, 8, '2024-01-24', '2024-01-18'),
(25, 73, 3, 8, '2024-01-25', '2024-01-18'),
(26, 86, 3, 8, '2024-01-26', '2024-01-18'),
(27, 91, 3, 8, '2024-01-27', '2024-01-18'),
(28, 102, 3, 8, '2024-01-28', '2024-01-18'),
(29, 115, 4, 4, '2024-01-29', '2024-01-25'),
(30, 124, 4, 4, '2024-01-30', '2024-01-25'),
(31, 130, 4, 4, '2024-01-31', '2024-01-25'),
(32, 138, 4, 4, '2024-01-31', '2024-01-25'),
(33, 146, 4, 4, '2024-01-31', '2024-01-25'),
(34, 3, 1, 3, '2024-01-01', '2024-01-01'),
(35, 18, 4, 4, '2024-01-31', '2024-01-25'),
(36, 29, 4, 4, '2024-01-31', '2024-01-25'),
(37, 40, 4, 4, '2024-01-31', '2024-01-25'),
(38, 50, 4, 4, '2024-01-31', '2024-01-25'),
(39, 62, 4, 4, '2024-01-31', '2024-01-25'),
(40, 76, 4, 4, '2024-01-31', '2024-01-25'),
(41, 85, 4, 4, '2024-01-31', '2024-01-25'),
(42, 95, 4, 4, '2024-01-31', '2024-01-25'),
(43, 107, 4, 4, '2024-01-31', '2024-01-25'),
(44, 113, 4, 4, '2024-01-31', '2024-01-25'),
(45, 126, 4, 4, '2024-01-31', '2024-01-25'),
(46, 137, 4, 4, '2024-01-31', '2024-01-25'),
(47, 148, 4, 4, '2024-01-31', '2024-01-25'),
(48, 4, 1, 3, '2024-01-01', '2024-01-01'),
(49, 101, 1, 3, '2024-02-01', '2024-02-01'),
(50, 56, 2, 4, '2024-02-02', '2024-02-02'),
(51, 122, 3, 8, '2024-02-03', '2024-02-03'),
(52, 37, 4, 7, '2024-02-04', '2024-02-04'),
(53, 65, 1, 3, '2024-02-05', '2024-02-05'),
(54, 84, 2, 4, '2024-02-06', '2024-02-06'),
(55, 43, 3, 8, '2024-02-07', '2024-02-07'),
(56, 78, 4, 7, '2024-02-08', '2024-02-08'),
(57, 22, 4, 4, '2024-02-01', '2024-02-01'),
(58, 91, 2, 4, '2024-02-10', '2024-02-10'),
(59, 104, 3, 8, '2024-02-11', '2024-02-11'),
(60, 5, 1, 3, '2024-01-01', '2024-01-01'),
(61, 72, 1, 3, '2024-02-13', '2024-02-13'),
(62, 96, 2, 4, '2024-02-14', '2024-02-14'),
(63, 119, 3, 8, '2024-02-15', '2024-02-15'),
(64, 54, 4, 7, '2024-02-16', '2024-02-16'),
(65, 31, 1, 3, '2024-02-17', '2024-02-17'),
(66, 64, 2, 4, '2024-02-18', '2024-02-18'),
(67, 108, 3, 8, '2024-02-19', '2024-02-19'),
(68, 77, 4, 7, '2024-02-20', '2024-02-20'),
(69, 125, 1, 3, '2024-02-21', '2024-02-21'),
(70, 38, 2, 4, '2024-02-22', '2024-02-22'),
(71, 60, 3, 8, '2024-02-23', '2024-02-23'),
(72, 47, 4, 7, '2024-02-24', '2024-02-24'),
(73, 93, 1, 3, '2024-02-25', '2024-02-25'),
(74, 59, 2, 4, '2024-02-26', '2024-02-26'),
(75, 116, 3, 8, '2024-02-27', '2024-02-27'),
(76, 89, 4, 7, '2024-02-28', '2024-02-28'),
(77, 21, 1, 3, '2024-02-01', '2024-02-28'),
(78, 35, 2, 4, '2024-02-01', '2024-02-28'),
(79, 56, 3, 8, '2024-03-03', '2024-03-03'),
(80, 67, 4, 7, '2024-03-04', '2024-03-04'),
(81, 82, 1, 3, '2024-03-05', '2024-03-05'),
(82, 95, 2, 4, '2024-03-06', '2024-03-06'),
(83, 12, 3, 8, '2024-03-07', '2024-03-07'),
(84, 23, 4, 7, '2024-03-08', '2024-03-08'),
(85, 45, 1, 3, '2024-03-09', '2024-03-09'),
(86, 54, 2, 4, '2024-03-10', '2024-03-10'),
(87, 62, 3, 8, '2024-03-11', '2024-03-11'),
(88, 73, 4, 7, '2024-03-12', '2024-03-12'),
(89, 85, 1, 3, '2024-03-13', '2024-03-13'),
(90, 93, 2, 4, '2024-03-14', '2024-03-14'),
(91, 107, 3, 8, '2024-03-15', '2024-03-15'),
(92, 118, 4, 7, '2024-03-16', '2024-03-16'),
(93, 134, 1, 3, '2024-03-17', '2024-03-17'),
(94, 143, 2, 4, '2024-03-18', '2024-03-18'),
(95, 8, 3, 8, '2024-03-19', '2024-03-19'),
(96, 27, 4, 7, '2024-03-20', '2024-03-20'),
(97, 39, 1, 3, '2024-03-21', '2024-03-21'),
(98, 55, 2, 4, '2024-03-22', '2024-03-22'),
(99, 68, 3, 8, '2024-03-23', '2024-03-23'),
(100, 79, 4, 7, '2024-03-24', '2024-03-24'),
(101, 89, 1, 3, '2024-03-25', '2024-03-25'),
(102, 101, 2, 4, '2024-03-26', '2024-03-26'),
(103, 116, 3, 8, '2024-03-27', '2024-03-27'),
(104, 124, 4, 7, '2024-03-28', '2024-03-28'),
(105, 135, 1, 3, '2024-03-29', '2024-03-29'),
(106, 148, 2, 4, '2024-03-30', '2024-03-30'),
(107, 11, 3, 8, '2024-03-31', '2024-03-31'),
(108, 25, 4, 7, '2024-03-01', '2024-03-01'),
(109, 34, 1, 3, '2024-03-02', '2024-03-02'),
(110, 46, 2, 4, '2024-03-03', '2024-03-03'),
(111, 58, 3, 8, '2024-03-04', '2024-03-04'),
(112, 70, 4, 7, '2024-03-05', '2024-03-05'),
(113, 81, 1, 3, '2024-03-06', '2024-03-06'),
(114, 94, 2, 4, '2024-03-07', '2024-03-07'),
(115, 105, 3, 8, '2024-03-08', '2024-03-08'),
(116, 117, 4, 7, '2024-03-09', '2024-03-09'),
(117, 128, 1, 3, '2024-03-10', '2024-03-10'),
(118, 136, 2, 4, '2024-03-11', '2024-03-11'),
(119, 144, 3, 8, '2024-03-12', '2024-03-12'),
(120, 150, 4, 7, '2024-03-13', '2024-03-13'),
(121, 7, 1, 3, '2024-03-14', '2024-03-14'),
(122, 17, 2, 4, '2024-03-15', '2024-03-15'),
(123, 26, 3, 8, '2024-03-16', '2024-03-16'),
(124, 38, 4, 7, '2024-03-17', '2024-03-17'),
(125, 52, 1, 3, '2024-03-18', '2024-03-18'),
(126, 66, 2, 4, '2024-03-19', '2024-03-19'),
(127, 75, 3, 8, '2024-03-20', '2024-03-20'),
(128, 90, 4, 7, '2024-03-21', '2024-03-21'),
(129, 50, 2, 4, '2024-04-01', '2024-04-01'),
(130, 60, 3, 8, '2024-04-02', '2024-04-02'),
(131, 70, 1, 3, '2024-04-03', '2024-04-03'),
(132, 80, 4, 7, '2024-04-04', '2024-04-04'),
(133, 90, 2, 4, '2024-04-05', '2024-04-05'),
(134, 100, 3, 8, '2024-04-06', '2024-04-06'),
(135, 110, 1, 3, '2024-04-07', '2024-04-07'),
(136, 120, 4, 7, '2024-04-08', '2024-04-08'),
(137, 130, 2, 4, '2024-04-09', '2024-04-09'),
(138, 140, 3, 8, '2024-04-10', '2024-04-10'),
(139, 150, 1, 3, '2024-04-11', '2024-04-11'),
(140, 10, 4, 7, '2024-04-12', '2024-04-12'),
(141, 20, 2, 4, '2024-04-13', '2024-04-13'),
(142, 30, 3, 8, '2024-04-14', '2024-04-14'),
(143, 40, 1, 3, '2024-04-15', '2024-04-15');

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
(10, 'Playa', 'paseo en lancha', 'verano'),
(11, 'Playa', 'visita a acuarios', 'primavera');

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
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT de la tabla `tbldestino`
--
ALTER TABLE `tbldestino`
  MODIFY `id_destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tblreservas`
--
ALTER TABLE `tblreservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

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

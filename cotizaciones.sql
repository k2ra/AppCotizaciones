-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2017 a las 22:44:03
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cotizaciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecotizacion`
--

CREATE TABLE IF NOT EXISTS `detallecotizacion` (
  `cotizacion` varchar(15) NOT NULL,
  `cliente` varchar(50) NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `impuesto` varchar(15) NOT NULL,
  `total` varchar(15) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `producto` varchar(200) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallecotizacion`
--

INSERT INTO `detallecotizacion` (`cotizacion`, `cliente`, `empresa`, `telefono`, `correo`, `impuesto`, `total`, `cantidad`, `producto`, `precio`) VALUES
('COT_0010', 'melvin rojas', 'pepelera', '64656996', 'melvi@a.com', '13.23', '202.23', 1, 'pintura para camion', 145),
('COT_0010', 'melvin rojas', 'pepelera', '64656996', 'melvi@a.com', '13.23', '202.23', 1, 'banner 3*3', 35),
('COT_0010', 'melvin rojas', 'pepelera', '64656996', 'melvi@a.com', '13.23', '202.23', 1, 'placas decorativas ', 9),
('COT_0012', 'kevin rojas', 'afius tech', '69250983', 'kevin_rojas30@hotmail.com', '14.35', '219.35', 1, 'pintura para camion', 145),
('COT_0012', 'kevin rojas', 'afius tech', '69250983', 'kevin_rojas30@hotmail.com', '14.35', '219.35', 1, 'pintura para cuarto', 25),
('COT_0012', 'kevin rojas', 'afius tech', '69250983', 'kevin_rojas30@hotmail.com', '14.35', '219.35', 1, 'banner 3*3', 35),
('COT_0013', 'kevin rojas', 'afius tech', '69250983', '', '3.08', '47.08', 1, 'banner 3*3', 35),
('COT_0013', 'kevin rojas', 'afius tech', '69250983', '', '3.08', '47.08', 1, 'placas decorativas ', 9),
('COT_0014', 's', 's', 's', '', '10.15', '155.15', 1, 'pintura para camion', 145),
('COT_0015', 's', 's', 's', '', '10.15', '155.15', 1, 'pintura para camion', 145),
('COT_0016', 'kevin rojas', 'afius tech', '69250983', 'kevin_rojas30@hotmail.com', '13.23', '202.23', 1, 'banner 3*3', 35),
('COT_0016', 'kevin rojas', 'afius tech', '69250983', 'kevin_rojas30@hotmail.com', '13.23', '202.23', 1, 'placas decorativas ', 9),
('COT_0016', 'kevin rojas', 'afius tech', '69250983', 'kevin_rojas30@hotmail.com', '13.23', '202.23', 1, 'pintura para camion', 145);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clients`
--

CREATE TABLE IF NOT EXISTS `tbl_clients` (
  `clie_id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `clie_nombre` varchar(50) NOT NULL,
  `clie_nombre_comercial` varchar(50) NOT NULL,
  `clie_cedula` varchar(20) NOT NULL,
  `clie_correo` varchar(100) NOT NULL,
  `clie_direccion` varchar(200) NOT NULL,
  `clie_telefono` varchar(15) NOT NULL,
  PRIMARY KEY (`clie_id`),
  UNIQUE KEY `clie_telefono` (`clie_telefono`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `tbl_clients`
--

INSERT INTO `tbl_clients` (`clie_id`, `clie_nombre`, `clie_nombre_comercial`, `clie_cedula`, `clie_correo`, `clie_direccion`, `clie_telefono`) VALUES
(00005, 'kevin rojas', 'afius tech', '88162061', 'kevin_rojas30@hotmail.com', 'tocumen', '69250983'),
(00006, 'fermin rojas', 'generico', '86242064', 'ferrojas@hotmail.com', 'mano de piedra', '2751803'),
(00007, 'elsa arroyo', 'others', '3316366', '', 'san miguelito', ''),
(00010, 'simona herrera', 'casa', '3-369-78', '', 'roberto duran', '2751234'),
(00012, 'melvin rojas', 'pepelera', '8-816-2062', '', 'villas de altamira', '64656996'),
(00013, 'jostin rojas', 'casa', '8-820-5696', '', 'buena vista', '65686741');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cotizaciones`
--

CREATE TABLE IF NOT EXISTS `tbl_cotizaciones` (
  `id_cotizacion` varchar(10) NOT NULL,
  `cliente` varchar(50) NOT NULL,
  `fecha_cotizacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `monto` varchar(10) NOT NULL,
  PRIMARY KEY (`id_cotizacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_cotizaciones`
--

INSERT INTO `tbl_cotizaciones` (`id_cotizacion`, `cliente`, `fecha_cotizacion`, `monto`) VALUES
('COT_0010', 'melvin roj', '2017-05-09 00:00:00', '202.23'),
('COT_0012', 'kevin roja', '2017-05-09 00:00:00', '219.35'),
('COT_0013', 'kevin rojas', '2017-05-09 00:00:00', '47.08'),
('COT_0014', 's', '2017-05-13 00:00:00', '155.15'),
('COT_0015', 's', '2017-05-13 00:00:00', '155.15'),
('COT_0016', 'kevin rojas', '2017-05-13 00:00:00', '202.23');

--
-- Disparadores `tbl_cotizaciones`
--
DROP TRIGGER IF EXISTS `cotizaciones_ad_trigger`;
DELIMITER //
CREATE TRIGGER `cotizaciones_ad_trigger` AFTER DELETE ON `tbl_cotizaciones`
 FOR EACH ROW BEGIN
delete from detallecotizacion 
where cotizacion = old.id_cotizacion
;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empresas`
--

CREATE TABLE IF NOT EXISTS `tbl_empresas` (
  `id_empresa` varchar(10) NOT NULL,
  `nombre_empresa` varchar(20) NOT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='registro de  empresas';

--
-- Volcado de datos para la tabla `tbl_empresas`
--

INSERT INTO `tbl_empresas` (`id_empresa`, `nombre_empresa`) VALUES
('emp0001', 'Tesla motors'),
('emp0002', 'Solar city'),
('emp0003', 'FullAI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos`
--

CREATE TABLE IF NOT EXISTS `tbl_productos` (
  `id_products` int(6) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) NOT NULL,
  `precio` decimal(8,0) NOT NULL,
  `prod_fecha` date NOT NULL,
  PRIMARY KEY (`id_products`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `tbl_productos`
--

INSERT INTO `tbl_productos` (`id_products`, `descripcion`, `precio`, `prod_fecha`) VALUES
(13, 'placas decorativas ', '9', '2016-10-22'),
(14, 'banner 3*3', '35', '2016-10-22'),
(15, 'pintura para cuarto', '25', '2016-10-22'),
(16, 'pintura para camion', '145', '2016-10-22'),
(17, 'ensalada de mango', '1', '2017-05-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) NOT NULL,
  `correo_electronico` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `mostrar` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id_usuario`, `id_rol`, `correo_electronico`, `clave`, `nombre`, `apellido`, `estado`, `mostrar`) VALUES
(2, 2, 'admin@hotmail.com', 'admin', 'kevin', 'Rojas', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

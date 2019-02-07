-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-02-2019 a las 22:14:13
-- Versión del servidor: 5.7.21
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cotizaciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecotizacion`
--

DROP TABLE IF EXISTS `detallecotizacion`;
CREATE TABLE IF NOT EXISTS `detallecotizacion` (
  `cotizacion` varchar(15) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `producto` varchar(200) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallecotizacion`
--

INSERT INTO `detallecotizacion` (`cotizacion`, `cantidad`, `producto`, `precio`) VALUES
('COT_000001', 2, 'banner 3*3', '70.00'),
('COT_000002', 1, 'pintura para camion', '145.00'),
('COT_000002', 1, 'placas decorativas ', '9.00'),
('COT_000003', 1, 'pintura para camion', '145.00'),
('COT_000004', 1, 'pintura para camion', '145.00'),
('COT_000005', 1, 'ensalada de mango', '5.00'),
('COT_000005', 1, 'banner 3*3', '35.00'),
('COT_000005', 2, 'placas decorativas ', '18.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

DROP TABLE IF EXISTS `detallefactura`;
CREATE TABLE IF NOT EXISTS `detallefactura` (
  `fk_factura` varchar(20) NOT NULL,
  `fk_producto` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(8,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallefactura`
--

INSERT INTO `detallefactura` (`fk_factura`, `fk_producto`, `descripcion`, `cantidad`, `precio`) VALUES
('FAC_000001', 1, 'banner 3*3', 1, '35.00'),
('FAC_000001', 2, 'pintura para camion', 1, '145.00'),
('FAC_000001', 3, 'ensalada de mango', 1, '5.00'),
('FAC_000002', 1, 'placas decorativas ', 1, '9.00'),
('FAC_000002', 2, 'pintura para cuarto', 1, '25.00'),
('FAC_000003', 1, 'placas decorativas ', 1, '9.00'),
('FAC_000003', 2, 'pintura para cuarto', 1, '25.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clients`
--

DROP TABLE IF EXISTS `tbl_clients`;
CREATE TABLE IF NOT EXISTS `tbl_clients` (
  `clie_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `clie_nombre` varchar(50) NOT NULL,
  `clie_nombre_comercial` varchar(50) NOT NULL,
  `clie_cedula` varchar(20) NOT NULL,
  `clie_correo` varchar(100) NOT NULL,
  `clie_direccion` varchar(200) NOT NULL,
  `clie_telefono` varchar(15) NOT NULL,
  PRIMARY KEY (`clie_id`),
  UNIQUE KEY `clie_telefono` (`clie_telefono`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_clients`
--

INSERT INTO `tbl_clients` (`clie_id`, `clie_nombre`, `clie_nombre_comercial`, `clie_cedula`, `clie_correo`, `clie_direccion`, `clie_telefono`) VALUES
(00005, 'kevin rojas', 'afius tech', '88162061', 'kevin_rojas30@hotmail.com', 'tocumen', '69250983'),
(00006, 'fermin rojas', 'generico', '86242064', 'ferrojas@hotmail.com', 'mano de piedra', '2751803'),
(00007, 'elsa arroyo', 'others', '3316366', '', 'san miguelito', ''),
(00010, 'simona herrera', 'casa', '3-369-78', '', 'roberto duran', '2751234'),
(00012, 'melvin rojas', 'pepelera', '8-816-2062', '', 'villas de altamira', '64656996'),
(00013, 'jostin rojas', 'casa', '8-820-5696', '', 'buena vista', '65686741'),
(00014, 'juan', 'lourdes ikebana', '8-234-5678', 'juanikebana@gmail.com', 'tumba muerto', '234-6678');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cotizaciones`
--

DROP TABLE IF EXISTS `tbl_cotizaciones`;
CREATE TABLE IF NOT EXISTS `tbl_cotizaciones` (
  `id_cotizacion` varchar(10) NOT NULL,
  `cliente` varchar(50) NOT NULL,
  `empresa` varchar(200) DEFAULT NULL,
  `telefono` varchar(50) NOT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `fecha_cotizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `subtotal` varchar(20) NOT NULL,
  `impuesto` varchar(20) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_cotizacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_cotizaciones`
--

INSERT INTO `tbl_cotizaciones` (`id_cotizacion`, `cliente`, `empresa`, `telefono`, `correo`, `fecha_cotizacion`, `subtotal`, `impuesto`, `monto`) VALUES
('COT_000001', 'kevin rojas', 'afius tech', '69250983', 'kevin_rojas30@hotmail.com', '2019-01-06 17:13:07', '70.00', '4.90', '70.00'),
('COT_000002', 'melvin rojas', 'pepelera', '64656996', '', '2019-02-06 17:19:04', '154.00', '10.78', '164.78'),
('COT_000003', 'kevin rojas', 'afius tech', '69250983', 'kevin_rojas30@hotmail.com', '2019-02-06 17:21:29', '145.00', '10.15', '145.00'),
('COT_000004', 'melvin rojas', 'pepelera', '64656996', '', '2019-02-06 17:26:44', '145.00', '10.15', '145.00'),
('COT_000005', 'melvin rojas', 'pepelera', '64656996', '', '2019-02-07 21:29:00', '58.00', '4.06', '62.06');

--
-- Disparadores `tbl_cotizaciones`
--
DROP TRIGGER IF EXISTS `cotizaciones_ad_trigger`;
DELIMITER $$
CREATE TRIGGER `cotizaciones_ad_trigger` AFTER DELETE ON `tbl_cotizaciones` FOR EACH ROW BEGIN
delete from detallecotizacion 
where cotizacion = old.id_cotizacion
;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empresas`
--

DROP TABLE IF EXISTS `tbl_empresas`;
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
-- Estructura de tabla para la tabla `tbl_factura`
--

DROP TABLE IF EXISTS `tbl_factura`;
CREATE TABLE IF NOT EXISTS `tbl_factura` (
  `id_factura` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fk_cotizacion` varchar(50) DEFAULT NULL,
  `cliente` varchar(200) NOT NULL,
  `empresa` varchar(200) DEFAULT NULL,
  `telefono` varchar(50) NOT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `subtotal` varchar(10) NOT NULL,
  `impuesto` varchar(10) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_factura`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_factura`
--

INSERT INTO `tbl_factura` (`id_factura`, `fecha`, `fk_cotizacion`, `cliente`, `empresa`, `telefono`, `correo`, `subtotal`, `impuesto`, `monto`) VALUES
('FAC_000001', '2019-01-24 05:32:26', 'COT_0001', 'melvin rojas', 'pepelera', '64656996', '', '185.00', '12.95', '197.95'),
('FAC_000002', '2019-01-24 05:35:17', 'COT_0003', 'kevin rojas', 'afius tech', '69250983', 'kevin_rojas30@hotmail.com', '34.00', '2.38', '36.38'),
('FAC_000003', '2019-01-24 05:38:41', 'COT_0003', 'kevin rojas', 'afius tech', '69250983', 'kevin_rojas30@hotmail.com', '34.00', '2.38', '36.38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos`
--

DROP TABLE IF EXISTS `tbl_productos`;
CREATE TABLE IF NOT EXISTS `tbl_productos` (
  `id_products` int(6) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `prod_fecha` date NOT NULL,
  PRIMARY KEY (`id_products`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_productos`
--

INSERT INTO `tbl_productos` (`id_products`, `descripcion`, `precio`, `prod_fecha`) VALUES
(13, 'placas decorativas ', '9.00', '2016-10-22'),
(14, 'banner 3*3', '35.00', '2016-10-22'),
(15, 'pintura para cuarto', '25.00', '2016-10-22'),
(16, 'pintura para camion', '145.00', '2016-10-22'),
(17, 'ensalada de mango', '5.00', '2019-01-07'),
(19, 'articulos varios', '13.00', '2019-02-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id_usuario`, `id_rol`, `correo_electronico`, `clave`, `nombre`, `apellido`, `estado`, `mostrar`) VALUES
(2, 2, 'admin@hotmail.com', 'admin', 'kevin', 'Rojas', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

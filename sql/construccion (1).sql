-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2016 a las 14:49:35
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `construccion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `construcciones`
--

CREATE TABLE IF NOT EXISTS `construcciones` (
  `cod_edificio` varchar(10) NOT NULL,
  `nombre_construccion` varchar(30) DEFAULT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `construcciones`
--

INSERT INTO `construcciones` (`cod_edificio`, `nombre_construccion`, `direccion`, `fecha_inicio`, `fecha_entrega`) VALUES
('Edf_001', 'Proyecto MegaMercado', 'Av. Teodoro y Bolï¿½var esquin', '2016-02-24', '2017-12-22'),
('Edf_002', 'Gran Plaza Ecuador', 'Atuntaqui', '2016-02-23', '2016-02-24'),
('Edf_003', 'Condominios lel', 'Ibarra', '2016-02-24', '2018-10-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE IF NOT EXISTS `contrato` (
  `inicio_Contrato` date DEFAULT NULL,
  `fin_contrato` date DEFAULT NULL,
  `oficio` varchar(30) DEFAULT NULL,
  `codigo_contrato` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`inicio_Contrato`, `fin_contrato`, `oficio`, `codigo_contrato`) VALUES
('2016-02-04', '2016-06-09', 'albanil', 'contra_001'),
('2016-02-15', '2016-04-13', 'electrisita', 'contra_002'),
('2016-02-24', '2016-02-24', 'arquitecto', 'contra_003'),
('2016-02-23', '2016-02-23', 'albanil', 'contra_004'),
('2016-02-23', '2016-02-23', 'albanil', 'contra_005'),
('2016-02-23', '2016-02-23', 'albanil', 'contra_006'),
('2016-02-23', '2016-02-23', 'albanil', 'contra_007'),
('2016-02-23', '2016-02-23', 'albanil', 'contra_008'),
('2016-02-23', '2016-02-23', 'albanil', 'contra_009'),
('2016-02-23', '2016-02-23', 'albanil', 'contra_010'),
('2016-02-23', '2017-07-07', 'arquitecto', 'contra_011'),
('2016-02-23', '2016-02-23', 'electrisita', 'contra_012'),
('2016-02-24', '2016-02-24', 'arquitecto', 'contra_015'),
('2016-02-24', '2016-02-24', 'electrisita', 'contra_016');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_obrero`
--

CREATE TABLE IF NOT EXISTS `datos_obrero` (
  `cod_obrero` varchar(10) NOT NULL,
  `nombre_obrero` varchar(30) DEFAULT NULL,
  `apellido_obrero` varchar(30) DEFAULT NULL,
  `direccion_obrero` varchar(50) DEFAULT NULL,
  `numero_hijos` int(11) DEFAULT NULL,
  `codigo_contrato` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos_obrero`
--

INSERT INTO `datos_obrero` (`cod_obrero`, `nombre_obrero`, `apellido_obrero`, `direccion_obrero`, `numero_hijos`, `codigo_contrato`) VALUES
('100', 'vgbhy', 'gthyju', 'gthyju', 0, 'contra_011'),
('1002972824', 'Mateo', 'Salcedo', 'Atuntaqui', 0, 'contra_003'),
('100304020', 'alex', 'Cazar', 'Ibarra', 6, 'contra_012'),
('213321', 'fnwmksa', 'fwneodksl', 'asfnsa', 9, NULL),
('ob_001', 'Juan', 'Vera', 'Otavalo', 1, 'contra_001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salarios`
--

CREATE TABLE IF NOT EXISTS `salarios` (
  `oficio` varchar(30) NOT NULL,
  `salario` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `salarios`
--

INSERT INTO `salarios` (`oficio`, `salario`) VALUES
('albanil', '450'),
('arquitecto', '800'),
('electrisita', '600'),
('pintor', '500'),
('plomero', '550');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo_obrero`
--

CREATE TABLE IF NOT EXISTS `trabajo_obrero` (
  `cod_obrero` varchar(10) DEFAULT NULL,
  `cod_edificio` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trabajo_obrero`
--

INSERT INTO `trabajo_obrero` (`cod_obrero`, `cod_edificio`) VALUES
('ob_001', 'Edf_001'),
('1002972824', NULL),
('1002972824', 'Edf_002'),
('ob_001', 'Edf_002'),
('213321', 'Edf_002');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `construcciones`
--
ALTER TABLE `construcciones`
 ADD PRIMARY KEY (`cod_edificio`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
 ADD PRIMARY KEY (`codigo_contrato`), ADD KEY `oficio` (`oficio`);

--
-- Indices de la tabla `datos_obrero`
--
ALTER TABLE `datos_obrero`
 ADD PRIMARY KEY (`cod_obrero`), ADD KEY `codigo_contrato` (`codigo_contrato`);

--
-- Indices de la tabla `salarios`
--
ALTER TABLE `salarios`
 ADD PRIMARY KEY (`oficio`);

--
-- Indices de la tabla `trabajo_obrero`
--
ALTER TABLE `trabajo_obrero`
 ADD KEY `cod_edificio` (`cod_edificio`), ADD KEY `cod_obrero` (`cod_obrero`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
ADD CONSTRAINT `contrato_ibfk_1` FOREIGN KEY (`oficio`) REFERENCES `salarios` (`oficio`);

--
-- Filtros para la tabla `datos_obrero`
--
ALTER TABLE `datos_obrero`
ADD CONSTRAINT `codigo_contrato` FOREIGN KEY (`codigo_contrato`) REFERENCES `contrato` (`codigo_contrato`);

--
-- Filtros para la tabla `trabajo_obrero`
--
ALTER TABLE `trabajo_obrero`
ADD CONSTRAINT `cod_obrero` FOREIGN KEY (`cod_obrero`) REFERENCES `datos_obrero` (`cod_obrero`),
ADD CONSTRAINT `trabajo_obrero_ibfk_1` FOREIGN KEY (`cod_edificio`) REFERENCES `construcciones` (`cod_edificio`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

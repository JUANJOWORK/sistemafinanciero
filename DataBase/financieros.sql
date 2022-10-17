-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-10-2022 a las 19:27:37
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `financieros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonos`
--

DROP TABLE IF EXISTS `abonos`;
CREATE TABLE IF NOT EXISTS `abonos` (
  `id_abono` int(11) NOT NULL AUTO_INCREMENT,
  `id_pago` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  PRIMARY KEY (`id_abono`),
  KEY `id_pago` (`id_pago`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `abonos`
--

INSERT INTO `abonos` (`id_abono`, `id_pago`, `cantidad`, `fecha_modificacion`) VALUES
(1, 1, 400, '2022-10-17 13:00:25'),
(2, 2, 500, '2022-10-17 14:01:28');

--
-- Disparadores `abonos`
--
DROP TRIGGER IF EXISTS `cantidad_pagar_insertar`;
DELIMITER $$
CREATE TRIGGER `cantidad_pagar_insertar` BEFORE INSERT ON `abonos` FOR EACH ROW UPDATE pagos SET
cantidad_abonado=cantidad_abonado+NEW.cantidad WHERE
id_pago=NEW.id_pago
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `eliminar_abono`;
DELIMITER $$
CREATE TRIGGER `eliminar_abono` BEFORE DELETE ON `abonos` FOR EACH ROW UPDATE pagos SET cantidad_abonado=cantidad_abonado-OLD.cantidad WHERE
id_pago=OLD.id_pago
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(20) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  PRIMARY KEY (`id_alumno`),
  UNIQUE KEY `matricula_3` (`matricula`),
  KEY `matricula` (`matricula`),
  KEY `matricula_2` (`matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `matricula`, `nombre`, `apellidos`, `fecha_modificacion`) VALUES
(1, '11111111', 'JUAN JOSÉ', 'GONZALEZ CARDENAS', '2022-10-17 14:08:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos`
--

DROP TABLE IF EXISTS `conceptos`;
CREATE TABLE IF NOT EXISTS `conceptos` (
  `id_concepto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `costo` double NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  PRIMARY KEY (`id_concepto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `conceptos`
--

INSERT INTO `conceptos` (`id_concepto`, `nombre`, `costo`, `fecha_modificacion`) VALUES
(1, 'Inscripción', 500, '2022-10-17 12:59:53'),
(2, 'Inglés', 1000, '2022-10-17 13:01:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

DROP TABLE IF EXISTS `pagos`;
CREATE TABLE IF NOT EXISTS `pagos` (
  `id_pago` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) NOT NULL,
  `id_concepto` int(11) NOT NULL,
  `cantidad_pagar` double NOT NULL,
  `cantidad_abonado` double NOT NULL DEFAULT '0',
  `fecha_modificacion` datetime NOT NULL,
  PRIMARY KEY (`id_pago`),
  KEY `id_alumno` (`id_alumno`),
  KEY `id_concepto` (`id_concepto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `id_alumno`, `id_concepto`, `cantidad_pagar`, `cantidad_abonado`, `fecha_modificacion`) VALUES
(1, 1, 1, 500, 400, '2022-10-17 13:00:11'),
(2, 1, 2, 1000, 500, '2022-10-17 14:00:31');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abonos`
--
ALTER TABLE `abonos`
  ADD CONSTRAINT `abonos_ibfk_1` FOREIGN KEY (`id_pago`) REFERENCES `pagos` (`id_pago`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`id_concepto`) REFERENCES `conceptos` (`id_concepto`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

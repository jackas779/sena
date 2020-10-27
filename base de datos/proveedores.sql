-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-10-2020 a las 02:22:32
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `strong_inventory`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `id_proveedor` int(5) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` date NOT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(55) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_creacion` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_modificacion` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_estado` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `fecha_creacion`, `fecha_modificacion`, `nombre`, `direccion`, `telefono`, `email`, `usuario_creacion`, `usuario_modificacion`, `fk_id_estado`) VALUES
(1, '2020-10-26', '2020-10-26', 'telmex', 'calle sin precion ', '12345678', 'asd@gmail.com', 'ardila', 'ardila', '1'),
(3, '2020-10-26', NULL, 'casterfiel', 'calle sin perdon', '1234', 'asja@hsa', 'ardila', '', '1'),
(4, '2020-10-26', NULL, 'asdt', 'calle', '123', 'asd@as', 'ardila', '', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

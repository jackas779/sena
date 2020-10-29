-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-10-2020 a las 21:02:22
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
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_product` int(5) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `codigo_barra` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `existencia` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `fecha_creacion` date NOT NULL,
  `usuario_creacion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_modificacion` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fk_id_estado` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_categoria` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_proveedor` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_marca` varchar(4) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

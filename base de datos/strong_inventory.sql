-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-10-2020 a las 01:57:22
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
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categorias` int(5) NOT NULL AUTO_INCREMENT,
  `codigo_categoria` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `usuario_modificacion` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_creacion` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_estado` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_categorias`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categorias`, `codigo_categoria`, `fecha_creacion`, `fecha_modificacion`, `usuario_modificacion`, `descripcion`, `usuario_creacion`, `fk_id_estado`) VALUES
(1, '000123', '2020-10-22', '2020-10-24', 'ardila', 'Pantallas', 'jaxk', '1'),
(2, '0001234', '2020-10-06', '2020-10-23', 'ardila', 'teclado', 'jaxk', '1'),
(8, '000124', '2020-10-22', '2020-10-16', '', 'mouse', 'ardila', '1'),
(9, '000234', '2020-10-22', '2020-10-23', 'ardila', 'Mesas', 'ardila', '2'),
(10, '00124', '2020-10-22', '2020-10-23', 'ardila', 'Portatiles', 'ardila', '2'),
(11, '000123456', '2020-10-23', NULL, '', 'prueba', 'ardila', '1'),
(12, '1234567', '2020-10-23', '2020-10-24', 'ardila', 'prueba2', 'ardila', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id_estado` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `nombre`) VALUES
(1, 'activo'),
(2, 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `id_grupos` int(5) NOT NULL AUTO_INCREMENT,
  `nombre_grupos` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_grupos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos_det`
--

CREATE TABLE IF NOT EXISTS `ingresos_det` (
  `id_ing_det` int(5) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` date NOT NULL,
  `usuario_modificacion` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_creacion` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_estado` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_ing_enc` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_producto` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_ing_det`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos_enc`
--

CREATE TABLE IF NOT EXISTS `ingresos_enc` (
  `id_ing_enc` int(5) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` date NOT NULL,
  `fecha_modificacion` date NOT NULL,
  `cantidad` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_creacion` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `observacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `no_factura` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha-factura` date NOT NULL,
  `usuario_modificacion` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_proveedor` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_ing_enc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE IF NOT EXISTS `marcas` (
  `id_marca` int(5) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` date NOT NULL,
  `fecha_modificacion` date NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_creacion` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_modificacion` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `id_permiso` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `nombre`) VALUES
(1, 'admin'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `id_proveedor` int(5) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` date NOT NULL,
  `fecha_modificacion` date NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(55) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_creacion` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_modificacion` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_estado` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(5) NOT NULL AUTO_INCREMENT,
  `password` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_estado` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_permisos` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `password`, `username`, `nombres`, `apellidos`, `email`, `fk_id_estado`, `fk_id_permisos`) VALUES
(1, '123', 'jaxk', 'nicolas', 'ardi', 'jack@gmail.com', '1', '2'),
(2, '123', 'ardila', 'jack', 'nicolas', 'jaxk@gmail.com', '1', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

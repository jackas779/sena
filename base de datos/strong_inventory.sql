-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-10-2020 a las 15:26:20
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
  `cat_descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_creacion` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_estado` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_categorias`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categorias`, `codigo_categoria`, `fecha_creacion`, `fecha_modificacion`, `usuario_modificacion`, `cat_descripcion`, `usuario_creacion`, `fk_id_estado`) VALUES
(1, '000123', '2020-10-22', '2020-10-24', 'ardila', 'Pantallas', 'jaxk', '1'),
(2, '0001234', '2020-10-06', '2020-10-23', 'ardila', 'teclado', 'jaxk', '1'),
(8, '000124', '2020-10-22', '2020-10-16', '', 'mouse', 'ardila', '1'),
(9, '000234', '2020-10-22', '2020-10-23', 'ardila', 'Mesas', 'ardila', '2'),
(10, '00124', '2020-10-22', '2020-10-23', 'ardila', 'Portatiles', 'ardila', '2'),
(11, '000123456', '2020-10-23', '2020-10-25', 'ardila', 'prueba', 'ardila', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id_estado` int(5) NOT NULL AUTO_INCREMENT,
  `nombre_estado` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `nombre_estado`) VALUES
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id_grupos`, `nombre_grupos`) VALUES
(1, 'admin'),
(2, 'usuario');

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
  `fecha_modificacion` date DEFAULT NULL,
  `nombre_marca` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_creacion` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_modificacion` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_estado` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `fecha_creacion`, `fecha_modificacion`, `nombre_marca`, `usuario_creacion`, `usuario_modificacion`, `fk_id_estado`) VALUES
(1, '2020-10-26', '2020-10-29', 'samsung', 'peliazul', 'ardila', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `id_permiso` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_grupos` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `nombre`, `fk_id_grupos`) VALUES
(1, 'admin', ''),
(2, 'usuario', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_product`, `codigo`, `codigo_barra`, `nombre`, `descripcion`, `existencia`, `fecha_modificacion`, `fecha_creacion`, `usuario_creacion`, `usuario_modificacion`, `fk_id_estado`, `fk_id_categoria`, `fk_id_proveedor`, `fk_id_marca`) VALUES
(1, '001243', NULL, 'monitor', 'buen estado', '1', NULL, '2020-10-09', 'Ardila', NULL, '1', '2', '3', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `id_proveedor` int(5) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` date NOT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `nombre_prov` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `email_prov` varchar(55) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_creacion` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_modificacion` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_estado` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `fecha_creacion`, `fecha_modificacion`, `nombre_prov`, `direccion`, `telefono`, `email_prov`, `usuario_creacion`, `usuario_modificacion`, `fk_id_estado`) VALUES
(1, '2020-10-26', '2020-10-26', 'telmex', 'calle sin precion ', '12345678', 'asd@gmail.com', 'ardila', 'ardila', '1'),
(3, '2020-10-26', '2020-10-29', 'casterfielt', 'calle sin perdo', '12345', 'asja@hsa.', 'ardila', 'ardila', '1');

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

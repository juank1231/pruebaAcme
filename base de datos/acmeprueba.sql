-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2022 a las 08:04:23
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `acmeprueba`
--
CREATE DATABASE IF NOT EXISTS `acmeprueba` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `acmeprueba`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductores`
--

CREATE TABLE `conductores` (
  `idserial` int(11) NOT NULL,
  `documento` int(11) NOT NULL,
  `primer_nombre` varchar(50) NOT NULL,
  `segundo_nombre` varchar(50) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `direccion` varchar(120) NOT NULL,
  `telefono` int(11) NOT NULL,
  `ciudad` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conductores`
--

INSERT INTO `conductores` (`idserial`, `documento`, `primer_nombre`, `segundo_nombre`, `apellidos`, `direccion`, `telefono`, `ciudad`) VALUES
(5, 64646, 'sdaasdds', 'fdfads', 'dffddsd', 'DFDSDSDS', 654654654, 'DFDFDSF'),
(2, 84646, 'sasdds', 'dsdss', 'sdsdaads', 'sddsadsa', 64656, 'sassd'),
(4, 54645654, '65465464', 'dcsdasd', '54654654', '6546544', 654654, 'dadssdds'),
(6, 65465465, 'lina', 'linal', 'duran', 'juanand', 66465, 'bogota'),
(1, 654564456, 'adfdfas', 'dffdfd', 'sdfsdfdf', 'dfdfsfds', 5645456, 'dsdsasadsd'),
(3, 2147483647, 'dfdfddfsdf', 'adadssadds', 'saddsadsa', 'fsdfdfd', 645464, 'dfdffdfds');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietarios`
--

CREATE TABLE `propietarios` (
  `idserial` int(11) NOT NULL,
  `documento` int(11) NOT NULL,
  `primer_nombre` varchar(50) NOT NULL,
  `segundo_nombre` varchar(50) NOT NULL,
  `apellidos` varchar(120) NOT NULL,
  `direccion` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `ciudad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `propietarios`
--

INSERT INTO `propietarios` (`idserial`, `documento`, `primer_nombre`, `segundo_nombre`, `apellidos`, `direccion`, `telefono`, `ciudad`) VALUES
(8, 12345, 'saddasds', 'adfadssd', 'gfsfsfd', 0, 6546465, 'sadsdaads'),
(10, 6516165, 'juan', 'velas', 'hernadez', 0, 51546464, 'bogota'),
(6, 6564645, 'asdsadsad', 'sddssdaads', 'sddssdaads', 0, 646464, 'adasddsads'),
(9, 65465465, 'daasdad', 'fsdasdfadsds', 'fdfsafad', 0, 64654, 'sadadsads'),
(1, 645654651, 'adf', 'dfdsad', 'sdffsdfsd', 0, 564645, 'fdsfdfd'),
(4, 646465465, 'juannaaakn', 'adssdds', 'dssdaasd', 0, 646464, 'sadadsdas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vehiculo`
--

CREATE TABLE `tipo_vehiculo` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_vehiculo`
--

INSERT INTO `tipo_vehiculo` (`codigo`, `descripcion`, `estado`) VALUES
(1, 'Particular', 1),
(2, 'Publico', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(50) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `claveusuario` varchar(120) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `documento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email`, `usuario`, `claveusuario`, `nombre`, `documento`) VALUES
('juann.01040@gmial.com', 'juanvelasquez', 'Prueba123', 'Juan Velasquez', 1074135920);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `idserial` int(11) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `color` varchar(80) NOT NULL,
  `marca` varchar(60) NOT NULL,
  `tipo_vehiculo` int(11) NOT NULL,
  `conductor` int(11) NOT NULL,
  `propietario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`idserial`, `placa`, `color`, `marca`, `tipo_vehiculo`, `conductor`, `propietario`) VALUES
(4, 'FDDFFD', 'FSDFDSFDS', 'FDFDFD', 1, 64646, 65465465),
(5, 'skf832', 'blanco', 'toyota', 2, 65465465, 6516165),
(2, '[value-2]', '[value-3]', '[value-4]', 1, 84646, 645654651);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conductores`
--
ALTER TABLE `conductores`
  ADD PRIMARY KEY (`documento`),
  ADD UNIQUE KEY `idserial` (`idserial`);

--
-- Indices de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  ADD PRIMARY KEY (`documento`),
  ADD UNIQUE KEY `idserial` (`idserial`);

--
-- Indices de la tabla `tipo_vehiculo`
--
ALTER TABLE `tipo_vehiculo`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`documento`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`placa`),
  ADD UNIQUE KEY `idserial` (`idserial`),
  ADD KEY `conductor` (`conductor`,`propietario`),
  ADD KEY `tipo_vehiculo` (`tipo_vehiculo`),
  ADD KEY `propietario` (`propietario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conductores`
--
ALTER TABLE `conductores`
  MODIFY `idserial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  MODIFY `idserial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipo_vehiculo`
--
ALTER TABLE `tipo_vehiculo`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `idserial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`conductor`) REFERENCES `conductores` (`documento`),
  ADD CONSTRAINT `vehiculos_ibfk_2` FOREIGN KEY (`tipo_vehiculo`) REFERENCES `tipo_vehiculo` (`codigo`),
  ADD CONSTRAINT `vehiculos_ibfk_3` FOREIGN KEY (`propietario`) REFERENCES `propietarios` (`documento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
conductores
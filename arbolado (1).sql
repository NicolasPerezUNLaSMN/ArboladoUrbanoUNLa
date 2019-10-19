-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2019 a las 18:22:12
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `arbolado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arbol`
--

CREATE TABLE `arbol` (
  `idArbol` int(11) NOT NULL,
  `especie` varchar(45) NOT NULL,
  `numeroArbol` int(11) NOT NULL,
  `distanciaEntrePlantas` varchar(15) NOT NULL,
  `distanciaAlMuro` varchar(15) NOT NULL,
  `circunferenciaDelArbol` varchar(15) NOT NULL,
  `cazuela` varchar(45) NOT NULL,
  `comentario` varchar(45) DEFAULT NULL,
  `idCenso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `arbol`
--

INSERT INTO `arbol` (`idArbol`, `especie`, `numeroArbol`, `distanciaEntrePlantas`, `distanciaAlMuro`, `circunferenciaDelArbol`, `cazuela`, `comentario`, `idCenso`) VALUES
(5, 'Especie1', 1, '11.1', '22.2', '33.4', 'Cazuela2', 'Andara el abm?', 7),
(6, 'Especie1', 1, '11.1', '22.2', '33.4', 'Cazuela2', 'Andara el abm?', 8),
(21, 'pepepedp', 343, '2321.8', '343434', '2321', '2fef', 'rrrrrrr', 50),
(22, 'pepepedp', 343, '2321.8', '343434', '2321', '2fef', 'rrrrrrr', 51),
(23, 'pepepedp', 343, '2321.8', '343434', '2321', '2fef', 'rrrrrrr', 52),
(24, 'pepepedp', 343, '2321.8', '343434', '2321', '2fef', 'rrrrrrr', 53),
(25, 'pepepedp', 343, '2321.8', '343434', '2321', '2fef', 'rrrrrrr', 55),
(26, 'pepepedp', 343, '2321.8', '343434', '2321', '2fef', 'rrrrrrr', 54),
(27, 'Especie', 12, '32.0', '32.0', '123.0', 'SI', 'Hermosooo', 56),
(28, 'Especie', 121, '12.0', '23.0', '213.0', 'SI', 'dededed', 58),
(29, 'Especie', 25, '0.0', '0.0', '0.0', 'Cazuela', '', 57),
(30, 'Especie', 12, '32.0', '32.0', '123.0', 'SI', 'Hermosooo', 59),
(31, 'Especie', 121, '12.0', '23.0', '213.0', 'SI', 'dededed', 60),
(32, 'Especie', 12, '32.0', '32.0', '123.0', 'SI', 'Hermosooo', 61),
(33, 'Especie', 4, '0.0', '0.0', '0.0', 'Cazuela', '', 62),
(34, 'Especie', 4, '0.0', '0.0', '0.0', 'Cazuela', '', 63),
(35, 'Especie', 1, '0.0', '0.0', '0.0', 'Cazuela', '', 64);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calle`
--

CREATE TABLE `calle` (
  `idCalle` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `numeroFrente` int(11) NOT NULL,
  `anchoVereda` varchar(15) NOT NULL,
  `paridad` varchar(45) NOT NULL,
  `transito` varchar(45) NOT NULL,
  `idCenso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calle`
--

INSERT INTO `calle` (`idCalle`, `nombre`, `numeroFrente`, `anchoVereda`, `paridad`, `transito`, `idCenso`) VALUES
(5, 'Alta calle', 2222, '20.6', 'par', 'avenida', 7),
(6, 'Alta calle', 2222, '20.6', 'par', 'avenida', 8),
(26, 'pepepep', 343, '2321.8', '343434', '2321', 50),
(27, 'pepepep', 343, '2321.8', '343434', '2321', 51),
(28, 'nombre', 343, '2321.8', '343434', '2321', 52),
(29, 'nombre', 343, '2321.8', '343434', '2321', 53),
(30, 'nombre', 343, '2321.8', '343434', '2321', 55),
(31, 'nombre', 343, '2321.8', '343434', '2321', 54),
(32, 'Alfonso', 1231, '312.0', 'PAR', 'PARTICULAR', 56),
(33, 'frfrf', 111, '12121.0', 'PAR', 'PARTICULAR', 58),
(34, 'po', 13, '25.0', 'PAR', 'PARTICULAR', 57),
(35, 'Alfonso', 1231, '312.0', 'PAR', 'PARTICULAR', 59),
(36, 'frfrf', 111, '12121.0', 'PAR', 'PARTICULAR', 60),
(37, 'Alfonso', 1231, '312.0', 'PAR', 'PARTICULAR', 61),
(38, '', 0, '0.0', 'Paridad', 'Transito', 62),
(39, '', 0, '0.0', 'Paridad', 'Transito', 63),
(40, '', 0, '0.0', 'Paridad', 'Transito', 64);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `censo`
--

CREATE TABLE `censo` (
  `idCenso` int(11) NOT NULL,
  `fechaHora` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `censo`
--

INSERT INTO `censo` (`idCenso`, `fechaHora`) VALUES
(7, '2019-08-30 11:50:34'),
(8, '2019-08-30 11:50:56'),
(15, '2019-10-08 13:11:59'),
(50, '2019-10-08 13:11:59'),
(51, '2019-10-08 13:11:59'),
(52, '2019-10-08 13:11:59'),
(53, '2019-10-08 13:11:59'),
(54, '2019-10-08 13:11:59'),
(55, '2019-10-08 13:11:59'),
(56, '2019-10-08 13:11:59'),
(57, '2019-10-08 13:11:59'),
(58, '2019-10-08 13:11:59'),
(59, '2019-10-08 13:11:59'),
(60, '2019-10-08 13:11:59'),
(61, '2019-10-08 13:11:59'),
(62, '2019-10-08 13:11:59'),
(63, '2019-10-08 13:11:59'),
(64, '12/10/2019 0:39:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordenada`
--

CREATE TABLE `coordenada` (
  `idCoordenada` int(11) NOT NULL,
  `latitud` varchar(45) NOT NULL,
  `longitud` varchar(45) NOT NULL,
  `idCenso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `coordenada`
--

INSERT INTO `coordenada` (`idCoordenada`, `latitud`, `longitud`, `idCenso`) VALUES
(8, '222.2', '23232.2', 7),
(9, '222.2', '23232.2', 8),
(12, '1212', '1212', 15),
(50, '2321', '343434', 50),
(51, '2321', '343434', 51),
(52, '2321', '343434', 52),
(53, '2321', '343434', 53),
(54, '2321', '343434', 54),
(55, '2321', '343434', 55),
(56, '12.33', '23.4', 56),
(57, '12', '36', 57),
(58, '12', '21', 58),
(59, '12.33', '23.4', 59),
(60, '12', '21', 60),
(61, '12.33', '23.4', 61),
(62, '34.5', '45.5', 62),
(63, '34.5', '45.5', 63),
(64, '34.7', '45.6', 64);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadodelarbol`
--

CREATE TABLE `estadodelarbol` (
  `idEstadoDelArbol` int(11) NOT NULL,
  `estadoSanitario` varchar(45) NOT NULL,
  `inclinacion` varchar(45) NOT NULL,
  `ahuecamiento` varchar(45) NOT NULL,
  `cable` varchar(45) NOT NULL,
  `luminaria` varchar(45) NOT NULL,
  `danios` varchar(45) NOT NULL,
  `veredas` varchar(45) NOT NULL,
  `podas` varchar(45) NOT NULL,
  `idCenso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadodelarbol`
--

INSERT INTO `estadodelarbol` (`idEstadoDelArbol`, `estadoSanitario`, `inclinacion`, `ahuecamiento`, `cable`, `luminaria`, `danios`, `veredas`, `podas`, `idCenso`) VALUES
(5, 'ES', 'IN', 'ahu', 'ca', 'LU', 'danios', 'veredas', 'podas', 7),
(6, 'ES', 'IN', 'ahu', 'ca', 'LU', 'danios', 'veredas', 'podas', 8),
(9, 'pepepedp', '343', '2321.8', '343434', '2321', '2fef', 'rrrrrrr', 'rrrrrrr', 50),
(10, 'pepepedp', '343', '2321.8', '343434', '2321', '2fef', 'rrrrrrr', 'rrrrrrr', 51),
(11, 'pepepedp', '343', '2321.8', '343434', '2321', '2fef', 'rrrrrrr', 'rrrrrrr', 52),
(12, 'pepepedp', '343', '2321.8', '343434', '2321', '2fef', 'rrrrrrr', 'rrrrrrr', 53),
(13, 'pepepedp', '343', '2321.8', '343434', '2321', '2fef', 'rrrrrrr', 'rrrrrrr', 54),
(14, 'pepepedp', '343', '2321.8', '343434', '2321', '2fef', 'rrrrrrr', 'rrrrrrr', 55),
(15, 'D', 'LI', '>50%', 'PD', 'PE', 'NO', 'NO', 'NO', 56),
(16, 'Estado Sanitario', 'Inclinacion', '>50%', 'Cables', 'PD', 'Daños', 'Veredas', 'Podas', 58),
(17, 'Estado Sanitario', 'Inclinacion', '>50%', 'Cables', 'Luminaria', 'Daños', 'Veredas', 'Podas', 57),
(18, 'D', 'LI', '>50%', 'PD', 'PE', 'NO', 'NO', 'NO', 59),
(19, 'Estado Sanitario', 'Inclinacion', '>50%', 'Cables', 'PD', 'Daños', 'Veredas', 'Podas', 60),
(20, 'D', 'LI', '>50%', 'PD', 'PE', 'NO', 'NO', 'NO', 61),
(21, 'Estado Sanitario', 'Inclinacion', 'Ahuecamiento', 'Cables', 'Luminaria', 'Daños', 'Veredas', 'Podas', 62),
(22, 'Estado Sanitario', 'Inclinacion', 'Ahuecamiento', 'Cables', 'Luminaria', 'Daños', 'Veredas', 'Podas', 63),
(23, 'Estado Sanitario', 'Inclinacion', 'Ahuecamiento', 'Cables', 'Luminaria', 'Daños', 'Veredas', 'Podas', 64);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `idImagen` int(11) NOT NULL,
  `idCenso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `dni` int(11) NOT NULL,
  `idCenso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellido`, `dni`, `idCenso`) VALUES
(3, 'nico', 'TreRez', 11, 7),
(7, 'nombre', '343', 2321, 52),
(8, 'nombre', '343', 2321, 53),
(9, 'nombre', '343', 2321, 54),
(10, 'nombre', '343', 2321, 55),
(11, 'Brenda', 'Gomez', 4545433, 56),
(12, 'Nico', 'Perez', 11123123, 58),
(13, 'Nicolol', 'Perez', 11123123, 57),
(14, 'Brenda', 'Gomez', 4545433, 59),
(15, 'Nico', 'Perez', 11123123, 60),
(16, 'Brenda', 'Gomez', 4545433, 61),
(17, 'Pepe', 'Pompin', 32322432, 62),
(18, 'Pepe', 'Pompin', 32322432, 63),
(19, 'robert', 'mujica', 34315968, 64);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arbol`
--
ALTER TABLE `arbol`
  ADD PRIMARY KEY (`idArbol`),
  ADD KEY `idCensoArbol` (`idCenso`);

--
-- Indices de la tabla `calle`
--
ALTER TABLE `calle`
  ADD PRIMARY KEY (`idCalle`),
  ADD KEY `idCensoCalle` (`idCenso`);

--
-- Indices de la tabla `censo`
--
ALTER TABLE `censo`
  ADD PRIMARY KEY (`idCenso`);

--
-- Indices de la tabla `coordenada`
--
ALTER TABLE `coordenada`
  ADD PRIMARY KEY (`idCoordenada`),
  ADD KEY `idCensoCoordenada` (`idCenso`);

--
-- Indices de la tabla `estadodelarbol`
--
ALTER TABLE `estadodelarbol`
  ADD PRIMARY KEY (`idEstadoDelArbol`),
  ADD KEY `idCensoEstado` (`idCenso`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`idImagen`),
  ADD KEY `idCensoImagen` (`idCenso`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idCensoUsuario` (`idCenso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arbol`
--
ALTER TABLE `arbol`
  MODIFY `idArbol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `calle`
--
ALTER TABLE `calle`
  MODIFY `idCalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `censo`
--
ALTER TABLE `censo`
  MODIFY `idCenso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `coordenada`
--
ALTER TABLE `coordenada`
  MODIFY `idCoordenada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `estadodelarbol`
--
ALTER TABLE `estadodelarbol`
  MODIFY `idEstadoDelArbol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `idImagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `arbol`
--
ALTER TABLE `arbol`
  ADD CONSTRAINT `idCensoArbol` FOREIGN KEY (`idCenso`) REFERENCES `censo` (`idCenso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `calle`
--
ALTER TABLE `calle`
  ADD CONSTRAINT `idCensoCalle` FOREIGN KEY (`idCenso`) REFERENCES `censo` (`idCenso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `coordenada`
--
ALTER TABLE `coordenada`
  ADD CONSTRAINT `idCensoCoordenada` FOREIGN KEY (`idCenso`) REFERENCES `censo` (`idCenso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estadodelarbol`
--
ALTER TABLE `estadodelarbol`
  ADD CONSTRAINT `idCensoEstado` FOREIGN KEY (`idCenso`) REFERENCES `censo` (`idCenso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `idCensoImagen` FOREIGN KEY (`idCenso`) REFERENCES `censo` (`idCenso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `idCensoUsuario` FOREIGN KEY (`idCenso`) REFERENCES `censo` (`idCenso`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 30-10-2019 a las 14:12:22
-- Versión del servidor: 10.3.16-MariaDB
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
-- Base de datos: `id11206201_mipc_24624265_arbolado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arbol`
--

CREATE TABLE `arbol` (
  `idArbol` int(11) NOT NULL,
  `especie` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `numeroArbol` int(11) NOT NULL,
  `distanciaEntrePlantas` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `distanciaAlMuro` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `circunferenciaDelArbol` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `cazuela` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `comentario` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idCenso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `arbol`
--

INSERT INTO `arbol` (`idArbol`, `especie`, `numeroArbol`, `distanciaEntrePlantas`, `distanciaAlMuro`, `circunferenciaDelArbol`, `cazuela`, `comentario`, `idCenso`) VALUES
(36, 'Arbol fuccia', 7, '0.0', '0.0', '0.0', 'Cazuela', '', 65),
(38, 'Especie', 8, '0.0', '0.0', '0.0', 'Cazuela', '', 67),
(39, 'Especie', 23, '0.0', '0.0', '0.0', 'Cazuela', '', 68),
(40, 'Especie', 1, '0.0', '0.0', '0.0', 'Cazuela', '', 69),
(41, 'Especie', 1, '0.0', '0.0', '0.0', 'Cazuela', '', 70),
(42, 'Especie', 46, '0.0', '0.0', '0.0', 'Cazuela', '', 71),
(43, 'Especie', 43, '0.0', '0.0', '0.0', 'Cazuela', '', 72),
(44, 'Especie', 5, '0.0', '0.0', '0.0', 'Cazuela', '', 73),
(45, 'Especie', 32, '0.0', '0.0', '0.0', 'Cazuela', '', 74),
(46, 'Especie', 2, '0.0', '0.0', '0.0', 'Cazuela', '', 75),
(47, 'Especie', 2, '0.0', '0.0', '0.0', 'Cazuela', '', 76),
(48, 'Especie', 44, '0.0', '0.0', '0.0', 'Cazuela', '', 77),
(49, 'Especie', 21, '0.0', '0.0', '0.0', 'Cazuela', '', 78),
(50, 'Especie', 2, '0.0', '0.0', '0.0', 'Cazuela', '', 79);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calle`
--

CREATE TABLE `calle` (
  `idCalle` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `numeroFrente` int(11) NOT NULL,
  `anchoVereda` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `paridad` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `transito` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `idCenso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `calle`
--

INSERT INTO `calle` (`idCalle`, `nombre`, `numeroFrente`, `anchoVereda`, `paridad`, `transito`, `idCenso`) VALUES
(41, '', 0, '0.0', 'Paridad', 'Transito', 65),
(43, '', 0, '0.0', 'Paridad', 'Transito', 67),
(44, '', 0, '0.0', 'Paridad', 'Transito', 68),
(45, 'aqwqw', 12, '0.0', 'Paridad', 'Transito', 69),
(46, '', 0, '0.0', 'Paridad', 'Transito', 70),
(47, '', 0, '0.0', 'Paridad', 'Transito', 71),
(48, '', 0, '0.0', 'Paridad', 'Transito', 72),
(49, '', 0, '0.0', 'Paridad', 'Transito', 73),
(50, '', 0, '0.0', 'Paridad', 'Transito', 74),
(51, '', 0, '0.0', 'Paridad', 'Transito', 75),
(52, '', 0, '0.0', 'Paridad', 'Transito', 76),
(53, '', 0, '0.0', 'Paridad', 'Transito', 77),
(54, '', 0, '0.0', 'Paridad', 'Transito', 78),
(55, '', 0, '0.0', 'Paridad', 'Transito', 79);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `censo`
--

CREATE TABLE `censo` (
  `idCenso` int(11) NOT NULL,
  `fechaHora` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `censo`
--

INSERT INTO `censo` (`idCenso`, `fechaHora`) VALUES
(65, '12/10/2019 23:11:14'),
(67, '14/10/2019 18:50:29'),
(68, '15/10/2019 0:31:10'),
(69, '15/10/2019 0:32:55'),
(70, '14/10/2019 22:4:29'),
(71, '27/10/2019 17:19:1'),
(72, '27/10/2019 22:51:10'),
(73, '27/10/2019 23:2:55'),
(74, '27/10/2019 23:8:52'),
(75, '27/10/2019 23:12:38'),
(76, '27/10/2019 23:15:42'),
(77, '27/10/2019 23:23:40'),
(78, '27/10/2019 23:32:34'),
(79, '27/10/2019 23:34:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordenada`
--

CREATE TABLE `coordenada` (
  `idCoordenada` int(11) NOT NULL,
  `latitud` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `longitud` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `idCenso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `coordenada`
--

INSERT INTO `coordenada` (`idCoordenada`, `latitud`, `longitud`, `idCenso`) VALUES
(65, '9', '9', 65),
(67, '8', '8', 67),
(68, '12', '21', 68),
(69, '12', '33', 69),
(70, '45', '45', 70),
(71, '45', '67', 71),
(72, '5', '5', 72),
(73, '52', '25', 73),
(74, '23', '22', 74),
(75, '2', '2', 75),
(76, '21', '21', 76),
(77, '87', '87', 77),
(78, '21', '22', 78),
(79, '33', '43', 79);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadodelarbol`
--

CREATE TABLE `estadodelarbol` (
  `idEstadoDelArbol` int(11) NOT NULL,
  `estadoSanitario` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `inclinacion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ahuecamiento` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `cable` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `luminaria` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `danios` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `veredas` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `podas` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `idCenso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estadodelarbol`
--

INSERT INTO `estadodelarbol` (`idEstadoDelArbol`, `estadoSanitario`, `inclinacion`, `ahuecamiento`, `cable`, `luminaria`, `danios`, `veredas`, `podas`, `idCenso`) VALUES
(24, 'Estado Sanitario', 'Inclinacion', 'Ahuecamiento', 'Cables', 'Luminaria', 'Daños', 'Veredas', 'Podas', 65),
(26, 'Estado Sanitario', 'Inclinacion', 'Ahuecamiento', 'Cables', 'Luminaria', 'Daños', 'Veredas', 'Podas', 67),
(27, 'Estado Sanitario', 'Inclinacion', 'Ahuecamiento', 'Cables', 'Luminaria', 'Daños', 'Veredas', 'Podas', 68),
(28, 'Estado Sanitario', 'Inclinacion', 'Ahuecamiento', 'Cables', 'Luminaria', 'Daños', 'Veredas', 'Podas', 69),
(29, 'Estado Sanitario', 'Inclinacion', 'Ahuecamiento', 'Cables', 'Luminaria', 'Daños', 'Veredas', 'Podas', 70),
(30, 'Estado Sanitario', 'Inclinacion', 'Ahuecamiento', 'Cables', 'Luminaria', 'Daños', 'Veredas', 'Podas', 71),
(31, 'Estado Sanitario', 'Inclinacion', 'Ahuecamiento', 'Cables', 'Luminaria', 'Daños', 'Veredas', 'Podas', 72),
(32, 'Estado Sanitario', 'Inclinacion', 'Ahuecamiento', 'Cables', 'Luminaria', 'Daños', 'Veredas', 'Podas', 73),
(33, 'Estado Sanitario', 'Inclinacion', 'Ahuecamiento', 'Cables', 'Luminaria', 'Daños', 'Veredas', 'Podas', 74),
(34, 'Estado Sanitario', 'Inclinacion', 'Ahuecamiento', 'Cables', 'Luminaria', 'Daños', 'Veredas', 'Podas', 75),
(35, 'Estado Sanitario', 'Inclinacion', 'Ahuecamiento', 'Cables', 'Luminaria', 'Daños', 'Veredas', 'Podas', 76),
(36, 'Estado Sanitario', 'Inclinacion', 'Ahuecamiento', 'Cables', 'Luminaria', 'Daños', 'Veredas', 'Podas', 77),
(37, 'Estado Sanitario', 'Inclinacion', 'Ahuecamiento', 'Cables', 'Luminaria', 'Daños', 'Veredas', 'Podas', 78),
(38, 'Estado Sanitario', 'Inclinacion', 'Ahuecamiento', 'Cables', 'Luminaria', 'Daños', 'Veredas', 'Podas', 79);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `idImagen` int(11) NOT NULL,
  `idCenso` int(11) NOT NULL,
  `img` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `dni` int(11) NOT NULL,
  `idCenso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellido`, `dni`, `idCenso`) VALUES
(20, 'Alan', 'Prechot', 34315968, 65),
(22, 'de', 'de', 2222222, 67),
(23, 'de', 'de', 2222222, 68),
(24, 'de', 'de', 2222222, 69),
(25, 'Nykolai', 'Perez', 4524545, 70),
(26, 'Nykolai', 'Perez', 4524545, 71),
(27, 'aadsdde', 'de', 2222222, 72),
(28, 'aadsdde', 'de', 2222222, 73),
(29, 'aadsdde', 'de', 2222222, 73),
(30, 'aadsdde', 'de', 2222222, 74),
(31, 'aadsdde', 'de', 2222222, 74),
(32, 'aadsdde', 'de', 2222222, 75),
(33, 'aadsdde', 'de', 2222222, 76),
(34, 'aadsdde', 'de', 2222222, 77),
(35, 'aadsdde', 'de', 2222222, 78),
(36, 'aadsdde', 'de', 2222222, 79);

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
  MODIFY `idArbol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `calle`
--
ALTER TABLE `calle`
  MODIFY `idCalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `censo`
--
ALTER TABLE `censo`
  MODIFY `idCenso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `coordenada`
--
ALTER TABLE `coordenada`
  MODIFY `idCoordenada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `estadodelarbol`
--
ALTER TABLE `estadodelarbol`
  MODIFY `idEstadoDelArbol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `idImagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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

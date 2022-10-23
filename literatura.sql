-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 23-10-2022 a las 06:38:27
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `literatura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `idAutor` int(11) NOT NULL,
  `Autor` varchar(255) NOT NULL,
  `AñoNacimiento` int(4) NOT NULL,
  `AñoFallecimiento` int(4) DEFAULT NULL,
  `LugarNacimiento` varchar(255) NOT NULL,
  `Vida` varchar(255) NOT NULL,
  `Estilo` varchar(255) NOT NULL,
  `RefEpoca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`idAutor`, `Autor`, `AñoNacimiento`, `AñoFallecimiento`, `LugarNacimiento`, `Vida`, `Estilo`, `RefEpoca`) VALUES
(5, 'Don Quijote', 1860, 1900, 'España', 'Si', 'Si', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `epocas`
--

CREATE TABLE `epocas` (
  `IdEpoca` int(11) NOT NULL,
  `Epoca` varchar(255) NOT NULL,
  `TiempoComprendido` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `epocas`
--

INSERT INTO `epocas` (`IdEpoca`, `Epoca`, `TiempoComprendido`) VALUES
(2, 'Medieval', 'Siglo V y XV');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `IdGenero` int(11) NOT NULL,
  `Genero` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`IdGenero`, `Genero`) VALUES
(1, 'Literario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras`
--

CREATE TABLE `obras` (
  `IdObra` int(11) NOT NULL,
  `Titulo` varchar(255) NOT NULL,
  `AñoPrimeraEdicion` int(4) NOT NULL,
  `Argumento` varchar(255) NOT NULL,
  `Critica` varchar(255) NOT NULL,
  `RefAutor` int(11) NOT NULL,
  `RefEpoca` int(11) NOT NULL,
  `RefGenero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `obras`
--

INSERT INTO `obras` (`IdObra`, `Titulo`, `AñoPrimeraEdicion`, `Argumento`, `Critica`, `RefAutor`, `RefEpoca`, `RefGenero`) VALUES
(1, 'Don Quijote de la Mancha', 1605, '', 'Esta es la historia de un hidalgo de la Mancha de unos 50 años de edad que tras leer muchos libros de caballería, un género popular en siglo XVI, decide disfrazarse de caballero andante y embarcarse en una serie de aventuras al lado de su viejo caballo Ro', 5, 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`idAutor`),
  ADD KEY `RefEpoca` (`RefEpoca`);

--
-- Indices de la tabla `epocas`
--
ALTER TABLE `epocas`
  ADD PRIMARY KEY (`IdEpoca`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`IdGenero`);

--
-- Indices de la tabla `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`IdObra`),
  ADD KEY `RefAutor` (`RefAutor`),
  ADD KEY `RefEpoca` (`RefEpoca`),
  ADD KEY `RefGenero` (`RefGenero`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `epocas`
--
ALTER TABLE `epocas`
  MODIFY `IdEpoca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `IdGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `obras`
--
ALTER TABLE `obras`
  MODIFY `IdObra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autores`
--
ALTER TABLE `autores`
  ADD CONSTRAINT `autores_ibfk_1` FOREIGN KEY (`RefEpoca`) REFERENCES `epocas` (`IdEpoca`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `obras`
--
ALTER TABLE `obras`
  ADD CONSTRAINT `obras_ibfk_1` FOREIGN KEY (`RefAutor`) REFERENCES `autores` (`idAutor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `obras_ibfk_2` FOREIGN KEY (`RefEpoca`) REFERENCES `epocas` (`IdEpoca`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `obras_ibfk_3` FOREIGN KEY (`RefGenero`) REFERENCES `genero` (`IdGenero`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2025 a las 22:50:02
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `secont_etica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_estes_publicos`
--

CREATE TABLE `cat_estes_publicos` (
  `ID_ENTE_PUBLICO` smallint(6) UNSIGNED NOT NULL,
  `NOMBRE_ENTE_PUBLICO` varchar(100) NOT NULL,
  `SIGLAS` char(10) NOT NULL,
  `ACTIVO` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cat_estes_publicos`
--

INSERT INTO `cat_estes_publicos` (`ID_ENTE_PUBLICO`, `NOMBRE_ENTE_PUBLICO`, `SIGLAS`, `ACTIVO`) VALUES
(1, 'SECRETARÍA DE ADMINISTRACIÓN Y FINANZAS', 'SAFIN', '1'),
(2, 'SECRETARÍA DE EDUCACIÓN', 'SEDUC', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cat_estes_publicos`
--
ALTER TABLE `cat_estes_publicos`
  ADD PRIMARY KEY (`ID_ENTE_PUBLICO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cat_estes_publicos`
--
ALTER TABLE `cat_estes_publicos`
  MODIFY `ID_ENTE_PUBLICO` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2025 a las 19:02:19
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
-- Base de datos: `secont_evaluacion_comite_etica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_cumplimiento`
--

CREATE TABLE `actividad_cumplimiento` (
  `ID_ACTIVIDAD_CUMP` int(10) UNSIGNED NOT NULL,
  `ID_PERIODO_TABLERO_CUMP` tinyint(3) UNSIGNED NOT NULL,
  `DESCRIPCION_ACTIVIDAD` varchar(100) NOT NULL,
  `DOCUMENTO_ACCION` varchar(1024) NOT NULL,
  `FECHA_LIMITE_CUMPLIMIENTO` date NOT NULL,
  `FECHA_LIMITE_ENTREGA_SECONT` date NOT NULL,
  `PUNTO_MAXIMOS` tinyint(3) UNSIGNED NOT NULL,
  `FECHA_HORA` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ACTIVO` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_desempeno`
--

CREATE TABLE `actividad_desempeno` (
  `ID_ACTIVIDAD_DESEMP` int(10) UNSIGNED NOT NULL,
  `ID_DOCTO_ACCION_DESEMP` int(10) UNSIGNED NOT NULL,
  `ID_PERIODO_TABLERO_DESEMP` tinyint(3) UNSIGNED NOT NULL,
  `DESCRIPCION_ACTIVIDAD` varchar(100) NOT NULL,
  `FECHA_LIMITE_CUMPLIMIENTO` date NOT NULL,
  `FECHA_LIMITE_ENTREGA_SECONT` date NOT NULL,
  `PUNTOS_MAXIMOS` tinyint(4) NOT NULL,
  `FECHA_HORA` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ACTIVO` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_archivos`
--

CREATE TABLE `cat_archivos` (
  `ID_ARCHIVO` bigint(20) UNSIGNED NOT NULL,
  `ID_USR` int(10) UNSIGNED NOT NULL COMMENT 'PRIMARY_KEY de tabla "usr_etica"',
  `ETIQUETA_ARCHIVO` varchar(50) DEFAULT NULL,
  `NOMBRE_ARCHIVO` varchar(25) NOT NULL COMMENT 'Nombre real con el se almacena en el servidor',
  `FECHA_HORA` timestamp NOT NULL DEFAULT current_timestamp(),
  `ACTIVO` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_ente_publico`
--

CREATE TABLE `cat_ente_publico` (
  `ID_ENTE_PUBLICO` smallint(5) UNSIGNED NOT NULL,
  `ID_TIPO_ORGANISMO_ENTE` tinyint(3) UNSIGNED NOT NULL,
  `ID_NIVEL_ORGANISMO_ENTE` tinyint(3) UNSIGNED NOT NULL,
  `NOMBRE_ENTE_PUBLICO` varchar(100) NOT NULL,
  `SIGLAS` varchar(10) NOT NULL,
  `ACTIVO` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_formatos_descarga`
--

CREATE TABLE `cat_formatos_descarga` (
  `ID_FORMATO_DESCARGA` smallint(5) UNSIGNED NOT NULL,
  `NOMBRE_FORMATO` varchar(100) NOT NULL,
  `ID_ARCHIVO` bigint(20) NOT NULL,
  `FECHA_HORA` timestamp NOT NULL DEFAULT current_timestamp(),
  `ACTIVO` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_nivel_organismo_ente`
--

CREATE TABLE `cat_nivel_organismo_ente` (
  `ID_NIVEL_ORGANISMO_ENTE` tinyint(3) UNSIGNED NOT NULL,
  `DESCRIPCION_NIVEL_ORGANISMO_ENTE` varchar(50) NOT NULL,
  `ACTIVO` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cat_nivel_organismo_ente`
--

INSERT INTO `cat_nivel_organismo_ente` (`ID_NIVEL_ORGANISMO_ENTE`, `DESCRIPCION_NIVEL_ORGANISMO_ENTE`, `ACTIVO`) VALUES
(1, 'SECRETARIA', '1'),
(2, 'DESCENTRALIZADA', '1'),
(3, 'FIDEICOMISO PÚBLICO', '1'),
(4, 'EMPRESA DE PARTICIPACIÓN ESTATAL MAYORITARIA', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_rubro_desempeno`
--

CREATE TABLE `cat_rubro_desempeno` (
  `ID_RUBRO_DESEMP` tinyint(3) UNSIGNED NOT NULL,
  `DESCRIPCION_RUBRO` varchar(30) NOT NULL,
  `ACTIVO` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cat_rubro_desempeno`
--

INSERT INTO `cat_rubro_desempeno` (`ID_RUBRO_DESEMP`, `DESCRIPCION_RUBRO`, `ACTIVO`) VALUES
(1, 'SESIONES', '1'),
(2, 'INFORME DE ACTIVIDADES', '1'),
(3, 'INFORME DE DENUNCIAS', '1'),
(4, 'ACTIVIDADES', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_tipo_organismo_ente`
--

CREATE TABLE `cat_tipo_organismo_ente` (
  `ID_TIPO_ORGANISMO_ENTE` tinyint(3) UNSIGNED NOT NULL,
  `DESCRIPCION_TIPO_ORGANISMO_ENTE` varchar(50) NOT NULL,
  `ACTIVO` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cat_tipo_organismo_ente`
--

INSERT INTO `cat_tipo_organismo_ente` (`ID_TIPO_ORGANISMO_ENTE`, `DESCRIPCION_TIPO_ORGANISMO_ENTE`, `ACTIVO`) VALUES
(1, 'ORGANISMO CENTRALIZADO', '1'),
(2, 'ENTIDADES PARAESTATALES', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento_accion_desempeno`
--

CREATE TABLE `documento_accion_desempeno` (
  `ID_DOCTO_ACCION_DESEMP` int(10) UNSIGNED NOT NULL,
  `ID_PERIODO_TABLERO_DESEMP` tinyint(3) UNSIGNED NOT NULL,
  `ID_RUBRO_DESEMP` tinyint(3) UNSIGNED NOT NULL,
  `DESCRIPCION_DOCTO_ACCION` varchar(1024) NOT NULL,
  `FECHA_HORA` timestamp NOT NULL DEFAULT current_timestamp(),
  `ACTIVO` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entes_acciones_cumplimiento`
--

CREATE TABLE `entes_acciones_cumplimiento` (
  `ID_ENTE_ACCIONES_CUMP` int(10) UNSIGNED NOT NULL,
  `ID_ACTIVIDAD_CUMP` int(10) UNSIGNED NOT NULL,
  `ID_USR` int(10) UNSIGNED NOT NULL,
  `ID_ARCHIVO` bigint(20) UNSIGNED NOT NULL,
  `OBSERVACIONES` varchar(100) DEFAULT NULL,
  `FECHA_HORA` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ACTIVO` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entes_acciones_desempeno`
--

CREATE TABLE `entes_acciones_desempeno` (
  `ID_ENTES_ACCIONES_DESEMP` int(10) UNSIGNED NOT NULL,
  `ID_ACTIVIDAD_DESEMP` int(10) UNSIGNED NOT NULL COMMENT 'PRIMARY_KEY de tabla "actividad_desempeno"',
  `ID_USR` int(10) UNSIGNED NOT NULL COMMENT 'PRIMARY_KEY de tabla "usr_etica"',
  `ID_ARCHIVO` bigint(20) UNSIGNED NOT NULL COMMENT 'PRIMARY_KEY de tabla "cat_archivos"',
  `OBSERVACIONES` varchar(100) NOT NULL,
  `FECHA_HORA` timestamp NOT NULL DEFAULT current_timestamp(),
  `ACTIVO` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo_tablero_cumplimiento`
--

CREATE TABLE `periodo_tablero_cumplimiento` (
  `ID_PERIODO_TABLERO_CUMP` tinyint(3) UNSIGNED NOT NULL,
  `PERIODO` varchar(4) NOT NULL,
  `FECHA_HORA` timestamp NOT NULL DEFAULT current_timestamp(),
  `ACTIVO` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo_tablero_desempeno`
--

CREATE TABLE `periodo_tablero_desempeno` (
  `ID_PERIODO_TABLERO_DESEMP` tinyint(3) UNSIGNED NOT NULL,
  `PERIODO` varchar(4) NOT NULL,
  `FECHA_HORA` timestamp NOT NULL DEFAULT current_timestamp(),
  `ACTIVO` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usr_etica`
--

CREATE TABLE `usr_etica` (
  `ID_USR` int(10) UNSIGNED NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `APELLIDO_PATERNO` varchar(40) NOT NULL,
  `APELLIDO_MATERNO` varchar(40) NOT NULL,
  `TELEFONO` varchar(20) NOT NULL,
  `CORREO_ELECTRONICO` varchar(100) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `ID_ENTE_PUBLICO` smallint(5) UNSIGNED NOT NULL,
  `INICIO_PERIODO` date DEFAULT NULL,
  `FINAL_PERIODO` date DEFAULT NULL,
  `FECHA_HORA` timestamp NOT NULL DEFAULT current_timestamp(),
  `ACTIVO` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad_cumplimiento`
--
ALTER TABLE `actividad_cumplimiento`
  ADD PRIMARY KEY (`ID_ACTIVIDAD_CUMP`);

--
-- Indices de la tabla `actividad_desempeno`
--
ALTER TABLE `actividad_desempeno`
  ADD PRIMARY KEY (`ID_ACTIVIDAD_DESEMP`);

--
-- Indices de la tabla `cat_archivos`
--
ALTER TABLE `cat_archivos`
  ADD PRIMARY KEY (`ID_ARCHIVO`);

--
-- Indices de la tabla `cat_ente_publico`
--
ALTER TABLE `cat_ente_publico`
  ADD PRIMARY KEY (`ID_ENTE_PUBLICO`);

--
-- Indices de la tabla `cat_formatos_descarga`
--
ALTER TABLE `cat_formatos_descarga`
  ADD PRIMARY KEY (`ID_FORMATO_DESCARGA`);

--
-- Indices de la tabla `cat_nivel_organismo_ente`
--
ALTER TABLE `cat_nivel_organismo_ente`
  ADD PRIMARY KEY (`ID_NIVEL_ORGANISMO_ENTE`);

--
-- Indices de la tabla `cat_rubro_desempeno`
--
ALTER TABLE `cat_rubro_desempeno`
  ADD PRIMARY KEY (`ID_RUBRO_DESEMP`);

--
-- Indices de la tabla `cat_tipo_organismo_ente`
--
ALTER TABLE `cat_tipo_organismo_ente`
  ADD PRIMARY KEY (`ID_TIPO_ORGANISMO_ENTE`);

--
-- Indices de la tabla `entes_acciones_cumplimiento`
--
ALTER TABLE `entes_acciones_cumplimiento`
  ADD PRIMARY KEY (`ID_ENTE_ACCIONES_CUMP`);

--
-- Indices de la tabla `entes_acciones_desempeno`
--
ALTER TABLE `entes_acciones_desempeno`
  ADD PRIMARY KEY (`ID_ENTES_ACCIONES_DESEMP`);

--
-- Indices de la tabla `periodo_tablero_cumplimiento`
--
ALTER TABLE `periodo_tablero_cumplimiento`
  ADD PRIMARY KEY (`ID_PERIODO_TABLERO_CUMP`);

--
-- Indices de la tabla `periodo_tablero_desempeno`
--
ALTER TABLE `periodo_tablero_desempeno`
  ADD PRIMARY KEY (`ID_PERIODO_TABLERO_DESEMP`);

--
-- Indices de la tabla `usr_etica`
--
ALTER TABLE `usr_etica`
  ADD PRIMARY KEY (`ID_USR`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad_cumplimiento`
--
ALTER TABLE `actividad_cumplimiento`
  MODIFY `ID_ACTIVIDAD_CUMP` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `actividad_desempeno`
--
ALTER TABLE `actividad_desempeno`
  MODIFY `ID_ACTIVIDAD_DESEMP` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cat_archivos`
--
ALTER TABLE `cat_archivos`
  MODIFY `ID_ARCHIVO` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cat_ente_publico`
--
ALTER TABLE `cat_ente_publico`
  MODIFY `ID_ENTE_PUBLICO` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cat_formatos_descarga`
--
ALTER TABLE `cat_formatos_descarga`
  MODIFY `ID_FORMATO_DESCARGA` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cat_nivel_organismo_ente`
--
ALTER TABLE `cat_nivel_organismo_ente`
  MODIFY `ID_NIVEL_ORGANISMO_ENTE` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cat_rubro_desempeno`
--
ALTER TABLE `cat_rubro_desempeno`
  MODIFY `ID_RUBRO_DESEMP` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cat_tipo_organismo_ente`
--
ALTER TABLE `cat_tipo_organismo_ente`
  MODIFY `ID_TIPO_ORGANISMO_ENTE` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `entes_acciones_cumplimiento`
--
ALTER TABLE `entes_acciones_cumplimiento`
  MODIFY `ID_ENTE_ACCIONES_CUMP` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entes_acciones_desempeno`
--
ALTER TABLE `entes_acciones_desempeno`
  MODIFY `ID_ENTES_ACCIONES_DESEMP` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `periodo_tablero_cumplimiento`
--
ALTER TABLE `periodo_tablero_cumplimiento`
  MODIFY `ID_PERIODO_TABLERO_CUMP` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `periodo_tablero_desempeno`
--
ALTER TABLE `periodo_tablero_desempeno`
  MODIFY `ID_PERIODO_TABLERO_DESEMP` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usr_etica`
--
ALTER TABLE `usr_etica`
  MODIFY `ID_USR` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

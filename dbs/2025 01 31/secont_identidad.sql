-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2025 a las 22:51:19
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
-- Base de datos: `secont_identidad`
--

-- --------------------------------------------------------


--ESTRUCTURA PARA LA TABLA DE EVALUACIONES
--
-- Estructura de tabla para la tabla `asignaciones`
--

CREATE TABLE `asignaciones` (
  `ID_ASIGNACION` int(10) UNSIGNED NOT NULL,
  `ID_USR_SECONT` smallint(5) UNSIGNED NOT NULL,
  `ID_APLICACION` tinyint(3) UNSIGNED NOT NULL,
  `ID_PRIVILEGIO` tinyint(3) UNSIGNED NOT NULL,
  `FECHA_HORA` timestamp NOT NULL DEFAULT current_timestamp(),
  `ACTIVO` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asignaciones`
--

INSERT INTO `asignaciones` (`ID_ASIGNACION`, `ID_USR_SECONT`, `ID_APLICACION`, `ID_PRIVILEGIO`, `FECHA_HORA`, `ACTIVO`) VALUES
(1, 1, 255, 9, '2022-10-11 17:58:43', '1'),
(2, 2, 255, 9, '2022-10-11 17:58:43', '1'),
(3, 3, 1, 3, '2022-10-11 17:58:43', '1'),
(4, 4, 1, 3, '2022-10-11 17:58:43', '1'),
(5, 5, 1, 3, '2022-10-11 17:58:43', '1'),
(6, 6, 1, 3, '2022-10-11 17:58:43', '1'),
(7, 7, 1, 3, '2022-10-11 17:58:43', '1'),
(8, 8, 2, 3, '2022-10-14 17:06:17', '1'),
(9, 9, 3, 3, '2023-04-17 21:50:24', '1'),
(10, 10, 3, 3, '2023-04-19 19:00:59', '1'),
(11, 11, 4, 6, '2023-04-20 21:54:28', '1'),
(12, 12, 0, 0, '2023-07-18 19:09:16', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_aplicaciones`
--

CREATE TABLE `cat_aplicaciones` (
  `ID_APLICACION` tinyint(3) UNSIGNED NOT NULL,
  `DESC_APLICACION` varchar(100) NOT NULL,
  `NOMBRE_CORTO` varchar(20) NOT NULL,
  `URL` varchar(200) NOT NULL,
  `FECHA_HORA` timestamp NOT NULL DEFAULT current_timestamp(),
  `ACTIVO` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cat_aplicaciones`
--

INSERT INTO `cat_aplicaciones` (`ID_APLICACION`, `DESC_APLICACION`, `NOMBRE_CORTO`, `URL`, `FECHA_HORA`, `ACTIVO`) VALUES
(1, 'Programa Anual de Evaluaciones (PAE)', 'PAE', 'http://contraloria.campeche.gob.mx/pae/administrator', '2022-05-10 17:03:04', '1'),
(2, 'Sistema de Seguimiento de Revisiones de los Órganos Internos de Control', 'Revisiones OIC', 'http://oic.contraloria.campeche.gob.mx/', '2022-05-10 17:05:26', '1'),
(3, 'Denuncia Anónima', 'Denuncia Anónima', 'http://www.contraloria.campeche.gob.mx/denunciaAnonima/administrator', '2023-04-17 20:02:08', '1'),
(4, 'Reportes DeclaraNET', 'Reportes DNet', 'http://declaranet.campeche.gob.mx/admin_dnetV2/index.php', '2023-04-20 21:50:16', '1'),
(5, 'INTRANET SECONT', 'INTRANET', 'http://localhost/secont_intranet_2023/login.php', '2023-08-14 18:03:35', '1'),
(6, 'Sistema de Control y Seguimiento para Auditorías ', 'SICOSA', 'https://sicosa.campeche.gob.mx', '2024-06-25 17:10:51', '1'),
(7, 'Evaluaciones de Comité Ética SECONT', 'Eval Ética', 'http://localhost/secont_etica_administrador_2025/', '2025-01-31 17:45:49', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_departamento`
--

CREATE TABLE `cat_departamento` (
  `ID_DEPTO` tinyint(3) UNSIGNED NOT NULL,
  `NOMBRE_DEPTO` varchar(100) NOT NULL,
  `SIGLAS` varchar(15) NOT NULL,
  `ACTIVO` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cat_departamento`
--

INSERT INTO `cat_departamento` (`ID_DEPTO`, `NOMBRE_DEPTO`, `SIGLAS`, `ACTIVO`) VALUES
(1, 'EVALUACIÓN Y FORTALECIMIENTO INSTITUCIONAL', 'EVALUACIÓN', '1'),
(2, 'COORDINACIÓN DE ÓRGANOS INTERNOS DE CONTROL', 'COIC', '1'),
(3, 'TECNÓLOGIAS DE LA INFORMACIÓN Y ESTADÍSTICA', 'TIE', '1'),
(4, 'DIRECCIÓN GENERAL DE INVESTIGACIÓN ADMINISTRATIVA', 'DGIA', '1'),
(5, 'DIRECCIÓN GENERAL DE ASUNTOS JURÍDICOS', 'DGAJ', '1'),
(6, 'DIRECCIÓN DE AUDITORÍA GUBERNAMENTAL', 'DAG', '1'),
(7, 'DIRECCIÓN DE CONTRALORÍA SOCIAL', 'CS', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_dependencias`
--

CREATE TABLE `cat_dependencias` (
  `ID_DEPENDENCIA` smallint(5) UNSIGNED NOT NULL,
  `NOMBRE_DEPENDENCIA` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `SIGLAS` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ID_TIPO_DEPENDENCIA` tinyint(3) UNSIGNED NOT NULL,
  `ACTIVO` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_general_ci;

--
-- Volcado de datos para la tabla `cat_dependencias`
--

INSERT INTO `cat_dependencias` (`ID_DEPENDENCIA`, `NOMBRE_DEPENDENCIA`, `SIGLAS`, `ID_TIPO_DEPENDENCIA`, `ACTIVO`) VALUES
(1, 'Coordinación General de la Oficina de la Gobernadora o del Gobernador del Estado', 'OF GOB', 1, '1'),
(2, 'Secretaría de Gobierno', 'SEGOB', 1, '1'),
(3, 'Secretaría de Administración y Finanzas', 'SAFIN', 1, '1'),
(4, 'Secretaría de Modernización Administrativa e Innovación Gubernamental', 'SEMAIG', 1, '1'),
(5, 'Secretaría de Educación', 'SEDUC', 1, '1'),
(6, 'Secretaría de Salud', 'SALUD', 1, '1'),
(7, 'Secretaría de Desarrollo Urbano, Movilidad y Obras Públicas', 'SEDUMOP', 1, '1'),
(8, 'Secretaría de Desarrollo Económico', 'SEDECO', 1, '1'),
(9, 'Secretaría de Desarrollo Agropecuario', 'SDA', 1, '1'),
(10, 'Secretaría de Bienestar', 'BIENESTAR', 1, '1'),
(11, 'Secretaría de Inclusión', 'SEIN', 1, '1'),
(12, 'Secretaría de Medio Ambiente, Biodiversidad, Cambio Climático y Energía', 'MEDIO AMB', 1, '1'),
(13, 'Secretaría de Turismo', 'SETUR', 1, '1'),
(14, 'Secretaría de Protección y Seguridad Ciudadana', 'SPSC', 1, '1'),
(15, 'Secretaría de Protección Civil', 'SEPROCI', 1, '1'),
(16, 'Consejería Jurídica', 'CJ', 1, '1'),
(17, 'Secretaría de la Contraloría', 'SECONT', 1, '1'),
(18, 'Fiscalía General del Estado de Campeche', 'FGECAM', 1, '1'),
(19, 'Provisiones del Estado', 'PROVISIONE', 1, '1'),
(20, 'Deuda Pública', 'DEUDA PUB', 1, '1'),
(21, 'Poder Legislativo', 'P LEG', 1, '1'),
(22, 'Poder Judicial', 'P JUD', 1, '1'),
(23, 'Instituto Electoral del Estado de Campeche', 'IEEC', 2, '1'),
(24, 'Comisión de Derechos Humanos del Estado de Campeche', 'CODHECAM', 2, '1'),
(25, 'Comisión de Transparencia y Acceso a la Información Pública del Estado de Campeche', 'COTAIPEC', 2, '1'),
(26, 'Tribunal Electoral del Estado de Campeche', 'TEEC', 2, '1'),
(27, 'Tribunal de Justicia Administrativa del Estado de Campeche', 'TJA', 2, '1'),
(28, 'Fiscalía Especializada en Combate a la Corrupción del Estado de Campeche', 'FECCCAM', 2, '1'),
(29, 'Colegio de Estudios Científicos y Tecnológicos del Estado de Campeche', 'CECYTEC', 3, '1'),
(30, 'Instituto de Capacitación para el Trabajo del Estado de Campeche', 'ICATCAM', 3, '1'),
(31, 'Colegio de Bachilleres del Estado de Campeche', 'COBACAM', 3, '1'),
(32, 'Universidad Tecnológica de Campeche', 'UTCAM', 3, '1'),
(33, 'Colegio de Educación Profesional Técnica del Estado de Campeche', 'CONALEP', 3, '1'),
(34, 'Instituto Estatal de la Educación para los Adultos del Estado de Campeche', 'IEEA', 3, '1'),
(35, 'Instituto Tecnológico Superior de Calkiní en el Estado de Campeche', 'ITESCAM', 3, '1'),
(36, 'Instituto Tecnológico Superior de Escárcega', 'ITESCARCEG', 3, '1'),
(37, 'Instituto Tecnológico Superior de Champotón', 'ITESCHAM', 3, '1'),
(38, 'Universidad Tecnológica de Candelaria', 'UTECAN', 3, '1'),
(39, 'Instituto Tecnológico Superior de Hopelchén', 'ITSHOPELCH', 3, '1'),
(40, 'Universidad Tecnológica de Calakmul', 'UTCALAKMUL', 3, '1'),
(41, 'Universidad Autónoma de Campeche', 'UAC', 3, '1'),
(42, 'Universidad Autónoma del Carmen', 'UNACAR', 3, '1'),
(43, 'Instituto Campechano', 'IC', 3, '1'),
(44, 'Universidad Intercultural de Campeche', 'UICAM', 3, '1'),
(45, 'Fundación Pablo García', 'FPG', 3, '1'),
(46, 'Consejo Estatal de Investigación Científica y Desarrollo Tecnológico', 'COESICYDET', 3, '1'),
(47, 'Instituto de la Infraestructura Física Educativa del Estado de Campeche', 'INIFEEC', 3, '1'),
(48, 'Promotora de Eventos Artísticos, Culturales y de Convenciones del Estado de Campeche', 'PROEVENTOS', 3, '1'),
(49, 'Instituto Estatal para el Fomento de las Actividades Artesanales en Campeche', 'INEFAAC', 3, '1'),
(50, 'Sistema para el Desarrollo Integral de la Familia del Estado de Campeche', 'DIF', 3, '1'),
(51, 'Instituto del Deporte del Estado de Campeche', 'INDECAM', 3, '1'),
(52, 'Instituto de la Mujer del Estado de Campeche', 'IMEC', 3, '1'),
(53, 'Instituto de la Juventud del Estado de Campeche', 'INJUCAM', 3, '1'),
(54, 'Hospital \"Dr. Manuel Campos\"', 'H.M.CAMPOS', 3, '1'),
(55, 'Hospital Psiquiátrico de Campeche', 'PSIQUIATRI', 3, '1'),
(56, 'Instituto de Servicios Descentralizados de Salud Pública del Estado de Campeche', 'INDESALUD', 3, '1'),
(57, 'Sistema de Atención a Niños, Niñas y Adolescentes Farmacodependientes del Estado de Campeche \"Vida N', 'SANNAFARM', 3, '1'),
(58, 'Comisión de Agua Potable y Alcantarillado del Estado de Campeche', 'CAPAE', 3, '1'),
(59, 'Promotora para la Conservación y Desarrollo Sustentable del Estado de Campeche', 'XIMBAL', 3, '1'),
(60, 'Comisión Estatal de Desarrollo de Suelo y Vivienda', 'CODESVI', 3, '1'),
(61, 'Instituto de Desarrollo y Formación Social', 'INDEFOS', 3, '1'),
(62, 'Sistema de Televisión y Radio de Campeche', 'TRC', 3, '1'),
(63, 'Instituto de Información Estadística, Geográfica y Catastral del Estado de Campeche', 'INFOCAM', 3, '1'),
(64, 'Instituto de Seguridad y Servicios Sociales de los Trabajadores del Estado de Campeche', 'ISSSTECAM', 3, '1'),
(65, 'Instituto de Acceso a la Justicia del Estado de Campeche', 'INDAJUCAM', 3, '1'),
(66, 'Centro de Conciliación Laboral en el Estado', 'CENCOLAB', 3, '1'),
(67, 'Agencia de Energía del Estado de Campeche', 'AEEC', 3, '1'),
(68, 'Secretaría Ejecutiva del Sistema Anticorrupción', 'SESAECAM', 3, '1'),
(69, 'Instituto de Pesca y Acuacultura del Estado de Campeche', 'PESCA', 3, '1'),
(70, 'Instituto de Cultura y Artes del Estado de Campeche', 'CULTURA', 3, '1'),
(71, 'Autoridad del Patrimonio Cultural del Estado de Campeche', 'APCEC', 3, '1'),
(72, 'Organismo Liquidador del Régimen Estatal de Protección', 'REPSS', 3, '1'),
(73, 'Fideicomiso Fondo Campeche', 'FOCAM', 4, '1'),
(74, 'Fideicomiso de Inversión del Impuesto del 2% sobre Nóminas', '2% NOMINA', 4, '1'),
(75, 'Fideicomiso Fondo de Fomento Agropecuario del Estado de Campeche', 'FOFAECAM', 4, '1'),
(76, 'H. Ayuntamiento del Municipio de Calakmul', 'M CALAKMUL', 5, '1'),
(77, 'H. Ayuntamiento de Calkini', 'M CALKINI', 5, '1'),
(78, 'H. Ayuntamiento del Municipio de Campeche', 'M CAMPECHE', 5, '1'),
(79, 'H. Ayuntamiento de Candelaria', 'M CANDELAR', 5, '1'),
(80, 'H. Ayuntamiento de Cd. Del Carmen', 'M CARMEN', 5, '1'),
(81, 'H. Ayuntamiento de Champoton', 'M CHAMPOTO', 5, '1'),
(82, 'H. Ayuntamiento del Municipio de Escárcega', 'M ESCARCEG', 5, '1'),
(83, 'H. Ayuntamiento de Hecelchakan', 'M HECELCHA', 5, '1'),
(84, 'H. Ayuntamiento del Municipio de Hopelchén', 'M HOPELCHE', 5, '1'),
(85, 'H. Ayuntamiento del Municipio de Palizada', 'M PALIZADA', 5, '1'),
(86, 'H. Ayuntamiento del Municipio de Tenabo', 'M TENABO', 5, '1'),
(87, 'H. Ayuntamiento del Municipio de Dzitbalche', 'M DZITBALC', 5, '1'),
(88, 'H. Ayuntamiento del Municipio de Seybaplaya', 'M SEYBAPLA', 5, '1'),
(89, 'Consejo Estatal de Seguridad Pública', 'CESP', 6, '1'),
(90, 'Auditoría Superior del Estado de Campeche', 'ASECAM', 6, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_privilegios`
--

CREATE TABLE `cat_privilegios` (
  `ID_PRIVILEGIO` tinyint(3) UNSIGNED NOT NULL,
  `DESC_PRIVILEGIO` varchar(20) NOT NULL,
  `ACTIVO` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cat_privilegios`
--

INSERT INTO `cat_privilegios` (`ID_PRIVILEGIO`, `DESC_PRIVILEGIO`, `ACTIVO`) VALUES
(1, 'VISOR', '1'),
(3, 'CAPTURISTA', '1'),
(6, 'ADMINISTRADOR', '1'),
(9, 'SUPER-ADMIN', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_tipo_dependencia`
--

CREATE TABLE `cat_tipo_dependencia` (
  `ID_TIPO_DEPENDENCIA` tinyint(3) UNSIGNED NOT NULL,
  `DESC_TIPO_DEPENDENCIA` varchar(50) NOT NULL,
  `SIGLAS` varchar(15) NOT NULL,
  `ACTIVO` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cat_tipo_dependencia`
--

INSERT INTO `cat_tipo_dependencia` (`ID_TIPO_DEPENDENCIA`, `DESC_TIPO_DEPENDENCIA`, `SIGLAS`, `ACTIVO`) VALUES
(1, 'ORGANISMOS CENTRALIZADOS', 'CENTRALIZADO', '1'),
(2, 'ORGANISMO AUTÓNOMO', 'AUTÓNOMO', '1'),
(3, 'ORGANISMOS PÚBLICOS DESCENTRALIZADOS', 'PUB DESCENT', '1'),
(4, 'FIDEICOMISOS PÚBLICOS', 'FIDEICOMISOS', '1'),
(5, 'MUNICIPIOS', 'MUNIC', '1'),
(6, 'OTROS', 'OTROS', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usr_departamento`
--

CREATE TABLE `usr_departamento` (
  `ID_USR_DEPTO` int(10) UNSIGNED NOT NULL,
  `ID_USR_SECONT` smallint(5) UNSIGNED NOT NULL,
  `ID_DEPTO` tinyint(3) UNSIGNED NOT NULL,
  `FECHA_HORA` timestamp NOT NULL DEFAULT current_timestamp(),
  `ACTIVO` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usr_departamento`
--

INSERT INTO `usr_departamento` (`ID_USR_DEPTO`, `ID_USR_SECONT`, `ID_DEPTO`, `FECHA_HORA`, `ACTIVO`) VALUES
(1, 1, 3, '2022-10-11 17:52:31', '1'),
(2, 2, 3, '2022-10-11 17:52:31', '1'),
(3, 3, 1, '2022-10-11 17:52:31', '1'),
(4, 4, 1, '2022-10-11 17:52:31', '1'),
(5, 5, 1, '2022-10-11 17:52:31', '1'),
(6, 6, 1, '2022-10-11 17:52:31', '1'),
(7, 7, 1, '2022-10-11 17:52:31', '1'),
(8, 8, 2, '2022-10-14 17:05:22', '1'),
(9, 9, 4, '2023-04-17 21:50:52', '1'),
(10, 10, 4, '2023-04-19 19:05:14', '1'),
(11, 11, 5, '2023-04-20 21:54:55', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usr_secont`
--

CREATE TABLE `usr_secont` (
  `ID_USR_SECONT` smallint(5) UNSIGNED NOT NULL,
  `NOMBRE` varchar(60) NOT NULL,
  `A_PATERNO` varchar(40) NOT NULL,
  `A_MATERNO` varchar(40) NOT NULL,
  `EMAIL` varchar(80) NOT NULL,
  `PASSWORD` varchar(35) NOT NULL,
  `ID_DEPARTAMENTO` smallint(5) UNSIGNED NOT NULL,
  `PRIVILEGIO` char(1) NOT NULL COMMENT '1 -> Capturista; 6 -> Administrador; 9 -> SuperAdmin',
  `STATUS` char(1) NOT NULL COMMENT '0 -> Borrado Lógico; 1 -> Activo; 2-> Suspendido',
  `FECHA_REGISTRO` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usr_secont`
--

INSERT INTO `usr_secont` (`ID_USR_SECONT`, `NOMBRE`, `A_PATERNO`, `A_MATERNO`, `EMAIL`, `PASSWORD`, `ID_DEPARTAMENTO`, `PRIVILEGIO`, `STATUS`, `FECHA_REGISTRO`) VALUES
(1, 'ADMINISTRADOR', 'SISTEMA', '', 'guillermo.dzib@campeche.gob.mx', '61bd60c60d9fb60cc8fc7767669d40a1', 3, '9', '1', '2021-12-08 18:05:34'),
(2, 'ANDRES DEL CARMEN', 'ZULUAGA', 'SANTIAGO', 'azuluaga@campeche.gob.mx', '25b0081a4c99f0f14db7502f7bbba38a', 3, '9', '1', '2021-12-14 19:19:33'),
(3, 'USUARIO', 'PRUEBA', 'TIE', 'admin@gdzib.net', '61bd60c60d9fb60cc8fc7767669d40a1', 1, '3', '1', '2022-06-01 17:15:08'),
(4, 'GIOVANNA FARIDE', 'MAGAÑA', 'NOVELO', 'lic_gfmn@hotmail.com', '18d54a25e3f50e2f4af0093e66168155', 1, '3', '1', '2022-06-01 18:55:12'),
(5, 'GLENDA BEATRIZ', 'QUIÑONEZ', 'MAY', 'glendabeatriz385@hotmail.com', 'e54626b59ea61401e4f3cacd9f3ba8e4', 1, '3', '1', '2022-06-01 18:57:01'),
(6, 'NATALIA MARIA', 'CHE', 'COBA', 'namaria0970@gmail.com', '358d6e242157daa7385a81e7405c1932', 1, '3', '1', '2022-06-01 18:57:33'),
(7, 'FATIMA FAISULE', 'TORRES', 'EUÁN', 'fatimatorressihochac@hotmail.com', 'c0d024962d7f97e5c436bdd94ee18f13', 1, '3', '1', '2022-06-01 18:58:27'),
(8, 'USUARIO', 'PRUEBA', 'OIC', 'usuario.prueba.oic@mail.com', '61bd60c60d9fb60cc8fc7767669d40a1', 2, '3', '1', '2022-10-14 17:03:06'),
(9, 'LUIS ARTEMIO', 'GARCÍA', 'BAEZ', 'luis.garcia@campeche.gob.mx', '61bd60c60d9fb60cc8fc7767669d40a1', 4, '3', '1', '2023-04-17 21:47:42'),
(10, 'ANA CECILIA', 'RODRÍGUEZ', 'CHI', 'ana.rodriguez@campeche.gob.mx', '61bd60c60d9fb60cc8fc7767669d40a1', 4, '3', '1', '2023-04-19 18:59:50'),
(11, 'RICARDO ENRIQUE', 'CACERES', 'CERVERA', 'ricardo.caceres@campeche.gob.mx', '61bd60c60d9fb60cc8fc7767669d40a1', 5, '3', '1', '2023-04-20 21:53:55');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD PRIMARY KEY (`ID_ASIGNACION`);

--
-- Indices de la tabla `cat_aplicaciones`
--
ALTER TABLE `cat_aplicaciones`
  ADD PRIMARY KEY (`ID_APLICACION`);

--
-- Indices de la tabla `cat_departamento`
--
ALTER TABLE `cat_departamento`
  ADD PRIMARY KEY (`ID_DEPTO`);

--
-- Indices de la tabla `cat_dependencias`
--
ALTER TABLE `cat_dependencias`
  ADD PRIMARY KEY (`ID_DEPENDENCIA`);

--
-- Indices de la tabla `cat_privilegios`
--
ALTER TABLE `cat_privilegios`
  ADD UNIQUE KEY `ID_PRIV` (`ID_PRIVILEGIO`);

--
-- Indices de la tabla `cat_tipo_dependencia`
--
ALTER TABLE `cat_tipo_dependencia`
  ADD PRIMARY KEY (`ID_TIPO_DEPENDENCIA`);

--
-- Indices de la tabla `usr_departamento`
--
ALTER TABLE `usr_departamento`
  ADD PRIMARY KEY (`ID_USR_DEPTO`);

--
-- Indices de la tabla `usr_secont`
--
ALTER TABLE `usr_secont`
  ADD PRIMARY KEY (`ID_USR_SECONT`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  MODIFY `ID_ASIGNACION` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cat_aplicaciones`
--
ALTER TABLE `cat_aplicaciones`
  MODIFY `ID_APLICACION` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cat_departamento`
--
ALTER TABLE `cat_departamento`
  MODIFY `ID_DEPTO` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cat_dependencias`
--
ALTER TABLE `cat_dependencias`
  MODIFY `ID_DEPENDENCIA` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `cat_tipo_dependencia`
--
ALTER TABLE `cat_tipo_dependencia`
  MODIFY `ID_TIPO_DEPENDENCIA` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usr_departamento`
--
ALTER TABLE `usr_departamento`
  MODIFY `ID_USR_DEPTO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usr_secont`
--
ALTER TABLE `usr_secont`
  MODIFY `ID_USR_SECONT` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

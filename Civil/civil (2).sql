-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2022 a las 23:31:40
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
-- Base de datos: `civil`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `no` int(40) NOT NULL,
  `cedula` int(10) NOT NULL,
  `formacion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `construccion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `constructora` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_constructora` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `area` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `foto_vivienda` mediumblob NOT NULL,
  `ubicacion` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `elementos_cercanos` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `uso` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `uso_anterior_resp` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `uso_anterior` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `uso_primer_piso` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `nro_pisos` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `piso_de_vivienda` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `nro_sotanos` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `muro_vecinos` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `elementos` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `altura_pisos` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `material` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `piso` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `techo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `asentamiento` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `grietas` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Nro` int(10) NOT NULL,
  `nombre1` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `nombre2` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `apellido1` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellido2` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` int(10) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `departamento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `municipio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `barrio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombreunidad` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`no`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Nro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `no` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Nro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

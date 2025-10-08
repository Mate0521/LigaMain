-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2025 a las 19:24:06
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `liga_main`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `g1_admin`
--

CREATE TABLE `g1_admin` (
  `id_admin` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `g1_campeonato`
--

CREATE TABLE `g1_campeonato` (
  `id_campeonato` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `g1_campeonato_equipos`
--

CREATE TABLE `g1_campeonato_equipos` (
  `id_campeonato` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `puntuacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `g1_equipo`
--

CREATE TABLE `g1_equipo` (
  `id_equipo` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `id_liga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `g1_fase`
--

CREATE TABLE `g1_fase` (
  `id_fase` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `g1_fecha`
--

CREATE TABLE `g1_fecha` (
  `id_fecha` int(11) NOT NULL,
  `id_campeonato` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `g1_liga`
--

CREATE TABLE `g1_liga` (
  `id_liga` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `g1_partido`
--

CREATE TABLE `g1_partido` (
  `id_partido` int(11) NOT NULL,
  `id_eq_local` int(11) NOT NULL,
  `id_eq_visit` int(11) NOT NULL,
  `id_fase` int(11) NOT NULL,
  `id_fecha` int(11) NOT NULL,
  `goles_local` int(11) NOT NULL,
  `goles_visit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `g1_usuario`
--

CREATE TABLE `g1_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `g1_admin`
--
ALTER TABLE `g1_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `g1_campeonato`
--
ALTER TABLE `g1_campeonato`
  ADD PRIMARY KEY (`id_campeonato`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `g1_campeonato_equipos`
--
ALTER TABLE `g1_campeonato_equipos`
  ADD PRIMARY KEY (`id_campeonato`,`id_equipo`),
  ADD KEY `id_equipo` (`id_equipo`);

--
-- Indices de la tabla `g1_equipo`
--
ALTER TABLE `g1_equipo`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `id_liga` (`id_liga`);

--
-- Indices de la tabla `g1_fase`
--
ALTER TABLE `g1_fase`
  ADD PRIMARY KEY (`id_fase`);

--
-- Indices de la tabla `g1_fecha`
--
ALTER TABLE `g1_fecha`
  ADD KEY `id_campeonato` (`id_campeonato`);

--
-- Indices de la tabla `g1_liga`
--
ALTER TABLE `g1_liga`
  ADD PRIMARY KEY (`id_liga`);

--
-- Indices de la tabla `g1_partido`
--
ALTER TABLE `g1_partido`
  ADD PRIMARY KEY (`id_partido`);

--
-- Indices de la tabla `g1_usuario`
--
ALTER TABLE `g1_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `g1_admin`
--
ALTER TABLE `g1_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `g1_campeonato`
--
ALTER TABLE `g1_campeonato`
  MODIFY `id_campeonato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `g1_equipo`
--
ALTER TABLE `g1_equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `g1_fase`
--
ALTER TABLE `g1_fase`
  MODIFY `id_fase` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `g1_liga`
--
ALTER TABLE `g1_liga`
  MODIFY `id_liga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `g1_partido`
--
ALTER TABLE `g1_partido`
  MODIFY `id_partido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `g1_usuario`
--
ALTER TABLE `g1_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `g1_campeonato`
--
ALTER TABLE `g1_campeonato`
  ADD CONSTRAINT `g1_campeonato_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `g1_usuario` (`id_usuario`);

--
-- Filtros para la tabla `g1_campeonato_equipos`
--
ALTER TABLE `g1_campeonato_equipos`
  ADD CONSTRAINT `g1_campeonato_equipos_ibfk_1` FOREIGN KEY (`id_campeonato`) REFERENCES `g1_campeonato` (`id_campeonato`),
  ADD CONSTRAINT `g1_campeonato_equipos_ibfk_2` FOREIGN KEY (`id_equipo`) REFERENCES `g1_equipo` (`id_equipo`);

--
-- Filtros para la tabla `g1_equipo`
--
ALTER TABLE `g1_equipo`
  ADD CONSTRAINT `g1_equipo_ibfk_1` FOREIGN KEY (`id_liga`) REFERENCES `g1_liga` (`id_liga`);

--
-- Filtros para la tabla `g1_fecha`
--
ALTER TABLE `g1_fecha`
  ADD CONSTRAINT `g1_fecha_ibfk_1` FOREIGN KEY (`id_campeonato`) REFERENCES `g1_campeonato` (`id_campeonato`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

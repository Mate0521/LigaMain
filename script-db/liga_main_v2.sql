-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2025 a las 06:06:42
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

--
-- Volcado de datos para la tabla `g1_admin`
--

INSERT INTO `g1_admin` (`id_admin`, `nombre`, `correo`, `clave`) VALUES
(1, 'pepe', 'pp@lm.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `g1_campeonato`
--

CREATE TABLE `g1_campeonato` (
  `id_campeonato` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `g1_campeonato`
--

INSERT INTO `g1_campeonato` (`id_campeonato`, `id_usuario`, `nombre`, `id_tipo`) VALUES
(2, 1, 'Champions League v1', 1),
(3, 1, 'Champions League v2', 1),
(5, 1, 'Champions League v3', 1),
(6, 1, 'Champions League v4', 1),
(7, 1, 'Champions League 789456', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `g1_campeonato_equipos`
--

CREATE TABLE `g1_campeonato_equipos` (
  `id_campeonato` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `puntuacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `g1_campeonato_equipos`
--

INSERT INTO `g1_campeonato_equipos` (`id_campeonato`, `id_equipo`, `puntuacion`) VALUES
(2, 1, 0),
(2, 2, 0),
(2, 3, 0),
(2, 4, 0),
(2, 5, 0),
(2, 6, 0),
(2, 21, 0),
(2, 22, 0),
(2, 23, 0),
(2, 24, 0),
(2, 25, 0),
(2, 26, 0),
(3, 1, 0),
(3, 2, 0),
(3, 3, 0),
(3, 4, 0),
(3, 5, 0),
(3, 8, 0),
(3, 26, 0),
(5, 1, 0),
(5, 2, 0),
(5, 3, 0),
(6, 1, 0),
(6, 2, 0),
(6, 3, 0),
(6, 4, 0),
(6, 5, 0),
(6, 21, 0),
(6, 22, 0),
(6, 23, 0),
(6, 24, 0),
(7, 1, 0),
(7, 2, 0),
(7, 3, 0),
(7, 5, 0),
(7, 8, 0),
(7, 21, 0),
(7, 22, 0),
(7, 23, 0),
(7, 24, 0),
(7, 41, 0),
(7, 42, 0),
(7, 43, 0),
(7, 44, 0),
(7, 47, 0),
(7, 51, 0),
(7, 56, 0),
(7, 58, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `g1_equipo`
--

CREATE TABLE `g1_equipo` (
  `id_equipo` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `id_liga` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `g1_equipo`
--

INSERT INTO `g1_equipo` (`id_equipo`, `nombre`, `id_liga`, `img`) VALUES
(1, 'Real Madrid', 1, 'https://a.espncdn.com/i/teamlogos/soccer/500/86.png'),
(2, 'Barcelona', 1, 'https://a.espncdn.com/i/teamlogos/soccer/500/83.png'),
(3, 'Atlético de Madrid', 1, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/1068.png'),
(4, 'Sevilla', 1, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/1068.png'),
(5, 'Valencia', 1, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/94.png'),
(6, 'Villarreal', 1, 'https://a.espncdn.com/i/teamlogos/soccer/500/102.png'),
(7, 'Real Sociedad', 1, 'https://a.espncdn.com/i/teamlogos/soccer/500-dark/89.png'),
(8, 'Athletic Club', 1, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/93.png'),
(9, 'Getafe', 1, 'https://a.espncdn.com/i/teamlogos/soccer/500/2922.png'),
(10, 'Celta de Vigo', 1, 'https://a.espncdn.com/i/teamlogos/soccer/500-dark/85.png'),
(11, 'Betis', 1, 'https://a.espncdn.com/i/teamlogos/soccer/500-dark/244.png'),
(12, 'Osasuna', 1, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/97.png'),
(13, 'Espanyol', 1, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/88.png'),
(14, 'Mallorca', 1, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/84.png'),
(15, 'Granada', 1, 'https://a.espncdn.com/i/teamlogos/soccer/500-dark/3747.png'),
(16, 'Alavés', 1, 'https://a.espncdn.com/i/teamlogos/soccer/500/96.png'),
(17, 'Girona', 1, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/9812.png'),
(18, 'Las Palmas', 1, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/98.png'),
(19, 'Rayo Vallecano', 1, 'https://a.espncdn.com/i/teamlogos/soccer/500-dark/101.png'),
(20, 'Cádiz', 1, 'https://a.espncdn.com/i/teamlogos/soccer/500-dark/3842.png'),
(21, 'Manchester City', 2, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/382.png'),
(22, 'Liverpool', 2, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/364.png'),
(23, 'Arsenal', 2, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/359.png'),
(24, 'Manchester United', 2, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/360.png'),
(25, 'Chelsea', 2, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/363.png'),
(26, 'Tottenham Hotspur', 2, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/367.png'),
(27, 'Newcastle United', 2, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/362.png'),
(28, 'Aston Villa', 2, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/362.png'),
(29, 'Brighton & Hove Albion', 2, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/397.png'),
(30, 'West Ham United', 2, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/371.png'),
(31, 'Brentford', 2, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/403.png'),
(32, 'Crystal Palace', 2, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/387.png'),
(33, 'Fulham', 2, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/402.png'),
(34, 'Wolverhampton', 2, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/394.png'),
(35, 'Everton', 2, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/368.png'),
(36, 'Nottingham Forest', 2, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/395.png'),
(37, 'Bournemouth', 2, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/381.png'),
(38, 'Leeds United', 2, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/357.png'),
(39, 'Leicester City', 2, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/338.png'),
(40, 'Sheffield United', 2, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/372.png'),
(41, 'España', 3, 'https://a.espncdn.com/i/teamlogos/soccer/500/86.png'),
(42, 'Francia', 3, 'https://a.espncdn.com/i/teamlogos/soccer/500/86.png'),
(43, 'Alemania', 3, 'https://a.espncdn.com/i/teamlogos/soccer/500/86.png'),
(44, 'Italia', 3, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/642.png'),
(45, 'Inglaterra', 3, 'https://a.espncdn.com/i/teamlogos/soccer/500/86.png'),
(46, 'Portugal', 3, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/660.png'),
(47, 'Países Bajos', 3, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/655.png'),
(48, 'Argentina', 3, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/620.png'),
(49, 'Brasil', 3, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/632.png'),
(50, 'Uruguay', 3, 'https://a.espncdn.com/i/teamlogos/soccer/500/86.png'),
(51, 'Colombia', 3, 'https://a.espncdn.com/i/teamlogos/soccer/500/132.png'),
(52, 'Chile', 3, 'https://a.espncdn.com/i/teamlogos/soccer/500/124.png'),
(53, 'México', 3, 'https://a.espncdn.com/i/teamlogos/soccer/500/11420.png'),
(54, 'Estados Unidos', 3, 'https://a.espncdn.com/i/teamlogos/soccer/500/134.png'),
(55, 'Canadá', 3, 'https://a.espncdn.com/i/teamlogos/soccer/500/131.png'),
(56, 'Japón', 3, 'https://a.espncdn.com/i/teamlogos/soccer/500/3841.png'),
(57, 'Corea del Sur', 3, 'https://a.espncdn.com/i/teamlogos/soccer/500/125.png'),
(58, 'Australia', 3, 'https://a.espncdn.com/i/teamlogos/soccer/500/126.png'),
(59, 'Croacia', 3, 'https://a.espncdn.com/i/teamlogos/soccer/500/619.png'),
(60, 'Marruecos', 3, 'https://a.espncdn.com/i/teamlogos/soccer/500/7911.png'),
(61, 'Juventus', 4, 'https://a.espncdn.com/i/teamlogos/soccer/500/7911.png'),
(62, 'Inter de Milán', 4, 'https://a.espncdn.com/i/teamlogos/soccer/500/137.png'),
(63, 'AC Milan', 4, 'https://a.espncdn.com/i/teamlogos/soccer/500/598.png'),
(64, 'Napoli', 4, 'https://a.espncdn.com/i/teamlogos/soccer/500/3841.png'),
(65, 'Roma', 4, 'https://a.espncdn.com/i/teamlogos/soccer/500/138.png'),
(66, 'Lazio', 4, 'https://a.espncdn.com/i/teamlogos/soccer/500/2950.png'),
(67, 'Atalanta', 4, 'https://a.espncdn.com/i/teamlogos/soccer/500/268.png'),
(68, 'Fiorentina', 4, 'https://a.espncdn.com/i/teamlogos/soccer/500/86.png'),
(69, 'Torino', 4, 'https://a.espncdn.com/i/teamlogos/soccer/500/109.png'),
(70, 'Bologna', 4, 'https://a.espncdn.com/i/teamlogos/soccer/500/119.png'),
(71, 'Sassuolo', 4, 'https://a.espncdn.com/i/teamlogos/soccer/500/86.png'),
(72, 'Udinese', 4, 'https://a.espncdn.com/i/teamlogos/soccer/500/86.png'),
(73, 'Monza', 4, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/658.png'),
(74, 'Empoli', 4, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/658.png'),
(75, 'Lecce', 4, 'https://a.espncdn.com/i/teamlogos/soccer/500/86.png'),
(76, 'Verona', 4, 'https://a.espncdn.com/i/teamlogos/soccer/500/86.png'),
(77, 'Genoa', 4, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/656.png'),
(78, 'Cagliari', 4, 'https://a.espncdn.com/i/teamlogos/soccer/500/86.png'),
(79, 'Salernitana', 4, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/658.png'),
(80, 'Parma', 4, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/656.png'),
(81, 'Bayern Múnich', 5, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/132.png'),
(82, 'Borussia Dortmund', 5, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/132.png'),
(83, 'RB Leipzig', 5, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/132.png'),
(84, 'Bayer Leverkusen', 5, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/132.png'),
(85, 'Eintracht Frankfurt', 5, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/132.png'),
(86, 'VfL Wolfsburgo', 5, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/132.png'),
(87, 'Borussia Mönchengladbach', 5, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/132.png'),
(88, 'Freiburg', 5, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/132.png'),
(89, 'Union Berlín', 5, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/132.png'),
(90, 'Mainz 05', 5, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/132.png'),
(91, 'Stuttgart', 5, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/132.png'),
(92, 'Augsburgo', 5, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/132.png'),
(93, 'Colonia', 5, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/132.png'),
(94, 'Bochum', 5, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/132.png'),
(95, 'Hoffenheim', 5, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/132.png'),
(96, 'Hertha Berlín', 5, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/132.png'),
(97, 'Schalke 04', 5, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/132.png'),
(98, 'Hannover 96', 5, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/132.png'),
(99, 'Hamburgo', 5, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/132.png'),
(100, 'Núremberg', 5, 'https://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/132.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `g1_fase`
--

CREATE TABLE `g1_fase` (
  `id_fase` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `g1_fase`
--

INSERT INTO `g1_fase` (`id_fase`, `nombre`) VALUES
(1, 'todos contra todos'),
(2, 'fase de grupos'),
(3, 'octavos'),
(4, 'cuartos'),
(5, 'semifinal'),
(6, 'final');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `g1_fecha`
--

CREATE TABLE `g1_fecha` (
  `id_fecha` int(11) NOT NULL,
  `id_campeonato` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `g1_fecha`
--

INSERT INTO `g1_fecha` (`id_fecha`, `id_campeonato`, `fecha`) VALUES
(78, 2, '2025-10-15'),
(79, 2, '2025-10-16'),
(80, 2, '2025-10-18'),
(81, 2, '2025-10-19'),
(82, 2, '2025-10-20'),
(83, 2, '2025-10-21'),
(84, 2, '2025-10-22'),
(85, 2, '2025-10-23'),
(86, 2, '2025-10-24'),
(87, 2, '2025-10-25'),
(88, 2, '2025-10-26'),
(89, 3, '2025-10-15'),
(90, 3, '2025-10-16'),
(91, 3, '2025-10-17'),
(92, 3, '2025-10-18'),
(93, 3, '2025-10-19'),
(94, 3, '2025-10-20'),
(95, 3, '2025-10-21'),
(99, 5, '2025-10-15'),
(100, 5, '2025-10-16'),
(101, 5, '2025-10-17'),
(102, 6, '2025-10-15'),
(103, 6, '2025-10-16'),
(104, 6, '2025-10-18'),
(105, 6, '2025-10-21'),
(106, 6, '2025-10-22'),
(107, 6, '2025-10-23'),
(108, 6, '2025-10-24'),
(109, 6, '2025-10-25'),
(110, 6, '2025-10-26'),
(111, 7, '2025-10-16'),
(112, 7, '2025-10-17'),
(113, 7, '2025-10-18'),
(114, 7, '2025-10-19'),
(115, 7, '2025-10-20'),
(116, 7, '2025-10-21'),
(117, 7, '2025-10-22'),
(118, 7, '2025-10-23'),
(119, 7, '2025-10-24'),
(120, 7, '2025-10-25'),
(121, 7, '2025-10-26'),
(122, 7, '2025-10-27'),
(123, 7, '2025-10-28'),
(124, 7, '2025-10-29'),
(125, 7, '2025-10-30'),
(126, 7, '2025-10-31'),
(127, 7, '2025-11-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `g1_liga`
--

CREATE TABLE `g1_liga` (
  `id_liga` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `g1_liga`
--

INSERT INTO `g1_liga` (`id_liga`, `nombre`) VALUES
(1, 'La Liga'),
(2, 'Premier League'),
(3, 'Internacional'),
(4, 'Serie A'),
(5, 'Bundesliga');

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

--
-- Volcado de datos para la tabla `g1_partido`
--

INSERT INTO `g1_partido` (`id_partido`, `id_eq_local`, `id_eq_visit`, `id_fase`, `id_fecha`, `goles_local`, `goles_visit`) VALUES
(1, 1, 26, 1, 78, 0, 0),
(2, 2, 25, 1, 78, 0, 0),
(3, 3, 24, 1, 78, 0, 0),
(4, 4, 23, 1, 78, 0, 0),
(5, 5, 22, 1, 78, 0, 0),
(6, 6, 21, 1, 78, 0, 0),
(7, 1, 25, 1, 79, 0, 0),
(8, 26, 24, 1, 79, 0, 0),
(9, 2, 23, 1, 79, 0, 0),
(10, 3, 22, 1, 79, 0, 0),
(11, 4, 21, 1, 79, 0, 0),
(12, 5, 6, 1, 79, 0, 0),
(13, 1, 24, 1, 80, 0, 0),
(14, 25, 23, 1, 80, 0, 0),
(15, 26, 22, 1, 80, 0, 0),
(16, 2, 21, 1, 80, 0, 0),
(17, 3, 6, 1, 80, 0, 0),
(18, 4, 5, 1, 80, 0, 0),
(19, 1, 23, 1, 81, 0, 0),
(20, 24, 22, 1, 81, 0, 0),
(21, 25, 21, 1, 81, 0, 0),
(22, 26, 6, 1, 81, 0, 0),
(23, 2, 5, 1, 81, 0, 0),
(24, 3, 4, 1, 81, 0, 0),
(25, 1, 22, 1, 82, 0, 0),
(26, 23, 21, 1, 82, 0, 0),
(27, 24, 6, 1, 82, 0, 0),
(28, 25, 5, 1, 82, 0, 0),
(29, 26, 4, 1, 82, 0, 0),
(30, 2, 3, 1, 82, 0, 0),
(31, 1, 21, 1, 83, 0, 0),
(32, 22, 6, 1, 83, 0, 0),
(33, 23, 5, 1, 83, 0, 0),
(34, 24, 4, 1, 83, 0, 0),
(35, 25, 3, 1, 83, 0, 0),
(36, 26, 2, 1, 83, 0, 0),
(37, 1, 6, 1, 84, 0, 0),
(38, 21, 5, 1, 84, 0, 0),
(39, 22, 4, 1, 84, 0, 0),
(40, 23, 3, 1, 84, 0, 0),
(41, 24, 2, 1, 84, 0, 0),
(42, 25, 26, 1, 84, 0, 0),
(43, 1, 5, 1, 85, 0, 0),
(44, 6, 4, 1, 85, 0, 0),
(45, 21, 3, 1, 85, 0, 0),
(46, 22, 2, 1, 85, 0, 0),
(47, 23, 26, 1, 85, 0, 0),
(48, 24, 25, 1, 85, 0, 0),
(49, 1, 4, 1, 86, 0, 0),
(50, 5, 3, 1, 86, 0, 0),
(51, 6, 2, 1, 86, 0, 0),
(52, 21, 26, 1, 86, 0, 0),
(53, 22, 25, 1, 86, 0, 0),
(54, 23, 24, 1, 86, 0, 0),
(55, 1, 3, 1, 87, 0, 0),
(56, 4, 2, 1, 87, 0, 0),
(57, 5, 26, 1, 87, 0, 0),
(58, 6, 25, 1, 87, 0, 0),
(59, 21, 24, 1, 87, 0, 0),
(60, 22, 23, 1, 87, 0, 0),
(61, 1, 2, 1, 88, 0, 0),
(62, 3, 26, 1, 88, 0, 0),
(63, 4, 25, 1, 88, 0, 0),
(64, 5, 24, 1, 88, 0, 0),
(65, 6, 23, 1, 88, 0, 0),
(66, 21, 22, 1, 88, 0, 0),
(67, 2, 26, 1, 89, 0, 0),
(68, 3, 8, 1, 89, 0, 0),
(69, 4, 5, 1, 89, 0, 0),
(70, 1, 26, 1, 90, 0, 0),
(71, 2, 5, 1, 90, 0, 0),
(72, 3, 4, 1, 90, 0, 0),
(73, 1, 8, 1, 91, 0, 0),
(74, 26, 5, 1, 91, 0, 0),
(75, 2, 3, 1, 91, 0, 0),
(76, 1, 5, 1, 92, 0, 0),
(77, 8, 4, 1, 92, 0, 0),
(78, 26, 3, 1, 92, 0, 0),
(79, 1, 4, 1, 93, 0, 0),
(80, 5, 3, 1, 93, 0, 0),
(81, 8, 2, 1, 93, 0, 0),
(82, 1, 3, 1, 94, 0, 0),
(83, 4, 2, 1, 94, 0, 0),
(84, 8, 26, 1, 94, 0, 0),
(85, 1, 2, 1, 95, 0, 0),
(86, 4, 26, 1, 95, 0, 0),
(87, 5, 8, 1, 95, 0, 0),
(88, 2, 3, 1, 99, 0, 0),
(89, 1, 3, 1, 100, 0, 0),
(90, 1, 2, 1, 101, 0, 0),
(91, 2, 24, 1, 102, 0, 0),
(92, 3, 23, 1, 102, 0, 0),
(93, 4, 22, 1, 102, 0, 0),
(94, 5, 21, 1, 102, 0, 0),
(95, 1, 24, 1, 103, 0, 0),
(96, 2, 22, 1, 103, 0, 0),
(97, 3, 21, 1, 103, 0, 0),
(98, 4, 5, 1, 103, 0, 0),
(99, 1, 23, 1, 104, 0, 0),
(100, 24, 22, 1, 104, 0, 0),
(101, 2, 5, 1, 104, 0, 0),
(102, 3, 4, 1, 104, 0, 0),
(103, 1, 22, 1, 105, 0, 0),
(104, 23, 21, 1, 105, 0, 0),
(105, 24, 5, 1, 105, 0, 0),
(106, 2, 3, 1, 105, 0, 0),
(107, 1, 21, 1, 106, 0, 0),
(108, 22, 5, 1, 106, 0, 0),
(109, 23, 4, 1, 106, 0, 0),
(110, 24, 3, 1, 106, 0, 0),
(111, 1, 5, 1, 107, 0, 0),
(112, 21, 4, 1, 107, 0, 0),
(113, 22, 3, 1, 107, 0, 0),
(114, 23, 2, 1, 107, 0, 0),
(115, 1, 4, 1, 108, 0, 0),
(116, 5, 3, 1, 108, 0, 0),
(117, 21, 2, 1, 108, 0, 0),
(118, 23, 24, 1, 108, 0, 0),
(119, 1, 3, 1, 109, 0, 0),
(120, 4, 2, 1, 109, 0, 0),
(121, 21, 24, 1, 109, 0, 0),
(122, 22, 23, 1, 109, 0, 0),
(123, 1, 2, 1, 110, 0, 0),
(124, 4, 24, 1, 110, 0, 0),
(125, 5, 23, 1, 110, 0, 0),
(126, 21, 22, 1, 110, 0, 0),
(127, 2, 58, 1, 111, 0, 0),
(128, 3, 56, 1, 111, 0, 0),
(129, 5, 51, 1, 111, 0, 0),
(130, 8, 47, 1, 111, 0, 0),
(131, 21, 44, 1, 111, 0, 0),
(132, 22, 43, 1, 111, 0, 0),
(133, 23, 42, 1, 111, 0, 0),
(134, 24, 41, 1, 111, 0, 0),
(135, 1, 58, 1, 112, 0, 0),
(136, 2, 51, 1, 112, 0, 0),
(137, 3, 47, 1, 112, 0, 0),
(138, 5, 44, 1, 112, 0, 0),
(139, 8, 43, 1, 112, 0, 0),
(140, 21, 42, 1, 112, 0, 0),
(141, 22, 41, 1, 112, 0, 0),
(142, 23, 24, 1, 112, 0, 0),
(143, 1, 56, 1, 113, 0, 0),
(144, 58, 51, 1, 113, 0, 0),
(145, 2, 44, 1, 113, 0, 0),
(146, 3, 43, 1, 113, 0, 0),
(147, 5, 42, 1, 113, 0, 0),
(148, 8, 41, 1, 113, 0, 0),
(149, 21, 24, 1, 113, 0, 0),
(150, 22, 23, 1, 113, 0, 0),
(151, 1, 51, 1, 114, 0, 0),
(152, 56, 47, 1, 114, 0, 0),
(153, 58, 44, 1, 114, 0, 0),
(154, 2, 42, 1, 114, 0, 0),
(155, 3, 41, 1, 114, 0, 0),
(156, 5, 24, 1, 114, 0, 0),
(157, 8, 23, 1, 114, 0, 0),
(158, 21, 22, 1, 114, 0, 0),
(159, 1, 47, 1, 115, 0, 0),
(160, 51, 44, 1, 115, 0, 0),
(161, 56, 43, 1, 115, 0, 0),
(162, 58, 42, 1, 115, 0, 0),
(163, 2, 24, 1, 115, 0, 0),
(164, 3, 23, 1, 115, 0, 0),
(165, 5, 22, 1, 115, 0, 0),
(166, 8, 21, 1, 115, 0, 0),
(167, 1, 44, 1, 116, 0, 0),
(168, 47, 43, 1, 116, 0, 0),
(169, 51, 42, 1, 116, 0, 0),
(170, 56, 41, 1, 116, 0, 0),
(171, 58, 24, 1, 116, 0, 0),
(172, 2, 22, 1, 116, 0, 0),
(173, 3, 21, 1, 116, 0, 0),
(174, 5, 8, 1, 116, 0, 0),
(175, 1, 43, 1, 117, 0, 0),
(176, 44, 42, 1, 117, 0, 0),
(177, 47, 41, 1, 117, 0, 0),
(178, 51, 24, 1, 117, 0, 0),
(179, 56, 23, 1, 117, 0, 0),
(180, 58, 22, 1, 117, 0, 0),
(181, 2, 8, 1, 117, 0, 0),
(182, 3, 5, 1, 117, 0, 0),
(183, 1, 42, 1, 118, 0, 0),
(184, 43, 41, 1, 118, 0, 0),
(185, 44, 24, 1, 118, 0, 0),
(186, 47, 23, 1, 118, 0, 0),
(187, 51, 22, 1, 118, 0, 0),
(188, 56, 21, 1, 118, 0, 0),
(189, 58, 8, 1, 118, 0, 0),
(190, 2, 3, 1, 118, 0, 0),
(191, 1, 41, 1, 119, 0, 0),
(192, 42, 24, 1, 119, 0, 0),
(193, 43, 23, 1, 119, 0, 0),
(194, 44, 22, 1, 119, 0, 0),
(195, 47, 21, 1, 119, 0, 0),
(196, 51, 8, 1, 119, 0, 0),
(197, 56, 5, 1, 119, 0, 0),
(198, 58, 3, 1, 119, 0, 0),
(199, 1, 24, 1, 120, 0, 0),
(200, 41, 23, 1, 120, 0, 0),
(201, 42, 22, 1, 120, 0, 0),
(202, 43, 21, 1, 120, 0, 0),
(203, 44, 8, 1, 120, 0, 0),
(204, 47, 5, 1, 120, 0, 0),
(205, 51, 3, 1, 120, 0, 0),
(206, 56, 2, 1, 120, 0, 0),
(207, 1, 23, 1, 121, 0, 0),
(208, 24, 22, 1, 121, 0, 0),
(209, 41, 21, 1, 121, 0, 0),
(210, 42, 8, 1, 121, 0, 0),
(211, 43, 5, 1, 121, 0, 0),
(212, 44, 3, 1, 121, 0, 0),
(213, 47, 2, 1, 121, 0, 0),
(214, 56, 58, 1, 121, 0, 0),
(215, 1, 22, 1, 122, 0, 0),
(216, 23, 21, 1, 122, 0, 0),
(217, 24, 8, 1, 122, 0, 0),
(218, 41, 5, 1, 122, 0, 0),
(219, 42, 3, 1, 122, 0, 0),
(220, 43, 2, 1, 122, 0, 0),
(221, 47, 58, 1, 122, 0, 0),
(222, 51, 56, 1, 122, 0, 0),
(223, 1, 21, 1, 123, 0, 0),
(224, 22, 8, 1, 123, 0, 0),
(225, 23, 5, 1, 123, 0, 0),
(226, 24, 3, 1, 123, 0, 0),
(227, 41, 2, 1, 123, 0, 0),
(228, 43, 58, 1, 123, 0, 0),
(229, 44, 56, 1, 123, 0, 0),
(230, 47, 51, 1, 123, 0, 0),
(231, 1, 8, 1, 124, 0, 0),
(232, 21, 5, 1, 124, 0, 0),
(233, 22, 3, 1, 124, 0, 0),
(234, 23, 2, 1, 124, 0, 0),
(235, 41, 58, 1, 124, 0, 0),
(236, 42, 56, 1, 124, 0, 0),
(237, 43, 51, 1, 124, 0, 0),
(238, 44, 47, 1, 124, 0, 0),
(239, 1, 5, 1, 125, 0, 0),
(240, 8, 3, 1, 125, 0, 0),
(241, 21, 2, 1, 125, 0, 0),
(242, 23, 58, 1, 125, 0, 0),
(243, 24, 56, 1, 125, 0, 0),
(244, 41, 51, 1, 125, 0, 0),
(245, 42, 47, 1, 125, 0, 0),
(246, 43, 44, 1, 125, 0, 0),
(247, 1, 3, 1, 126, 0, 0),
(248, 5, 2, 1, 126, 0, 0),
(249, 21, 58, 1, 126, 0, 0),
(250, 22, 56, 1, 126, 0, 0),
(251, 23, 51, 1, 126, 0, 0),
(252, 24, 47, 1, 126, 0, 0),
(253, 41, 44, 1, 126, 0, 0),
(254, 42, 43, 1, 126, 0, 0),
(255, 1, 2, 1, 127, 0, 0),
(256, 5, 58, 1, 127, 0, 0),
(257, 8, 56, 1, 127, 0, 0),
(258, 21, 51, 1, 127, 0, 0),
(259, 22, 47, 1, 127, 0, 0),
(260, 23, 44, 1, 127, 0, 0),
(261, 24, 43, 1, 127, 0, 0),
(262, 41, 42, 1, 127, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `g1_tipo`
--

CREATE TABLE `g1_tipo` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `g1_tipo`
--

INSERT INTO `g1_tipo` (`id_tipo`, `nombre`) VALUES
(1, 'Liga'),
(2, 'Eliminatoria'),
(3, 'Mixta');

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
-- Volcado de datos para la tabla `g1_usuario`
--

INSERT INTO `g1_usuario` (`id_usuario`, `nombre`, `correo`, `clave`) VALUES
(1, 'tato', 'tato@lm.com', '202cb962ac59075b964b07152d234b70'),
(2, 'perico', 'perico@lm.com', '202cb962ac59075b964b07152d234b70'),
(3, 'perico2', 'perico2@lm.com', '202cb962ac59075b964b07152d234b70'),
(4, 'JOHAN CAMILO CARDENA', 'jcamilo@lm.com', '202cb962ac59075b964b07152d234b70');

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
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_tipo` (`id_tipo`);

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
  ADD PRIMARY KEY (`id_fecha`),
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
-- Indices de la tabla `g1_tipo`
--
ALTER TABLE `g1_tipo`
  ADD PRIMARY KEY (`id_tipo`);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `g1_campeonato`
--
ALTER TABLE `g1_campeonato`
  MODIFY `id_campeonato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `g1_equipo`
--
ALTER TABLE `g1_equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `g1_fase`
--
ALTER TABLE `g1_fase`
  MODIFY `id_fase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `g1_fecha`
--
ALTER TABLE `g1_fecha`
  MODIFY `id_fecha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT de la tabla `g1_liga`
--
ALTER TABLE `g1_liga`
  MODIFY `id_liga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `g1_partido`
--
ALTER TABLE `g1_partido`
  MODIFY `id_partido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT de la tabla `g1_tipo`
--
ALTER TABLE `g1_tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `g1_usuario`
--
ALTER TABLE `g1_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `g1_campeonato`
--
ALTER TABLE `g1_campeonato`
  ADD CONSTRAINT `g1_campeonato_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `g1_usuario` (`id_usuario`),
  ADD CONSTRAINT `g1_campeonato_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `g1_tipo` (`id_tipo`);

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

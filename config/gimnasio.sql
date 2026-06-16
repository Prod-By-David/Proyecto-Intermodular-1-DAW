-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2026 a las 11:03:06
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
-- Base de datos: `gimnasio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas_funcional`
--

CREATE TABLE `personas_funcional` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas_funcional`
--

INSERT INTO `personas_funcional` (`id`, `nombre`, `apellidos`, `telefono`) VALUES
(3, 'Laura', 'Blázquez', '654 32 12 43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas_hyrox`
--

CREATE TABLE `personas_hyrox` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas_hyrox`
--

INSERT INTO `personas_hyrox` (`id`, `nombre`, `apellidos`, `telefono`) VALUES
(1, 'Nuria', 'Cibeiro', '658 90 09 91');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas_pack`
--

CREATE TABLE `personas_pack` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas_pack`
--

INSERT INTO `personas_pack` (`id`, `nombre`, `apellidos`, `telefono`, `created_at`) VALUES
(3, 'Francisco', 'Del Hoyo Duarte', '669 69 69 69', '2026-05-21 14:26:58');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas_funcional`
--
ALTER TABLE `personas_funcional`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas_hyrox`
--
ALTER TABLE `personas_hyrox`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas_pack`
--
ALTER TABLE `personas_pack`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personas_funcional`
--
ALTER TABLE `personas_funcional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personas_hyrox`
--
ALTER TABLE `personas_hyrox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personas_pack`
--
ALTER TABLE `personas_pack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

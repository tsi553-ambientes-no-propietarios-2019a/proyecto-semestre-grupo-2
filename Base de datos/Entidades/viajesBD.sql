-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-07-2019 a las 01:27:41
-- Versión del servidor: 5.7.26-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `viajesBD`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bus`
--

CREATE TABLE `bus` (
  `id` int(11) NOT NULL,
  `num_bus_id` int(11) NOT NULL,
  `id_place_id` int(11) NOT NULL,
  `id_enterprise` int(11) NOT NULL,
  `driver_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat_num` int(11) NOT NULL,
  `bus_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `has`
--

CREATE TABLE `has` (
  `id` int(11) NOT NULL,
  `id_buy` int(11) NOT NULL,
  `seat_num` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190706051328', '2019-07-06 05:13:50'),
('20190706051815', '2019-07-06 05:18:26'),
('20190706052335', '2019-07-06 05:23:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `weather_con`
--

CREATE TABLE `weather_con` (
  `id` int(11) NOT NULL,
  `idcon` int(11) NOT NULL,
  `id_place` int(11) NOT NULL,
  `temperature` double NOT NULL,
  `preasure` double NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_2F566B695D7D4E8C` (`id_place_id`),
  ADD KEY `IDX_2F566B699C6724A5` (`num_bus_id`);

--
-- Indices de la tabla `has`
--
ALTER TABLE `has`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seat_num` (`seat_num`);

--
-- Indices de la tabla `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `weather_con`
--
ALTER TABLE `weather_con`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `has`
--
ALTER TABLE `has`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `weather_con`
--
ALTER TABLE `weather_con`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `FK_2F566B695D7D4E8C` FOREIGN KEY (`id_place_id`) REFERENCES `weather_con` (`id`),
  ADD CONSTRAINT `FK_2F566B699C6724A5` FOREIGN KEY (`num_bus_id`) REFERENCES `weather_con` (`id`);

--
-- Filtros para la tabla `has`
--
ALTER TABLE `has`
  ADD CONSTRAINT `has_ibfk_1` FOREIGN KEY (`seat_num`) REFERENCES `bus` (`num_bus_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

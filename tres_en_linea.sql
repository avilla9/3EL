-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-08-2020 a las 09:52:17
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tres_en_linea`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `name`, `password`) VALUES
(1, 'armandojvilla9@gmail.com', 'FZhGU6pLLzDkvV5'),
(2, 'xample@villamail.com', 'SBKHSkabsKJ'),
(3, 'a@b.c', '1234124'),
(7, 'A@B.SA', '1213214DF'),
(8, 'ASA@B.SA', '1213214DF');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `against` varchar(60) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `winner` varchar(60) DEFAULT NULL,
  `scores` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `scores`
--

INSERT INTO `scores` (`id`, `against`, `created_at`, `winner`, `scores`) VALUES
(1, 'friend', '2020-08-14 00:33:37', '(X) Player 1', NULL),
(2, 'computer', '2020-08-14 01:25:02', '(0) Computer', NULL),
(3, 'computer', '2020-08-14 01:25:06', '(0) Computer', NULL),
(4, 'computer', '2020-08-14 01:25:08', '(X) Player 1', NULL),
(5, 'friend', '2020-08-14 02:00:36', 'TABLAS', NULL),
(6, 'friend', '2020-08-14 02:01:11', '(X) Player 1', NULL),
(7, 'friend', '2020-08-14 02:01:18', '(X) Player 1', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

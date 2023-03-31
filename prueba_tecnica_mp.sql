-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-03-2023 a las 08:00:49
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
-- Base de datos: `prueba_tecnica_mp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL,
  `cargo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `cargo`) VALUES
(4, 'vendedor'),
(5, 'supervisor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empelados`
--

CREATE TABLE `empelados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` int(50) NOT NULL,
  `venta` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fk_id_cargo` int(11) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empelados`
--

INSERT INTO `empelados` (`id`, `nombre`, `correo`, `telefono`, `venta`, `fecha`, `fk_id_cargo`, `direccion`) VALUES
(1, 'pepito perez', 'pepito@gmail.com', 123456789, 100000, '2023-03-31 05:28:41', 4, NULL),
(2, 'zultanejo', 'zultanejo@gmail.com', 2147483647, 45000, '2023-03-31 03:48:22', 4, NULL),
(8, 'walter', 'walter@gmail.com', 2147483647, 20000, '2023-03-31 03:44:32', 4, NULL),
(9, 'adriano', 'adriano@gmail.com', 2147483647, 20000, '2023-03-31 04:51:51', 4, 'carrer unica calle busquela'),
(10, 'zorton', 'zorton@gmail.com', 2147483647, 0, '2023-03-31 04:54:36', 5, 'carrer unica calle busquela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` int(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `correo`, `telefono`, `password`, `fecha`) VALUES
(3, 'prueba2', 'prueba@correo.com', 5557896, '827ccb0eea8a706c4c34a16891f84e7b', '2023-03-30 20:27:16'),
(4, 'manuel', 'mfposso0911@gmail.com', 2147483647, '827ccb0eea8a706c4c34a16891f84e7b', '2023-03-31 04:45:39'),
(7, 'sergio', 'sergio@gmail.com', 2147483647, '81dc9bdb52d04dc20036dbd8313ed055', '2023-03-30 20:18:21'),
(8, 'Kaka', '', 2147483647, '4a7d1ed414474e4033ac29ccb8653d9b', '2023-03-31 05:25:18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `empelados`
--
ALTER TABLE `empelados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_cargo` (`fk_id_cargo`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `empelados`
--
ALTER TABLE `empelados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empelados`
--
ALTER TABLE `empelados`
  ADD CONSTRAINT `fk_id_cargo` FOREIGN KEY (`fk_id_cargo`) REFERENCES `cargos` (`id_cargo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

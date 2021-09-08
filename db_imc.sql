-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2021 a las 03:10:33
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_imc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_clasificacion`
--

CREATE TABLE `tb_clasificacion` (
  `id` int(11) NOT NULL,
  `valor_imc` varchar(25) DEFAULT NULL,
  `clasificacion` varchar(25) DEFAULT NULL,
  `descripcion` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_clasificacion`
--

INSERT INTO `tb_clasificacion` (`id`, `valor_imc`, `clasificacion`, `descripcion`) VALUES
(1, '< 18.5', 'Bajo peso', 'Delgado'),
(2, '18.5 - 24.9', 'Adecuado', 'Aceptable'),
(3, '25.0 - 29.9', 'Sobrepeso', 'Sobrepeso'),
(4, '30.0 - 34.9', 'Obesidad grado 1', 'Obesidad'),
(5, '35.0 - 39.9', 'Obesidad grado 2', 'Obesidad'),
(6, '> 40', 'Obesidad grado 3', 'Obesidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_masacorporal`
--

CREATE TABLE `tb_masacorporal` (
  `id` int(11) NOT NULL,
  `peso` double NOT NULL,
  `altura` double NOT NULL,
  `imc` double NOT NULL,
  `fecha` date NOT NULL,
  `clasificacion_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_clasificacion`
--
ALTER TABLE `tb_clasificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_masacorporal`
--
ALTER TABLE `tb_masacorporal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk_masa_clasificacion` (`clasificacion_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_clasificacion`
--
ALTER TABLE `tb_clasificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tb_masacorporal`
--
ALTER TABLE `tb_masacorporal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_masacorporal`
--
ALTER TABLE `tb_masacorporal`
  ADD CONSTRAINT `pk_masa_clasificacion` FOREIGN KEY (`clasificacion_id`) REFERENCES `tb_clasificacion` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

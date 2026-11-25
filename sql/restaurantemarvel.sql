-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2026 a las 20:50:09
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurantemarvel`
--
DROP DATABASE IF EXISTS `restaurantemarvel`;
CREATE DATABASE IF NOT EXISTS `restaurantemarvel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `restaurantemarvel`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cocina`
--

CREATE TABLE `cocina` (
  `codzona` int(11) NOT NULL,
  `zona` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cocina`
--

INSERT INTO `cocina` (`codzona`, `zona`) VALUES
(1, 'Bebidas'),
(2, 'Entrantes'),
(3, 'Principal'),
(4, 'Postre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `codMesa` int(11) NOT NULL,
  `ocupada` int(11) NOT NULL DEFAULT 0,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `comensales` int(11) NOT NULL,
  `zona` varchar(255) NOT NULL,
  `dueño` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `mesa`
--

INSERT INTO `mesa` (`codMesa`, `ocupada`, `nombre`, `descripcion`, `comensales`, `zona`, `dueño`) VALUES
(1, 0, 'Torre Stark', 'Mesa panorámica junto a la vitrina de armaduras Mark I–VII con iluminación reactor.', 4, 'Sector central', NULL),
(2, 1, 'Asgard', 'Mesa rústica de madera tallada presidida por una réplica del Mjölnir iluminada.', 2, 'Zona norte', '112233445J'),
(3, 0, 'Wakanda', 'Reservado semi-privado con acabados en negro mate y destellos púrpura de Vibranium.', 4, 'Zona VIP', NULL),
(4, 0, 'Sanctum', 'Rincón místico bajo la vidriera del Sanctum Sanctorum, ideal para grupos tranquilos.', 4, 'Zona Oeste', NULL),
(5, 0, 'Helicarrier', 'Mesa imperial de mando diseñada para escuadrones completos y celebraciones de equipo.', 6, 'Puente de Mando', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prodronda`
--

CREATE TABLE `prodronda` (
  `ronda` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `servido` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `prodronda`
--

INSERT INTO `prodronda` (`ronda`, `producto`, `cantidad`, `servido`) VALUES
(20, 8, 3, 0),
(21, 8, 3, 0),
(22, 4, 2, 0),
(22, 8, 5, 0),
(22, 9, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codProducto` int(11) NOT NULL,
  `precio` double NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `nombre` varchar(255) NOT NULL,
  `cat` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `descprod` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codProducto`, `precio`, `stock`, `nombre`, `cat`, `tag`, `descprod`) VALUES
(4, 14.5, 28, 'Hamburguesa Reactor Arc', 3, 'golden', 'Doble carne de ternera madurada, queso cheddar fundido, bacon crujiente, cebolla caramelizada y salsa secreta Stark en pan brioche negro.'),
(5, 12, 100, 'Shawarma Batalla de NY', 3, 'red', 'Pan pita artesanal relleno de pollo especiado al estilo tradicional, vegetales frescos, salsa de yogur con ajo y toque picante.'),
(6, 18.9, 0, 'Costillas Gamma XL', 3, 'green', 'Costillar de cerdo asado a baja temperatura durante 8 horas, glaseado con barbacoa ahumada y acompañado de patatas rústicas.'),
(7, 11.5, 80, 'Chimichangas del Mercenario', 3, 'red', 'Dos tortillas de trigo crujientes rellenas de ternera desmechada, frijoles negros, queso fundido, guacamole y pico de gallo.'),
(8, 6.5, 119, 'Elixir del Trueno', 1, 'cyan', 'Bebida refrescante sin alcohol de frutos azules, lima, menta fresca y tónica con destellos cítricos servida en jarra helada.'),
(9, 7.5, 36, 'Mousse de Vibranium', 4, 'purple', 'Mousse intenso de chocolate negro 70% con corazón de arándanos silvestres de Wakanda y crujiente de galleta de cacao.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ronda`
--

CREATE TABLE `ronda` (
  `codigoRonda` int(11) NOT NULL,
  `codigoCuenta` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `mesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ronda`
--

INSERT INTO `ronda` (`codigoRonda`, `codigoCuenta`, `fecha`, `cliente`, `mesa`) VALUES
(19, 'C112233445J', '2026-11-25', '112233445J', 2),
(20, 'C112233445J', '2026-11-25', '112233445J', 2),
(21, 'C112233445J', '2026-11-25', '112233445J', 2),
(22, 'C112233445J', '2026-11-25', '112233445J', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `dni` varchar(255) NOT NULL,
  `contra` varchar(255) NOT NULL,
  `baneado` int(11) NOT NULL DEFAULT 0,
  `rol` int(11) NOT NULL DEFAULT 0,
  `email` varchar(500) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `contra`, `baneado`, `rol`, `email`, `nombre`, `apellidos`) VALUES
('112233445J', '27062006', 0, 0, 'deadpool@gmail.com', 'deadpool', 'dead pool'),
('2277991M', 'admin', 0, 2, 'admin@gmail.com', 's0r4x', 'mart'),
('44444444B', '44444444', 0, 0, 'victordoom@gmail.com', 'Victor', 'doom'),
('445533221N', '12345678', 0, 1, 'wanda@gmail.com', 'wanda', 'maximoff'),
('556677889H', '12345678', 1, 0, 'vision@gmail.com', 'vision', 'stark'),
('778855339S', '00000000', 0, 1, 'stark@gmail.com', 'tony', 'stark');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cocina`
--
ALTER TABLE `cocina`
  ADD PRIMARY KEY (`codzona`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`codMesa`),
  ADD KEY `dueño` (`dueño`);

--
-- Indices de la tabla `prodronda`
--
ALTER TABLE `prodronda`
  ADD PRIMARY KEY (`ronda`,`producto`),
  ADD KEY `ronda` (`ronda`,`producto`),
  ADD KEY `producto` (`producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codProducto`),
  ADD KEY `cat` (`cat`);

--
-- Indices de la tabla `ronda`
--
ALTER TABLE `ronda`
  ADD PRIMARY KEY (`codigoRonda`,`codigoCuenta`),
  ADD KEY `cliente` (`cliente`,`mesa`),
  ADD KEY `mesa` (`mesa`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cocina`
--
ALTER TABLE `cocina`
  MODIFY `codzona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mesa`
--
ALTER TABLE `mesa`
  MODIFY `codMesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `codProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `ronda`
--
ALTER TABLE `ronda`
  MODIFY `codigoRonda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD CONSTRAINT `mesa_ibfk_1` FOREIGN KEY (`dueño`) REFERENCES `usuario` (`dni`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `prodronda`
--
ALTER TABLE `prodronda`
  ADD CONSTRAINT `prodronda_ibfk_1` FOREIGN KEY (`ronda`) REFERENCES `ronda` (`codigoRonda`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prodronda_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `producto` (`codProducto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`cat`) REFERENCES `cocina` (`codzona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ronda`
--
ALTER TABLE `ronda`
  ADD CONSTRAINT `ronda_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `usuario` (`dni`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ronda_ibfk_2` FOREIGN KEY (`mesa`) REFERENCES `mesa` (`codMesa`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

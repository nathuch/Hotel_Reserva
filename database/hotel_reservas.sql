-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2025 a las 21:07:22
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotel_reservas`
--
CREATE DATABASE IF NOT EXISTS `hotel_reservas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hotel_reservas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `id_reservation` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `id_payments_method` int(11) DEFAULT NULL,
  `id_status_payment` int(11) DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_method`
--

DROP TABLE IF EXISTS `payment_method`;
CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_room` int(11) DEFAULT NULL,
  `date_reservation` date DEFAULT NULL,
  `checkin` date DEFAULT NULL,
  `checkout` date DEFAULT NULL,
  `id_status_reservation` int(11) DEFAULT 1,
  `pay` decimal(10,2) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modify_users_sesion` varchar(255) DEFAULT NULL,
  `specialrequest` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservation`
--

INSERT DELAYED IGNORE INTO `reservation` (`id`, `id_user`, `id_room`, `date_reservation`, `checkin`, `checkout`, `id_status_reservation`, `pay`, `create_at`, `update_at`, `modify_users_sesion`, `specialrequest`) VALUES
(2, 6, 11, NULL, '2025-10-13', '2025-10-15', 1, 1.00, '2025-10-13 16:57:50', '2025-10-15 20:13:40', NULL, 'jinnnh'),
(3, 7, 11, NULL, '2025-10-15', '2025-10-17', 1, 40000.00, '2025-10-15 16:18:01', '2025-10-15 20:13:57', NULL, 'hinnj'),
(4, 7, 11, NULL, '2025-10-15', '2025-10-17', 1, 500000.00, '2025-10-15 19:11:52', '2025-10-15 20:14:14', NULL, 'hhkhkjhkj'),
(5, 7, 11, NULL, '2025-10-15', '2025-10-17', 1, 500000.00, '2025-10-15 19:15:22', '2025-10-15 20:14:29', NULL, 'hhkhkjhkj'),
(6, 8, 11, NULL, '2025-10-19', '2025-10-25', 3, 50000.00, '2025-10-19 17:26:27', '2025-10-19 21:46:17', NULL, 'rtyrtyrt'),
(7, 8, 12, NULL, '2025-10-19', '2025-10-23', 3, 200000.00, '2025-10-19 22:09:33', '2025-10-19 22:09:58', NULL, 'condones  y lubricante'),
(8, 9, 11, NULL, '2025-10-31', '2025-11-01', 3, 12121.00, '2025-10-29 21:00:29', '2025-10-29 23:47:34', NULL, 'doble almohada'),
(9, 9, 11, NULL, '2025-11-01', '2025-11-09', 1, 545466.00, '2025-10-29 21:23:07', '2025-10-29 21:23:07', NULL, 'ninguna'),
(10, 9, 14, NULL, '2025-10-31', '2025-11-01', 1, 1000000.00, '2025-10-29 23:46:46', '2025-10-29 23:46:46', NULL, 'bebidas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `id_status_room` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `max_persons` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `room`
--

INSERT DELAYED IGNORE INTO `room` (`id`, `descripcion`, `id_status_room`, `price`, `name`, `max_persons`) VALUES
(11, 'Habitación sencilla con cama individual, escritorio y baño privado', 3, 120000.00, 'Individual', 1),
(12, 'Habitación doble con dos camas y vista a la ciudad, incluye TV y aire acondicionado', 3, 200000.00, 'Doble', 2),
(13, 'Suite con cama king, sala pequeña, minibar y balcón', 3, 450000.00, 'Suite', 2),
(14, 'Habitación familiar con una cama doble y una litera, ideal para 3 personas', 3, 280000.00, 'Familiar', 4),
(15, 'Habitación económica, baño compartido, zona céntrica', 3, 80000.00, 'Económica', 1),
(16, 'Habitación para personas con movilidad reducida, acceso sin barreras y baño adaptado', 1, 150000.00, 'Accesible', 2),
(17, 'Penthouse con terraza privada y cocina pequeña, vistas panorámicas', 3, 600000.00, 'Penthouse', 4),
(18, 'Habitación triple con 3 camas individuales y escritorio amplio', 5, 250000.00, 'Triple', 3),
(19, 'Sala de conferencias pequeña, mesa para 10 personas y proyector', 3, 400000.00, 'Conferencia', 10),
(20, 'Suite presidencial con jacuzzi, sala de estar y servicio premium', 3, 900000.00, 'Presidencial', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_payment`
--

DROP TABLE IF EXISTS `status_payment`;
CREATE TABLE `status_payment` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_reservation`
--

DROP TABLE IF EXISTS `status_reservation`;
CREATE TABLE `status_reservation` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `status_reservation`
--

INSERT DELAYED IGNORE INTO `status_reservation` (`id`, `name`) VALUES
(1, 'Pendiente'),
(2, 'Confirmada'),
(3, 'Cancelada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_room`
--

DROP TABLE IF EXISTS `status_room`;
CREATE TABLE `status_room` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `status_room`
--

INSERT DELAYED IGNORE INTO `status_room` (`id`, `name`) VALUES
(1, 'Ocupada'),
(2, 'Reservada'),
(3, 'Disponible'),
(4, 'Mantenimiento'),
(5, 'Fuera de Servicio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_document`
--

DROP TABLE IF EXISTS `type_document`;
CREATE TABLE `type_document` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `type_document`
--

INSERT DELAYED IGNORE INTO `type_document` (`id`, `nombre`) VALUES
(1, 'cedula'),
(2, 'pasaporte'),
(3, 'numero de extranjeria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `num_document` varchar(50) NOT NULL,
  `id_type_document` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `password` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT DELAYED IGNORE INTO `users` (`id`, `num_document`, `id_type_document`, `nombre`, `apellido`, `telefono`, `correo`, `id_rol`, `status`, `password`, `create_at`, `update_at`) VALUES
(3, '1110601936', 1, 'Natalia Lorena', 'Gutierrez Bernate', '3006723144', 'ngutierrezbernate@gmail.com', NULL, 1, '$2y$10$5fFuUsQtpXtk0jW0h1Caa.d2HMLaSSiBBWHmsm5zRuDCLr3NqWW0y', '2025-10-02 21:39:15', '2025-10-02 21:39:15'),
(4, '1213132132', 2, 'Jose', 'Alrgemiro', '3005638921', 'correo@gmail.com', NULL, 1, '$2y$10$RkIo7FS2fBHND4iLPE1MWOkyBoofX6eeN4znsh74H2y4KVqAJFvOy', '2025-10-02 21:47:48', '2025-10-02 21:47:48'),
(5, '65758255', 1, 'Curso', 'Loco', '666554558', 'loco@correo.com', NULL, 1, '$2y$10$5r9aX6QLjD7UgPvVWL11u.jvgtyXYirKSLkF/DB9aznyfHEzXHbIK', '2025-10-05 18:25:16', '2025-10-05 18:25:16'),
(6, '1110601936', 1, 'Natalia Lorena', 'Gutierrez Bernate', '3006723144', 'ngutierrez@gmail.com', NULL, 1, '$2y$10$UQyZPlcE6lX759T7EF7PP.dgxupA2DsGB.wHy8EjPxmg2yyamPwc6', '2025-10-12 23:53:57', '2025-10-12 23:53:57'),
(7, '1110601936', 1, 'William ', 'Duarte', '3138286838', 'william.duarte@gmail.com', NULL, 1, '$2y$10$tdgV/kvqMwUdVwcUReZ0NOo/m58LCtQMAkXHCCMEvAsxp6UkFOGBe', '2025-10-15 16:16:49', '2025-10-15 16:16:49'),
(8, '1110601936', 1, 'Natalia Lorena', 'Gutierrez Bernate', '3006723144', 'ngutierrex@gmail.com', NULL, 1, '$2y$10$x.pOJkPT.Gq9HYWv5I78res875pjScUgtmNRdNw1xkFTSOTo2kCDW', '2025-10-19 17:25:22', '2025-10-19 17:25:22'),
(9, '1212121212', 1, 'mario', 'Gutierrez Bernate', '3006723144', 'mario@gmail.com', NULL, 1, '$2y$10$P6qBcHChgGX2WyqkYELO.OwSP9dl5eSV7BFZvNVTTMjje01QkWzEK', '2025-10-29 20:59:40', '2025-10-29 20:59:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reservation` (`id_reservation`),
  ADD KEY `id_payments_method` (`id_payments_method`),
  ADD KEY `id_status_payment` (`id_status_payment`);

--
-- Indices de la tabla `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_room` (`id_room`),
  ADD KEY `id_status_reservation` (`id_status_reservation`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_status_room` (`id_status_room`);

--
-- Indices de la tabla `status_payment`
--
ALTER TABLE `status_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status_reservation`
--
ALTER TABLE `status_reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status_room`
--
ALTER TABLE `status_room`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `type_document`
--
ALTER TABLE `type_document`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `id_type_document` (`id_type_document`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `status_payment`
--
ALTER TABLE `status_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `status_reservation`
--
ALTER TABLE `status_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `status_room`
--
ALTER TABLE `status_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `type_document`
--
ALTER TABLE `type_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`id_reservation`) REFERENCES `reservation` (`id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`id_payments_method`) REFERENCES `payment_method` (`id`),
  ADD CONSTRAINT `payments_ibfk_3` FOREIGN KEY (`id_status_payment`) REFERENCES `status_payment` (`id`);

--
-- Filtros para la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_room`) REFERENCES `room` (`id`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`id_status_reservation`) REFERENCES `status_reservation` (`id`);

--
-- Filtros para la tabla `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`id_status_room`) REFERENCES `status_room` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_type_document`) REFERENCES `type_document` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

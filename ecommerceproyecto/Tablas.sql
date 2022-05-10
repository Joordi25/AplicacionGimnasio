-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-01-2022 a las 19:17:30
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10


CREATE DATABASE demo;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `demo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `photo`) VALUES
(1, 'PALA BULLPADEL VERTEX', 150, '..\\images/ataque.png'),
(2, 'PALA BULLPADEL VERTEX DEFENSA', 200, '..\\images/defensa.png'),
(3, 'PALA BULLPADEL HACK', 250, '..\\images/equilibrado.png'),
(4, 'PALA BULLPADEL AVANT', 98, '..\\images/outlet1.png'),
(5, 'PALA BULLPADEL KITTER DEFENSA', 120.99, '..\\images/outlet2.png'),
(6, 'PALA BULLPADEL KITTER EQUILIBRADO', 109.99, '..\\images/outlet3.png'),
(7, 'PALA BLACKCROWN PITON', 130, '..\\images/blackcrown.png'),
(8, 'PALA BLACK CROWN HURRICANE 2022', 160, '..\\images/blackcrown2.png'),
(9, 'PALA ADIDAS METALBONE LITE', 185, '..\\images/adidas1.png'),
(10, 'PALA BABOLAT STORM', 64, '..\\images/babolat.png'),
(11, 'PALA ROYAL PADEL CROSS', 158, '..\\images/royal.png'),
(12, 'PALA ADIDAS METALBONE CTRL', 320, '..\\images/adidas2.png'),
(13, 'PALA STAR VIE METHEORA WARRIOR', 320, '..\\images/star.png'),
(14, 'PALA DUNLOP AERO-STAR', 172, '..\\images/dunlop.png'),
(15, 'PALA HEAD CHALLENGE', 99, '..\\images/head.png'),
(16, 'PALA STAR VIE DRONOS GALAXY', 225, '..\\images/star2.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `Correo` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `num_tlf` int(9) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `cod_postal` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `Correo`, `foto`, `direccion`, `nombre`, `apellidos`, `num_tlf`, `pais`, `cod_postal`) VALUES
(1, 'admin', '$2y$10$vd7.He4yGsdKqZd6sF2Tj.QbcToyU5ggBB8b98a6WoMhhDe4YZhhu', '2022-03-02 16:26:11', 'admin@admin.com', 'images/perfil/perfil_defecto.jpg', 'direccion', 'nombre', 'apellidos', 999999999, 'España', 12345),
(2, 'Joordi25', '$2y$10$b2kFGZbuIbpq0YzygTyFROe4kvZmCbOyzcw90koO61SKeU/BXRF5W', '2022-02-09 21:44:51', 'jordibraso9900@gmail.com', 'images/perfil/dbaf605aa7cff18c17a4521985d24368.jpg', 'Ricard Casademont', 'Jordi', 'Braso', 680195669, 'España', 17240);



--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

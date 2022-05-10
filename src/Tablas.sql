-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-01-2022 a las 19:17:30
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10


CREATE DATABASE zeus;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zeus`
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
(2, 'PALA BULLPADEL VERTEX DEFENSA', 200, '..\\images/defensa.png');


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
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `Correo`, `foto`, `direccion`, `nombre`, `apellidos`, `num_tlf`, `pais`, `fecha`) VALUES
(1, 'admin', '$2y$10$vd7.He4yGsdKqZd6sF2Tj.QbcToyU5ggBB8b98a6WoMhhDe4YZhhu', '2022-03-02 16:26:11', 'admin@admin.com', 'images/perfil/perfil_defecto.jpg', 'direccion', 'nombre', 'apellidos', 999999999, 'España', '01/01/2000'),
(2, 'test', '$2y$10$VAY9KzCZe97x6UzbIDKHCuGN5MDTI.6LAmPVkabRkTkaMlFfw3qQC', '2022-05-10 18:26:21', 'test@test.com', '../images/perfil/perfil_defecto.jpg', 'direccion', 'test', 'test', 0, 'España', '2022-05-20');



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

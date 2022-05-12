-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2022 a las 18:30:17
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

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
(19, 'Jordi Braso', 21, 'productos/0592f570e84d85a53b253e4cc5f881bc.jpg'),
(20, 'hola', 123, 'productos/1d94b4369d7fc7342317f20f7b561c11.png'),
(22, 'barras', 1400, 'productos/8c8066498aa756ffcbb5846be2c9b401.jpg'),
(23, 'pollitas', 123, 'productos/2224fcc93495b9546c92514fa7261edb.png'),
(25, 'hola', 555, 'productos/b7ca8cceed119f65f2d9efaf85436fb1.png'),
(26, 'filipinos', 10, 'productos/2b04f2dc3dc4cb8bba6806866c54d04f.jpg'),
(27, 'prueba', 200, 'productos/bf7b5b729001ab1a6e55998cd7870829.png');

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

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `Correo`, `foto`, `direccion`, `nombre`, `apellidos`, `num_tlf`, `pais`, `fecha`) VALUES
(1, 'admin', '$2y$10$vd7.He4yGsdKqZd6sF2Tj.QbcToyU5ggBB8b98a6WoMhhDe4YZhhu', '2022-03-02 16:26:11', 'admin@admin.com', '../images/perfil/perfil_defecto.jpg', 'Califo', 'Jordi', 'Braso', 680195669, 'España', '0000-00-00'),
(26, 'sergicastin', '$2y$10$D/KQNFsqYMnbzai7YF5nWOnNle8BhkJ6W35kout7Lbx14ojOc85n2', '2022-05-10 16:20:24', 'sergicastin@monlau.com', '../src/images/perfil/perfil_defecto.jpg', 'direccion', 'Sergi', 'Castillo Tiñena', 653818127, 'España', '2022-05-12'),
(27, 'ivanmarbae', '$2y$10$7UOelwVFNxYSAL63zizEZeSUtjbjVw.3yQVD8s0CrFbGG68.6qddq', '2022-05-10 16:23:33', 'ivanmarbae@campus.monlau.com', '..\\src/images/perfil/perfil_defecto.jpg', 'direccion', 'Iván', 'Martínez', 608346098, 'España', '2001-04-19'),
(28, 'Joordi25', '$2y$10$HQRHge0GOqVAannTqfHkBOJvZMS2Yh.YrWhQLVtVdmq2iJMWL7P76', '2022-05-10 17:04:51', 'jordi@jordi.com', '../images/perfil/650291e0c16aa2d547cbb8f19ac7faff.png', 'Ricard Casademont', 'Jordi', 'Braso', 680195669, 'España', '2022-05-06'),
(29, 'test', '$2y$10$VAY9KzCZe97x6UzbIDKHCuGN5MDTI.6LAmPVkabRkTkaMlFfw3qQC', '2022-05-10 18:26:21', 'test@test.com', '../images/perfil/perfil_defecto.jpg', 'España', 'test', 'test', 642145236, 'España', '2022-05-20'),
(30, 'ivanaramar', '$2y$10$ihFNq1hWbB1FTvBD0EgfhetqOLBp.qZhUwbQrA2nmpntJjGHA2Mt.', '2022-05-10 18:56:25', 'ivanaramar@campus.monlau.com', '../images/perfil/perfil_defecto.jpg', 'direccion', 'Ivan', 'Aranda', 123456789, 'España', '2000-08-11');

--
-- Índices para tablas volcadas
--

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2022 a las 18:38:33
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
-- Estructura de tabla para la tabla `boats`
--

CREATE TABLE `boats` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(35) NOT NULL,
  `b_cpcty` varchar(35) NOT NULL,
  `b_on` varchar(35) NOT NULL,
  `b_img` varchar(255) NOT NULL,
  `b_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `boats`
--

INSERT INTO `boats` (`b_id`, `b_name`, `b_cpcty`, `b_on`, `b_img`, `b_price`) VALUES
(86, 'Zumba', '15 Persons', 'Ivan', '../class_image/image_2022-05-18-19-19-56_62852abc9fa3c.jpg', 40);

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
(63, 'prueba', 200, 'productos/b63577b543330978e337c8c8ea53e245.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservation`
--

CREATE TABLE `reservation` (
  `r_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `r_dstntn` varchar(35) NOT NULL,
  `r_date` varchar(35) NOT NULL,
  `r_hr` varchar(35) NOT NULL,
  `r_ampm` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservation`
--

INSERT INTO `reservation` (`r_id`, `b_id`, `tour_id`, `r_dstntn`, `r_date`, `r_hr`, `r_ampm`) VALUES
(5, 86, 4, 'gg', '2022-05-19', '7', 'AM'),
(6, 86, 4, 'dd', '2022-05-19', '1', 'AM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tourist`
--

CREATE TABLE `tourist` (
  `tour_id` int(11) NOT NULL,
  `tour_fN` varchar(50) NOT NULL,
  `tour_mN` varchar(50) NOT NULL,
  `tour_lN` varchar(50) NOT NULL,
  `tour_address` varchar(255) NOT NULL,
  `tour_contact` varchar(15) NOT NULL,
  `tour_un` varchar(50) NOT NULL,
  `tour_up` varchar(256) NOT NULL,
  `user_type` varchar(1) NOT NULL,
  `Correo` varchar(256) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tourist`
--

INSERT INTO `tourist` (`tour_id`, `tour_fN`, `tour_mN`, `tour_lN`, `tour_address`, `tour_contact`, `tour_un`, `tour_up`, `user_type`, `Correo`, `fecha`) VALUES
(2, '', '', '', '', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '', '0000-00-00'),
(4, 'Jordi', 'Braso Lafuentes', 'Braso', 'Ricard Casademont, 42', '680195669', 'Joordi25', '827ccb0eea8a706c4c34a16891f84e7b', '2', '', '0000-00-00'),
(20, 'a', 'a', 'a', 'direccion', '680195669', 'a', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2', '', '0000-00-00'),
(21, 'Sergi', 'Castillo', 'Castillo', 'direccion', '123456789', 'Sergi', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2', '', '0000-00-00');

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
(28, 'Joordi25', '$2y$10$jeAcljWtDUwuMveUISDRDui1TDJlROvs8kIiC003YOXTU0QIWgb76', '2022-05-10 17:04:51', 'jordi@jordi.com', '../images/perfil/650291e0c16aa2d547cbb8f19ac7faff.png', 'Ricard Casademont, 42', 'Jordisss', 'Braso Lafuentes', 680195669, 'España', '2022-05-06'),
(29, 'test', '$2y$10$VAY9KzCZe97x6UzbIDKHCuGN5MDTI.6LAmPVkabRkTkaMlFfw3qQC', '2022-05-10 18:26:21', 'test@test.com', '../images/perfil/perfil_defecto.jpg', 'España', 'test', 'test', 642145236, 'España', '2022-05-20'),
(50, 'a', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2022-05-19 18:33:07', 'angel@angel.com', '../images/perfil/perfil_defecto.jpg', 'direccion', 'a', 'a', 680195669, 'España', '2022-05-13'),
(51, 'Sergi', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2022-05-19 18:33:44', 'sergi@sergi.com', '../images/perfil/perfil_defecto.jpg', 'direccion', 'Sergi', 'Castillo', 123456789, 'España', '2022-05-07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boats`
--
ALTER TABLE `boats`
  ADD PRIMARY KEY (`b_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `tour_id` (`tour_id`);

--
-- Indices de la tabla `tourist`
--
ALTER TABLE `tourist`
  ADD PRIMARY KEY (`tour_id`);

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
-- AUTO_INCREMENT de la tabla `boats`
--
ALTER TABLE `boats`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=460;

--
-- AUTO_INCREMENT de la tabla `reservation`
--
ALTER TABLE `reservation`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tourist`
--
ALTER TABLE `tourist`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `boats` (`b_id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`tour_id`) REFERENCES `tourist` (`tour_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

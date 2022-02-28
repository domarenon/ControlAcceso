-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-08-2021 a las 18:27:46
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `personal_jabali`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jabali_moves`
--

CREATE TABLE `jabali_moves` (
  `id_move` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `st_grade` varchar(8) NOT NULL,
  `st_name` varchar(50) NOT NULL,
  `st_code` varchar(12) NOT NULL,
  `st_unit` varchar(10) NOT NULL,
  `st_dependency` varchar(10) NOT NULL,
  `st_move` varchar(5) NOT NULL,
  `dt_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jabali_users`
--

CREATE TABLE `jabali_users` (
  `id_user` int(11) NOT NULL,
  `st_grade` varchar(8) NOT NULL,
  `st_name` varchar(50) NOT NULL,
  `st_code` varchar(12) NOT NULL,
  `st_mail` varchar(50) NOT NULL,
  `st_phone` varchar(15) NOT NULL,
  `st_unit` varchar(10) NOT NULL,
  `st_dependency` varchar(10) NOT NULL,
  `im_profilepic` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `jabali_moves`
--
ALTER TABLE `jabali_moves`
  ADD PRIMARY KEY (`id_move`);

--
-- Indices de la tabla `jabali_users`
--
ALTER TABLE `jabali_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `jabali_moves`
--
ALTER TABLE `jabali_moves`
  MODIFY `id_move` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1858;

--
-- AUTO_INCREMENT de la tabla `jabali_users`
--
ALTER TABLE `jabali_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

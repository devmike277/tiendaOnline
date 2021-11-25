-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-06-2019 a las 14:20:26
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectoPHPMiguel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PRODUCTOS`
--

CREATE TABLE `PRODUCTOS` (
  `id` int(100) NOT NULL,
  `nombre_producto` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_producto` text COLLATE utf8_spanish_ci,
  `precio` float NOT NULL,
  `imagen` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `valoracion` int(11) DEFAULT '0',
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `stock` int(11) NOT NULL DEFAULT '30'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `PRODUCTOS`
--

INSERT INTO `PRODUCTOS` (`id`, `nombre_producto`, `descripcion_producto`, `precio`, `imagen`, `valoracion`, `fecha_registro`, `stock`) VALUES
(16, 'Cilindro de entrenamiento BKS', 'Cilindro de serreta con alojamientos fresados para la practica de aperturas', 39.9, 'cilindrodeentrenamiento.jpg', 10, '2019-06-08 18:22:43', 70),
(21, 'Kit multipick', 'Juego de ganzuas para cilindros multipunto', 89.94, 'multipick.jpeg', 0, '2019-06-10 02:56:32', 30),
(25, 'Kit sparrows', 'Kit de ganzuas para serreta sparrows', 75, 'sparrows.jpeg', 0, '2019-06-10 02:56:18', 30),
(31, 'Kit peterson', 'Juego de ganzuas de la marca peterson', 74.99, 'peterson.jpeg', 0, '2019-06-10 03:23:48', 28),
(32, 'Pestanyas', 'Pestanyas para apertura por bypass', 10, 'pestanyas.jpg', 0, '2019-06-10 03:24:36', 37),
(33, 'Acero', 'Flejes de acerop para la fabricacion de ganzuas', 24.99, 'flejes.jpeg', 0, '2019-06-10 03:25:16', 46),
(34, 'Ganzua de discos', 'Ganzua para cilindros de discos', 35, 'ganzuadiscos.jpg', 0, '2019-06-10 03:26:23', 30),
(35, 'Ganzua tubular', 'Ganzua para cilindros tubulares', 25, 'ganzua_tubular_6pitones.jpg', 0, '2019-06-10 03:27:09', 20),
(36, 'Tensores', 'Juego de tensores de la marca multipick', 24.99, 'kittensores.jpg', 0, '2019-06-10 12:13:38', 19);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `PRODUCTOS`
--
ALTER TABLE `PRODUCTOS`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `PRODUCTOS`
--
ALTER TABLE `PRODUCTOS`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

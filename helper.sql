-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-03-2017 a las 04:59:41
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `helper`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuerpo_titulo`
--

CREATE TABLE IF NOT EXISTS `cuerpo_titulo` (
  `autoincremento` int(11) NOT NULL,
  `cuerpo_id_titulo` int(11) NOT NULL,
  `cuerpo_tipo` text COLLATE utf8_spanish_ci NOT NULL,
  `cuerpo_detalle` text COLLATE utf8_spanish_ci NOT NULL,
  `cuerpo_asunto` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `cuerpo_solicitud` text COLLATE utf8_spanish_ci NOT NULL,
  `cuerpo_requisitos` text COLLATE utf8_spanish_ci NOT NULL,
  `cuerpo_gestion` text COLLATE utf8_spanish_ci NOT NULL,
  `cuerpo_gestion_otros` text COLLATE utf8_spanish_ci NOT NULL,
  `cuerpo_nocumple` text COLLATE utf8_spanish_ci NOT NULL,
  `cuerpo_cumple` text COLLATE utf8_spanish_ci NOT NULL,
  `cuerpo_cierre` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulo_index`
--

CREATE TABLE IF NOT EXISTS `titulo_index` (
  `id_titulo` int(11) NOT NULL,
  `nombre_titulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `posicion_menu` int(11) NOT NULL,
  `posicion_submenu` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

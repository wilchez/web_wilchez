-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2014 a las 21:14:01
-- Versión del servidor: 5.5.36
-- Versión de PHP: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mensajes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE IF NOT EXISTS `favoritos` (
  `usuario` varchar(30) NOT NULL,
  `id_mensaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `usuario` varchar(20) NOT NULL,
  `id_mensaje` int(11) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(50) NOT NULL,
  `comentario` varchar(200) NOT NULL,
  `comentado` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL,
  `favoritos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `correo`, `comentario`, `comentado`, `fecha`, `likes`, `dislikes`, `favoritos`) VALUES
(1, 'sebas.wilchez@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'sebas.wilchez@gmail.', '2014-10-02', 0, 0, 0),
(2, 'sebas.wilchez@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'sebas.wilchez@gmail', '2014-10-02', 0, 0, 0),
(3, 'sebas.wilchez@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'sebas.wilchez@gmail', '2014-10-02', 0, 0, 0),
(4, 'sebas.wilchez@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'sebas.wilchez@gmail', '2014-10-02', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `nombre` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(20) NOT NULL,
  `telefono` varchar(14) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `nacimiento` date NOT NULL,
  `foto` varchar(30) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  PRIMARY KEY (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `correo`, `telefono`, `ciudad`, `nacimiento`, `foto`, `contrasena`) VALUES
('annie', 'annie@gmail.com', '3312033', 'Cali', '0000-00-00', '../images/1.jpg', 'annie'),
('juan', 'juan@gmail.com', '3312011', 'Cali', '0000-00-00', '../images/1.jpg', 'juan'),
('sebastian', 'sebas.wilchez@gmail', '301 2232705', 'Cali', '0000-00-00', '../images/1.jpg', 'sebas');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

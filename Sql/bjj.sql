-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 13-11-2025 a las 17:56:59
-- Versión del servidor: 10.11.14-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bjj`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenamientos`
--

CREATE TABLE `entrenamientos` (
  `id_entrenamiento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `duracion` int(11) NOT NULL,
  `resumen` text DEFAULT NULL,
  `sensaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `entrenamientos`
--

INSERT INTO `entrenamientos` (`id_entrenamiento`, `id_usuario`, `fecha`, `duracion`, `resumen`, `sensaciones`) VALUES
(1, 1, '2025-10-28', 90, 'Entrenamiento libre, repasamos sumisiones básicas', 'Muy cansado pero aprendí mucho'),
(2, 1, '2025-10-30', 120, 'Clase centrada en sumisiones y barridos desde guardia cerrada', 'Bien, pero me costó el control de muñeca'),
(3, 2, '2025-11-01', 60, 'Practicamos derribos, sumisiones y barridos', 'Noté mejora en los equilibrios'),
(4, 5, '2025-11-06', 80, 'Estuvimos haciendo tecnicas desde guardia cerrada y role 4 veces', 'Muy bien y aparte es la primera vez que consigo rolar 4 veces seguidas'),
(5, 5, '2025-11-06', 80, 'Estuvimos haciendo tecnicas desde guardia cerrada y role 4 veces', 'Muy bien y aparte es la primera vez que consigo rolar 4 veces seguidas'),
(6, 5, '2025-11-06', 80, 'Estuvimos haciendo tecnicas desde guardia cerrada y role 4 veces', 'Muy bien y aparte es la primera vez que consigo rolar 4 veces seguidas'),
(7, 5, '2025-11-07', 80, 'Bien', 'Bien'),
(8, 5, '2025-11-07', 80, 'Bien', 'Bien'),
(9, 5, '2025-11-07', 80, 'Podria ir mejor', 'Podria ir mejor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenamiento_tecnica`
--

CREATE TABLE `entrenamiento_tecnica` (
  `id_entrenamiento` int(11) NOT NULL,
  `id_tecnica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `entrenamiento_tecnica`
--

INSERT INTO `entrenamiento_tecnica` (`id_entrenamiento`, `id_tecnica`) VALUES
(1, 1),
(1, 4),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 3),
(9, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicas`
--

CREATE TABLE `tecnicas` (
  `id_tecnica` int(11) NOT NULL,
  `nombre_tecnica` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `posicion` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `enlace_video` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tecnicas`
--

INSERT INTO `tecnicas` (`id_tecnica`, `nombre_tecnica`, `tipo`, `posicion`, `descripcion`, `enlace_video`) VALUES
(1, 'Kimura', 'Sumisión', 'Guarida cerrada', 'Luxación de hombro en forma de 4 que fuerza la sumisión del oponente al aplicar presión rotatoria', 'https://www.youtube.com/watch?v=wNmjKZI4OjA'),
(2, 'Raspado de tijera', 'Barrido', 'Guarida cerrada', 'Barrido clásico utilizando una pierna en forma de tijera', 'https://www.youtube.com/watch?v=yRrxsgf2RKw'),
(3, 'Single leg', 'Derribo', 'De pie', 'Agarrar una sola pierna del oponente y se utiliza el propio cuerpo para desequilibrarlo y llevarlo al suelo', 'https://www.youtube.com/watch?v=Gm1HZADtnSA'),
(4, 'Llave de brazo desde montada', 'Sumisión', 'Montada', 'Aplicar presión sobre la articulación del codo para forzar una hiperextensión, provocando el tapeo', 'https://www.youtube.com/watch?v=N-82fVK11uE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `fecha_registro` date NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `email`, `contraseña`, `fecha_registro`, `fecha_nacimiento`) VALUES
(1, 'Ismael', 'Cabanas López', 'ismael@gmail.com', '1234', '2025-10-09', '0000-00-00'),
(2, 'Elena', 'Rodríguez Seijo', 'elena@gmail.com', '4321', '2024-09-12', '0000-00-00'),
(3, 'Pelayo', 'Garcia López', 'pelayo@gmail.com', 'qwerty', '2025-08-13', '0000-00-00'),
(4, 'Gorka', 'Padin Sabio', 'gorka@gmail.com', '$2y$10$EmPCtusFexPrRD6DDmlYJeFHNIbOmHVQSIemI7FDWo.SMWLKztXBm', '2025-10-15', '0000-00-00'),
(5, 'David', 'Garcia Soto', 'david@gmail.com', '$2y$10$04puLs5GpuYwPuwP4BW0NuJOWgJuvJYZNpvmi/x0dPdjAyFpX7w.W', '2025-10-16', '0000-00-00'),
(21, 'Sergio', 'Orosa Rodriguez', 'sergio@gmail.com', '$2y$10$JFCjtRA./QX9aOI5Bn/4MOleReE7bHa9Asn8SO3lsdIFjhZz1FKmi', '2025-11-13', '2004-11-24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `entrenamientos`
--
ALTER TABLE `entrenamientos`
  ADD PRIMARY KEY (`id_entrenamiento`),
  ADD KEY `fk_usuario` (`id_usuario`);

--
-- Indices de la tabla `entrenamiento_tecnica`
--
ALTER TABLE `entrenamiento_tecnica`
  ADD PRIMARY KEY (`id_entrenamiento`,`id_tecnica`),
  ADD KEY `fk_tecnica` (`id_tecnica`);

--
-- Indices de la tabla `tecnicas`
--
ALTER TABLE `tecnicas`
  ADD PRIMARY KEY (`id_tecnica`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `entrenamientos`
--
ALTER TABLE `entrenamientos`
  MODIFY `id_entrenamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tecnicas`
--
ALTER TABLE `tecnicas`
  MODIFY `id_tecnica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entrenamientos`
--
ALTER TABLE `entrenamientos`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `entrenamiento_tecnica`
--
ALTER TABLE `entrenamiento_tecnica`
  ADD CONSTRAINT `fk_entreno` FOREIGN KEY (`id_entrenamiento`) REFERENCES `entrenamientos` (`id_entrenamiento`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_tecnica` FOREIGN KEY (`id_tecnica`) REFERENCES `tecnicas` (`id_tecnica`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

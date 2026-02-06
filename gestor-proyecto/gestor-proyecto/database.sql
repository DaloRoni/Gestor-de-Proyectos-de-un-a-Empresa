-- Contenido importado desde empresa.sql

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2025 a las 16:29:20
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `fecha_contratacion` date DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombre`, `cargo`, `fecha_contratacion`, `fecha_creacion`) VALUES
(1, 'argenis barreto', 'Desarrollador', NULL, '2025-11-07 15:06:00'),
(2, 'Cesar vivas', 'Desarrollador', NULL, '2025-11-07 15:06:00'),
(3, 'fabhian pere', 'Desarrollador', NULL, '2025-11-07 15:06:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_proyecto`
--

CREATE TABLE `empleado_proyecto` (
  `id_empleado` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `fecha_asignacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `empleado_proyecto`
--

INSERT INTO `empleado_proyecto` (`id_empleado`, `id_proyecto`, `fecha_asignacion`) VALUES
(1, 101, '2025-11-07 15:06:00'),
(1, 102, '2025-11-07 15:06:00'),
(2, 101, '2025-11-07 15:06:00'),
(3, 102, '2025-11-07 15:06:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `tipo_estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`tipo_estado`) VALUES
('Cancelada'),
('Completada'),
('En Progreso'),
('Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lider`
--

CREATE TABLE `lider` (
  `id_lider` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `lider`
--

INSERT INTO `lider` (`id_lider`, `nombre`, `fecha_creacion`) VALUES
(1, 'argenis barreto', '2025-11-07 15:06:00'),
(2, 'Cesar vivas', '2025-11-07 15:06:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id_proyecto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `id_lider` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id_proyecto`, `nombre`, `descripcion`, `id_lider`, `estado`, `fecha_inicio`, `fecha_fin`, `fecha_creacion`) VALUES
(101, 'Sistema de Gestión de Tareas', 'Sistema para gestión de tareas del equipo', 1, 'En Progreso', NULL, NULL, '2025-11-07 15:06:00'),
(102, 'Despliegue de Base de Datos', 'Despliegue y configuración de base de datos', 2, 'Pendiente', NULL, NULL, '2025-11-07 15:06:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `id_tarea` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_limite` date DEFAULT NULL,
  `fecha_completado` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id_tarea`, `descripcion`, `id_proyecto`, `id_empleado`, `estado`, `fecha_creacion`, `fecha_limite`, `fecha_completado`) VALUES
(10, 'Diseñar esquema DB', 101, 1, 'En Progreso', '2025-11-07 15:06:00', '2024-03-15', NULL),
(11, 'Configurar servidor web', 101, 2, 'Completada', '2025-11-07 15:06:00', '2024-02-28', NULL),
(12, 'Escribir documentación', 102, 3, 'Pendiente', '2025-11-07 15:06:00', '2024-04-10', NULL);

-- --------------------------------------------------------

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `empleado_proyecto`
--
ALTER TABLE `empleado_proyecto`
  ADD PRIMARY KEY (`id_empleado`,`id_proyecto`),
  ADD KEY `id_proyecto` (`id_proyecto`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`tipo_estado`);

--
-- Indices de la tabla `lider`
--
ALTER TABLE `lider`
  ADD PRIMARY KEY (`id_lider`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id_proyecto`),
  ADD KEY `id_lider` (`id_lider`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id_tarea`),
  ADD KEY `id_proyecto` (`id_proyecto`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `estado` (`estado`);

-- --------------------------------------------------------

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `lider`
--
ALTER TABLE `lider`
  MODIFY `id_lider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id_tarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

-- --------------------------------------------------------

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado_proyecto`
--
ALTER TABLE `empleado_proyecto`
  ADD CONSTRAINT `empleado_proyecto_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE CASCADE,
  ADD CONSTRAINT `empleado_proyecto_ibfk_2` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`) ON DELETE CASCADE;

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `proyecto_ibfk_1` FOREIGN KEY (`id_lider`) REFERENCES `lider` (`id_lider`) ON DELETE CASCADE,
  ADD CONSTRAINT `proyecto_ibfk_2` FOREIGN KEY (`estado`) REFERENCES `estado` (`tipo_estado`);

--
-- Filtros para la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `tarea_ibfk_1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`) ON DELETE CASCADE,
  ADD CONSTRAINT `tarea_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE CASCADE,
  ADD CONSTRAINT `tarea_ibfk_3` FOREIGN KEY (`estado`) REFERENCES `estado` (`tipo_estado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2024 a las 21:48:45
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `app_act2ap`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `contrasena`, `cv`, `rol`) VALUES
(1, 'Pepito Pérez', 'juan.perez@mail.com', 'password123', 'juan_perez.pdf', 'Administrador'),
(2, 'Ana Gómez', 'ana.gomez@mail.com', '123456', 'ana_gomez.docx', 'Postulante'),
(3, 'Carlos López', 'carlos.lopez@mail.com', 'abcdef', 'carlos_lopez.pdf', 'Empleado'),
(4, 'Marta García', 'marta.garcia@mail.com', 'contraseña123', 'marta_garcia.doc', 'Postulante'),
(5, 'Pedro Ramírez', 'pedro.ramirez@mail.com', 'qwerty', 'pedro_ramirez.pdf', 'Empleado'),
(6, 'Lucía Fernández', 'lucia.fernandez@mail.com', 'lucia123', 'lucia_fernandez.docx', 'Postulante'),
(7, 'Luis Martínez', 'luis.martinez@mail.com', 'martinez789', 'luis_martinez.pdf', 'Empleado'),
(8, 'Patricia Díaz', 'patricia.diaz@mail.com', 'passdiaz', 'patricia_diaz.pdf', 'Postulante'),
(9, 'Miguel Torres', 'miguel.torres@mail.com', 'torres987', 'miguel_torres.doc', 'Empleado'),
(10, 'Laura Vargas', 'laura.vargas@mail.com', 'vargas456', 'laura_vargas.docx', 'Postulante'),
(11, 'Jorge Pérez', 'jorge.perez@mail.com', 'passwordjorge', 'jorge_perez.pdf', 'Empleado'),
(12, 'María González', 'maria.gonzalez@mail.com', 'maria1234', 'maria_gonzalez.pdf', 'Postulante'),
(13, 'Andrés Herrera', 'andres.herrera@mail.com', 'passwordandres', 'andres_herrera.pdf', 'Empleado'),
(14, 'Valeria Ruiz', 'valeria.ruiz@mail.com', 'valeria456', 'valeria_ruiz.pdf', 'Postulante'),
(15, 'Oscar Castro', 'oscar.castro@mail.com', 'oscarcastro', 'oscar_castro.pdf', 'Empleado'),
(16, 'Daniela Paredes', 'daniela.paredes@mail.com', 'daniela789', 'daniela_paredes.pdf', 'Postulante'),
(17, 'Felipe Ríos', 'felipe.rios@mail.com', 'felipe123', 'felipe_rios.docx', 'Empleado'),
(18, 'Carla Moreno', 'carla.moreno@mail.com', 'carlamoreno', 'carla_moreno.pdf', 'Postulante'),
(19, 'Pablo Vargas', 'pablo.vargas@mail.com', 'pablopass', 'pablo_vargas.pdf', 'Empleado'),
(20, 'Sofía Méndez', 'sofia.mendez@mail.com', 'sofia987', 'sofia_mendez.pdf', 'Postulante'),
(21, 'Ricardo Silva', 'ricardo.silva@mail.com', 'ricardo123', 'ricardo_silva.doc', 'Empleado'),
(22, 'Fernanda Navarro', 'fernanda.navarro@mail.com', 'fernanda987', 'fernanda_navarro.docx', 'Postulante'),
(23, 'Gonzalo Peña', 'gonzalo.pena@mail.com', 'gonzalo456', 'gonzalo_pena.pdf', 'Empleado'),
(24, 'Elena Romero', 'elena.romero@mail.com', 'elena123', 'elena_romero.docx', 'Postulante'),
(25, 'Ramiro Ortega', 'ramiro.ortega@mail.com', 'ramiro456', 'ramiro_ortega.pdf', 'Empleado'),
(26, 'Silvia Domínguez', 'silvia.dominguez@mail.com', 'silvia789', 'silvia_dominguez.pdf', 'Postulante'),
(27, 'David Reyes', 'david.reyes@mail.com', 'david456', 'david_reyes.docx', 'Empleado'),
(28, 'Claudia Salazar', 'claudia.salazar@mail.com', 'claudia123', 'claudia_salazar.doc', 'Postulante'),
(29, 'Julio Vargas', 'julio.vargas@mail.com', 'juliopass', 'julio_vargas.pdf', 'Empleado'),
(30, 'Florencia Correa', 'florencia.correa@mail.com', 'flor123', 'florencia_correa.pdf', 'Postulante'),
(31, 'Alberto Molina', 'alberto.molina@mail.com', 'albertom123', 'alberto_molina.docx', 'Empleado'),
(32, 'Lorena Castro', 'lorena.castro@mail.com', 'lorenac456', 'lorena_castro.pdf', 'Postulante'),
(33, 'Diego Sánchez', 'diego.sanchez@mail.com', 'diegopass', 'diego_sanchez.pdf', 'Empleado'),
(34, 'Carmen Vargas', 'carmen.vargas@mail.com', 'carmen456', 'carmen_vargas.pdf', 'Postulante'),
(35, 'Ernesto Peña', 'ernesto.pena@mail.com', 'ernestopass', 'ernesto_pena.pdf', 'Empleado'),
(36, 'Gloria Díaz', 'gloria.diaz@mail.com', 'gloria123', 'gloria_diaz.pdf', 'Postulante'),
(37, 'Sergio Rojas', 'sergio.rojas@mail.com', 'sergiorojasp', 'sergio_rojas.docx', 'Empleado'),
(38, 'Tamara López', 'tamara.lopez@mail.com', 'tamara987', 'tamara_lopez.doc', 'Postulante'),
(39, 'Mauricio Ortega', 'mauricio.ortega@mail.com', 'mauricio123', 'mauricio_ortega.pdf', 'Empleado'),
(40, 'Gabriela Méndez', 'gabriela.mendez@mail.com', 'gabrimendez', 'gabriela_mendez.pdf', 'Postulante'),
(41, 'Fernando Castro', 'fernando.castro@mail.com', 'fernandoc123', 'fernando_castro.pdf', 'Empleado'),
(42, 'Monica Reyes', 'monica.reyes@mail.com', 'monicareyes', 'monica_reyes.doc', 'Postulante');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id` int(11) NOT NULL,
  `nombre` varchar(400) NOT NULL,
  `url1` varchar(900) DEFAULT NULL,
  `url2` varchar(900) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1,
  `fecha_hora` datetime DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id`, `nombre`, `url1`, `url2`, `estado`, `fecha_hora`, `usuario_id`) VALUES
(1, 'prueba 1 ', 'https://i.ibb.co/VtXwWGP/ac9e6a10ee3fc57509bfe34bb9fc8901.jpg', 'https://i.ibb.co/t4yLM6W/ac9e6a10ee3fc57509bfe34bb9fc8901.jpg', 1, '2023-10-25 18:57:49', 1),
(2, 'prueba 2 en 00webhost', 'https://i.ibb.co/SyPhsHK/1d1696c0c331.jpg', 'https://i.ibb.co/JtKfB8z/1d1696c0c331.jpg', 1, '2023-10-25 18:00:12', 1),
(3, 'En mi cell', 'https://i.ibb.co/h2wnL3V/967920b62991.jpg', 'https://i.ibb.co/HG3MB5q/967920b62991.jpg', 1, '2023-10-25 18:40:18', 1),
(4, 'logo', 'https://i.ibb.co/TPmkBbh/e861aa7266f3.png', 'https://i.ibb.co/8P60Dd8/e861aa7266f3.png', 1, '2023-10-25 20:01:35', 1),
(5, 'yuta', 'https://i.ibb.co/CQRspcZ/db2e15fceac5.jpg', 'https://i.ibb.co/FzRqkrM/db2e15fceac5.jpg', 1, '2023-10-25 22:21:31', 1),
(6, 'Server error 500', 'https://i.ibb.co/GJZCyKg/c49d60ffd3f7.jpg', 'https://i.ibb.co/RSXQfxL/c49d60ffd3f7.jpg', 1, '2023-10-26 01:20:24', 19),
(7, 'soul', 'https://i.ibb.co/z7Bv9NN/0e1a8d000175.jpg', 'https://i.ibb.co/Yy1snbb/0e1a8d000175.jpg', 1, '2023-10-31 20:03:47', 1),
(8, 'Reymar', 'https://i.ibb.co/1MtD36J/6d0aad223e7f.jpg', 'https://i.ibb.co/C63kq2s/6d0aad223e7f.jpg', 1, '2023-11-02 23:41:00', 17),
(9, 'gojo vs sukuna', 'https://i.ibb.co/hCYBZhr/7833e9ab52a3.jpg', 'https://i.ibb.co/V3wgQrb/7833e9ab52a3.jpg', 1, '2023-11-10 23:50:14', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(400) NOT NULL,
  `descripcion` varchar(900) DEFAULT NULL,
  `link` varchar(600) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1,
  `fecha_hora` datetime DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `nombre`, `descripcion`, `link`, `estado`, `fecha_hora`, `usuario_id`) VALUES
(1, 'uagrm', 'pagina para presencial uagrm', 'https://presencial.uagrm.edu.bo/login/index.php', 1, '2023-10-25 18:56:56', 1),
(2, 'e', '2', '1', 1, '2023-10-25 17:58:02', 1),
(3, 'ss2', 'ss111111', 'https://www.youtube.com/watch?v=SR89b0qqRAg&list=RDGMEMhCgTQvcskbGUxqI4Sn2QYwVMSR89b0qqRAg&start_radio=1', 1, '2023-10-25 18:18:01', 14),
(4, 'Hello world', 'Lorem ipsum...', 'https://holawill.com', 0, '2023-10-26 01:15:46', 19),
(5, 'Wos', 'Arrancamelo', 'https://youtu.be/GAoWM_EGkdg?si=kWRgmI-VHoXR6-0F', 1, '2023-11-06 15:20:28', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `apellido`, `genero`, `telefono`, `direccion`, `email`) VALUES
(14, 'Samira', 'Perez Laura', 'Femenino', 76359537, 'radial 18 octavo anillo, 4to anillo', 'samira@gmail.com'),
(15, 'Abdiel', 'Perez Laura', 'Masculino', 7564564, 'Santa cruz', 'ricardo@gmail'),
(16, 'Romina', 'Perez Gomez', 'Femenino', 7777777, 'km7', 'romina@gmail.com'),
(17, 'Daniela', 'Perez Gomezz', 'Femenino', 7777777, 'km7', 'romina@gmail.com'),
(18, 'Itaty', 'guzman gonzales', 'Femenino', 45786545, 'radial 16, calle 25 de septiembre. 7mo anillo', 'itaty@gmail.com'),
(19, 'Ruddy', 'Gonzales', 'Masculino', 54546767, 'Km8', 'aaa@gmail');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Administrador', 'Rol de administrador del sistema'),
(2, 'Usuario comun', 'Rol de usuario regular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(400) NOT NULL,
  `descripcion` varchar(900) DEFAULT NULL,
  `fase` varchar(25) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1,
  `fecha_hora` datetime DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `nombre`, `descripcion`, `fase`, `estado`, `fecha_hora`, `usuario_id`) VALUES
(1, 'Examen de arquitectura', 'es para el viernes', 'progreso', 1, '2023-10-25 18:57:33', 1),
(2, 'Prueba en cell', 'Xd', 'progreso', 1, '2023-10-25 20:21:45', 14),
(3, 'Hello world', 'Lorem ipsum...', 'finalizado', 1, '2023-10-26 01:17:09', 19),
(4, 'Hello world', 'Lorem ipsum...', 'progreso', 1, '2023-10-26 01:18:47', 19),
(5, 'Tarea 3', 'Lorem ipsum...', 'finalizado', 1, '2023-10-26 01:19:03', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `idrol` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password`, `idrol`, `estado`) VALUES
(1, 'will', '123', 1, 1),
(14, 'samira', '123', 2, 1),
(15, 'abdiel', '123', 2, 1),
(16, 'romina', '123', 2, 1),
(17, 'daniela', '123', 2, 1),
(18, 'itaty', '123', 2, 1),
(19, 'ruddy', '123', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-02-2021 a las 04:44:58
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `materialesjuquilita`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `copiarTabla` (IN `ID` INT(11), IN `ID_P` INT(11), IN `CANT` INT(5), IN `PRC` INT(5), IN `VEN` INT(5), IN `FCH` DATE, IN `CLI` VARCHAR(25))  BEGIN 
INSERT INTO `venta` (`Id_venta`, `Id_producto`, `Cantidad`, `Precio`, `Vendedor`, `Fecha`, `Cliente`)
VALUES (ID, ID_P , CANT , PRC, VEN ,FCH , CLI);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ventas_inventarios` (IN `_Id_venta` INT(11), IN `_Id_producto` INT(11), IN `_Cantidad` INT(5), IN `_Precio` FLOAT(11), IN `_Vendedor` INT(5), IN `_Fecha` DATE, IN `_Cliente` VARCHAR(25) CHARSET utf8, IN `accion` VARCHAR(6) CHARSET utf8)  BEGIN
	case accion
		when 'insert' then
			INSERT INTO `inventario_estadistica` (`Id_venta`, `Id_producto`, `Cantidad`, `Precio`, `Vendedor`, `Fecha`, `Cliente`)
VALUES (_Id_venta, _Id_producto , _Cantidad ,_Precio  , _Vendedor ,_Fecha ,_Cliente );

		when 'update' then 
			update inventario_estadistica set Id_venta = _Id_venta, Id_producto = _Id_producto , Cantidad =  Cantidad + _Cantidad, Precio = _Precio , Vendedor = _Vendedor, Fecha = _Fecha, Cliente =_Cliente where Id_producto=_Id_producto;
	end case;
	
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `venta_inventario` (IN `_Id_venta` INT(11), IN `_Id_producto` INT(11), IN `_Cantidad` INT(5), IN `_Precio` FLOAT(11), IN `_Vendedor` INT(5), IN `_Fecha` DATE, IN `_Cliente` VARCHAR(25) CHARSET utf8, IN `accion` VARCHAR(6) CHARSET utf8)  BEGIN
	case accion
		when 'insert' then
			INSERT INTO `inventario_estadistica` (`identificador`,`Id_venta`, `Id_producto`, `Cantidad`, `Precio`, `Vendedor`, `Fecha`, `Cliente`)
VALUES (NULL,_Id_venta, _Id_producto , _Cantidad ,_Precio  , _Vendedor ,_Fecha ,_Cliente );

		when 'update' then 
			update inventario_estadistica set Id_venta = _Id_venta, Id_producto = _Id_producto , Cantidad =  Cantidad + _Cantidad, Precio = _Precio , Vendedor = _Vendedor, Fecha = _Fecha, Cliente =_Cliente where Id_producto=_Id_producto;
	end case;
	
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actualizaciones`
--

CREATE TABLE `actualizaciones` (
  `descripcion` varchar(100) DEFAULT NULL,
  `producto` int(11) NOT NULL,
  `nombre_empleado` varchar(100) NOT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actualizaciones`
--

INSERT INTO `actualizaciones` (`descripcion`, `producto`, `nombre_empleado`, `fecha`) VALUES
('actualizar cantidad', 207, 'José Alfredo', '2021-02-03 21:51:49'),
('actualizar cantidad', 208, 'José Alfredo', '2021-02-03 21:56:46'),
('actualizar cantidad', 166, 'Valeria ', '2021-02-04 15:04:08'),
('actualizar cantidad', 209, 'José Alfredo', '2021-02-04 20:23:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `Id_carro` int(5) NOT NULL,
  `Id_producto` int(5) NOT NULL,
  `Cantidad` int(5) NOT NULL,
  `Precio` float NOT NULL,
  `Vendedor` int(11) DEFAULT NULL,
  `Fecha` date NOT NULL,
  `Cliente` varchar(100) DEFAULT NULL,
  `ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`Id_carro`, `Id_producto`, `Cantidad`, `Precio`, `Vendedor`, `Fecha`, `Cliente`, `ID`) VALUES
(59, 105, 0, 0, 4, '2000-01-01', 'Ingresa cliente', 47);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`) VALUES
(6, 'Francisco Victorico'),
(8, 'Gabi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigo`
--

CREATE TABLE `codigo` (
  `Id_producto` int(11) NOT NULL,
  `codigo` varchar(25) DEFAULT NULL,
  `id_ven` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `codigo`
--

INSERT INTO `codigo` (`Id_producto`, `codigo`, `id_ven`) VALUES
(166, '86chj2rbne', 45),
(134, 'w9yhgr7i05', 46);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eliminados`
--

CREATE TABLE `eliminados` (
  `descripcion` varchar(100) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `nombre_empleado` varchar(100) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `eliminados`
--

INSERT INTO `eliminados` (`descripcion`, `producto`, `nombre_empleado`, `fecha`) VALUES
('ya es muy viejo', '207', 'José Alfredo', '2021-02-03 21:54:23'),
('ya es muy viejo', '208', 'José Alfredo', '2021-02-03 21:56:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_p` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_m` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contraseña` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` int(11) DEFAULT NULL,
  `turno_entrada` time NOT NULL,
  `turno_salida` time DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombres`, `apellido_p`, `apellido_m`, `usuario`, `contraseña`, `cargo`, `turno_entrada`, `turno_salida`, `correo`) VALUES
(3, 'José Alfredo', 'Martínez', 'Castro', 'JoseA', '137946', 1, '07:00:00', '14:00:00', 'jose@gmail.com'),
(4, 'Jonathan Joshua', 'Santiago', 'García', 'Joshimura', '137946', 2, '14:00:00', '14:00:00', 'joshua@gmail.com'),
(6, 'Cesar', 'Luna', 'Lopez', 'Cisa16', '1379', 2, '10:35:00', '23:35:00', 'cisa@gmail.com'),
(7, 'Valeria ', 'Carreño', 'Loza', 'Loza', '137946', 3, '07:47:00', '19:47:00', 'loza@gmail.com'),
(18, 'Gamaliel', 'Braquetes', 'López', 'Gamaliel', 'gama137946', 4, '07:00:00', '18:00:00', 'Gamaliel@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_codigo`
--

CREATE TABLE `empleado_codigo` (
  `codigo` varchar(20) NOT NULL,
  `empleado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado_codigo`
--

INSERT INTO `empleado_codigo` (`codigo`, `empleado`) VALUES
('joza4id1tu', 6),
('0end2l3rfq', 7),
('xnmzrvbw0t', 18),
('vszuxe9ob8', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_departamento`
--

CREATE TABLE `empleado_departamento` (
  `Id_departamento` int(11) NOT NULL,
  `Id_empleado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado_departamento`
--

INSERT INTO `empleado_departamento` (`Id_departamento`, `Id_empleado`) VALUES
(5, 18),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(1, 4),
(2, 4),
(3, 4),
(4, 6),
(5, 6),
(6, 6),
(1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_estadistica`
--

CREATE TABLE `inventario_estadistica` (
  `identificador` int(11) NOT NULL,
  `Id_venta` int(11) NOT NULL,
  `Id_producto` int(11) NOT NULL,
  `Cantidad` int(5) NOT NULL,
  `Precio` float NOT NULL,
  `Vendedor` int(5) NOT NULL,
  `Fecha` date NOT NULL,
  `Cliente` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventario_estadistica`
--

INSERT INTO `inventario_estadistica` (`identificador`, `Id_venta`, `Id_producto`, `Cantidad`, `Precio`, `Vendedor`, `Fecha`, `Cliente`) VALUES
(67, 45, 166, 8, 254, 3, '2021-02-03', 'Juan Antonio Gómez Revill'),
(68, 28, 192, 4, 180, 3, '2021-02-03', 'Gabi'),
(69, 46, 134, 4, 595, 3, '2021-02-05', 'Juan Antonio Gómez Revill'),
(80, 45, 127, 100, 39, 3, '2021-02-03', 'Juan Antonio Gómez Revill'),
(81, 47, 143, 1, 3649, 6, '2021-02-05', 'Juan Antonio Gómez Revill');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `precio` float NOT NULL,
  `cantidad_existente` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` int(50) NOT NULL,
  `Tamaño` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `cantidad_existente`, `tipo`, `Tamaño`) VALUES
(105, 'zzzzzz', 0, '0', 1, '0'),
(107, 'Procesador AMD Ryzen 5 3600 ', 5019, '1', 4, 'Único'),
(108, 'Asus Tarjeta Madre Prime B550M-A', 2802, '1', 4, 'Único'),
(109, 'Asus Tarjeta De Video NVIDIA GeForce GTX 1660 Supe', 11500, '1', 4, 'Único'),
(110, 'Memoria Ram Adata Xpg Spectrix', 999, '1', 4, '8GB'),
(111, 'Kingston SSD A400 480GB SATA 3', 1098, '1', 4, 'Único'),
(112, 'Seagate BarraCuda - Disco duro interno', 1399, '1', 4, '1 TB'),
(113, 'SAMSUNG Monitor Gaming ', 3299, '1', 4, '24 pulgadas'),
(114, 'Aerocool Cylon RGB ', 1168, '1', 4, '188 x 430 x 375mm'),
(115, 'IN-WIN InWin Sirius Loop Direccionable RGB Triple ', 729, '1', 4, '20mm'),
(116, 'Evga 100-W1-0500-KR Fuente de Poder 500 W', 1809, '1', 4, 'Único'),
(117, 'POWER ENERGY NO Break 750V', 1099, '1', 4, '750V'),
(118, 'Balam Rush Teclado Mecanico', 1213, '1', 4, '435 x 193.5 x 35.5 m'),
(119, 'Logitech G203 LIGHTSYNC', 462, '1', 4, 'Único'),
(120, 'Jecoo Tarjeta de Captura USB 2.0', 300, '1', 4, 'Único'),
(121, 'Logitech - C920 - Cámara Web Full HD', 1388, '0', 4, '9.4 x 4.32 x 7.11 cm'),
(122, 'Roseta ', 120, '10', 5, 'Único'),
(123, 'Cámara de seguridad', 1690, '3', 5, ' 2,8 a 12 mm'),
(124, 'Cable utp ', 19, '190', 5, '1 metro'),
(125, 'Tarjeta de red/antena', 495, '1', 5, 'Único'),
(126, 'Repetidor wifi', 419, '3', 5, 'Único'),
(127, 'Jack SMA para cable RG58', 39, '200', 5, '1 metro'),
(128, 'Probador de cable utp', 1990, '3', 5, 'Único'),
(129, 'Pinzas ponchadoras', 320, '3', 5, 'Único'),
(130, 'Plug RJ45', 5, '500', 5, 'Único'),
(131, 'Filtro telefónico ADSL ', 79, '3', 5, 'Único'),
(132, 'Modulo de red ', 295, '5', 5, 'Único'),
(133, 'Switch fast ethernet ', 395, '2', 5, 'Único'),
(134, 'Adaptador USB 3.0 a Gigabit Ethernet', 595, '1', 5, 'Único'),
(135, 'Modulo wifi', 150, '3', 5, 'Único'),
(136, 'TP-Link', 460, '5', 5, 'Único'),
(137, ' Licencia office 365', 466, '5', 6, 'Único'),
(138, 'Licencia microsoft access', 479, '5', 6, 'Único'),
(139, 'Windows 10 Pro', 427, '10', 6, 'Único'),
(140, 'Punto de Venta', 2399, '1', 6, 'Único'),
(141, 'McAfee', 500, '5', 6, 'Único'),
(142, 'Norton 360', 770, '5', 6, 'Único'),
(143, 'Adobe Acrobat', 3649, '2', 6, 'Único'),
(144, 'Vegas pro', 489, '2', 6, 'Único'),
(145, 'Corel draw', 790, '1', 6, 'Único'),
(146, 'Panda', 329, '10', 6, 'Único'),
(147, 'Avast ', 399, '7', 6, 'Único'),
(148, 'Winrar ', 29, '10', 6, 'Único'),
(149, 'Auto CAD', 24000, '1', 6, 'Único'),
(150, 'Vegas pro', 489, '5', 6, 'Único'),
(151, 'Fl studio', 5500, '1', 6, 'Único'),
(152, 'Kit de desarmadores o destornilladores', 605, '5', 1, '13 desatornilladores'),
(153, 'Pinzas ponchadoras ', 99, '10', 1, '1 pieza'),
(154, 'Bota protectora para plug', 82, '50', 1, '1 pieza'),
(155, 'Multimetro voltimetro', 179, '5', 6, '1 pieza'),
(156, 'Pulsera Antiestatica', 43, '10', 1, '1 pieza'),
(157, 'Pinza ultrafina', 79, '5', 1, '1 pieza'),
(158, 'Tapete antiestático', 169, '5', 1, '1 metro x 1 metro'),
(159, 'Kit para abriri pantallas ', 79, '4', 1, 'Único'),
(161, 'Estación de soldar', 1650, '3', 1, 'Único'),
(162, 'Base para soldar con sujetador ', 1600, '3', 1, 'Único'),
(163, 'Led', 55, '100', 1, 'Pequeño'),
(164, 'Cables dupont', 35, '9', 1, 'Único'),
(165, 'Protoboard 830 puntos', 47, '1', 1, '830 puntos'),
(166, 'Arduino mega', 254, '10', 1, 'Único'),
(167, 'Impresora 3D Ender', 6680, '1', 2, 'Único'),
(168, 'Repetidor Xiaomi', 395, '1', 2, 'Único'),
(169, 'Google GA00439-MX', 859, '10', 2, 'Único'),
(170, 'Koblenz ER-2550', 977, '6', 2, 'Único'),
(171, 'Crosstour proyector', 2129, '10', 2, 'Único'),
(172, 'Escaner Epson', 102999, '1', 2, 'Único'),
(173, 'Aurora AS810SD', 654, '2', 2, 'Único'),
(174, 'Royal sovereing', 719, '2', 2, 'Único'),
(175, 'Lenovo tab M8', 2323, '2', 2, 'Único'),
(176, 'Fire tv stick', 1199, '5', 2, 'Único'),
(177, 'Apple TV HD', 3799, '2', 2, 'Único'),
(178, 'Harman Kardon Neo', 1700, '8', 2, 'Único'),
(179, 'Fiio M6 reproductor', 4165, '10', 2, 'Único'),
(180, 'Tocadisco Gezichta', 532, '10', 2, 'Único'),
(181, 'Adata Gabinete Externo', 254, '1', 2, '12.5 cm'),
(182, 'Limpiador liquido Perfect choice', 131, '1', 3, '1 litro'),
(183, 'Paño alto rendimiento', 170, '15', 3, '1 pieza'),
(184, 'Carson doublé sided', 181, '20', 3, '2 piezas'),
(185, 'Limpiador de pantalla', 804, '5', 3, '1 litro'),
(186, 'JR gamuzas de microfibra', 99, '5', 3, '1 pieza'),
(187, 'Limpiador y desengrasante steren', 199, '8', 3, '1 litro'),
(188, 'Tboneey gel liempieza', 199, '6', 3, '1 litro'),
(189, 'Serounder limpiador de sensores', 292, '3', 3, '1 litro'),
(190, 'OXO cepillo de limpieza ', 189, '2', 3, 'Único'),
(191, 'Carson C6 lens cleaners ', 176, '24', 3, '1 pieza'),
(192, 'Alcohol isopropilico', 180, '24', 3, '1 litro'),
(193, 'Gunk limpiador para motor electrico', 195, '5', 3, 'Único'),
(194, 'Prolicom limpiador antiestatico', 237, '15', 3, 'Único'),
(209, 'AAA', 123, '2', 1, '1 pieza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
  `Id_puesto` int(11) NOT NULL,
  `Puesto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`Id_puesto`, `Puesto`) VALUES
(1, 'Administrador'),
(2, 'Director General'),
(3, 'Director de departamento'),
(4, 'Personal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `Id` int(2) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `horario_apertura` time DEFAULT NULL,
  `horario_cierre` time DEFAULT NULL,
  `telefono` varchar(11) DEFAULT NULL,
  `saludo` text DEFAULT NULL,
  `saludo_2` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`Id`, `nombre`, `direccion`, `horario_apertura`, `horario_cierre`, `telefono`, `saludo`, `saludo_2`) VALUES
(1, 'Materiales Juquilita', 'Oaxaca', '08:30:00', '19:30:00', '9516147039', 'Préstamo de servicio con el código:', 'BALE010725HOCRPDA5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `tipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `tipo`) VALUES
(1, 'Herramientas'),
(2, 'Electrónicos'),
(3, 'Limpieza'),
(4, 'Equipos'),
(5, 'Redes'),
(6, 'Software');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `Id_venta` int(11) NOT NULL,
  `Id_producto` int(11) NOT NULL,
  `Cantidad` int(5) NOT NULL,
  `Precio` float NOT NULL,
  `Vendedor` int(5) NOT NULL,
  `Fecha` date NOT NULL,
  `Cliente` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`Id_venta`, `Id_producto`, `Cantidad`, `Precio`, `Vendedor`, `Fecha`, `Cliente`) VALUES
(45, 166, 2, 254, 3, '2021-02-03', 'Juan Antonio Gómez Revill'),
(46, 134, 1, 595, 3, '2021-02-05', 'Juan Antonio Gómez Revill');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`Id_carro`),
  ADD KEY `Id_producto` (`Id_producto`),
  ADD KEY `Vendedor` (`Vendedor`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `codigo`
--
ALTER TABLE `codigo`
  ADD KEY `Id_producto` (`Id_producto`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cargo` (`cargo`);

--
-- Indices de la tabla `empleado_codigo`
--
ALTER TABLE `empleado_codigo`
  ADD KEY `empleado` (`empleado`);

--
-- Indices de la tabla `empleado_departamento`
--
ALTER TABLE `empleado_departamento`
  ADD KEY `Id_empleado` (`Id_empleado`),
  ADD KEY `departamento` (`Id_departamento`);

--
-- Indices de la tabla `inventario_estadistica`
--
ALTER TABLE `inventario_estadistica`
  ADD PRIMARY KEY (`identificador`),
  ADD KEY `Id_producto` (`Id_producto`),
  ADD KEY `Id_venta` (`Id_venta`),
  ADD KEY `Vendedor` (`Vendedor`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_ibfk_1` (`tipo`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`Id_puesto`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD KEY `Id_producto` (`Id_producto`),
  ADD KEY `Vendedor` (`Vendedor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `Id_carro` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `inventario_estadistica`
--
ALTER TABLE `inventario_estadistica`
  MODIFY `identificador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT de la tabla `puesto`
--
ALTER TABLE `puesto`
  MODIFY `Id_puesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`Id_producto`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`Vendedor`) REFERENCES `empleados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `codigo`
--
ALTER TABLE `codigo`
  ADD CONSTRAINT `codigo_ibfk_1` FOREIGN KEY (`Id_producto`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`cargo`) REFERENCES `puesto` (`Id_puesto`);

--
-- Filtros para la tabla `empleado_codigo`
--
ALTER TABLE `empleado_codigo`
  ADD CONSTRAINT `empleado_codigo_ibfk_1` FOREIGN KEY (`empleado`) REFERENCES `empleados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado_departamento`
--
ALTER TABLE `empleado_departamento`
  ADD CONSTRAINT `empleado_departamento_ibfk_1` FOREIGN KEY (`Id_empleado`) REFERENCES `empleados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `empleado_departamento_ibfk_2` FOREIGN KEY (`Id_departamento`) REFERENCES `tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inventario_estadistica`
--
ALTER TABLE `inventario_estadistica`
  ADD CONSTRAINT `inventario_estadistica_ibfk_1` FOREIGN KEY (`Id_producto`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `inventario_estadistica_ibfk_2` FOREIGN KEY (`Vendedor`) REFERENCES `empleados` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo` (`id`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`Id_producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`Vendedor`) REFERENCES `empleados` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

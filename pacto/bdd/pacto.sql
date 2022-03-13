-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-03-2022 a las 19:57:45
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pacto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `ASISTENCIAID` int(11) NOT NULL,
  `REUNIONID` int(11) DEFAULT NULL,
  `PERTENECENID` int(11) DEFAULT NULL,
  `CONFIRMACIONASIS` tinyint(1) NOT NULL,
  `multa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`ASISTENCIAID`, `REUNIONID`, `PERTENECENID`, `CONFIRMACIONASIS`, `multa`) VALUES
(1, 1, 1, 0, 20),
(2, 4, 3, 0, 6),
(3, 1, 4, 1, 0),
(4, 1, 3, 1, 0),
(5, 10, 1, 0, 6),
(6, 10, 3, 0, 6),
(7, 10, 4, 0, 6),
(8, 4, 1, 0, 6),
(9, 2, 1, 0, 6),
(10, 2, 3, 0, 6),
(11, 11, 3, 1, 0),
(12, 11, 4, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asociacion`
--

CREATE TABLE `asociacion` (
  `ASOCIACIONID` int(11) NOT NULL,
  `NOMBREASO` varchar(20) NOT NULL,
  `SECTORASO` varchar(20) NOT NULL,
  `BARRIOASO` varchar(20) NOT NULL,
  `PARROQUIAASO` varchar(20) NOT NULL,
  `LOGOASO` char(100) DEFAULT NULL,
  `STATUSASO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asociacion`
--

INSERT INTO `asociacion` (`ASOCIACIONID`, `NOMBREASO`, `SECTORASO`, `BARRIOASO`, `PARROQUIAASO`, `LOGOASO`, `STATUSASO`) VALUES
(1, 'Asociación 1', 'Guanabana', 'Quitumbe', 'Pacto', '../pacto/assests/images/logos/Financiero.png', 1),
(2, 'asociacion2', 'Ponceano', 'Los cipreces', 'Cotocollao', '../pacto/assests/images/logos/2.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega`
--

CREATE TABLE `bodega` (
  `BODEGAID` int(11) NOT NULL,
  `PERTENECENID` int(11) DEFAULT NULL,
  `FECHABODEGA` date NOT NULL,
  `TOTALCOSTO` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bodega`
--

INSERT INTO `bodega` (`BODEGAID`, `PERTENECENID`, `FECHABODEGA`, `TOTALCOSTO`) VALUES
(1, 5, '2022-03-11', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriaproducto`
--

CREATE TABLE `categoriaproducto` (
  `CATEGORIAID` int(11) NOT NULL,
  `NOMCAT` varchar(20) NOT NULL,
  `DESCCAT` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoriaproducto`
--

INSERT INTO `categoriaproducto` (`CATEGORIAID`, `NOMCAT`, `DESCCAT`) VALUES
(1000, 'Categoria 1', 'Ganaderia '),
(1001, 'Categoria 2', 'Panelera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallebodega`
--

CREATE TABLE `detallebodega` (
  `DETBODEGAID` int(11) NOT NULL,
  `PRODUCTOID` int(11) DEFAULT NULL,
  `UNIDADESID` int(11) DEFAULT NULL,
  `BODEGAID` int(11) DEFAULT NULL,
  `STOCKBODEGA` float NOT NULL,
  `PRECIOBODEGA` float NOT NULL,
  `DESCRIPBODEGA` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallebodega`
--

INSERT INTO `detallebodega` (`DETBODEGAID`, `PRODUCTOID`, `UNIDADESID`, `BODEGAID`, `STOCKBODEGA`, `PRECIOBODEGA`, `DESCRIPBODEGA`) VALUES
(1, 1, 1, 1, 30, 3, ' Quesos Mozarella');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

CREATE TABLE `detallefactura` (
  `DETALLEID` int(11) NOT NULL,
  `PRODUCTOID` int(11) NOT NULL,
  `PEDIDOSID` int(11) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `TOTALPRODUCT` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallemantenimiento`
--

CREATE TABLE `detallemantenimiento` (
  `MANTENIMIENTOID` int(11) DEFAULT NULL,
  `DETALLEMANTEID` int(11) NOT NULL,
  `DESCRIPCIONMANTE` varchar(300) DEFAULT NULL,
  `PRECIOMANTE` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directiva`
--

CREATE TABLE `directiva` (
  `DIRECTIVAID` int(11) NOT NULL,
  `CARGODIR` varchar(20) NOT NULL,
  `PERIODODIR` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad`
--

CREATE TABLE `entidad` (
  `ENTIDADID` int(11) NOT NULL,
  `PAISID` int(11) DEFAULT NULL,
  `NOMBREENT` varchar(20) NOT NULL,
  `DIRENT` varchar(40) NOT NULL,
  `TELENT` varchar(12) NOT NULL,
  `CIUENT` varchar(20) NOT NULL,
  `TIPO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadopedido`
--

CREATE TABLE `estadopedido` (
  `ESTADOPEDIDOID` int(11) NOT NULL,
  `NOMBREESPE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estadopedido`
--

INSERT INTO `estadopedido` (`ESTADOPEDIDOID`, `NOMBREESPE`) VALUES
(1, 'pendiente'),
(2, 'entregado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hojadecampo`
--

CREATE TABLE `hojadecampo` (
  `HOJADECAMPOID` int(11) NOT NULL,
  `SUBHOJADECAMPOID` int(11) DEFAULT NULL,
  `PREPASUELO` tinyint(1) DEFAULT NULL,
  `PREPASEMILLA` tinyint(1) DEFAULT NULL,
  `SIEMBRA` tinyint(1) DEFAULT NULL,
  `RESIEMBRA` tinyint(1) DEFAULT NULL,
  `DESHIERBE` tinyint(1) DEFAULT NULL,
  `APOQUE` tinyint(1) DEFAULT NULL,
  `LIMPIDESOJE` tinyint(1) DEFAULT NULL,
  `ELAABONOSO` tinyint(1) DEFAULT NULL,
  `ELAABONOLI` tinyint(1) DEFAULT NULL,
  `APLIABONO` tinyint(1) DEFAULT NULL,
  `CONTROLPLAGA` tinyint(1) DEFAULT NULL,
  `CONTROLENFER` tinyint(1) DEFAULT NULL,
  `MANTEFINCA` tinyint(1) DEFAULT NULL,
  `COSECHA` tinyint(1) DEFAULT NULL,
  `ACARREOTRANS` tinyint(1) DEFAULT NULL,
  `DESCARGA` tinyint(1) DEFAULT NULL,
  `CALIMANTEEQUIPO` tinyint(1) DEFAULT NULL,
  `MOLIENDA` tinyint(1) DEFAULT NULL,
  `FILTRADO` tinyint(1) DEFAULT NULL,
  `MELADA` tinyint(1) DEFAULT NULL,
  `CLARIFICADO` tinyint(1) DEFAULT NULL,
  `PUNTERO` tinyint(1) DEFAULT NULL,
  `BATIDO` tinyint(1) DEFAULT NULL,
  `TAMIZADO` tinyint(1) DEFAULT NULL,
  `EMPACADO` tinyint(1) DEFAULT NULL,
  `CODIFICADO` tinyint(1) DEFAULT NULL,
  `LIMPIEZAMOD` tinyint(1) DEFAULT NULL,
  `DESINFECCIONMOD` tinyint(1) DEFAULT NULL,
  `REGISTROVEN` tinyint(1) DEFAULT NULL,
  `LLENADOCONTA` tinyint(1) DEFAULT NULL,
  `CAPACITACION` tinyint(1) DEFAULT NULL,
  `COMERCIALIZACION` tinyint(1) DEFAULT NULL,
  `FECHADG` date NOT NULL,
  `NUMTRADG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimientomaquinaria`
--

CREATE TABLE `mantenimientomaquinaria` (
  `MANTENIMIENTOID` int(11) NOT NULL,
  `TIPOMANID` int(11) DEFAULT NULL,
  `MAQUINARIAID` int(11) DEFAULT NULL,
  `FECHAMAN` datetime NOT NULL,
  `DESCMAN` varchar(100) NOT NULL,
  `COSTOMAN` float NOT NULL,
  `PROXIMOMAN` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinariasocio`
--

CREATE TABLE `maquinariasocio` (
  `MAQUINARIAID` int(11) NOT NULL,
  `PERTENECENID` int(11) DEFAULT NULL,
  `ENTIDADID` int(11) DEFAULT NULL,
  `NOMBREMAQ` varchar(20) NOT NULL,
  `ESTADOMAQ` varchar(120) NOT NULL,
  `MARCAMAQ` varchar(20) NOT NULL,
  `KILOMETRAJEMAQ` int(11) DEFAULT NULL,
  `PLACAMAQ` varchar(10) DEFAULT NULL,
  `ORIGENMAQ` varchar(20) NOT NULL,
  `CAPACIDADMAQ` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `PAISID` int(11) NOT NULL,
  `NOMPAIS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`PAISID`, `NOMPAIS`) VALUES
(1, 'Ecuador'),
(2, 'Colombia'),
(3, 'Perú');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `PEDIDOSID` int(11) NOT NULL,
  `USUARIOID` int(11) DEFAULT NULL,
  `ESTADOPEDIDOID` int(11) DEFAULT NULL,
  `FECHAPEDIDO` date NOT NULL,
  `TOTALPEDIDO` float DEFAULT NULL,
  `STATUSPEDIDO` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pertenecen`
--

CREATE TABLE `pertenecen` (
  `PERTENECENID` int(11) NOT NULL,
  `USUARIOID` int(11) NOT NULL,
  `ASOCIACIONID` int(11) NOT NULL,
  `DIRECTIVAID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pertenecen`
--

INSERT INTO `pertenecen` (`PERTENECENID`, `USUARIOID`, `ASOCIACIONID`, `DIRECTIVAID`) VALUES
(1, 2, 1, NULL),
(2, 3, 2, NULL),
(3, 4, 1, NULL),
(4, 5, 1, NULL),
(5, 6, 1, NULL),
(6, 7, 1, NULL),
(7, 8, 1, NULL),
(8, 9, 1, NULL),
(9, 10, 1, NULL),
(10, 11, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `PRODUCTOID` int(11) NOT NULL,
  `CATEGORIAID` int(11) DEFAULT NULL,
  `ASOCIACIONID` int(11) DEFAULT NULL,
  `UNIDADESID` int(11) DEFAULT NULL,
  `NOMPRODUCT` varchar(20) NOT NULL,
  `DESCRIPCIONPRODUCT` varchar(20) NOT NULL,
  `PRECIOPRODUCT` float NOT NULL,
  `STOCKPRODUCT` int(11) NOT NULL,
  `PVPPRODUCT` float NOT NULL,
  `STATUSPRODUCT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`PRODUCTOID`, `CATEGORIAID`, `ASOCIACIONID`, `UNIDADESID`, `NOMPRODUCT`, `DESCRIPCIONPRODUCT`, `PRECIOPRODUCT`, `STOCKPRODUCT`, `PVPPRODUCT`, `STATUSPRODUCT`) VALUES
(1, 1000, 1, 1, 'Quesos', 'Queso Mozarella', 3, 30, 3.36, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reunion`
--

CREATE TABLE `reunion` (
  `REUNIONID` int(11) NOT NULL,
  `TIPOREUNIONID` int(11) DEFAULT NULL,
  `ENTIDADID` int(11) DEFAULT NULL,
  `STATUSREUID` int(11) DEFAULT NULL,
  `ASOCIACIONID` int(11) DEFAULT NULL,
  `FECHAINIREU` date NOT NULL,
  `HORAREU` time NOT NULL,
  `TEMAREU` varchar(20) NOT NULL,
  `FECHAFINREU` datetime DEFAULT NULL,
  `HORAFINREU` time DEFAULT NULL,
  `TIPOREU` varchar(20) NOT NULL,
  `ACTA` varchar(40) DEFAULT NULL,
  `HORAS` int(11) DEFAULT NULL,
  `CAPACITADOR` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reunion`
--

INSERT INTO `reunion` (`REUNIONID`, `TIPOREUNIONID`, `ENTIDADID`, `STATUSREUID`, `ASOCIACIONID`, `FECHAINIREU`, `HORAREU`, `TEMAREU`, `FECHAFINREU`, `HORAFINREU`, `TIPOREU`, `ACTA`, `HORAS`, `CAPACITADOR`) VALUES
(1, 2, NULL, 1, 1, '2021-09-24', '12:28:00', 'Apertura ', '2021-09-24 00:00:00', '17:28:00', 'ordinaria', '../pacto/assests/actas/Document_20210714', NULL, NULL),
(2, 2, NULL, NULL, 1, '2021-09-23', '17:03:00', 'Prueba reunion', NULL, NULL, 'Ordinaria', '../pacto/assests/actas/Document_20210714', NULL, NULL),
(4, 2, NULL, 1, 1, '2021-09-25', '15:10:00', 'Prueba Aso 2', NULL, '18:07:00', 'Extraordinaria', '../pacto/assests/actas/Document_20210714', NULL, NULL),
(6, 2, NULL, 1, 2, '2021-10-09', '23:36:00', 'Reunion2', NULL, '02:33:00', 'Extraordinaria', 'Acta2', NULL, NULL),
(7, 2, NULL, 1, 2, '2021-10-23', '01:29:00', 'Reunion3', NULL, '05:25:00', 'Ordinaria', 'asdasd', NULL, NULL),
(8, 2, NULL, 1, 2, '2021-10-09', '01:28:00', 'qweqwe', NULL, '04:25:00', 'Extraordinaria', 'qweqweq', NULL, NULL),
(9, 2, NULL, 1, 1, '2021-10-22', '01:44:00', 'Reunion1', NULL, '05:40:00', 'Extraordinaria', '../pacto/assests/actas/descarga.jpg', NULL, NULL),
(10, 2, NULL, 1, 1, '2021-10-01', '03:30:00', 'qw13', NULL, '07:27:00', 'Ordinaria', 'qweqweq', NULL, NULL),
(11, 2, NULL, 1, 1, '2021-10-03', '06:18:00', 'Ultima', NULL, '06:18:00', 'Ordinaria', 'aaaa', NULL, NULL),
(12, 2, NULL, 1, 1, '2021-09-26', '14:20:00', 'P31', NULL, '14:20:00', 'Ordinaria', '123', NULL, NULL),
(13, 2, NULL, 1, 1, '2021-10-30', '19:24:00', 'Reunion24', NULL, '14:28:00', 'Extraordinaria', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `ROLID` int(11) NOT NULL,
  `ROLNOM` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ROLID`, `ROLNOM`) VALUES
(1, 'SUPER_ROLE'),
(2, 'ADMIN_ROLE'),
(3, 'SOCIO_ROLE'),
(4, 'CLIENTE_ROLE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `statusreunion`
--

CREATE TABLE `statusreunion` (
  `STATUSREUID` int(11) NOT NULL,
  `ESTADOREU` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `statusreunion`
--

INSERT INTO `statusreunion` (`STATUSREUID`, `ESTADOREU`) VALUES
(1, 'PENDIENTE'),
(2, 'EN CURSO'),
(3, 'FINALIZADA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subtotalhojadecampo`
--

CREATE TABLE `subtotalhojadecampo` (
  `SUBHOJADECAMPOID` int(11) NOT NULL,
  `PERTENECENID` int(11) DEFAULT NULL,
  `SUBJORNAL` float DEFAULT NULL,
  `COSJORNAL` float DEFAULT NULL,
  `COSMANO` float DEFAULT NULL,
  `COSFAMI` float DEFAULT NULL,
  `COSLENA` float DEFAULT NULL,
  `COSTRANS` float DEFAULT NULL,
  `COSMANT` float DEFAULT NULL,
  `COSCANA` float DEFAULT NULL,
  `COSTRAPICHE` float DEFAULT NULL,
  `COSTINA` float DEFAULT NULL,
  `COSINFRA` float DEFAULT NULL,
  `OBSERVACIONES` varchar(300) DEFAULT NULL,
  `HOJASTATUS` float DEFAULT NULL,
  `NUMSEMANA` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomantenimiento`
--

CREATE TABLE `tipomantenimiento` (
  `TIPOMANID` int(11) NOT NULL,
  `NOMBRETIP` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiporeunion`
--

CREATE TABLE `tiporeunion` (
  `TIPOREUNIONID` int(11) NOT NULL,
  `TIPOREUNION` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiporeunion`
--

INSERT INTO `tiporeunion` (`TIPOREUNIONID`, `TIPOREUNION`) VALUES
(1, 'Capacitación'),
(2, 'Reunión');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE `unidades` (
  `UNIDADESID` int(11) NOT NULL,
  `NOMUNIDADES` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`UNIDADESID`, `NOMUNIDADES`) VALUES
(1, 'Kg'),
(2, 'L');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `USUARIOID` int(11) NOT NULL,
  `ROLID` int(11) DEFAULT NULL,
  `NOMBREUSU` varchar(20) NOT NULL,
  `EMAILUSU` varchar(30) NOT NULL,
  `TELCUSU` varchar(10) NOT NULL,
  `TELCELUSU` varchar(10) NOT NULL,
  `CONTRAUSU` varchar(60) NOT NULL,
  `DIRUSU` varchar(30) NOT NULL,
  `NOMBREAPEUSU` varchar(40) NOT NULL,
  `HECTAREASUSU` float DEFAULT NULL,
  `CEDULAUSU` varchar(10) NOT NULL,
  `STATUSUSU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`USUARIOID`, `ROLID`, `NOMBREUSU`, `EMAILUSU`, `TELCUSU`, `TELCELUSU`, `CONTRAUSU`, `DIRUSU`, `NOMBREAPEUSU`, `HECTAREASUSU`, `CEDULAUSU`, `STATUSUSU`) VALUES
(1, 1, 'super', 'super@gmail.com', '2599874', '098563214', 'e10adc3949ba59abbe56e057f20f883e', 'David Ledesma', 'Anderson Lucero', 4, '1001578896', 1),
(2, 2, 'admin', 'admin@gmail.com', '023765342', '0999734723', '202cb962ac59075b964b07152d234b70', ' CALDERÓN Y Venezuela', 'Diego Vaca', NULL, '0401918658', 1),
(3, 2, 'admin2', 'admin2@gmail.com', '2294321', '098284319', '202cb962ac59075b964b07152d234b70', ' Pomasqui', 'Carlos Cadena', NULL, '1992342293', 1),
(4, 3, 'EstebanMh', 'esteban@gmail.com', '042567890', '0899734789', ' e10adc3949ba59abbe56e057f20f883e', 'Valle de los Chillos', 'Esteban Javier', 124, '12345678', 1),
(5, 3, 'Juan', '12@gmail.com', '072456321', '0729734789', ' e10adc3949ba59abbe56e057f20f883e', 'Calderon', 'JuanDiego', 123, '4413456', 0),
(6, 2, 'admfinanciero', 'oliverhiugg@gmail.com', '023087059', '0990968883', 'c289ffe12a30c94530b7fc4e532e2f42', ' Recreo', 'Fernando Segovia', NULL, '1724578031', 1),
(7, 3, 'marisoc0001', 'marias@gmail.com', '042345897', '087215345', 'd40b913237b22c538b948e7e44aeb9cf', ' Los Alamos', 'Maria Sanchez', NULL, '1267543212', 1),
(8, 3, 'franksoc0002', 'frank@gmail.com', '023567432', '087234675', '26253c50741faa9c2e2b836773c69fe6', ' Buena Vista', 'Francisco Perez', NULL, '1723456783', 1),
(9, 3, 'marcsoc0003', 'marc@gmail.com', '072143568', '087345213', '97e1e59c0375e0f55c10d4314db20466', ' La Mariscal', 'Marco Diaz', NULL, '1723456787', 1),
(10, 3, 'sergisoc0004', 'sergi@gmail.com', '042789456', '087234678', '8b8d481c6dcdbd24b4e43825c5345309', ' Balcon del Valle', 'Sergio Vasquez', NULL, '1423129876', 1),
(11, 3, 'maresoc0005', 'mare@gmail.com', '023675432', '087234789', '34c119dc749297336f7a1c8b54290123', ' Playon', 'Maria Guzman', NULL, '1256342123', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`ASISTENCIAID`),
  ADD KEY `FK_REFERENCE_38` (`PERTENECENID`),
  ADD KEY `FK_TIENE` (`REUNIONID`);

--
-- Indices de la tabla `asociacion`
--
ALTER TABLE `asociacion`
  ADD PRIMARY KEY (`ASOCIACIONID`);

--
-- Indices de la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD PRIMARY KEY (`BODEGAID`),
  ADD KEY `FK_REFERENCE_34` (`PERTENECENID`);

--
-- Indices de la tabla `categoriaproducto`
--
ALTER TABLE `categoriaproducto`
  ADD PRIMARY KEY (`CATEGORIAID`);

--
-- Indices de la tabla `detallebodega`
--
ALTER TABLE `detallebodega`
  ADD PRIMARY KEY (`DETBODEGAID`),
  ADD KEY `FK_DETALLABODEGA` (`BODEGAID`),
  ADD KEY `FK_REFERENCE_35` (`PRODUCTOID`),
  ADD KEY `FK_REFERENCE_36` (`UNIDADESID`);

--
-- Indices de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD PRIMARY KEY (`DETALLEID`),
  ADD KEY `FK_CONTENER` (`PRODUCTOID`),
  ADD KEY `FK_REFERENCE_29` (`PEDIDOSID`);

--
-- Indices de la tabla `detallemantenimiento`
--
ALTER TABLE `detallemantenimiento`
  ADD PRIMARY KEY (`DETALLEMANTEID`),
  ADD KEY `FK_REFERENCE_30` (`MANTENIMIENTOID`);

--
-- Indices de la tabla `directiva`
--
ALTER TABLE `directiva`
  ADD PRIMARY KEY (`DIRECTIVAID`);

--
-- Indices de la tabla `entidad`
--
ALTER TABLE `entidad`
  ADD PRIMARY KEY (`ENTIDADID`),
  ADD KEY `FK_SE_UBICA` (`PAISID`);

--
-- Indices de la tabla `estadopedido`
--
ALTER TABLE `estadopedido`
  ADD PRIMARY KEY (`ESTADOPEDIDOID`);

--
-- Indices de la tabla `hojadecampo`
--
ALTER TABLE `hojadecampo`
  ADD PRIMARY KEY (`HOJADECAMPOID`),
  ADD KEY `FK_REFERENCE_26` (`SUBHOJADECAMPOID`);

--
-- Indices de la tabla `mantenimientomaquinaria`
--
ALTER TABLE `mantenimientomaquinaria`
  ADD PRIMARY KEY (`MANTENIMIENTOID`),
  ADD KEY `FK_ES` (`TIPOMANID`),
  ADD KEY `FK_TENER` (`MAQUINARIAID`);

--
-- Indices de la tabla `maquinariasocio`
--
ALTER TABLE `maquinariasocio`
  ADD PRIMARY KEY (`MAQUINARIAID`),
  ADD KEY `FK_POSEE` (`PERTENECENID`),
  ADD KEY `FK_REFERENCE_32` (`ENTIDADID`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`PAISID`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`PEDIDOSID`),
  ADD KEY `FK_REFERENCE_28` (`USUARIOID`),
  ADD KEY `FK_REFERENCE_31` (`ESTADOPEDIDOID`);

--
-- Indices de la tabla `pertenecen`
--
ALTER TABLE `pertenecen`
  ADD PRIMARY KEY (`PERTENECENID`),
  ADD KEY `FK_FORMA_PARTE` (`DIRECTIVAID`),
  ADD KEY `FK_PERTENECEN` (`USUARIOID`),
  ADD KEY `FK_PERTENECEN2` (`ASOCIACIONID`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`PRODUCTOID`),
  ADD KEY `FK_PUEDE_TENER` (`CATEGORIAID`),
  ADD KEY `FK_REFERENCE_33` (`ASOCIACIONID`),
  ADD KEY `FK_REFERENCE_37` (`UNIDADESID`);

--
-- Indices de la tabla `reunion`
--
ALTER TABLE `reunion`
  ADD PRIMARY KEY (`REUNIONID`),
  ADD KEY `FK_ESTA` (`STATUSREUID`),
  ADD KEY `FK_PUEDE_DAR` (`ENTIDADID`),
  ADD KEY `FK_PUEDE_SER` (`TIPOREUNIONID`),
  ADD KEY `FK_REFERENCE_39` (`ASOCIACIONID`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ROLID`);

--
-- Indices de la tabla `statusreunion`
--
ALTER TABLE `statusreunion`
  ADD PRIMARY KEY (`STATUSREUID`);

--
-- Indices de la tabla `subtotalhojadecampo`
--
ALTER TABLE `subtotalhojadecampo`
  ADD PRIMARY KEY (`SUBHOJADECAMPOID`),
  ADD KEY `FK_REFERENCE_27` (`PERTENECENID`);

--
-- Indices de la tabla `tipomantenimiento`
--
ALTER TABLE `tipomantenimiento`
  ADD PRIMARY KEY (`TIPOMANID`);

--
-- Indices de la tabla `tiporeunion`
--
ALTER TABLE `tiporeunion`
  ADD PRIMARY KEY (`TIPOREUNIONID`);

--
-- Indices de la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`UNIDADESID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`USUARIOID`),
  ADD KEY `FK_PERTENECE` (`ROLID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `ASISTENCIAID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `asociacion`
--
ALTER TABLE `asociacion`
  MODIFY `ASOCIACIONID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `bodega`
--
ALTER TABLE `bodega`
  MODIFY `BODEGAID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categoriaproducto`
--
ALTER TABLE `categoriaproducto`
  MODIFY `CATEGORIAID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT de la tabla `detallebodega`
--
ALTER TABLE `detallebodega`
  MODIFY `DETBODEGAID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  MODIFY `DETALLEID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallemantenimiento`
--
ALTER TABLE `detallemantenimiento`
  MODIFY `DETALLEMANTEID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `directiva`
--
ALTER TABLE `directiva`
  MODIFY `DIRECTIVAID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entidad`
--
ALTER TABLE `entidad`
  MODIFY `ENTIDADID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estadopedido`
--
ALTER TABLE `estadopedido`
  MODIFY `ESTADOPEDIDOID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `hojadecampo`
--
ALTER TABLE `hojadecampo`
  MODIFY `HOJADECAMPOID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mantenimientomaquinaria`
--
ALTER TABLE `mantenimientomaquinaria`
  MODIFY `MANTENIMIENTOID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `maquinariasocio`
--
ALTER TABLE `maquinariasocio`
  MODIFY `MAQUINARIAID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `PAISID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `PEDIDOSID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pertenecen`
--
ALTER TABLE `pertenecen`
  MODIFY `PERTENECENID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `PRODUCTOID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reunion`
--
ALTER TABLE `reunion`
  MODIFY `REUNIONID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `ROLID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `statusreunion`
--
ALTER TABLE `statusreunion`
  MODIFY `STATUSREUID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `subtotalhojadecampo`
--
ALTER TABLE `subtotalhojadecampo`
  MODIFY `SUBHOJADECAMPOID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipomantenimiento`
--
ALTER TABLE `tipomantenimiento`
  MODIFY `TIPOMANID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tiporeunion`
--
ALTER TABLE `tiporeunion`
  MODIFY `TIPOREUNIONID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `unidades`
--
ALTER TABLE `unidades`
  MODIFY `UNIDADESID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `USUARIOID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `FK_REFERENCE_38` FOREIGN KEY (`PERTENECENID`) REFERENCES `pertenecen` (`PERTENECENID`),
  ADD CONSTRAINT `FK_TIENE` FOREIGN KEY (`REUNIONID`) REFERENCES `reunion` (`REUNIONID`);

--
-- Filtros para la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD CONSTRAINT `FK_REFERENCE_34` FOREIGN KEY (`PERTENECENID`) REFERENCES `pertenecen` (`PERTENECENID`);

--
-- Filtros para la tabla `detallebodega`
--
ALTER TABLE `detallebodega`
  ADD CONSTRAINT `FK_DETALLABODEGA` FOREIGN KEY (`BODEGAID`) REFERENCES `bodega` (`BODEGAID`),
  ADD CONSTRAINT `FK_REFERENCE_35` FOREIGN KEY (`PRODUCTOID`) REFERENCES `producto` (`PRODUCTOID`),
  ADD CONSTRAINT `FK_REFERENCE_36` FOREIGN KEY (`UNIDADESID`) REFERENCES `unidades` (`UNIDADESID`);

--
-- Filtros para la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD CONSTRAINT `FK_CONTENER` FOREIGN KEY (`PRODUCTOID`) REFERENCES `producto` (`PRODUCTOID`),
  ADD CONSTRAINT `FK_REFERENCE_29` FOREIGN KEY (`PEDIDOSID`) REFERENCES `pedidos` (`PEDIDOSID`);

--
-- Filtros para la tabla `detallemantenimiento`
--
ALTER TABLE `detallemantenimiento`
  ADD CONSTRAINT `FK_REFERENCE_30` FOREIGN KEY (`MANTENIMIENTOID`) REFERENCES `mantenimientomaquinaria` (`MANTENIMIENTOID`);

--
-- Filtros para la tabla `entidad`
--
ALTER TABLE `entidad`
  ADD CONSTRAINT `FK_SE_UBICA` FOREIGN KEY (`PAISID`) REFERENCES `pais` (`PAISID`);

--
-- Filtros para la tabla `hojadecampo`
--
ALTER TABLE `hojadecampo`
  ADD CONSTRAINT `FK_REFERENCE_26` FOREIGN KEY (`SUBHOJADECAMPOID`) REFERENCES `subtotalhojadecampo` (`SUBHOJADECAMPOID`);

--
-- Filtros para la tabla `mantenimientomaquinaria`
--
ALTER TABLE `mantenimientomaquinaria`
  ADD CONSTRAINT `FK_ES` FOREIGN KEY (`TIPOMANID`) REFERENCES `tipomantenimiento` (`TIPOMANID`),
  ADD CONSTRAINT `FK_TENER` FOREIGN KEY (`MAQUINARIAID`) REFERENCES `maquinariasocio` (`MAQUINARIAID`);

--
-- Filtros para la tabla `maquinariasocio`
--
ALTER TABLE `maquinariasocio`
  ADD CONSTRAINT `FK_POSEE` FOREIGN KEY (`PERTENECENID`) REFERENCES `pertenecen` (`PERTENECENID`),
  ADD CONSTRAINT `FK_REFERENCE_32` FOREIGN KEY (`ENTIDADID`) REFERENCES `entidad` (`ENTIDADID`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `FK_REFERENCE_28` FOREIGN KEY (`USUARIOID`) REFERENCES `usuario` (`USUARIOID`),
  ADD CONSTRAINT `FK_REFERENCE_31` FOREIGN KEY (`ESTADOPEDIDOID`) REFERENCES `estadopedido` (`ESTADOPEDIDOID`);

--
-- Filtros para la tabla `pertenecen`
--
ALTER TABLE `pertenecen`
  ADD CONSTRAINT `FK_FORMA_PARTE` FOREIGN KEY (`DIRECTIVAID`) REFERENCES `directiva` (`DIRECTIVAID`),
  ADD CONSTRAINT `FK_PERTENECEN` FOREIGN KEY (`USUARIOID`) REFERENCES `usuario` (`USUARIOID`),
  ADD CONSTRAINT `FK_PERTENECEN2` FOREIGN KEY (`ASOCIACIONID`) REFERENCES `asociacion` (`ASOCIACIONID`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_PUEDE_TENER` FOREIGN KEY (`CATEGORIAID`) REFERENCES `categoriaproducto` (`CATEGORIAID`),
  ADD CONSTRAINT `FK_REFERENCE_33` FOREIGN KEY (`ASOCIACIONID`) REFERENCES `asociacion` (`ASOCIACIONID`),
  ADD CONSTRAINT `FK_REFERENCE_37` FOREIGN KEY (`UNIDADESID`) REFERENCES `unidades` (`UNIDADESID`);

--
-- Filtros para la tabla `reunion`
--
ALTER TABLE `reunion`
  ADD CONSTRAINT `FK_ESTA` FOREIGN KEY (`STATUSREUID`) REFERENCES `statusreunion` (`STATUSREUID`),
  ADD CONSTRAINT `FK_PUEDE_DAR` FOREIGN KEY (`ENTIDADID`) REFERENCES `entidad` (`ENTIDADID`),
  ADD CONSTRAINT `FK_PUEDE_SER` FOREIGN KEY (`TIPOREUNIONID`) REFERENCES `tiporeunion` (`TIPOREUNIONID`),
  ADD CONSTRAINT `FK_REFERENCE_39` FOREIGN KEY (`ASOCIACIONID`) REFERENCES `asociacion` (`ASOCIACIONID`);

--
-- Filtros para la tabla `subtotalhojadecampo`
--
ALTER TABLE `subtotalhojadecampo`
  ADD CONSTRAINT `FK_REFERENCE_27` FOREIGN KEY (`PERTENECENID`) REFERENCES `pertenecen` (`PERTENECENID`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_PERTENECE` FOREIGN KEY (`ROLID`) REFERENCES `rol` (`ROLID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

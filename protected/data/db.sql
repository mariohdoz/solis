

CREATE TABLE `administrador` (
  `rut_admin` varchar(10) NOT NULL,
  `nombres_admin` varchar(100) NOT NULL,
  `apellidos_admin` varchar(100) NOT NULL,
  `contrasena_admin` varchar(100) NOT NULL,
  `correo_admin` varchar(100) NOT NULL,
  `telefono_admin` varchar(12) NOT NULL,
  `perfil_admin` varchar(250) NOT NULL,
  `super_admin` tinyint(1) DEFAULT NULL,
  `activo_admin` tinyint(1) DEFAULT NULL,
  `fn_admin` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'funcionario'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`rut_admin`, `nombres_admin`, `apellidos_admin`, `contrasena_admin`, `correo_admin`, `telefono_admin`, `perfil_admin`, `super_admin`, `activo_admin`, `fn_admin`) VALUES
('18183527-3', 'Mario Hernán Douglas', 'Ossandón Zúñiga', '8cb2237d0679ca88db6464eac60da96345513964', 'mario.hdoz1@gmail.com', '+56985352482', '/dist/img/tumblr_inline_nsgianA80i1qhv8ul_50070.gif', 1, 1, 0),
('11111111-1', 'Mario Hernán Douglas', 'Ossandón Zúñiga', '8cb2237d0679ca88db6464eac60da96345513964', 'mario@mail.com', '+5502457787', 'dist/img/avatar5.png', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arrendatario`
--

CREATE TABLE `arrendatario` (
  `rut_arrendatario` varchar(10) NOT NULL COMMENT 'RUT del arrendatario',
  `nombres_arrendatario` varchar(100) NOT NULL COMMENT 'Nombres',
  `apellidos_arrendatario` varchar(100) NOT NULL COMMENT 'Apellidos',
  `estadocivil_arrendatario` varchar(10) NOT NULL COMMENT 'Estado civil',
  `profesion_arrendatario` varchar(250) NOT NULL COMMENT 'Profesión',
  `correo_arrendatario` varchar(100) NOT NULL COMMENT 'Correo electrónico',
  `telefonofijo_arrendatario` varchar(12) DEFAULT NULL COMMENT 'Teléfono fijo',
  `telefonocelular_arrendatario` varchar(12) NOT NULL COMMENT 'Teléfono celular',
  `nrocuenta_arrendatario` varchar(25) DEFAULT NULL COMMENT 'Número de cuenta',
  `banco_arrendatario` varchar(50) DEFAULT NULL COMMENT 'Banco',
  `nacionalidad_arrendatario` varchar(50) NOT NULL COMMENT 'Nacionalidad',
  `empresa_arrendatario` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Empresa',
  `activo_arrendatario` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `arrendatario`
--

INSERT INTO `arrendatario` (`rut_arrendatario`, `nombres_arrendatario`, `apellidos_arrendatario`, `estadocivil_arrendatario`, `profesion_arrendatario`, `correo_arrendatario`, `telefonofijo_arrendatario`, `telefonocelular_arrendatario`, `nrocuenta_arrendatario`, `banco_arrendatario`, `nacionalidad_arrendatario`, `empresa_arrendatario`, `activo_arrendatario`) VALUES
('19206063-k', 'Marcela Andrea', 'Muñoz Campusano', 'Soltero/a', 'Prevencionista', 'marcela@gmail.com', '0255663322', '+56985352482', '19206063', 'Banco estado', 'Chilena', 0, 1),
('18183527-3', 'Mario Hernán Douglas', 'Ossandón Zúñiga ', 'Casado', 'Prevencionista', 'marcela.muñoz@gmail.com', '0255663322', '+56985352482', '19206063', 'Banco estado', 'Chilena', 0, 1),
('11111111-1', 'Mario Hernán Douglas', 'Ossandón Zúñiga ', 'Casado/a', 'Entrenador', 'mario.hdoz1@gmail.com', '+5556852145', '+56985352482', '18183527', 'Banco estado', 'Chilena', 0, 1),
('16569337-k', 'Carlos Sebastían', 'Jimenes Ramírez ', 'Casado/a', 'Técnico en electrónica', 'tn2.2512@gmail.com', '+56969070670', '+56994162738', '16596337', 'Banco estado', 'Chileno', 0, 1),
('14309642-4', 'Yasmin Soledad', 'Salva Ahumada', 'Soltero/a', 'Prevencionista', 'ys.29053@gmail.com', '+5556852145', '+56987456354', '14309642', 'Banco estado', 'Cuenta RUT', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arriendo`
--

CREATE TABLE `arriendo` (
  `id_arriendo` int(11) NOT NULL,
  `id_propiedad` int(11) NOT NULL COMMENT 'Número de ficha',
  `rut_admin` varchar(10) NOT NULL,
  `rut_arrendatario` varchar(10) DEFAULT NULL COMMENT 'RUT del arrendatario',
  `inscripcion_arriendo` date NOT NULL,
  `fechapago_arriendo` int(11) NOT NULL DEFAULT '1' COMMENT 'Fecha de pago',
  `inicio_arriendo` date NOT NULL COMMENT 'Inicio del arriendo',
  `termino_arriendo` date NOT NULL COMMENT 'Término del arriendo',
  `valor_arriendo` int(11) NOT NULL COMMENT 'Valor pactado de arriendo',
  `activo_arriendo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `arriendo`
--

INSERT INTO `arriendo` (`id_arriendo`, `id_propiedad`, `rut_admin`, `rut_arrendatario`, `inscripcion_arriendo`, `fechapago_arriendo`, `inicio_arriendo`, `termino_arriendo`, `valor_arriendo`, `activo_arriendo`) VALUES
(49, 12, '18183527-3', '11111111-1', '2015-12-08', 2, '2015-08-01', '2016-05-04', 700000, 0),
(50, 18, '18183527-3', '18183527-3', '2015-12-08', 20, '2015-10-30', '2015-12-13', 750000, 1),
(48, 16, '18183527-3', '18183527-3', '2015-12-06', 2, '2015-12-06', '2016-11-01', 750000, 1),
(51, 21, '18183527-3', '11111111-1', '2015-12-11', 1, '2015-12-01', '2016-06-01', 850000, 0),
(52, 22, '18183527-3', '16569337-k', '2015-12-11', 1, '2015-03-01', '2016-03-01', 400000, 1),
(53, 23, '18183527-3', '14309642-4', '2015-12-11', 1, '2015-10-01', '2016-04-01', 600000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `rut_cliente` varchar(10) NOT NULL COMMENT 'RUT del cliente',
  `nombres_cliente` varchar(100) NOT NULL COMMENT 'Nombres',
  `apellidos_cliente` varchar(100) NOT NULL COMMENT 'Apellidos',
  `estadocivil_cliente` varchar(10) NOT NULL COMMENT 'Estado civil',
  `profesion_cliente` varchar(100) DEFAULT NULL COMMENT 'Profesión',
  `domicilio_cliente` varchar(150) DEFAULT NULL COMMENT 'domicilio',
  `correo_cliente` varchar(100) DEFAULT NULL COMMENT 'Correo electrónico',
  `telefonofijo_cliente` varchar(12) DEFAULT NULL COMMENT 'Teléfono fijo',
  `telefonocelular_cliente` varchar(12) DEFAULT NULL COMMENT 'Teléfono celular',
  `nrocuenta_cliente` varchar(25) DEFAULT NULL COMMENT 'Número de cuenta',
  `banco_cliente` varchar(50) DEFAULT NULL COMMENT 'Banco',
  `tipocuenta_cliente` varchar(40) DEFAULT NULL COMMENT 'Tipo de cuenta',
  `activo_cliente` tinyint(1) DEFAULT '1' COMMENT 'Cliente activo'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`rut_cliente`, `nombres_cliente`, `apellidos_cliente`, `estadocivil_cliente`, `profesion_cliente`, `domicilio_cliente`, `correo_cliente`, `telefonofijo_cliente`, `telefonocelular_cliente`, `nrocuenta_cliente`, `banco_cliente`, `tipocuenta_cliente`, `activo_cliente`) VALUES
('19206063-k', 'Marcela Andrea', 'Muñoz Campusano', 'Viudo/a', 'Periodismo periodístico ', 'Población Manuel Rodríguez, calle Til-Til 1301', 'mario.hdoz1@gmail.com', '+0255337744', '+56985352482', '18183527', 'Banco estado', 'Soltero/a', 1),
('18045248-6', 'Alejandro Esteban', 'Tamayo Echavarrìa', 'Soltero/a', 'Ingenierìa en informàtica', 'Av. Prat 2337', 'aete.xd@hotmail.com', '055896266', '71977092', '18045248', 'banco Estado', 'Casado/a', 0),
('18183527-3', 'Mario Hernán Douglas', 'Ossandón Zúñiga', 'Viudo/a', 'Periodismo periodístico ', 'Población Manuel Rodríguez, calle Til-Til 1301', 'mario.hdoz1@gmail.com', '+0255337744', '+56985352482', '18183527', 'Banco estado', 'Viudo/a', 1),
('15875206-9', 'Cristian Leonardo', 'Sandoval Mercado', 'Soltero/a', 'Empleado', 'Tikan Kabur n°3745, villa portal del Inca IV, Calama.', 'cristian.leonardo2@gmail.com', '+0552548752', '+56957237899', '15875206', 'Banco estado', 'Cuenta RUT', 1),
('11505914-9', 'Victor Antonio ', 'Parra Oyarzo', 'Casado/a', 'Eléctrico industrial', 'Thompson 1970, depto 601, Torre A, Iquique. ', 'parra_victor@gmail.com', '+02365577', '+56945368452', '11505914', 'Banco chile', 'Cuenta ahorro', 1),
('9801273-7', 'Nelson Bernardo ', 'Garrido Muñoz', 'Casado/a', 'Electricista ', '', 'nelson.garrido85@gmail.com', '', '+5699177782', '9801273', 'Banco chile', 'Cuenta ahorro', 1),
('10336217-2', 'Eric Antonio', 'Rojas Alegria', 'Casado/a', 'Empresario', '21 de Mayo 730, Antofagasta.', 'erojas@inversionessantaisabel.cl', '', '+56998874390', '0504-0147-010000-2760', 'Banco BBVA', 'Cuenta corriente', 1),
('8264792-9', 'Elizabeth De Lourdes', 'Heimrich Cortez', 'Viudo/a', 'Jubilada', 'Mario Kreutsberger  1558 depto 709.', 'eli.lourdes64@gmail.com', '', '+56987565425', '8264792', 'banco Estado', 'Cuenta ahorro', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `id_documento` int(11) NOT NULL COMMENT 'Id del documento',
  `id_arriendo` int(11) DEFAULT NULL COMMENT 'Id del arriendo ',
  `rut_arrendatario` varchar(10) DEFAULT NULL COMMENT 'Id del arrendatario',
  `id_propiedad` int(11) DEFAULT NULL COMMENT 'Id de la propiedad',
  `rut_cliente` varchar(10) DEFAULT NULL COMMENT 'RUT del cliente',
  `url_documento` varchar(250) NOT NULL COMMENT 'ubicación del documento',
  `tipo_documento` varchar(50) DEFAULT NULL COMMENT 'Tipo de documento'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`id_documento`, `id_arriendo`, `rut_arrendatario`, `id_propiedad`, `rut_cliente`, `url_documento`, `tipo_documento`) VALUES
(27, NULL, '19206063-k', NULL, NULL, '3067.docx', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionario`
--

CREATE TABLE `funcionario` (
  `rut_funcionario` varchar(10) NOT NULL,
  `nombres_funcionario` varchar(100) NOT NULL,
  `apellidos_funcionario` varchar(100) NOT NULL,
  `telefonofijo_funcionario` varchar(12) NOT NULL,
  `telefonocelular_funcionario` varchar(12) NOT NULL,
  `domicilio_funcionario` varchar(150) NOT NULL,
  `correo_funcionario` varchar(100) NOT NULL,
  `contrasena_funcionario` varchar(255) NOT NULL,
  `activo_funcionario` tinyint(1) NOT NULL DEFAULT '1',
  `eliminado_funcionario` tinyint(1) NOT NULL DEFAULT '0',
  `cargo_funcionario` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `funcionario`
--

INSERT INTO `funcionario` (`rut_funcionario`, `nombres_funcionario`, `apellidos_funcionario`, `telefonofijo_funcionario`, `telefonocelular_funcionario`, `domicilio_funcionario`, `correo_funcionario`, `contrasena_funcionario`, `activo_funcionario`, `eliminado_funcionario`, `cargo_funcionario`) VALUES
('18183527-3', 'Mario Hernán Douglas', 'Ossandón Zúñiga', '+56985352482', '+5502457787', 'Total asd aopwoejp dapsodop', 'mario.hdoz1@gmail.com', '60149a289a3623cd214943af2892e103f4bddafb', 1, 1, 'Aseo'),
('11111111-1', 'Mario Hernán Douglas', 'Ossandón Zúñiga', '+56985352482', '+5502457787', 'Total asd aopwoejp dapsodop', 'mario@mail.com', 'cfdd856644c3aaede807632a9e8fa484162b7629', 1, 0, 'Casa nova');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` int(11) NOT NULL,
  `id_propiedad` int(11) NOT NULL,
  `url_imagen` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id_imagen`, `id_propiedad`, `url_imagen`) VALUES
(67, 16, 'A._S._Bradford_House.JPG'),
(66, 16, 'house-01.jpg'),
(65, 16, 'house-05.jpg'),
(64, 16, 'house-07.jpg'),
(110, 24, '10403549_1411469549162984_7637427299138501149_n (1).jpg'),
(109, 24, '10533982_1411469565829649_4800092144529447706_n.jpg'),
(105, 23, 'unnamed (2).jpg'),
(106, 23, 'unnamed (4).jpg'),
(104, 23, 'unnamed (3).jpg'),
(111, 25, 'unnamed (10).jpg'),
(112, 25, 'unnamed (5).jpg'),
(113, 25, 'unnamed (6).jpg'),
(114, 25, 'unnamed (9).jpg'),
(115, 25, 'unnamed (7).jpg'),
(116, 26, 'unnamed (17).jpg'),
(117, 26, 'unnamed (18).jpg'),
(118, 26, 'unnamed.jpg'),
(119, 26, 'unnamed (12).jpg'),
(120, 27, 'unnamed (2) (3).jpg'),
(121, 27, 'unnamed (5) (1).jpg'),
(122, 27, 'unnamed (8).jpg'),
(123, 27, 'unnamed (11) (1).jpg'),
(124, 27, 'unnamed (14).jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordentrabajo`
--

CREATE TABLE `ordentrabajo` (
  `id_ot` int(11) NOT NULL,
  `rut_funcionario` varchar(10) NOT NULL DEFAULT '0',
  `rut_admin` varchar(10) NOT NULL,
  `descripcion_ot` text NOT NULL,
  `fechaemision_ot` date NOT NULL,
  `fechaejecucion_ot` date NOT NULL,
  `estado_ot` tinyint(1) NOT NULL DEFAULT '1',
  `inicio_ot` date NOT NULL COMMENT 'Fecha de inicio',
  `servicio_ot` varchar(50) NOT NULL COMMENT 'Servicio a realizar',
  `observacion_ot` text NOT NULL COMMENT 'Observaciones',
  `totalpagar_ot` int(11) NOT NULL COMMENT 'Total a pagar',
  `formapago_ot` varchar(50) NOT NULL COMMENT 'Forma de pago'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ordentrabajo`
--

INSERT INTO `ordentrabajo` (`id_ot`, `rut_funcionario`, `rut_admin`, `descripcion_ot`, `fechaemision_ot`, `fechaejecucion_ot`, `estado_ot`, `inicio_ot`, `servicio_ot`, `observacion_ot`, `totalpagar_ot`, `formapago_ot`) VALUES
(22, '0', '18183527-3', 'jasdkljasdlkj', '2015-12-05', '2015-12-05', 1, '2015-12-05', 'Aseo de propiedad', 'lskjdalsjdlaksjd', 25000, 'Efectivo'),
(21, '0', '18183527-3', 'jasdkljasdlkj', '2015-12-05', '2015-12-05', 1, '2015-12-05', 'Aseo de propiedad', 'lskjdalsjdlaksjd', 25000, 'Efectivo'),
(20, '0', '18183527-3', 'kasdlkjasldjl', '2015-12-05', '2015-12-06', 0, '2015-12-06', 'Tasación', 'LASKJDALKSDJASD', 123456, 'Efectivo'),
(19, '0', '18183527-3', 'sdfsdf', '2015-12-05', '2015-12-05', 1, '2015-12-04', 'sdf', 'sdfsdf', 324234, 'ssdfsdf'),
(17, '0', '18183527-3', 'adasd', '2015-12-04', '2015-12-05', 1, '2015-12-04', 'Arriendo', 'asdasd', 850000, 'Efectivo'),
(18, '0', '18183527-3', 'adasd', '2015-12-04', '2015-12-05', 1, '2015-12-04', 'Arriendo', 'asdasd', 850000, 'Efectivo'),
(23, '18183527-3', '18183527-3', 'asdasd', '2015-12-08', '2015-12-07', 1, '2015-12-07', 'Inventariado', 'asdasd', 75000, 'Efectivo'),
(24, '18183527-3', '18183527-3', 'asdasd', '2015-12-08', '2015-12-09', 1, '2015-12-08', 'Inventariado', 'asdasd', 85000, 'Efectivo'),
(25, '11111111-1', '18183527-3', 'asldkjasdlkj', '2015-12-11', '2015-12-11', 1, '2015-12-11', 'Inspección', 'jklaskjdlaksjdlaksjdlaksjd', 25000, 'Cheque');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL,
  `id_arriendo` int(11) DEFAULT NULL,
  `fecha_pago` date NOT NULL,
  `mes_pago` varchar(10) NOT NULL COMMENT 'Mes de pago',
  `totalpagado_pago` int(11) NOT NULL,
  `activo_pago` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Pago concluido',
  `id_ot` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id_pago`, `id_arriendo`, `fecha_pago`, `mes_pago`, `totalpagado_pago`, `activo_pago`, `id_ot`) VALUES
(217, 49, '2015-12-08', '2-05-2016', 0, 0, NULL),
(215, 49, '2015-12-08', '2-03-2016', 0, 0, NULL),
(179, 48, '2015-12-06', '2-11-2016', 0, 1, NULL),
(178, 48, '2015-12-06', '2-10-2016', 0, 1, NULL),
(177, 48, '2015-12-06', '2-09-2016', 0, 1, NULL),
(176, 48, '2015-12-06', '2-08-2016', 0, 1, NULL),
(175, 48, '2015-12-06', '2-07-2016', 0, 1, NULL),
(174, 48, '2015-12-06', '2-06-2016', 0, 1, NULL),
(173, 48, '2015-12-06', '2-05-2016', 0, 1, NULL),
(172, 48, '2015-12-06', '2-04-2016', 0, 1, NULL),
(171, 48, '2015-12-06', '2-03-2016', 0, 1, NULL),
(170, 48, '2015-12-06', '2-02-2016', 0, 1, NULL),
(169, 48, '2015-12-06', '2-01-2016', 0, 1, NULL),
(168, 48, '2015-12-06', '2-12-2015', 250000, 1, NULL),
(216, 49, '2015-12-08', '2-04-2016', 0, 0, NULL),
(185, 50, '2015-12-08', '20-10-2015', 0, 1, NULL),
(186, 50, '2015-12-08', '20-11-2015', 0, 1, NULL),
(214, 49, '2015-12-08', '2-02-2016', 0, 0, NULL),
(213, 49, '2015-12-08', '2-01-2016', 0, 0, NULL),
(212, 49, '2015-12-08', '2-12-2015', 0, 0, NULL),
(211, 49, '2015-12-08', '2-11-2015', 0, 0, NULL),
(210, 49, '2015-12-08', '2-10-2015', 0, 0, NULL),
(209, 49, '2015-12-08', '2-09-2015', 0, 0, NULL),
(208, 49, '2015-12-08', '2-08-2015', 700000, 0, NULL),
(218, 51, '2015-12-11', '1-12-2015', 850000, 0, NULL),
(219, 51, '2015-12-11', '1-01-2016', 0, 1, NULL),
(220, 51, '2015-12-11', '1-02-2016', 0, 1, NULL),
(221, 51, '2015-12-11', '1-03-2016', 0, 1, NULL),
(222, 51, '2015-12-11', '1-04-2016', 0, 1, NULL),
(223, 51, '2015-12-11', '1-05-2016', 0, 1, NULL),
(224, 51, '2015-12-11', '1-06-2016', 0, 1, NULL),
(225, 52, '2015-12-11', '1-03-2015', 400000, 0, NULL),
(226, 52, '2015-12-11', '1-04-2015', 400000, 0, NULL),
(227, 52, '2015-12-11', '1-05-2015', 400000, 0, NULL),
(228, 52, '2015-12-11', '1-06-2015', 400000, 0, NULL),
(229, 52, '2015-12-11', '1-07-2015', 400000, 0, NULL),
(230, 52, '2015-12-11', '1-08-2015', 400000, 0, NULL),
(231, 52, '2015-12-11', '1-09-2015', 400000, 0, NULL),
(232, 52, '2015-12-11', '1-10-2015', 400000, 0, NULL),
(233, 52, '2015-12-11', '1-11-2015', 0, 1, NULL),
(234, 52, '2015-12-11', '1-12-2015', 0, 1, NULL),
(235, 52, '2015-12-11', '1-01-2016', 0, 1, NULL),
(236, 52, '2015-12-11', '1-02-2016', 0, 1, NULL),
(237, 52, '2015-12-11', '1-03-2016', 0, 1, NULL),
(238, 53, '2015-12-11', '1-10-2015', 600000, 0, NULL),
(239, 53, '2015-12-11', '1-11-2015', 600000, 0, NULL),
(240, 53, '2015-12-11', '1-12-2015', 600000, 0, NULL),
(241, 53, '2015-12-11', '1-01-2016', 0, 1, NULL),
(242, 53, '2015-12-11', '1-02-2016', 0, 1, NULL),
(243, 53, '2015-12-11', '1-03-2016', 0, 1, NULL),
(244, 53, '2015-12-11', '1-04-2016', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad`
--

CREATE TABLE `propiedad` (
  `id_propiedad` int(11) NOT NULL,
  `rut_cliente` varchar(10) DEFAULT NULL,
  `direccion_propiedad` varchar(255) NOT NULL,
  `numero_propiedad` int(11) DEFAULT NULL COMMENT 'Número ',
  `habitacion_propiedad` int(11) DEFAULT NULL,
  `bano_propiedad` int(11) DEFAULT NULL,
  `terreno_propiedad` varchar(50) DEFAULT NULL,
  `construido_propiedad` varchar(50) DEFAULT NULL,
  `tipo_propiedad` varchar(25) NOT NULL,
  `servicio_propiedad` varchar(10) NOT NULL,
  `descripcion_propiedad` text,
  `comuna_propiedad` varchar(20) NOT NULL,
  `amoblado_propiedad` tinyint(1) NOT NULL DEFAULT '0',
  `valor_propiedad` int(11) NOT NULL,
  `activo_propiedad` tinyint(1) DEFAULT '1',
  `eliminado_propiedad` tinyint(1) NOT NULL DEFAULT '0',
  `comision_propiedad` int(11) DEFAULT '0' COMMENT 'Comisión ',
  `ingreso_propiedad` date NOT NULL DEFAULT '2015-01-01' COMMENT 'Fecha de ingreso'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `propiedad`
--

INSERT INTO `propiedad` (`id_propiedad`, `rut_cliente`, `direccion_propiedad`, `numero_propiedad`, `habitacion_propiedad`, `bano_propiedad`, `terreno_propiedad`, `construido_propiedad`, `tipo_propiedad`, `servicio_propiedad`, `descripcion_propiedad`, `comuna_propiedad`, `amoblado_propiedad`, `valor_propiedad`, `activo_propiedad`, `eliminado_propiedad`, `comision_propiedad`, `ingreso_propiedad`) VALUES
(12, '18045248-6', 'Aconcagua', 3007, 2, 1, '', '', 'Departamento Habitación', 'Venta', 'comedor y cocina juntas, walking closet, terraza,incluye gastos comunes', 'Calama', 1, 700000, 0, 1, 1, '2015-01-01'),
(10, '18045248-6', 'Aconcagua ', 3009, 5, 2, '40m2', '35m2', 'Casa', 'Venta', 'Casa esquina  en  la  ciudad de  Calama  de  un  piso ', 'Calama', 1, 150000000, 0, 1, 4, '2015-01-01'),
(16, '19206063-k', 'Balmaceda #3242', NULL, 9, 9, '40.m2', '45m²', 'Propiedad de inversión', 'Venta', 'Mall plaza Calama', 'Calama', 1, 789456123, 0, 0, 1, '2015-01-01'),
(20, '18183527-3', 'Población Manuel Rodríguez, calle Til Til #1301', 12345, 3, 3, '50m²', '45m²', 'Departamento Habitación', 'Arriendo', 'Lorem ipsum dolor sit amet, nisl molestiae ne eum. Pri eirmod probatus deterruisset ei, at prompta appareat his, vis option civibus et. Id mei aliquid adversarium, dolor ocurreret pro eu. Has sale facete ne. Periculis theophrastus an usu, in accusam efficiendi neglegentur nec, sonet perpetua has ne. Novum atomorum tractatos mei id, vel mollis aliquip at, ius unum cetero viderer te.\r\n\r\nEros quaeque mel at. Error scriptorem at his, vero zril his at. Mel no veritus omnesque cotidieque, ea mediocrem splendide evertitur mel. Id sea voluptua recusabo, usu persius reprimique temporibus te.\r\n\r\nEos vitae repudiandae ei, an duo saperet minimum liberavisse. Iriure utroque suavitate ea nec. Ad cum docendi officiis, semper vituperatoribus ex mel. Elitr urbanitas ea usu, has at habeo aperiri. Veritus tibique corpora nam et, veritus accumsan molestie te sit. His facilis civibus detracto et.\r\n\r\nTe ludus voluptatibus reprehendunt mea. Fabellas menandri inimicus vis te. Saepe timeam nam ex, ius nostro vocent inimicus et, eam omnis causae no. Et wisi adolescens reformidans mei, verterem sensibus vis ne.\r\n', 'Antofagasta', 1, 90000000, 1, 0, 4, '2015-12-06'),
(18, '18183527-3', 'Calle Til Til 1301 Población Manuel Rodríguez', NULL, 4, 5, '50m²', '45m²', 'Casa', 'Venta', 'Lorem ipsum dolor sit amet, epicurei expetendis ex sea. Id prima gloriatur cum, posse dolores mediocritatem vim an, nullam animal consectetuer te vel. Sit id mazim debet. Ne mazim aeterno quaeque eos, posse offendit an mel.\r\n\r\nQuodsi viderer sententiae has eu, eam cu cibo regione corpora. Mea inani aeque id. Sea scripserit adversarium ea, cu utinam inimicus percipitur sed. Assum admodum eu usu, eius populo evertitur has at, insolens theophrastus vis ea. Diam copiosae necessitatibus ex sed, ei facete cetero tincidunt est, no ius facilis explicari.\r\n\r\nVirtute discere utroque in nam, est cu alii primis verterem, ad ipsum dicta splendide sit. Munere cotidieque ne nam. Duo no nisl partem maiorum, eu doming denique cum. In apeirian iracundia cum, ea mel idque dissentiunt.\r\n\r\nEi congue recusabo sapientem eum, prima scribentur ius ut. Ius ut persius efficiendi, quod veritus est id. Purto deserunt ea eos. Tantas lobortis evertitur pro ex.\r\n\r\nId regione torquatos vituperatoribus nam, quo dicit nobis ea. Ne option platonem cum, sit fuisset aliquando conceptam in. Nonumy primis nam id, nisl atomorum ex usu. Mundi tation reprimique te eos. At offendit pertinax eum. Ea doctus cotidieque mea.', 'Antofagasta', 1, 750000, 0, 0, 15, '2015-11-23'),
(21, '18045248-6', 'Tiltil 1301', NULL, 3, NULL, '50m²', '45m²', 'Oficina Departamento', 'Arriendo', 'Hermosa propiedad ubicada en tu lkjasdljkasd', 'Calama', 1, 850000, 0, 1, 8, '2015-12-11'),
(22, '15875206-9', 'Tikan Kabur sur ', 3745, 3, 2, '50m²', '45m²', 'Casa', 'Arriendo', 'Se arrienda cómoda propiedad en excelentes condiciones ubicada en Tikan Kabur sur, consta con 3 amplios dormitorios uno en suite, posee 2 baños, uno de visita y uno completo, dos pisos, cocina tipo americana, estacionamiento para dos vehículos y patio amplio.', 'Calama', 0, 400000, 0, 0, 10, '2015-12-11'),
(23, '11505914-9', 'Oasis caspana 2954', NULL, 5, 2, '30m²', '45m²', 'Casa', 'Venta', 'Casa grande en Villa Oasis, consta de estacionamiento, ante jardín cerrado, 5 dormitorios, 2 baños, living comedor,lavandería , cocina amoblada, lavandería, patio trasero incluye un horno de barro. ', 'Calama', 1, 600000, 0, 0, 10, '2015-12-11'),
(24, '9801273-7', 'Paula jaraquemada', NULL, 3, 1, '', '', 'Casa', 'Venta', 'Se vende casa ubicada en Paula jaraquemada. Casa esquina con gran terreno para seguir construyendo, consta con ante jardín amplio, estacionamiento, living comedor, lavandería y un patio trasero amplio. ', 'Calama', 1, 220000000, 1, 0, 4, '2015-12-11'),
(25, '10336217-2', 'Balmaceda 1504', 904, 2, 2, '', '', 'Departamento Habitación', 'Arriendo', 'En plena Avenida Balmaceda. Gran conectividad, a minutos del Aeropuerto Internacional El Loa. Conexión directa con rutas a Chuquicamata, Antofagasta y San Pedro de Atacama.\r\nCercano a comercio, mall, oficinas, instituciones financieras, edificio corporativo de Codelco y mucho más\r\nGimnasio equipado.\r\nSala multiuso con terraza propia e independiente.\r\nLavandería equipada.\r\nAislación térmica y acústica.\r\nCocinas americanas “full eléctrica“ y full equipadas.\r\nExtracción forzada de aire en baños.\r\nVentanales de termo panel.\r\nPisos pavimento PVC madera en estar y dormitorios.', 'Calama', 1, 550000, 1, 0, 10, '2015-12-11'),
(26, '10336217-2', 'Balmaceda 1504', 401, 2, 2, '', '', 'Departamento Habitación', 'Venta', 'En plena Avenida Balmaceda. Gran conectividad, a minutos del Aeropuerto Internacional El Loa. Conexión directa con rutas a Chuquicamata, Antofagasta y San Pedro de Atacama. Cercano a comercio, mall, oficinas, instituciones financieras, edificio corporativo de Codelco y mucho más Gimnasio equipado. Sala multiuso con terraza propia e independiente. Lavandería equipada. Aislación térmica y acústica. Cocinas americanas “full eléctrica“ y full equipadas. Extracción forzada de aire en baños. Ventanales de termo panel. Pisos pavimento PVC madera en estar y dormitorios.', 'Calama', 1, 110000000, 1, 0, 4, '2015-12-11'),
(27, '8264792-9', 'Chorrillos 1099', 12, 4, 2, '', '', 'Casa', 'Arriendo', 'Se Arrienda casa en condominio Louis consta de cuatro  dormitorios, tres baños, 2 completos, 1 visita, living comedor, cocina, 2 estacionamientos  y cuenta con un amplio patio trasero .\r\n', 'Calama', 0, 600000, 1, 0, 10, '2015-12-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id_solicitud` int(11) NOT NULL,
  `rut_cliente` varchar(10) DEFAULT NULL,
  `rut_funcionario` varchar(10) DEFAULT NULL,
  `nombres_solicitud` varchar(100) DEFAULT NULL,
  `apellidos_solicitud` varchar(100) DEFAULT NULL,
  `servicio_solicitud` varchar(25) NOT NULL,
  `fecha_solicitud` date DEFAULT NULL,
  `fechaejecucion_solicitud` date DEFAULT NULL,
  `telefono_solicitud` varchar(12) DEFAULT NULL,
  `estado_solicitud` tinyint(1) NOT NULL DEFAULT '1',
  `descripcion_solicitud` text NOT NULL,
  `tipopropiedad_solicitud` varchar(50) DEFAULT NULL,
  `correo_solicitud` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id_solicitud`, `rut_cliente`, `rut_funcionario`, `nombres_solicitud`, `apellidos_solicitud`, `servicio_solicitud`, `fecha_solicitud`, `fechaejecucion_solicitud`, `telefono_solicitud`, `estado_solicitud`, `descripcion_solicitud`, `tipopropiedad_solicitud`, `correo_solicitud`) VALUES
(98, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-11', NULL, '+56985352482', 1, 'asdkljalksdjalk sjdlkajsdlk jas ', NULL, 'Mario.hdoz1@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `id_propiedad` int(11) NOT NULL COMMENT 'Número de ficha',
  `rut_admin` varchar(10) NOT NULL COMMENT 'RUT del administrador',
  `nombrescomprador_venta` varchar(100) NOT NULL COMMENT 'Nombres de comprador',
  `apellidoscomprador_venta` varchar(100) NOT NULL COMMENT 'Apellidos del comprador',
  `rutcomprador_venta` varchar(10) NOT NULL COMMENT 'RUT del comprador',
  `comisioncomprador_venta` int(11) NOT NULL DEFAULT '2' COMMENT 'Comisión a comprador',
  `comisioncliente_venta` int(11) NOT NULL DEFAULT '2' COMMENT 'Comisión a vendedor',
  `ganancia_venta` varchar(50) NOT NULL COMMENT 'Ganancia de la venta'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `id_propiedad`, `rut_admin`, `nombrescomprador_venta`, `apellidoscomprador_venta`, `rutcomprador_venta`, `comisioncomprador_venta`, `comisioncliente_venta`, `ganancia_venta`) VALUES
(15, 10, '18183527-3', 'Mario Hernán Douglas', 'Ossandon Zuñigó', '11111111-1', 2, 2, '6000000');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`rut_admin`);

--
-- Indices de la tabla `arrendatario`
--
ALTER TABLE `arrendatario`
  ADD PRIMARY KEY (`rut_arrendatario`);

--
-- Indices de la tabla `arriendo`
--
ALTER TABLE `arriendo`
  ADD PRIMARY KEY (`id_arriendo`),
  ADD KEY `fk_gestiona` (`rut_admin`),
  ADD KEY `fk_incumbe` (`rut_arrendatario`),
  ADD KEY `fk_puede` (`id_propiedad`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`rut_cliente`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id_documento`),
  ADD KEY `fk_contiene` (`id_arriendo`),
  ADD KEY `fk_corresponde` (`id_propiedad`),
  ADD KEY `fk_entrega` (`rut_arrendatario`),
  ADD KEY `fk_cliente` (`rut_cliente`);

--
-- Indices de la tabla `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`rut_funcionario`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `fk_representa` (`id_propiedad`);

--
-- Indices de la tabla `ordentrabajo`
--
ALTER TABLE `ordentrabajo`
  ADD PRIMARY KEY (`id_ot`),
  ADD KEY `fk_crea` (`rut_admin`),
  ADD KEY `fk_integra` (`rut_funcionario`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `fk_acata` (`id_arriendo`),
  ADD KEY `fk_relationship_18` (`id_ot`);

--
-- Indices de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  ADD PRIMARY KEY (`id_propiedad`),
  ADD KEY `fk_posee` (`rut_cliente`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `fk_elabora` (`rut_funcionario`),
  ADD KEY `fk_realiza` (`rut_cliente`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `fk_acoge` (`id_propiedad`),
  ADD KEY `fk_concibe` (`rut_admin`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arriendo`
--
ALTER TABLE `arriendo`
  MODIFY `id_arriendo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del documento', AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT de la tabla `ordentrabajo`
--
ALTER TABLE `ordentrabajo`
  MODIFY `id_ot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;
--
-- AUTO_INCREMENT de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  MODIFY `id_propiedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

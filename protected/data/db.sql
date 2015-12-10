-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-12-2015 a las 01:03:13
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de datos: `sun`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `rut_admin` varchar(10) NOT NULL,
  `nombres_admin` varchar(100) NOT NULL,
  `apellidos_admin` varchar(100) NOT NULL,
  `contrasena_admin` varchar(100) NOT NULL,
  `correo_admin` varchar(100) NOT NULL,
  `telefono_admin` varchar(12) NOT NULL,
  `perfil_admin` varchar(250) NOT NULL,
  `super_admin` tinyint(1) default NULL,
  `activo_admin` tinyint(1) default NULL,
  `fn_admin` tinyint(1) NOT NULL default '0' COMMENT 'funcionario',
  PRIMARY KEY  (`rut_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `administrador`
--

INSERT INTO `administrador` VALUES ('18183527-3', 'Mario Hernán Douglas', 'Ossandón Zúñiga', '8cb2237d0679ca88db6464eac60da96345513964', 'mario.hdoz1@gmail.com', '+56985352482', 'dist/img/avatar5.png', 1, 1, 0);

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
  `telefonofijo_arrendatario` varchar(12) default NULL COMMENT 'Teléfono fijo',
  `telefonocelular_arrendatario` varchar(12) NOT NULL COMMENT 'Teléfono celular',
  `nrocuenta_arrendatario` varchar(25) default NULL COMMENT 'Número de cuenta',
  `banco_arrendatario` varchar(50) default NULL COMMENT 'Banco',
  `nacionalidad_arrendatario` varchar(50) NOT NULL COMMENT 'Nacionalidad',
  `empresa_arrendatario` tinyint(1) NOT NULL default '0' COMMENT 'Empresa',
  `activo_arrendatario` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`rut_arrendatario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `arrendatario`
--

INSERT INTO `arrendatario` VALUES ('19206063-k', 'Marcela Andrea', 'Muñoz Campusano', 'Soltero/a', 'Prevencionista', 'marcela@gmail.com', '0255663322', '+56985352482', '19206063', 'Banco estado', 'Chilena', 0, 1);
INSERT INTO `arrendatario` VALUES ('18183527-3', 'Mario Hernán Douglas', 'Ossandón Zúñiga ', 'Casado', 'Prevencionista', 'marcela.muñoz@gmail.com', '0255663322', '+56985352482', '19206063', 'Banco estado', 'Chilena', 0, 1);
INSERT INTO `arrendatario` VALUES ('11111111-1', 'Mario Hernán Douglas', 'Ossandón Zúñiga ', 'Casado/a', 'Entrenador', 'mario.hdoz1@gmail.com', '+5556852145', '+56985352482', '18183527', 'Banco estado', 'Chilena', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arriendo`
--

CREATE TABLE `arriendo` (
  `id_arriendo` int(11) NOT NULL auto_increment,
  `id_propiedad` int(11) NOT NULL COMMENT 'Número de ficha',
  `rut_admin` varchar(10) NOT NULL,
  `rut_arrendatario` varchar(10) default NULL COMMENT 'RUT del arrendatario',
  `inscripcion_arriendo` date NOT NULL,
  `fechapago_arriendo` int(11) NOT NULL default '1' COMMENT 'Fecha de pago',
  `inicio_arriendo` date NOT NULL COMMENT 'Inicio del arriendo',
  `termino_arriendo` date NOT NULL COMMENT 'Término del arriendo',
  `valor_arriendo` int(11) NOT NULL COMMENT 'Valor pactado de arriendo',
  `activo_arriendo` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id_arriendo`),
  KEY `fk_gestiona` (`rut_admin`),
  KEY `fk_incumbe` (`rut_arrendatario`),
  KEY `fk_puede` (`id_propiedad`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Volcar la base de datos para la tabla `arriendo`
--

INSERT INTO `arriendo` VALUES (49, 12, '18183527-3', '11111111-1', '2015-12-08', 2, '2015-08-01', '2016-05-04', 700000, 0);
INSERT INTO `arriendo` VALUES (50, 18, '18183527-3', '18183527-3', '2015-12-08', 20, '2015-10-30', '2015-12-13', 750000, 1);
INSERT INTO `arriendo` VALUES (48, 16, '18183527-3', '18183527-3', '2015-12-06', 2, '2015-12-06', '2016-11-01', 750000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `rut_cliente` varchar(10) NOT NULL COMMENT 'RUT del cliente',
  `nombres_cliente` varchar(100) NOT NULL COMMENT 'Nombres',
  `apellidos_cliente` varchar(100) NOT NULL COMMENT 'Apellidos',
  `estadocivil_cliente` varchar(10) NOT NULL COMMENT 'Estado civil',
  `profesion_cliente` varchar(100) default NULL COMMENT 'Profesión',
  `domicilio_cliente` varchar(150) default NULL COMMENT 'domicilio',
  `correo_cliente` varchar(100) default NULL COMMENT 'Correo electrónico',
  `telefonofijo_cliente` varchar(12) default NULL COMMENT 'Teléfono fijo',
  `telefonocelular_cliente` varchar(12) default NULL COMMENT 'Teléfono celular',
  `nrocuenta_cliente` varchar(25) default NULL COMMENT 'Número de cuenta',
  `banco_cliente` varchar(50) default NULL COMMENT 'Banco',
  `tipocuenta_cliente` varchar(40) default NULL COMMENT 'Tipo de cuenta',
  `activo_cliente` tinyint(1) default '1' COMMENT 'Cliente activo',
  PRIMARY KEY  (`rut_cliente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `cliente`
--

INSERT INTO `cliente` VALUES ('19206063-k', 'Marcela Andrea', 'Muñoz Campusano', 'Viudo/a', 'Periodismo periodístico ', 'Población Manuel Rodríguez, calle Til-Til 1301', 'mario.hdoz1@gmail.com', '+0255337744', '+56985352482', '18183527', 'Banco estado', 'Soltero/a', 1);
INSERT INTO `cliente` VALUES ('18045248-6', 'Alejandro Esteban', 'Tamayo Echavarrìa', 'Soltero/a', 'Ingenierìa en informàtica', 'Av. Prat 2337', 'aete.xd@hotmail.com', '055896266', '71977092', '18045248', 'banco Estado', 'Casado/a', 1);
INSERT INTO `cliente` VALUES ('18183527-3', 'Mario Hernán Douglas', 'Ossandón Zúñiga', 'Viudo/a', 'Periodismo periodístico ', 'Población Manuel Rodríguez, calle Til-Til 1301', 'mario.hdoz1@gmail.com', '+0255337744', '+56985352482', '18183527', 'Banco estado', 'Viudo/a', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `id_documento` int(11) NOT NULL auto_increment COMMENT 'Id del documento',
  `id_arriendo` int(11) default NULL COMMENT 'Id del arriendo ',
  `rut_arrendatario` varchar(10) default NULL COMMENT 'Id del arrendatario',
  `id_propiedad` int(11) default NULL COMMENT 'Id de la propiedad',
  `rut_cliente` varchar(10) default NULL COMMENT 'RUT del cliente',
  `url_documento` varchar(250) NOT NULL COMMENT 'ubicación del documento',
  `tipo_documento` varchar(50) default NULL COMMENT 'Tipo de documento',
  PRIMARY KEY  (`id_documento`),
  KEY `fk_contiene` (`id_arriendo`),
  KEY `fk_corresponde` (`id_propiedad`),
  KEY `fk_entrega` (`rut_arrendatario`),
  KEY `fk_cliente` (`rut_cliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Volcar la base de datos para la tabla `documento`
--

INSERT INTO `documento` VALUES (60, NULL, NULL, 10, NULL, 'R02_VulnerabilityStatus.pdf', NULL);
INSERT INTO `documento` VALUES (59, NULL, NULL, 10, NULL, 'R01_ComputerSecurityOverview26.pdf', NULL);
INSERT INTO `documento` VALUES (27, NULL, '19206063-k', NULL, NULL, '3067.docx', NULL);
INSERT INTO `documento` VALUES (58, NULL, NULL, 10, NULL, 'Problemática.docx', NULL);
INSERT INTO `documento` VALUES (57, NULL, NULL, 10, NULL, 'el doble del otro68.docx', NULL);
INSERT INTO `documento` VALUES (56, NULL, NULL, 10, NULL, 'R03_FullReport28.pdf', NULL);
INSERT INTO `documento` VALUES (55, NULL, NULL, 10, NULL, 'wea.docx', NULL);

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
  `activo_funcionario` tinyint(1) NOT NULL default '1',
  `eliminado_funcionario` tinyint(1) NOT NULL default '0',
  `cargo_funcionario` varchar(100) NOT NULL,
  PRIMARY KEY  (`rut_funcionario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `funcionario`
--

INSERT INTO `funcionario` VALUES ('18183527-3', 'Mario Hernán Douglas', 'Ossandón Zúñiga', '+56985352482', '+5502457787', 'Total asd aopwoejp dapsodop', 'mario.hdoz1@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 1, 0, 'Aseo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` int(11) NOT NULL auto_increment,
  `id_propiedad` int(11) NOT NULL,
  `url_imagen` varchar(250) NOT NULL,
  PRIMARY KEY  (`id_imagen`),
  KEY `fk_representa` (`id_propiedad`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

--
-- Volcar la base de datos para la tabla `imagen`
--

INSERT INTO `imagen` VALUES (67, 16, 'A._S._Bradford_House.JPG');
INSERT INTO `imagen` VALUES (66, 16, 'house-01.jpg');
INSERT INTO `imagen` VALUES (65, 16, 'house-05.jpg');
INSERT INTO `imagen` VALUES (64, 16, 'house-07.jpg');
INSERT INTO `imagen` VALUES (98, 10, 'A._S._Bradford_House37.JPG');
INSERT INTO `imagen` VALUES (97, 10, 'house-0510.jpg');
INSERT INTO `imagen` VALUES (96, 10, 'house-0159.jpg');
INSERT INTO `imagen` VALUES (95, 10, 'house-0761.jpg');
INSERT INTO `imagen` VALUES (94, 10, 'A._S._Bradford_House65.JPG');
INSERT INTO `imagen` VALUES (93, 10, 'house-0191.jpg');
INSERT INTO `imagen` VALUES (100, 10, 'house-0524.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordentrabajo`
--

CREATE TABLE `ordentrabajo` (
  `id_ot` int(11) NOT NULL auto_increment,
  `rut_funcionario` varchar(10) NOT NULL default '0',
  `rut_admin` varchar(10) NOT NULL,
  `descripcion_ot` text NOT NULL,
  `fechaemision_ot` date NOT NULL,
  `fechaejecucion_ot` date NOT NULL,
  `estado_ot` tinyint(1) NOT NULL default '1',
  `inicio_ot` date NOT NULL COMMENT 'Fecha de inicio',
  `servicio_ot` varchar(50) NOT NULL COMMENT 'Servicio a realizar',
  `observacion_ot` text NOT NULL COMMENT 'Observaciones',
  `totalpagar_ot` int(11) NOT NULL COMMENT 'Total a pagar',
  `formapago_ot` varchar(50) NOT NULL COMMENT 'Forma de pago',
  PRIMARY KEY  (`id_ot`),
  KEY `fk_crea` (`rut_admin`),
  KEY `fk_integra` (`rut_funcionario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Volcar la base de datos para la tabla `ordentrabajo`
--

INSERT INTO `ordentrabajo` VALUES (22, '0', '18183527-3', 'jasdkljasdlkj', '2015-12-05', '2015-12-05', 1, '2015-12-05', 'Aseo de propiedad', 'lskjdalsjdlaksjd', 25000, 'Efectivo');
INSERT INTO `ordentrabajo` VALUES (21, '0', '18183527-3', 'jasdkljasdlkj', '2015-12-05', '2015-12-05', 1, '2015-12-05', 'Aseo de propiedad', 'lskjdalsjdlaksjd', 25000, 'Efectivo');
INSERT INTO `ordentrabajo` VALUES (20, '0', '18183527-3', 'kasdlkjasldjl', '2015-12-05', '2015-12-06', 0, '2015-12-06', 'Tasación', 'LASKJDALKSDJASD', 123456, 'Efectivo');
INSERT INTO `ordentrabajo` VALUES (19, '0', '18183527-3', 'sdfsdf', '2015-12-05', '2015-12-05', 1, '2015-12-04', 'sdf', 'sdfsdf', 324234, 'ssdfsdf');
INSERT INTO `ordentrabajo` VALUES (17, '0', '18183527-3', 'adasd', '2015-12-04', '2015-12-05', 1, '2015-12-04', 'Arriendo', 'asdasd', 850000, 'Efectivo');
INSERT INTO `ordentrabajo` VALUES (18, '0', '18183527-3', 'adasd', '2015-12-04', '2015-12-05', 1, '2015-12-04', 'Arriendo', 'asdasd', 850000, 'Efectivo');
INSERT INTO `ordentrabajo` VALUES (23, '18183527-3', '18183527-3', 'asdasd', '2015-12-08', '2015-12-07', 1, '2015-12-07', 'Inventariado', 'asdasd', 75000, 'Efectivo');
INSERT INTO `ordentrabajo` VALUES (24, '18183527-3', '18183527-3', 'asdasd', '2015-12-08', '2015-12-09', 1, '2015-12-08', 'Inventariado', 'asdasd', 85000, 'Efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL auto_increment,
  `id_arriendo` int(11) default NULL,
  `fecha_pago` date NOT NULL,
  `mes_pago` varchar(10) NOT NULL COMMENT 'Mes de pago',
  `totalpagado_pago` int(11) NOT NULL,
  `activo_pago` tinyint(1) NOT NULL default '1' COMMENT 'Pago concluido',
  `id_ot` int(11) default NULL,
  PRIMARY KEY  (`id_pago`),
  KEY `fk_acata` (`id_arriendo`),
  KEY `fk_relationship_18` (`id_ot`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=218 ;

--
-- Volcar la base de datos para la tabla `pago`
--

INSERT INTO `pago` VALUES (217, 49, '2015-12-08', '2-05-2016', 0, 0, NULL);
INSERT INTO `pago` VALUES (215, 49, '2015-12-08', '2-03-2016', 0, 0, NULL);
INSERT INTO `pago` VALUES (179, 48, '2015-12-06', '2-11-2016', 0, 1, NULL);
INSERT INTO `pago` VALUES (178, 48, '2015-12-06', '2-10-2016', 0, 1, NULL);
INSERT INTO `pago` VALUES (177, 48, '2015-12-06', '2-09-2016', 0, 1, NULL);
INSERT INTO `pago` VALUES (176, 48, '2015-12-06', '2-08-2016', 0, 1, NULL);
INSERT INTO `pago` VALUES (175, 48, '2015-12-06', '2-07-2016', 0, 1, NULL);
INSERT INTO `pago` VALUES (174, 48, '2015-12-06', '2-06-2016', 0, 1, NULL);
INSERT INTO `pago` VALUES (173, 48, '2015-12-06', '2-05-2016', 0, 1, NULL);
INSERT INTO `pago` VALUES (172, 48, '2015-12-06', '2-04-2016', 0, 1, NULL);
INSERT INTO `pago` VALUES (171, 48, '2015-12-06', '2-03-2016', 0, 1, NULL);
INSERT INTO `pago` VALUES (170, 48, '2015-12-06', '2-02-2016', 0, 1, NULL);
INSERT INTO `pago` VALUES (169, 48, '2015-12-06', '2-01-2016', 0, 1, NULL);
INSERT INTO `pago` VALUES (168, 48, '2015-12-06', '2-12-2015', 250000, 1, NULL);
INSERT INTO `pago` VALUES (216, 49, '2015-12-08', '2-04-2016', 0, 0, NULL);
INSERT INTO `pago` VALUES (185, 50, '2015-12-08', '20-10-2015', 0, 1, NULL);
INSERT INTO `pago` VALUES (186, 50, '2015-12-08', '20-11-2015', 0, 1, NULL);
INSERT INTO `pago` VALUES (214, 49, '2015-12-08', '2-02-2016', 0, 0, NULL);
INSERT INTO `pago` VALUES (213, 49, '2015-12-08', '2-01-2016', 0, 0, NULL);
INSERT INTO `pago` VALUES (212, 49, '2015-12-08', '2-12-2015', 0, 0, NULL);
INSERT INTO `pago` VALUES (211, 49, '2015-12-08', '2-11-2015', 0, 0, NULL);
INSERT INTO `pago` VALUES (210, 49, '2015-12-08', '2-10-2015', 0, 0, NULL);
INSERT INTO `pago` VALUES (209, 49, '2015-12-08', '2-09-2015', 0, 0, NULL);
INSERT INTO `pago` VALUES (208, 49, '2015-12-08', '2-08-2015', 700000, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad`
--

CREATE TABLE `propiedad` (
  `id_propiedad` int(11) NOT NULL auto_increment,
  `rut_cliente` varchar(10) default NULL,
  `direccion_propiedad` varchar(255) NOT NULL,
  `numero_propiedad` int(11) default NULL COMMENT 'Número ',
  `habitacion_propiedad` int(11) default NULL,
  `bano_propiedad` int(11) default NULL,
  `terreno_propiedad` varchar(50) default NULL,
  `construido_propiedad` varchar(50) default NULL,
  `tipo_propiedad` varchar(25) NOT NULL,
  `servicio_propiedad` varchar(10) NOT NULL,
  `descripcion_propiedad` text,
  `comuna_propiedad` varchar(20) NOT NULL,
  `amoblado_propiedad` tinyint(1) NOT NULL default '0',
  `valor_propiedad` int(11) NOT NULL,
  `activo_propiedad` tinyint(1) default '1',
  `eliminado_propiedad` tinyint(1) NOT NULL default '0',
  `comision_propiedad` int(11) default '0' COMMENT 'Comisión ',
  `ingreso_propiedad` date NOT NULL default '2015-01-01' COMMENT 'Fecha de ingreso',
  PRIMARY KEY  (`id_propiedad`),
  KEY `fk_posee` (`rut_cliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Volcar la base de datos para la tabla `propiedad`
--

INSERT INTO `propiedad` VALUES (12, '18045248-6', 'Aconcagua', 3007, 2, 1, '', '', 'Departamento Habitación', 'Venta', 'comedor y cocina juntas, walking closet, terraza,incluye gastos comunes', 'Calama', 1, 700000, 0, 1, 1, '2015-01-01');
INSERT INTO `propiedad` VALUES (10, '18045248-6', 'Aconcagua ', 3009, 5, 2, '40m2', '35m2', 'Casa', 'Venta', 'Casa esquina  en  la  ciudad de  Calama  de  un  piso ', 'Calama', 1, 150000000, 0, 0, 4, '2015-01-01');
INSERT INTO `propiedad` VALUES (16, '19206063-k', 'Balmaceda #3242', NULL, 9, 9, '40.m2', '45m²', 'Propiedad de inversión', 'Venta', 'Mall plaza Calama', 'Calama', 1, 789456123, 0, 0, 1, '2015-01-01');
INSERT INTO `propiedad` VALUES (20, '18183527-3', 'Población Manuel Rodríguez, calle Til Til #1301', 12345, 3, 3, '50m²', '45m²', 'Departamento Habitación', 'Arriendo', 'Lorem ipsum dolor sit amet, nisl molestiae ne eum. Pri eirmod probatus deterruisset ei, at prompta appareat his, vis option civibus et. Id mei aliquid adversarium, dolor ocurreret pro eu. Has sale facete ne. Periculis theophrastus an usu, in accusam efficiendi neglegentur nec, sonet perpetua has ne. Novum atomorum tractatos mei id, vel mollis aliquip at, ius unum cetero viderer te.\r\n\r\nEros quaeque mel at. Error scriptorem at his, vero zril his at. Mel no veritus omnesque cotidieque, ea mediocrem splendide evertitur mel. Id sea voluptua recusabo, usu persius reprimique temporibus te.\r\n\r\nEos vitae repudiandae ei, an duo saperet minimum liberavisse. Iriure utroque suavitate ea nec. Ad cum docendi officiis, semper vituperatoribus ex mel. Elitr urbanitas ea usu, has at habeo aperiri. Veritus tibique corpora nam et, veritus accumsan molestie te sit. His facilis civibus detracto et.\r\n\r\nTe ludus voluptatibus reprehendunt mea. Fabellas menandri inimicus vis te. Saepe timeam nam ex, ius nostro vocent inimicus et, eam omnis causae no. Et wisi adolescens reformidans mei, verterem sensibus vis ne.\r\n', 'Antofagasta', 1, 90000000, 1, 0, 4, '2015-12-06');
INSERT INTO `propiedad` VALUES (18, '18183527-3', 'Calle Til Til 1301 Población Manuel Rodríguez', NULL, 4, 5, '50m²', '45m²', 'Casa', 'Venta', 'Lorem ipsum dolor sit amet, epicurei expetendis ex sea. Id prima gloriatur cum, posse dolores mediocritatem vim an, nullam animal consectetuer te vel. Sit id mazim debet. Ne mazim aeterno quaeque eos, posse offendit an mel.\r\n\r\nQuodsi viderer sententiae has eu, eam cu cibo regione corpora. Mea inani aeque id. Sea scripserit adversarium ea, cu utinam inimicus percipitur sed. Assum admodum eu usu, eius populo evertitur has at, insolens theophrastus vis ea. Diam copiosae necessitatibus ex sed, ei facete cetero tincidunt est, no ius facilis explicari.\r\n\r\nVirtute discere utroque in nam, est cu alii primis verterem, ad ipsum dicta splendide sit. Munere cotidieque ne nam. Duo no nisl partem maiorum, eu doming denique cum. In apeirian iracundia cum, ea mel idque dissentiunt.\r\n\r\nEi congue recusabo sapientem eum, prima scribentur ius ut. Ius ut persius efficiendi, quod veritus est id. Purto deserunt ea eos. Tantas lobortis evertitur pro ex.\r\n\r\nId regione torquatos vituperatoribus nam, quo dicit nobis ea. Ne option platonem cum, sit fuisset aliquando conceptam in. Nonumy primis nam id, nisl atomorum ex usu. Mundi tation reprimique te eos. At offendit pertinax eum. Ea doctus cotidieque mea.', 'Antofagasta', 1, 750000, 0, 0, 15, '2015-11-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id_solicitud` int(11) NOT NULL auto_increment,
  `rut_cliente` varchar(10) default NULL,
  `rut_funcionario` varchar(10) default NULL,
  `nombres_solicitud` varchar(100) default NULL,
  `apellidos_solicitud` varchar(100) default NULL,
  `servicio_solicitud` varchar(25) NOT NULL,
  `fecha_solicitud` date default NULL,
  `fechaejecucion_solicitud` date default NULL,
  `telefono_solicitud` varchar(12) default NULL,
  `estado_solicitud` tinyint(1) NOT NULL default '1',
  `descripcion_solicitud` text NOT NULL,
  `tipopropiedad_solicitud` varchar(50) default NULL,
  `correo_solicitud` varchar(100) default NULL,
  PRIMARY KEY  (`id_solicitud`),
  KEY `fk_elabora` (`rut_funcionario`),
  KEY `fk_realiza` (`rut_cliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=93 ;

--
-- Volcar la base de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` VALUES (59, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'asdasdasda ', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (60, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'asdasdasda ', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (61, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Tasación', '2015-12-09', NULL, '+56985352482', 1, 'dasdasd', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (58, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'asdasdasda ', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (57, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'dasdasdasdasd ', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (56, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'Hola cómo están, espero que se encuentren bien, besitos.', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (23, NULL, '18183527-3', NULL, NULL, 'Venta', '2015-11-29', '2015-11-30', NULL, 1, 'ewoijd wodqwo oi woqiwe ur jasdlk dioqjweioqwieoqw nasdlkasdj woihd qowewoehwqo hosdowdqwodiqwiheqoweihqwej w oee qowieqwihrefd lakflwejwelrj  rwoehrw al dj wioeh qwoidh q', 'Casa', NULL);
INSERT INTO `solicitud` VALUES (21, NULL, NULL, 'sdfsdfsdf', 'Ossandón Zúñiga', 'Tasación', '2015-11-28', NULL, '+56985352482', 1, 'dasdasdasdsdfasdasdadfsdgsdfsad sdfsfsdfdf', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (20, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Aseo de propiedad', '2015-11-28', NULL, '+56985352482', 1, 'dasdasdasdsdfasdasdadfsdgsdfsad sdfsfsdfdf', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (62, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'asdasdasd', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (26, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-03', NULL, '+56985352482', 1, 'asdalskjdlkasjdalksj alksjda lsjd alskjd asjd oasjd oijas', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (27, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-03', NULL, '+56985352482', 1, 'asdalskjdlkasjdalksj alksjda lsjd alskjd asjd oasjd oijas', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (28, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-03', NULL, '+56985352482', 1, 'dsasdaljsd alskdj alksjda lskjd aldjawoijdskjd a', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (29, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-03', NULL, '+56985352482', 1, 'dlaksjdlakjsdla alksjd lakjsd ', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (30, NULL, NULL, 'asdasd', 'asdasd', 'Venta', '2015-12-03', NULL, 'asdad', 1, 'asdasd ads asda wdawdasd awawd', NULL, 'asdasd@gmail.com');
INSERT INTO `solicitud` VALUES (31, NULL, NULL, 'asdasd', 'asdasd', 'Venta', NULL, NULL, 'asdad', 1, 'asdasd ads asda wdawdasd awawd', NULL, 'asdasd@gmail.com');
INSERT INTO `solicitud` VALUES (32, NULL, NULL, 'asdasd', 'asdasd', 'Venta', NULL, NULL, 'asdad', 1, 'asdasd ads asda wdawdasd awawd', NULL, 'asdasd@gmail.com');
INSERT INTO `solicitud` VALUES (33, NULL, NULL, 'asdasd', 'asdasd', 'Venta', '2015-12-03', NULL, 'asdad', 1, 'asdasd ads asda wdawdasd awawd', NULL, 'asdasd@gmail.com');
INSERT INTO `solicitud` VALUES (34, NULL, NULL, 'asdasd', 'asdasd', 'Venta', NULL, NULL, 'asdad', 1, 'asdasd ads asda wdawdasd awawd', NULL, 'asdasd@gmail.com');
INSERT INTO `solicitud` VALUES (35, NULL, NULL, 'asdasd', 'asdasd', 'Venta', NULL, NULL, 'asdad', 1, 'asdasd ads asda wdawdasd awawd', NULL, 'asdasd@gmail.com');
INSERT INTO `solicitud` VALUES (36, NULL, NULL, 'asdasd', 'asdasd', 'Venta', '2015-12-03', NULL, 'asdad', 1, 'asdasd ads asda wdawdasd awawd', NULL, 'asdasd@gmail.com');
INSERT INTO `solicitud` VALUES (37, NULL, NULL, 'asdasd', 'asdasd', 'Venta', NULL, NULL, 'asdad', 1, 'asdasd ads asda wdawdasd awawd', NULL, 'asdasd@gmail.com');
INSERT INTO `solicitud` VALUES (38, NULL, NULL, 'asdasd', 'asdasd', 'Venta', NULL, NULL, 'asdad', 1, 'asdasd ads asda wdawdasd awawd', NULL, 'asdasd@gmail.com');
INSERT INTO `solicitud` VALUES (39, NULL, NULL, 'asdasd', 'asdasd', 'Venta', '2015-12-03', NULL, 'asdad', 1, 'asdasd ads asda wdawdasd awawd', NULL, 'asdasd@gmail.com');
INSERT INTO `solicitud` VALUES (40, NULL, NULL, 'asdasd', 'asdasd', 'Venta', NULL, NULL, 'asdad', 1, 'asdasd ads asda wdawdasd awawd', NULL, 'asdasd@gmail.com');
INSERT INTO `solicitud` VALUES (41, NULL, NULL, 'asdasd', 'asdasd', 'Venta', NULL, NULL, 'asdad', 1, 'asdasd ads asda wdawdasd awawd', NULL, 'asdasd@gmail.com');
INSERT INTO `solicitud` VALUES (42, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Venta', '2015-12-03', NULL, ' wweqweq', 1, 'dsfsdfsdf', NULL, 'qweqwe@g.vom');
INSERT INTO `solicitud` VALUES (43, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Venta', '2015-12-03', NULL, ' wweqweq', 1, 'dsfsdfsdf', NULL, 'qweqwe@g.vom');
INSERT INTO `solicitud` VALUES (44, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón', 'Arriendo', '2015-12-03', NULL, '+56985352482', 1, 'asdasdasdasdasdasd', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (45, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-03', NULL, '+56985352482', 1, 'dasd asd ', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (46, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-03', NULL, '+56985352482', 1, 'daslkdjalksd asd a', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (47, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-03', NULL, '+56985352482', 1, 'dsasda', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (48, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-03', NULL, '+56985352482', 1, 'asdasd', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (49, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-03', NULL, '+56985352482', 1, 'asdlñjalksdjlakjsd', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (50, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-03', NULL, '+56985352482', 1, 'adad', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (51, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-03', NULL, '+56985352482', 1, 'asdasd', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (52, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-03', NULL, '+56985352482', 1, 'asdasd', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (53, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-03', NULL, '+56985352482', 1, 'asdasd', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (54, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-03', NULL, '+56985352482', 1, 'dasldalsda', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (55, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-03', NULL, '+56985352482', 1, 'dasdasd', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (63, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'dasdasdasd', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (64, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'dasdasdasd', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (65, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'dasdasdasdasd', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (66, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'dsldasd asd asd ', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (67, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'asdasdasdasd', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (68, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'dasdasdasdasdasd', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (69, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'sdsadasdasd', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (70, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'dsadasdasdasda sd asd asd asda sdasda sdas asd asda sdasda sdasdas d asdasdasdasd asda sdasd asda sda sdasd asd asd asd asd', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (71, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'Lorem ipsum dolor sit amet, dolore iriure sed ad. Ne cum ipsum officiis dissentiunt. Qui possit labores ne. Exerci nominavi scribentur ea duo.\n\nNam et oblique diceret constituam, ad usu dictas incorrupte. Augue concludaturque ad sit. Eos dicant udmodum singulis id per. Nec malorum equidem scriptorem at, eum assum alienum deserunt no.troque liberavisse ei, meis facete dissentiet cu est, qui ullum eirmod erroribus an. Iusto imperdiet ei nec, ne est novum libris.\n\nFalli persius eos et, est eu labores intellegat, pro ei alii ipsum appellantur. No idque impedit alienum mel, duo nihil congue suavitate ne, ut alia fuisset sadipscing eum. Vis possit adversarium in, eum facilis iracundia forensibus ad. Ut vim reque splendide, ea hinc essent est. Graece principes ut eam, omnis a\n', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (72, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'Lorem ipsum dolor sit amet, dolore iriure sed ad. Ne cum ipsum officiis dissentiunt. Qui possit labores ne. Exerci nominavi scribentur ea duo.\n\nNam et oblique diceret constituam, ad usu dictas incorrupte. Augue concludaturque ad sit. Eos dicant utroque liberavisse ei, meis facete dissentiet cu est, qui ullum eirmod erroribus an. Iusto imperdiet ei nec, ne est novum libris.\n\nFalli persius eos et, est eu labores intellegat, pro ei alii ipsum appellantur. No idque impedit alienum mel, duo nihil congue suavitate ne, ut alia fuisset sadipscing eum. Vis possit adversarium in, eum facilis iracundia forensibus ad. Ut vim reque splendide, ea hinc essent est. Graece principes ut eam, omnis admodum singulis id per. Nec malorum equidem scriptorem at, eum assum alienum deserunt no.\n', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (73, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'sdasdasdasdasd', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (74, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'sdfsdfsdfsdfsdf', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (75, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'ljdlakjsldkjaslkdjalksd did galileo galileo picaro magnificooo', NULL, 'mario-13_@hotmail.com');
INSERT INTO `solicitud` VALUES (76, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'dalkdaskld alkdsja lsjd asda s dd a', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (77, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'dasdlañsldkañ lkañslkd añlsdk añlskd ', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (78, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'dadasdasdasd ', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (79, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'dfsdf sdfs df sdfs dfs d', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (80, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'sdfsdfsdfsdf s', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (81, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'asdasd asd ', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (82, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'asdasd asd asd asd', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (83, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'sdasd asd ad ad', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (84, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'asdasdasda ', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (85, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'dadasdasdasd ', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (86, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'asdasd asd asd asd a', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (87, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'dasdasd asd asd asd asd', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (88, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'dasdasd adas da sd adsad', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (89, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'dsaa sda sda sd asd ad ', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (90, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'adasdjhakjsdh kajds a', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (91, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'sdadasdasdavsada sdaweawe asda sasd asdasdasd ', NULL, 'Mario.hdoz1@gmail.com');
INSERT INTO `solicitud` VALUES (92, NULL, NULL, 'Mario Hernán Douglas ', 'Ossandón Zúñiga', 'Arriendo', '2015-12-09', NULL, '+56985352482', 1, 'asdasda dalksjdlaksjdljasldkjlkjda  sd', NULL, 'Mario.hdoz1@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL auto_increment,
  `id_propiedad` int(11) NOT NULL COMMENT 'Número de ficha',
  `rut_admin` varchar(10) NOT NULL COMMENT 'RUT del administrador',
  `nombrescomprador_venta` varchar(100) NOT NULL COMMENT 'Nombres de comprador',
  `apellidoscomprador_venta` varchar(100) NOT NULL COMMENT 'Apellidos del comprador',
  `rutcomprador_venta` varchar(10) NOT NULL COMMENT 'RUT del comprador',
  `comisioncomprador_venta` int(11) NOT NULL default '2' COMMENT 'Comisión a comprador',
  `comisioncliente_venta` int(11) NOT NULL default '2' COMMENT 'Comisión a vendedor',
  `ganancia_venta` varchar(50) NOT NULL COMMENT 'Ganancia de la venta',
  PRIMARY KEY  (`id_venta`),
  KEY `fk_acoge` (`id_propiedad`),
  KEY `fk_concibe` (`rut_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcar la base de datos para la tabla `venta`
--

INSERT INTO `venta` VALUES (15, 10, '18183527-3', 'Mario Hernán Douglas', 'Ossandon Zuñigó', '11111111-1', 2, 2, '6000000');

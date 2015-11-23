-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-11-2015 a las 01:04:05
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
  PRIMARY KEY  (`rut_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `administrador`
--

INSERT INTO `administrador` VALUES ('18183527-3', 'Mario Hernán Douglas', 'Ossandón Zúñiga', '8cb2237d0679ca88db6464eac60da96345513964', 'mario.hdoz1@gmail.com', '+56985352482', 'dist/img/avatar5.png', 1, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Volcar la base de datos para la tabla `arriendo`
--

INSERT INTO `arriendo` VALUES (33, 15, '18183527-3', '18183527-3', '2015-11-16', 3, '2015-11-17', '2015-11-21', 750000, 1);
INSERT INTO `arriendo` VALUES (32, 14, '18183527-3', '18183527-3', '2015-11-16', 2, '2015-11-11', '2015-11-30', 600000, 1);
INSERT INTO `arriendo` VALUES (31, 13, '18183527-3', '18183527-3', '2015-11-16', 5, '2015-11-17', '2015-11-19', 500000, 1);
INSERT INTO `arriendo` VALUES (30, 12, '18183527-3', '18183527-3', '2015-11-14', 5, '2015-11-14', '2015-11-15', 650000, 1);
INSERT INTO `arriendo` VALUES (29, 10, '18183527-3', '18183527-3', '2015-11-13', 5, '2015-11-12', '2015-11-13', 500000, 0);
INSERT INTO `arriendo` VALUES (28, 10, '18183527-3', '19206063-k', '2015-11-12', 3, '2015-11-13', '2015-11-14', 500000, 0);
INSERT INTO `arriendo` VALUES (34, 15, '18183527-3', '18183527-3', '2015-11-19', 20, '2015-11-11', '2016-03-31', 800000, 1);
INSERT INTO `arriendo` VALUES (35, 14, '18183527-3', '18183527-3', '2015-11-19', 21, '2015-11-11', '2016-05-31', 750000, 1);
INSERT INTO `arriendo` VALUES (36, 13, '18183527-3', '18183527-3', '2015-11-19', 24, '2015-11-11', '2016-07-13', 750000, 1);
INSERT INTO `arriendo` VALUES (37, 11, '18183527-3', '18183527-3', '2015-11-19', 25, '2015-11-11', '2015-11-29', 650000, 1);
INSERT INTO `arriendo` VALUES (38, 16, '18183527-3', '18183527-3', '2015-11-22', 1, '2015-11-22', '2016-11-22', 750000, 1);
INSERT INTO `arriendo` VALUES (39, 10, '18183527-3', '18183527-3', '2015-11-22', 1, '2015-11-22', '2016-11-22', 750000, 1);
INSERT INTO `arriendo` VALUES (40, 16, '18183527-3', '18183527-3', '2015-11-22', 1, '2015-11-22', '2016-11-22', 750000, 1);
INSERT INTO `arriendo` VALUES (41, 16, '18183527-3', '18183527-3', '2015-11-22', 2, '2015-09-01', '2016-04-02', 745000, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `documento`
--

INSERT INTO `documento` VALUES (1, NULL, '11111111-1', NULL, NULL, 'Problemática.docx', NULL);
INSERT INTO `documento` VALUES (2, NULL, '11111111-1', NULL, NULL, 'Problemática12.docx', NULL);
INSERT INTO `documento` VALUES (3, NULL, '11111111-1', NULL, NULL, 'Problemática37.docx', NULL);
INSERT INTO `documento` VALUES (4, NULL, '11111111-1', NULL, NULL, 'el doble del otro97.docx', NULL);
INSERT INTO `documento` VALUES (5, NULL, '11111111-1', NULL, NULL, 'Probabilidad.docx', NULL);
INSERT INTO `documento` VALUES (6, NULL, '19206063-k', NULL, NULL, 'Probabilidad30.docx', NULL);
INSERT INTO `documento` VALUES (7, NULL, '19206063-k', NULL, NULL, 'Probabilidad68.docx', NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Volcar la base de datos para la tabla `imagen`
--

INSERT INTO `imagen` VALUES (42, 16, '11251880_375068339354594_6595981031558840063_n.jpg');
INSERT INTO `imagen` VALUES (41, 16, 'http_3A_2F_2F33.media.tumblr.com_2Fcfcbcb378f24457b2e80c4e9e2254b4a_2Ftumblr_nilk1tIz3z1qgqloro1_500.gif');
INSERT INTO `imagen` VALUES (40, 16, 'b19e6932ed0597b75f03eb61ac5911b5.jpg');
INSERT INTO `imagen` VALUES (39, 16, 'tumblr_mlw98rcYvr1s2mp2ro1_400.gif');
INSERT INTO `imagen` VALUES (38, 15, 'house-0190.jpg');
INSERT INTO `imagen` VALUES (37, 15, 'A._S._Bradford_House85.JPG');
INSERT INTO `imagen` VALUES (36, 15, 'house-0754.jpg');
INSERT INTO `imagen` VALUES (35, 15, 'house-0571.jpg');
INSERT INTO `imagen` VALUES (34, 13, 'A._S._Bradford_House20.JPG');
INSERT INTO `imagen` VALUES (33, 13, 'house-0742.jpg');
INSERT INTO `imagen` VALUES (32, 13, 'house-0165.jpg');
INSERT INTO `imagen` VALUES (31, 13, 'house-0573.jpg');
INSERT INTO `imagen` VALUES (30, 10, 'A._S._Bradford_House46.JPG');
INSERT INTO `imagen` VALUES (29, 10, 'house-07.jpg');
INSERT INTO `imagen` VALUES (28, 10, 'house-05.jpg');
INSERT INTO `imagen` VALUES (27, 10, 'house-01.jpg');
INSERT INTO `imagen` VALUES (26, 10, 'A._S._Bradford_House.JPG');
INSERT INTO `imagen` VALUES (43, 16, '11696028_10207312328825535_8886832005836248666_n.jpg');
INSERT INTO `imagen` VALUES (44, 16, '12088267_10153596124417521_1551038505616217429_n16.jpg');
INSERT INTO `imagen` VALUES (45, 16, 'a8jejYZ_460s.jpg');
INSERT INTO `imagen` VALUES (46, 16, 'a9L9Xn1_700b.jpg');
INSERT INTO `imagen` VALUES (47, 16, 'aEzGVNx_700b_v1.jpg');
INSERT INTO `imagen` VALUES (48, 18, 'A._S._Bradford_House31.JPG');
INSERT INTO `imagen` VALUES (49, 18, 'house-0128.jpg');
INSERT INTO `imagen` VALUES (50, 18, 'house-0538.jpg');
INSERT INTO `imagen` VALUES (51, 18, 'house-0782.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integra`
--

CREATE TABLE `integra` (
  `id_integra` int(11) NOT NULL auto_increment,
  `rut_funcionario` varchar(10) NOT NULL,
  `id_ot` int(11) NOT NULL,
  PRIMARY KEY  (`id_integra`),
  KEY `fk_relationship_8` (`id_ot`),
  KEY `fk_relationship_9` (`rut_funcionario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `integra`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordentrabajo`
--

CREATE TABLE `ordentrabajo` (
  `id_ot` int(11) NOT NULL auto_increment,
  `rut_admin` varchar(10) NOT NULL,
  `descripcion_ot` text NOT NULL,
  `fechaemision_ot` date NOT NULL,
  `fechaejecucion_ot` date NOT NULL,
  `estado_ot` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id_ot`),
  KEY `fk_crea` (`rut_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `ordentrabajo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL auto_increment,
  `id_arriendo` int(11) default NULL,
  `fecha_pago` date NOT NULL,
  `mes_pago` varchar(7) NOT NULL COMMENT 'Mes de pago',
  `totalpagar_pago` int(11) NOT NULL,
  `totalpagado_pago` int(11) NOT NULL,
  `activo_pago` tinyint(1) NOT NULL default '1' COMMENT 'Pago concluido',
  PRIMARY KEY  (`id_pago`),
  KEY `fk_acata` (`id_arriendo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=135 ;

--
-- Volcar la base de datos para la tabla `pago`
--

INSERT INTO `pago` VALUES (134, 41, '2015-11-22', '04-2016', 0, 0, 1);
INSERT INTO `pago` VALUES (133, 41, '2015-11-22', '03-2016', 0, 0, 1);
INSERT INTO `pago` VALUES (132, 41, '2015-11-22', '02-2016', 0, 0, 1);
INSERT INTO `pago` VALUES (131, 41, '2015-11-22', '01-2016', 0, 0, 1);
INSERT INTO `pago` VALUES (130, 41, '2015-11-22', '12-2015', 745000, 0, 1);
INSERT INTO `pago` VALUES (129, 41, '2015-11-22', '11-2010', 0, 745000, 0);
INSERT INTO `pago` VALUES (128, 41, '2015-11-22', '10-2015', 0, 745000, 0);
INSERT INTO `pago` VALUES (127, 41, '2015-11-22', '09-2015', 0, 745000, 0);

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
  `estado_propiedad` tinyint(1) default '1',
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Volcar la base de datos para la tabla `propiedad`
--

INSERT INTO `propiedad` VALUES (12, '18045248-6', 'Aconcagua', 3007, 2, 1, '', '', 'Departamento Habitación', 'Venta', 1, 'comedor y cocina juntas, walking closet, terraza,incluye gastos comunes', 'Calama', 1, 700000, 1, 0, 0, '2015-01-01');
INSERT INTO `propiedad` VALUES (11, '18045248-6', 'Prat', 2337, 3, 3, '637 mt2', '139,5 mt2', 'Casa', 'Venta', 1, 'Casa ubicada Sector Topater calle alejandrina Olivares, seguridad las 24 horas, ', 'Calama', 1, 5000000, 1, 0, 0, '2015-01-01');
INSERT INTO `propiedad` VALUES (10, '18045248-6', 'Aconcagua ', 3009, 5, 2, '40m2', '35', 'Casa', 'Venta', 1, 'Casa esquina  en  la  ciudad de  Calama  de  un  piso ', 'Calama', 0, 150000000, 1, 0, 0, '2015-01-01');
INSERT INTO `propiedad` VALUES (13, '19206063-k', 'asdf', 1234, 3, 2, '12', '11', 'Casa', 'Venta', 1, 'asdfghjklñlkjg ckgyf lhuij,kj iugiug khiuf figiuguyfiytd yfuyfuyfg uito ut luhglyufyulfr ulyflugjhgluyfouy fyurty atsrj tfhm', 'Antofagasta', 1, 123456, 1, 0, 0, '2015-01-01');
INSERT INTO `propiedad` VALUES (14, '19206063-k', 'ertuuiuyuy', 12345, 3, 8, '31', '30', 'Casa', 'Venta', 1, 'jhfhgfgjdfdhgjkhkhjhfjhgkjhjhfhgk kkjghdfiuguguyyu uigiytd iih gu yt uiioh u uyfuy oiguyf ydtrsrz viugt uyi g', 'Antofagasta', 1, 85352482, 1, 0, 0, '2015-01-01');
INSERT INTO `propiedad` VALUES (15, '19206063-k', 'fdsdf', 2344, 3, 2, '123', '1235', 'Galpón', 'Arriendo', 1, '2346756745645678678676556', 'Calama', 1, 21345778, 1, 0, 0, '2015-01-01');
INSERT INTO `propiedad` VALUES (16, '19206063-k', 'Balmaceda #3242', NULL, 9, 9, '40.m2', '45m²', 'Propiedad de inversión', 'Venta', 1, 'Mall plaza Calama', 'Calama', 1, 789456123, 1, 0, 0, '2015-01-01');
INSERT INTO `propiedad` VALUES (17, '', 'Calle Til Til 1301 Población Manuel Rodríguez', NULL, 5, 5, '500', '450', 'Casa', 'Venta', 1, 'Lorem ipsum dolor sit amet, epicurei expetendis ex sea. Id prima gloriatur cum, posse dolores mediocritatem vim an, nullam animal consectetuer te vel. Sit id mazim debet. Ne mazim aeterno quaeque eos, posse offendit an mel.\r\n\r\nQuodsi viderer sententiae has eu, eam cu cibo regione corpora. Mea inani aeque id. Sea scripserit adversarium ea, cu utinam inimicus percipitur sed. Assum admodum eu usu, eius populo evertitur has at, insolens theophrastus vis ea. Diam copiosae necessitatibus ex sed, ei facete cetero tincidunt est, no ius facilis explicari.\r\n\r\nVirtute discere utroque in nam, est cu alii primis verterem, ad ipsum dicta splendide sit. Munere cotidieque ne nam. Duo no nisl partem maiorum, eu doming denique cum. In apeirian iracundia cum, ea mel idque dissentiunt.\r\n\r\nEi congue recusabo sapientem eum, prima scribentur ius ut. Ius ut persius efficiendi, quod veritus est id. Purto deserunt ea eos. Tantas lobortis evertitur pro ex.\r\n\r\nId regione torquatos vituperatoribus nam, quo dicit nobis ea. Ne option platonem cum, sit fuisset aliquando conceptam in. Nonumy primis nam id, nisl atomorum ex usu. Mundi tation reprimique te eos. At offendit pertinax eum. Ea doctus cotidieque mea.', 'Calama', 1, 750000, 1, 0, 15, '2015-11-23');
INSERT INTO `propiedad` VALUES (18, '18183527-3', 'Calle Til Til 1301 Población Manuel Rodríguez', NULL, 4, 5, '50m²', '45m²', 'Casa', 'Venta', 1, 'Lorem ipsum dolor sit amet, epicurei expetendis ex sea. Id prima gloriatur cum, posse dolores mediocritatem vim an, nullam animal consectetuer te vel. Sit id mazim debet. Ne mazim aeterno quaeque eos, posse offendit an mel.\r\n\r\nQuodsi viderer sententiae has eu, eam cu cibo regione corpora. Mea inani aeque id. Sea scripserit adversarium ea, cu utinam inimicus percipitur sed. Assum admodum eu usu, eius populo evertitur has at, insolens theophrastus vis ea. Diam copiosae necessitatibus ex sed, ei facete cetero tincidunt est, no ius facilis explicari.\r\n\r\nVirtute discere utroque in nam, est cu alii primis verterem, ad ipsum dicta splendide sit. Munere cotidieque ne nam. Duo no nisl partem maiorum, eu doming denique cum. In apeirian iracundia cum, ea mel idque dissentiunt.\r\n\r\nEi congue recusabo sapientem eum, prima scribentur ius ut. Ius ut persius efficiendi, quod veritus est id. Purto deserunt ea eos. Tantas lobortis evertitur pro ex.\r\n\r\nId regione torquatos vituperatoribus nam, quo dicit nobis ea. Ne option platonem cum, sit fuisset aliquando conceptam in. Nonumy primis nam id, nisl atomorum ex usu. Mundi tation reprimique te eos. At offendit pertinax eum. Ea doctus cotidieque mea.', 'Antofagasta', 1, 750000, 1, 0, 15, '2015-11-23');

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
  `fecha_solicitud` date NOT NULL,
  `fechaejecucion_solicitud` date NOT NULL,
  `telefono_solicitud` varchar(12) default NULL,
  `estado_solicitud` tinyint(1) NOT NULL default '1',
  `descripcion_solicitud` text NOT NULL,
  `tipopropiedad_solicitud` varchar(50) NOT NULL,
  `correo_solicitud` varchar(100) default NULL,
  PRIMARY KEY  (`id_solicitud`),
  KEY `fk_elabora` (`rut_funcionario`),
  KEY `fk_realiza` (`rut_cliente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `solicitud`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Volcar la base de datos para la tabla `venta`
--

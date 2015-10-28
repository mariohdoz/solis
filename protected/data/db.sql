-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-10-2015 a las 03:17:48
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

INSERT INTO `administrador` VALUES ('18183527-3', 'Mario Hernán Douglas', 'Ossandón Zúñiga', '8cb2237d0679ca88db6464eac60da96345513964', 'mario.hdoz1@gmail.com', '+56985352482', 'dist/img/mario.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arrendatario`
--

CREATE TABLE `arrendatario` (
  `rut_arrendatario` varchar(10) NOT NULL,
  `nombres_arrendatario` varchar(100) NOT NULL,
  `apellidos_arrendatario` varchar(100) NOT NULL,
  `estadocivil_arrendatario` varchar(8) NOT NULL,
  `profesion_arrendatario` varchar(250) NOT NULL,
  `correo_arrendatario` varchar(100) NOT NULL,
  `telefonofijo_arrendatario` varchar(12) default NULL,
  `telefonocelular_arrendatario` varchar(12) NOT NULL,
  `nrocuenta_arrendatario` varchar(25) default NULL,
  `banco_arrendatario` varchar(50) default NULL,
  `nacionalidad_arrendatario` varchar(50) NOT NULL,
  `empresa_arrendatario` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`rut_arrendatario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `arrendatario`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arriendo`
--

CREATE TABLE `arriendo` (
  `id_arriendo` int(11) NOT NULL auto_increment,
  `id_propiedad` int(11) NOT NULL,
  `rut_admin` varchar(10) NOT NULL,
  `rut_arrendatario` varchar(10) default NULL,
  `inscripcion_arriendo` date NOT NULL,
  `fechapago_arriendo` date NOT NULL,
  `inicio_arriendo` date NOT NULL,
  `termino_arriendo` date NOT NULL,
  `valor_arriendo` int(11) NOT NULL,
  PRIMARY KEY  (`id_arriendo`),
  KEY `fk_gestiona` (`rut_admin`),
  KEY `fk_incumbe` (`rut_arrendatario`),
  KEY `fk_puede` (`id_propiedad`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `arriendo`
--


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
  `tipo_documento` varchar(50) NOT NULL COMMENT 'Tipo de documento',
  `url_documento` varchar(250) NOT NULL COMMENT 'ubicación del documento',
  `digitalizado_documento` tinyint(1) NOT NULL default '1' COMMENT 'Digitalizado',
  `copiaoriginal_documento` tinyint(1) NOT NULL default '1' COMMENT 'Copia original',
  PRIMARY KEY  (`id_documento`),
  KEY `fk_contiene` (`id_arriendo`),
  KEY `fk_corresponde` (`id_propiedad`),
  KEY `fk_entrega` (`rut_arrendatario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `documento`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `imagen`
--

INSERT INTO `imagen` VALUES (1, 1, '11251880_375068339354594_6595981031558840063_n.jpg');
INSERT INTO `imagen` VALUES (2, 1, 'a8jejYZ_460s.jpg');
INSERT INTO `imagen` VALUES (3, 1, '11696028_10207312328825535_8886832005836248666_n.jpg');
INSERT INTO `imagen` VALUES (4, 1, 'a9L9Xn1_700b.jpg');
INSERT INTO `imagen` VALUES (5, 3, '3.png');
INSERT INTO `imagen` VALUES (6, 4, '11696028_10207312328825535_8886832005836248666_n41.jpg');

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
  `rut_arrendatario` varchar(10) default NULL,
  `fecha_pago` date NOT NULL,
  `totalpagar_pago` int(11) NOT NULL,
  `totalpagado_pago` int(11) NOT NULL,
  PRIMARY KEY  (`id_pago`),
  KEY `fk_acata` (`id_arriendo`),
  KEY `fk_origina` (`rut_arrendatario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `pago`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad`
--

CREATE TABLE `propiedad` (
  `id_propiedad` int(11) NOT NULL auto_increment,
  `rut_cliente` varchar(10) default NULL,
  `direccion_propiedad` varchar(255) NOT NULL,
  `numero_propiedad` int(11) NOT NULL COMMENT 'Número ',
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
  PRIMARY KEY  (`id_propiedad`),
  KEY `fk_posee` (`rut_cliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `propiedad`
--

INSERT INTO `propiedad` VALUES (1, '18183527-3', 'Población Manuel Rodríguez, calle Til Til #1301', 0, 3, 3, '50m²', '45m²', 'Casa', 'Venta', 1, 'Casa amplia wkljfs lorem ipsum ', 'Antofagasta', 1, 90000000, 1);
INSERT INTO `propiedad` VALUES (2, '18183527-3', 'sdfsf', 0, 1, 3, 'sdfsdf', 'sdfsdf', 'Casa', 'Venta', 1, 'sdfsdfsdfsdf', 'Antofagasta', 1, 4234, 1);
INSERT INTO `propiedad` VALUES (3, '18183527-3', 'Calle til til Población Manuel Rodríguez ', 1301, 5, 6, '50m²', '45m²', 'Casa', 'Venta', 1, 'jghjghjghjrterui werwrt uyturtyert  utyuyrwer utyut ', 'Antofagasta', 1, 90000000, 1);
INSERT INTO `propiedad` VALUES (4, '18183527-3', 'Población Manuel Rodríguez, calle Til Til', 1301, 1, 1, '50m²', '45m²', 'Casa', 'Venta', 1, 'asdasd ewwer qweqwe gtgwqwe qweqwsd rwer sd ', 'Antofagasta', 1, 90000000, 1);

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
  `id_propiedad` int(11) NOT NULL,
  `rut_admin` varchar(10) default NULL,
  `nombrescomprador_venta` varchar(100) NOT NULL,
  `apellidoscomprador_venta` varchar(100) NOT NULL,
  `rutcomprador_venta` varchar(25) NOT NULL,
  PRIMARY KEY  (`id_venta`),
  KEY `fk_acoge` (`id_propiedad`),
  KEY `fk_concibe` (`rut_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `venta`
--

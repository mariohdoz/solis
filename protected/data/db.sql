-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-10-2015 a las 23:46:03
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `rut_admin` varchar(10) NOT NULL COMMENT 'RUT del administrador',
  `nombres_admin` varchar(100) NOT NULL COMMENT 'Nombres',
  `apellidos_admin` varchar(100) NOT NULL COMMENT 'Apellidos',
  `contrasena_admin` varchar(100) NOT NULL COMMENT 'Contraseña',
  `correo_admin` varchar(100) NOT NULL COMMENT 'Correo',
  `telefono_admin` varchar(12) NOT NULL COMMENT 'Telefono',
  `perfil_admin` varchar(250) NOT NULL COMMENT 'Foto',
  PRIMARY KEY  (`rut_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `administrador`
--

INSERT INTO `administrador` VALUES ('18183527-3', 'Mario Hernán Douglas', 'Ossandón Zúñiga', '8cb2237d0679ca88db6464eac60da96345513964', 'mario.hdoz1@gmail.com', '+56985352482', 'dist/img/mario.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arrendatario`
--

CREATE TABLE `arrendatario` (
  `rut_arrendatario` varchar(25) NOT NULL COMMENT 'RUT del arrendatario',
  `nombres_arrendatario` varchar(100) NOT NULL COMMENT 'Nombre',
  `apellidos_arrendatario` varchar(100) NOT NULL COMMENT 'Apellidos',
  `estadocivil_arrendatario` varchar(8) NOT NULL COMMENT 'Estado civil',
  `profesion_arrendatario` varchar(250) NOT NULL COMMENT 'Profesión',
  `correo_arrendatario` varchar(100) NOT NULL COMMENT 'Correo electrónico',
  `telefonofijo_arrendatario` varchar(12) default NULL COMMENT 'Teléfono fijo',
  `telefonocelular_arrendatario` varchar(12) NOT NULL COMMENT 'Teléfono celular',
  `nrocuenta_arrendatario` varchar(25) default NULL COMMENT 'Número de cuenta',
  `banco_arrendatario` varchar(50) default NULL COMMENT 'Banco',
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
  `rut_arrendatario` varchar(25) default NULL COMMENT 'RUT del arrendatario',
  `inscripcion_arriendo` date NOT NULL COMMENT 'Fecha de ingreso',
  `fechapago_arriendo` date NOT NULL COMMENT 'Fecha de pago',
  `inicio_arriendo` date NOT NULL COMMENT 'Inicio del arriendo',
  `termino_arriendo` date NOT NULL COMMENT 'Término del arriendo',
  `valor_arriendo` int(11) NOT NULL COMMENT 'Valor del arriendo',
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
  `domicilio_cliente` varchar(150) default NULL COMMENT 'Domicilio ',
  `correo_cliente` varchar(100) default NULL COMMENT 'Correo electrónico',
  `telefonofijo_cliente` varchar(12) default NULL COMMENT 'Teléfono fijo',
  `telefonocelular_cliente` varchar(12) default NULL COMMENT 'Teléfono celular',
  `nrocuenta_cliente` varchar(25) default NULL COMMENT 'Número de cuenta',
  `banco_cliente` varchar(50) default NULL COMMENT 'Banco',
  `activo_cliente` tinyint(1) NOT NULL default '1' COMMENT 'Activo',
  PRIMARY KEY  (`rut_cliente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `cliente`
--

INSERT INTO `cliente` VALUES ('18183527-3', 'Mario Hernán Douglas', 'Ossandón Zúñiga', 'Soltero/a', 'Periodismo periodístico ', 'Población Manuel Rodríguez, calle Til-Til 1301', 'mario.hdoz1@gmail.com', '+0255337744', '+56985352482', '18183527', 'Banco estado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `id_documento` int(11) NOT NULL auto_increment,
  `id_arriendo` int(11) default NULL,
  `rut_arrendatario` varchar(25) default NULL,
  `id_propiedad` int(11) default NULL,
  `tipo_documento` varchar(50) NOT NULL COMMENT 'Tipo de documento',
  `url_documento` varchar(250) NOT NULL,
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
  `rut_funcionario` varchar(25) NOT NULL COMMENT 'RUT del funcionario',
  `nombres_funcionario` varchar(100) NOT NULL COMMENT 'Nombres',
  `apellidos_funcionario` varchar(100) NOT NULL COMMENT 'Apellidos',
  `telefonofijo_funcionario` varchar(12) NOT NULL COMMENT 'Teléfono fijo',
  `telefonocelular_funcionario` varchar(12) NOT NULL COMMENT 'Teléfono celular',
  `domicilio_funcionario` varchar(150) NOT NULL COMMENT 'Domicilio',
  `correo_funcionario` varchar(100) NOT NULL COMMENT 'Correo',
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `imagen`
--

INSERT INTO `imagen` VALUES (1, 3, '11696028_10207312328825535_8886832005836248666_n59.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integra`
--

CREATE TABLE `integra` (
  `id_integra` int(11) NOT NULL auto_increment,
  `rut_funcionario` varchar(25) NOT NULL,
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
  `rut_arrendatario` varchar(25) default NULL,
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
  `rut_cliente` varchar(10) default NULL COMMENT 'RUT del propietario',
  `direccion_propiedad` varchar(255) NOT NULL COMMENT 'Dirección',
  `habitacion_propiedad` int(11) default NULL COMMENT 'Cantidad de piezas',
  `bano_propiedad` int(11) default NULL COMMENT 'Cantidad de baños',
  `terreno_propiedad` varchar(50) default NULL COMMENT 'Terreno',
  `construido_propiedad` varchar(50) default NULL COMMENT 'Terreno construido',
  `tipo_propiedad` varchar(25) NOT NULL COMMENT 'Tipo de propiedad',
  `servicio_propiedad` varchar(10) NOT NULL COMMENT 'Tipo de servicio prestado',
  `estado_propiedad` tinyint(1) default '1' COMMENT 'Estado',
  `descripcion_propiedad` text COMMENT 'Descripción',
  `comuna_propiedad` varchar(20) NOT NULL COMMENT 'Comuna donde se encuentra',
  `amoblado_propiedad` tinyint(1) NOT NULL default '0' COMMENT 'Amoblado',
  `valor_propiedad` double NOT NULL COMMENT 'Valor',
  `activo_propiedad` tinyint(1) default '1' COMMENT 'Habilitado',
  PRIMARY KEY  (`id_propiedad`),
  KEY `fk_posee` (`rut_cliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `propiedad`
--

INSERT INTO `propiedad` VALUES (1, '18183527-3', 'asd', 1, 1, '123', '123', 'Casa', 'Venta', 1, '123123123123', 'Antofagasta', 1, 123123, 1);
INSERT INTO `propiedad` VALUES (2, '18183527-3', 'asd', 1, 1, '123', '123', 'Casa', 'Venta', 1, '123123123123', 'Antofagasta', 1, 123123, 1);
INSERT INTO `propiedad` VALUES (3, '18183527-3', '1234', 1, 1, '123', '123', 'Casa', 'Venta', 1, '123123', 'Antofagasta', 1, 123, 1);
INSERT INTO `propiedad` VALUES (4, '18183527-3', 'gdfg', 1, 1, 'dfg', '345', 'Casa', 'Venta', 1, 'dfgghhgdgf', 'Antofagasta', 1, 3453, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id_solicitud` int(11) NOT NULL auto_increment,
  `rut_cliente` varchar(10) default NULL,
  `rut_funcionario` varchar(25) default NULL,
  `nombres_solicitud` varchar(100) default NULL COMMENT 'Nombres',
  `apellidos_solicitud` varchar(100) default NULL COMMENT 'Apellidos',
  `servicio_solicitud` varchar(25) NOT NULL COMMENT 'Servicio',
  `fecha_solicitud` date NOT NULL COMMENT 'Fecha',
  `fechaejecucion_solicitud` date NOT NULL COMMENT 'Fecha solicitada',
  `telefono_solicitud` varchar(12) default NULL COMMENT 'Teléfono de contacto',
  `estado_solicitud` tinyint(1) NOT NULL default '1' COMMENT 'Estado de solicitud',
  `descripcion_solicitud` text NOT NULL COMMENT 'Descripción',
  `tipopropiedad_solicitud` varchar(50) NOT NULL COMMENT 'Tipo de propiedad',
  `correo_solicitud` varchar(100) default NULL COMMENT 'Correo electrónico',
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


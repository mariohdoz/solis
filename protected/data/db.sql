-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arrendatario`
--

CREATE TABLE `arrendatario` (
  `RUTARREN` varchar(10) NOT NULL,
  `NOMBRESARREN` varchar(50) NOT NULL,
  `APELLIDOSARREN` varchar(50) NOT NULL,
  `TELEFONOARREN` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arriendo`
--

CREATE TABLE `arriendo` (
  `IDARRIENDO` int(11) NOT NULL,
  `IDPROP` int(11) DEFAULT NULL,
  `RUTADMIN` varchar(10) NOT NULL,
  `RUTARREN` varchar(10) NOT NULL,
  `FECHAARRIENDO` date NOT NULL,
  `FECHAPAGOARRIENDO` date NOT NULL,
  `VALORARRIENDO` int(11) NOT NULL,
  `TIEMPODEARRIENDO` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `RUTCLIENTE` varchar(10) NOT NULL,
  `NOMBRESCLIENTE` varchar(50) NOT NULL,
  `APELLIDOSCLIENTE` varchar(50) NOT NULL,
  `TELEFONOCLIENTE` varchar(12) NOT NULL,
  `DIRECCIONCLIENTE` varchar(50) DEFAULT NULL,
  `correo_cliente` varchar(100) NOT NULL COMMENT 'Correo electrónico',
  `estadoCivil_cliente` varchar(8) NOT NULL COMMENT 'Estado civil',
  `profesion_cliente` int(100) NOT NULL COMMENT 'Profesión',
  `telefonoCelular_cliente` varchar(12) NOT NULL COMMENT 'Teléfono celular',
  `nroCuenta_cliente` varchar(25) NOT NULL COMMENT 'Número de cuenta',
  `banco_cliente` varchar(100) NOT NULL COMMENT 'Banco'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`RUTCLIENTE`, `NOMBRESCLIENTE`, `APELLIDOSCLIENTE`, `TELEFONOCLIENTE`, `DIRECCIONCLIENTE`, `correo_cliente`, `estadoCivil_cliente`, `profesion_cliente`, `telefonoCelular_cliente`, `nroCuenta_cliente`, `banco_cliente`) VALUES
('19206063-k', 'Marcela Andrea', 'Muñoz Campusano', '57238757', 'La torre 1291', '', '', 0, '', '', ''),
('18183527-3', 'Mario Hernán Douglas', 'Ossandón Zúñiga', '85352482', 'Bobby maguila gorila', '', '', 0, '', '', ''),
('18045248-6', 'Alejandro', 'Tamayo', '942309423', 'lkasdljkdas', '', '', 0, '', '', ''),
('18183524-3', 'lkjlkjaslkj', 'adosad', 'lkjllkjwlkja', 'asdasd', '', '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `IDDOCU` int(11) NOT NULL,
  `IDARRIENDO` int(11) NOT NULL,
  `IDPROP` int(11) DEFAULT NULL,
  `RUTARREN` varchar(10) DEFAULT NULL,
  `TIPODOCU` varchar(25) NOT NULL,
  `UBICACIONDOCU` varchar(50) NOT NULL,
  `DIGITALIZADO` tinyint(1) NOT NULL,
  `COPIAORIGINAL` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `IDFACTURA` int(11) NOT NULL,
  `IDPAGO` int(11) NOT NULL,
  `NUMFACTURA` int(11) NOT NULL,
  `FECHAFACTURA` date NOT NULL,
  `SUBTOTALFACTURA` int(11) NOT NULL,
  `IVAFACTURA` int(11) NOT NULL,
  `TOTALFACTURA` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionario`
--

CREATE TABLE `funcionario` (
  `RUTFUNCIONARIO` varchar(10) NOT NULL,
  `NOMBRESFUNCIONARIOS` varchar(50) NOT NULL,
  `APELLIDOSFUCIONARIO` varchar(50) NOT NULL,
  `TELEFONOFUNCIONARIO` varchar(12) NOT NULL,
  `SECTORFUNCIONARIO` varchar(50) NOT NULL,
  `DIRECCIONFUNCIONARIO` varchar(50) NOT NULL,
  `CORREOFUNCIONARIO` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `IDIMAGEN` int(11) NOT NULL,
  `IDPROP` int(11) NOT NULL,
  `URLIMAGEN` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`IDIMAGEN`, `IDPROP`, `URLIMAGEN`) VALUES
(22, 35, 'tumblr_nhw47pciPS1s1whmqo7_1280.jpg'),
(21, 35, '10507150_1393756380934301_2967279506105958413_o.jpg'),
(20, 35, 'ae0vPrB_460s.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integra`
--

CREATE TABLE `integra` (
  `IDINTEGRA` int(11) NOT NULL,
  `IDOT` int(11) NOT NULL,
  `RUTFUNCIONARIO` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordentrabajo`
--

CREATE TABLE `ordentrabajo` (
  `IDOT` int(11) NOT NULL,
  `RUTADMIN` varchar(10) NOT NULL,
  `DESCIPCIONOT` varchar(254) NOT NULL,
  `FECHAEMISIONOT` date NOT NULL,
  `FECHAEJECUCIONOT` date DEFAULT NULL,
  `ESTADOOT` tinyint(1) NOT NULL,
  `FORMULARIOOT` varchar(254) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `IDPAGO` int(11) NOT NULL,
  `RUTARREN` varchar(10) NOT NULL,
  `IDARRIENDO` int(11) DEFAULT NULL,
  `FECHAPAGO` date NOT NULL,
  `TOTALPAGAR` int(11) DEFAULT NULL,
  `TOTALPAGADO` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad`
--

CREATE TABLE `propiedad` (
  `IDPROP` int(11) NOT NULL COMMENT 'propiedad_id',
  `RUTCLIENTE` varchar(10) NOT NULL COMMENT 'RUT del propietario',
  `DIRECCION` varchar(50) NOT NULL COMMENT 'Dirección',
  `CANTPIEZA` int(11) DEFAULT NULL COMMENT 'Cantidad de piezas',
  `CANTBANO` int(11) DEFAULT NULL COMMENT 'Cantidad de baños',
  `TERRENO` varchar(25) NOT NULL COMMENT 'Terreno',
  `TERRENOCONSTRUIDO` varchar(25) DEFAULT NULL COMMENT 'Terreno construido',
  `TIPO` varchar(25) NOT NULL COMMENT 'Tipo de propiedad',
  `SERVICIO` varchar(10) NOT NULL COMMENT 'Tipo de servicio prestado',
  `ESTADO` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado',
  `DESCRIPCION` varchar(500) DEFAULT NULL COMMENT 'Descripción',
  `COMUNAPROPIEDAD` varchar(20) NOT NULL COMMENT 'Comuna donde se encuentra',
  `VALORPROPIEDAD` int(11) NOT NULL COMMENT 'Valor',
  `AMOBLADO` tinyint(1) DEFAULT '0' COMMENT 'Amoblado',
  `Activo` tinyint(1) DEFAULT '1' COMMENT 'deshabilitar'
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `propiedad`
--

INSERT INTO `propiedad` (`IDPROP`, `RUTCLIENTE`, `DIRECCION`, `CANTPIEZA`, `CANTBANO`, `TERRENO`, `TERRENOCONSTRUIDO`, `TIPO`, `SERVICIO`, `ESTADO`, `DESCRIPCION`, `COMUNAPROPIEDAD`, `VALORPROPIEDAD`, `AMOBLADO`, `Activo`) VALUES
(35, '18045248-6', '123', 1, 1, '123123', '', 'Casa', 'Venta', 1, 'dasdasdasdasdasd', 'Antofagasta', 123, 1, 0),
(36, '18045248-6', 'asdasd', 1, 7, 'qweqwe', 'weqwe', 'Casa', 'Venta', 1, 'asdasdasdasdasdasdasd', 'Calama', 123123123, 1, 1),
(37, '18045248-6', 'dasd', 1, 1, 'asdasd', '', 'Casa', 'Venta', 1, 'asdasdasdasd', 'Antofagasta', 3423423, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `IDSOLICITUD` int(11) NOT NULL,
  `RUTCLIENTE` varchar(10) NOT NULL,
  `RUTSOLICITANTE` varchar(10) NOT NULL,
  `NOMBRESSOLICITANTE` varchar(50) NOT NULL,
  `APELLIDOSSOLICITANTE` varchar(50) NOT NULL,
  `SERVICIOSOLICITADO` varchar(25) NOT NULL,
  `FECHASOLICITUD` date NOT NULL,
  `FECHASOLICITADA` date NOT NULL,
  `NUMTELEFONO` int(11) NOT NULL,
  `ESTADOSOLICITUD` tinyint(1) NOT NULL,
  `DESCRIPCIONSOLICITUD` varchar(254) NOT NULL,
  `CORREOCONTACTO` varchar(100) NOT NULL COMMENT 'Correo de contacto',
  `TIPOPROPIEDAD` varchar(50) NOT NULL COMMENT 'Tipo de propiedad'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `IDVENTA` int(11) NOT NULL,
  `RUTADMIN` varchar(10) DEFAULT NULL,
  `IDPROP` int(11) DEFAULT NULL,
  `NOMBRECOMPRADOR` varchar(50) NOT NULL,
  `APELLIDOSCOMPRADOR` varchar(50) NOT NULL,
  `RUTCOMPRADOR` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`RUTADMIN`);

--
-- Indices de la tabla `arrendatario`
--
ALTER TABLE `arrendatario`
  ADD PRIMARY KEY (`RUTARREN`);

--
-- Indices de la tabla `arriendo`
--
ALTER TABLE `arriendo`
  ADD PRIMARY KEY (`IDARRIENDO`),
  ADD KEY `FK_ARRIENDA` (`RUTARREN`),
  ADD KEY `FK_GESTIONA` (`RUTADMIN`),
  ADD KEY `FK_PUEDE` (`IDPROP`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`RUTCLIENTE`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`IDDOCU`),
  ADD KEY `FK_ADJUDICA` (`IDPROP`),
  ADD KEY `FK_CONTIENE` (`IDARRIENDO`),
  ADD KEY `FK_ENTREGA` (`RUTARREN`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`IDFACTURA`),
  ADD KEY `FK_GENERA` (`IDPAGO`);

--
-- Indices de la tabla `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`RUTFUNCIONARIO`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`IDIMAGEN`),
  ADD KEY `FK_REPRESENTA` (`IDPROP`);

--
-- Indices de la tabla `integra`
--
ALTER TABLE `integra`
  ADD PRIMARY KEY (`IDINTEGRA`),
  ADD KEY `FK_RELATIONSHIP_13` (`RUTFUNCIONARIO`),
  ADD KEY `FK_RELATIONSHIP_14` (`IDOT`);

--
-- Indices de la tabla `ordentrabajo`
--
ALTER TABLE `ordentrabajo`
  ADD PRIMARY KEY (`IDOT`),
  ADD KEY `FK_CREA` (`RUTADMIN`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`IDPAGO`),
  ADD KEY `FK_CANCELA` (`RUTARREN`),
  ADD KEY `FK_OBTIENE` (`IDARRIENDO`);

--
-- Indices de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  ADD PRIMARY KEY (`IDPROP`),
  ADD KEY `FK_POSEE` (`RUTCLIENTE`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`IDSOLICITUD`),
  ADD KEY `FK_REALIZA` (`RUTCLIENTE`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`IDVENTA`),
  ADD KEY `FK_ES` (`IDPROP`),
  ADD KEY `FK_HACE` (`RUTADMIN`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arriendo`
--
ALTER TABLE `arriendo`
  MODIFY `IDARRIENDO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `IDDOCU` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `IDFACTURA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `IDIMAGEN` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `integra`
--
ALTER TABLE `integra`
  MODIFY `IDINTEGRA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ordentrabajo`
--
ALTER TABLE `ordentrabajo`
  MODIFY `IDOT` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  MODIFY `IDPROP` int(11) NOT NULL AUTO_INCREMENT COMMENT 'propiedad_id',AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `IDSOLICITUD` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `IDVENTA` int(11) NOT NULL AUTO_INCREMENT;

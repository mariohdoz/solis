

/*==============================================================*/
/* Table: administrador                                         */
/*==============================================================*/
create table administrador
(
   rut_admin            varchar(10) not null,
   nombres_admin        varchar(100) not null,
   apellidos_admin      varchar(100) not null,
   contrasena_admin     varchar(100) not null,
   correo_admin         varchar(100) not null,
   telefono_admin       varchar(12) not null,
   perfil_admin         varchar(250) not null,
   super_admin          bool,
   activo_admin         bool,
   primary key (rut_admin)
);

/*==============================================================*/
/* Table: arrendatario                                          */
/*==============================================================*/
create table arrendatario
(
   rut_arrendatario     varchar(10) not null,
   nombres_arrendatario varchar(100) not null,
   apellidos_arrendatario varchar(100) not null,
   estadocivil_arrendatario varchar(8) not null,
   profesion_arrendatario varchar(250) not null,
   correo_arrendatario  varchar(100) not null,
   telefonofijo_arrendatario varchar(12),
   telefonocelular_arrendatario varchar(12) not null,
   nrocuenta_arrendatario varchar(25),
   banco_arrendatario   varchar(50),
   nacionalidad_arrendatario varchar(50) not null,
   empresa_arrendatario bool not null default 0,
   primary key (rut_arrendatario)
);

/*==============================================================*/
/* Table: arriendo                                              */
/*==============================================================*/
create table arriendo
(
   id_arriendo          int not null auto_increment,
   id_propiedad         int not null,
   rut_admin            varchar(10) not null,
   rut_arrendatario     varchar(10),
   inscripcion_arriendo date not null,
   fechapago_arriendo   date not null,
   inicio_arriendo      date not null,
   termino_arriendo     date not null,
   valor_arriendo       int not null,
   primary key (id_arriendo)
);

/*==============================================================*/
/* Table: cliente                                               */
/*==============================================================*/
create table cliente
(
   rut_cliente          varchar(10) not null,
   nombres_cliente      varchar(100) not null,
   apellidos_cliente    varchar(100) not null,
   estadocivil_cliente  varchar(8) not null,
   profesion_cliente    varchar(100),
   domicilio_cliente    varchar(150),
   correo_cliente       varchar(100),
   telefonofijo_cliente varchar(12),
   telefonocelular_cliente varchar(12),
   nrocuenta_cliente    varchar(25),
   banco_cliente        varchar(50),
   tipocuenta_cliente   varchar(40),
   activo_cliente       bool default 1,
   primary key (rut_cliente)
);

/*==============================================================*/
/* Table: documento                                             */
/*==============================================================*/
create table documento
(
   id_documento         int not null auto_increment,
   id_arriendo          int,
   rut_arrendatario     varchar(10),
   id_propiedad         int,
   tipo_documento       varchar(50) not null,
   url_documento        varchar(250) not null,
   digitalizado_documento bool not null default 1,
   copiaoriginal_documento bool not null default 1,
   primary key (id_documento)
);

/*==============================================================*/
/* Table: funcionario                                           */
/*==============================================================*/
create table funcionario
(
   rut_funcionario      varchar(10) not null,
   nombres_funcionario  varchar(100) not null,
   apellidos_funcionario varchar(100) not null,
   telefonofijo_funcionario varchar(12) not null,
   telefonocelular_funcionario varchar(12) not null,
   domicilio_funcionario varchar(150) not null,
   correo_funcionario   varchar(100) not null,
   primary key (rut_funcionario)
);

/*==============================================================*/
/* Table: imagen                                                */
/*==============================================================*/
create table imagen
(
   id_imagen            int not null auto_increment,
   id_propiedad         int not null,
   url_imagen           varchar(250) not null,
   primary key (id_imagen)
);

/*==============================================================*/
/* Table: integra                                               */
/*==============================================================*/
create table integra
(
   id_integra           int not null auto_increment,
   rut_funcionario      varchar(10) not null,
   id_ot                int not null,
   primary key (id_integra)
);

/*==============================================================*/
/* Table: ordentrabajo                                          */
/*==============================================================*/
create table ordentrabajo
(
   id_ot                int not null auto_increment,
   rut_admin            varchar(10) not null,
   descripcion_ot       text not null,
   fechaemision_ot      date not null,
   fechaejecucion_ot    date not null,
   estado_ot            bool not null default 1,
   primary key (id_ot)
);

/*==============================================================*/
/* Table: pago                                                  */
/*==============================================================*/
create table pago
(
   id_pago              int not null auto_increment,
   id_arriendo          int,
   rut_arrendatario     varchar(10),
   fecha_pago           date not null,
   totalpagar_pago      int not null,
   totalpagado_pago     int not null,
   primary key (id_pago)
);

/*==============================================================*/
/* Table: propiedad                                             */
/*==============================================================*/
create table propiedad
(
   id_propiedad         int not null auto_increment,
   rut_cliente          varchar(10),
   direccion_propiedad  varchar(255) not null,
   habitacion_propiedad int,
   bano_propiedad       int,
   terreno_propiedad    varchar(50),
   construido_propiedad varchar(50),
   tipo_propiedad       varchar(25) not null,
   servicio_propiedad   varchar(10) not null,
   estado_propiedad     bool default 1,
   descripcion_propiedad          text,
   comuna_propiedad     varchar(20) not null,
   amoblado_propiedad   bool not null default 0,
   valor_propiedad      int not null,
   activo_propiedad     bool default 1,
   primary key (id_propiedad)
);

/*==============================================================*/
/* Table: solicitud                                             */
/*==============================================================*/
create table solicitud
(
   id_solicitud         int not null auto_increment,
   rut_cliente          varchar(10),
   rut_funcionario      varchar(10),
   nombres_solicitud    varchar(100),
   apellidos_solicitud  varchar(100),
   servicio_solicitud   varchar(25) not null,
   fecha_solicitud      date not null,
   fechaejecucion_solicitud date not null,
   telefono_solicitud   varchar(12),
   estado_solicitud     bool not null default 1,
   descripcion_solicitud text not null,
   tipopropiedad_solicitud varchar(50) not null,
   correo_solicitud     varchar(100),
   primary key (id_solicitud)
);

/*==============================================================*/
/* Table: venta                                                 */
/*==============================================================*/
create table venta
(
   id_venta             int not null auto_increment,
   id_propiedad         int not null,
   rut_admin            varchar(10),
   nombrescomprador_venta varchar(100) not null,
   apellidoscomprador_venta varchar(100) not null,
   rutcomprador_venta   varchar(25) not null,
   primary key (id_venta)
);

alter table arriendo add constraint fk_gestiona foreign key (rut_admin)
      references administrador (rut_admin) on delete restrict on update restrict;

alter table arriendo add constraint fk_incumbe foreign key (rut_arrendatario)
      references arrendatario (rut_arrendatario) on delete restrict on update restrict;

alter table arriendo add constraint fk_puede foreign key (id_propiedad)
      references propiedad (id_propiedad) on delete restrict on update restrict;

alter table documento add constraint fk_contiene foreign key (id_arriendo)
      references arriendo (id_arriendo) on delete restrict on update restrict;

alter table documento add constraint fk_corresponde foreign key (id_propiedad)
      references propiedad (id_propiedad) on delete restrict on update restrict;

alter table documento add constraint fk_entrega foreign key (rut_arrendatario)
      references arrendatario (rut_arrendatario) on delete restrict on update restrict;

alter table imagen add constraint fk_representa foreign key (id_propiedad)
      references propiedad (id_propiedad) on delete restrict on update restrict;

alter table integra add constraint fk_relationship_8 foreign key (id_ot)
      references ordentrabajo (id_ot) on delete restrict on update restrict;

alter table integra add constraint fk_relationship_9 foreign key (rut_funcionario)
      references funcionario (rut_funcionario) on delete restrict on update restrict;

alter table ordentrabajo add constraint fk_crea foreign key (rut_admin)
      references administrador (rut_admin) on delete restrict on update restrict;

alter table pago add constraint fk_acata foreign key (id_arriendo)
      references arriendo (id_arriendo) on delete restrict on update restrict;

alter table pago add constraint fk_origina foreign key (rut_arrendatario)
      references arrendatario (rut_arrendatario) on delete restrict on update restrict;

alter table propiedad add constraint fk_posee foreign key (rut_cliente)
      references cliente (rut_cliente) on delete restrict on update restrict;

alter table solicitud add constraint fk_elabora foreign key (rut_funcionario)
      references funcionario (rut_funcionario) on delete restrict on update restrict;

alter table solicitud add constraint fk_realiza foreign key (rut_cliente)
      references cliente (rut_cliente) on delete restrict on update restrict;

alter table venta add constraint fk_acoge foreign key (id_propiedad)
      references propiedad (id_propiedad) on delete restrict on update restrict;

alter table venta add constraint fk_concibe foreign key (rut_admin)
      references administrador (rut_admin) on delete restrict on update restrict;

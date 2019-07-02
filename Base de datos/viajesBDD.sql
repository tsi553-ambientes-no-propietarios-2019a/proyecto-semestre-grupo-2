/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     01/07/2019 20:31:01                          */
/*==============================================================*/


drop table if exists ASIENTO;

drop table if exists BUS;

drop table if exists CIUDAD;

drop table if exists COMPRA;

drop table if exists CON__CLIMATOLOGICAS;

drop table if exists EMP__AFILIADA;

drop table if exists HABITACIONES;

drop table if exists HOTEL;

drop table if exists LUGARES;

drop table if exists PAQUETES;

drop table if exists PROVINCIA;

drop table if exists RESERVA;

drop table if exists TERMINAL;

drop table if exists TIENE;

drop table if exists USER;

/*==============================================================*/
/* Table: ASIENTO                                               */
/*==============================================================*/
create table ASIENTO
(
   NUM_ASIENTO          int not null,
   NUM_BUS              int,
   TIPO_ASIENTO         varchar(50),
   primary key (NUM_ASIENTO)
);

/*==============================================================*/
/* Table: BUS                                                   */
/*==============================================================*/
create table BUS
(
   NUM_BUS              int not null,
   ID_EMP               int,
   ID_LUGAR             int,
   NOMBRE_CONDUCTOR     varchar(50) not null,
   NUM_ASIENTOS         int not null,
   TIPO_BUS             varchar(50) not null,
   primary key (NUM_BUS)
);

/*==============================================================*/
/* Table: CIUDAD                                                */
/*==============================================================*/
create table CIUDAD
(
   COD_CIUDAD           int not null,
   ID_TERM              int,
   CODPROV              int,
   NOMBRE               varchar(100) not null,
   LONGITUD             decimal(15,7) not null,
   LATITUD              decimal(15,7) not null,
   primary key (COD_CIUDAD)
);

/*==============================================================*/
/* Table: COMPRA                                                */
/*==============================================================*/
create table COMPRA
(
   IDCOMPRA             int not null,
   IDPAQUETE            int,
   ID                   int not null,
   FECHA_COM            date,
   NO_ASIENTOS          int,
   TOTAL_ASIENTOS       decimal(10),
   NO_HABITA            int,
   NO_PAQUETES          int,
   TOTAL_HABITA         decimal(10),
   TOTAL_PAQUETES       decimal(10),
   TOTAL                decimal(10,2) not null,
   primary key (IDCOMPRA)
);

/*==============================================================*/
/* Table: CON__CLIMATOLOGICAS                                   */
/*==============================================================*/
create table CON__CLIMATOLOGICAS
(
   IDCON                int not null,
   ID_LUGAR             int,
   TEMPERATURA          decimal(15,7) not null,
   PRESION              decimal(15,7) not null,
   ESTADO               varchar(50) not null,
   DESCRIPCION          text not null,
   FECHA_HORA           datetime,
   primary key (IDCON)
);

/*==============================================================*/
/* Table: EMP__AFILIADA                                         */
/*==============================================================*/
create table EMP__AFILIADA
(
   ID_EMP               int not null,
   ID_TERM              int,
   NOMBRE_EMP           varchar(100) not null,
   EMAIL_EMP            varchar(100) not null,
   TEL_EMP              numeric(10,0) not null,
   primary key (ID_EMP)
);

/*==============================================================*/
/* Table: HABITACIONES                                          */
/*==============================================================*/
create table HABITACIONES
(
   ID_HAB               int not null,
   ID_HOTEL             int,
   NO                   int not null,
   TIPO_HAB             varchar(50) not null,
   ESTADO_HAB           varchar(50) not null,
   NO_CAMAS             int not null,
   primary key (ID_HAB)
);

/*==============================================================*/
/* Table: HOTEL                                                 */
/*==============================================================*/
create table HOTEL
(
   ID_HOTEL             int not null,
   COD_CIUDAD           int,
   NOMBRE               varchar(100) not null,
   TELEFONO             numeric(20,0) not null,
   EMAIL                varchar(100) not null,
   SITIO_WEB            varchar(200),
   NO_HABITACIONES      int not null,
   primary key (ID_HOTEL)
);

/*==============================================================*/
/* Table: LUGARES                                               */
/*==============================================================*/
create table LUGARES
(
   ID_LUGAR             int not null,
   COD_CIUDAD           int,
   IDPAQUETE            int,
   NOMBRE_LUGAR         varchar(100) not null,
   LONGITUD             decimal(15,7) not null,
   LATITUD              decimal(15,7) not null,
   primary key (ID_LUGAR)
);

/*==============================================================*/
/* Table: PAQUETES                                              */
/*==============================================================*/
create table PAQUETES
(
   IDPAQUETE            int not null,
   ID_LUGAR             int,
   NOMBRE               varchar(100),
   NO_DIAS              int not null,
   NO_NOCHES            int not null,
   DESCRIP              text not null,
   primary key (IDPAQUETE)
);

/*==============================================================*/
/* Table: PROVINCIA                                             */
/*==============================================================*/
create table PROVINCIA
(
   CODPROV              int not null,
   NOMBRE               varchar(100) not null,
   primary key (CODPROV)
);

/*==============================================================*/
/* Table: RESERVA                                               */
/*==============================================================*/
create table RESERVA
(
   IDCOMPRA             int not null,
   ID_HAB               int not null,
   primary key (IDCOMPRA, ID_HAB)
);

/*==============================================================*/
/* Table: TERMINAL                                              */
/*==============================================================*/
create table TERMINAL
(
   ID_TERM              int not null,
   NOMBRE_TERM          varchar(50) not null,
   LONGITUD             decimal(15,7) not null,
   LATITUD              decimal(15,7) not null,
   primary key (ID_TERM)
);

/*==============================================================*/
/* Table: TIENE                                                 */
/*==============================================================*/
create table TIENE
(
   IDCOMPRA             int not null,
   NUM_ASIENTO          int not null,
   primary key (IDCOMPRA, NUM_ASIENTO)
);

/*==============================================================*/
/* Table: USER                                                  */
/*==============================================================*/
create table USER
(
   ID                   int not null,
   USERNAME             varchar(100) not null,
   PASSWORD             varchar(100) not null,
   EMAIL                varchar(100) not null,
   TELEFONO             numeric(20,0),
   FECHA_NAC            date not null,
   primary key (ID)
);

alter table ASIENTO add constraint FK_ESTA_RESERVADO foreign key (NUM_BUS)
      references BUS (NUM_BUS) on delete restrict on update restrict;

alter table BUS add constraint FK_FORMA_PARTE_DE foreign key (ID_EMP)
      references EMP__AFILIADA (ID_EMP) on delete restrict on update restrict;

alter table BUS add constraint FK_RELATIONSHIP_10 foreign key (ID_LUGAR)
      references LUGARES (ID_LUGAR) on delete restrict on update restrict;

alter table CIUDAD add constraint FK_RELATIONSHIP_11 foreign key (CODPROV)
      references PROVINCIA (CODPROV) on delete restrict on update restrict;

alter table CIUDAD add constraint FK_RELATIONSHIP_15 foreign key (ID_TERM)
      references TERMINAL (ID_TERM) on delete restrict on update restrict;

alter table COMPRA add constraint FK_REALIZA foreign key (ID)
      references USER (ID) on delete restrict on update restrict;

alter table COMPRA add constraint FK_RELATIONSHIP_17 foreign key (IDPAQUETE)
      references PAQUETES (IDPAQUETE) on delete restrict on update restrict;

alter table CON__CLIMATOLOGICAS add constraint FK_RELATIONSHIP_8 foreign key (ID_LUGAR)
      references LUGARES (ID_LUGAR) on delete restrict on update restrict;

alter table EMP__AFILIADA add constraint FK_SE_ENCUENTRA_EN_UN foreign key (ID_TERM)
      references TERMINAL (ID_TERM) on delete restrict on update restrict;

alter table HABITACIONES add constraint FK_TIENE1 foreign key (ID_HOTEL)
      references HOTEL (ID_HOTEL) on delete restrict on update restrict;

alter table HOTEL add constraint FK_RELATIONSHIP_14 foreign key (COD_CIUDAD)
      references CIUDAD (COD_CIUDAD) on delete restrict on update restrict;

alter table LUGARES add constraint FK_RELATIONSHIP_12 foreign key (COD_CIUDAD)
      references CIUDAD (COD_CIUDAD) on delete restrict on update restrict;

alter table LUGARES add constraint FK_RELATIONSHIP_18 foreign key (IDPAQUETE)
      references PAQUETES (IDPAQUETE) on delete restrict on update restrict;

alter table PAQUETES add constraint FK_RELATIONSHIP_16 foreign key (ID_LUGAR)
      references LUGARES (ID_LUGAR) on delete restrict on update restrict;

alter table RESERVA add constraint FK_RESERVA foreign key (IDCOMPRA)
      references COMPRA (IDCOMPRA) on delete restrict on update restrict;

alter table RESERVA add constraint FK_RESERVA2 foreign key (ID_HAB)
      references HABITACIONES (ID_HAB) on delete restrict on update restrict;

alter table TIENE add constraint FK_TIENE foreign key (IDCOMPRA)
      references COMPRA (IDCOMPRA) on delete restrict on update restrict;

alter table TIENE add constraint FK_TIENE2 foreign key (NUM_ASIENTO)
      references ASIENTO (NUM_ASIENTO) on delete restrict on update restrict;


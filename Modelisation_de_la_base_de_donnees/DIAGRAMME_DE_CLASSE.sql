/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     22/04/2020 20:29:43                          */
/*==============================================================*/


/*==============================================================*/
/* Table: Admin                                                 */
/*==============================================================*/
create table Admin
(
   nomDutilisateur      varchar(254),
   password             varchar(254) not null,
   primary key (password)
);

/*==============================================================*/
/* Table: Moto                                                  */
/*==============================================================*/
create table Moto
(
   idmoto               int AUTO_INCREMENT,
   marque               varchar(254),
   modele               varchar(254),
   cylindre             varchar(254),
   prix                 varchar(254),
   categorie            varchar(254),
   numeroDeSerie        varchar(254) not null,
   couleur              varchar(254),
   primary key (idmoto)
);


/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     16/04/2020 21:51:25                          */
/*==============================================================*/


/*==============================================================*/
/* Table: Moto                                                  */
/*==============================================================*/
create table Moto
(
   id                   int not null,
   marque               varchar(254),
   modele               varchar(254),
   cylindre             varchar(254),
   categorie           varchar(254),
   numeroDeSerie        varchar(254),
   prix                 varchar(254),
   couleur              varchar(254),
   primary key (id)
);


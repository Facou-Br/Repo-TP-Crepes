-- *********************************************
-- * SQL MySQL generation
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2
-- * Generator date: Sep 14 2021
-- * Generation date: Fri Mar  1 10:07:37 2024
-- * LUN file: C:\Users\OO\Downloads\PizzaTacos6.lun
-- * Schema: Physique/6
-- *********************************************


-- Database Section
-- ________________

create database Physique;
use Physique;


-- Tables Section
-- _____________

create table COM_DET (
     Num_OF int not null,
     Quant int not null,
     NumCom int not null,
     constraint FKCon_DET_ID primary key (Num_OF));

create table COMMANDE (
     NumCom int not null,
     NomClient char(25) not null,
     TelClient char(12) not null,
     AdrClient char(30),
     CP_Client char(5),
     VilClient char(20),
     Date date not null,
     HeureDispo date not null,
     TypeEmbal char(1)not null,
     A_Livrer char(1) not null,
     EtatCde char(15) not null,
     EtatLivraison char(1),
     CoutLiv float(6),
     TotalTTC float(5),
     DateArchiv date,
     IdLivreur int,
     constraint ID_COMMANDE_ID primary key (NumCom));

create table DET_INGR (
     Num_OF int not null,
     IdIngred int not null,
     constraint ID_Utilise_ID primary key (IdIngred, Num_OF));

create table DETAIL (
     Num_OF int not null,
     NomProd char(30) not null,
     IngBase1 char(20) not null,
     IngBase2 char(20),
     IngBase3 char(20),
     IngBase4 char(20),
     IngOpt1 char(20),
     IngOpt2 char(20),
     IngOpt3 char(20),
     IngOpt4 char(20),
     DateArchiv date,
     IdProd int not null,
     constraint ID_DETAIL_ID primary key (Num_OF));

create table FOURN_INGR (
     NomFourn char(25) not null,
     IdIngred int not null,
     PrixUHT float(1) not null,
     constraint ID_Provient_ID primary key (NomFourn, IdIngred));

create table FOURNISSEUR (
     NomFourn char(25) not null,
     Adresse char(30) not null,
     CodePostal char(5) not null,
     Ville char(20) not null,
     Tel char(12) not null,
     DateArchiv date,
     constraint ID_FOURNISSEUR_ID primary key (NomFourn));

create table INGREDIENT (
     IdIngred int not null,
     NomIngred char(30) not null,
     Frais char(1) not null,
     Unite char(10) default '"sans"' not null,
     StockMin int not null,
     StockReel float(7) not null,
     PrixUHT_Moyen float(5) not null,
     Q_A_Com int not null,
     DateArchiv date,
     constraint ID_INGREDIENT_ID primary key (IdIngred));

create table LIVREUR (
     IdLivreur int not null,
     Nom char(20) not null,
     Prenom char(20) not null,
     Tel char(16) not null,
     NumSS char(15) not null,
     Disponible char not null,
     DateArchiv date,
     constraint ID_LIVREUR_ID primary key (IdLivreur));

create table PROD_INGR (
     IdIngred int not null,
     IdProd int not null,
     Quant int not null,
     constraint ID_Comporte_ID primary key (IdIngred, IdProd));

create table PRODUIT (
     IdProd int not null,
     NomProd char(20) not null,
     Active char not null,
     Taille char(1),
     NbIngBase int,
     NbIngOpt int,
     PrixUHT float(5) not null,
     Image char(50),
     IngBase1 char(20) not null,
     IngBase2 char(20),
     IngBase3 char(20),
     IngBase4 char(20),
     IngBase5 char(20),
     IngOpt1 char(20),
     IngOpt2 char(20),
     IngOpt3 char(20),
     IngOpt4 char(20),
     IngOpt5 char(20),
     IngOpt6 char(20),
     NbOptMax int,
     DateArchiv date,
     constraint ID_PRODUIT_ID primary key (IdProd));

create table RESPONSABLE (
     IdRes int not null,
     Nom char(25) not null,
     Prenom char(20) not null,
     Tel char(10) not null,
     constraint ID_RESPONSABLE_ID primary key (IdRes));


-- Constraints Section
-- ___________________

alter table COM_DET add constraint FKCon_DET_FK
     foreign key (Num_OF)
     references DETAIL (Num_OF);

alter table COM_DET add constraint FKCon_COM
     foreign key (NumCom)
     references COMMANDE (NumCom);

alter table COMMANDE add constraint FKLivre
     foreign key (IdLivreur)
     references LIVREUR (IdLivreur);

alter table DET_INGR add constraint FKUti_ING
     foreign key (IdIngred)
     references INGREDIENT (IdIngred);

alter table DET_INGR add constraint FKUti_DET
     foreign key (Num_OF)
     references DETAIL (Num_OF);

-- Not implemented
-- alter table DETAIL add constraint ID_DETAIL_CHK
--     check(exists(select * from DET_INGR
--                  where DET_INGR.Num_OF = Num_OF));

-- Not implemented
-- alter table DETAIL add constraint ID_DETAIL_CHK
--     check(exists(select * from COM_DET
--                  where COM_DET.Num_OF = Num_OF));

alter table DETAIL add constraint FKEstChoisi
     foreign key (IdProd)
     references PRODUIT (IdProd);

alter table FOURN_INGR add constraint FKPro_ING
     foreign key (IdIngred)
     references INGREDIENT (IdIngred);

alter table FOURN_INGR add constraint FKPro_FOU
     foreign key (NomFourn)
     references FOURNISSEUR (NomFourn);

alter table PROD_INGR add constraint FKCom_PRO
     foreign key (IdProd)
     references PRODUIT (IdProd);

alter table PROD_INGR add constraint FKCom_ING
     foreign key (IdIngred)
     references INGREDIENT (IdIngred);

-- Not implemented
-- alter table PRODUIT add constraint ID_PRODUIT_CHK
--     check(exists(select * from PROD_INGR
--                  where PROD_INGR.IdProd = IdProd));


-- Index Section
-- _____________

create unique index FKCon_DET_IND
     on COM_DET (Num_OF);

create unique index ID_COMMANDE_IND
     on COMMANDE (NumCom);

create unique index ID_Utilise_IND
     on DET_INGR (IdIngred, Num_OF);

create unique index ID_DETAIL_IND
     on DETAIL (Num_OF);

create unique index ID_Provient_IND
     on FOURN_INGR (NomFourn, IdIngred);

create unique index ID_FOURNISSEUR_IND
     on FOURNISSEUR (NomFourn);

create unique index ID_INGREDIENT_IND
     on INGREDIENT (IdIngred);

create unique index ID_LIVREUR_IND
     on LIVREUR (IdLivreur);

create unique index ID_Comporte_IND
     on PROD_INGR (IdIngred, IdProd);

create unique index ID_PRODUIT_IND
     on PRODUIT (IdProd);

create unique index ID_RESPONSABLE_IND
     on RESPONSABLE (IdRes);

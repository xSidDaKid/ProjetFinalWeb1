#
# Description : Script SQL pour créer la base de données "cinema",
#               les tables utilisateurs, acheteur, infos_Cinema, tab_Cinema et billet.
#               Script qui insérer divers données.
#               
# Date        : 2021/04/13
# Auteurs      : Kumaran Satkunanathan
#                Louai Roueha
#                Shajaan Balasingam
#

CREATE DATABASE cinema DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE cinema;

CREATE TABLE utilisateur (
  id_utilisateur    INT(10),
  mot_passe         VARCHAR(255),
  categorie         VARCHAR(255),
  CONSTRAINT user_pk PRIMARY KEY (id_utilisateur)
);

CREATE TABLE acheteur (
  id_acheteur       INT(10),    
  nom               VARCHAR(255),
  telephone         VARCHAR(255),
  solde             DECIMAL(8, 2),
  CONSTRAINT acheteur_fk FOREIGN KEY (id_acheteur) REFERENCES billet(id_acheteur)
);

CREATE TABLE infos_Cinema (
  code_infos        INT(10),
  titre             VARCHAR(255),
  url_photo         VARCHAR(255),
  CONSTRAINT code_pk PRIMARY KEY (code_infos)
);

CREATE TABLE tab_Cinema (
  numero_Cinema      INT(10),
  la_date            DATE,
  prix_un_billet     DECIMAL(8,2),
  places_totales     INT(10),
  places_vendues     INT(10),
  code_infos         INT(10),
  CONSTRAINT numero_pk PRIMARY KEY (numero_Cinema)
);

CREATE TABLE billet (
  numero_billet      INT(10),
  prix_paye          DECIMAL(8,2),
  numero_Cinema      INT(10),
  id_acheteur        INT(10),
  CONSTRAINT numeroB_pk PRIMARY KEY (numero_billet)
);

#5 utilisateurs
INSERT INTO utilisateur VALUES (100, 'root', 'acheteur');
INSERT INTO utilisateur VALUES (101, 'root', 'acheteur');
INSERT INTO utilisateur VALUES (102, 'root', 'acheteur');
INSERT INTO utilisateur VALUES (103, 'root', 'administrateur');
INSERT INTO utilisateur VALUES (104, 'root', 'administrateur');

#3 acheteurs
INSERT INTO utilisateur VALUES (100, 'AcheteurA', '5141231234',100);
INSERT INTO utilisateur VALUES (101, 'AcheteurB', '5145647891',0);
INSERT INTO utilisateur VALUES (102, 'AcheteurC', '5144489712',0);



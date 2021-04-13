CREATE DATABASE cinema DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE cinema

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

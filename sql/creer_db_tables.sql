CREATE DATABASE cinema DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE cinema

CREATE TABLE utilisateur (
  mot_passe         VARCHAR(255),
  categorie         VARCHAR(255),
);
CREATE TABLE acheteur (
    
  nom               VARCHAR(255),
  telephone         VARCHAR(255),
  mot_passe         DECIMAL(8, 2),

);
CREATE TABLE infos_Cinema ();
CREATE TABLE tab_Cinema ();
CREATE TABLE billet ();

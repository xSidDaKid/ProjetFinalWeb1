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
  CONSTRAINT acheteur_pk PRIMARY KEY (id_acheteur), 
  CONSTRAINT id_user_fk FOREIGN KEY (id_acheteur) REFERENCES utilisateur(id_utilisateur)
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
  CONSTRAINT numero_pk PRIMARY KEY (numero_Cinema),
  CONSTRAINT code_infos_fk FOREIGN KEY (code_infos) REFERENCES infos_Cinema(code_infos)
);

CREATE TABLE billet (
  numero_billet      INT(10),
  prix_paye          DECIMAL(8,2),
  numero_Cinema      INT(10),
  id_acheteur        INT(10),
  CONSTRAINT numeroB_pk PRIMARY KEY (numero_billet),
  CONSTRAINT numero_Cinema_fk1 FOREIGN KEY (numero_billet) REFERENCES tab_Cinema(numero_Cinema),
  CONSTRAINT id_acheteur_fk1 FOREIGN KEY (id_acheteur) REFERENCES acheteur(id_acheteur)
);

#5 utilisateurs
INSERT INTO utilisateur VALUES (100, 'root', 'acheteur');
INSERT INTO utilisateur VALUES (101, 'root', 'acheteur');
INSERT INTO utilisateur VALUES (102, 'root', 'acheteur');
INSERT INTO utilisateur VALUES (103, 'root', 'administrateur');
INSERT INTO utilisateur VALUES (104, 'root', 'administrateur');

#3 acheteurs
INSERT INTO acheteur VALUES (100, 'AcheteurA', '5141231234',100);
INSERT INTO acheteur VALUES (101, 'AcheteurB', '5145647891',0);
INSERT INTO acheteur VALUES (102, 'AcheteurC', '5144489712',0);

#4 infos_Cinema
INSERT INTO infos_Cinema VALUES (0019, 'Cinéma de Montréal','photo.jpeg');
INSERT INTO infos_Cinema VALUES (0020, 'Cinéma Québécoise', 'photo1.jpeg');
INSERT INTO infos_Cinema VALUES (0021, 'Paris Cinemas', 'photo2.jpeg');
INSERT INTO infos_Cinema VALUES (0022, 'Cinéma Rosemont', 'photo3.jpeg');

#6 tab_Cinema
INSERT INTO tab_Cinema VALUES (100, "2021-04-05", 5.30, 100, 5, 0019);
INSERT INTO tab_Cinema VALUES (101, "2021-04-06", 5.30, 100, 50, 0020);
INSERT INTO tab_Cinema VALUES (102, "2021-04-07", 5.30, 100, 25, 0021);
INSERT INTO tab_Cinema VALUES (103, "2021-04-08", 5.30, 100, 75, 0022);
INSERT INTO tab_Cinema VALUES (104, "2021-04-09", 5.30, 100, 65, 0019);
INSERT INTO tab_Cinema VALUES (105, "2021-04-10", 5.30, 100, 10, 0020);

#6 billet
INSERT INTO billet VALUES (100, 5.30, 100, 100);
INSERT INTO billet VALUES (101, 5.30, 101, 101);
INSERT INTO billet VALUES (102, 5.30, 101, 102);
INSERT INTO billet VALUES (103, 5.30, 102, 103);
INSERT INTO billet VALUES (104, 5.30, 102, 104);
INSERT INTO billet VALUES (105, 5.30, 102, 105);





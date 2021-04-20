#
# Description : Script pour supprimer la base de données.
#               
# Date        : 2021/04/13
# Auteurs     : Kumaran Satkunanathan
#               Louai Roueha
#               Shajaan Balasingam
#

USE cinema;

DELETE FROM billet;
DROP TABLE billet;

DELETE FROM acheteur;
DROP TABLE acheteur;

DELETE FROM utilisateur;
DROP TABLE utilisateur;

DELETE FROM tab_Cinema;
DROP TABLE tab_Cinema;

DELETE FROM infos_Cinema;
DROP TABLE infos_Cinema;

DROP DATABASE cinema;
#test
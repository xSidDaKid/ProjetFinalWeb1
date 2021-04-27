<?php

/*
#
# Description : Classe Cinema
#               
# Date        : 2021/04/16
# Auteurs     : Kumaran Satkunanathan
#               Louai Roueha
#               Shajaan Balasingam
#
*/

// ****** INLCUSIONS *******
// si la constante n'existe pas, on la crée
if (defined("DOSSIER_BASE_INCLUDE") == false) {
	$chemin=(substr($_SERVER['DOCUMENT_ROOT'],-1)=="/")?$_SERVER['DOCUMENT_ROOT']:$_SERVER['DOCUMENT_ROOT']."/";
	define("DOSSIER_BASE_INCLUDE", $chemin."projet_h2021_g16/");
}
include_once(DOSSIER_BASE_INCLUDE."modele/Cinema.class.php"); 
include_once(DOSSIER_BASE_INCLUDE."modele/InfosCinema.class.php"); 
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");

class CinemaDAO implements DAO {
	public static function chercher($unNumero) { 
			
			// obtenir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			// valeur par défaut pour la variable à retourner si non-trouvée
			$unCinema=null;
			
			// Préparer et exécute une requête de type DAOStatement avec des paramètres SQL	
			$requete=$connexion->prepare("SELECT * FROM tab_cinema WHERE numero_Cinema=?");
			$requete->execute(array($unNumero));

			// Analyser l’enregistrement, s’il existe,
			if ($requete->rowCount()!=0) {
				// ... et créer l’instance de Cinema
				$rangee=$requete->fetch();
				$unCinema = new Cinema($rangee['numero_Cinema'], $rangee['la_date'], $rangee['prix_un_billet'], $rangee['places_totales'], $rangee['places_vendues'], $rangee['code_infos']);				
			}
			
			// fermer le curseur de la requête et la connexion à la BD
			$requete->closeCursor();
			ConnexionBD::close();
			return $unCinema;
	}
	public static function chercherTous() { 

			// obtenir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			// initialisation du tableau à retourner
			$tableau=[];	

			// Préparer une requête de type PDOStatement avec des paramètres SQL et l'exécuter	
			$requete=$connexion->prepare("SELECT * FROM tab_cinema");
			$requete->execute();

			// Analyser les enregistrements s'il y en a 
			foreach ($requete as $rangee) {
				$unCinema = new Cinema($rangee['numero_Cinema'], $rangee['la_date'], $rangee['prix_un_billet'], $rangee['places_totales'], $rangee['places_vendues'], $rangee['code_infos']);			
				array_push($tableau, $unCinema);
			}
			
			// fermer les curseur de la requête et la connexion, puis retourner le tableau d'objets de type Candidat
			$requete-> closeCursor();
			ConnexionBD::close();	
			return $tableau;
	}

	public static function chercherAvecFiltre($clause) { 

			// obtenir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			// initialisation du tableau vide
			$tableau=[];	
			
			// Préparer une requête de type PDOStatement avec des paramètres SQL	
			$requete=$connexion->prepare("SELECT * FROM tab_cinema ".$clause);
			
			// Exécuter la requête
			$requete->execute();
			
			// Analyser les enregistrements s'il y en a 
			foreach ($requete as $rangee) {
				$unCinema = new Cinema($rangee['numero_Cinema'], $rangee['la_date'], $rangee['prix_un_billet'], $rangee['places_totales'], $rangee['places_vendues'], $rangee['code_infos']);
				array_push($tableau, $unCinema);
			}
			
			// fermer le curseur de la requête et la connexion à la BD
			$requete-> closeCursor();
			ConnexionBD::close();	
			return $tableau;
	}

	public static function chercherParCodeInfos($unCode) { 

			// obtenir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			// initialisation du tableau vide
			$tableau=[];	
			
			// Préparer une requête de type PDOStatement avec des paramètres SQL	
			$requete=$connexion->prepare("SELECT * FROM tab_cinema WHERE code_infos=?");
			
			// Exécuter la requête
			$requete->execute(array($unCode));
			
			// Analyser les enregistrements s'il y en a 
			foreach ($requete as $rangee) {
				$unCinema = new Cinema($rangee['numero_Cinema'], $rangee['la_date'], $rangee['prix_un_billet'], $rangee['places_totales'], $rangee['places_vendues'], $rangee['code_infos']);
				array_push($tableau, $unCinema);
			}
			
			// fermer le curseur de la requête et la connexion à la BD
			$requete-> closeCursor();
			ConnexionBD::close();	
			return $tableau;
	}

	public static function inserer($unCinema) { 

			// obtenir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			// On prépare la commande insert
			$requete=$connexion->prepare("INSERT INTO tab_cinema (numero_Cinema,la_date,prix_un_billet,places_totales,places_vendues,code_infos) VALUES (?,?,?,?,?,?)");

			// On l’exécute, et on retourne l’état de réussite (true/false)
			$tableauInfos=[$unCinema->getNumeroCinema(),$unCinema->getLaDate(), $unCinema->getPrixUnBillet(),$unCinema->getPlaceTotales(),$unCinema->getPlaceVendues(),$unCinema->getInfos()];

			return $requete->execute($tableauInfos);
	}

	public static function modifier($unCinema) { 

			// obtenir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			
			// On prépare la commande update
			$requete=$connexion->prepare("UPDATE tab_cinema SET la_date=?, prix_un_billet=?, places_totales=?, places_vendues=?, code_infos=? WHERE numero_Cinema=?");

			$tableauInfos=[$unCinema->getLaDate(), $unCinema->getPrixUnBillet(),$unCinema->getPlaceTotales(),$unCinema->getPlaceVendues(),$unCinema->getInfos(), $unCinema->getNumeroCinema()];

			// On exécute la requête			   
			$requete->execute($tableauInfos);
	}

	public static function supprimer($unCinema) { 

			// obtenir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			// On prépare la commande insert
			$requete=$connexion->prepare("DELETE FROM tab_cinema WHERE numero_Cinema=?");
			
			// On l’exécute, et on retourne l’état de réussite (true/false)
			$tableauInfos=[$unCinema->getNumeroCinema()];
			return $requete->execute($tableauInfos);
	}

	public static function obtenirProchainNumero(){

			// obtenir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			// On prépare la commande Delete
			$commandeSQL = "SELECT numero_Cinema FROM tab_cinema ORDER BY numero_Cinema DESC";
			$requete = $connexion->prepare($commandeSQL);
			
			// On l’exécute
			$requete-> execute();
			
			// Valeur à retourner
			$prochainNumero=1;
			if ($requete->rowCount() > 0) {
				$rangee=$requete->fetch();
				$prochainNumero=$rangee['numero_Cinema']+1;
			}
			return $prochainNumero;	
	}
}
?>

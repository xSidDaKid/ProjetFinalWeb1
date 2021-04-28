<?php

/*
#
# Description : Classe InfoCinemaDAO
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
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");

class InfosCinemaDAO implements DAO {

	public static function chercher($unNumero) {
		// obtenir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			// valeur par défaut pour la variable à retourner si non-trouvée
			$unInfo=null;
			
			// Préparer et exécute une requête de type DAOStatement avec des paramètres SQL	
			$requete=$connexion->prepare("SELECT * FROM infos_cinema WHERE code_infos=?");
			$requete->execute(array($unNumero));
			// Analyser l’enregistrement, s’il existe,
			if ($requete->rowCount()!=0) {
				// ... et créer l’instance de l'Acheteur
				$rangee=$requete->fetch();
				$unInfo = new InfosCinema($rangee['code_infos'], $rangee['titre'], $rangee['url_photo']);				
			}
			
			// fermer le curseur de la requête et la connexion à la BD
			$requete->closeCursor();
			ConnexionBD::close();
			return $unInfo;
	}

	public static function chercherAvecFiltre($clause){ 

			// obtenir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			// initialisation du tableau vide
			$tableau=[];	
			
			// Préparer une requête de type PDOStatement avec des paramètres SQL	
			$requete=$connexion->prepare("SELECT * FROM infos_cinema ".$clause);
			
			// Exécuter la requête
			$requete->execute();
			
			// Analyser les enregistrements s'il y en a 
			foreach ($requete as $rangee) {
				$unInfo = new InfosCinema($rangee['code_infos'], $rangee['titre'], $rangee['url_photo']);								
				array_push($tableau, $unInfo);
			}
			
			// fermer le curseur de la requête et la connexion à la BD
			$requete-> closeCursor();
			ConnexionBD::close();	
			return $tableau;
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
			$requete=$connexion->prepare("SELECT * FROM infos_cinema");
			$requete->execute();

			// Analyser les enregistrements s'il y en a 
			foreach ($requete as $rangee) {
				$unInfo = new InfosCinema($rangee['code_infos'], $rangee['titre'], $rangee['url_photo']);					
				array_push($tableau, $unInfo);
			}
			
			// fermer les curseur de la requête et la connexion, puis retourner le tableau d'objets de type Candidat
			$requete-> closeCursor();
			ConnexionBD::close();	
			return $tableau;

	}

	public static function inserer($unInfo){

			// obtenir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			// On prépare la commande insert
			$requete=$connexion->prepare("INSERT INTO infos_cinema (code_infos,titre,url_photo) VALUES (?,?,?)");

			// On l’exécute, et on retourne l’état de réussite (true/false)
			$tableauInfos=[$unInfo->getCodeInfos(),$unInfo->getTitre(),$unInfo->getUrlPhoto()];

			return $requete->execute($tableauInfos);
	}

	public static function modifier($unInfo){

			// obtenir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			
			// On prépare la commande update
			$requete=$connexion->prepare("UPDATE infos_cinema SET titre=?, url_photo=? WHERE code_infos=?");

			$tableauInfos=[$unInfo->getTitre(), $unInfo->getUrlPhoto(), $unInfo->getCodeInfos()];

			// On exécute la requête			   
			$requete->execute($tableauInfos);
	}

	public static function supprimer($unInfo){
		
			// obtenir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			// On prépare la commande insert
			$requete=$connexion->prepare("DELETE FROM infos_cinema WHERE code_infos=?");
			
			// On l’exécute, et on retourne l’état de réussite (true/false)
			$tableauInfos=[$unInfo->getCodeInfos()];
			return $requete->execute($tableauInfos);
	}

	public static function obtenirProchainId(){
		try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			// On prépare la commande Delete
			$commandeSQL = "SELECT code_infos FROM infos_cinema ORDER BY code_infos DESC";
			$requete = $connexion->prepare($commandeSQL);
			
			// On l’exécute
			$requete-> execute();
			
			// Valeur à retourner
			$prochainId=1;
			if ($requete->rowCount() > 0) {
				$rangee=$requete->fetch();
				$prochainId=$rangee['code_infos']+1;
			}
			return $prochainId;	

	}
}
?>

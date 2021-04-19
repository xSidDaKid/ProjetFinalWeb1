<?php
/*
#
# Description : Classe AcheteurDAO
#               
# Date        : 2021/04/16
# Auteurs     : Kumaran Satkunanathan
#               Louai Roueha
#               Shajaan Balasingam
#
*/

if (defined("DOSSIER_BASE_INCLUDE") == false) {
	$chemin=(substr($_SERVER['DOCUMENT_ROOT'],-1)=="/")?$_SERVER['DOCUMENT_ROOT']:$_SERVER['DOCUMENT_ROOT']."/";
	define("DOSSIER_BASE_INCLUDE", $chemin."projet_h2021_g16/");
}
include_once(DOSSIER_BASE_INCLUDE."modele/Billet.class.php"); 
include_once(DOSSIER_BASE_INCLUDE."modele/Acheteur.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");

class AcheteurDAO implements DAO {	

	public static function chercher($unNumero) { 
			
			// obtenir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			// valeur par défaut pour la variable à retourner si non-trouvée
			$unAcheteur=null;
			
			// Préparer et exécute une requête de type DAOStatement avec des paramètres SQL	
			$requete=$connexion->prepare("SELECT * FROM acheteur WHERE id_acheteur=?");
			$requete->execute(array($unNumero));
			// Analyser l’enregistrement, s’il existe,
			if ($requete->rowCount()!=0) {
				// ... et créer l’instance de l'Acheteur
				$rangee=$requete->fetch();
				$unAcheteur = new Acheteur($rangee['id_acheteur'], $rangee['nom'], $rangee['telephone'], $rangee['solde']);				
			}
			
			// fermer le curseur de la requête et la connexion à la BD
			$requete->closeCursor();
			ConnexionBD::close();
			return $unAcheteur;
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
			$requete=$connexion->prepare("SELECT * FROM acheteur");
			$requete->execute();

			// Analyser les enregistrements s'il y en a 
			foreach ($requete as $rangee) {
				$unAcheteur = new Acheteur($rangee['id_acheteur'], $rangee['nom'], $rangee['telephone'], $rangee['solde']);							
				array_push($tableau, $unAcheteur);
			}
			
			// fermer les curseur de la requête et la connexion, puis retourner le tableau d'objets de type Candidat
			$requete-> closeCursor();
			ConnexionBD::close();	
			return $tableau;
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
			$requete=$connexion->prepare("SELECT * FROM acheteur ".$clause);
			
			// Exécuter la requête
			$requete->execute();
			
			// Analyser les enregistrements s'il y en a 
			foreach ($requete as $rangee) {
				$unAcheteur = new Acheteur($rangee['id_acheteur'], $rangee['nom'], $rangee['telephone'], $rangee['solde']);									
				array_push($tableau, $unAcheteur);
			}
			
			// fermer le curseur de la requête et la connexion à la BD
			$requete-> closeCursor();
			ConnexionBD::close();	
			return $tableau;
	}

	public static function inserer($unAcheteur){ //MARCHE PAS!!

			// on essaie d’établir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			// On prépare la commande insert
			$requete=$connexion->prepare("INSERT INTO acheteur (id_acheteur,nom,telephone,solde) VALUES (?,?,?,?)");

			// On l’exécute, et on retourne l’état de réussite (true/false)
			$tableauInfos=[$unAcheteur->getIdAcheteur(),$unAcheteur->getNom(),$unAcheteur->getTelephone(),
							$unAcheteur->getSolde()];

			return $requete->execute($tableauInfos);
	} 
	public static function modifier($unAcheteur) {

			// on essaie d’établir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			
			// On prépare la commande update
			$requete=$connexion->prepare("UPDATE acheteur SET id_acheteur=?,nom=?, telephone=?, solde=? WHERE id_acheteur=?");
			
			// On prépare le tableau de paramètres (si nom du district est la valeur par défaut "Aucun", on utilise null)
			$tableauInfos=[$unAcheteur->getNom(),$unAcheteur->getTelephone(),
							$unAcheteur->getSolde(), $unAcheteur->getIdAcheteur()];

			// On exécute la requête			   
			$requete->execute($tableauInfos);		
	}

	public static function supprimer($unAcheteur){

			// on essaie d’établir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			// On prépare la commande insert
			$requete=$connexion->prepare("DELETE FROM acheteur WHERE id_acheteur=?");
			
			// On l’exécute, et on retourne l’état de réussite (true/false)
			$tableauInfos=[$unAcheteur->getIdAcheteur()];
			return $requete->execute($tableauInfos);
	} 
}

?>

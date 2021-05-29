<?php
/*
#
# Description : Classe Billet
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
include_once(DOSSIER_BASE_INCLUDE."modele/Billet.class.php"); 
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");

class BilletDAO implements DAO {
	public static function chercher($unNumero) { 
			
			// obtenir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			// valeur par défaut pour la variable à retourner si non-trouvée
			$unBillet=null;
			
			// Préparer et exécute une requête de type DAOStatement avec des paramètres SQL	
			$requete=$connexion->prepare("SELECT * FROM billet WHERE numero_billet=?");
			$requete->execute(array($unNumero));

			// Analyser l’enregistrement, s’il existe,
			if ($requete->rowCount()!=0) {
				// ... et créer l’instance de l'Acheteur
				$rangee=$requete->fetch();
				//$unBillet = new Billet($rangee['numero_billet'], $rangee['prix_paye'], $rangee['numero_Cinema'], $rangee['id_acheteur']);
				$unBillet = new Billet($rangee['numero_billet'], $rangee['prix_paye'], $rangee['numero_Cinema'], $rangee['id_acheteur']);				
			}
			
			// fermer le curseur de la requête et la connexion à la BD
			$requete->closeCursor();
			ConnexionBD::close();
			return $unBillet;
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
			$requete=$connexion->prepare("SELECT * FROM billet");
			$requete->execute();

			// Analyser les enregistrements s'il y en a 
			foreach ($requete as $rangee) {
				$unBillet =  new Billet($rangee['numero_billet'], $rangee['prix_paye'], $rangee['id_acheteur'], $rangee['numero_Cinema']);							
				array_push($tableau, $unBillet);
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
			$requete=$connexion->prepare("SELECT * FROM billet ".$clause);
			
			// Exécuter la requête
			$requete->execute();
			
			// Analyser les enregistrements s'il y en a 
			foreach ($requete as $rangee) {
				//$unBillet = new Billet($rangee['numero_billet'], $rangee['prix_paye'], $rangee['numero_Cinema'], $rangee['id_acheteur']);
				$unBillet = new Billet($rangee['numero_billet'], $rangee['prix_paye'], $rangee['numero_Cinema'], $rangee['id_acheteur']);									
				array_push($tableau, $unBillet);
			}
			
			// fermer le curseur de la requête et la connexion à la BD
			$requete-> closeCursor();
			ConnexionBD::close();	
			return $tableau;
	}

	public static function inserer($unBillet) { 

			// obtenir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			// On prépare la commande insert
			$requete=$connexion->prepare("INSERT INTO billet (numero_billet,prix_paye,numero_Cinema,id_acheteur) VALUES (?,?,?,?)");

			// On l’exécute, et on retourne l’état de réussite (true/false)
			$tableauInfos=[$unBillet->getNumeroBillet(),$unBillet->getPrixPaye(), $unBillet->getEvenement(),$unBillet->getIdAcheteur()];

			return $requete->execute($tableauInfos);
	}

	public static function modifier($unBillet) { 

			// obtenir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			
			// On prépare la commande update
			$requete=$connexion->prepare("UPDATE billet SET prix_paye=?, numero_Cinema=?, id_acheteur=? WHERE numero_billet=?");

			$tableauInfos=[$unBillet->getNumeroBillet(),$unBillet->getPrixPaye(), $unBillet->getNumeroCinema(),$unBillet->getIdAcheteur()];

			// On exécute la requête			   
			$requete->execute($tableauInfos);
	}

	public static function supprimer($unBillet) { 

			// obtenir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			// On prépare la commande insert
			$requete=$connexion->prepare("DELETE FROM billet WHERE numero_billet=?");
			
			// On l’exécute, et on retourne l’état de réussite (true/false)
			$tableauInfos=[$unBillet->getNumeroBillet()];
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
			$commandeSQL = "SELECT numero_billet FROM billet ORDER BY numero_billet DESC";
			$requete = $connexion->prepare($commandeSQL);
			
			// On l’exécute
			$requete-> execute();
			
			// Valeur à retourner
			$prochainNumero=1;
			if ($requete->rowCount() > 0) {
				$rangee=$requete->fetch();
				$prochainNumero=$rangee['numero_billet']+1;
			}
			return $prochainNumero;	
	}
}

?>
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
				$unBillet = new Billet($rangee['numero_billet'], $rangee['prix_paye'], $rangee['numero_Cinema'], $rangee['	id_acheteur']);				
			}
			
			// fermer le curseur de la requête et la connexion à la BD
			$requete->closeCursor();
			ConnexionBD::close();
			return $unBillet;
	}
	public static function chercherTous() { 
	}

	public static function chercherAvecFiltre($clause) { 
	}

	public static function inserer($unBillet) { 
	}

	public static function modifier($unBillet) { 
	}

	public static function supprimer($unBillet) { 
	}
}

?>

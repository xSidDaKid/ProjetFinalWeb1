<?php
	/* Description : classe permettant d'obtenir une connexion à une BD
	 * Date        : 6 avril 2020
     * Auteur      : Pierre Coutu
	*/

	// ****** INLCUSIONS *******
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		$chemin=(substr($_SERVER['DOCUMENT_ROOT'],-1)=="/")?$_SERVER['DOCUMENT_ROOT']:$_SERVER['DOCUMENT_ROOT']."/";
		define("DOSSIER_BASE_INCLUDE", $chemin."projet_h2021_g16/");
	}
	// Le fichier configDB.interface.php contient le mot de passe, le nom d’utilisateur
	// avec les constantes BD_HOTE, BD_NOM, BD_UTILISATEUR et BD_MOT_PASSE
	include_once(DOSSIER_BASE_INCLUDE.'modele/DAO/configs/configBD.interface.php');

	
	// ********* Classe englobante de PDO *************
	class ConnexionBD {	
		// Attribut représentant la connexion à la BD (de type PDO)
		private static $instance = null;

		// Constructeur de ConnexionDB inutilisable de l’extérieur
		private function __construct() {}
		
		// Fonction statique qui gère la création de l’instance PDO et la retourne.
		// Note : self:: représente le nom de classe courante ConnexionBD  
		public static function getInstance() {
			// Si l’instance de PDO n’exsite pas on la crée 
			if(self::$instance == null) {
				$configuration="mysql:host=".ConfigBD::BD_HOTE.";dbname=".ConfigBD::BD_NOM;
				self::$instance = new PDO($configuration, ConfigBD::BD_UTILISATEUR, 
													 ConfigBD::BD_MOT_PASSE);
				self::$instance->exec("SET character_set_results = 'utf8'");	
				self::$instance->exec("SET character_set_client = 'utf8'");	
				self::$instance->exec("SET character_set_connection = 'utf8'");	
			}
			// Maintenant qu’on est certain qu’elle existe on la retourne
			return self::$instance;
		}
	  
		// Fonction qui libère la connexion PDO (pour le garbage collector)
		public static function close() {
			self::$instance = null;
		}
	}
?>
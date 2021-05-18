<?php
   // *****************************************************************************************
	// Description   : classe contenant la fonction statique qui géère les contrôleurs spécifiques
	// Date          : 18 avril 2020
	// Auteur        : Pierre Coutu
	// Collaborateur : Aucun
    // *****************************************************************************************
	include_once(DOSSIER_BASE_INCLUDE."controleurs/defaut.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/seConnecter.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/seDeconnecter.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/info.class.php");
	
	class ManufactureControleur {
		//  Méthode qui crée une instance du controleur associé à l'action
		//  et le retourne
		public static function creerControleur($action) {
			$controleur = null;
			if ($action == "voirPageAccueil") {
				$controleur = new Defaut();
			} elseif ($action == "voirPageInfo") {
				$controleur = new info();
			} elseif ($action == "seConnecter") {
				$controleur = new seConnecter();
			} elseif ($action == "seDeconnecter") {
				$controleur = new seDeconnecter();
			} else {
				$controleur = new Defaut();
			}
			return $controleur;
		}
	}
	
?>
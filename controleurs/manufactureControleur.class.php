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
	include_once(DOSSIER_BASE_INCLUDE."controleurs/evenement.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/creationCompte.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/modificationCompte.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/achatBillet.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/ajoutRepresentations.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/supressionAcheteurs.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/nombreBillet.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/paiement.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/confirmation.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/ajoutInfoRepresentation.class.php");
	
	class ManufactureControleur {
		//  Méthode qui crée une instance du controleur associé à l'action
		//  et le retourne
		public static function creerControleur($action) {
			$controleur = null;
			if ($action == "voirPageAccueil") {
				$controleur = new Defaut();
			} elseif ($action == "voirPageInfo") {
				$controleur = new info();
			} elseif ($action == "voirPageEvenement") {
				$controleur = new evenement();
			} elseif ($action == "voirPageCreationCompte") {
				$controleur = new creationCompte();
			} elseif ($action == "voirPageModificationCompte") {
				$controleur = new modificationCompte();
			} 
			//ACHAT BILLET
			elseif ($action == "voirPageRechercheRepresentation") {
				$controleur = new achatBillet();	
			} 
			elseif ($action == "voirPageNombreBilletDesire") {
				$controleur = new nombreBillet();	
			}
			elseif ($action == "voirPagePaiement") {
				$controleur = new paiement();	
			}
			elseif ($action == "voirPageConfirmation") {
				$controleur = new confirmation();	
			}
			//AJOUT REPRESENTAION
			elseif ($action == "voirPageAjoutRepresentations") {
				$controleur = new ajoutRepresentations();
			}
			elseif ($action == "voirPageAjoutInfoRepresentations") {
				$controleur = new ajoutInfoRepresentation();
			}
			
			 elseif ($action == "voirPageSupressionAcheteurs") {
				$controleur = new supressionAcheteurs();
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
//elseif ($action == "voirPageRechercheRepresentation") {
	//$controleur = new achatBillet();	
	/*
	elseif ($action == "voirPageAchatBillet") {
				$controleur = new achatBillet();
	*/
?>

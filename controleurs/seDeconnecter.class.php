<?php
    // *****************************************************************************************
 	// Cours       : 420-G16-RO 
	// Session     : H2021, Projet
	// Description : Contrôleur spécifique pour l'action de seDeconnecter qui s'occupe de récupérer
	//               gérer la déconnexion d'un utilisateur du site
	// Auteur      : Pierre Coutu
	// Modifié par :
    // *****************************************************************************************
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/utilisateurDAO.class.php");

	class SeDeconnecter extends  Controleur {
		
		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}

		// ******************* Méthode exécuter action
		public function executerAction() {
			if ($this->categorieUtilisateur=="visiteur") {
				array_push ($this->messagesErreur,"Vous êtes déjà déconnécté.");
				return "pageAccueil";
			} elseif (ISSET($_POST['formulaireDeconnexion'])) {
				$this->categorieUtilisateur="visiteur";
				unset($_SESSION['categorieUtilisateur']);
				unset($_SESSION['idUtilisateur']);
				array_push ($this->messagesSucces,"Déconnexion Réussi!");
				return "pageAccueil";
			} else {
				return "pageDeconnexion";				
			}
		}


		
	}	
	
?>
<?php
	/* *************************************
	Cours 420-G16-RO
	Session H2021
	Projet Groupe 1
	Auteur      : 
	**************************************** */	

	/* *******************************************
		Fonctions d'affichage des options du menu
	********************************************** */
	function afficherMenu($categorieActeur) {

			/*$tableauOptions=[ "Accueil"=>DOSSIER_BASE_LIENS."/index.php?=voirPageAccueil",
				"Informations générales"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageInfo",
				"Événements"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageEvenement",
				"Connexion"=>DOSSIER_BASE_LIENS."/index.php?action=seConnecter", 
				"Création d'un compte"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageCreationCompte"];
			*/
			$tableauOptions=[ "Accueil"=>DOSSIER_BASE_LIENS."/index.php?=voirPageAccueil",
				"Informations générales"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageInfo",
				"Événements"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageEvenement",
				"Connexion"=>DOSSIER_BASE_LIENS."/index.php?action=seConnecter", 
				"Création d'un compte"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageCreationCompte",
				"Modification du compte"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageModificationCompte",
				"Achat de billet"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageAchatBillet",
				"Ajout de représentations"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageAjoutRepresentations",
				"Supression d'acheteurs"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageSupressionAcheteurs"];
  
		if ($categorieActeur == "acheteur") {
			$tableauOptions=[ "Accueil"=>DOSSIER_BASE_LIENS."/index.php?=voirPageAccueil",
				"Informations générales"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageInfo",
				"Événements"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageEvenement",
				"Connexion"=>DOSSIER_BASE_LIENS."/index.php?action=seConnecter", 
				"Création d'un compte"=>DOSSIER_BASE_LIENS."/index.php?=voirPageAccueil", 
				"Déconnexion"=>DOSSIER_BASE_LIENS."/index.php?=voirPageAccueil", 
				"Modification du compte"=>DOSSIER_BASE_LIENS."/index.php?=voirPageAccueil",
				"Achat de billet"=>DOSSIER_BASE_LIENS."/index.php?=voirPageAccueil"];
			/*array_push($tableauOptions, "Déconnexion"=>DOSSIER_BASE_LIENS."/index.php?=voirPageAccueil", 
										"Modification du compte"=>DOSSIER_BASE_LIENS."/index.php?=voirPageAccueil",
										"Achat de billet"=>DOSSIER_BASE_LIENS."/index.php?=voirPageAccueil");*/
		}
		if ($categorieActeur == "administrateur") {
			$tableauOptions=[ "Accueil"=>DOSSIER_BASE_LIENS."/index.php?=voirPageAccueil",
				"Informations générales"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageInfo",
				"Événements"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageEvenement", 
				"Déconnexion"=>DOSSIER_BASE_LIENS."/index.php?=voirPageAccueil", 
				"Supression d'acheteurs"=>DOSSIER_BASE_LIENS."/index.php?=voirPageAccueil",
				"Ajout de représentations"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageAjoutRepresentations"];
			/*array_push($tableauOptions, "Déconnexion"=>DOSSIER_BASE_LIENS."/index.php?=voirPageAccueil", 
										"Supression d'acheteurs"=>DOSSIER_BASE_LIENS."/index.php?=voirPageAccueil",
										"Ajout de représentations"=>DOSSIER_BASE_LIENS."/index.php?=voirPageAccueil");*/
		}
		

		foreach ($tableauOptions as $option => $hyperlien) {
			echo "<li class='nav-item active'>";
			echo "<a class='nav-link' href='$hyperlien'>$option</a>";  
			echo "</li>";
		}
	}
	
	/* *******************************************
		Fonctions d'affichage des messages d'erreurs
	********************************************** */
	function afficherErreurs($tableauErreurs) {
	}
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

		//Visiteur par défaut
		$tableauOptions=[ "Accueil"=>DOSSIER_BASE_LIENS."/index.php?=voirPageAccueil",
			"Informations générales"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageInfo",
			"Événements"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageEvenement",
			"Création d'un compte"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageCreationCompte",
			"Connexion"=>DOSSIER_BASE_LIENS."/index.php?action=seConnecter"];

		if ($categorieActeur == "acheteur") {
			$tableauOptions=[ "Accueil"=>DOSSIER_BASE_LIENS."/index.php?=voirPageAccueil",
				"Informations générales"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageInfo",
				"Événements"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageEvenement",
				"Modification du compte"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageModificationCompte",
				"Achat de billet"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageRechercheRepresentation",
				"Déconnexion"=>DOSSIER_BASE_LIENS."/index.php?action=seDeconnecter"]; 
		}
		
		if ($categorieActeur == "administrateur") {
			$tableauOptions=[ "Accueil"=>DOSSIER_BASE_LIENS."/index.php?=voirPageAccueil",
				"Informations générales"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageInfo",
				"Événements"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageEvenement", 
				"Supression d'acheteurs"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageSupressionAcheteurs",
				"Ajout de représentations"=>DOSSIER_BASE_LIENS."/index.php?action=voirPageAjoutRepresentations",
				"Déconnexion"=>DOSSIER_BASE_LIENS."/index.php?action=seDeconnecter"]; 
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
		foreach ($tableauErreurs as $erreur) {
			echo "<h1 class='p-2 mt-2'>".$erreur."</h1>";
		}
	}
	
	function afficherSucces($tableauSucces) {
		foreach ($tableauSucces as $succes) {
			echo "<h1 class='p-2 mt-2'>".$succes."</h1>";
		}
	}
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

	/*	$tableauOptions=[ "Accueil"=>DOSSIER_BASE_LIENS."/index.php?=voirPageAccueil",
						  "Affichage de tous les Candidats"=>DOSSIER_BASE_LIENS."/index.php?action=voirLesCandidats",
						  "Recherche d'un District"=>DOSSIER_BASE_LIENS."/index.php?action=chercherUnDistrict",
						  "Collège Rosemont"=>"https://www.crosemont.qc.ca/",
						  "W3 schools"=>"https://www.w3schools.com/"];
		foreach ($tableauOptions as $option => $hyperlien) {
			echo "<div>";
			echo "<a href='$hyperlien'>$option</a>";  
			echo "</div>";
		}
	}
	}
	/* *******************************************
		Fonctions d'affichage des messages d'erreurs
	********************************************** */
	function afficherErreurs($tableauErreurs) {
	}


<?php
// *****************************************************************************************
// Description   : Contrôleur pour la page d'info
// Date          : 18 mai 2021
// Auteur        : Shajaan Balasingam
// Modifé par    : 
// *****************************************************************************************
include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");

class ajoutRepresentations extends Controleur {

    // ******************* Constructeur vide
	public function __construct() {
		parent::__construct();
	}

    // ******************* Méthode exécuter action
    public function executerAction() {
        return "pageAjoutRepresentations";
    }
}

?>
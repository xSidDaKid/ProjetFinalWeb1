<?php
// *****************************************************************************************
// Description   : Contrôleur pour la page d'info
// Date          : 18 mai 2021
// Auteur        : Shajaan Balasingam
// Modifé par    : 
// *****************************************************************************************
include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/InfosCinemaDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/CinemaDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/BilletDAO.class.php");

class info extends Controleur {
    private $tabCinemas=null;
    private $tabBillets=null;
    private $tabAcheteurs=null;

    // ******************* Constructeur vide
	public function __construct() {
		parent::__construct();
	}
    public function getCinemas() {
        $this->tabCinemas = CinemaDAO::chercherTous();
        return $this->tabCinemas;
    }
    public function getBillets() {
        $tabBillets=BilletDAO::chercherTous();
        return $this->tabBillets;
    }
    public function getAcheteurs() {
        $this->tabAcheteurs = AcheteurDAO::chercherTous();
        return $this->tabAcheteurs;
    }

    // ******************* Méthode exécuter action
    public function executerAction() {
        return "pageInfo";
    }
}

?>

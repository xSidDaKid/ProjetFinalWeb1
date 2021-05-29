<?php
// *****************************************************************************************
// Description   : Contrôleur pour la page d'info
// Date          : 18 mai 2021
// Auteur        : Shajaan Balasingam
// Modifé par    : 
// *****************************************************************************************
include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/infosCinemaDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/CinemaDAO.class.php");

class ajoutRepresentations extends Controleur {
    private $leCode = null;
    private $Code = null;
    private $tabCinema=null;
    // ******************* Constructeur vide
	public function __construct() {
		parent::__construct();
	}
    public function getCinema() {
        $this->tabCinema = CinemaDAO::chercherTous();
        return $this->tabCinema;
    }

    // ******************* Méthode exécuter action
    public function executerAction() {
        unset($_SESSION['date']);
        unset($_SESSION['prix']);
        unset($_SESSION['place_totales']);
        unset($_SESSION['place_vendues']);
        unset($_SESSION['code_infos']);

        if(ISSET ($_POST["code_infos"])){
			$this->code=$_POST["code_infos"];
            $_SESSION["code_infos"] = $this->code;
			$this->leCode = InfosCinemaDAO::chercher($this->code);	
            if($this->leCode!=null){
                return "pageInfoRepresentation";
            }
            else {
                array_push ($this->messagesErreur,"Le code film n'existe pas.");
            }    
		}
        return "pageAjoutRepresentations";
    }
}

?>

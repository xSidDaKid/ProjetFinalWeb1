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
    private $leCode;
    private $id;
    private $unCinema=null;
    private $tabCinema=null;
    // ******************* Constructeur vide
	public function __construct() {
		parent::__construct();
	}
    public function getLeCode(){
		return $this->leCode;
	}
    public function getCinema() {
        $this->tabCinema = CinemaDAO::chercherTous();
        return $this->tabCinema;
    }

    // ******************* Méthode exécuter action
    public function executerAction() {
        if(ISSET ($_POST["code_infos"])){
			$code=$_POST["code_infos"];
			$this->leCode = InfosCinemaDAO::chercher($code);	
            if($this->leCode!=null){
                return "pageInfoRepresentation";
            }
            else {
                array_push ($this->messagesErreur,"Le code film n'existe pas.");
            }
    
		}

        if (ISSET($_POST["date"])){
            if (ISSET($_POST["prix"])){
                if (ISSET($_POST["place_totales"])){
                    if (ISSET($_POST["place_vendues"])){
                        $id = CinemaDAO::obtenirProchainNumero();
                        $this->unCinema = new Cinema($id, $_POST["date"], $_POST["prix"], $_POST["place_totales"], $_POST["place_vendues"] ,$this->getLeCode());
                        CinemaDAO::inserer($this->unCinema); 

                    }
                }
            }
        }


        return "pageAjoutRepresentations";
    }
}

?>

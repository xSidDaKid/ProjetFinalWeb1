<?php
// *****************************************************************************************
// Description   : Contrôleur pour la page d'info
// Date          : 18 mai 2021
// Auteur        : Shajaan Balasingam
// Modifé par    : 
// *****************************************************************************************
include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/InfosCinemaDAO.class.php");


class evenement extends Controleur {
	 private $leCode=null;

    // ******************* Constructeur vide
	public function __construct() {
		parent::__construct();
	}
	
	public function getLeCode(){
			return $this->leCode;
		}

    // ******************* Méthode exécuter action
    public function executerAction() {
		if(ISSET ($_POST["code_infos"])==true){
			$code=$_POST["code_infos"];
			$this->leCode = InfosCinemaDAO::chercher($code);	
		}
		
        return "pageEvenement";

    }
}
?>

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


class evenement extends Controleur {
	 private $leCode=null;
	 private $leTitre=null;
	 private $laDate=null;
	 private $laSalle=null;

    // ******************* Constructeur vide
	public function __construct() {
		parent::__construct();
	}
	
	public function getLeTitre(){
		return $this->leTitre;
	}
	public function getDate(){
		return $this->laDate;
	}
	public function getLeCode(){
		return $this->leCode;
	}
	public function getLaDate(){
		return $this->laDate;
	}
	public function getLaSalle(){
		return $this->laSalle;
	}

    // ******************* Méthode exécuter action
    public function executerAction() {
		if(ISSET ($_POST["titre"])==true){
			$titre=$_POST["titre"];
			$this->leTitre = InfosCinemaDAO::chercherParTitre($titre);
			if ($this->leTitre == null) {
				array_push ($this->messagesErreur,"Ce film n'existe pas.");
			}
		}
		elseif(ISSET ($_POST["date"])==true){
			$date=$_POST["date"];
			$this->laDate = CinemaDAO::chercherParDate($date);
			if ($this->laDate == null) {
				array_push ($this->messagesErreur,"Aucun film à cette date");
			}	
		}		
		elseif(ISSET ($_POST["code_infos"])==true){
			$code=$_POST["code_infos"];
			$this->leCode = InfosCinemaDAO::chercher($code);
			if ($this->leCode == null) {
				array_push ($this->messagesErreur,"Aucun film avec ce code.");
			}	
		}
		
		elseif(ISSET ($_POST["salle"])==true){
			$salle=$_POST["salle"];
			$this->laSalle = InfosCinemaDAO::chercherParSalle($salle);
			if ($this->laSalle == null) {
				array_push ($this->messagesErreur,"Cette salle n'existe pas");
			}
		}		
        return "pageEvenement";

    }
}
?>
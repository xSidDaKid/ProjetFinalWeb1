<?php
// *****************************************************************************************
// Description   : Contrôleur pour la page d'info
// Date          : 18 mai 2021
// Auteur        : Louai Roueha
// Modifé par    : 
// *****************************************************************************************
include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/InfosCinemaDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/CinemaDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/AcheteurDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/Acheteur.class.php");

class ajoutInfoRepresentation extends Controleur {
    private $id = null;
    private $unCinema = null;
    private $date = null;
    private $prix = null;
    private $place_totales = null;
    private $place_vendues = null;
    
    
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
        if (ISSET($_POST["date"])){
            $this->date = $_POST["date"];
            $_SESSION["date"]= $this->date;
        }
        if (ISSET($_POST["prix"])){
            $this->prix = $_POST["prix"];
            $_SESSION["prix"]= $this->prix;
        }
        if (ISSET($_POST["place_totales"])){
            $this->place_totales = $_POST["place_totales"];
            $_SESSION["place_totales"]= $this->place_totales;
        }
        if (ISSET($_POST["place_vendues"])){
            $this->place_vendues = $_POST["place_vendues"];
            $_SESSION["place_vendues"]= $this->place_vendues;
        }

        if (ISSET($_SESSION["date"])){
            if (ISSET($_SESSION["prix"])){
                if (ISSET($_SESSION["place_totales"])){
                    if (ISSET($_SESSION["place_vendues"])){
                        if (ISSET($_SESSION["code_infos"])){
                            $id = CinemaDAO::obtenirProchainNumero();
                            $this->unCinema = new Cinema($id, $_SESSION["date"], $_SESSION["prix"], $_SESSION["place_totales"], $_SESSION["place_vendues"] ,$_SESSION["code_infos"]);
                            CinemaDAO::inserer($this->unCinema); 
                            array_push ($this->messagesSucces, "Création réussi");
                            return "pageInfoRepresentation";
                           
                        }
                    }
                }
            }
        }        
    }
}
?>

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
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/AcheteurDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/Acheteur.class.php");

class achatBillet extends Controleur {

    private $unFilm = null;
    private $unCinema = null;
    private $code = null;
    private $placeDisponibles = null;
    private $prix = null;
    
    // ******************* Constructeur vide
	public function __construct() {
		parent::__construct();
	}

    public function getCinema() {
        return $this->unCinema;
    }
    
    public function getPlaces() {
        return $this->placeDisponibles;
    }
/**
 * ÉTAPE 1: pageRechercheRepresentation
 * ÉTAPE 2: pageNombreBilletDesire
 * ÉTAPE 3: pagePaiement
 * ÉTAPE 4: pageConfirmation
 * 
 * Variable de session:
 * $_SESSION['id_film']
 * $_SESSION['nb_billet']
 * $_SESSION['nbPlaces']
 * $_SESSION['prixBillet']
 */

    // ******************* Méthode exécuter action
    public function executerAction() {
        if (ISSET($_POST['id_film'])) {
            $this->code = $_POST['id_film'];
            $_SESSION['id_film'] = $this->code;
            
            $this->unFilm = InfosCinemaDAO::chercher($_POST['id_film']);
            $this->unCinema = CinemaDAO::chercherAvecFiltre("WHERE code_infos=".$_POST['id_film']);

            foreach ($this->unCinema as $tab) {
                $this->placeDisponibles = $tab->calculerPlacesDisponibles();
                $_SESSION['nbPlaces'] = $this->placeDisponibles;
                $this->prix = $tab->getPrixUnBillet();
                $_SESSION['prixBillet'] = $this->prix;
            }
            if ($this->unFilm == null) { 
                array_push ($this->messagesErreur,"Ce film n'existe pas.");
                return "pageRechercheRepresentation";
            }else {
                return "pageNombreBilletDesire";
            }
        }
        else {
            return "pageRechercheRepresentation";
        }
    }
}
?>
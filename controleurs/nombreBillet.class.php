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

class nombreBillet extends Controleur {

    // ******************* Constructeur vide
	public function __construct() {
		parent::__construct();
	}

/**
 * ÉTAPE 1: pageRechercheRepresentation
 * ÉTAPE 2: pageNombreBilletDesire
 * ÉTAPE 3: pagePaiement
 * ÉTAPE 4: pageConfirmation
 * 
 * Variable de session:
 * $_SESSION['nbPlaces']
 * $_SESSION['nb_billet']
 * $_SESSION['id_film']
 * $_SESSION['prixBillet']
 */

    // ******************* Méthode exécuter action
    public function executerAction() {
        
        if (ISSET($_POST['nb_billet']) AND ISSET($_SESSION['id_film']) ) { //ÉTAPE 2
            $unCinema = CinemaDAO::chercherAvecFiltre("WHERE code_infos=".$_SESSION['id_film']);
            $this->nbBillets = $_POST['nb_billet'];
            $_SESSION['nb_billet'] = $this->nbBillets;

            if ($_SESSION['nbPlaces'] >= $_SESSION['nb_billet']) {
                foreach ($unCinema as $tab2 ) {
                    $tab2->vendreDesPlaces($_POST['nb_billet']);
                     CinemaDAO::modifier($tab2);
                 }
                return "pagePaiement";
            }
            else {
                array_push ($this->messagesErreur,"Il n'y a pas assez de billets disponible");
                return "pageRechercheRepresentation";
            }
        }else {
            return "pageNombreBilletDesire";
        }
        
    }
}

?>
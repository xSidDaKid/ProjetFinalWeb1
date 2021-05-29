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
include_once(DOSSIER_BASE_INCLUDE."modele/Acheteur.class.php");

class nombreBillet extends Controleur {

    private $tabInfoFilms = null;
    
    // ******************* Constructeur vide
	public function __construct() {
		parent::__construct();
	}

    public function getTabInfoFilms() {
        return $this->tabInfoFilms;
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
        $unCinema = CinemaDAO::chercherAvecFiltre("WHERE code_infos=".$_SESSION['id_film']);
        $longueur = count($unCinema)-1;
        $compteur = 0;
        $tabPlaces = [];
        $this->tabInfoFilms = InfosCinemaDAO::chercherTous();
        if (ISSET($_POST['nb_billet']) AND ISSET($_SESSION['id_film']) ) { //ÉTAPE 2
            $_SESSION['nb_billet'] = $_POST['nb_billet'];

            foreach ($unCinema as $tab) {
                $_SESSION['nbPlaces'] = $unCinema[$compteur]->calculerPlacesDisponibles();
                if ($longueur > 1) {  //Si le film est affiché dans plus qu'une salle              
                    while ($unCinema[$compteur]->calculerPlacesDisponibles() < $_SESSION['nb_billet']) {
                        $compteur++;
                        if ($unCinema[$compteur]->calculerPlacesDisponibles() >= $_SESSION['nb_billet']) {
                            $unCinema[$compteur]->vendreDesPlaces($_POST['nb_billet']);
                            CinemaDAO::modifier($unCinema[$compteur]);
                            $_SESSION['nbPlaces'] = $unCinema[$compteur]->calculerPlacesDisponibles();
                            $_SESSION['prixBillet'] = $unCinema[$compteur]->getPrixUnBillet();
                            BilletDAO::inserer(new Billet (BilletDAO::obtenirProchainNumero(), $_SESSION['prixBillet'], 
                                $unCinema[$compteur]->getNumeroCinema(), $this->getIdUtilisateur()));
                            return "pagePaiement";
                        }elseif ($compteur == $longueur) {
                            array_push ($this->messagesErreur,"Il n'y a pas assez de billets disponible");
                            return "pageRechercheRepresentation";
                        }
                    }//END WHILE
                    if ($_SESSION['nbPlaces'] >= $_SESSION['nb_billet']) {
                        foreach ($unCinema as $tab2 ) {
                            $tab2->vendreDesPlaces($_POST['nb_billet']);
                            CinemaDAO::modifier($tab2);
                            $_SESSION['nbPlaces'] = $unCinema[$compteur]->calculerPlacesDisponibles();
                            $_SESSION['prixBillet'] = $unCinema[$compteur]->getPrixUnBillet();
                         }
                        return "pagePaiement";
                    }
                    else {
                        array_push ($this->messagesErreur,"Il n'y a pas assez de billets disponible");
                        return "pageRechercheRepresentation";
                    }
                } else { //Si le film est affiché dans une seule salle
                    if ($_SESSION['nbPlaces'] >= $_SESSION['nb_billet']) {
                        foreach ($unCinema as $tab2 ) {
                            $tab2->vendreDesPlaces($_POST['nb_billet']);
                            CinemaDAO::modifier($tab2);
                            $_SESSION['nbPlaces'] = $unCinema[$compteur]->calculerPlacesDisponibles();
                            $_SESSION['prixBillet'] = $unCinema[$compteur]->getPrixUnBillet();
                         }
                        return "pagePaiement";
                    }
                    else {
                        array_push ($this->messagesErreur,"Il n'y a pas assez de billets disponible");
                        return "pageRechercheRepresentation";
                    }
        
                }
                return "pageNombreBilletDesire";
            }
        } else {
            return "pageNombreBilletDesire";
        }
        
    }
}

?>
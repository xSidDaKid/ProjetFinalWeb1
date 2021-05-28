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

class paiement extends Controleur {

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
 * $_SESSION['id_film']
 * $_SESSION['nb_billet']
 * $_SESSION['nbPlaces']
 * $_SESSION['prixBillet']
 */

    // ******************* Méthode exécuter action
    public function executerAction() {
        
        if (ISSET($_SESSION['nb_billet']) AND ISSET($_SESSION['id_film'])){
            if (ISSET($_POST['compte'])) {
                $unAcheteur = AcheteurDAO::chercher($this->getIdUtilisateur());
                $unAcheteur->chargerSolde($_SESSION['prixBillet'] * $_SESSION['nb_billet']);
                AcheteurDAO::modifier($unAcheteur);
                array_push ($this->messagesSucces, "Vous avez acheté ".$_SESSION['nb_billet'].
                           " billet(s) pour le film avec le code [#".$_SESSION['id_film']."] pour ".($_SESSION['prixBillet']* $_SESSION['nb_billet'])."$!");
                return "pageConfirmation";
            }
            elseif (ISSET($_POST['credit'])) {
                array_push ($this->messagesSucces, "Vous avez acheté ".$_SESSION['nb_billet'].
                           " billet(s) pour le film avec le code [#".$_SESSION['id_film']."] pour ".($_SESSION['prixBillet']* $_SESSION['nb_billet'])."$!");
                return "pageConfirmation";
            }
         }else {
            return "pagePaiement";
        }        
    }
}

?>
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
   // private $unCinema = null;

    // ******************* Constructeur vide
	public function __construct() {
		parent::__construct();
	}

    public function getCinema()
    {
        foreach ($unCinema as $tab) {
            return $tab;
        }
    }

    // ******************* Méthode exécuter action
    public function executerAction() {
        $tabNbBilletDisponible = CinemaDAO::chercherAvecFiltre("WHERE (places_totales - places_vendues)>0 AND code_infos=".$_POST['id_film']);
        $tabBilletDemander = CinemaDAO::chercherAvecFiltre("WHERE (places_totales - places_vendues)>".$_POST['nb_billet']." AND code_infos=".$_POST['id_film']);
        $clause = "WHERE code_infos=".$_POST['id_film'];
        

        if (ISSET($_POST['id_film'])) {
            $this->unFilm = InfosCinemaDAO::chercher($_POST['id_film']);
            $unCinema = CinemaDAO::chercherAvecFiltre("WHERE code_infos=".$_POST['id_film']);
            foreach ($unCinema as $tab) {
                $placeDisponibles = $tab->calculerPlacesDisponibles();
                $prix = $tab->getPrixUnBillet();
                
            }
            // $prix = $unCinema->getPrixUnBillet();
            //echo var_dump ($prix);
            if ($this->unFilm == null) {
                array_push ($this->messagesErreur,"Ce film n'existe pas.");
            } elseif ($placeDisponibles > 0) {
                if (ISSET($_POST['nb_billet']) ) {
                    if ($placeDisponibles >= $_POST['nb_billet']) {
                        foreach ($unCinema as $tab2 ) {
                           $tab2->vendreDesPlaces($_POST['nb_billet']);
                            CinemaDAO::modifier($tab2);
                        }
                        if (ISSET($_POST['compte'])) {
                            $unAcheteur = AcheteurDAO::chercher($this->getIdUtilisateur());
                            $unAcheteur->chargerSolde($prix * $_POST['nb_billet']);
                            AcheteurDAO::modifier($unAcheteur);
                            array_push ($this->messagesSucces, "Vous avez acheté ".$_POST['nb_billet'].
                            " billet(s) pour le film <i>".$this->unFilm->getTitre()."</i> pour ".($prix* $_POST['nb_billet'])."$!");
                        }
                        elseif (ISSET($_POST['credit'])) {
                            array_push ($this->messagesSucces, "Vous avez acheté ".$_POST['nb_billet'].
                            " billet(s) pour le film <i>".$this->unFilm->getTitre()."</i> pour ".($prix* $_POST['nb_billet'])."$!");
                            
                        }
                    }
                     else {
                        array_push ($this->messagesErreur,"Il n'y a pas assez de billets disponible");
                    }
                }
            }
        }

        return "pageAchatBillet";
    }
}

?>
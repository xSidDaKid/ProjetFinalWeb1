<?php
// *****************************************************************************************
// Description   : Contrôleur pour la page de supression
// Date          : 18 mai 2021
// Auteur        : Shajaan Balasingam
// Modifé par    : 
// *****************************************************************************************
include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/AcheteurDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/BilletDAO.class.php");

class supressionAcheteurs extends Controleur {

    private $tabAcheteurs = null;
    private $id_acheteur = null;
    private $unAcheteur = null;

    // ******************* Constructeur vide
	public function __construct() {
		parent::__construct();
	}

    public function getAcheteurs() {
        //$this->tabAcheteurs = AcheteurDAO::chercherTous();
        return $this->tabAcheteurs;
    }

    // ******************* Méthode exécuter action
    public function executerAction() {
        
        if (ISSET($_POST['id_acheteur']) ) {
            $clause = "WHERE id_acheteur=".$_POST['id_acheteur'];
            $this->unAcheteur = AcheteurDAO::chercher($_POST['id_acheteur']);
            $tab = BilletDAO::chercherAvecFiltre($clause);
            
            if ($this->unAcheteur == null) {
                array_push ($this->messagesErreur,"Cet acheteur n'existe pas.");
            }
            elseif (count($tab) > 0) {
                array_push ($this->messagesErreur,"Cet acheteur a un billet");
            } 
            else{            
                $this->unAcheteur = AcheteurDAO::supprimer($this->unAcheteur);
                array_push ($this->messagesSucces,"Supression Réussi!");
            }
        }
        $this->tabAcheteurs = AcheteurDAO::chercherTous();
        return "pageSupressionAcheteurs";
    }
}

?>
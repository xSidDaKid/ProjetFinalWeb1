<?php
// *****************************************************************************************
// Description   : Contrôleur pour la page d'info
// Date          : 18 mai 2021
// Auteur        : Shajaan Balasingam
// Modifé par    : 
// *****************************************************************************************
include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/AcheteurDAO.class.php");


class modificationCompte extends Controleur {
    private $unAcheteur = null;

    // ******************* Constructeur vide
	public function __construct() {
		parent::__construct();
	}

    public function getAcheteurs() {
        $this->tabAcheteurs = AcheteurDAO::chercherTous();
        return $this->tabAcheteurs;
    }

    // ******************* Méthode exécuter action
    public function executerAction() {
        $id=$this->idUtilisateur;
        $id-=2;
        $this->unAcheteur = AcheteurDAO::chercher($id);

        if (ISSET($_POST['telephone']) and ISSET($_POST['solde'])){
            $this->unAcheteur->setTelephone($_POST['telephone']);
            $this->unAcheteur->payerSolde($_POST['solde']);
            AcheteurDAO::modifier($this->unAcheteur);
            array_push ($this->messagesSucces,"Modification éffectué");
        }      
        return "pageModificationCompte";
    }
}

?>
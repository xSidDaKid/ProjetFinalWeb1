<?php
// *****************************************************************************************
// Description   : Contrôleur pour la page d'info
// Date          : 18 mai 2021
// Auteur        : Shajaan Balasingam
// Modifé par    : 
// *****************************************************************************************
include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/InfosCinemaDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/AcheteurDAO.class.php");

class creationCompte extends Controleur {
    private $nom_acheteur = null;
    private $telephone_acheteur = null;
    private $id_acheteur = null;
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

        if(isset($_POST['nom']) and isset($_POST['telephone'])){
            $this->nom_acheteur = $_POST['nom'];
            $this->telephone_acheteur = $_POST['telephone'];
            $this->id_acheteur = AcheteurDAO::obtenirProchainId();
                
            $this->unAcheteur = new Acheteur($this->id_acheteur, $this->nom_acheteur, $this->telephone_acheteur, 0 );
            $this->unAcheteur = AcheteurDAO::inserer($this->unAcheteur);
            array_push ($this->messagesSucces,"Création Réussi!");
        }               

        return "pageCreationCompte";
    }
}

?>

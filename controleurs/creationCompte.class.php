<?php
// *****************************************************************************************
// Description   : Contrôleur pour la page d'info
// Date          : 18 mai 2021
// Auteur        : Shajaan Balasingam
// Modifé par    : Louai Roueha
// *****************************************************************************************
include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/InfosCinemaDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/AcheteurDAO.class.php");
include_once(DOSSIER_BASE_INCLUDE."modele/DAO/UtilisateurDAO.class.php");

class creationCompte extends Controleur {
    private $nom_acheteur = null;
    private $telephone_acheteur = null;
    private $id_acheteur = null;
    private $mot_passe = "";
    private $unAcheteur = null;
    private $unUtilisateur = null;
    protected $idUtilisateur = null;

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


        if(isset($_POST['nom']) and isset($_POST['telephone']) and isset($_POST['motDePasse'])){
            
            $this->nom_acheteur = $_POST['nom'];
            $this->telephone_acheteur = $_POST['telephone'];
            $this->mot_passe = $_POST['motDePasse'];
            
            $this->id_acheteur = AcheteurDAO::obtenirProchainId();
            $this->unAcheteur = new Acheteur($this->id_acheteur, $this->nom_acheteur, $this->telephone_acheteur, 0 );
            
            if (count(AcheteurDAO::chercherTous()) < count(UtilisateurDAO::chercherTous())){
                $this->unAcheteur = AcheteurDAO::inserer($this->unAcheteur);
                $this->idUtilisateur = UtilisateurDAO::obtenirProchainId();
                UtilisateurDAO::inserer(new Utilisateur($this->idUtilisateur, $this->mot_passe, "acheteur"));
                array_push ($this->messagesSucces,"Création Réussi! votre ID assignée est : ". $this->idUtilisateur);
            } else {
            array_push ($this->messagesErreur,"Vous n'avez pas de ID disponible.");

            }
            
        }

        return "pageCreationCompte";
    }
}

?>
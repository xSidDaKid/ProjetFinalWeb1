<?php
/*
#
# Description : Classe Acheteur
#               
# Date        : 2021/04/16
# Auteurs     : Kumaran Satkunanathan
#               Louai Roueha
#               Shajaan Balasingam
#
*/

// ****** INLCUSIONS *******
// si la constante n'existe pas, on la crée
if (defined("DOSSIER_BASE_INCLUDE") == false) {
	$chemin=(substr($_SERVER['DOCUMENT_ROOT'],-1)=="/")?$_SERVER['DOCUMENT_ROOT']:$_SERVER['DOCUMENT_ROOT']."/";
	define("DOSSIER_BASE_INCLUDE", $chemin."projet_h2021_g16/");
}
include_once(DOSSIER_BASE_INCLUDE."modele/Billet.class.php"); 

class Acheteur extends Billet{
    // Attributs
    private $idAcheteur;//int
    private $nom;//String
    private $telephone;//String
    private $solde;//Float
    private $lesBillets;//Array <Billet>

    //Constructeur
    public function __construct($unId, $unNom, $unTelephone, $unSolde){
        //parent::__construct($unNumero, $unPrix, $unEvenement);
        $this->idAcheteur = $unId;
        $this->nom = $unNom;
        $this->telephone = $unTelephone;
        $this->solde = $unSolde;
        $this->lesBillets = [];
    }

    public function getIdAcheteur() { return $this->idAcheteur; }
    public function getNom() { return $this->nom; }
    public function getTelephone() { return $this->telephone; }
    public function getSolde() { return $this->solde; }
    public function getLesBillets() {
        foreach ($this->lesBillets as $tab) {
            return $tab; 
        }
    }
    
    public function setTelephone($unTelephone) { $this->telephone = $unTelephone; }

    //Methodes speciales
    public function ajouterBillet($nouveauBillet){
        $lesBillets = [];
        array_push ($lesBillets, $nouveauBillet);//TODO: MARCHE PAS
    }

    public function chargerSolde($montant){
        $this->solde += $montant;
    }

    public function payerSolde($montant){
        $this->solde -= $montant;
    }

    public function __toString() {
       $message = "[#" .$this->idAcheteur. "] ".$this->nom.", Telephone: " .$this->telephone. ", Solde: " .$this->solde;
     /*foreach ($lesBillets as $unBillet) {
			echo "Billet: " .$unBillet;
		}   //$lesBillets n'est pas initialiser*/
        return $message;
    }
}
?>

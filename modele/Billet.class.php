<?php

/*
#
# Description : Classe Billet
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
include_once(DOSSIER_BASE_INCLUDE."modele/Cinema.class.php"); 

class Billet extends Cinema{
	
    // Attributs
    private $numeroBillet;//int
    private $prixPaye;//float
    private $idAcheteur;//int
    private $evenement;//Cinema

    //Constructeur
    public function __construct($unNumero, $unPrix, $unIdAcheteur, $unEvenement) {
        $this->numeroBillet = $unNumero;
        $this->prixPaye = $unPrix;
        $this->idAcheteur = $unIdAcheteur;//a verifier
        $this->evenement = $unEvenement;
    }
    
    // Accesseurs et mutateurs
	public function getNumeroBillet() { return $this->numeroBillet; }
    public function getPrixPaye() { return $this->prixPaye; }
    public function getIdAcheteur() { return $this->idAcheteur; }
    public function getEvenement() { return $this->evenement; }

    //toString
    public function __toString() {
        return $message = "Numéro du Billet: " .$this->numeroBillet. ", Prix payée: " .$this->prixPaye. ", Id Acheteur: ".$this->idAcheteur. ", Numéro Cinéma: ".$this->evenement;
    }
}
?>

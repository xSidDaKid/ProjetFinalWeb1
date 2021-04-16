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

class Billet {
	
    // Attributs
    private $numeroBillet;//int
    private $prixPaye;//float
    private $idAcheteur;//int
    private $evenement;//Cinema

    //Constructeur
    public function __construct($unNumero, $unPrix, $idAcheteur, $unEvenement) {
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
        return $message = "[#" .$this->idAcheteur. "] Numéro du Billet: " .$this->numeroBillet. ", Prix payée: " .$this->prixPaye. ", Événement: ".$this->evenement;
    }
?>

<?php
class Acheteur {
    // Attributs
    private $idAcheteur;//int
    private $nom;//String
    private $telephone;//String
    private $solde;//Float
    private $lesBillets = [];//Array <Billet>

    //Constructeur
    public function __construct($unId, $unNom, $unTelephone, $unSolde){
        $this->idAcheteur = $unId;
        $this->nom = $unNom;
        $this->telephone = $unTelephone;
        $this->solde = $unSolde;
    }

    public function getIdAcheteur() { return $this->idAcheteur; }
    public function getNom() { return $this->nom; }
    public function getTelephone() { return $this->telephone; }
    public function getSolde() { return $this->solde; }
    public function getLesBillets() { return $this->lesBillets; }
    
    public function setTelephone() { $this->telephone = $unTelephone; }

    public function ajouterBillet($nouveauBillet){

    }

    public function chargerSolde($montant){

    }

    public function payerSolde($montant){

    }

    public function __toString() {
       $message = "[#" .$this->idAcheteur. "] ".$this->nom.", Telephone: " .$this->telephone. ", Solde: " .$this->solde;
       foreach ($lesBillets as $unBillet) {
			echo "Billet: " .$unBillet;
		}       
    }
}
?>

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

class InfosCinema{
    
    // Attributs
    private $codeInfos;//int
    private $titre;//String
    private $urlPhoto;//String

    //Constructeur
    public function __construct($unCode, $unTitre, $unUrl) {
        
    }

    // Accesseurs et mutateurs
	public function getCodeInfos() { return $this->codeInfos; }
    public function getTitre() { return $this->titre; }
    public function getUrlPhoto() { return $this->urlPhoto; }

    public function setTitre() { $this->titre = $unTitre; }
    public function setUrlPhoto() { $this->urlPhoto = $unUrl; }

    //toString
    public function __toString() {
       $message = "[#" .$this->idAcheteur. "] ".$this->nom.", Telephone: " .$this->telephone. ", Solde: " .$this->solde;
       foreach ($lesBillets as $unBillet) {
			echo "Billet: " .$unBillet;
		}       
    }
}

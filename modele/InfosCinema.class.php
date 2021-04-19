<?php

/*
#
# Description : Classe InfoCinema
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

class InfosCinema extends Cinema {
    
    // Attributs
    private $codeInfos;//int
    private $titre;//String
    private $urlPhoto;//String

    //Constructeur
    public function __construct($unCode, $unTitre, $unUrl) {
        $this->codeInfos = $unCode;
		$this->titre = $unTitre;
		$this->urlPhoto = $unUrl;
    }

    // Accesseurs et mutateurs
	public function getCodeInfos() { return $this->codeInfos; }
    public function getTitre() { return $this->titre; }
    public function getUrlPhoto() { return $this->urlPhoto; }

    public function setTitre() { $this->titre = $unTitre; }
    public function setUrlPhoto($valeur) { $this->urlPhoto = $unUrl; }

    //toString
    public function __toString() {
       return $message = "[#" .$this->codeInfos. "] ".$this->titre.", Photo: " .$this->urlPhoto;
    }
}
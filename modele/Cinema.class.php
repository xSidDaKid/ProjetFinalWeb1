<?php

/*
#
# Description : Classe Cinema
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
include_once(DOSSIER_BASE_INCLUDE."modele/InfosCinema.class.php"); 

class Cinema extends InfosCinema{

    // Attributs
    private $numeroCinema;//int
    private $laDate;//String
    private $prixUnBillet;//Float
    private $placesTotales;//int
    private $placesVendues;//int
    private $infos;//InfosCinema

    //Constructeur
    public function __construct($unNumero, $uneDate, $unPrix, $placesTotales, $placesVendues, $desInfos) {
        $this->numeroCinema = $unNumero;
		$this->laDate = $uneDate;
		$this->prixUnBillet = $unPrix;
		$this->placesTotales = $placesTotales;
		$this->placesVendues = $placesVendues; 
        $this->desInfos = $desInfos;

    }

    // Accesseurs et mutateurs
	public function getNumeroCinema() { return $this->numeroCinema; }
    public function getLaDate() { return $this->laDate; }
    public function getPrixUnBillet() { return $this->prixUnBillet; }
    public function getPlaceTotales() { return $this->placesTotales; }
    public function getPlaceVendues() { return $this->placesVendues; }
    public function getInfos() { return $this->infos; }

    public function setPrixUnBillet($unPrix) { $this->prixUnBillet = $unPrix; }
    public function setLaDate($uneDate) {  $this->laDate = $uneDate; }

    //Methodes spéciales
    public function calculerPlacesDisponibles() {
        //TODO
        return $placesDiponible = $this->placesTotales-$this->placesVendues;
    }

    public function vendreDesPlaces($nombrePlaces) {
        return $this->placesVendues + $nombrePlaces;
    }

    public function __toString() {
        return $message = "Numero Cinéma: " .$this->numeroCinema. ", Date: " .$this->laDate. ", Prix d'un billet: " .$this->prixUnBillet. ", Places Totales: ".$this->placesTotales.", Places Vendues: ".$this->placesVendues.", Info: ".$this->infos;
    }
}

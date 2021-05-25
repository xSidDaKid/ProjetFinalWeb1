<!--
  Projet  H2021 
  Noms    : Kumaran Satkunanathan
            Louai Roueha
            Shajaan Balasingam
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Projet-test</title>
    <?php
		include(DOSSIER_BASE_INCLUDE."vues/inclusions_html/head.inc.php");
		include_once(DOSSIER_BASE_INCLUDE."modele/DAO/AcheteurDAO.class.php");
		include_once(DOSSIER_BASE_INCLUDE."modele/DAO/BilletDAO.class.php");
		include_once(DOSSIER_BASE_INCLUDE."modele/DAO/CinemaDAO.class.php");
	?>
    <link rel="stylesheet" href="<?php echo DOSSIER_BASE_LIENS;?>/css/style.css" />
</head>

<body>
    <!-- MENU -->
    <?php
	    include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/menu.inc.php");
	?>
    <h1>Ce site vend des billets de cinéma</h1>
	<?php 
		echo "Nombre total d'acheteurs : ";
		$compteur = 0;
		$tabAcheteur=AcheteurDAO::chercherTous();
		 foreach($tabAcheteur as $acheteur){
			 $compteur ++;
		 }
		 echo $compteur;
		 
		 echo "<br/>";
		 
		echo "Nombre total de billets : ";
		$compteur = 0;
		$tabBillets=BilletDAO::chercherTous();
		 foreach($tabBillets as $billet){
			 $compteur ++;
		 }
		 echo $compteur;
		 
		 echo "<br/>";
		 
		 echo "Nombre total de cinémas : ";
		$compteur = 0;
		$tabCinema=CinemaDAO::chercherTous();
		 foreach($tabCinema as $cinema){
			 $compteur ++;
		 }
		 echo $compteur;
		 		
	?>
	</br>;
	<p>Propriétaire/Gérant :Kumaran Satkunanathan, Louai Roueha, Shajaan Balasingam </br> Numéro de contact: 514-xxx-xxxx</p>;
	
	
	
</body>

</html>

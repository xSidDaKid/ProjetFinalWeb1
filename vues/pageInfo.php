<!--
  Projet  H2021 
  Noms    : Kumaran Satkunanathan
            Louai Roueha
            Shajaan Balasingam
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Informations Générales</title>
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
    <h1 class="p-3 display-2">Informations Générales</h1>
    <div class="card w-50 p-2 m-4">
        <p class="lead">Ce site vend des billets de cinéma</p>
        <?php
			echo "<ul class='list-group'>";
			echo "<li class='list-group-item'>Nombre total d'acheteurs : ";
			$tabAcheteur=$controleur->getAcheteurs();
			echo count($tabAcheteur)."</li>";
			echo "<br/>";
			
			echo "<li class='list-group-item'>Nombre total de billets : ";
			$tabBillet=$controleur->getBillets(); 
			echo count($tabBillet)."</li>";
			
			echo "<br/>";
			
			echo "<li class='list-group-item'>Nombre total de cinémas : ";
			$tabCinema=$controleur->getCinemas();
			echo count($tabCinema)."</li>";
			echo "<br/>";
			echo "</ul>"
		?>
        <ul class='list-group'>
            <li class='list-group-item'>Propriétaire/Gérant : Kumaran Satkunanathan, Louai Roueha, Shajaan Balasingam
            </li>
            <br />
            <li class='list-group-item'>Numéro de contact: 514-xxx-xxxx</li>
        </ul>
    </div>


</body>

</html>
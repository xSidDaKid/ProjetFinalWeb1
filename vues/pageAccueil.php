<!--
  Projet  H2021 
  Noms    : 
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Projet-Accueil</title>
    <?php
		include(DOSSIER_BASE_INCLUDE."vues/inclusions_html/head.inc.php");
	?>
    <link rel="stylesheet" href="<?php echo DOSSIER_BASE_LIENS;?>/css/style.css" />
</head>

<body>
    <!-- MENU -->
    <?php
		include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/menu.inc.php");
	?>

    <div class="bg a">
        <div class="a pt-5 pb-5">
            <h1 class="pt-5 pb-5">Voici notre page d'accueil</h1>
        </div>
    </div>
    <hr />
    <h5><a href="<?php echo DOSSIER_BASE_LIENS?>/modele" target="_blank">liens vers les dossiers du modele</a>
    </h5>
</body>

</html>
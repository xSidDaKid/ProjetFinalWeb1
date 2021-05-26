<!--
  Projet  H2021 
  Noms    : Kumaran Satkunanathan
            Louai Roueha
            Shajaan Balasingam
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Événement</title>
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
    <h1 class="p-3 display-2">Événement</h1>
    </br>
    <div class="card m-3 p-3 w-50">
        <form class="mon_formulaire p-3" action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=voirPageEvenement"
            method="post">
            <div>
                <label>Rechercher par Titre : </label>
                <input type="text" name="titre" />
            </div>
            <input type="submit" value="Chercher le titre" />
        </form>
        <?php				
			$unCinema=$controleur->getLeTitre();
			echo "<p class='lead p-2'>".$unCinema."</p>";
		?>

        <form class="mon_formulaire p-3 m-2"
            action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=voirPageEvenement" method="post">
            <div>
                <label>Rechercher par date : </label>
                <input type="text" name="date" />
            </div>
            <input type="submit" value="Chercher par date" />
        </form>
        <?php				
			$unCinema=$controleur->getLaDate();
			echo "<p class='lead p-2'>".$unCinema."</p>";
		?>

        </br></br>
        <form class="mon_formulaire p-3 m-2"
            action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=voirPageEvenement" method="post">
            <div>
                <label>Rechercher par code : </label>
                <input type="text" name="code_infos" />
            </div>
            <input type="submit" value="Chercher le code infos" />
        </form>
        <?php				
			$unCinema=$controleur->getLeCode();
			echo "<p class='lead p-2'>".$unCinema."</p>";
		?>

        </br></br>
        <form class="mon_formulaire p-3 m-2"
            action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=voirPageEvenement" method="post">
            <div>
                <label>Rechercher par salle : </label>
                <input type="text" name="salle" />
            </div>
            <input type="submit" value="Chercher par salle" />
        </form>
        <?php				
			$unCinema=$controleur->getLaSalle();
			echo "<p class='lead p-2'>".$unCinema."</p>";
		?>


    </div>

</body>

</html>
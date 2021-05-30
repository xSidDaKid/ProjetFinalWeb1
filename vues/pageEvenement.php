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
    <?php
          echo "<div class='bg-success text-center'>";
          afficherSucces($controleur->getMessagesSucces());
          echo "</div>";
          echo "<div class='bg-danger text-center'>";
          afficherErreurs($controleur->getMessagesErreur());
          echo "</div>";
    ?>
    </br>
    <div class="card m-3 p-3 w-50">
        <form class="mon_formulaire p-3" action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=voirPageEvenement"
            method="post">
            <div>
                <label>Rechercher par Titre : </label>
                <input type="text" name="titre" />
            </div>
            <input class="btn btn-primary" type="submit" value="Chercher le titre" />
        </form>
        <?php				
			$unCinema=$controleur->getLeTitre();
			echo "<p class='lead p-2'>".$unCinema."</p>";
		?>

        <form class="mon_formulaire p-3 m-2"
            action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=voirPageEvenement" method="post">
            <div>
                <label>Rechercher par date : </label>
                <input type="date" name="date" />
            </div>
            <input class="btn btn-primary" type="submit" value="Chercher par date" />
        </form>
        <?php				
			$unCinema=$controleur->getLaDate();
			echo "<p class='lead p-2'>".$unCinema."</p>";
		?>

        <form class="mon_formulaire p-3 m-2"
            action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=voirPageEvenement" method="post">
            <div>
                <label>Rechercher par code : </label>
                <input type="number" name="code_infos" />
            </div>
            <input class="btn btn-primary" type="submit" value="Chercher le code infos" />
        </form>
        <?php				
			$unCinema=$controleur->getLeCode();
			echo "<p class='lead p-2'>".$unCinema."</p>";
		?>

        <form class="mon_formulaire p-3 m-2"
            action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=voirPageEvenement" method="post">
            <div>
                <label>Rechercher par salle : </label>
                <input type="text" name="salle" placeholder="salle x" />
            </div>
            <input class="btn btn-primary" type="submit" value="Chercher par salle" />
        </form>
        <?php				
			$unCinema=$controleur->getLaSalle();
			echo "<p class='lead p-2'>".$unCinema."</p>";
		?>


    </div>
    <br><br><br><br>
    <!-- PIED -->
    <?php
		include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/pied.inc.php");
    
	?>
</body>

</html>
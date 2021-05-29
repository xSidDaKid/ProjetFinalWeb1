<!--
  Projet  H2021 
  Noms    : Kumaran Satkunanathan
            Louai Roueha
            Shajaan Balasingam
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Page information de la représentation</title>
    <?php
		include(DOSSIER_BASE_INCLUDE."vues/inclusions_html/head.inc.php");
        include_once(DOSSIER_BASE_INCLUDE."modele/DAO/infosCinemaDAO.class.php");
        include_once(DOSSIER_BASE_INCLUDE."modele/DAO/CinemaDAO.class.php");
	?>
</head>

<body>
    <!-- MENU -->
    <?php
	    include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/menu.inc.php");
	?>
    <h1 class="p-3 display-2">Information pour l'ajout d'un cinéma</h1>
    <?php
          echo "<div class='bg-success text-center'>";
          afficherSucces($controleur->getMessagesSucces());
          echo "</div>";
          echo "<div class='bg-danger text-center'>";
          afficherErreurs($controleur->getMessagesErreur());
          echo "</div>";
    ?>
    <?php 
        $unCinema = $controleur->getCinema();
        echo "<ul class='list-group w-50 '>";
        foreach ($unCinema as $cinema){
            if ($cinema->getInfos()==$_SESSION["code_infos"]){
                echo "<li class='list-group-item'>".$cinema ."</li>";
            }
        }
        echo "</ul>";
    
    ?>
    <br>


    <img src="images\info.png" style="float:left" width="100px">
    <div class="card w-25 mt-2 ml-3 p-2">
        <form class="mon_formulaire"
            action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=voirPageAjoutInfoRepresentations" method="post">
            <div class="form-group">
                <label>Date du film : </label>
                <input type="date" name="date" required />
            </div>
            <div class="form-group">
                <label>Prix du film: </label>
                <input type="number" name="prix" step="any" required />
            </div>
            <div class="form-group">
                <label>Places totales: </label>
                <input type="number" name="place_totales" required />
            </div>
            <div class="form-group">
                <label>Places vendues: </label>
                <input type="number" name="place_vendues" required />
            </div>
            <input class="m-2 btn btn-primary" type="submit" value="Créer" />
        </form>
        <form action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=voirPageAjoutRepresentations" method="post">
            <input class="m-2 btn btn-primary" type="submit" name="terminer" value="Terminer" />
        </form>

    </div>
    <br><br><br><br>
    <?php 
       /*$tabCinema = $controleur->getCinema();
       echo "<ul class='list-group'>";
       foreach ($tabCinema as $tab) {
           echo "<li class='list-group-item'>";
           echo $tab;
           echo "</li>";
        }
        */
    ?>
    <!-- PIED -->
    <?php
		include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/pied.inc.php");
    
	?>

</body>

</html>
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
        $unCinema=null;
        $unCinema = CinemaDAO::chercherAvecFiltre("WHERE code_infos=".$_POST['code_infos']);
        echo "<ul class='list-group w-50 '>";
        foreach ($unCinema as $tab){
            echo "<li class='list-group-item'>".$tab ."</li>";
        }
        echo "</ul>";
    ?>
    <br>

    <img src="images\info.png" style="float:left" width="100px">
    <div class="card w-25 mt-2 ml-3 p-2">
        <form class="mon_formulaire"
            action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=voirPageAjoutRepresentations" method="post">
            <div class="form-group">
                <label>Date du film : </label>
                <input type="date" name="date" required />
            </div>
            <div class="form-group">
                <label>Prix du film: </label>
                <input type="number" name="prix" required />
            </div>
            <div class="form-group">
                <label>Places totales: </label>
                <input type="number" name="place_totales" required />
            </div>
            <div class="form-group">
                <label>Places vendues: </label>
                <input type="number" name="place_vendues" required />
            </div>
            <input class="btn btn-primary" type="submit" value="Créer" />
        </form>
    </div>
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
<!--
  Projet  H2021 
  Noms    : Kumaran Satkunanathan
            Louai Roueha
            Shajaan Balasingam
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Page information de la representation</title>
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
    <h1>INFORMATION DU FILM</h1>
    <?php 
        $unCinema=null;
        $unCinema = CinemaDAO::chercherAvecFiltre("WHERE code_infos=".$_POST['code_infos']);
        echo "<ul>";
        foreach ($unCinema as $tab){
            echo "<li>".$tab ."</li>";
        }
        echo "</ul>";
    ?>
    <form class="mon_formulaire" action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=voirPageAjoutRepresentations" method="post">
						<div>
							<label>Date du film : </label>
							<input type="date" name="date"/>
						</div>
                        <div>
							<label>Prix du film: </label>
							<input type="number" name="prix"/>
						</div>
                        <div>
							<label>Places totales: </label>
							<input type="number" name="place_totales"/>
						</div>
                        <div>
							<label>Places vendues: </label>
							<input type="number" name="place_vendues"/>
						</div>
						<input type="submit" value="Créer"/>
					</form>
    <?php 
       $tabCinema = $controleur->getCinema();
       echo "<ul class='list-group'>";
       foreach ($tabCinema as $tab) {
           echo "<li class='list-group-item'>";
           echo $tab;
           echo "</li>";
        }
        
    ?>

    
</body>

</html>

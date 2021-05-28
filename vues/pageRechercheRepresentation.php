<!--
  Projet  H2021 
  Noms    : Kumaran Satkunanathan
            Louai Roueha
            Shajaan Balasingam
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Recherche d'une représentation</title>
    <?php
		include(DOSSIER_BASE_INCLUDE."vues/inclusions_html/head.inc.php");
	?>
</head>

<body>
    <!-- MENU -->
    <?php
		include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/menu.inc.php");  
  	?>

    <h1 class="p-3 display-2">Recherche d'une représentation</h1>

    <div class="card mt-4 p-3 centrer w-25 text-center">
        <?php
          echo "<div class='bg-success text-center'>";
          afficherSucces($controleur->getMessagesSucces());
          echo "</div>";
          echo "<div class='bg-danger text-center'>";
          afficherErreurs($controleur->getMessagesErreur());
          echo "</div>";
        ?>

        <form action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=voirPageRechercheRepresentation" method="post">
            <div class="form-group">
                <label for="text">Code de la représentation/Film</label>
                <input type="number" name="id_film" id="" class="form-control" placeholder="[#code_infos]"
                    aria-describedby="helpId" required>
            </div>
            <button type="submit" class="btn btn-primary">Suivant</button>
        </form>
    </div>
    <!-- PIED -->
    <?php
		include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/pied.inc.php");
    
	?>
</body>

</html>
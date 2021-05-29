<!--
  Projet  H2021 
  Noms    : Kumaran Satkunanathan
            Louai Roueha
            Shajaan Balasingam
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Ajout d'une représentations</title>
    <?php
		include(DOSSIER_BASE_INCLUDE."vues/inclusions_html/head.inc.php");
	?>
</head>

<body>
    <!-- MENU -->
    <?php
	    include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/menu.inc.php");
	?>
    <h1 class="p-3 display-2">Recherche d'un film</h1>

    <?php
        echo "<div class='bg-danger text-center'>";
        afficherErreurs($controleur->getMessagesErreur());
        echo "</div>";
    ?>

    <div class="card centrer w-25 mt-5">
        <form class="mon_formulaire"
            action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=voirPageAjoutRepresentations" method="post">
            <div class="form-group">
                <label>Rechercher par code : </label>
                <input type="text" name="code_infos" />
            </div>
            <input class="btn btn-primary" type="submit" value="Chercher le code infos" />
        </form>
    </div>

    <!-- PIED -->
    <?php
		include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/pied.inc.php");
    
	?>
</body>

</html>

<!--
  Projet  H2021 
  Noms    : Kumaran Satkunanathan
            Louai Roueha
            Shajaan Balasingam
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Nombre de billets désiré</title>
    <?php
		include(DOSSIER_BASE_INCLUDE."vues/inclusions_html/head.inc.php");
	?>
</head>

<body>
    <!-- MENU -->
    <?php
		include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/menu.inc.php");
    
	?>

    <h1 class="p-3 display-2">Nombre de billets désirés</h1>

    <div class="card mt-4 p-3 centrer w-25 text-center">
        <?php
          echo "<div class='bg-success text-center'>";
          afficherSucces($controleur->getMessagesSucces());
          echo "</div>";
          echo "<div class='bg-danger text-center'>";
          afficherErreurs($controleur->getMessagesErreur());
          echo "</div>";
        ?>
        <form action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=voirPageNombreBilletDesire" method="post">
            <div class="form-group">
                <label for="text">Nombre de billets désirés</label>
                <input type="number" name="nb_billet" id="" class="form-control" placeholder="Nombre de billets désirés"
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
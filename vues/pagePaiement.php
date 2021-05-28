<!--
  Projet  H2021 
  Noms    : Kumaran Satkunanathan
            Louai Roueha
            Shajaan Balasingam
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Choix du mode de paiement </title>
    <?php
		include(DOSSIER_BASE_INCLUDE."vues/inclusions_html/head.inc.php");
	?>
</head>

<body>
    <!-- MENU -->
    <?php
		include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/menu.inc.php");
    
	?>

    <h1 class="p-3 display-2">Choix du mode de paiement</h1>

    <div class="card mt-4 p-3 centrer w-25 text-center">
        <?php
          echo "<div class='bg-success text-center'>";
          afficherSucces($controleur->getMessagesSucces());
          echo "</div>";
          echo "<div class='bg-danger text-center'>";
          afficherErreurs($controleur->getMessagesErreur());
          echo "</div>";
        ?>

        <form action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=voirPagePaiement" method="post">
            <div class="form-group">
                <label for="text">Choix du mode de paiement</label>
                <div class="form-check">
                    <input type="checkbox" class="redio form-check-input" name="compte" id="gridRadios1" value="1"
                        checked>
                    <label class="form-check-label" for="gridRadios1">
                        Porté au compte
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="redio form-check-input" name="credit" id="gridRadios2" value="1">
                    <label class="form-check-label" for="gridRadios2">
                        Par crédit
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Terminer</button>
        </form>
    </div>
    <!-- PIED -->
    <?php
		include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/pied.inc.php");
    
	?>
</body>

</html>
<!--
  Projet  H2021 
  Noms    : Kumaran Satkunanathan
            Louai Roueha
            Shajaan Balasingam
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Page d'acceuil du cinéma</title>
    <?php
		include(DOSSIER_BASE_INCLUDE."vues/inclusions_html/head.inc.php");
	?>
</head>

<body>
    <!-- MENU -->
    <?php
		include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/menu.inc.php");
    
	?>

    <h1 class="p-3 display-2">Confirmation de l'achat</h1>

    <div class="card mt-4 p-3">
        <?php
          echo "<div class='bg-success text-center'>";
          afficherSucces($controleur->getMessagesSucces());
          echo "</div>";
          echo "<div class='bg-danger text-center'>";
          afficherErreurs($controleur->getMessagesErreur());
          echo "</div>";
        ?>
        <a class="btn btn-primary w-25 centrer mt-2" href="/projet_h2021_g16/index.php?=voirPageAccueil"
            role="button">Retour à l'accueil</a>

    </div>
    <!-- PIED -->
    <?php
		include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/pied.inc.php");
    
	?>
</body>

</html>
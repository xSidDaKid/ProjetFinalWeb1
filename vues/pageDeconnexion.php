<!--
  Projet  : 
  Noms    : 
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Page de connexion</title>
    <?php
		include(DOSSIER_BASE_INCLUDE."vues/inclusions_html/head.inc.php");
	?>
</head>

<body>
    <!-- MENU -->
    <?php
	    include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/menu.inc.php");
	?>


    <form action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=seDeconnecter" method="post">
        <input type="hidden" name="formulaireDeconnexion" value="true" />
        <div class="jumbotron text-center">
            <h1>Voulez-vous déconnecter?</h1>
            <br>
            <input type="submit" value="Confirmer" />
        </div>
    </form>

</body>

</html>
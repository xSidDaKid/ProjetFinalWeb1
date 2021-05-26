<!--
  Projet  : 
  Noms    : 
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Page de déconnexion</title>
    <?php
		include(DOSSIER_BASE_INCLUDE."vues/inclusions_html/head.inc.php");
	?>
</head>

<body>
    <!-- MENU -->
    <?php
	    include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/menu.inc.php");
	?>

    <div class="centrer mt-4">
        <form action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=seDeconnecter" method="post">
            <input type="hidden" name="formulaireDeconnexion" value="true" />
            <div class="jumbotron text-center">
                <h1 class="p-3 display-4">Voulez-vous déconnecter?</h1>
                <br>
                <input class="btn btn-primary" type="submit" value="Confirmer" />
            </div>
        </form>
    </div>
    <!-- PIED -->
    <?php
		include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/pied.inc.php");
    
	?>
</body>

</html>
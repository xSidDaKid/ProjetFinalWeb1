<!--
  Projet  H2021 
  Noms    : Kumaran Satkunanathan
            Louai Roueha
            Shajaan Balasingam
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>pageAjoutRepresentations</title>
    <?php
		include(DOSSIER_BASE_INCLUDE."vues/inclusions_html/head.inc.php");
	?>
</head>

<body>
    <!-- MENU -->
    <?php
	    include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/menu.inc.php");
	?>
    <h1>Voici la page d'ajout de représentations</h1>
    <?php
                        echo "<div class='bg-danger text-center'>";
                        afficherErreurs($controleur->getMessagesErreur());
                        echo "</div>";
                    ?>

    <form class="mon_formulaire" action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=voirPageAjoutRepresentations" method="post">
						<div>
							<label>Rechercher par code : </label>
							<input type="text" name="code_infos"/>
						</div>
						<input type="submit" value="Chercher le code infos"/>
					</form>



</body>

</html>

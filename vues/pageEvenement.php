<!--
  Projet  H2021 
  Noms    : Kumaran Satkunanathan
            Louai Roueha
            Shajaan Balasingam
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Projet-test</title>
    <?php
		include(DOSSIER_BASE_INCLUDE."vues/inclusions_html/head.inc.php");
		
	?>
    <link rel="stylesheet" href="<?php echo DOSSIER_BASE_LIENS;?>/css/style.css" />
</head>

<body>
    <!-- MENU -->
    <?php
	    include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/menu.inc.php");
	?>
    <h1>Voici la page d'événement</h1>
	<form class="mon_formulaire" action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=voirPageEvenement" method="post">
						<div>
							<label>Code infos du cinéma : </label>
							<input type="text" name="code_infos"/>
						</div>
						<input type="submit" value="Chercher le code infos"/>
					</form>
	<?php				
	$unCinema=$controleur->getLeCode();
	echo $unCinema;
	?>
	
</body>

</html>

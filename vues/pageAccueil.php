<!--
  Projet  H2021 
  Noms    : 
-->
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Projet-Accueil</title>
	<?php
		include(DOSSIER_BASE_INCLUDE."vues/inclusions_html/head.inc.php");
	?>

</head>
<body>
	<h1>Page d'accueil à remplir et menu à remplacer</h1>
	<ul>
	<?php
		echo "<li><a href='".DOSSIER_BASE_LIENS."/index.php?action=voirPageAccueil'>Page Accueil</a></li>";
		if ($controleur->getCategorieUtilisateur()=="visiteur") {
			echo "<li><a href='".DOSSIER_BASE_LIENS."/index.php?action=seConnecter'>Connexion</a></li>";			
		} else  {
			echo "<li><a href='".DOSSIER_BASE_LIENS."/index.php?action=seDeconnecter'>Déconnexion</a></li>";			
		}
	?>
	</ul>
	<hr/>
	<h5><a href="<?php echo DOSSIER_BASE_LIENS?>/modele" target="_blank">liens vers les dossiers du modele</a></h5>
</body>
</html>

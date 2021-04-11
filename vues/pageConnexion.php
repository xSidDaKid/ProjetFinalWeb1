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
	<h1>Page de connexion à remplir et menu à remplacer</h1>
	
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
					
					
	<form action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=seConnecter" method="post" >
		<input type="hidden" name="formulaireConnexion" value="true" />
		<div>
			<label>Nom d'utilisateur :</label>
			<input type="text" name="id_utilisateur" />
		</div>
		<div>
			<label>Mot de passe :</label>
			<input type="text" name="mot_passe" />
		</div>
		<div>
			<input type="submit" value="Soumettre"/>
		</div>
	</form>
	
</body>
</html>

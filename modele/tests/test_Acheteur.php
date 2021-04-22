<!DOCTYPE html>
<!------------------------------------------------------------------>
<!---- Projet  : H2021                                           --->
<!---- Fichier de test unitaire pour la classe Acheteur          ---> 
<!---- Auteurs : Kumaran Satkunanathan							 --->
<!----               Louai Roueha								 --->
<!----               Shajaan Balasingam                          --->
<!------------------------------------------------------------------>
<html lang="fr">
<head>
	<title>Tests classes Projet</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../../css/tests.css">
</head>
<body >

	<!---- Création d'un accessoire ---->
	<h1>Fichier de test pour la classe Acheteur</h1>
	<?php
		// ****** INLCUSIONS *******
		// Importe l'interface DAO et la classe Acheteur 
		include_once "../Acheteur.class.php"; 
	?>

	<!---- Utilisation et affichage des méthodes -->
	<table>
		<thead>
			<tr>
				<th>Méthode</th>
				<th>Résultat</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Constructeur et affichage </td>
				<td>
					<?php 
						$unAchteur = new Acheteur(100, "Bob", "911", 500);
						echo "$unAchteur";
					?>
				</td>
			</tr>
			<!-- copiez-collez cette section pour chaque groupe de méthode à tester -->
			<tr>
				<td>Accesseurs</td>
				<td>
					<?php 
						echo $unAchteur->getNom()?"Bon":"Pas bon";
						echo "<br/>";
						echo $unAchteur->getTelephone()?"Bon":"Pas bon";
						echo "<br/>";
						echo $unAchteur->getSolde()?"Bon":"Pas bon";
						echo "<br/>";
						echo $unAchteur->getLesBillets()?"Bon":"Pas bon";
					?>
				</td>
			</tr>
			<tr>
				<td>Mutateurs</td>
				<td>
					<?php 
						$unAchteur->setTelephone("123");
						echo "$unAchteur";
					?>
				</td>
			</tr>
			<tr>
				<td>Méthode ajouterBillet</td>
				<td>
					<?php
						$unBillet = new Billet(12,123,"film");
						//echo "$unBillet";
						$unAchteur->ajouterBillet($unBillet);
						//echo $unBillet;
						echo $unAchteur->getLesBillets();
						$ticket = $unAchteur->getLesBillets();
						foreach ($ticket as $tabBillet) {
							echo "$tabBillet";
						}
					?>
				</td>
			</tr>
			<tr>
				<td>Méthode chargerSolde</td>
				<td>
					<?php
						$unAchteur->chargerSolde(1000);
						echo $unAchteur->getSolde();
					?>
				</td>
			</tr>
			<tr>
				<td>Méthode payerSolde</td>
				<td>
					<?php
						$unAchteur->payerSolde(1000);
						echo $unAchteur->getSolde();
					?>
				</td>
			</tr>
		</tbody>
	</table>
	<!---- Retour au fichier d'accueil -->
	<h2><a href="../../index.php">Retour à la page d'accueil</a></h2>
</body>
</html>

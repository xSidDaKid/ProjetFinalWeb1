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
	<title>Tests classe Billet</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../../css/tests.css">
</head>
<body >

	<!---- Création d'un accessoire ---->
	<h1>Fichier de test pour la classe Billet</h1>
	<?php
		// ****** INLCUSIONS *******
		// Importe l'interface DAO et la classe ZZZZ 
		include_once "../Billet.class.php";
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
						$unAcheteur = new Acheteur(100, "Bob", "911", 500);
						$unBillet = new Billet(44, 100, $unAcheteur->getIdAcheteur(), "");
						echo "$unBillet";
					?>
				</td>
			</tr>
			<!-- copiez-collez cette section pour chaque groupe de méthode à tester -->
			<tr>
				<td> Accesseurs </td>
				<td>
					<?php 
						echo $unBillet->getNumeroBillet()?"Bon":"Pas bon";
						echo "<br/>";
						echo $unBillet->getPrixPaye()?"Bon":"Pas bon";
						echo "<br/>";
						echo $unBillet->getIdAcheteur()?"Bon":"Pas bon";
						echo "<br/>";
						echo $unBillet->getEvenement()?"Bon":"Pas bon";
					?>
				</td>
			</tr>
		</tbody>
	</table>
	<!---- Retour au fichier d'accueil -->
	<h2><a href="../../index.php">Retour à la page d'accueil</a></h2>
</body>
</html>

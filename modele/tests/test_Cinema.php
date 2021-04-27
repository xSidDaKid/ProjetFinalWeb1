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
	<title>Tests classe Cinema</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../../css/tests.css">
</head>
<body >

	<!---- Création d'un accessoire ---->
	<h1>Fichier de test pour la classe Cinema</h1>
	<?php
		// ****** INLCUSIONS *******
		// Importe l'interface DAO et la classe ZZZZ 
		include_once "../Cinema.class.php"; 
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
						$unCinema = new Cinema (04, "2021-04-11", 200, 100, 1, "");
						echo "$unCinema";
					?>
				</td>
			</tr>
			<!-- copiez-collez cette section pour chaque groupe de méthode à tester -->
			<tr>
				<td>Accesseurs</td>
				<td>
					<?php 
						echo $unCinema->getNumeroCinema()?"Bon":"Pas bon";
						echo "<br/>";
						echo $unCinema->getLaDate()?"Bon":"Pas bon";
						echo "<br/>";
						echo $unCinema->getPrixUnBillet()?"Bon":"Pas bon";
						echo "<br/>";
						echo $unCinema->getPlaceTotales()?"Bon":"Pas bon";
						echo "<br/>";
						echo $unCinema->getPlaceVendues()?"Bon":"Pas bon";
						echo "<br/>";
						echo $unCinema->getInfos()?"Bon":"Pas bon";
					?>
				</td>
			</tr>
			<tr>
				<td>Mutateurs</td>
				<td>
					<?php 
						$unCinema->setPrixUnBillet(500);
						echo $unCinema->getPrixUnBillet();
						echo "<br/>";
						$unCinema->setLaDate("2121-04-11");
						echo $unCinema->getLaDate();
						echo "<br/>";
					?>
				</td>
			</tr>
			<tr>
				<td>Méthode calculerPlacesDisponibles()</td>
				<td>
					<?php 
						echo $unCinema->calculerPlacesDisponibles();
					?>
				</td>
			</tr>
			<tr>
				<td>Méthode vendreDesPlaces()</td>
				<td>
					<?php 
						$unCinema->vendreDesPlaces(4);
						echo $unCinema->getPlaceVendues()
					?>
				</td>
			</tr>
		</tbody>
	</table>
	<!---- Retour au fichier d'accueil -->
	<h2><a href="../../index.php">Retour à la page d'accueil</a></h2>
</body>
</html>

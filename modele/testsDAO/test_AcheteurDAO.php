<!DOCTYPE html>
<!------------------------------------------------------------------>
<!---- Projet  : H2021                                           --->
<!---- Fichier de test unitaire pour la classe ...               ---> 
<!---- Auteurs :                                     --->
<!------------------------------------------------------------------>
<html lang="fr">
<head>
	<title>Tests DAO Projet</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../../css/tests.css">
</head>
<body >

	<!---- Création d'un accessoire ---->
	<h1>Fichier de test pour la classe Utilisateur</h1>
	<?php
		// ****** INLCUSIONS *******
		// Importe l'interface DAO et la classe ZZZZDAO 
		include_once "../DAO/AcheteurDAO.class.php"; 
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
				<td>chercher </td>
				<td>
					<?php 
						$unAcheteur=AcheteurDAO::chercher(100);
						echo $unAcheteur?$unAcheteur:"Pas trouvé";
						echo "<br/>";
						$unAcheteur=AcheteurDAO::chercher(101);
						echo $unAcheteur?$unAcheteur:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>chercher avec filtre</td>
				<td>
					<?php 
						echo "<h3>On cherche tous les acheteurs ayant le nom AcheteurB</h3>";
						$tabAcheteurs=AcheteurDAO::chercherAvecFiltre("WHERE nom LIKE '%AcheteurB%'"); 
						echo "<ul>";
						foreach ($tabAcheteurs as $unAcheteur) {
							echo "<li>$unAcheteur</li>";
						}
						echo "</ul>";
					?>
				</td>
			</tr>
			<tr>
				<td>chercher tous</td>
				<td>
					<?php 
						$tableau=AcheteurDAO::chercherTous();
						foreach($tableau as $unAcheteur) {
							echo $unAcheteur."<br/>";
						}
					?>
				</td>
			</tr>
			<tr>
				<td>inserer</td>
				<td>
					<?php 
						echo "<h3>On insère un acheteur</h3>";
						$unAcheteur = new Acheteur(101, 'AcheteurD', '5149998798', 1000);
						echo "$unAcheteur";
						$test=AcheteurDAO::inserer($unAcheteur); // va réussir la 1ere fois

						echo "<ul><li>Insertion #1".($test?" a réussie":" a échouée")."</li></ul>";
					?>
				</td>
			</tr>
			<tr>
				<td>modifier</td>
				<td>
					<?php 

					?>
				</td>
			</tr>
			<tr>
				<td>supprimer</td>
				<td>
					<?php 

					?>
				</td>
			</tr>
			<tr>
				<td>obtenirProchainId </td>
				<td>
					<?php 

					?>
				</td>
			</tr>
			
		</tbody>
	</table>
	<!---- Retour au fichier d'accueil -->
	<h2><a href="../../index.php">Retour à la page d'accueil</a></h2>
</body>
</html>

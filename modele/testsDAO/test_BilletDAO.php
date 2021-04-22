<!DOCTYPE html>
<!------------------------------------------------------------------>
<!---- Projet  : H2021                                           --->
<!---- Fichier de test unitaire pour la classe Billet            ---> 
<!---- Auteurs :  Kumaran Satkunanathan							 --->
<!----        	  Louai Roueha							 		 --->
<!----            Shajaan Balasingam                             --->
<!------------------------------------------------------------------>
<html lang="fr">
<head>
	<title>Tests DAO Projet</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../../css/tests.css">
</head>
<body >

	<!---- Création d'un accessoire ---->
	<h1>Fichier de test pour la classe Billet</h1>
	<?php
		// ****** INLCUSIONS *******
		// Importe l'interface DAO et la classe ZZZZDAO 
		include_once "../DAO/BilletDAO.class.php"; 
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
						$unBillet=BilletDAO::chercher(101);
						echo $unBillet?$unBillet:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>chercher avec filtre</td>
				<td>
					<?php 
						echo "<h3>On cherche tous les billets ayant le numéro du billet 104</h3>";
						$tabBillets=BilletDAO::chercherAvecFiltre("WHERE numero_billet=104"); 
						echo "<ul>";
						foreach ($tabBillets as $unBillet) {
							echo "<li>$unBillet</li>";
						}
						echo "</ul>";
					?>
				</td>
			</tr>
			<tr>
				<td>chercher tous</td>
				<td>
					<?php 
						$tableau=BilletDAO::chercherTous();
						foreach($tableau as $unBillet) {
							echo $unBillet."<br/>";
						}
					?>
				</td>
			</tr>
			<tr>
				<td>inserer</td>
				<td>
					<?php 
						echo "<h3>On insère un billet MARCHE PAS</h3>";
						$unID = BilletDAO::obtenirProchainNumero();
						$unIDAcheteur = AcheteurDAO::obtenirProchainId();
						echo "$unIDAcheteur";
						$unBillet = new Billet($unID, 1000, 103,$unIDAcheteur);
						BilletDAO::inserer($unBillet); 
						$unBillet = BilletDAO::chercher($unID);
						echo $unBillet?$unBillet:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>modifier</td>
				<td>
					<?php 
						echo "<h3>On modifie le billet qu'on vient d'ajouter MARCHE PAS</h3>";
						$unBillet=BilletDAO::chercher($unID);
						BilletDAO::modifier($unBillet);
						$unBillet=BilletDAO::chercher($unID);
						echo $unBillet?$unBillet:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>supprimer</td>
				<td>
					<?php 
						echo "<h3>On supprime l'acheteur qu'on vient d'ajouter</h3>";
						$unBillet=BilletDAO::chercher(BilletDAO::obtenirProchainNumero() - 1);
						BilletDAO::supprimer($unBillet);
						// Vérification
						$unBillet=BilletDAO::chercher(105); 
						echo $unBillet?$unBillet:"Pas trouvé";

					?>
				</td>
			</tr>
			<tr>
				<td>obtenirProchainNumero </td>
				<td>
					<?php 
						echo BilletDAO::obtenirProchainNumero();
					?>
				</td>
			</tr>
			
		</tbody>
	</table>
	<!---- Retour au fichier d'accueil -->
	<h2><a href="../../index.php">Retour à la page d'accueil</a></h2>
</body>
</html>

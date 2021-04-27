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
						echo "<h3>On cherche tous les billets ayant le numéro du billet 100</h3>";
						$tabBillets=BilletDAO::chercherAvecFiltre("WHERE numero_billet=100"); 
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
						echo "<h3>TODO On insère un billet</h3>";
						$unID = BilletDAO::obtenirProchainNumero();
						$unIDAcheteur = AcheteurDAO::chercher(100);
						
						
						$unBillet = new Billet($unID, 1000, $unIDAcheteur->getIdAcheteur(), 100);
						echo "$unBillet";
						BilletDAO::inserer($unBillet); 

						$unBillet = BilletDAO::chercher($unID);
						echo "<br />";
						echo $unBillet?$unBillet:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>modifier</td>
				<td>
					<?php 
						echo "<h3>Impossible de modifier un billet</h3>";
					?>
				</td>
			</tr>
			<tr>
				<td>supprimer</td>
				<td>
					<?php 
						echo "<h3>TODO On supprime l'acheteur qu'on vient d'ajouter RIEN POUR L'INSTANT</h3>";
						/*$unBillet=BilletDAO::chercher(BilletDAO::obtenirProchainNumero() - 1);
						BilletDAO::supprimer($unBillet);
						// Vérification
						$unBillet=BilletDAO::chercher(105); 
						echo $unBillet?$unBillet:"Pas trouvé";*/

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

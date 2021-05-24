<!DOCTYPE html>
<!------------------------------------------------------------------>
<!---- Projet  : H2021                                           --->
<!---- Fichier de test unitaire pour la classe ...               ---> 
<!---- Auteurs : Kumaran Satkunanathan							 --->
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
	<h1>Fichier de test pour la classe InfosCinema</h1>
	<?php
		// ****** INLCUSIONS *******
		// Importe l'interface DAO et la classe ZZZZDAO 
		include_once "../DAO/InfosCinemaDAO.class.php"; 
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
						$unInfo=InfosCinemaDAO::chercher(19);
						echo $unInfo?$unInfo:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>chercher avec filtre</td>
				<td>
					<?php 
						echo "<h3>On cherche tous les infos ayant le code 19</h3>";
						$tabAcheteurs=InfosCinemaDAO::chercherAvecFiltre("WHERE code_infos=19"); 
						echo "<ul>";
						foreach ($tabAcheteurs as $unInfo) {
							echo "<li>$unInfo</li>";
						}
						echo "</ul>";
					?>
				</td>
			</tr>
			<tr>
				<td>chercher tous</td>
				<td>
					<?php 
						$tableau=InfosCinemaDAO::chercherTous();
						foreach($tableau as $unInfo) {
							echo $unInfo."<br/>";
						}
					?>
				</td>
			</tr>
			<tr>
				<td>inserer</td>
				<td>
					<?php 
						echo "<h3>On insère un info du cinema</h3>";

						$unID = InfosCinemaDAO::obtenirProchainId();

						$unInfo = new InfosCinema($unID, 'Cineplex', 'photo4.png');
						InfosCinemaDAO::inserer($unInfo); 
						$unInfo = InfosCinemaDAO::chercher($unID);
						echo $unInfo?$unInfo:"Pas trouvé";	
					?>
				</td>
			</tr>
			<tr>
				<td>modifier</td>
				<td>
					<?php 
					echo "<h3>On modifie l'info qu'on vient d'ajouter</h3>";
					$unInfo=InfosCinemaDAO::chercher($unID);
					
					$unInfo->setTitre("Cinema Guzzo");
					$unInfo->setUrlPhoto("photo5.jpeg");
					InfosCinemaDAO::modifier($unInfo);
					
					$unInfo=InfosCinemaDAO::chercher($unID);
					echo $unInfo?$unInfo:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>supprimer</td>
				<td>
					<?php 
						echo "<h3>On supprime l'info qu'on vient d'ajouter</h3>";
						$unInfo=InfosCinemaDAO::chercher($unID);
						InfosCinemaDAO::supprimer($unInfo);
						// Vérification
						$unInfo=InfosCinemaDAO::chercher($unID); 
						echo $unInfo?$unInfo:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>obtenirProchainId </td>
				<td>
					<?php 
						echo InfosCinemaDAO::obtenirProchainId();
					?>
				</td>
			</tr>
			
		</tbody>
	</table>
	<!---- Retour au fichier d'accueil -->
	<h2><a href="../../index.php">Retour à la page d'accueil</a></h2>
</body>
</html>

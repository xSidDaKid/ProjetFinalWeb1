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
		include_once(DOSSIER_BASE_INCLUDE."modele/DAO/UtilisateurDAO.class.php");
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
						$unID = UtilisateurDAO::obtenirProchainId();
						$unUser = new Utilisateur ($unID, 'root', 'acheteur');
						UtilisateurDAO::inserer($unUser);

						$unAcheteur = new Acheteur($unID, 'AcheteurD', '5149998798', 1000);
						AcheteurDAO::inserer($unAcheteur); 
						$unAcheteur = AcheteurDAO::chercher($unID);
						echo $unAcheteur?$unAcheteur:"Pas trouvé";		
					?>

				</td>
			</tr>
			<tr>
				<td>modifier</td>
				<td>
					<?php 
					$unAcheteur=AcheteurDAO::chercher($unID);
					
					$unAcheteur->setTelephone(1200);
					$unAcheteur->chargerSolde(50);
					AcheteurDAO::modifier($unAcheteur);
					
					$unAcheteur=AcheteurDAO::chercher($unID);
					echo $unAcheteur?$unAcheteur:"Pas trouvé";
					
					?>
				</td>
			</tr>
			<tr>
				<td>supprimer</td>
				<td>
					<?php 
						/*echo "<h3>On suprime un acheteur</h3>";
						AcheteurDAO::supprimer($unID);
						// Vérification
						$unAcheteur=AcheteurDAO::chercher($unID); 
						echo $unAcheteur?$unAcheteur:"Pas trouvé";*/

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

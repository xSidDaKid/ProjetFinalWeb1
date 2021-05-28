<!DOCTYPE html>
<!------------------------------------------------------------------>
<!---- Projet  : H2021                                           --->
<!---- Fichier de test unitaire pour la classe Cinema            --->
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

<body>

    <!---- Création d'un accessoire ---->
    <h1>Fichier de test pour la classe Cinema</h1>
    <?php
		// ****** INLCUSIONS *******
		// Importe l'interface DAO et la classe ZZZZDAO 
		include_once "../DAO/CinemaDAO.class.php"; 
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
						echo "<h3>On cherche le numero de Cinema 100</h3>";
						$unCinema=CinemaDAO::chercher(101);
						echo $unCinema?$unCinema:"Pas trouvé";
					?>
                </td>
            </tr>
            <tr>
                <td>chercher avec filtre</td>
                <td>
                    <?php 
						echo "<h3>On cherche tous les acheteurs ayant le nom AcheteurB</h3>";
						$tabCinema=CinemaDAO::chercherAvecFiltre("WHERE places_vendues=75"); 
						echo "<ul>";

						foreach ($tabCinema as $unCinema) {
							echo "<li>$unCinema</li>";
						}
						echo "</ul>";
					?>
                </td>
            </tr>
            <tr>
                <td>chercher par codeInfos</td>
                <td>
                    <?php 
						echo "<h3>On fait une recherche par code infos</h3>";
						$tabCinema=CinemaDAO::chercherParCodeInfos("19"); 
						echo "<ul>";

						foreach ($tabCinema as $unCinema) {
							echo "<li>$unCinema</li>";
						}
						echo "</ul>";
					?>
                </td>
            </tr>
            <tr>
                <td>chercher tous</td>
                <td>
                    <?php 
						$tableau=CinemaDAO::chercherTous();
						foreach($tableau as $unCinema) {
							echo $unCinema."<br/>";
						}
					?>
                </td>
            </tr>
            <tr>
                <td>chercherParDate</td>
                <td>
                    <?php 
						echo "<h3>On fait une recherche par date</h3>";
						$tabCinema=CinemaDAO::chercherParDate("2021-05-16"); 
						echo "<ul>";
						foreach ($tabCinema as $unCinema) {
							echo "<li>$unCinema</li>";
						}
						echo "</ul>";
						echo $unCinema?$unCinema:"Pas trouvé";
					?>
                </td>
            </tr>
            <tr>
                <td>inserer</td>
                <td>
                    <?php 
						echo "<h3>On insère un Cinema</h3>";
						
						//numero_Cinema
						$unID = CinemaDAO::obtenirProchainNumero();
						$unCodeInfo = InfosCinemaDAO::chercher(19);

						//le Cinema
						//($unNumero, $uneDate, $unPrix, $placesTotales, $placesVendues, $codeInfos)
						$unCinema = new Cinema($unID, "2021-04-05", 500, 100, 10, $unCodeInfo->getCodeInfos());
						
						CinemaDAO::inserer($unCinema); 

						$unCinema = CinemaDAO::chercher($unID);
						echo $unCinema?$unCinema:"Pas trouvé";
					?>

                </td>
            </tr>
            <tr>
                <td>modifier</td>
                <td>
                    <?php 
					echo "<h3>On modifie le cinema qu'on vient d'ajouter</h3>";
					$unCinema=CinemaDAO::chercher($unID);
					$unCinema->setPrixUnBillet(1200);
					$unCinema->setLaDate("2121-04-10");
					CinemaDAO::modifier($unCinema);
					
					$unCinema=CinemaDAO::chercher($unID);
					echo $unCinema?$unCinema:"Pas trouvé";
					
					?>
                </td>
            </tr>
            <tr>
                <td>supprimer</td>
                <td>
                    <?php 
						echo "<h3>On supprime le cinema qu'on vient d'ajouter</h3>";
						$unCinema=CinemaDAO::chercher($unID);
						CinemaDAO::supprimer($unCinema);
						// Vérification
						$unCinema=CinemaDAO::chercher($unID); 
						echo $unCinema?$unCinema:"Pas trouvé";

					?>
                </td>
            </tr>
            <tr>
                <td>obtenirProchainNumero </td>
                <td>
                    <?php 
						echo CinemaDAO::obtenirProchainNumero();
					?>
                </td>
            </tr>


        </tbody>
    </table>
    <!---- Retour au fichier d'accueil -->
    <h2><a href="../../index.php">Retour à la page d'accueil</a></h2>
</body>

</html>
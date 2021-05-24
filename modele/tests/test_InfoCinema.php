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
    <title>Tests classe InfosCinema</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../../css/tests.css">
</head>

<body>

    <!---- Création d'un accessoire ---->
    <h1>Fichier de test pour la classe InfosCinema</h1>
    <?php
		// ****** INLCUSIONS *******
		// Importe l'interface DAO et la classe ZZZZ 
		include_once "../InfosCinema.class.php"; 
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
						$unInfo = new InfosCinema(200, "Film", "img.png", "Dorval");
						echo "$unInfo";
					?>
                </td>
            </tr>
            <!-- copiez-collez cette section pour chaque groupe de méthode à tester -->
            <tr>
                <td>Accesseurs</td>
                <td>
                    <?php 
						echo $unInfo->getCodeInfos()?"Bon":"Pas bon";
						echo "<br/>";
						echo $unInfo->getTitre()?"Bon":"Pas bon";
						echo "<br/>";
						echo $unInfo->getUrlPhoto()?"Bon":"Pas bon";
						echo "<br/>";
						echo $unInfo->getVille()?"Bon":"Pas bon";
					?>
                </td>
            </tr>
            <tr>
                <td>Mutateurs</td>
                <td>
                    <?php 
						echo $unInfo->setTitre("Info Film");
						echo $unInfo->getTitre();
						echo "<br/>";
						echo $unInfo->setUrlPhoto("www");
						echo $unInfo->getUrlPhoto();
						echo "<br/>";
						echo $unInfo->setVille("Laval");
						echo $unInfo->getVille();
					?>
                </td>
            </tr>
        </tbody>
    </table>
    <!---- Retour au fichier d'accueil -->
    <h2><a href="../../index.php">Retour à la page d'accueil</a></h2>
</body>

</html>
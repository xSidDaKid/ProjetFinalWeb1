<!--
  Projet  H2021 
  Noms    : Kumaran Satkunanathan
            Louai Roueha
            Shajaan Balasingam
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Page d'acceuil du cinéma</title>
    <?php
		include(DOSSIER_BASE_INCLUDE."vues/inclusions_html/head.inc.php");
	?>
</head>

<body>
    <!-- MENU -->
    <?php
		include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/menu.inc.php");
    
	?>
    <?php
          echo "<div class='bg-success text-center'>";
          afficherSucces($controleur->getMessagesSucces());
          echo "</div>";
    ?>

    <div class="container section-1 mt-2">
        Bonjour au Centre de Billeterie!
    </div>
    <br>
    <h1 class="p-3 display-2">Voici nos films à l'affichage</h1>
    <div class=" caroussel centrer w-50">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner cycle">
                <div class="carousel-item active">
                    <img class="d-block w-100 image" src="images\photo.png" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 image" src="images\photo1.png" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 image" src="images\photo2.png" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 image" src="images\photo3.png" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <br><br><br><br>
    <!-- PIED -->
    <?php
		include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/pied.inc.php");
    
	?>
</body>

</html>
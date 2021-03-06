<!--
  Projet  H2021 
  Noms    : Kumaran Satkunanathan
            Louai Roueha
            Shajaan Balasingam
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Suppression d'un acheteur</title>
    <?php
		include(DOSSIER_BASE_INCLUDE."vues/inclusions_html/head.inc.php");
	?>
</head>

<body>
    <!-- MENU -->
    <?php
	    include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/menu.inc.php");
	?>
    <h1 class="p-3 display-2">Suppression d'un acheteur</h1>
    <br>
    <div class="centrer">
        <div class="card  ml-3 p-2">
            <?php
            echo "<div class='bg-success text-center'>";
            afficherSucces($controleur->getMessagesSucces());
            echo "</div>";
            echo "<div class='bg-danger text-center'>";
            afficherErreurs($controleur->getMessagesErreur());
            echo "</div>";
            $tabAcheteurs = $controleur->getAcheteurs();
            echo "<ul class='list-group'>";
            foreach ($tabAcheteurs as $tab) {
                echo "<li class='list-group-item'>";
                echo $tab;
                echo "</li>";
            }
            echo "</ul>";
        ?>

            <form action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=voirPageSupressionAcheteurs" method="post">
                <div class="form-group">
                    <label class="p-3" for="text">ID Acheteur</label>
                    <input type="number" name="id_acheteur" id="" class="form-control" placeholder="[#ID]"
                        aria-describedby="helpId">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <!-- PIED -->
    <?php
		include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/pied.inc.php");
    
	?>
</body>

</html>
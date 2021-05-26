<!--
  Projet  H2021 
  Noms    : Kumaran Satkunanathan
            Louai Roueha
            Shajaan Balasingam
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Projet-test</title>
    <?php
		include(DOSSIER_BASE_INCLUDE."vues/inclusions_html/head.inc.php");
	?>
</head>

<body>
    <!-- MENU -->
    <?php
	    include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/menu.inc.php");
	?>
    <h1>Voici la page de modification du compte</h1>
    <?php  
        $id = $controleur->getIdUtilisateur();
    ?>
    <div class="form-group">
        <form action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=voirPageModificationCompte" method="post">
            <label for="text"><?php echo $id;?></label>
            <label for="text">Téléphone</label>
            <input type="text" name="telephone" id="" class="form-control" placeholder="Téléphone"
                aria-describedby="helpId">

            </br>
            <label for="text"><?php echo $id;?></label>
            <label for="text">Solde</label>
            <input type="text" name="solde" id="" class="form-control" placeholder="Solde"
                aria-describedby="helpId">
                </br>
            <input type="submit" value="Modifier"/>
                
        </form>
        </br>   
    </div>

    <?php
          echo "<div class='bg-success text-center'>";
          afficherSucces($controleur->getMessagesSucces());
          echo "</div>";
          echo "<div class='bg-danger text-center'>";
          afficherErreurs($controleur->getMessagesErreur());
          echo "</div>";
    ?>
   
     <?php 
       $tabAcheteurs = $controleur->getAcheteurs();
       echo "<ul class='list-group'>";
       foreach ($tabAcheteurs as $tab) {
           echo "<li class='list-group-item'>";
           echo $tab;
           echo "</li>";
        }
        echo "</ul>";
        
    ?>
</body>

</html>

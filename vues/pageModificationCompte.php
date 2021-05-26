<!--
  Projet  H2021 
  Noms    : Kumaran Satkunanathan
            Louai Roueha
            Shajaan Balasingam
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Modification d'un compte</title>
    <?php
		include(DOSSIER_BASE_INCLUDE."vues/inclusions_html/head.inc.php");
	?>
</head>

<body>
    <!-- MENU -->
    <?php
	    include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/menu.inc.php");
	?>
    <h1 class="p-3 display-2">Modification du compte</h1>
    <?php  
        $id = $controleur->getIdUtilisateur();
    ?>
    <?php
          echo "<div class='bg-success text-center'>";
          afficherSucces($controleur->getMessagesSucces());
          echo "</div>";
          echo "<div class='bg-danger text-center'>";
          afficherErreurs($controleur->getMessagesErreur());
          echo "</div>";
    ?>

    <div class="card centrer w-25 mt-5">
        <div class="form-group">
            <label for="text">Votre ID est: [#<?php echo $id;?>]</label>
            <form action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=voirPageModificationCompte" method="post">
                <div class="form-group">
                    <label for="text">Téléphone</label>
                    <input type="text" name="telephone" id="" class="form-control" placeholder="Téléphone"
                        aria-describedby="helpId" required>
                </div>
                <div class="form-group">
                    <label for="text">Solde</label>
                    <input type="text" name="solde" id="" class="form-control" placeholder="Solde"
                        aria-describedby="helpId" required>
                </div>
                <input class="btn btn-primary" type="submit" value="Modifier" />
            </form>
        </div>
    </div>
    <br>
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
    <!-- PIED -->
    <?php
		include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/pied.inc.php");
    
	?>
</body>

</html>
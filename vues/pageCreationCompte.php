<!--
  Projet  H2021 
  Noms    : Kumaran Satkunanathan
            Louai Roueha
            Shajaan Balasingam
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Création d'un compte</title>
    <?php
		include(DOSSIER_BASE_INCLUDE."vues/inclusions_html/head.inc.php");
	?>
</head>

<body>
    <!-- MENU -->
    <?php
	    include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/menu.inc.php");
	?>
    <h1 class="p-3 display-2">Création d'un compte</h1>

    <?php
          echo "<div class='bg-success text-center'>";
          afficherSucces($controleur->getMessagesSucces());
          echo "</div>";
          echo "<div class='bg-danger text-center'>";
          afficherErreurs($controleur->getMessagesErreur());
          echo "</div>";
    ?>
    <div class="card centrer w-25 mt-5">
        <form class="mon_formulaire" action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=voirPageCreationCompte"
            method="post">
            <div class="form-group">
                <label>Nom: </label>
                <input type="text" name="nom" id="nom" required />
            </div>
            <div class="form-group">
                <label>Mot de passe : </label>
                <input type="password" name="motDePasse" id="motDePasse" required />
            </div>
            <div class="form-group">
                <label>Téléphone : </label>
                <input type="number" name="telephone" id="telephone" required />
            </div>
            <input class="btn btn-primary" type="submit" value="Créer" />
        </form>
    </div>
</body>

</html>
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
        </form>
    </div>
</body>

</html>
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
    <h1>Création d'un compte</h1>
   
    <form class="mon_formulaire" action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=voirPageCreationCompte" method="post">
						<div>
							<label>Nom: </label>
							<input type="text" name="nom" id="nom" required/>
						</div>
                        <div>
							<label>Mot de passe : </label>
							<input type="password" name="modeDePasse" id="modeDePasse" required/>
						</div>
                        <div>
							<label>Téléphone : </label>
							<input type="number" name="telephone" id="telephone" required/>
						</div>
						<input type="submit" value="Créer"/>
					</form>   

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

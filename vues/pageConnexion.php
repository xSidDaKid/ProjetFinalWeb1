<!--
  Projet  : 
  Noms    : 
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Page de connexion</title>
    <?php
		include(DOSSIER_BASE_INCLUDE."vues/inclusions_html/head.inc.php");
	?>

</head>

<body>
    <!-- MENU -->
    <?php
		include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/menu.inc.php");
	?>
    </ul>
    <!-- SE CONNECTER -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 pt-5">
                <div class="card">

                    <div class="card-header">Connexion</div>

                    <div class="card-body">
                        <form action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=seConnecter" method="post">
                            <input type="hidden" name="formulaireConnexion" value="true" />
                            <div class="form-group row">
                                <label class="pr-4">Nom d'utilisateur : </label>
                                <input class="pr-5" type="text" name="id_utilisateur" />
                            </div>
                            <div class="form-group row">
                                <label class="pr-5">Mot de passe : </label>
                                <input class="pr-5" type="text" name="mot_passe" />
                            </div>
                            <div>
                                <input class="ml-0" type="submit" value="Soumettre" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
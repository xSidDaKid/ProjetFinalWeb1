<!--
  Projet  H2021 
  Noms    : Kumaran Satkunanathan
            Louai Roueha
            Shajaan Balasingam
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Achat d'un achat</title>
    <?php
		include(DOSSIER_BASE_INCLUDE."vues/inclusions_html/head.inc.php");
	?>
</head>

<body>
    <!-- MENU -->
    <?php
	    include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/menu.inc.php");
	?>
    <h1 class="p-3 display-2">Achat d'un billet</h1>
    <br>
    <div class="centrer">
        <div class="card mt-4 p-3">

            <?php
            echo "<div class='bg-success text-center'>";
            afficherSucces($controleur->getMessagesSucces());
            echo "</div>";
            echo "<div class='bg-danger text-center'>";
            afficherErreurs($controleur->getMessagesErreur());
            echo "</div>";
        ?>

            <form action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=voirPageAchatBillet" method="post">
                <div class="form-group">
                    <label for="text">Code de la représentation/Film</label>
                    <input type="number" name="id_film" id="" class="form-control" placeholder="[#code_infos]"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="text">Nombre de billets désirés</label>
                    <input type="number" name="nb_billet" id="" class="form-control"
                        placeholder="Nombre de billets désirés" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="text">Choix du mode de paiement</label>
                    <div class="form-check">
                        <input type="checkbox" class="redio form-check-input" name="compte" id="gridRadios1" value="1"
                            checked>
                        <label class="form-check-label" for="gridRadios1">
                            Porté au compte
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="redio form-check-input" name="credit" id="gridRadios2" value="1">
                        <label class="form-check-label" for="gridRadios2">
                            Par crédit
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>
<!-- PIED -->
<?php
		include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/pied.inc.php");
    
?>

</html>
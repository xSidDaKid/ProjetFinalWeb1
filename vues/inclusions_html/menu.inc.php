<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/projet_h2021_g16/index.php?=voirPageAccueil"> Centre de Billeterie</a>
    <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <?php
					include_once (DOSSIER_BASE_INCLUDE."vues/fonctions_affichage/mes_fonctions.inc.php");
					$categorieActeur = $controleur->getCategorieUtilisateur();
                    afficherMenu($categorieActeur);
				?>
        </ul>
    </div>
</nav>
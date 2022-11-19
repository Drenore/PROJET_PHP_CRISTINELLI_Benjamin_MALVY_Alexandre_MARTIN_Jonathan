<?php
$titre = "Acceuil";
$description = "Page d'acceuil de notre site web";

// Affichage du Header (avec la navigation)
require_once './inc/header.php';
// Insertion des fonctions utiles (ici zoneUtilisateur)
require_once './inc/functions.php';

// SESSION

zoneUtilisateur();

?>
<!-- Affichage de l'acceuil -->
<main id="accueil" class="container">
    <?php
    if (isset($_GET["notif"]) && ($_GET["notif"] == "successlien")) :
    ?>
        <div class="has-text-centered">
            <span class="notification is-success">Bien joué vous avez ajoutez un nouveau lien raccourci, le voir <a href="mesLiens.php">ICI</a></span>
        </div>
    <?php endif; ?>
    <section id="post-list" class="section active has-text-centered">
        <h1 class="is-size-2" style="color: black;">Bienvenue sur <strong>Abraraccourcix</strong>,Monsieur <?= $_SESSION['user']["user_name"]; ?></h1>
        <p>Nous sommes des développeurs et ce site à pour but de nous améliorer avec l'outil <b>informatique</b> à travers la création d'un site web sous le langage <b>PHP</b> avec de l'interfacage de page</P><br>
        <h2 class="is-size-4" style="color: grey;">Raccourci ton lien !</h2><br>
        <form action="./inc/reducLink.php" method="post">
            <div class="field has-addons">
                <div class="control">
                    <input type="text" class="input is-large" name="link" placeholder="https://PoseTonLienIci.com">
                </div>
                <div class="control">
                    <button type="submit" class="button is-primary">Raccourcir</button>
                </div>
            </div>
        </form>
        <form action="./inc/reducFile.php" method="post" class="pt-5" enctype="multipart/form-data">
            <div class="field has-addons">
                <div class="control">
                    <input type="file" class="input is-large" name="file">
                </div>
                <div class="control">
                    <button type="submit" class="button is-primary">Télécharger</button>
                </div>
            </div>
        </form>

    </section>
</main>

<?php include_once './inc/footer.php'; ?>
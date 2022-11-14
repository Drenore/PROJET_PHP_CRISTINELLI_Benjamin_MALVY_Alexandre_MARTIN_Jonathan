<?php 
    $titre = "Acceuil";
    $description = "Page d'acceuil de notre site web";

    // Affichage du Header (avec la navigation)
    require_once './inc/header.php';
    // Insertion des fonctions utiles (ici zoneUtilisateur)
    require_once './inc/functions.php';

    // SESSION
    session_start(); 
    zoneUtilisateur();
?>
<!-- Affichage de l'acceuil -->
<section id="post-list" class="section active">
    <h1 class="is-size-2" style="color: black;">Bienvenue sur notre site de raccourcisseurs de liens</h1>
    <p>Nous sommes des développeurs et ce site à pour but de nous améliorer avec l'outil <b>informatique</b> à travers la création d'un site web sous le langage <b>PHP</b> avec de l'interfacage de page</P><br>
    <h2 class="is-size-4" style="color: grey;">Raccourci ton lien !</h2><br>
</section>  
<?php include_once './inc/footer.php'; ?>
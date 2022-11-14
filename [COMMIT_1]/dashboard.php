<!-- Affichage du Header en haut de page -->
<?php
    $titre = "[DASHBOARD]";
    $description = "Page de paramètrage de mon site web";

    // Affichage du Header (avec la navigation)
    require_once './inc/header.php';
    // Insertion des fonctions utiles (ici zoneUtilisateur)
    require_once './inc/functions.php';

    // SESSION
    session_start(); 
    zoneUtilisateur();
?>

<!-- Affichage du dashboard -->
<section id="post-list" class="section active">
    <h1 class="is-size-2" style="color: black;">Bienvenue sur le <strong>DashBoard</strong> du site</h1>
    <h3 class="is-size-4" style="color: black;">Connecté en tant que <?= $_SESSION['identifiant'] ?></h3>
    <p>Statitique du site web :</p><br>
    <div>
        <p> Aucune actuellement</p>
    </div>
</section> 

<!-- Affichage du Footer en bas de page -->
<?php include_once './inc/footer.php'; ?>
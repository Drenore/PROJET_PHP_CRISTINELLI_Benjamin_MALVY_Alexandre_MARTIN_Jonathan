<!-- Affichage du Header en haut de page -->
<?php
    $titre = "Liste de tes recherches de liens";
    $description = "Cette page permet de voir tous les liens que tu as recherchés stockés dans la base de données local";

    // Affichage du Header (avec la navigation)
    require_once './inc/header.php';
    // Insertion des fonctions utiles (ici zoneUtilisateur)
    require_once './inc/functions.php';

    session_start(); // SESSION

    $user = $_SESSION['identifiant'];

    // Faire en sorte que lorsque l'on clique sur le lien ici aussi on rajoute un clic
    
    // On affiche les liens de l'utilisateur
    $liens = affichageLiensUser($user);

    // Requête SQL :
    // SELECT lien_initial, lien raccourci, nombre_clic, type_de_lien, données_lien, état, id_suer FROM lien_raccourci;
    // UPDATE lien_raccourci SET nombre_clic = nombre_clic + 1 WHERE id = $id_clicé;
?>

<!-- Affichage du Suppression de lien -->
<section class="section active">
    <h1 class="is-size-2"><strong>Viusalisation de tes liens déjà recherchés et le nombre de clics</strong></h1>
    <form method="POST">
        <p>
            <?php foreach ($liens as $lien) {
                //echo("<p>Lien $lien['id'] : $lien['lien_initial'] -> <a href=`$lien['lien raccourci']`>$lien['lien raccourci']</a>, Type : $lien['type_de_lien']</p>".
                //"<p>Créer par $lien['id_user'], cliqué $lien['nombre_clic'] fois</p><br>");
            }  
            ?>
        </p>
    </form>
</section>

<!-- Affichage du Footer en bas de page -->
<?php require_once './inc/footer.php'; ?>
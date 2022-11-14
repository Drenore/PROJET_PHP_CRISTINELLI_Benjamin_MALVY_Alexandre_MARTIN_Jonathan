<!-- Affichage du Header en haut de page -->
<?php
    $titre = "Suppression d'un lien";
    $description = "Cette page permet de Supprimer un lien dans la base de données local si tu l'as écris";

    // Affichage du Header (avec la navigation)
    require_once './inc/header.php';
    // Insertion des fonctions utiles (ici zoneUtilisateur)
    require_once './inc/functions.php';

    session_start();

    // On recupère la session de l'utilisateur pour savoir si c'est le créateur du lien
    $user_id = $_SESSION['utilisateur'];
    
    // Affichage du lien sur lequel on à cliquer ($id permet de l'identifier)
    $lien = affichageLien($id);

    $reference = filter_input(INPUT_GET, "reference");
    $method = filter_input(INPUT_SERVER, "REQUEST_METHOD"); // $_SERVER["REQUEST_METHOD"]

    if($method == "POST" && $user_id == $_SESSION['identifiant']) {

        // Suppresion du produit via la fonction
        suppressionLiens($id);

        header('Location: index.php');
    }
    else {
        echo("Tu n'as pas les droits de suppresion de ce lien !");
    }
?>

<!-- Affichage du Suppression de lien -->
<section class="section active">
    <h1 class="is-size-2"><strong>Affichage du lien</strong></h1>
    <i>Pour visualiser un lien, il faut être <b>connecté à la base de données</b></i><br>
    <?= $lien; ?>
    <br>
    <h1 class="is-size-2"><strong>Suppression du lien</strong></h1>
    <i>Pour supprimer un lien, il faut être <b>le créateur</b> de ce lien</i><br>
    <form method="POST">
        <p>
            <strong>Es-tu sûr de vouloir supprimer ce lien ?</strong>
        </p>
        <br>
        <input type="submit" value="Supprimer" class="button is-primary"/>
    </form>
</section>

<!-- Affichage du Footer en bas de page -->
<?php require_once './inc/footer.php'; ?>
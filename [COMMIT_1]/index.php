<!-- Affichage du Header en haut de page -->
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

    $method = filter_input(INPUT_SERVER, "REQUEST_METHOD"); // $_SERVER["REQUEST_METHOD"]

    if($method == "POST") {
        $id; // Il s'auto-incrémente dans la base de données !
        $lien_initial = filter_input(INPUT_GET, "lien_initial");
        $lien_raccourci = "a";
        $nombre_clic = 1;
        $type_de_lien = "type";
        $données_liens = "data";
        $état = "ON";
        $id_user = $_SESSION['identifiant'];

        creationLiens($id, $lien_initial, $lien_raccourci, $nombre_clic, $type_de_lien, $données_liens, $état, $id_user);
    }
    
    // Requête SQL :
    // INSERT INTO lien_raccourci (id, lien_initial, lien_raccourci, type_de_lien, données_liens, état) VALUES ($id, $lien_initial, $lien_raccourci, $type_de_lien, $données_liens, $état, $id_user)
    // UPDATE u.role FROM user AS u WHERE id = $id
?>

<!-- Affichage de l'acceuil -->
<section id="post-list" class="section active">
    <h1 class="is-size-2" style="color: black;">Bienvenue sur notre site de raccourcisseurs de liens</h1>
    <p>Nous sommes des développeurs et ce site à pour but de nous améliorer avec l'outil <b>informatique</b> à travers la création d'un site web sous le langage <b>PHP</b> avec de l'interfacage de page</P><br>
    <h2 class="is-size-4" style="color: grey;">Raccourci ton lien !</h2><br>
    <section class="is active">
        <form method="POST">
            <div class="control">
                <input class="input is-link" type="text" placeholder="Insère ton grand lien !" />
                <button class="button is-link is-centred">Raccourcir</button>
            </div>
        </form>
    <section class="section active">
</section> 

<!-- Affichage de du Footer -->
<?php include_once './inc/footer.php'; ?>
<?php
    $titre = "Suppression d'un lien";
    $description = "Cette page permet de Supprimer un lien dans la base de données local";

    require_once './inc/header.php';
    require_once './inc/functions.php';
    $reference = filter_input(INPUT_GET, "reference");
    $method = filter_input(INPUT_SERVER, "REQUEST_METHOD"); // $_SERVER["REQUEST_METHOD"]

    if($method == "POST") {
        // Recherche de la référence du produit
        BDD("DELETE FROM table WHERE reference = $reference");

        header('Location: index.php');
    }
?>

<section class="section active">
    <h1 class="is-size-2"><strong>Suppression de liens</strong></h1>
    <form method="POST">
        <p><strong>Es-tu sûr de vouloir supprimer ce lien ?</strong></p>
        <br>
        <input type="submit" value="Supprimer" class="button is-primary"/>
    </form>
</section>
<?php require_once './inc/footer.php'; ?>
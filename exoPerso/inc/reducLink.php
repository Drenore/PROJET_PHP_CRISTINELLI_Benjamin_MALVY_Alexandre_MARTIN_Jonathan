<?php

require "functions.php";
function minimizeLink()
{
    require "connexionBdd.php";

    session_start();

    // On récupère les values, on génère un random bytes aléatoire pour raccourcir l'url

    $getUser = intval($_SESSION["user"]["id"]);
    $getLink = filter_input(INPUT_POST, "link");
    $reducLink = bin2hex(random_bytes(5));

    // On explode le link pour trouver si c'est bien un http 

    $tabVerify = explode('/', $getLink);

    // On vérifie l'entête de lien

    if (($tabVerify[0] === "http:") || ($tabVerify[0] === "https:")) {

        // On définit le type de link 
        $typeLink = "url";
        // On prépare la requête 
        $sql = "INSERT INTO lien_raccourci(lien_initial, lien_raccourci, type_de_lien, id_user)
        VALUES(:lienInitial, :lienRaccourci, :typeDeLien, :idUser)";
        $addUrl = $bdd->prepare($sql);
        // On add l'url 
        $addUrl->execute([":lienInitial" => $getLink, ":lienRaccourci" => $reducLink, ":typeDeLien" => $typeLink, ":idUser" => $getUser]);
        // On retourne sur la page d'accueil avec une notif de succès 
        header("Location: ../index.php?notif=successlien");
    }
}
?>











?>
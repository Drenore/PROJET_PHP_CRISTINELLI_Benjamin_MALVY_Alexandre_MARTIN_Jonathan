<?php

function BDD($commande)
{
    /* Pour me connecter au moteur de base de données, j'ai besoin de :
    Qui :
     * - Nom d'utilisateur
     * - Mot de passe
    Où :
     * - IP/Hôte
     * - Port (par défaut pour MySQL/MariaDB c'est 3306)
    Quoi : 
     * - Type de la base de données (mysql)
     * - Facultatif : nom de la base de données (livecampus)
     */
    // DSN : Data Source Name
    //$pdo = new PDO("mysql:host=localhost:3306;dbname=livecampus", "root", "");
    $moteur = "mysql";
    $hote = "localhost";
    $port = 3306;
    $bdd = ""; // TODO à définir
    $utilisateur = "root";
    $motdepasse = "";

    $pdo = new PDO("$moteur:host=$hote:$port;dbname=$bdd", $utilisateur, $motdepasse, [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);

    $requete = $pdo->prepare($commande);
    $requete->execute();
    $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

    return $resultat;

    // $racine = cheminRacine();
    // $produits = json_decode(file_get_contents($racine . 'produits.json'), true);
    // return $produits;
}
/**
 * Fonction permettant la verification de la session
 */
function zoneUtilisateur()
{
    // 'pseudo' est un peu notre "jeton" (token) de vérification.
    // Si l'utilisateur est connecté, pseudo sera défini.
    if (!isset($_SESSION['user'])) {
        header('Location: connexion.php');
        exit();
    }
}

/**
 * Ajoute un utilisateur dans la base de données en hash de mdp et en vérifiant des infos
 * $identifiant = le pseudo
 * $email = le mail 
 * $otdepasse
 */
function addNewUser()
{
    // On inclut la connexion à la bdd 
    include "connexionBdd.php";

    // On récupère les infos et on hash le mot de passe directement
    $identifiant = filter_input(INPUT_POST, "identifiant");
    $email = filter_input(INPUT_POST, "email");
    $motdepasse = password_hash(filter_input(INPUT_POST, "password"), PASSWORD_BCRYPT);

    //On récupère les lignes ou l'email peut éxister 

    $checkEmail = $bdd->prepare("SELECT * FROM utilisateur WHERE user_email = :email");

    // On fait la même chose avec le pseudo 

    $checkPseudo = $bdd->prepare("SELECT user_name FROM utilisateur WHERE user_name = :nom");
    $checkEmail->execute([":email" => $email]);
    $checkPseudo->execute([":nom" => $identifiant]);
    $trueEmail = $checkEmail->fetch();
    $truePseudo = $checkPseudo->fetch();

    //on vérifie si l'email éxiste 

    if ($trueEmail === false) {

        // Puis si elle n'éxiste pas on vérifie si l'identifiant éxiste 

        if ($truePseudo["user_name"] == $identifiant) {

            // Si c'est le cas on redirige avec une érreur précise 

            header("Location:../inscription.php?error=id");
            exit();
        }
            // Sinon on ajoute l'utilisateur dans la bdd

        $addUser = $bdd->prepare("INSERT INTO utilisateur (user_name, user_email, user_password)VALUES(:nom, :email, :motdepasse)");
        $addUser->execute([":nom" => $identifiant, ":email" => $email, ":motdepasse" => $motdepasse]);
        header("Location:../connexion.php");
    }  else {

        // et si l'adresse mail éxiste déjà on le redirige avec une erreur différent du pseudo

        header("Location:../inscription.php?error=err");
    }
}

/**
 * Fonction pour la connexion d'un utilisateur, vérification du mdp mise en route de la    session
 */

function connexionUser(){
    
    require "connexionBdd.php";
    
    // Récupération des informations de l'utilisateur 

    $identifiant = filter_input(INPUT_POST, "identifiant"); 
    $motdepasse = filter_input(INPUT_POST, "motdepasse"); 

    //Requête pour vérifier si le pseudo éxiste bien en BDD
    $verifMail = $bdd->prepare("SELECT * FROM utilisateur WHERE user_name = :identifiant");
    $verifMail->execute([":identifiant" => $identifiant]);
    $checkUser = $verifMail->fetch();

    // Si l'utilisateur éxiste alors 
    if($checkUser){
        // on vérifie si avec password_verify le mot de passe

        if (password_verify($motdepasse, $checkUser["user_password"]))
        {
            // Si tout est bon on démarre la session, et on créer une variable de session avec un rôle précis

            session_start();
            $_SESSION["user"] = $checkUser;

         
            // On rédirige vers la page d'accueil

            header("Location: ../index.php");
        }else{

            // Si le password est incorecte on redirige vers la page de connexion avec une erreur

            header("Location: ../connexion.php?error=err");
        }
    }else{
              // Si le pseudo est incorecte on redirige vers la page de connexion avec une erreur
        header("Location: ../connexion.php?error=err");
    }
    }

    /**
     * Fonction pour récupérer les liens de l'utilisateur concerné
     */
    function getLinks($id){

        require "connexionBdd.php";
        $getLinks = $bdd->prepare("SELECT * FROM lien_raccourci WHERE id_user = :id");
        $getLinks->execute([":id" => $id]);
        return $resultat = $getLinks->fetchAll();
        
    }

    /**
     * 
     * Fonction pour redirigez et incrémenter le nombre de clic sur un url 
     * 
     */

    function redirectToUrl(){
        require "connexionBdd.php";
    
        // Recupère le lien dans l'url
        $url = $_GET["lien"];
        // on écrit la requête SQL 
        $sql = "SELECT * FROM lien_raccourci WHERE lien_raccourci = :lien";
        // On la prépare puis l'éxecute 
        $lien = $bdd->prepare($sql);
        $lien ->execute([":lien" => $url]);
    
        // On créer un tableau avec le résultat
        $resultat = $lien->fetch();
        // Si le resultat est présent 
        if($resultat){
    
            // on incrémente de 1 le nombre de clic 
    
            $nbClic = $resultat["nombre_clic"];
    
            $nbClic++;
            // On update la ligne 
            $sql = "UPDATE lien_raccourci SET nombre_clic = :clic WHERE id = :id";
            $updateLien = $bdd->prepare($sql);
            $updateLien->execute([":clic" => $nbClic, ":id" => $resultat["id"]]);
     
            header("Location:" .$resultat['lien_initial']. "");
    
        }else{
    
            header("Location:index.php?notif=errorLink");
    
        }
      
    
    }

    /**
     * Function delete link
     */

    function deleteLink(){

        require "connexionBdd.php";
        // Ici on va supprimer le lien à la demande de l'utilisateur
        
        session_start();
        
        // On récupère l'id de l'user qui effectue la suppression
        
        $getUser = $_SESSION["user"]["id"];
        
        // récupération de l'id passer en get 
        
        $linkID = $_GET["id"];
        
        // On créer la requête de suppression 
        
        $sql = "DELETE FROM lien_raccourci WHERE id = :id AND id_user = :idUser";
        
        $deleteLink = $bdd->prepare($sql);
        $deleteLink->execute([":id" => $linkID, ":idUser" => $getUser]);
        
        header("Location: ./../mesliens.php?notif=success");
        
        
        }
        
    function disabledLink(){

        require "connexionBdd.php";
        // Ici on va supprimer le lien à la demande de l'utilisateur
        
        session_start();
        
        // On récupère l'id de l'user qui effectue la suppression
        
        $getUser = $_SESSION["user"]["id"];
        
        // récupération de l'id passer en get 
        
        $linkID = $_GET["id"];

        // récupératio état 

        $state = $_GET["etat"];

        //Créer la requête 

        $sql = "UPDATE lien_raccourci SET etat = :newState WHERE id = :id AND id_user = :idUser";

        // On la prépare

        $updateState = $bdd->prepare($sql);

        // On change l'état 

        if ( $state === "1"){

            $newState = 0; 

        }else{

            $newState = 1; 
        }
        // on execute la requête
        $updateState->execute([":newState" => $newState, ":id" => $linkID, ":idUser" => $getUser]);
        header("Location: ./../mesliens.php?notif=successVisibility");
        
        }
        



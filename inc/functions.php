<?php

function BDD($commande) {
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
    $motdepasse = "root";

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
function zoneUtilisateur() {
    // 'pseudo' est un peu notre "jeton" (token) de vérification.
    // Si l'utilisateur est connecté, pseudo sera défini.
    if(!isset($_SESSION['identifiant'])) { 
        header('Location: connexion.php');
        exit();
    }
}

 
/**
 * Fonction liée à la page contact
 */
function contact() {
    
    // Faire des trucs avec les données

}
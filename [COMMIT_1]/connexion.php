<!-- Affichage du Header en haut de page -->
<?php
  $titre = "Connexion";
  $description = "Page de connexion du site web";

  // Insertion des fonctions utiles (ici connexionUtilisateur)
  require_once './inc/functions.php';

  session_start(); // On démarre la session

  $utilisateurs = [
      // Pseudo / mot de passe haché
      // https://www.php.net/password_hash
      "JMARTI" => 'motdepasse',
      "AMALV" => 'motdepasse',
      "BCRIS" => 'motdepasse'
  ];
  //password_hash($motdepasse, $utilisateurs[$identifiant]); // TODO à adapter
  //password_verify($motdepasse, $utilisateurs[$identifiant]); // TODO à adapter

  // Récupération des données grâce à la méthode POST
  $identifiant = filter_input(INPUT_POST, "identifiant");
  $motdepasse = filter_input(INPUT_POST, "motdepasse");

  // Si l'utilisateur à déjà une session on le redirige vers la page de déconnexion
  if (isset($_SESSION["identifiant"])) 
  {
    header('Location : deconnexion.php');
  }
  else 
  {
    // Variables pour l'affichage sur la page
    $statut = "";
    $classeCss = "";
    
    // Autre solution mise en place
    $resultat = connexionUtilisateur($identifiant, $motdepasse);
    if ($resultat == true)
    {
      $_SESSION["identifiant"] = $identifiant;
      header('Location: index.php');
      exit();
    }
    else 
    {
      $statut = "Votre identifiant et mot de passe sont nécessaire pour la connexion";
      $classeCss = "erreur";
    }


    // Vérification des données
    // Verification de mot de passe incassable : password_verify($motdepasse, $utilisateurs[$pseudo]
    // Si le mot de passe est "admin" on va sur le dashboard (priorité car le prochain if concerne tout le monde)
    if(isset($utilisateurs[$identifiant]) && $motdepasse = "admin") {
      $_SESSION["identifiant"] = $identifiant;
      header('Location: dashboard.php');
      exit();
    }
    // Si l'identifiant est valide dans le tableau $utilisateurs
    else if(isset($utilisateurs[$identifiant])) {
      $_SESSION["identifiant"] = $identifiant;
      header('Location: index.php');
      exit();
    } 
    // Si les informations ne sont pas completé
    else if($identifiant == NULL && $motdepasse == NULL) {
      $statut = "Votre identifiant et mot de passe sont nécessaire pour la connexion";
      $classeCss = "erreur";
    }
    else if(!isset($utilisateurs[$identifiant])) {
      $statut = "Votre identifiant ou mot de passe est incorrect";
      $classeCss = "erreur";
    } 
    // Sinon, on ne fait rien (la personne vient d'arriver sur la page)

    // Variables pour l'affichage sur la page
    $statut = "";
    $classeCss = "";

    // if(isset($_SESSION['admin']) && $_SESSION['admin'] === true): 
  }
?>

<!-- Pas d'insertion du header pour ne pas avoir accès à la naviagation ! -->
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titre ?></title>
    <meta name="description" value="<?= $description ?>" />

    <!-- [CDN] Fontawesome : https://fontawesome.com -->
    <script src="https://kit.fontawesome.com/421e740d1a.js" crossorigin="anonymous"></script>

    <!-- [CDN] Bulma : https://bulma.io -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

    <!-- [CSS] Ajout du code CSS après tous les CSS CDN (permet d'ecraser pour prendre la priorité sur les changements)-->
    <link rel="stylesheet" href="./css/main.css">
  </head>
  <body>
    <header>
        <nav class="navbar has-background-primary" role="navigation" aria-label="main navigation">
          <div class="navbar-brand">
            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
            </a>
          </div>
          <!-- Affichage de la barre de navigation -->
          <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
            </div>
          </div>
          <div class="navbar-end">
            <div class="navbar-menu">
              <div class="buttons">
                <a class="navbar-item button is-primary" href="./inscription.php"><strong>S'inscrire</strong></a>
                <a class="navbar-item button is-light" href="./connexion.php">Se connecter</a>
              </div>
            </div>
          </div>
        </nav>
    </header>
    <main>
      <?php if($statut): ?>
        <!-- Classe CSS pour le paragraphe (erreur ou succès) -->
        <p class="<?= $classeCss ?>">
            <!-- Statut -->
            <?= $statut ?>
        </p>
      <?php endif; ?>
      <style>
            p.erreur {
                border: 1px solid transparent;
                border-radius: 5px;
                padding: .5rem;
                border-color: red;
                background: #FAA;
            }
      </style>
      <!-- Affichage de la page de connexion -->
      <section id="connexion" class="section active">
        <form method="POST">
          <label for="identifiant">Entre ton identifiant :</label>
          <div class="field">
            <p class="control has-icons-left has-icons-right">
              <input name="identifiant" id="identifiant" class="input" type="text" placeholder="Insère ton identifiant">
              <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
              </span>
              <span class="icon is-small is-right">
                <i class="fas fa-check"></i>
              </span>
            </p>
          </div>
          <label for="motdepasse">Entre ton mot de passe :</label>
          <div class="field">
            <p class="control has-icons-left">
              <input name="motdepasse" id="motdepasse" class="input" type="password" placeholder="Insère ton mot de passe">
              <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
              </span>
            </p>
          </div>
          <div class="field">
            <p class="control">
              <input type="submit" id="is-success" value="Connexion" class="button is-success">
            </p>
          </div>
        </form>
        <div class="connection">
          <h2 class="title is-size-4">Pas encore inscrit ?</h2>
          <a class="navbar-item button is-light" href="./inscription.php">Inscription</a>
        </div>
      </section>
<!-- Affichage du Footer en bas de page -->
<?php include_once './inc/footer.php'; ?>
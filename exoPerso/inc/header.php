<?php
session_start();

$titre = "Inscription";
$description = "Page d'inscription de notre site web";
?>
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
    <nav class="navbar is-link" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <a class="navbar-item" href="https://bulma.io">
          <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>

      <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
          <a class="navbar-item" href="index.php">
            Accueil
          </a>

          <a class="navbar-item" href="mesLiens.php">
           Mes liens
          </a>
        </div>

        <div class="navbar-end">
          <div class="navbar-item">
            <div class="buttons">
              <?php if (!isset($_SESSION["user"])) { ?>
                <a class="button is-primary" href="inscription.php">
                  <strong>S'inscrire</strong>
                </a>
                <a class="button is-light" href="connexion.php">
                  Se connecter
                </a>
              <?php }else { ?>
                <a class="button is-danger" href="./inc/deconnexion.php">
                  <strong>Déconnexion</strong>
                </a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>
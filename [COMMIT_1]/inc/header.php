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
        <!-- Affichage de la barre de navigation -->
        <nav class="navbar has-background-primary" role="navigation" aria-label="main navigation">
          <div class="navbar-brand">
            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
            </a>
          </div>
          <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
              <a class="navbar-item active" href="./index.php">Acceuil</a>
              <a class="navbar-item" href="./voir-lien-db.php">Liste des liens</a>
              <a class="navbar-item" href="./contact.php">Contacts</a>
              <a class="navbar-item" href="./about.php">A propos</a>
              <a class="navbar-item" href="./report.php">Problèmes</a>
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
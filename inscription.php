<?php
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
        <section id="inscription" class="section active">
            <form action="#" method="post" class="add-user-form">
                <div class="field">
                    <p class="control has-icons-left has-icons-right">
                    <input class="input" name="identifiant" type="identifiant" placeholder="Insère ton identifiant de dresseur">
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                    <span class="icon is-small is-right">
                        <i class="fas fa-check"></i>
                    </span>
                    </p>
                </div>
                <div class="field">
                    <p class="control has-icons-left has-icons-right">
                    <input class="input" name="email" type="email" placeholder="Insère ton Email">
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <span class="icon is-small is-right">
                        <i class="fas fa-check"></i>
                    </span>
                    </p>
                </div>
                <div class="field">
                    <p class="control has-icons-left">
                    <input class="input" name="password" type="password" placeholder="Insère ton mot de passe">
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                    </p>
                </div>
                <div class="field">
                    <p class="control">
                    <button type="submit" class="button is-success">
                        Inscription
                    </button>
                    </p>
                </div>
                <div class="connection">
                    <h2 class="title is-size-4">Déjà inscrit ?</h2>
                    <a class="navbar-item button is-light" href="./connexion.php">Connexion</a>
                </div>
            </form>
        </section>
    </main>
<?php include_once './inc/footer.php'; ?>
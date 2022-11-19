<?php
$titre = "Connexion";
$description = "Page de connexion du site web";
require_once "./inc/header.php";
?>
<!-- Affichage de la page de connexion -->
<main class="container has-text-centered" id="connexion">
  <section>
    <h1 class="title is-size-1 swing-in-top-fwd">Se connecter</h1>
    <form method="POST" action="./inc/connexion.php">
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
    <div class="connection pt-5">
        <h2 class="title is-size-4">Pas encore inscrit ?</h2>
        <a class="button is-light" href="./inscription.php">Inscription</a>
      </div>
  </section>
</main>
<?php include_once './inc/footer.php'; ?>
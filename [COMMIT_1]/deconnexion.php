<!-- Affichage du Header en haut de page -->
<?php
  $titre = "Deconnexion";
  $description = "Page de déconnexion du site web";

  // Affichage du Header (avec la navigation)
  require_once './inc/header.php';

  // Récupération des données
  $method = filter_input(INPUT_SERVER, "REQUEST_METHOD"); // $_SERVER["REQUEST_METHOD"]

  // Variables pour l'affichage sur la page
  $statut = "";
  $classeCss = "";

  if ($method == "GET") {
    $classeCss = "succes";
    session_destroy();
    header('Location: connexion.php');
    exit();
  }
  // Sinon, on ne fait rien (la personne vient d'arriver sur la page)
?>

<!-- Affichage de la page de déconnexion -->
<section id="connexion" class="section active">
  <form method="GET">
    <p>Vous êtes déjà connecté en tant que <?php $_SESSION["identifiant"] ?></p><br>
    <p>Souhaitez-vous vous <b>déconnecter</b> ?</p>
    <div class="field">
      <p class="control">
        <input type="submit" id="is-success" value="Déconnexion" class="button is-success">
      </p>
    </div>
  </form>
</section>

<!-- Affichage du Footer en bas de page -->
<?php include_once './inc/footer.php'; ?>
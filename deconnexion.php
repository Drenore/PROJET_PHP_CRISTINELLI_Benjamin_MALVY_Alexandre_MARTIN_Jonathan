<?php
  $titre = "Deconnexion";
  $description = "Page de déconnexion du site web";
  require_once "./header.php";
  // Récupération des données
  $validation = filter_input(INPUT_SERVER, "REQUEST_METHOD"); // $_SERVER["REQUEST_METHOD"]

  // Variables pour l'affichage sur la page
  $statut = "";
  $classeCss = "";

  if ($validation == "GET") {
    $statut = "Votre identifiant ou mot de passe est incorrect";
    $classeCss = "succes";
    session_destroy();
    header('Location: connexion.php');
    exit();
  }
  // Sinon, on ne fait rien (la personne vient d'arriver sur la page)

  if($statut): ?>
  <!-- Classe CSS pour le paragraphe (erreur ou succès) -->
  <p class="<?= $classeCss ?>">
      <!-- Statut -->
      <?= $statut ?>
  </p>
  <?php endif; 
?>
  <style>
    p.succes {
      border: 1px solid transparent;
      border-radius: 5px;
      padding: .5rem;
      border-color: green;
      background: #AFA;
    }
  </style>
    <!-- Affichage de la page de connexion -->
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
<?php include_once './inc/footer.php'; ?>
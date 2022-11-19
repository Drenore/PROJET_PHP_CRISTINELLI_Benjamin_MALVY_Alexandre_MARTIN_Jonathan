<?php require_once './inc/header.php'; ?>
    <main>
      <?php if(isset($_GET["error"])){
        if($_GET["error"] == "err"): ?>

          <span class="notification is-danger">L'email que vous voulez utilisez à déjà un compte chez nous</span>
          <?php else: ?>
            <span class="notification is-danger">L'identifiant que vous voulez utilisez à déjà été utilisé</span>
      <?php endif;
      }?>
      <main class="container has-text-centered" id="inscription" >
       
        <section class="section active ">
        <h1 class="title is-size-1 swing-in-top-fwd">S'inscrire</h1>
            <form action="./inc/inscription.php" method="post" class="is-two-thirds">
                <div class="field">
                    <p class="control has-icons-left has-icons-right">
                    <input type="text"  class="input" name="identifiant" placeholder="Insère ton identifiant de dresseur">
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
                <div class="connection has-text-centered">
                    <h2 class="title is-size-4">Déjà inscrit ?</h2>
                    <a class=" button is-danger" href="./connexion.php">Connexion</a>
                </div>
            </form>
        </section>
    </main>
<?php include_once './inc/footer.php'; ?>
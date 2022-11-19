<?php 
    $nom = filter_input(INPUT_POST, "nom");
    $message = filter_input(INPUT_POST, "message");

    $titre = "Contacts";
    $description = "Contacts des créateurs du site web";
    require_once './inc/header.php'; 
?>
<!-- Affichage de la page de contact -->
<section id="contact" class="section active">
    <b>Contacts des créateurs</b>
    <p><b><a href="">CRISTINELLI Benjamin</a></b></p><br>
    <p><b><a href="">MALVY Alexandre</a></b></p><br>
    <p><b><a href="https://www.linkedin.com/in/jonathan-martin-42800/">MARTIN Jonathan</a></b></p><br>
    <p>Pays d'hebergement : France</p>
    <br><br>
    <h1 class="is-size-4">Contactez-nous !</h1>
    <form method="POST">
        <label for="nom">Nom de l'utilisateur</label><br>
        <input type="text" name="nom" id="nom" /><br>
        
        <label for="message">Message à envoyer</label><br>
        <textarea name="message" id="message"></textarea><br>

        <p class="control">
            <a type="submit" value="Envoyer" class="button is-primary">
                Envoyer
            </a>
            <a type="cancel" value="Annuler" class="button is-light">
                Annuler
            </a>
        </p>
    </form>
    </section>
<?php include_once './inc/footer.php'; ?>
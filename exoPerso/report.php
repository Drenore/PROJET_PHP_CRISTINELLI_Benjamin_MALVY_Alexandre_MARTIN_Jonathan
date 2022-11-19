<?php 
    $titre = "Problèmes";
    $description = "Envoi des problèmes sur le site web";
    require_once './inc/header.php'; 
?>
<!-- Affichage de la page de Probleme -->
<section id="report" class="section active">
    <b>Problème sur le site Web ?</b><br>
    <strong style="color: red;"> Si le problème est : </strong><br>
    <i>- Les fautes de français, nous nous en excusons !</i><br>
    <i>- Vient des erreurs, c'est que nous n'avons pas réussi à les corriger</i><br>
    <i>- Si il te reste encore un problème, il y aura un problème car cette page ne sert à rien !</i><br>
    <div class="control">
        <input class="input" type="text" placeholder="Décrit le problème">
    </div>
    <div class="field is-grouped is-grouped-centered">
        <p class="control">
        <a id="send" class="button is-primary">
            Envoyer
        </a>
        </p>
        <p class="control">
        <a class="button is-light">
            Annuler
        </a>
        </p>
    </div>    
</section>
<?php include_once './inc/footer.php'; ?>
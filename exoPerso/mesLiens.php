<?php
require_once "./inc/header.php";
require_once "./inc/functions.php";

zoneUtilisateur();

$liens = getLinks($_SESSION["user"]["id"]);
$titre = "Mes liens";
$description = "Voir mes liens raccourcis";
?>
<main id="mesLiens">


    <section class="container has-text-centered">
        <?php
        if (isset($_GET["notif"]) && ($_GET["notif"] == "success")) {
        ?>
            <div class="has-text-centered pt-5">
                <span class="notification is-success">Votre lien à bien été supprimé </span>
            </div>
        <?php } elseif (isset($_GET["notif"]) && ($_GET["notif"] == "disabled")) { ?>
            <span class="notification is-success">Votre lien à bien été désactivé pour les autres utilisateurs </span></div>
        <?php } ?>
        <h1 class="title is-size-1 pt-5">Mes liens</h1>
        <?php if (count($liens) === 0) {
        ?>
            <h1 class="title is-size-1">Oups ! Nous n'avons trouver encore aucun lien que vous avez raccourci</h1>
            <a href="index.php">Cliquez-ici pour aller raccourcir un lien</a>
        <?php } else { ?>
            <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                <thead>
                    <th class="has-text-centered">Lien raccourci</th>
                    <th class="has-text-centered">Nombre de fois visité</th>
                    <th class="has-text-centered">Type de lien</th>
                    <th class="has-text-centered">Etat</th>
                    <th class="has-text-centered">Actions</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($liens as $value => $item) :
                    ?>
                        <tr>
                            <!-- <td><?= $item["lien_initial"] ?></td> --><td><a href="/inc/goToLink.php?lien=<?= $item["lien_raccourci"] ?>"> http://tplivecampusphp/goToLink?id=<?= $item["lien_raccourci"] ?></a></td>
                            <td><?= $item["nombre_clic"] ?></td>
                            <td><?= $item["type_de_lien"] ?></td>
                            <td><?php if ($item["etat"] === "1") {
                                    echo "Visible";
                                } else {
                                    echo "Désactivé";
                                } ?></td>
                            <td>
                                <a href="./inc/supprimerLien.php?id=<?= $item["id"] ?>" class="button is-danger">Supprimer</a>
                                <?php if ($item["etat"] === "1") { ?>
                                    <a href="./inc/cacherLien.php?id=<?= $item["id"] ?>&etat=<?= $item["etat"]; ?>" class="button is-info">Ne plus afficher</a>
                                <?php } else {
                                ?>
                                    <a href="./inc/cacherLien.php?id=<?= $item["id"] ?>&etat=<?= $item["etat"]; ?>" class="button is-info">Afficher</a>
                                <?php } ?>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php } ?>

    </section>
</main>
<?php
include_once "./inc/footer.php";
?>
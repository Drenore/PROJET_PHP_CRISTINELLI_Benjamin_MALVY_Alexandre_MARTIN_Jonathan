<!-- Connexion à la base de données -->
<?php
    try{
        $bdd = new PDO("mysql:host=localhost;dbname=jquerytest;charset=UTF8","root","root");
    }
    catch(PDOException $e)
    {
        echo($e->getMessage());
        die();
    }
?>
<!-- Affichage du Header en haut de page -->
<?php
    // On insère la connexion à la BDD
    require_once './inc/connexionBDD.php'; 

    /**
     * Fonction permettant la création d'un profil utilisateur 
     */
    function creationUitlisateur($username, $email, $password) 
    {
        $sql = "INSERT INTO utilisateur ('user_name', 'user_email', 'user_password') VALUES ($username, $email, $password)";
            
        $requete = $pdo->prepare($sql);
        $requete->execute();
    }

    /**
     * Fonction permettant la verification de la session
     */
    function connexionUitlisateur($email, $password) 
    {
        $sql = "SELECT 'user_email', 'user_password' FROM 'utilisateur'";
            
        $requete = $pdo->prepare($sql);
        $requete->execute();
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

        foreach($resultat as $user) 
        {
            if($user['user_email'] == $email && $user['user_password'] == $password)
            {
                return true;
                break;
            }
        }
        return false;
    }

    /**
     * Fonction permettant la verification de la session
     */
    function zoneUtilisateur() 
    {

        // 'pseudo' est un peu notre "jeton" (token) de vérification.
        // Si l'utilisateur est connecté, pseudo sera défini.
        if(!isset($_SESSION['identifiant'])) 
        { 
            header('Location: connexion.php');
            exit();
        }
    }
    
    /**
     * Fonction permettant création d'un lien à partir de la base de données
     */
    function creationLiens($id, $lien_initial, $lien_raccourci, $type_de_lien, $données_liens, $état) 
    {
        try 
        {
            $sql = "INSERT INTO 'lien_raccourci' (id, 'lien_initial', 'lien_raccourci', 'type_de_lien', 'données_liens', 'état') VALUES ($id, $lien_initial, $lien_raccourci, $type_de_lien, $données_liens, $état)";
            
            $requete = $pdo->prepare($sql);
            $requete->execute();
        }
        catch(error $e)
        {
            echo($e->getMessage());
            die();
        }
    }

    /**
     * Fonction permettant la suppresion d'un lien de son créateur à partir de la base de données
     */
    function suppressionLiens($id) 
    {
        $sql = "DELETE FROM 'lien_raccourci' WHERE id = $id";
        
        $requete = $pdo->prepare($sql);
        $requete->execute();
    }

    /**
     * Fonction permettant l'affichage de lien(s) à partir de la base de données
     */
    function affichageLiens() 
    {
        $sql = "SELECT 'lien_initial', 'lien raccourci', 'nombre_clic', 'type_de_lien', 'données_lien', 'état', 'id_user' FROM 'lien_raccourci'";
        
        $requete = $pdo->prepare($sql);
        $requete->execute();
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

        return $resultat;
    }

    /**
     * Fonction permettant l'affichage de lien(s) à partir de la base de données
     */
    function affichageLien($id) 
    {
        $sql = "SELECT 'lien_initial', 'lien raccourci', 'nombre_clic', 'type_de_lien', 'données_lien', 'état', 'id_user' FROM 'lien_raccourci' WHERE id = $id";
        
        $requete = $pdo->prepare($sql);
        $requete->execute();
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

        return $resultat;
    }

    /**
     * Fonction permettant l'affichage des lien(s) que tu as recherché à partir de la base de données
     */
    function affichageLiensUser($user) 
    {
        $sql = "SELECT 'lien_initial', 'lien raccourci', 'nombre_clic', 'type_de_lien', 'données_lien', 'état', 'id_user' FROM 'lien_raccourci' WHERE 'id_user' = $user";
        
        $requete = $pdo->prepare($sql);
        $requete->execute();
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

        return $resultat;
    }
    
?>
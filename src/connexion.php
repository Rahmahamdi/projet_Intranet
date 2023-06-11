<?php

if(isset($_POST["mail"]) || isset($_POST["psw"])){
    try {
        $reponse = $_bdd->query("SELECT mail, nom, prenom, psw, Ville, Pays, tel, datenaissance,Catégorie, URL FROM inscription WHERE mail = '{$_POST['mail']}' limit 1");
        $DATA  = $reponse->fetch();

        $login = $_POST["mail"]; // Récupérer l'adresse e-mail saisie par l'utilisateur
        $mdp = $_POST["psw"]; // Récupérer le mot de passe saisi par l'utilisateur

        if(!$login || !$mdp){
            echo "<p class=\"warning\">Vous avez oublié votre adresse e-mail ou mot de passe?</p>";
        } else if(isset($DATA['psw'])) {
            if(password_verify($_POST["psw"],$DATA['psw'])) {
                // Le mot de passe est correct

                session_start();

                // Stocker les informations de l'utilisateur dans des variables de session
                $_SESSION['mail'] = $DATA['mail'];
                $_SESSION['URL'] = $DATA['URL'];
                $_SESSION['nom'] = $DATA['nom'];
                $_SESSION['prenom'] = $DATA['prenom'];
                $_SESSION['Ville'] = $DATA['Ville'];
                $_SESSION['Pays'] = $DATA['Pays'];
                $_SESSION['tel'] = $DATA['tel'];
                $_SESSION['datenaissance'] = $DATA['datenaissance'];
                $_SESSION['Catégorie'] = $DATA['Catégorie'];

                $date = $DATA['datenaissance']; // Récupérer la date stockée dans la base de données
                $date_format = date('F jS', strtotime($date)); // Formater la date au format "F-jS"

                $_SESSION['mois'] = $date_format;

                $_SESSION['aj'] = date('Y-m-d');
                $birthdate = new DateTime($_SESSION['Birthdate']);
                $today = new DateTime($_SESSION['aj']);
                $age = $birthdate->diff($today);

                $_SESSION['age'] = $age->y;

                header("Location: connected.php"); // Rediriger vers la page "connected.php" après une connexion réussie
                exit;
            } else {
                // Le mot de passe est incorrect
                echo "<p class=\"warning\">Erreur de connexion ou mot de passe incorrect.</p>";
            }
        } else {
            // La valeur 'psw' n'existe pas dans le tableau $DATA, donc l'utilisateur n'existe pas
            echo "<p class=\"warning\">Erreur de connexion ou mot de passe incorrect.</p>";
        }
    } catch (Exception $e) {
        //throw $th;
    }
}
?>
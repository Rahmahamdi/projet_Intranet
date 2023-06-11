<?php
    session_start();
    include_once("./src/data.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/modifier.css">

    <link rel="apple-touch-icon" sizes="180x180" href="./asset/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./asset/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./asset/favicon/favicon-16x16.png">
    <link rel="icon" type= "image/ico" href="./asset/favicon/site.webmanifest">  
    <link rel="manifest" href="./asset/favicon/site.webmanifest">
    <title>Intranet</title>
</head>
<body>  
<header>
            <nav>
                <ul>
                    <li>
                        <img src="./asset/reseau.png" alt="reseau">
                        <a href="./inscription.php"> Intranet</a>
                    </li>
                    <li>
                        <img src="./asset/connexion.svg" alt="connex">
                        <a href="./connexion.php">Connexion</a>                    
                    </li>
                </ul>
            </nav>

          
</header>
    <main>
    <h1> créer mon profil 
</h1>

<form method="post" class="modifier">
                <label>Civilite
                <select name="Civilité" id="Civilité">
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                </select>
            </label>
            <label>Categorie*
                <select name="Catégorie" id="Catégorie">
                    <option value="Client">Client</option>
                    <option value="admin">admin</option>
                    <option value="Technique">Technique</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Manager">Manager</option>
                </select>
            </label>
            <label>Nom*
                <input type="text" name="nom" aria-labelledby="Nom"  id="Nom" placeholder="text" aria-required="true">
            </label>
            <label>Prénom*
                <input type="text" name="prenom" aria-labelledby="Prénom"  id="Prénom" placeholder="text" aria-required="true">
            </label>
            <label>Mail ou login*
                <input type="email" name="mail" aria-labelledby="email"  id="email" placeholder="Mail Utilisateur" aria-required="true" autofocus>
            </label>
            <label>Mot de passe*
                <input type="password" name="psw" aria-labelledby="password" id="password" placeholder="Mot de passe" aria-required="true">
            </label>
            <label>Confirmation*
                <input type="password" name="pswC" aria-labelledby="password" id="password" placeholder="Mot de passe" aria-required="true">
            </label>
            <label for="tel">Telephone
                <input type="tel" id="tel" name="tel" placeholder="Enter Your tel" required>
            </label>
            <label for="datenaissance">Date de naissance
                <input type="date" id="datenaissance" name="datenaissance" placeholder="Enter Your Birthdate" required>
            </label>
            <label>Ville*
            <input type="Ville" id="Ville" name="Ville" placeholder="Ville" required>
            </label>
            <label>Pays*
            <input type="Pays" id="Pays" name="Pays" placeholder="Pays" required>
            </label>
            <label for="URL">URL de la photo
                <input type="url" id="URL" name="URL" placeholder="URL" required>
            </label>
            <input type="submit" aria-label="Envoyer" value="S'inscrire" id="ex">
        </form>
        <?php
                     //inclusion
                    include_once "./src/log.php";
                 ?>
    </main>
    <footer>

    </footer>
</body>
</html>
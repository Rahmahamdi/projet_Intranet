


<?php
    session_start();
    include_once("./src/data.inc.php");
    include_once("./src/session.php");
    
    if (!isset($_SESSION['nom']) || !isset($_SESSION['URL'])) {
        // Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
        header("Location: connexion.php");
        exit;
    }

// Vérifier si le paramètre "random" est présent dans l'URL

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/list.css">
    <link rel="stylesheet" href="./css/bienvenue.css">

 <link rel="apple-touch-icon" sizes="180x180" href="./favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon/favicon-16x16.png">
    <link rel="icon" type= "image/ico" href="./favicon/site.webmanifest">  
    <link rel="manifest" href="favicon/site.webmanifest">

    <title>Document</title>
</head>
<body>
    <header>
    <nav>
            <ul class="left">
                <li> 
                    <a href="./connected.php"><img src="./asset/reseau.png" alt="reseau"> Intranet</a>
                </li>
            </ul>
            <ul class="right">
                <li>
                <a href="./liste.php"> 
                    <img src="./asset/liste.svg" alt="liste"> Liste</a>
                    <a href="./src/modifier.php"> <?php print '<img src="' . $_SESSION['URL'] . '" class="top">'?> </a>             
                    <a href="./src/deconnexion.php">   <img src="./asset/logout.svg" alt="logout"> Déconnexion
</a>
<li>
        
            </ul>
           </nav>
    </header>
    <h1 class="titre">Liste des collaborateurs</h1>
    <main>
      
        <div class="recherche">
        <input type="text" id="recherche-input" placeholder="Recherche...">
            <label for="search-by-nom">Rechercher par :</label>
            <select id="search-by-nom">
                <option value="nom">Nom</option>
                <option value="prenom">Prénom</option>
                <option value="ville">Ville</option>
                <option value="email">Adresse mail</option>
            </select>
        </div>
        <div class="recherche">
            <label for="search-by-categorie">Categorie:</label>
            <select id="search-by-categorie">
                <option value="Catégorie">Aucun</option>
                <option value="Client">Client</option>
                <option value="admin">Admin</option>
                <option value="Technicien">Technicien</option>
                <option value="Marketing">Marketing</option>
                <option value="Manager">Manager</option>
            </select>
        </div>

<?php
// Loop through the results and display each user's name
foreach ($result as $user) {
    // Vérifier si la catégorie de l'utilisateur correspond à la catégorie sélectionnée
    $categorieSelectionnee = isset($_POST['search-by-categorie']) ? $_POST['search-by-categorie'] : 'Catégorie';

    if ($categorieSelectionnee !== 'Catégorie' && $user['Catégorie'] !== $categorieSelectionnee) {
        // La catégorie de l'utilisateur ne correspond pas à la catégorie sélectionnée, passer à l'itération suivante
        continue;
    }

    // La catégorie de l'utilisateur correspond à la catégorie sélectionnée ou aucune catégorie n'est sélectionnée, afficher le profil de l'utilisateur

    $date = $user['datenaissance'];
    $date_format = date('F jS', strtotime($date));
    $user['mois'] = $date_format;
    $user['aj'] = date('Y-m-d');
    $birthdate = new DateTime($user['datenaissance']);
    $today = new DateTime($user['aj']);
    $age = $birthdate->diff($today);

    $user['age'] = $age->y;

    $color = '';

    if ($user['Catégorie'] == 'Client') {
        $color = 'bleue'; 
    } elseif ($user['Catégorie'] == 'admin') {
        $color = 'vert'; 
    } elseif ($user['Catégorie'] == 'Technicien') {
        $color = 'gris'; 
    } elseif ($user['Catégorie'] == 'Marketing') {
        $color = 'marron'; 
    } elseif ($user['Catégorie'] == 'Manager') {
        $color = 'rouge'; 
    }

    echo "
    <section data-uid=" . $user['id'] . ">
        <div class=\"left\">
            <img src=\"" . $user['Url'] . "\" class=\"tech\">
        </div>

        <div>
            <ul class=\"right\">
                <li> <p class=\"nom\">" . $user['nom'] . " " . $user['prenom'] . "</p><p class=\"age\">(" . $user['age'] . " ans) </p> </li>
                <li> <p class=\"pays\">" . $user['Ville'] . "," . $user['Pays'] . "</p> </li>
                <li>
                 <img src=\"./asset/email.png\" class=\"mail\"> <p>" . $user['mail'] . "</p> </li>
                <li> <img src=\"./asset/telephone.png\" class=\"phone\"> <p>" . $user['tel'] . "</p> </li>
                <li> <img src=\"./asset/birthday-cake.png\" class=\"an\"> <p>" . $user['mois'] . "</p> </li>
            </ul>
            <p class=\"$color\" id=\"tech\">" . $user['Catégorie'] . "</p>
        </div>
    </section>"; 
}
?>

// ...

    </main>
  
</body>
</html>

                   
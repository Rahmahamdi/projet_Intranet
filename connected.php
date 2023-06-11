<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['mail']) || !isset($_SESSION['URL'])) {
    // Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("Location: connexion.php");
    exit;
}

// Inclure les fichiers nécessaires
include_once("./src/data.inc.php");

if (!isset($_SESSION['Civilité'])) {
    $_SESSION['Civilité'] = 'Homme'; // Remplacez par la valeur par défaut souhaitée
}
if (!isset($_SESSION['Catégorie'])) {
    $_SESSION['Catégorie'] = 'Client'; // Remplacez par la valeur par défaut souhaitée
}


// Rendre la variable userSession disponible pour app.js
echo '<script>const userSession = "' . $_SESSION['mail'] . '";</script>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bienvenue.css">
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
            <ul class="left">
                <li> 
                    <a href="./connected.php"><img src="./asset/reseau.png" alt="reseau"> Intranet</a>
                </li>
            </ul>
            <ul class="right">
                <li>
                <a href="./liste.php"> 
                    <img src="./asset/liste.svg" alt="liste"> Liste</a>
                    <a href="./modifier.php"><img src="<?php echo $_SESSION['URL']; ?>" class="top"></a>
                    <a href="./src/deconnexion.php">   <img src="./asset/logout.svg" alt="logout"> Déconnexion
</a>
<li>
        
            </ul>
           </nav>
        
    </header>
    <main>
        <h1>Bienvenue sur l'intranet </h1>
        <p>La plate-forme de l'entreprise qui vous permet de retrouver tous vos collaborateurs</p>
            <p> Avez-vous dit bonjour à : </p>
            <section class="bonjour">
    <div class="robert">
        <img src="<?php echo $_SESSION['URL']; ?>" class="tech">
    </div>
    <ul>
        <li>
            <p class="nom"><?php echo $_SESSION['nom'] . ' ' . $_SESSION['prenom']; ?></p>
            <p class="age">(<?php echo $_SESSION['age']; ?> ans)</p>
        </li>
        <li>
            <p class="pays"><?php echo $_SESSION['Ville'] . ', ' . $_SESSION['Pays']; ?></p>
        </li>
        <li>
            <img src="./asset/email.png" class="mail">
            <p><?php echo $_SESSION['mail']; ?></p>
        </li>
        <li>
            <img src="./asset/telephone.png" class="phone">
            <p><?php echo $_SESSION['tel']; ?></p>
        </li>
        <li>
            <img src="./asset/birthday-cake.png" class="an">
            <p><?php echo $_SESSION['mois']; ?></p>
        </li>
    </ul>
    <p class="tech">En ligne</p>
</section>
<?php
function calculateAge($dateOfBirth) {
    $today = new DateTime();
    $diff = $today->diff(new DateTime($dateOfBirth));
    return $diff->y;
}

            if (isset($_GET['random'])) {
                // Générer une requête pour sélectionner un utilisateur au hasard
                $query = "SELECT * FROM inscription ORDER BY RAND() LIMIT 1";
                $stmt = $_bdd->query($query);
                $randomUser = $stmt->fetch(PDO::FETCH_ASSOC);
            
                // Vérifier si un utilisateur aléatoire a été trouvé
                if ($randomUser) {
                    // Stocker les informations de l'utilisateur aléatoire dans les variables de session
                    $_SESSION['nom'] = $randomUser['nom'];
                    $_SESSION['prenom'] = $randomUser['prenom'];
                    $_SESSION['URL'] = $randomUser['Url'];
                    $_SESSION['age'] = calculateAge($randomUser['datenaissance']);
                    $_SESSION['Ville'] = $randomUser['Ville'];
                    $_SESSION['Pays'] = $randomUser['Pays'];
                    $_SESSION['mail'] = $randomUser['mail'];
                    $_SESSION['tel'] = $randomUser['tel'];
                    $_SESSION['mois'] = date('F jS', strtotime($randomUser['datenaissance']));
                }
            }
?>            
            <p class="tech"></p>
        </section>
    </main>

    <div class="centrer">
    <a href="./connected.php?random=1" class="btn">Dire Bonjour à quelqu'un d'autre</a>
    </div>

    <script defer src="./js/app.js"></script>

</body>
<footer>


        </footer>
</html>
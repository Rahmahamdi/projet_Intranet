<?php

    // Interroger la base de données pour obtenir les utilisateurs
    try {
        $query = "SELECT * FROM inscription";
        $result = $_bdd->query($query);
        
    } catch (PDOException $e) {
        echo 'Échec de la requête : ' . $e->getMessage(); // Affiche un message en cas d'échec de la requête
        die(); // Arrête l'exécution du script
    }

    // Si aucun résultat n'est trouvé, afficher un message
    if ($result->rowCount() === 0) {
        echo "Aucun résultat trouvé.";
        die(); // Arrête l'exécution du script
    }

    // Obtenir les données utilisateur à partir de la base de données et les stocker dans des variables de session
       
?>
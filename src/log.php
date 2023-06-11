
<?php if(isset($_POST['mail']) || isset($_POST['psw'])){
                $_email = $_POST["mail"];

                //on test les chaines de caractère//
                if(!$_POST['Civilité'] || !$_POST['Catégorie'] || !$_POST['nom'] || !$_POST['prenom'] || !$_POST['mail'] || !$_POST['psw'] || !$_POST['pswC'] || !$_POST['tel'] || !$_POST['datenaissance'] || !$_POST['Ville'] || !$_POST['Pays'] || !$_POST['URL']){
                    echo "<p class=\"warning\">remplisser tout les champs</p>";
                    }
                    else if(!filter_var($_email, FILTER_VALIDATE_EMAIL)){ //attention à ma fonction
                        echo "<p class=\"warning\">Mail invalide</p>";
                    }
                    else if(is_numeric($_email)){
                            echo "<p class=\"warning\">Vous devez saisir des caractères</p>";
                    }
                    else if($_POST['psw'] != $_POST['pswC']){
                        echo "<p class=\"warning\">pd</p>";
                    }
                    else{

                    //password_hash($_POST['psw'],PASSWORD_DEFAULT);
                    
                    $req = $_bdd->prepare('INSERT INTO inscription (Civilité, Catégorie, nom, prenom, mail, psw, pswC, tel, datenaissance, Ville, Pays, URL)VALUES(?,?,?,?,?,?,?,?,?,?,?,?)');
                    $req->execute(array($_POST['Civilité'], $_POST['Catégorie'], $_POST['nom'], $_POST['prenom'], $_POST['mail'], password_hash($_POST['psw'],PASSWORD_DEFAULT),password_hash($_POST['pswC'],PASSWORD_DEFAULT),$_POST['tel'],$_POST['datenaissance'],$_POST['Ville'],$_POST['Pays'],$_POST['URL']));
                    
                    echo header("Location: connexion.php");
                    exit;
                    
                }                
                
            }

            
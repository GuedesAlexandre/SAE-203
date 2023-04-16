<html>
<head>
    <title>Formulaire</title>
  <link href="css/formulaire.css" rel="stylesheet" />
</head>
<body>

    <form class="form" action="connexion.php" method="post">
        <span class="signup">Connexion</span>
        <div class="allform">

            <div class="form-mail">
               
                <input type="email" name="email" placeholder="Email address" class="form--input" required>
            </div>
            <div class="form-pass">
                <input type="password" name="password" placeholder="Password" class="form--input" required>
            </div>
          
        </div>
        
        <input type="submit" class="form--submit" value="Sign up">
    </form>

<?php
//début du php
// Connexion à la base de données
//mdp pour mac : root
//debut de session




session_start();
$conn = mysqli_connect("localhost", "root", "root", "test");
if(!empty($_POST["email"]) && !empty($_POST["password"])){
    if (!$conn) {
        die("Connexion échouée : " . mysqli_connect_error());
    }
    
   
        if(!empty($_POST["email"]) && !empty($_POST["password"]) ){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $_SESSION["emailuti"] = $email;
            $_SESSION["passworduti"] = $password;
            
            
            
    }else{
        echo "données manquantes.";
       
    }
        
    }
    
    
    
    //Récupération des données soumises par le formulaire
    //require du fichier php qui try and catch
    
    // Insertion des données dans la table appropriée
    
    $sql = "SELECT * FROM utilisateurs WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // L'utilisateur est connecté, on redirige vers une autre page
      header("Location: index.html");
    } else {
      // L'utilisateur n'a pas pu se connecter, on affiche un message d'erreur
      echo "Email ou mot de passe incorrect.";
    }
    
    // Fermeture de la connexion à la base de données
    $conn->close();

// Vérification de la connexion


?>
</body>
</html>
<html>
<head>
    <title>Connexion</title>
  <link href="css/formulaire.css" rel="stylesheet" />
</head>
<body>

    <header>
        <nav class="navbar">
            <div class="navlinks">
                <ul>
                    <a href="#"><li>About</li></a>
                    <a href="index.html"><li class="logo">MATOS</li></a>
                    <a href="#"><li>Contact</li></a>
                </ul>
            </div>
        </nav>
    </header>

    <form class="form" action="login.php" method="post">
        <h2 class="signup">Log In</h2>
        <div class="allform">

            <div class="form-mail">
               
                <input type="email" name="email" placeholder="Email address" class="form--input" required>
            </div>
            <div class="form-pass">
                <input type="password" name="password" placeholder="Password" class="form--input" required>
            </div>
        </div>
        
        <input type="submit" class="form--submit" value="Sign up" href="#">
        <span class="link">Pas de compte ? <a href="formulaire.php">Inscrivez-vous !</a></span>
    </form>

<?php
//début du php
// Connexion à la base de données
//mdp pour mac : root
//debut de session




session_start();
$conn = mysqli_connect("localhost", "root", "root", "Matos");
if (!$conn) {
	die("La connexion a échoué : " . mysqli_connect_error());
}
if(!empty($_POST["email"]) && !empty($_POST["password"])){
   
   
        if(!empty($_POST["email"]) && !empty($_POST["password"]) ){
           
           
            $_SESSION["emailuti"] = $_POST['email'];
            $_SESSION["passworduti"] = $_POST['password'];
            $emailuti=$_SESSION["emailuti"];
            $passworduti = $_SESSION["passworduti"] ;
            
            $passwordverify = hash('sha256', $passworduti);
            
    }else{
        echo "données manquantes.";
       
    }
        
    }
    
    //Récupération des données soumises par le formulaire
    //require du fichier php qui try and catch
    
    // Insertion des données dans la table appropriée
    if(!empty($emailuti) && !empty($passworduti)){
    $sql = "SELECT * FROM utilisateurs WHERE email = '$emailuti' AND password = '$passwordverify' ";
    $result = $conn->query($sql);
    
    if (mysqli_num_rows($result) == 1 ) {
      // L'utilisateur est connecté, on redirige vers une autre page
      
        header("Location: board.php");
    exit();
    } else {
      // L'utilisateur n'a pas pu se connecter, on affiche un message d'erreur
      echo "Email ou mot de passe incorrect.";
    }
}
    // Fermeture de la connexion à la base de données
    $conn->close();

// Vérification de la connexion

    
?>
</body>
</html>
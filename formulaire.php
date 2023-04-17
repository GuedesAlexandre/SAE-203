<html>
<head>
    <title>Formulaire</title>
    <link href="css/formulaire.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"/>
</head>
<body>

    <header>
        <nav class="navbar">
            <div class="navlinks">
                <ul>
                    <a href="#"><li>About</li></a>
                    <a href="#"><li class="logo">MATOS</li></a>
                    <a href="#"><li>Contact</li></a>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <form class="form" action="formulaire.php " method="post">
            <h2 class="signup">Sign Up</h2>
            <div class="allform">
                <div class="form-name">
                    <input type="text" name="prenom" placeholder="First Name" class="form--input" required>
                    <input type="text" class="form--input" name="nom" placeholder="Last Name" required>
                </div>
                <div class="form-mail">
                    <input type="date" class="form--input" name="birthday" placeholder="Birth Date" required>
                    <input type="email" name="email" placeholder="Email address" class="form--input" required>
                </div>
                <div class="form-pass">
                    <input type="password" name="password" placeholder="Password" class="form--input" required>
                </div>
                <div class="passconf">
                    <input type="password" name="passconf" placeholder="Confirm password" class="form--input" required>
                </div>
            </div>
            
            <input type="submit" class="form--submit" value="Sign up">

            <span class="link">Déjà un compte ? <a href="login.php">Connectez vous !</a></span>
        </form>
    </main>

<?php
//début du php
// Connexion à la base de données
//mdp pour mac : root
//debut de session



session_start();
$conn = mysqli_connect("localhost", "root", "root", "test");
if(!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["birthday"]) && !empty($_POST["passconf"])){
    if (!$conn) {
        die("Connexion échouée : " . mysqli_connect_error());
    }
    
    if($_POST["password"] == $_POST["passconf"]){
        if(!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["passconf"]) && !empty($_POST["birthday"]) && !empty($_POST["nom"]) && !empty($_POST["prenom"])){
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["password"] = $_POST["password"];
        $_SESSION["nom"] = $_POST["nom"];
        $_SESSION["prenom"] = $_POST["prenom"];
        $_SESSION["birthday"] = $_POST["birthday"];
        
        $prenom = $_SESSION['prenom'];
        $nom= $_SESSION['nom'];
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];
        $birthday = $_SESSION['birthday'];
        $passwordhash = hash('sha256', $password);
    }else{
        echo "données manquantes.";
       
    }
        
    }
    
    
    
    //Récupération des données soumises par le formulaire
    //require du fichier php qui try and catch
    
    // Insertion des données dans la table appropriée
    
    $sql = "INSERT INTO utilisateurs (email,password) VALUES ('$email', '$passwordhash');";
    
    if (mysqli_query($conn, $sql)) {
        header("location: login.php");
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
    
    // Fermeture de la connexion à la base de données
    mysqli_close($conn);
    
}else{
    echo "Les champs sont vides";
}
// Vérification de la connexion


?>
</body>
</html>
<html>
<head>
    <title>Formulaire</title>
  <link href="css/formulaire.css" rel="stylesheet" />
</head>
<body>
    <style>
  
    </style>
<form class="form" action="formulaire.php " method="post">
    <span class="signup">Sign Up</span>
    <input type="email" name="email" placeholder="Email address" class="form--input">
    <input type="password" name="password" placeholder="Password" class="form--input">
    <input type="password" name="passconf" placeholder="Confirm password" class="form--input">
    
    <div class="form--marketing">
        <input id="okayToEmail" type="checkbox">
        <label for="okayToEmail" class="checkbox">
          I want to join the newsletter
        </label>
    </div>
    <button class="form--submit">
        Sign up
    </button>
</form>

<?php
//début du php
// Connexion à la base de données
//mdp pour mac : root
$conn = mysqli_connect("localhost", "root", "", "test");

// Vérification de la connexion
if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}

if($_POST["password"] == $_POST["passconf"]){
    if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["passconf"])){
    
    $email = $_POST['email'];
    $password = $_POST['password'];
}else{
    echo "données manquantes.";
   
}
    
}



//Récupération des données soumises par le formulaire


// Insertion des données dans la table appropriée

$sql = "INSERT INTO utilisateurs (email,password) VALUES ('$email', '$password')";

if (mysqli_query($conn, $sql)) {
    echo "Les données ont été enregistrées avec succès.";
} else {
    echo "Erreur : " . mysqli_error($conn);
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);


?>
</body>
</html>
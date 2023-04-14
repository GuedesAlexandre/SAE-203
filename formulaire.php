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
    
  
    <button class="form--submit">
        Sign up
    </button>
</form>

<?php
//début du php
// Connexion à la base de données
//mdp pour mac : root
//debut de session
function hashtonmdp($password){
    $sel = bin2hex(random_bytes(32));


    $passwordSel = $password . $sel;


    $motDePasseHache = hash('sha256', $$passwordSel);


    return array('motDePasse' => $motDePasseHache, 'sel' => $sel);
 
}


session_start();
$conn = mysqli_connect("localhost", "root", "root", "test");
if(!empty($_POST["email"]) && !empty($_POST["password"])){
    if (!$conn) {
        die("Connexion échouée : " . mysqli_connect_error());
    }
    
    if($_POST["password"] == $_POST["passconf"]){
        if(!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["passconf"])){
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["password"] = $_POST["password"];
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];
    }else{
        echo "données manquantes.";
       
    }
        
    }
    
    
    
    //Récupération des données soumises par le formulaire
    
    
    // Insertion des données dans la table appropriée
    
    $sql = "INSERT INTO utilisateurs (email,password) VALUES ('$email', ' hash('sha256', $password)')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Les données ont été enregistrées avec succès.";
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
<html>
<head>
    <title>Formulaire</title>
  <link href="css/formulaire.css" rel="stylesheet" />
</head>
<body>

    <form class="form" action="formulaire.php " method="post">
        <span class="signup">Sign Up</span>
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
    }else{
        echo "données manquantes.";
       
    }
        
    }
    
    
    
    //Récupération des données soumises par le formulaire
    //require du fichier php qui try and catch
    
    // Insertion des données dans la table appropriée
    
    $sql = "INSERT INTO utilisateurs (email,password,) VALUES ('$email', ' hash('sha256', $password)')";
    
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
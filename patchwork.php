<html>
<head>
    <title>Patchwork</title>

</head>
<body>
    
    <?php
    // Récupération des données soumises par le formulaire de connexion
$email = $_SESSION['email'];
$motDePasse = $_SESSION['mot_de_passe'];

// Recherche de l'utilisateur dans la base de données
$sql = "SELECT * FROM utilisateurs WHERE email='$email'";
$resultat = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultat) == 1) {
    // L'utilisateur a été trouvé dans la base de données
    $utilisateur = mysqli_fetch_assoc($resultat);

    // Vérification du mot de passe
    if (password_verify($motDePasse, $utilisateur['password'])) {
        // Le mot de passe est correct, vérification du rôle
        if ($utilisateur['role'] == 'admin') {
            // L'utilisateur est administrateur
            echo "Vous êtes connecté en tant qu'administrateur.";
        } else {
            // L'utilisateur n'est pas administrateur
            echo "Vous n'êtes pas autorisé à accéder à cette page.";
        }
    } else {
        // Le mot de passe est incorrect
        echo "Mot de passe incorrect.";
    }
} else {
    // L'utilisateur n'a pas été trouvé dans la base de données
    echo "Adresse email incorrecte.";
}

//pour envoie de mail
$to = $_POST['email'];
$subject = "Email Subject";

$message = 'Dear '.$_POST['name'].',<br>';
$message .= "We welcome you to be part of family<br><br>";
$message .= "Regards,<br>";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <enquiry@example.com>' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);

// Fermeture de la connexion à la base de données
mysqli_close($conn);
    ?>
</body>
</html>
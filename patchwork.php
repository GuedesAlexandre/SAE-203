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
$sqlverifadmin = "SELECT * FROM utilisateurs WHERE IDE='$IDE'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // L'utilisateur a été trouvé dans la base de données
    $UtiIDE = mysqli_fetch_assoc($resul);

    // Vérification du mot de passe

        // Le mot de passe est correct, vérification du rôle
        if ($utilisateur['role'] == 1) {
            // L'utilisateur est administrateur
            echo "Vous êtes connecté en tant qu'administrateur.";
        }


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
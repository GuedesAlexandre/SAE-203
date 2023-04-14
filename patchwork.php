<html>
<head>
    <title>Patchwork</title>

</head>
<body>
    <?php
    // Récupération des données soumises par le formulaire de connexion
$email = $_POST['email'];
$motDePasse = $_POST['mot_de_passe'];

// Recherche de l'utilisateur dans la base de données
$sql = "SELECT * FROM utilisateurs WHERE email='$email'";
$resultat = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultat) == 1) {
    // L'utilisateur a été trouvé dans la base de données
    $utilisateur = mysqli_fetch_assoc($resultat);

    // Vérification du mot de passe
    if (password_verify($motDePasse, $utilisateur['mot_de_passe'])) {
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

// Fermeture de la connexion à la base de données
mysqli_close($conn);
    ?>
</body>
</html>
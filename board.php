<html>
<head>
    <title>Board</title>
  <link href="css/formulaire.css" rel="stylesheet" />
</head>
<body>
<a href="déconnexion.php"><button>déconnecte toi mon reuf</button></a>
<?php


session_start();
$emailuti = $_SESSION["emailuti"];

$conn = mysqli_connect("localhost", "root", "root", "Matos");
if (!$conn) {
	die("La connexion a échoué : " . mysqli_connect_error());
}
$sql = "SELECT IDE,Prenom FROM utilisateurs WHERE email='$emailuti'";
$resultat = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultat) == 1) {
    // L'utilisateur a été trouvé dans la base de données
    $IDEutilisateur = mysqli_fetch_assoc($resultat);
    $IDE = $IDEutilisateur["IDE"];
    echo "Bienvenue"."&nbsp". $IDEutilisateur["Prenom"];
}

?>
</body>
</html>

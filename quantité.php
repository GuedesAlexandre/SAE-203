<html>
<head>
</head>
<body>
<?php


// Établir une connexion avec votre base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Matos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier si la connexion a réussi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer toutes les données de la table contenant les quantités
$sql = "SELECT * FROM Materiels";
$result = $conn->query($sql);

// Créer le tableau associatif avec les ID en colonnes et les quantités en lignes
$tableau_assoc = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $id = $row["ID"]; // l'ID se trouve dans la colonne "ID"
        $quantite = $row["Quantité"]; // la quantité se trouve dans la colonne "quantite"
        $tableau_assoc[$id] = $quantite; // stocker la quantité dans le tableau associatif avec l'ID comme clé
    }
}

// Afficher le tableau associatif pour vérification

echo $tableau_assoc["256789"];


// Fermer la connexion avec votre base de données
$conn->close();
?>





</body>
</html>
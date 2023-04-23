<html>
<head>
</head>
<body>
<?php
$conn = mysqli_connect("localhost", "root", "root", "Matos");

// Vérifier si la connexion est établie
if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}

// Établir une connexion avec votre base de données
$sqlselquant = "SELECT ID FROM Emprunt WHERE statut != 1;";
$sqlselquantresult =mysqli_query($conn, $sqlselquant);
if(mysqli_num_rows($sqlselquantresult) == 1){
    $IDMATquantité = mysqli_fetch_assoc($sqlselquantresult);
    $IDMATquantitégest = $IDMATquantité["ID"];
    $sqlupdatequantité = "UPDATE Materiels SET Quantité = Quantité-1 WHERE Quantité > 0 AND ID = '$IDMATquantitégest';";
    if(mysqli_query($conn, $sqlupdatequantité)){
        echo"quantité c'est bon";
        $statutvalid = 1;
        $sqlgeststatut ="UPDATE Emprunt SET statut = '$statutvalid' WHERE statut = 0;";
        if(mysqli_query($conn, $sqlgeststatut)){
            header('location: test.php');
        }else{
            echo"marche pas";
        }

    }else{
        echo "marche pas";
    }


} else {
    echo "vide";
}
?>





</body>
</html>
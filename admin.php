<html>
<head>
<title> page admin</title>
</head>
<body>
<?php
session_start();
$conn =  mysqli_connect("localhost", "root", "root", "Matos");

// Vérifier si la connexion est établie
if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}
echo "<form action='test.php' method='post'>
<input type='submit' name='verif'>
</form>";
if(isset($_POST["verif"])){
    $sqlrecup = "SELECT * FROM Emprunt WHERE statut = 0" ;
    $sql_recupid_from_emprunt = "SELECT ID FROM Emprunt WHERE statut = 0";
    $sql_recupIDE_from_emprunt = "SELECT IDE FROM Emprunt WHERE statut =0";
    $recupall = mysqli_query($conn, $sqlrecup);
    $recupid = mysqli_query($conn, $sql_recupid_from_emprunt);
    $recupIDE = mysqli_query($conn, $sql_recupIDE_from_emprunt);
    if(mysqli_num_rows($recupall) == 1 && mysqli_num_rows($recupid) && mysqli_num_rows($recupIDE)){
        $IDE = mysqli_fetch_assoc($recupIDE);
        $ID = mysqli_fetch_assoc($recupid);
        $IDEINRUN = $IDE["IDE"];
        $IDINRUN = $ID["ID"];


        $sqlupdatestatut = " UPDATE Emprunt SET statut = statut + 1  WHERE statut = 0 ;";
        if(mysqli_query($conn, $sqlupdatestatut)){
            echo "reservation agree";
                $sqlquant= " SELECT Quantité FROM Materiels WHERE ID = '$IDEINRUN';";

                }

            }





}
mysqli_close($conn);
?>
</body>
</html>

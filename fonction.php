<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $conn = mysqli_connect("localhost", "root", "root", "Matos");
    function AjoutMateriel(){
    if(!empty($_POST["Nom"]) && !empty($_POST["Type"]) && !empty($_POST["Quantité"]) && !empty($_POST["description"])){
        $quantité = $_POST["Quantité"];
        $Nom = $_POST["Nom"];
        $Type = $_POST["Type"];
        $Description = $_POST["description"];
        if (!$conn) {
            die("La connexion a échoué : " . mysqli_connect_error());
        }
        while($quantité!=0){
            $ID = random_int(27000,28000);
            $quantfixe = 1;
            $sqlajout = "INSERT INTO Materiels (ID,Nom,Type,Quantité,Description) VALUES ('$ID','$Nom','$Type',$quantfixe,'$description');";
            if(mysqli_query($conn,$sqlajout)){
                $quantité = $quantité - 1;
            }

        }
    }
    


}
?>
</body>
</html>
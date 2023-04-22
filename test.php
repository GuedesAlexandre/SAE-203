<html>
<head>
    <title>Test</title>
    <link rel="stylesheet" href="css/reservation.css">
  
</head>
<body>
 <header>
        <nav class="navbar">
            <div class="navlinks">
                <ul>
                    <a href="#"><li>About</li></a>
                    <a href="#"><li class="logo">MATOS</li></a>
                    <a href="#"><li>Contact</li></a>
                </ul>
            </div>
        </nav>
    </header>
    
<?php
session_start();



// Connexion à la base de données
$conn = mysqli_connect("localhost", "root", "root", "Matos");

// Vérifier si la connexion est établie
if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}

// Requête SQL pour sélectionner les noms de matériels
$sql2 = "SELECT nom FROM materiels";

$resultat = mysqli_query($conn, $sql2);

// Vérifier si la requête a retourné des résultats
if (mysqli_num_rows($resultat) > 0) {
    // Créer un menu déroulant (select) avec les noms de matériels
    
  echo '
   <main>
   <div class="containform">
            <form class="form" action="test.php" method="post">
                <h2>RESERVATION OF EQUIPMENTS</h2>
  <select name="equipement">';
  while ($row = mysqli_fetch_assoc($resultat)) {
      echo '<option value="' . $row["nom"] . '">' . $row["nom"] . '</option>';
  }
  echo '</select>';
  echo ' <div class="form-date">
                    <input type="datetime-local" name="start" placeholder="Start date" required>
                    <input type="datetime-local" name="end" placeholder="End date" required>
                </div>
                <div class="comments">
                    <textarea name="commentaire" cols="30" rows="10" placeholder="Comments..."></textarea>
                </div>
                <div class="btn">
                    <input type="submit" value="SUBMIT">
                </div>
            </form>
        </div>

        <div class="container">
           <h2>HOW TO USE ?</h2>
            <div class="description">
                <ul>
                    <li>1. SELECT THE EQUIPMENTS</li>
                    <li>2. ENTER A START DATE</li>
                    <li>3. ENTER A END DATE</li>
                    <li>4. PUT A COMMENT ON HOW YOU WOULD LIKE TO USE THIS MATERIAL</li>
                    <li>5. SEND THE FORM</li>
                </ul>
           </div>
        </div>
    </main>';
  
} else {
    echo "Aucun résultat trouvé";
}
if(!empty($_POST["start"]) && !empty($_POST["end"]) && !empty($_POST["equipement"]) && !empty($_POST["commentaire"])){
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
    //récupération de l'entrée dans session
    $_SESSION["materiels"] = $_POST["equipement"];
    
    $_SESSION["debut"] = $_POST["start"];
    $_SESSION["fin"] = $_POST["start"];
    $_SESSION["commentaire"] = $_POST["commentaire"];
    //placement dans des variables
    $mat = $_SESSION["materiels"];
    $debut = $_SESSION["debut"];
    $fin = $_SESSION["fin"];
    $comment= $_SESSION["commentaire"];
    //récupération de la date local
    $date = date("Y-m-d H:i:s");

    //requête pour récupérer l'id et la quantité
    $sqlMATID ="SELECT ID FROM Materiels WHERE nom ='$mat'";
    $sqlMATQ ="SELECT Quantité FROM Materiels WHERE nom ='$mat'";
    $resultMATQ = mysqli_query($conn, $sqlMATQ);
    $resultMATID = mysqli_query($conn, $sqlMATID);
    if(mysqli_num_rows($resultMATQ) == 1 && mysqli_num_rows($resultMATID) ==1){
        $IDMAT = mysqli_fetch_assoc($resultMATID);
        $quantMAT = mysqli_fetch_assoc($resultMATQ);
        $idmateriels = $IDMAT["ID"];
        $quantité = $quantMAT["Quantité"];
    }

    if($quantMAT > 0){
        $sqlReserv = "INSERT INTO Emprunt (IDE,ID,DateDebut,DateFin)
        VALUES ('$IDE', '$idmateriels', '$debut', '$fin');";

        if( mysqli_query($conn, $sqlReserv)){
            echo "votre demande à été envoyé";



        }else{
         echo   'marche pas';
        }


 }else{
        echo "produits indisponible";
    }


    }

}









// Fermer la connexion

mysqli_close($conn);

?>
</body>
</html>
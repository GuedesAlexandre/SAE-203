<html>
<head>
    <title>Test</title>
    <link rel="stylesheet" href="css/reservation.css">

</head>
<body>
<?php

?>
    <header>
        <nav class="navbar">
            <a href='#' class="logo">MATOS</a>
            <div class="navlinks">
                <div class="relat">
                    <a class="elt elt-hov" href="board.php">Accueil</a>
                </div>
                <div class="relat">
                    <a href="materielist.php" class="elt elt-hov">Matériels</a>
                </div>
                <div class="relat">
                    <a class="elt elt-hov" href="#">Vos réservations</a>
                </div>
                <div class="relat">
                    <a href="reservation.php" class="elt elt-hov">Réserver</a>
                </div>
                <div class="ligne"></div>
                <ion-icon name="person" class="icon" onclick="taille()"></ion-icon>
            </div>
        </nav>
    </header>

    
    <div class="deco">
        <div class="box">
            <ion-icon name="log-out-outline"></ion-icon>
            <a href="déconnexion.php">Déconnexion</a>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="js/reservation.js"></script>
    <main>

<?php
session_start();

// Connexion à la base de données
$conn = mysqli_connect("localhost", "root", "root", "Matos");

// Vérifier si la connexion est établie
if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}

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
    
}

// Requête SQL pour sélectionner les noms de matériels
$sql2 = "SELECT nom
FROM Materiels
WHERE ID NOT IN (SELECT ID FROM Emprunt);";

$resultat = mysqli_query($conn, $sql2);

// Vérifier si la requête a retourné des résultats
if (mysqli_num_rows($resultat) > 0) {
    // Créer un menu déroulant (select) avec les noms de matériels

    echo '
   <main>
   <div class="container">
   <div class="containform">
            <form class="form" action="reservation.php" method="post">
                <h2>Réservation</h2>
                <div class="ligne2"></div>
  <select name="equipement">';
    while ($row = mysqli_fetch_assoc($resultat)) {
        echo '<option value="' . $row["nom"] . '">' . $row["nom"] . "</option>";
    }
    echo "</select>";

    echo ' <div class="form-date">
                    <input type="datetime-local" name="start" placeholder="Start date" required>
                    <input type="datetime-local" name="end" placeholder="End date" required>
                </div>
                <div class="comments">
                    <textarea name="commentaire" cols="30" rows="10" placeholder="Comments..." required></textarea>
                </div>
                <div class="btndiv">
                    <input type="submit" value="SUBMIT" class="btn">
                </div>
            </form>
        </div>';
} else {
    echo "Aucun résultat trouvé";
}
if (
    !empty($_POST["start"]) &&
    !empty($_POST["end"]) &&
    !empty($_POST["equipement"]) &&
    !empty($_POST["commentaire"])
) {
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
        $comment = $_SESSION["commentaire"];
        //récupération de la date local
        $date = date("Y-m-d H:i:s");

        //requête pour récupérer l'id et la quantité
        $sqlMATID = "SELECT ID FROM Materiels WHERE nom ='$mat'";
        $sqlMATQ = "SELECT Quantité FROM Materiels WHERE nom ='$mat'";
        $resultMATQ = mysqli_query($conn, $sqlMATQ);
        $resultMATID = mysqli_query($conn, $sqlMATID);
    }
        if (
            mysqli_num_rows($resultMATQ) == 1 &&
            mysqli_num_rows($resultMATID) == 1
        ) {
            $IDMAT = mysqli_fetch_assoc($resultMATID);
            $quantMAT = mysqli_fetch_assoc($resultMATQ);
            $idmateriels = $IDMAT["ID"];
            $quantité = $quantMAT["Quantité"];
        }

        if ($quantMAT > 0 && $date<=$debut){

            $sqlReserv = "INSERT INTO Emprunt (IDE,ID,DateDebut,DateFin)
            VALUES ('$IDE', '$idmateriels', '$debut', '$fin');";

            if (mysqli_query($conn, $sqlReserv)) {
                echo "<div class='msgbox'><span class='msg'>Votre demande à été envoyé.</span></div>";
                echo "<a href='quantité.php' class='btnadmin'><button>ADMIN</button></a>";

            } else {
                echo "<div class='msgbox'><span class='msg'>Produit indisponible.</span></div>";
            }
        }else{
            echo "<div class='msgbox'><span class='msg'>Date ou quantité indisponible.</span></div>";
        }

}else{
    echo "<div class='msgbox'><span class='msg'>Champ(s) manquant(s).</span></div>";
}
//gest statut et quantité;


// Fermer la connexion

mysqli_close($conn);
?>
        </div>
    </main>


    <footer>
        <div class="foot">
            <ul class="namelist">
                <li>Arnaud</li>
                <li>Alexandre</li>
                <li>Steven</li>
            </ul>
            <span>©MATOS | 2023 | Mentions Légales</span>
        </div>
    </footer>

</body>
</html>
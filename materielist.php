<html>
<head>
    <title>Matériels</title>
    <link rel="stylesheet" href="css/Materiels.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"/>
</head>
<body>
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
        <div class="box1">
            <ion-icon name="log-out-outline"></ion-icon>
            <a href="déconnexion.php">Déconnexion</a>
        </div>
    </div>

    <div id="search">
        <input type="search" placeholder="search" class="searchbar">
        <ion-icon name="search-outline"></ion-icon>
    </div>

    <?php
    session_start();
    $quantité ="Quantité : ";
    $conn = mysqli_connect("localhost", "root", "root", "Matos");

    if (!$conn) {
        die("Connexion échouée: " . mysqli_connect_error());
    }
    $sql = "SELECT Nom,Quantité,Description FROM Materiels ;
    ";

    if(mysqli_query($conn,$sql)){
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) >1 ){
            echo '<div class="container">';
            while($mat =mysqli_fetch_assoc($result)){

                echo' <div class="box">';
                echo' <h2>'.$mat["Nom"].'</h2>';
                echo '<p>'.$mat["Description"].'</p>';
                echo '<span>'.$quantité.$mat["Quantité"].'</span>';
                echo'</div>';
                echo"<br>"; 


            }





        }

    }
    echo"</div>";


?>

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

    <script src="js/reservation.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
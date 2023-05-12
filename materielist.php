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
            <span class="logo">MATOS</span>
            <div class="navlinks">
                <span class="elt">Accueil</span>
                <span class="elt">Réservations</span>
                <div class="ligne"></div>
                <ion-icon name="person" class="elt"></ion-icon>
            </div>
        </nav>
    </header>
<div id="search">

<input type="search" placeholder="search" class="searchbar">


<ion-icon name="search-outline"></ion-icon>



</div>



    

    <?php
    session_start();
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
                echo '<span>'.$mat["Quantité"].'</span>';
                echo'</div>';
                echo"<br>"; 


            }





        }

    }
    echo"</div>";
    ?>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
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

            while($mat =mysqli_fetch_assoc($result)){
                echo '<div class="container">';
                echo' <div class="box">';
                echo' <h2>'.$mat["Nom"].'</h2>';
                echo '<p>'.$mat["Description"].'</p>';
                echo '<span>'.$mat["Quantité"].'</span>';
                echo'</div>';

            }





        }echo 'ptn de php qui me saoule';

    }
    ?>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
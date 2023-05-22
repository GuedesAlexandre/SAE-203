<html>
<head>
    <title>Test</title>
    <link rel="stylesheet" href="css/ajout.css">

</head>
<body>
    <header>
        <nav class="navbar">
            <a href='#' class="logo">MATOS</a>
            <div class="navlinks">
                <div class="relat">
                    <a class="elt elt-hov" href="#">Accueil</a>
                </div>
                <div class="relat">
                    <a class="elt elt-hov" href="#">Réservations</a>
                </div>
                <div class="relat">
                    <a class="elt elt-hov" href="#">Ajout</a>
                </div>
                 <div class="relat">
                    <a class="elt elt-hov" href="#">Réserver</a>
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

<?php


echo '
   <main>
   <div class="containform">
            <form class="form" action="ajout.php.php" method="post">
                <h2>Add Material</h2>
                <div class="ligne2"></div>
  ';

echo '
            <div class="form-date">
                <input type="text" name="Name" placeholder="Name" required>
            </div>

            <div class="form-date">
                <input type="text" name="Type" placeholder="Type" required>
            </div>

            <div class="form-date">
                <input type="number" name="Quantity" placeholder="Quantity" required>
            </div>

            <div class="comments">
                <textarea name="commentaire" cols="30" rows="10" placeholder="Comments..." required></textarea>
            </div>
            <div class="btndiv">
                <input type="submit" value="ADD MATERIAL" class="btn">
                </div>
            </form>
        </div>';

        session_start();
        $conn = mysqli_connect("localhost", "root", "root", "Matos");
        if (!$conn) {
	        die("La connexion a échoué : " . mysqli_connect_error());
        }       
        if(!empty($_POST["Name"])&&!empty($_POST["Type"])&& !empty($_POST["Quantity"])&&!empty($_POST["commentaire"])){
            $Name = $_POST["Name"];
            $Type = $_POST["Type"];
            $Quantity = $_POST["Quantity"];
            $Commentaire = $_POST["commentaire"];
            $ID= random_int(27000,29000);
            $sqlajout = "INSERT INTO Materiels (ID,Nom,Type,Quantité,Description) VALUES ($ID,'$Name','$Type',$Quantity,'$Commentaire');";
            if(mysqli_query($conn,$sqlajout)){
                echo"matériel ajouté";
            }else{
               echo  "champs manquant ou incorrect";
            }
        }

         

 
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

</body>
</html>
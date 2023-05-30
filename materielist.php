<html>
<head>
    <title>Matériels</title>
    <link rel="stylesheet" href="css/Materiels.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"/>
</head>
<body>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="js/reservation.js"></script>
<?php
session_start();

$conn = mysqli_connect("localhost", "root", "root", "Matos");
if (!$conn) {
    die("La connexion a échoué : " . mysqli_connect_error());
}
$emailuti = $_SESSION["emailuti"];
$passworduti = $_SESSION["passworduti"];

$passwordverify = hash('sha256', $passworduti);

 $sql = "SELECT * FROM utilisateurs WHERE email = '$emailuti' AND password = '$passwordverify' ";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    $statut = $row["Role"];
   if($statut == 1){
       echo'<header>
    <nav class="navbar">
        <a href="#" class="logo">MATOS</a>
        <div class="navlinks">
            <div class="relat">
                <a class="elt elt-hov" href="adminboard.php">Accueil</a>
            </div>
            <div class="relat">
                <a href="materielist.php" class="elt elt-hov">Matériels</a>
            </div>
            <div class="relat">
                <a class="elt elt-hov" href="demande.php">Demande en cours</a>
            </div>
            <div class="relat">
                <a href="ajout.php" class="elt elt-hov">Ajout de matériels</a>
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
   <form action="materielist.php" method="GET">
                   <input type="search" name="search" placeholder="search" class="searchbar" onkeydown="if (event.keyCode === 13) this.form.submit()">
                   </form>
               </div>
       ';
       if(isset($_GET["search"])){
    
     
        $searchQuery = $_GET['search'];
        
        
        $host = 'localhost';
        $dbName = 'Matos';
        $username = 'root';
        $password = 'root';
        
        try {
          $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $password);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $query = "SELECT * FROM Materiels WHERE Nom LIKE :search";
          $stmt = $pdo->prepare($query);
          $stmt->execute(['search' => "%$searchQuery%"]);
        
       
          if ($stmt->rowCount() > 0) {
           
            $results = '';
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          
              $results .= "<p>{$row['Nom']} - {$row['ID']}</p>"; 
              
              echo"<form action='materielist.php' method='post'>
              <input type='submit' value='clear' name='clear'>
              </form>
              ";
              if(isset($_POST["clear"])){
                $quantité = "Quantité : ";
       $conn = mysqli_connect("localhost", "root", "root", "Matos");

       if (!$conn) {
           die("Connexion échouée: " . mysqli_connect_error());
       }
$sql = "SELECT Nom,Quantité,Description FROM Materiels ;
    ";

       if (mysqli_query($conn, $sql)) {
           $result = mysqli_query($conn, $sql);
           if (mysqli_num_rows($result) > 1) {

         
               echo '<div class="container">';

               while ($mat = mysqli_fetch_assoc($result)) {

                   echo ' <div class="box">';
                   echo ' <h2>' . $mat["Nom"] . '</h2>';
                   echo '<p>' . '<b>Description : </b>'. $mat["Description"] . '</p>';
                   echo '<span>' . '<b>' .$quantité . '</b>' . $mat["Quantité"] . '</span>';
                   echo '</div>';
                   echo "<br>";


               }


           }

       }
echo "</div>";
       echo '<footer>
    <div class="foot">
        <ul class="namelist">
            <li>Arnaud</li>
            <li>Alexandre</li>
            <li>Steven</li>
        </ul>
        <span>©MATOS | 2023 | Mentions Légales</span>
    </div>
</footer>';

              }
            }
        
     
            echo '<div>' . $results . '</div>';
          } else {
       
            echo '<div>Aucun résultat trouvé.</div>';
          }
        } catch (PDOException $e) {
      
          echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
        }
        
        
        
        }else{
        

       $quantité = "Quantité : ";
       $conn = mysqli_connect("localhost", "root", "root", "Matos");

       if (!$conn) {
           die("Connexion échouée: " . mysqli_connect_error());
       }
$sql = "SELECT Nom,Quantité,Description FROM Materiels ;
    ";

       if (mysqli_query($conn, $sql)) {
           $result = mysqli_query($conn, $sql);
           if (mysqli_num_rows($result) > 1) {

         
               echo '<div class="container">';

               while ($mat = mysqli_fetch_assoc($result)) {

                   echo ' <div class="box">';
                   echo ' <h2>' . $mat["Nom"] . '</h2>';
                   echo '<p>' . '<b>Description : </b>'. $mat["Description"] . '</p>';
                   echo '<span>' . '<b>' .$quantité . '</b>' . $mat["Quantité"] . '</span>';
                   echo '</div>';
                   echo "<br>";


               }


           }

       }
echo "</div>";
       echo '<footer>
    <div class="foot">
        <ul class="namelist">
            <li>Arnaud</li>
            <li>Alexandre</li>
            <li>Steven</li>
        </ul>
        <span>©MATOS | 2023 | Mentions Légales</span>
    </div>
</footer>';
    }



    } else if($statut == 0){
        echo'<header>
        <nav class="navbar">
            <a href="#" class="logo">MATOS</a>
            <div class="navlinks">
                <div class="relat">
                    <a class="elt elt-hov" href="board.php">Accueil</a>
                </div>
                <div class="relat">
                    <a href="materielist.php" class="elt elt-hov">Matériels</a>
                </div>
                <div class="relat">
                    <a class="elt elt-hov" href="demande.php">Vos réservations</a>
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
       <form action="materielist.php" method="GET">
       <input type="search" name="search" placeholder="search" class="searchbar" onkeydown="if (event.keyCode === 13) this.form.submit()">
       </form>
    
                   </div>
           ';
           if(isset($_GET["search"])){
    
         
            $searchQuery = $_GET['search'];
            
          
            $host = 'localhost';
            $dbName = 'Matos';
            $username = 'root';
            $password = 'root';
            
            try {
              $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $password);
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            
              $query = "SELECT * FROM Materiels WHERE Nom LIKE :search";
              $stmt = $pdo->prepare($query);
              $stmt->execute(['search' => "%$searchQuery%"]);
            
        
              if ($stmt->rowCount() > 0) {
               
                $results = '';
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                 
                  $results .= "<p>{$row['Nom']} - {$row['ID']}</p>"; 
                  
                  echo"<form action='materielist.php' method='post'>
                  <input type='submit' value='clear' name='clear'>
                  </form>
                  ";
                  if(isset($_POST["clear"])){
                    $quantité = "Quantité : ";
           $conn = mysqli_connect("localhost", "root", "root", "Matos");
    
           if (!$conn) {
               die("Connexion échouée: " . mysqli_connect_error());
           }
    $sql = "SELECT Nom,Quantité,Description FROM Materiels ;
        ";
    
           if (mysqli_query($conn, $sql)) {
               $result = mysqli_query($conn, $sql);
               if (mysqli_num_rows($result) > 1) {
    
             
                   echo '<div class="container">';
    
                   while ($mat = mysqli_fetch_assoc($result)) {
    
                       echo ' <div class="box">';
                       echo ' <h2>' . $mat["Nom"] . '</h2>';
                       echo '<p>' . '<b>Description : </b>'. $mat["Description"] . '</p>';
                       echo '<span>' . '<b>' .$quantité . '</b>' . $mat["Quantité"] . '</span>';
                       echo '</div>';
                       echo "<br>";
    
    
                   }
    
    
               }
    
           }
    echo "</div>";
           echo '<footer>
        <div class="foot">
            <ul class="namelist">
                <li>Arnaud</li>
                <li>Alexandre</li>
                <li>Steven</li>
            </ul>
            <span>©MATOS | 2023 | Mentions Légales</span>
        </div>
    </footer>';
    
                  }
                }
            
           
                echo '<div>' . $results . '</div>';
              } else {
                // Affiche un message si aucun résultat n'a été trouvé
                echo '<div>Aucun résultat trouvé.</div>';
              }
            } catch (PDOException $e) {
             
              echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
            }
            
            
            
            }else{
            
    
           $quantité = "Quantité : ";
           $conn = mysqli_connect("localhost", "root", "root", "Matos");
    
           if (!$conn) {
               die("Connexion échouée: " . mysqli_connect_error());
           }
    $sql = "SELECT Nom,Quantité,Description FROM Materiels ;
        ";
    
           if (mysqli_query($conn, $sql)) {
               $result = mysqli_query($conn, $sql);
               if (mysqli_num_rows($result) > 1) {
    
             
                   echo '<div class="container">';
    
                   while ($mat = mysqli_fetch_assoc($result)) {
    
                       echo ' <div class="box">';
                       echo ' <h2>' . $mat["Nom"] . '</h2>';
                       echo '<p>' . '<b>Description : </b>'. $mat["Description"] . '</p>';
                       echo '<span>' . '<b>' .$quantité . '</b>' . $mat["Quantité"] . '</span>';
                       echo '</div>';
                       echo "<br>";
    
    
                   }
    
    
               }
    
           }
    echo "</div>";
           echo '<footer>
        <div class="foot">
            <ul class="namelist">
                <li>Arnaud</li>
                <li>Alexandre</li>
                <li>Steven</li>
            </ul>
            <span>©MATOS | 2023 | Mentions Légales</span>
        </div>
    </footer>';
        }

    }

    

    // Fermeture de la connexion à la base de données
 $conn->close();




?>






</body>
</html>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="css/demande.css">
  
</head>
<body>

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

<main>
   
       ';
    $sqldemandeencours = "SELECT * FROM Emprunt WHERE statut = 0; ";
    
    $affichedemande = mysqli_query($conn,$sqldemandeencours);
    if (mysqli_num_rows($affichedemande) > 0 ) {
        
        echo '<div class="container">';
        echo "<span class='bvn'>Bienvenue Admin</span>";
      
        

               while ($mat = mysqli_fetch_assoc($affichedemande)) {
                $sqlnom = "SELECT Nom FROM Materiels WHERE ID =".$mat["ID"].";";
                $resultatnom = mysqli_query($conn,$sqlnom);
                $nom = mysqli_fetch_assoc($resultatnom);

                $sqlIDE = "SELECT Nom,Prenom FROM utilisateurs WHERE IDE = ".$mat["IDE"].";";
                $resultnom = mysqli_query($conn,$sqlIDE);
                $nomETU = mysqli_fetch_assoc($resultnom);
                

                    echo ' <div class="boxdem">';
                    echo ' <h2 class="ID">' . "ID de l'utilisateur :  ". $mat["ID"] . '</h2>';
                    echo ' <h2 class="obj">' . $nom["Nom"] . '</h2>';
                    
                    echo ' <h2 class="nom">' . $nomETU["Nom"].'  '.$nomETU["Prenom"]. '</h2>';
                    echo '<p>' . $mat["IDE"] . '</p>';
                    echo '<span>'." Date Debut : " . $mat["DateDebut"] . '<br>' . "Date Fin : ". $mat["DateFin"] . '</span>';

                    echo'<span>'.$mat["statut"].'</span>';
                    echo '</div>';
                    echo "<br>";
                    echo"<div class='bouton'>";
                    echo"<form action='demande.php' method ='post'>";
                    echo"<button type='submit' value =".$mat["ID"]." name='agree'>Agree</button>";
                    echo"</form>";
                    echo"<form action='demande.php' method ='post'>";
                    echo"<button type='submit' value =".$mat["ID"]." name='disagree'>Disagree</button>";
                    echo"</form>";
                    echo"<form action='demande.php' method ='post'>";
                    echo"<button type='submit' value =".$mat["ID"]." name='delete'>Delete</button>";
                    echo"</form>";
                    echo"</div>";




               }

               }else{
                echo"<span class='demande>Il n'y a pas de demandes en cours.</span>";
               }
  if(isset($_POST["agree"])){
      $sql2 = "UPDATE Emprunt SET statut = 1 WHERE  ID = ".$_POST["agree"].";";
      $conn2 = mysqli_connect("localhost","root","root","Matos");
      if(mysqli_query($conn2,$sql2)){
          echo "<span class='status'>La demande à bien été accepté.</span>";

      }
  }else if(isset($_POST["delete"])){
      $sql3 = "DELETE FROM EMPRUNT WHERE  ID = ".$_POST["delete"].";";
      $conn3 = mysqli_connect("localhost","root","root","Matos");
      if(mysqli_query($conn3,$sql3)){
          echo "<span class='status'>La demande à bien été supprimé.</span>";
      }
  }else if(isset($_POST["disagree"])){
      $sql4 = "UPDATE Emprunt SET statut = 2 WHERE  ID = ".$_POST["disagree"].";";
      $conn4 = mysqli_connect("localhost","root","root","Matos");
      if(mysqli_query($conn4,$sql4)){
          echo"<span class='status'>La demande à bien été refusé.</span>";
      }
  }
    echo '</main>';

}else if($row["Role"] == 0){
        echo " 
        <div class='pagecontain'>
        <header>
            <nav class='navbar'>
                <a href='#' class='logo'>MATOS</a>
                <div class='navlinks'>
                    <div class='relat'>
                        <a class='elt elt-hov' href='board.php'>Accueil</a>
                    </div>
                    <div class='relat'>
                        <a href='materielist.php' class='elt elt-hov'>Matériels</a>
                    </div>
                    <div class='relat'>
                        <a class='elt elt-hov' href='#'>Vos réservations</a>
                    </div>
                    <div class='relat'>
                        <a href='reservation.php' class='elt elt-hov'>Réserver</a>
                    </div>
                    <div class='ligne'></div>
                    <ion-icon name='person' class='icon' onclick='taille()'></ion-icon>
                </div>
            </nav>
        </header>
    
          <div class='deco'>
              <div class='box'>
                  <ion-icon name='log-out-outline'></ion-icon>
                  <a href='déconnexion.php'>Déconnexion</a>
              </div>
          </div>
          
          <main>";

        $emailuti = $_SESSION["emailuti"];
          $sqldemandeuti = "SELECT * FROM utilisateurs WHERE Email = '$emailuti';";
          $connuti = mysqli_connect("localhost","root","root","Matos");
          
          if(mysqli_query($connuti, $sqldemandeuti)){
            $resultdemuti = mysqli_query($connuti, $sqldemandeuti);

            $uti = mysqli_fetch_assoc($resultdemuti);
            $uti = $uti["IDE"];
            $demandeutiencours = "SELECT * FROM EMPRUNT WHERE IDE = ".$uti.";";
            if(mysqli_query($connuti,$demandeutiencours)){
                $resultdemande = mysqli_query($connuti,$demandeutiencours);
                echo '<div class="container">';
                echo "Bienvenue Utilisateur";
                while($demuti = mysqli_fetch_assoc($resultdemande) ){
                    $sqlnom = "SELECT Nom FROM Materiels WHERE ID =".$demuti["ID"].";";
                $resultatnom = mysqli_query($conn,$sqlnom);
                $nom = mysqli_fetch_assoc($resultatnom);
                    echo ' <div class="box">';
                   echo ' <h2>' . $demuti["ID"] . '</h2>';
                   echo ' <h2>' . $nom["Nom"] . '</h2>';
                   
             
                  
                   
                   echo '<p>' . $demuti["IDE"] . '</p>';
                   echo '<span>'." Date Debut:".'<br>'. $demuti["DateDebut"] .'<br>'."Date Fin:".'<br>'. $demuti["DateFin"] . '</span>';
                   
                   echo'<span>'.$demuti["statut"].'</span>';
                   echo '</div>';
                   echo "<br>";
                    echo "<br>";
                    if($demuti["statut"] == 0){
                        echo "demande en attente";
                    }else if($demuti["statut"] == 1){
                            echo"demande validée";
                                    }else if($demuti["statut"]==2){
                                        echo" votre demande à été refusé et sera supprimer dans les plus bref délais";
                                    }
                    

               

                

          

                    
                }
                
            }
            }

            echo '</main>';
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

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="js/reservation.js"></script>
</body>
</html>
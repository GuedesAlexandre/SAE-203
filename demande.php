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
   
       ';
    $sqldemandeencours = "SELECT * FROM Emprunt WHERE statut = 0; ";
    $affichedemande = mysqli_query($conn,$sqldemandeencours);
    if (mysqli_num_rows($affichedemande) > 0) {
        
        echo '<div class="container">';
        echo "Bienvenue Admin";

               while ($mat = mysqli_fetch_assoc($affichedemande)) {

                   echo ' <div class="box">';
                   echo ' <h2>' . $mat["ID"] . '</h2>';
                   echo '<p>' . $mat["IDE"] . '</p>';
                   echo '<span>'." Date Debut:".'<br>'. $mat["DateDebut"] .'<br>'."Date Fin:".'<br>'. $mat["DateFin"] . '</span>';
                   
                   echo'<span>'.$mat["statut"].'</span>';
                   echo '</div>';
                   echo "<br>";
                    echo "<br>";
                    echo"<div class='bouton'>";
                    echo"<form action='demande.php' method ='post'>";
                    echo"<button type='submit' value =".$mat["ID"]." name='agree'>agree</button>";
                    echo"</form>";
                    echo"<form action='demande.php' method ='post'>";
                    echo"<button type='submit' value =".$mat["ID"]." name='disagree'>disagree</button>";
                    echo"</form>";
                    echo"<form action='demande.php' method ='post'>";
                    echo"<button type='submit' value =".$mat["ID"]." name='delete'>delete</button>";
                    echo"</form>";
                    echo"</div>";




               }

               }else{
                echo"il n'y a pas de demandes en cours";
               }
  if(isset($_POST["agree"])){
      $sql2 = "UPDATE Emprunt SET statut = 1 WHERE  ID = ".$_POST["agree"].";";
      $conn2 = mysqli_connect("localhost","root","root","Matos");
      if(mysqli_query($conn2,$sql2)){
          echo"good";

      }
  }else if(isset($_POST["delete"])){
      $sql3 = "DELETE FROM EMPRUNT WHERE   ID = ".$mat["ID"].";";
      $conn3 = mysqli_connect("localhost","root","root","Matos");
      if(mysqli_query($conn3,$sql3)){
          echo "demande supprimé";
      }
  }else if(isset($_POST["disagree"])){
      $sql4 = "UPDATE Emprunt SET statut = 2 WHERE ID = ".$mat["ID"].";";
      $conn4 = mysqli_connect("localhost","root","root","Matos");
      if(mysqli_query($conn4,$sql4)){
          echo"demande refusé";
      }
  }
    }else if($row["Role"] == 0){
       
   }
   

?>
</body>
</html>
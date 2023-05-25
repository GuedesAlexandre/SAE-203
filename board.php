<html>
<head>
    <title>Board</title>
    <link href="css/adminboard.css" rel="stylesheet" />
</head>
<body>

  <div class="pagecontain">
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

      <main>
          <div class="imgtxt">
              <img src="img/casque.png" alt="casque">
              <div class="txt">
                  <h1>SITE DE RESERVATION DE L'IUT DE MEAUX</h1>
                  <?php

                    session_start();
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
                        echo "Bienvenue"."&nbsp". $IDEutilisateur["Prenom"];
                    }

                    ?>
              </div>
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
  </div>


  <?php

  

  ?>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="js/reservation.js"></script>

</body>
</html>

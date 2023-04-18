<html>
<head>
    <title>Board</title>
  <link href="css/formulaire.css" rel="stylesheet" />
</head>
<body>

<?php
session_start();

if (isset($_SESSION['email'])) {
  echo "Bienvenue " . $_SESSION['email'] . $_SESSION['IDE'];
} else {
  header("Location: login.php");
}
?>
</body>
</html>

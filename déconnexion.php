<html>
<head>
    <title>Connexion</title>
  
</head>
<body>

<?php
//déconnexion
session_start ();
session_unset ();
session_destroy ();
header ('location: index.html');
?>
</body>
</html>

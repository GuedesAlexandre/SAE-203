<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reservation.css">
    <title>Reservation</title>
</head>
<body>

    <header>
        <nav class="navbar">
            <div class="navlinks">
                <ul>
                    <a href="#"><li>About</li></a>
                    <a href="#"><li class="logo">MATOS</li></a>
                    <a href="#"><li>Contact</li></a>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="containform">
            <form class="form" action="login.php" method="post">
                <h2>RESERVATION OF EQUIPMENTS</h2>

                <select name="equipement">
                    <option value="0">Select an equipment</option>
                    <option value="1">Monkey D. Fluffy</option>
                    <option value="2">Porkgas D. Ace</option>
                    <option value="3">Ta grand mère</option>
                </select>
                <div class="form-date">
                    <input type="date" name="start" placeholder="Start date" required>
                    <input type="date" name="end" placeholder="End date" required>
                </div>
                <div class="comments">
                    <textarea name="commentaire" cols="30" rows="10" placeholder="Comments..."></textarea>
                </div>
                <div class="btn">
                    <input type="submit" value="SUBMIT">
                </div>
            </form>
        </div>

        <div class="container">
           <h2>HOW TO USE ?</h2>
            <div class="description">
                <ul>
                    <li>1. SELECT THE EQUIPMENTS</li>
                    <li>2. ENTER A START DATE</li>
                    <li>3. ENTER A END DATE</li>
                    <li>4. PUT A COMMENT ON HOW YOU WOULD LIKE TO USE THIS MATERIAL</li>
                    <li>5. SEND THE FORM</li>
                </ul>
           </div>
        </div>
    </main>
    
</body>
</html>
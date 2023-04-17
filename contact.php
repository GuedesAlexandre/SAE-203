<html>
<head>
    <title>Contact Us</title>
    <link href="css/contact.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"/>
</head>
<body>

    <header>
        <nav class="navbar">
            <div class="navlinks">
                <ul>
                    <a href="#"><li>About</li></a>
                    <a href="index.html"><li class="logo">MATOS</li></a>
                    <a href="#"><li>Contact</li></a>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <form class="form" action="formulaire.php " method="post">
            <h2 class="signup">Contact Us</h2>
            <div class="allform">
                <div class="form-name">
                    <input type="text" name="prenom" placeholder="First Name" class="form--input" required>

                </div>
                <div class="form-mail">
                    
                    <input type="email" name="email" placeholder="Email address" class="form--input" required>
                </div>
                <div class="form-pass">
                    <input type="text" name="object" placeholder="Object :" class="form--input" required>
                </div>
                <div class="passconf">

                    <textarea class="form--txt-area" name="Comment"  cols="20" rows="10" placeholder="Comment" ></textarea>
                    
                </div>
            </div>
            
            <input type="submit" class="form--submit" value="Send">

           
        </form>
    </main>


</body>
</html>
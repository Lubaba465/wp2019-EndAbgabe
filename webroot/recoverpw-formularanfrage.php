<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Recover Password</title>

    <link rel ="stylesheet" type ="text/css" href="css/recoverpwo.css">

    </head>

<body>

<header>



    <?php
    include "templates/header.php";
    ?>

</header>

<form method="post" action="recoverpw-emailverschicken.php">
            <div class="recoverpw">
                <h2>Passwort zurücksetzen</h2>
                <p>Bitte geben Sie Ihre E-Mail-adresse ein.</p>

                <input type="email" id="besuchermail" placeholder="Email-Adresse"  name="besuchermail" required>
                <input type="submit" value="Passwort zurücksetzen">
            </div>

</form>
</body>

</html>

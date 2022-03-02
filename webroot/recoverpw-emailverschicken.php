<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Recover Password</title>

    <link rel="stylesheet" type="text/css" href="css/recoverpwo.css">

</head>

<body>

<header>


    <?php
    include "templates/header.php";
    ?>

</header>


<div class="recoverpw">
    <h2>Passwort zurücksetzen</h2>
    <p>Wir haben ihnen eine email verschickt mit einem link um das pw zu aendern.</p>

    <?php

    //Token generieren und in DB speichern.
    $token = 12345;

    //email verschicken

    echo "Link: <a href='http://localhost:/recoverpw-neuespwangeben.php?email=" . $_POST['besuchermail'] . "&token=" . $token . "'>link</a>";

    ?>


</div>


</body>

</html>


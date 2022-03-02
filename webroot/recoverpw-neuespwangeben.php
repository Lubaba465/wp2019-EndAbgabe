<?php

if($_GET['token'] != 12345){
    die("Das Token passt nicht. Hackversuch erkannt.");
}


?>

<form method="post" action="recoverpw-neuespwuebernehmen.php">
    <div class="recoverpw">
        <h2>Passwort </h2>
        <p>Bitte geben Sie Ihre neues Passwort ein.</p>

        <input type="password" placeholder="neues PW" name="passwort" required>
        <input type="submit" value="neues Passwort bestätigen">
    </div>

</form>

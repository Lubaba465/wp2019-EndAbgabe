<?php


ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

include_once("usermodul.php");

try {
    if (isset($_POST["login"])) {
        if (empty($_POST["email"]) || empty($_POST["password"])) {
            $message = '<label>email oder password Feld sind leer</label>';
        } else if (!(empty($_POST["email"]))) {

            einloggen($_POST["email"], $_POST["password"]);
            if (isteingeloggt()) {
                header('Location:/admin.php');

            } else {
                $message = '<center><label style="color: red" >email oder password sind falsch</label></center>';
            }
        }
    }
} catch (PDOException $error) {
    $message = $error->getMessage();
}
?>

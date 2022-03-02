<?php

$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : 'anonym';


if (isset($_POST["newComment"])) {
    if (!empty($_POST["c_text"])) {
        try {

            $user = "root";
            $pw = null;


            $db = $DB;

            $benutzername = datenvonbenutzer()["fname"];
            $sql = "INSERT INTO gc_comments
                          (  c_text,name,time,castleid,userid
                          )
                          VALUES (?,?,?,?,?)";
            $werte = array(
                $_POST["c_text"], $benutzername,
                date("d.m.Y H:i:s"), $castleId,$userid

            );

            $kommando = $db->prepare($sql);

            echo $kommando->execute($werte);




        } catch (PDOException $e) {
            echo 'Fehler: ' . htmlspecialchars($e->getMessage());
        }
    }
}

?>

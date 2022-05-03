<?php

// ratings für user

include_once ($_SERVER['DOCUMENT_ROOT']."/wp2019EndAbgabe/config.php");

if (isset($_POST['rating']) && isset($_POST['castleid'])) {

    $rate = $_POST['rating'];
    $castleId = $_POST['castleid'];

    $userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : 'anonym';

    $db = $DB;

        $sql = "INSERT INTO gc_rating_castles ( rate, userid, castleid) VALUES ( :rate, :userid, :castleId ); ";

        $stmt = $db->prepare($sql);

        $stmt->bindValue(":rate", $rate);

        $stmt->bindValue(":userid", $userid);
        $stmt->bindValue(":castleId", $castleId);

    $errorcode = $stmt->execute();

    echo $errorcode;
    //$ergebnis = $stmt->fetchAll(PDO::FETCH_ASSOC);



}
?>
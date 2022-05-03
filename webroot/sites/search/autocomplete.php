<?php


include_once ($_SERVER['DOCUMENT_ROOT']."/wp2019EndAbgabe/config.php");

if (isset($_GET['term'])) {

    $db = $DB;

    $search = $_GET['term'];

    $sql = "SELECT * FROM gc_castles where name LIKE '%' || (:search) || '%' or county LIKE  '%' || (:search) || '%' ";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(":search", $search);

    $errorcode = $stmt->execute();
    $ergebnis = $stmt->fetchAll(PDO::FETCH_ASSOC);


    echo "[";

    $i = 0;

    foreach ($ergebnis as $zeile) {

        echo "\"";

        echo $zeile["name"];


        echo "\"";
        $i++;
        if (sizeof($ergebnis) > $i) {
            echo ",";
        }

    }


    echo "]";
}?>
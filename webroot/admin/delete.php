<?php
//require('../libs/config.php');
include_once ($_SERVER['DOCUMENT_ROOT']."/wp2019EndAbgabe/config.php");

$db = $DB;
//$db = new PDO("sqlite:../database/german_castles.db");

//$db = new PDO("sqlite:../database/german_castles.db");
//try {
//    $id = $_REQUEST['del'];
//    $query = "DELETE FROM " . TABLE_CASTLES . " WHERE castleid = $id";
//    $stmt = $DB->prepare($query);
//    $stmt->execute();
if (isset($_GET["castleid"]) && $_GET["castleid"] != "") {
    $id = $_GET['castleid'];
    $query = "DELETE FROM " . TABLE_CASTLES . " WHERE castleid = $id";
    try {
        $stmt = $db->prepare($query);
        $stmt->execute();
        // header("Location: ../admin.php");
//        } catch (Exception $ex) {
//            echo errorMessage($ex->getMessage());
//        }

//        if ($stmt->rowCount() > 0) {
//            $msg = successMessage("Record deleted successfully");
//        } else {
//            $msg = errorMessage(mysql_error());
//        }
//    }
    } catch (Exception $ex) {
        echo "Fehler";//errorMessage($ex->getMessage());
    }
}

if (isset($_GET["magazinid"]) && $_GET["magazinid"] != "") {
    $id = $_GET['magazinid'];


    $sql = "DELETE FROM " . TABLE_CASTLE_MAGAZIN . " WHERE magazinid = $id";

    try {

        $stmt = $db->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo "Fehler";//errorMessage($ex->getMessage());
    }
}
/*
if (isset($_GET["ratCastleid"]) && $_GET["ratCastleid"] != "") {
    $id = $_GET['ratCastleid'];
    $query = "DELETE FROM " . TABLE_RATING_CASTLES . " WHERE ratingid = $id";
    try {
        $stmt = $db->prepare($query);
        $stmt->execute();
    } catch (Exception $ex) {
        echo "Fehler";//errorMessage($ex->getMessage());
    }
}

if (isset($_GET["ratFotoid"]) && $_GET["ratFotoid"] != "") {
    $id = $_GET['ratFotoid'];
    $query = "DELETE FROM " . TABLE_RATING_FOTOS . " WHERE ratingid = $id";
    try {
        $stmt = $db->prepare($query);
        $stmt->execute();
    } catch (Exception $ex) {
        echo "Fehler";//errorMessage($ex->getMessage());
    }
}*/
?>

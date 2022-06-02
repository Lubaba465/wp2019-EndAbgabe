<?php
require($_SERVER['DOCUMENT_ROOT'] . '/wp2019EndAbgabe/config.php');

session_start();
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : 'anonym';

if (isset($_POST["newMagazin"])) {
    try {
        $db_user = "root";
        $db_pass = "";
        $db_name = "german_castles";

        $db = new PDO("mysql:host=localhost;dbname=$db_name;" , $db_user, $db_pass);
        $create_date = date("Y-m-d H:i:s");
        $sql = "INSERT INTO " . TABLE_CASTLE_MAGAZIN .
            "(    castleid,
                  userid,
                  magazin_type,
                  magazin_name,
                  magazin_desc,
                  magazin_date,
                  url,
                  active,
                  countyid,
                  city,
                  create_date
                  )
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $values = array(
            $_POST["castle"]
          ,
            $userid,
            $_POST["magazinType"],
            $_POST["magazinname"],
            $_POST["magazindesc"],
            $_POST["magazindate"],
            $_POST["url"],
            ($_POST['active'] == 'Y') ? 'Y' : 'N',
            $_POST["counties"],
            $_POST["city"],
            $create_date
        );

        $command = $db->prepare($sql);
        $command->execute($values);
//        echo "Eintrag hinzugef&uuml;gt.";

    } catch (PDOException $e) {
        echo 'Fehler: ' . htmlspecialchars($e->getMessage());
    }
}

if (isset($_POST["updMagazin"])) {
    try {
        $db_user = "root";
        $db_pass = "";
        $db_name = "german_castles";

        $db = new PDO("mysql:host=localhost;dbname=$db_name;" , $db_user, $db_pass);
        $update_date = date("Y-m-d H:i:s");

        $sql = "UPDATE " . TABLE_CASTLE_MAGAZIN . " SET
                magazin_type ='" . $_POST["magazinType"] . "',
                magazin_name ='" . $_POST["magazinname"] . "',
                magazin_desc ='" . $_POST["magazindesc"] . "',
                magazin_date ='" . $_POST["magazindate"] . "',
                url ='" . $_POST["url"] . "',
                active ='" . $_POST["active"] . "',
                city ='" . $_POST["city"] . "',              
                update_date ='" . $update_date . "'               
                WHERE magazinid = " . $_POST["magazinid"];

        echo $sql;

        $stmt = $db->query($sql);
        if ($stmt->rowCount() > 0) {
            session_destroy();
            echo 'Ihre Daten wurden aktualisiert!';
        } else {
            echo 'Ihr Daten wurden nicht aktualisiert!';

        }
    } catch (PDOException $e) {
        echo 'Fehler: ' . htmlspecialchars($e->getMessage());
    }
}


class magazin_controller
{


    function __construct()
    {

        $db_user = "root";
        $db_pass = "";
        $db_name = "german_castles";

        $db = new PDO("mysql:host=localhost;dbname=$db_name;" , $db_user, $db_pass);

        if(isset($_SESSION['userid'])){
            $this->userid = $_SESSION['userid'];
        }
    }
    function getCounties()
    {
        try {
            $db_user = "root";
            $db_pass = "";
            $db_name = "german_castles";
            $db = new PDO("mysql:host=localhost;dbname=$db_name;" , $db_user, $db_pass);

            $sql = "SELECT * FROM " . TABLE_COUNTIES;
            $rs = $db->query($sql);
        } catch (Exception $ex) {
            echo errorMessage($ex->getMessage());
        }
        return $rs;
    }

    function getMagazinInfoID($id)
    {
        try {

            $db_user = "root";
            $db_pass = "";
            $db_name = "german_castles";

            $db = new PDO("mysql:host=localhost;dbname=$db_name;" , $db_user, $db_pass);
//            $sql = "SELECT * FROM " . TABLE_CASTLES . "WHERE castleid = '" . $id . "'";
            $sql = "SELECT * FROM " . TABLE_CASTLE_MAGAZIN . " WHERE 
                magazinid = '" . $id . "' LIMIT 1";
            $rs = $db->prepare($sql);
            $rs->execute();
        } catch (Exception $ex) {
            echo errorMessage($ex->getMessage());
        }
        return $rs->fetch();
    }
    function getMagazinUser($user)
    {
        try {
            $db_user = "root";
            $db_pass = "";
            $db_name = "german_castles";

            $db = new PDO("mysql:host=localhost;dbname=$db_name;" , $db_user, $db_pass);
            $sql = "SELECT * FROM " . TABLE_CASTLE_MAGAZIN . " WHERE 
                userid = '" . $user . "'";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            header("Content-Type: image");

        } catch (Exception $ex) {
            echo errorMessage($ex->getMessage());
        }
        return $stmt;//array("mimetype" => $mime, "fotodata" => $data);
    }
}
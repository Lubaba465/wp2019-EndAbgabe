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
            $_POST["castle"],
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
        header("Location: ../admin.php");
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
                magazin_type ='" . $_POST["magazintype"] . "',
                magazin_name ='" . $_POST["magazinname"] . "',
                magazin_desc ='" . $_POST["magazindesc"] . "',
                magazin_date ='" . $_POST["magazindate"] . "',
                url ='" . $_POST["url"] . "',
                active ='" . $_POST["active"] . "',
                city ='" . $_POST["city"] . "',              
                update_date ='" . $update_date . "'               
                WHERE magazinid = " . $_POST["magazinid"];

//        echo $sql;

        $stmt = $db->prepare($sql);
        $stmt->execute();

//        $len = count($_FILES['images']['tmp_name']);
//
//        for($i = 0; $i < $len; $i++) {
//            $fileSize = $_FILES['attachments']['size'][$i];
        // change size to whatever key you need - error, tmp_name etc
//        }

        foreach ($_FILES['images']['tmp_name'] as $key => $val) {
//            $key = $_FILES['images']['tmp_name'][$i];
            $castleid = $_POST["castleid"];
            $userid = "carola";
            $targetDir = "../img/uploads/";

            $filename = $_FILES['images']['name'][$key];
            $filetype = $_FILES['images']['type'][$key];
            $filetempname = $_FILES['images']['tmp_name'][$key];

            $targetFilePath = $targetDir . $filename;

//            $is_main = ($i == $len - 1) ? 'Y' : 'N';

            if (move_uploaded_file($filetempname, $targetFilePath)) {
                // Image db insert sql
                insertImage($filetempname, $filename, $filetype, $castleid, $userid, 'N');
            } else {
                $errorUpload .= $_FILES['files']['name'][$key] . ', ';
            }
//            header("Location: ../admin.php");
//            header("Content-Type: image");
//            $blobObj = new BobManager();
//            $blobObj->insertBlob($filetempname, $filename, $filetype, $castleid, $userid);

//            echo '<img width="200" height="200" src="data:' . $a['mimetype'] . ';base64,' . base64_encode($a['fotodata']) . '"/>';
//            $blobObj = null;
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

    function getMagazinUser()
    {
        try {
            $db_user = "root";
            $db_pass = "";
            $db_name = "german_castles";

            $db = new PDO("mysql:host=localhost;dbname=$db_name;" , $db_user, $db_pass);
            $sql = "SELECT * FROM " . TABLE_CASTLE_MAGAZIN . " WHERE 
                userid = '" . $this->userid . "'";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            header("Content-Type: image");

        } catch (Exception $ex) {
            echo errorMessage($ex->getMessage());
        }
        return $stmt;//array("mimetype" => $mime, "fotodata" => $data);
    }
}
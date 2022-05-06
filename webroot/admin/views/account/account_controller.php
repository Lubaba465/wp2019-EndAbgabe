<?php
require($_SERVER['DOCUMENT_ROOT'] . '/wp2019EndAbgabe/config.php');

$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : 'anonym';

$db = $DB;


if (isset($_POST["fname"])) {
    try {


            $sql = "UPDATE " . TABLE_USERS . " SET
                fname ='" . $_POST["fname"] . "',
                lname ='" . $_POST["lname"] . "',
                email ='" . $_POST["email"] . "'
                 WHERE userid = '" . $userid . "'";
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

if (isset($_GET["pw"])) {
    try {
        if (checkAccountInfo($userid, $_GET["pw"])) {
            $sql = "UPDATE " . TABLE_USERS . " SET
                active ='N',
                update_date = datetime('now')               
                WHERE userid = '" . $userid . "'";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                session_destroy();
                echo 'Ihr Konto wurde deaktiviert!';
            } else {
                echo 'Ihr Konto wurde nicht deaktiviert!';
            }
        }
    } catch (PDOException $e) {
        echo 'Fehler: ' . htmlspecialchars($e->getMessage());
    }
}

if (isset($_GET["oldPW"]) && isset($_GET["newPW"])) {
    try {
        if (checkAccountInfo($userid, $_GET["oldPW"])) {
            $hash = password_hash($_GET["newPW"], PASSWORD_BCRYPT);
            $sql = "UPDATE " . TABLE_USERS . " SET
                password ='" . $hash . "',
                update_date = datetime('now')               
                WHERE userid = '" . $userid . "'";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                session_destroy();
                echo 'Ihr Passwort wurde aktualisiert!';
            } else {
                echo 'Ihr Passwort wurde nicht aktualisiert!';
            }
        }
    } catch (PDOException $e) {
        echo 'Fehler: ' . htmlspecialchars($e->getMessage());
    }
}

function checkAccountInfo($userid, $password)
{
    $flag = false;
    try {
        $dns = DB_DRIVER . ':' . DB_DATABASE;
        $db = new PDO($dns);
        $sql = "SELECT * FROM " . TABLE_USERS . " WHERE 
                userid = '" . $userid . "' LIMIT 1";
        $rs = $db->query($sql);
        $row = $rs;
        $hash = $row['password'];

        if (password_verify($password, $hash)) {
            $flag = true;
        } else {
            echo 'Falsches Passwort';
        }

    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
    return $flag;
}

class account_controller
{
    var $dns = null;
    var $db = null;
    var $userid = "anonym";

    function __construct()
    {
        $this->dns = DB_DRIVER . ':' . DB_DATABASE;
        $this->db = new PDO($this->dns);
        if (isset($_SESSION['userid'])) {
            $this->userid = $_SESSION['userid'];
        }
    }

    function getAccountData()
    {
        $db_user = "root";
        $db_pass = "";
        $db_name = "german_castles";

        $db = new PDO("mysql:host=localhost;dbname=$db_name;" , $db_user, $db_pass);

        $userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : 'anonym';

        try {
            $sql = "SELECT * FROM " . TABLE_USERS . "  WHERE 
                userid = '" . $userid . "' ";
            $rs = $db->query($sql);
        } catch (Exception $ex) {
            echo errorMessage($ex->getMessage());
        }
        return $rs->fetch();
    }
}
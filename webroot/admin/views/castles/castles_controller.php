<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . '/wp2019EndAbgabe/config.php');
session_start();

$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : 'anonym';
$db = $DB;

if (isset($_POST["castlename"])) {


    $mountain = isset($_POST['mountain']) == 'Y' ? 'Y' : 'N';
    $desert = isset($_POST['desert']) == 'Y' ? 'Y' : 'N';
    $forest = isset($_POST['forest']) == 'Y' ? 'Y' : 'N';
    $sea = isset($_POST['sea']) == 'Y' ? 'Y' : 'N';
    $disabled = isset($_POST['disabled']) == 'Y' ? 'Y' : 'N';
    $parking = isset($_POST['parking']) == 'Y' ? 'Y' : 'N';
    $gastro = isset($_POST['gastro']) == 'Y' ? 'Y' : 'N';
    $userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : 'anonym';
    try {
        $db_user = "root";
        $db_pass = "";
        $db_name = "german_castles";
        $db = new PDO("mysql:host=localhost;dbname=$db_name;" , $db_user, $db_pass);

        $create_date = date("Y-m-d H:i:s");
        $sql = "INSERT INTO " . TABLE_CASTLES . "(
                  userid,
                  name,
                  description,
                  construction_year,
                  castle_size,
                  county,
                  city,
                  street,
                  zipcode,
                  near_mountain,
                  near_desert,
                  near_forest,
                  near_sea,
                  disabled_access,
                  parking,
                  gastronomy,
                  email,
                  website,
                  facebook,
                  instagram,
                  twitter,
                  lat,
                  lng,
                  create_date
                  )
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $values = array(
            $userid,
            $_POST["castlename"],
            $_POST["castledesc"],
            ($_POST["year"] == "") ? 0 : $_POST["year"],
            ($_POST["size"] == "") ? 0 : $_POST["size"],
            $_POST["counties"],
            $_POST["city"],
            $_POST["address"],
            $_POST["zipcode"],
            $mountain,
            $desert,
            $forest,
            $sea,
            $disabled,
            $parking,
            $gastro,
            $_POST["email"],
            $_POST["website"],
            $_POST["facebook"],
            $_POST["instagram"],
            $_POST["twitter"],
            $_POST["lat"],
            $_POST["lng"],
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

if (isset($_POST["fth"])) {
    try {
        $db_user = "root";
        $db_pass = "";
        $db_name = "german_castles";
        $db = new PDO("mysql:host=localhost;dbname=$db_name;" , $db_user, $db_pass);

        $update_date = date("Y-m-d H:i:s");
        $mountain = isset($_POST['mountain']) == 'Y' ? 'Y' : 'N';
        $desert = isset($_POST['desert']) == 'Y' ? 'Y' : 'N';
        $forest = isset($_POST['forest']) == 'Y' ? 'Y' : 'N';
        $sea = isset($_POST['sea']) == 'Y' ? 'Y' : 'N';
        $disabled = isset($_POST['disabled']) == 'Y' ? 'Y' : 'N';
        $parking = isset($_POST['parking']) == 'Y' ? 'Y' : 'N';
        $gastro = isset($_POST['gastro']) == 'Y' ? 'Y' : 'N';
        $sql = "UPDATE " . TABLE_CASTLES . " SET
                name ='" . $_POST["castlename"] . "',
                description ='" . $_POST["castledesc"] . "',
                construction_year ='" . $_POST["year"] . "',
                castle_size ='" . $_POST["size"] . "',
                city ='" . $_POST["city"] . "',
                street ='" . $_POST["address"] . "',
                zipcode ='" . $_POST["zipcode"] . "',              
                near_mountain ='" . $mountain . "',
                near_desert ='" . $desert . "',
                near_forest ='" . $forest . "',
                near_sea ='" . $sea . "',
                disabled_access ='" . $disabled . "',
                parking ='" . $parking . "',
                gastronomy ='" . $gastro . "',
                email ='" . $_POST["email"] . "',
                website ='" . $_POST["website"] . "',
                facebook ='" . $_POST["facebook"] . "',
                instagram ='" . $_POST["instagram"] . "',
                twitter ='" . $_POST["twitter"] . "',
                lat ='" . $_POST["lat"] . "',
                lng ='" . $_POST["lng"] . "',                
                update_date ='" . $update_date . "'               
                WHERE castleid ='".$_POST["castleid"]."'";

        $stmt = $db->prepare($sql);
        $stmt->execute();


//        $len = count($_FILES['images']['tmp_name']);
//
//        for($i = 0; $i < $len; $i++) {
//            $fileSize = $_FILES['attachments']['size'][$i];
        // change size to whatever key you need - error, tmp_name etc
//        }
        if (isset($_FILES['images'])) {
            foreach ($_FILES['images']['tmp_name'] as $key => $val) {
//            $key = $_FILES['images']['tmp_name'][$i];
                $castleid = $_POST["castleid"];
                $targetDir = "../img/uploads/";

                $filename = $_FILES['images']['name'][$key];
                $filetype = $_FILES['images']['type'][$key];
                $filetempname = $_FILES['images']['tmp_name'][$key];

                $targetFilePath = $targetDir . $filename;

//            $is_main = ($i == $len - 1) ? 'Y' : 'N';

                if (move_uploaded_file($filetempname, $targetFilePath)) {
                    // Image db insert sql
                    insertImage($filetempname, $filename, $filetype, $castleid, $userid, 'N');
                    if ($stmt->rowCount() > 0) {
                        session_destroy();
                        echo 'Ihr Konto wurde deaktiviert!';
                    } else {
                        echo 'Ihr Konto wurde nicht deaktiviert!';
                    }

                } else {
                    $errorUpload = $_FILES['images']['name'][$key] . ', ';
                }
                header("Location: ../admin.php");

//            header("Content-Type: image");
//            $blobObj = new BobManager();
//            $blobObj->insertBlob($filetempname, $filename, $filetype, $castleid, $userid);

//            echo '<img width="200" height="200" src="data:' . $a['mimetype'] . ';base64,' . base64_encode($a['fotodata']) . '"/>';
//            $blobObj = null;
            }}

    } catch (PDOException $e) {
    echo 'Fehler: ' . htmlspecialchars($e->getMessage());
}
}

class castles_controller
{
    var $dns = null;
    var $db = null;
    var $userid = "anonym";

    function __construct()
    {
        $this->dns = DB_DRIVER . ':' . DB_DATABASE;
        $this->db = new PDO($this->dns);
        if(isset($_SESSION['userid'])){
            $this->userid = $_SESSION['userid'];
        }
    }

    function getCastlesAdmin()
    {
        $db_user = "root";
        $db_pass = "";
        $db_name = "german_castles";

        $conn = new PDO("mysql:host=localhost;dbname=$db_name;" , $db_user, $db_pass);

        try {
            $query = "SELECT * FROM gc_castles WHERE userid = 'lubaba'";
              $stmt = $conn->query($query);
            $roww = $stmt;
        } catch (Exception $ex) {
            echo errorMessage($ex->getMessage());
        }

return $roww;
    }

    function getCastleInfoID($id){
        try {
//            $sql = "SELECT * FROM " . TABLE_CASTLES . "WHERE castleid = '" . $id . "'";

            $db_user = "root";
            $db_pass = "";
            $db_name = "german_castles";
            $db = new PDO("mysql:host=localhost;dbname=$db_name;" , $db_user, $db_pass);

            $sql = "SELECT * FROM gc_castles WHERE 
                castleid = '" . $id . "' ";
            $rs = $db->query($sql);
        } catch (Exception $ex) {
            echo errorMessage($ex->getMessage());
        }
        return $rs->fetch();

    }

    function getMagazinInfoID($id)
    {
        try {
//            $sql = "SELECT * FROM " . TABLE_CASTLES . "WHERE castleid = '" . $id . "'";
            $sql = "SELECT * FROM " . TABLE_CASTLE_MAGAZIN . " WHERE 
                magazinid = '" . $id . "' LIMIT 1";
            $rs = $this->db->prepare($sql);
            $rs->execute();
        } catch (Exception $ex) {
            echo errorMessage($ex->getMessage());
        }
        return $rs->fetch();
    }

//    function getCastleFotosUser($userid, $castleid)
    function getCastleFotosUser($castleid)
    {
        try {
            $db_user = "root";
            $db_pass = "";
            $db_name = "german_castles";
            $db = new PDO("mysql:host=localhost;dbname=$db_name;" , $db_user, $db_pass);

            $sql = "SELECT * FROM " . TABLE_CASTLE_FOTOS . " WHERE 
                userid = '" . $this->userid . "' AND 
                castleid = '" . $castleid . "' LIMIT 1";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            header("Content-Type: image");

        } catch (Exception $ex) {
            echo errorMessage($ex->getMessage());
        }
        return $stmt->fetch();
                                                                                                                                                                                                     }

    function getMainFotoCastle($castleid)
    {
        try {
            $db_user = "root";
            $db_pass = "";
            $db_name = "german_castles";
            $db = new PDO("mysql:host=localhost;dbname=$db_name;" , $db_user, $db_pass);

//            include is_main = 'Y'
            $sql = "SELECT * FROM  gc_castle_fotos WHERE 
                userid = 'lubaba' AND 
                castleid = 1 ";
            $stmt = $db->query($sql);



            header("Content-Type: image");

            $ergebnis = $stmt->fetch(PDO::FETCH_ASSOC);





        } catch (Exception $ex) {
            echo errorMessage($ex->getMessage());
        }
        return $ergebnis;
    }

//    function getFotosUser($userid)
    function getFotosUser()
    {
        try {
            $db_user = "root";
            $db_pass = "";
            $db_name = "german_castles";
            $db = new PDO("mysql:host=localhost;dbname=$db_name;" , $db_user, $db_pass);

            $sql = "SELECT * FROM " . TABLE_CASTLE_FOTOS . " WHERE 
                userid = '" . $this->userid . "'";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            header("Content-Type: image");

        } catch (Exception $ex) {
            echo errorMessage($ex->getMessage());
        }
        return $stmt;//array("mimetype" => $mime, "fotodata" => $data);
    }

//    function getMagazinUser($userid)


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
}
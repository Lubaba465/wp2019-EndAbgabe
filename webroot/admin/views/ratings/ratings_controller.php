<?php
require($_SERVER['DOCUMENT_ROOT'] . '/../config.php');

$db = $DB;

if (isset($_POST['rate']) && !empty($_POST['rate'])) {
    $rate = $_POST['rate'];

    $create_date = date("Y-m-d H:i:s");
// check if user has already rated
    $sql = "SELECT COUNT(*) [rate_count], id FROM " . TABLE_RATING_CASTLES . " WHERE user_id = '" . $ipaddress . "'";
    $result = $conn->prepare($sql);
    //$row = $result->fetch();
    $result->execute();
    $row = $result->fetch();
    if ($row["rate_count"] > 0) {
        echo $row["id"];
//        echo "test";
    } else {

        $sql = "INSERT INTO `tbl_rating` ( `rate`, `user_id`) VALUES ('" . $rate . "', '" . $ipaddress . "'); ";
        $conn->query($sql);
        //        if (mysqli_query($conn, $sql)) {
//            echo "0";
//        }
    }
}

class ratings_controller
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

    function getCastleRatingsSessionUser()
    {
        try {
            $sql = "SELECT 'C' || t1.ratingid [id], t0.name [castle_name], t1.* FROM " . TABLE_CASTLES . " t0 
                    INNER JOIN " . TABLE_RATING_CASTLES . " t1 on t0.castleid = t1.castleid
                    WHERE t1.userid = '" . $this->userid . "'";

            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            header("Content-Type: image");

        } catch (Exception $ex) {
            echo errorMessage($ex->getMessage());
        }
        return $stmt;
    }

    function getFotoRatingsSessionUser()
    {
        try {
            $sql = "SELECT 'F' || t1.ratingid [id], t1.*, t2.name [castle_name], t0.castleid, t0.file_name, t0.mimetype 
                    FROM " . TABLE_CASTLE_FOTOS . " t0 
                    INNER JOIN " . TABLE_RATING_FOTOS . " t1 ON t0.fotoid = t1.fotoid
                    INNER JOIN " . TABLE_CASTLES . " t2 ON t0.castleid = t2.castleid
                    WHERE t1.userid = '" . $this->userid . "'";

            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            header("Content-Type: image");

        } catch (Exception $ex) {
            echo errorMessage($ex->getMessage());
        }
        return $stmt;
    }
}


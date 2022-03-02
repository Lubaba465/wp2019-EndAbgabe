<?php

function errorMessage($str) {
    return '<div style="width:50%; margin:0 auto; border:2px solid #F00;padding:2px; color:#000; margin-top:10px; text-align:center;">' . $str . '</div>';
}

function successMessage($str) {
    return '<div style="width:50%; margin:0 auto; border:2px solid #06C;padding:2px; color:#000; margin-top:10px; text-align:center;">' . $str . '</div>';
}
////function getCastles($pageAlias) {
//function getCastles()
//{
//    global $DB;
//    $rs = array();
//    $sql = "SELECT * FROM " . TABLE_CASTLES;
//
//    try {
//        $stmt = $DB->prepare($sql);
////        $stmt->bindValue(":pname", $pageAlias);
//        $stmt->execute();
//        $results = $stmt->fetchAll();
//    } catch (Exception $ex) {
//        echo errorMessage($ex->getMessage());
//    }
//
//    if (count($results) > 0) {
//        $rs = $results[0];
//    }
//    return $rs;
//}

function insertImage($filePath, $filename, $mime, $castleid, $userid, $is_main) {
//    global $DB;

    $db = $DB;
    $upload_date = date("Y-m-d H:i:s");
//    $blob = fopen($filePath, 'rb');
//        $castleid = 1;
//        $userid = "carola";

    $sql = "INSERT INTO " . TABLE_CASTLE_FOTOS . " 
                (castleid, userid, file_name, mimetype, upload_on, is_main) 
                VALUES(:castleid, :userid, :file_name, :mimetype, :upload_date, :is_main)";
//        $sql = "INSERT INTO " . TABLE_CASTLE_FOTOS . "
//                (castleid, userid, file_name, fotodata, mimetype, upload_on)
//                VALUES(:castleid, :userid, :file_name, :fotodata, :mimetype, :upload_date)";

    $stmt = $db->prepare($sql);
//        $stmt->bindValue(":id", db_prepare_input($_GET["del"]));
    $stmt->bindParam(':castleid', $castleid);
    $stmt->bindParam(':userid', $userid);
    $stmt->bindParam(':file_name', $filename);
//        $stmt->bindParam(':fotodata', $blob, PDO::PARAM_LOB);
    $stmt->bindParam(':mimetype', $mime);
    $stmt->bindParam(':upload_date',$upload_date);
    $stmt->bindParam(':is_main',$is_main);

    return $stmt->execute();
}

class BobManager {

    /**
     * PDO instance
     * @var PDO
     */
    private $pdo = null;

    /**
     * Open the database connection
     */
//    public function __construct() {
//        $user = "root";
//        $pw = null;
//        //$dsn = "mysql:dbname=PHP-PDO-BLOB;host=localhost";
//        //$id_feld = "id INTEGER PRIMARY KEY AUTO_INCREMENT,"; // MySQL-Syntax
//        $dsn = "sqlite:sqlite-pdo-blob.db";
//        $id_feld = "id INTEGER PRIMARY KEY AUTOINCREMENT,"; // SQLite-Syntax
//
//        try {
//            $this->pdo = new PDO($dsn, $user, $pw);
//            $sql = "CREATE TABLE files (" . $id_feld .
//                "    mime VARCHAR (255) NOT NULL," .
//                "    data BLOB          NOT NULL);";
//            $this->pdo->exec($sql);
//            echo "Tabelle angelegt.<br/>";
//        } catch (PDOException $e) {
//            echo $e->getMessage();
//        }
//    }

    /**
     * insert blob into the files table
     * @param string $filePath
     * @param string $mime mimetype
     * @return bool
     */
    public function insertBlob($filePath, $filename, $mime, $castleid, $userid) {
        global $DB;
        $upload_date = date("Y-m-d H:i:s");
        $blob = fopen($filePath, 'rb');
//        $castleid = 1;
//        $userid = "carola";

        $sql = "INSERT INTO " . TABLE_CASTLE_FOTOS . " 
                (castleid, userid, file_name, mimetype, upload_on) 
                VALUES(:castleid, :userid, :file_name, :mimetype, :upload_date)";
//        $sql = "INSERT INTO " . TABLE_CASTLE_FOTOS . "
//                (castleid, userid, file_name, fotodata, mimetype, upload_on)
//                VALUES(:castleid, :userid, :file_name, :fotodata, :mimetype, :upload_date)";

        $stmt = $DB->prepare($sql);
//        $stmt->bindValue(":id", db_prepare_input($_GET["del"]));
        $stmt->bindParam(':castleid', $castleid);
        $stmt->bindParam(':userid', $userid);
        $stmt->bindParam(':file_name', $filename);
//        $stmt->bindParam(':fotodata', $blob, PDO::PARAM_LOB);
        $stmt->bindParam(':mimetype', $mime);
        $stmt->bindParam(':upload_date',$upload_date);

        return $stmt->execute();
    }

    /**
     * update the files table with the new blob from the file specified
     * by the filepath
     * @param int $id
     * @param string $filePath
     * @param string $mime
     * @return bool
     */
    function updateBlob($id, $filePath, $mime) {

        $blob = fopen($filePath, 'rb');

        $sql = "UPDATE files
                SET mime = :mime,
                    data = :data
                WHERE id = :id;";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':mime', $mime);
        $stmt->bindParam(':data', $blob, PDO::PARAM_LOB);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    /**
     * select data from the the files
     * @param int $id
     * @return array contains mime type and BLOB data
     */
//    public function selectBlob($fotoid) {
//        header("Content-Type: image");
//        global $DB;
//        $sql = "SELECT mimetype, fotodata
//                FROM " . TABLE_CASTLE_FOTOS . "
//                WHERE fotoid = :fotoid;";
//        $stmt = $DB->prepare($sql);
//        $stmt->bindParam(':fotoid', $fotoid);
//        $stmt->execute();
////        $stmt->bindColumn(1, $mime);
////        $stmt->bindColumn(2, $data, PDO::PARAM_LOB);
//
//        $stmt->fetch(PDO::FETCH_BOUND);
//        header("Content-Type: image");
//        return array("mimetype" => $mime, "fotodata" => $data);
//    }

    /**
     * close the database connection
     */

    public function __destruct() {
        // close the database connection
        $this->pdo = null;
    }
    function debugResults($var, $strict = false) {
        if ($var != NULL) {
            if ($strict == false) {

                if (is_array($var) || is_object($var)) {
                    echo "<pre>";
                    print_r($var);
                    echo "</pre>";
                } else {
                    echo $var;
                }
            } else {

                if (is_array($var) || is_object($var)) {
                    echo "<pre>";
                    var_dump($var);
                    echo "</pre>";
                } else {
                    var_dump($var);
                }
            }
        } else {
            var_dump($var);
        }
    }


    function simple_redirect($url) {

        echo "<script language=\"JavaScript\">\n";
        echo "<!-- hide from old browser\n\n";

        echo "window.location = \"" . $url . "\";\n";

        echo "-->\n";
        echo "</script>\n";

        return true;
    }

    function getHomeURL() {
        return HTTP_SERVER . SITE_DIR;
    }

// Return a random value
    function db_prepare_input($string) {
        return trim(addslashes($string));
    }

//Encryption function
    function easy_crypt($string) {
        return base64_encode($string . "_@#!@");
    }

//Decodes encryption
    function easy_decrypt($str) {
        $str = base64_decode($str);
        return str_replace("_@#!@", "", $str);
    }

    function getParentCategoryName($id) {
        global $DB;
        $sql = "SELECT * FROM gc_pages WHERE 1 AND page_id = :id";
        try {
            $stmt = $DB->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            $results = $stmt->fetchAll();
        } catch (Exception $ex) {
            echo errorMessage($ex->getMessage());
        }

        return ($results[0]["page_title"] <> "" ) ? $results[0]["page_title"] : "None";
    }

    function getPageDetailsByName($pageAlias) {
        global $DB;
        $rs = array();
        $sql = "SELECT * FROM gc_pages WHERE 1 AND page_title = :pname";

        try {
            $stmt = $DB->prepare($sql);
            $stmt->bindValue(":pname", $pageAlias);
            $stmt->execute();
            $results = $stmt->fetchAll();
        } catch (Exception $ex) {
            echo errorMessage($ex->getMessage());
        }

        if (count($results) > 0) {
            $rs =  $results[0];
        }
        return $rs;
    }



}
?>


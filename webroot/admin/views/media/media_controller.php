<?php

require_once ($_SERVER['DOCUMENT_ROOT']."/../config.php");

class media_controller
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

    function getFotosUser()
    {
        try {
            $sql = "SELECT * FROM " . TABLE_CASTLE_FOTOS . " WHERE 
                userid = '" . $this->userid . "'";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            header("Content-Type: image");

        } catch (Exception $ex) {
            echo errorMessage($ex->getMessage());
        }
        return $stmt;//array("mimetype" => $mime, "fotodata" => $data);
    }
}
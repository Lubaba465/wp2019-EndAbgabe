<?php
class DbConnect {
public function connect() {
        try {

            $db_user = "root";
            $db_pass = "";
            $db_name = "german_castles";
            $conn = new PDO("mysql:host=localhost;dbname=$db_name;" , $db_user, $db_pass);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch( PDOException $e) {
            echo 'database Error: ' . $e->getMessage();
        }
    }
}
?>
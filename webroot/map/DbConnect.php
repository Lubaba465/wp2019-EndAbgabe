<?php
class DbConnect {
public function connect() {
        try {$conn = new PDO("sqlite:../database/german_castles.db");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch( PDOException $e) {
            echo 'database Error: ' . $e->getMessage();
        }
    }
}
?>
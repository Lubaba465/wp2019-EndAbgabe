<?php
try {
    require_once($_SERVER['DOCUMENT_ROOT']."/wp2019EndAbgabe/constants.php");
    $dsn = DB_DRIVER . ':' . DB_DATABASE;


    $dboptions = array(
        //PDO::ATTR_PERSISTENT => FALSE,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    );

//     $pk_field = " PRIMARY KEY AUTOINCREMENT"; // SQLite-Syntax
    $pk_field = " PRIMARY KEY AUTO_INCREMENT"; // MySQL-Syntax
    $db_user = "root";
    $db_pass = "";
    $db_name = "german_castles";

    $conn = new PDO("mysql:host=localhost;dbname=$db_name;" , $db_user, $db_pass);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $DB = $conn;



} catch (PDOException $e) {
    echo $db_name;
    echo 'Fehler: ' . htmlspecialchars($e->getMessage());
    exit();
}

require_once ("fillDatabase.php");

?>
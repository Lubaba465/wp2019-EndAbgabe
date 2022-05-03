<?php

require_once ($_SERVER['DOCUMENT_ROOT']."/wp2019EndAbgabe/config.php");

$db = $DB;

$search = $_GET['search'];
$sql = "SELECT * FROM gc_castles where name LIKE '%' || (:search) || '%' or county LIKE  '%' || (:search) || '%' ";
$stmt = $db->prepare($sql);
$stmt->bindValue(":search", $search);

$errorcode = $stmt->execute();
$ergebnis = $stmt->fetchAll(PDO::FETCH_ASSOC); ?>
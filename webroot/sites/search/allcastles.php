<?php

include_once ($_SERVER['DOCUMENT_ROOT']."/wp2019EndAbgabe/config.php");
$db = $DB;

$db = new PDO($dsn);

$sql = "SELECT * FROM gc_castles";

$ergebnis = $db->query($sql);?>
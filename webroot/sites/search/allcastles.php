<?php

include_once ($_SERVER['DOCUMENT_ROOT']."/../config.php");
$db = $DB;

$db = new PDO($dsn);

$sql = "SELECT * FROM gc_castles";

$ergebnis = $db->query($sql);?>
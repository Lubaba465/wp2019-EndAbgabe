<?php

include_once ($_SERVER['DOCUMENT_ROOT']."/wp2019EndAbgabe/config.php");
$db = $DB;

$sql = "SELECT * FROM  gc_castle_fotos   where castleid=$castleid limit 1";


$ergebni = $db->query($sql);?>
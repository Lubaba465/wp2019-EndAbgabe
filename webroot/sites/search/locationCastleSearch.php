<?php



include_once ($_SERVER['DOCUMENT_ROOT']."/../config.php");
$db = $DB;

$location = $_GET['location'];


$sql = "SELECT * , T0.name as nam FROM gc_castles T0 INNER JOIN gc_counties T1 ON T0.county = T1.countyid WHERE T1.location = '" . $location . "' ";


$ergebnis = $db->query($sql);?>

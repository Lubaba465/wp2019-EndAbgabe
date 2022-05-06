<?php

include_once ($_SERVER['DOCUMENT_ROOT']."/wp2019EndAbgabe/config.php");
$db = $DB;

$castleId = ($_GET["id"]);
$sql = "SELECT gc_castles.*,
                gc_counties.name
        FROM gc_castles 
        LEFT JOIN gc_counties  on (gc_castles.county = gc_counties.countyid )
        WHERE gc_castles.castleid =$castleId ";

$d = $db->query($sql);
?>

<?php

include_once ($_SERVER['DOCUMENT_ROOT']."/wp2019EndAbgabe/config.php");
$db = $DB;

$castleId = ($_GET["id"]);
$sql = "SELECT t0.*,
                t1.name [county_name],
                CASE t1.location 
                    WHEN 'N' THEN 'Norden'
                    WHEN 'W' THEN 'Westen'
                    WHEN 'E' THEN 'Osten'
                    WHEN 'S' THEN 'Süden'
                END [location_name]
        FROM gc_castles t0 
        LEFT JOIN gc_counties t1 on (t0.county = t1.countyid )
        WHERE t0.castleid =$castleId ";

$d = $db->query($sql);
?>

<?php

include_once ($_SERVER['DOCUMENT_ROOT']."/../config.php");

$castleId = $castleId;

$db = $DB;

$sql = "Select sum(rate) / count(*) as rating  from gc_rating_castles where  castleid = :castleId ";

$stmt = $db->prepare($sql);


$stmt->bindValue(":castleId", $castleId);

$errorcode = $stmt->execute();
//echo $errorcode;
$ergebnis = $stmt->fetch(PDO::FETCH_ASSOC);

$rating = $ergebnis["rating"];

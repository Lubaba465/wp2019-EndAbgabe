<?php

$db = $DB;

$sql = "SELECT * FROM gc_castle_fotos where castleid = :castleId";

$stmt = $db->prepare($sql);

$stmt->bindValue(":castleId", $castleId);
$errorcode = $stmt->execute();



$ergebnis = $stmt->fetchAll(PDO::FETCH_ASSOC);

$arr = $ergebnis;

?>

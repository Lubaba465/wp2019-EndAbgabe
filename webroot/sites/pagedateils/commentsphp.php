<div><?php

$db = $DB;

$sql = "SELECT * FROM gc_comments where castleid = :castleId ";
//$benutzername = datenvonbenutzer()["fname"];

$stmt = $db->prepare($sql);

$stmt->bindValue(":castleId", $castleId);
$errorcode = $stmt->execute();
$ergebnis = $stmt->fetchAll(PDO::FETCH_ASSOC);

?></div>
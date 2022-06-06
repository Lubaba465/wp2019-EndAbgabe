<?php
if (isset($_GET["magazintype"])){
$user = "root";
$pw = null;

include_once ($_SERVER['DOCUMENT_ROOT']."/wp2019EndAbgabe/config.php");
$db = $DB;

$magazintype = $_GET["magazintype"];
$sql = "SELECT * FROM gc_castle_magazin where magazin_type ='" . $magazintype . "' ";

$ergebnis = $db->query($sql); ?> <?php


foreach ($ergebnis

as $zeile) {

?>
<div>
    <div class="contentcastlegrid">        <div>
            <h2 class="cnt-headline"><?php echo($zeile['magazin_name']); ?></h2>


            <h1>Datum:<? echo $zeile['magazin_date']; ?></h1>
            <h2  style="color: black" class="cnt-headline"><?php echo($zeile['magazin_desc']); ?></h2>

        </div>

    </div>
    <?php }
    } ?>

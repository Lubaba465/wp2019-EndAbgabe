<h2 class="cnt-headline" style="color: #8D8D8D">Schloss</h2>
<?php


//$dsn = "sqlite:../database/german_castles.db";

//$db = new PDO($dsn);


include_once ("../database/dbconfig.php");
$db = $DB;

$sql = "SELECT * FROM gc_castles order by castleid desc limit 1";

$ergebnis = $db->query($sql);


foreach ($ergebnis as $zeile) { ?>
<div class="castle-container">
<div class="castledesc">

    <?php
    $castleid = $zeile['castleid'];
    printf("<p></p><h3>%s</h3> ",

        urlencode($zeile['name']),
        htmlspecialchars($zeile['country']));
    ?>
    <a class="black" href="../webroot/dateils.php?id=<?php echo $zeile["castleid"]; ?> ">mehr informationen finden sie hier</a>

</div>

    <?php

    //$dsn = "sqlite:../database/german_castles.db";

    //$db = new PDO($dsn);


    $sql = "SELECT * FROM  gc_castle_fotos   where castleid=$castleid limit 1";


    $ergebnis = $db->query($sql);
    foreach ($ergebnis as $zeile) { ?>

        <img class="castleimage" src="img/uploads/<?php echo $zeile['file_name'] ?>"/>
        <div class="castleimg position">

        </div>
    <?php } ?></div>



<?php }

?>


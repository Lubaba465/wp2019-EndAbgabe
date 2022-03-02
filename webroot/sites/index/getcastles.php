<?php


//$dsn = "sqlite:../database/german_castles.db";

//$db = new PDO($dsn);


include_once ("../database/dbconfig.php");
$db = $DB;

$sql = "SELECT * FROM gc_castles order by castleid desc limit 1";

$ergebnis = $db->query($sql);


foreach ($ergebnis as $zeile) { ?>

    <h2 class="cnt-headline" style="color: #8D8D8D">Schloss</h2>

    <?php
    $castleid = $zeile['castleid'];
    printf("<p></p><h3>%s</h3> ",

        urlencode($zeile['name']),
        htmlspecialchars($zeile['country']));
    ?>


    <?php

    //$dsn = "sqlite:../database/german_castles.db";

    //$db = new PDO($dsn);


    $sql = "SELECT * FROM  gc_castle_fotos   where castleid=$castleid limit 1";


    $ergebnis = $db->query($sql);
    foreach ($ergebnis as $zeile) { ?>

        <img class="portrait" src="img/uploads/<?php echo $zeile['file_name'] ?>"/>
    <?php } ?>
    <a class="black" href="../dateils.php?id=<?php echo
    ($zeile["castleid"]); ?> ">mehr informationen finden sie hier</a>


    </div>
<?php }

?>


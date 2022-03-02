<?php


include_once ($_SERVER['DOCUMENT_ROOT']."/../config.php");
$db = $DB;

$sql = "SELECT * FROM gc_castle_magazin where magazin_type= 'E'order by castleid desc limit 1";

$ergebnis = $db->query($sql);


foreach ($ergebnis as $zeile) { ?>

    <h2 class="cnt-headline" style="color: #8D8D8D">Events</h2>

    <?php

    printf("<h3>%s</h3> ",
        urlencode($zeile['magazin_name']));

    ?>


    <h5><?php echo
        ($zeile["magazin_desc"]); ?></h5>


    </div>
<?php }

?>

<div>
    <h2 class="cnt-headline">Alle Castles</h2>
    <ul>

        <?php

        include_once ($_SERVER['DOCUMENT_ROOT']."/../config.php");
        $db = $DB;

        $sql = "SELECT * FROM " . TABLE_CASTLE_FOTOS . " ";
        $imgList = $db->query($sql);


        ?>
        <li><img class="portrait" name="slide" width="1000" height="700">

        </li>

    </ul>
</div>
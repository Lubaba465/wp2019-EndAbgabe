
        <?php

        include_once ($_SERVER['DOCUMENT_ROOT']."/wp2019EndAbgabe/config.php");
        $db = $DB;

        $sql = "SELECT * FROM " . TABLE_CASTLE_FOTOS . " ";
        $imgList = $db->query($sql);


        ?>
      <img class="slide" name="slide" >




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deutsche Schloesser | Home</title>
    <link rel="stylesheet" href="css/indexl.css">
</head>
<body>
<div class="index-container">
    <div class="slide">
<?php include "homeimage.php"; ?>
    </div>
    <div class=" content-grid">
        <div>
<!--            <h2 class="cnt-headline">Letzte Einträge</h2>
-->            <div>


                <?php


                include "getcastles.php";

                ?>

                <h2 class="cnt-headline" style="color: #8D8D8D"> Letzte Kommentare</h2>


                        <?php


                        include_once ($_SERVER['DOCUMENT_ROOT']."/wp2019EndAbgabe/config.php");
                        $db = $DB;

                        $sql = "SELECT * FROM gc_comments limit 1";

                        $ergebnis = $db->query($sql);


                        foreach ($ergebnis as $zeile) { ?>
                <div class="castle-container">


                        <?php

                        include_once ($_SERVER['DOCUMENT_ROOT']."/wp2019EndAbgabe/config.php");
                        $db = $DB;
                        $castleid = $zeile['castleid'];
                            $sql = "SELECT * FROM  gc_castle_fotos   where castleid=$castleid limit 1";


                            $ergebnis = $db->query($sql);
                            foreach ($ergebnis as $zeil) { ?>

                                <img class="castleimage" src="img/uploads/<?php echo $zeil['file_name'] ?>"/>

                            <?php }?><div class="castledesc">
                        <?php
                        echo " @" . ($zeile['name']); ?></label><label>   <?php
                            echo "- " . ($zeile['time']); ?></label>
                        <p class="p"> <?php echo "   " . $zeile['c_text']; ?>
<br>
                            <a class="black" href="../webroot/dateils.php?id=<?php echo $zeile["castleid"]; ?> ">mehr informationen finden sie hier</a>

                        </p></div>
                </div>
                <?php }

                ?>


                <div>
                    </br>

                    <?php
                    include "getNews.php";
                    ?>
                    <?php
                    include "getMagazin.php";

                    ?>
                    <div>
                        </br>
                    </div>





                </div>
            </div>
            <?php
            include "image.php";
            ?>

        </div></div></div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deutsche Schloesser | Home</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<div class="index-container">
    <div class="content-grid">
        <?php include "homeimage.php"; ?>
    </div>
    <div class=" content-grid">
        <div>
            <h2 class="cnt-headline">Letzte Einträge</h2>
            <div>


                <?php


                include "getcastles.php";

                ?>
                <div>
                    </br>

                    <?php
                    include "getNews.php";
                    ?>
                    <div>
                        </br>


                        <?php


                        include_once ($_SERVER['DOCUMENT_ROOT']."/wp2019EndAbgabe/config.php");
                        $db = $DB;

                        $sql = "SELECT * FROM gc_comments";

                        $ergebnis = $db->query($sql);


                        foreach ($ergebnis as $zeile) { ?>

                        <h2 class="cnt-headline" style="color: #8D8D8D"> Letzte Kommentare</h2>


                        <?php

                        include_once ($_SERVER['DOCUMENT_ROOT']."/wp2019EndAbgabe/config.php");
                        $db = $DB;
                        $castleid = $zeile['castleid'];

                        $sql = "SELECT * FROM  gc_castle_fotos   where castleid=$castleid ";


                        $ergebni = $db->query($sql);
                        foreach ($ergebni

                        as $zeil) { ?>



                        <?php }
                        echo " @" . ($zeile['name']); ?></label><label>   <?php
                            echo "- " . ($zeile['time']); ?></label>
                        <p class="p"> <?php echo "   " . $zeile['c_text']; ?>


                        </p>

                <?php }

                ?>


                    </div>
                    </br>

                    <?php
                    include "getMagazin.php";

                    ?>


                </div>
            </div>
            <?php
            include "image.php";
            ?>

        </div>
</body>
</html>
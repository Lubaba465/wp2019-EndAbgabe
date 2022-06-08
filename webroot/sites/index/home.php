<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deutsche Schloesser | Home</title>
    <link rel="stylesheet" href="css/indexlt.css">
</head>
<body>
<div class="index-container reveal">
    <div class="slide ">
      <h1 class="hd">ALLe Schloesser
            in Deutschland  🏰</h1>
<?php include "homeimage.php"; ?>
    </div>
    <div class=" content-grid ">
        <div>
<!--            <h2 class="cnt-headline">Letzte Einträge</h2>
-->            <div class="reveal">


                <?php


                include "getcastles.php";

                ?>

                <h2 class="cnt-headline " style="color: #8D8D8D"> Letzte Kommentare</h2>


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
                                <img class="castleimagecomment" src="img/uploads/<?php echo $zeil['file_name'] ?>"/>
                                <div class="castleimg">

                                </div>
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
            <?php
            include "image.php";
            ?>

        </div></div></div>
<script>

    function reveal() {
        var reveals = document.querySelectorAll(".reveal");

        for (var i = 0; i < reveals.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveals[i].getBoundingClientRect().top;

            var elementVisible = 150;

            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("active");

            } else {
                reveals[i].classList.remove("active");
            }
        }
    }

    window.addEventListener("scroll", reveal);

    // To check the scroll position on page load
    reveal();


    function castleimg() {
        var reveals = document.querySelectorAll(".castleimg");

        for (var i = 0; i < reveals.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveals[i].getBoundingClientRect().top;

            var elementVisible = 150;

            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("activee");

            } else {
                reveals[i].classList.remove("activee");
            }
        }
    }

    window.addEventListener("scroll", castleimg);

    // To check the scroll position on page load
    castleimg();
</script>
</body>
</html>
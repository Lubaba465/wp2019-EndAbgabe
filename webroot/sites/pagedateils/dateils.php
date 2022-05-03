<div class="index-container">
    <?php

    include_once ($_SERVER['DOCUMENT_ROOT']."/wp2019EndAbgabe/config.php");


    include "commentsaddphp.php";


    include "dateilscastle.php";
    foreach ($d as $data)
        $castleId = $data['castleid'];
    ?>
    <div class="content-grid">
        <div>
            <h2 class="cnt-headline"><?php echo($data['name']); ?></h2>



            <div class="slideshow-container">
                <?php
                include "mediaSlideshow.php";
                ?> <?php
                $j = 1;

                foreach ($arr as $media) {

                    ?>
                    <div class="mySlides fade ">
                        <div class="numbertext"><?php echo $j; ?>/<?php echo sizeof($arr); ?></div>
                        <img class="portrait" src="img/uploads/<?php echo $media['file_name'] ?>"">
                    </div>
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>

                    <br>


                    <?php

                    $j = $j + 1;
                }

                ?>
                <script src="js/details.js"></script>


            </div>

            <div>
                <b> Bundesland:</b>
                <?= $data['county_name']; ?>
                <b> Gebaut in :</b>
                <?= $data["construction_year"]; ?>
                <b>Castle Size:</b>
                <?= $data["castle_size"]; ?></br>
                <article>
                    <?= $data["description"]; ?></p>
                </article>

                <?php include "commentsphp.php";

                ?>
                <?php if (isteingeloggt()) { ?>
                    <h2>Kommentare</h2>

                    <?php
                    foreach ($ergebnis as $zeile) {
                        ?>
                        <div>
                            <label>   <?php
                                echo " @" . ($zeile['name']); ?></label><label>   <?php
                                echo "- " . ($zeile['time']); ?></label>
                            <p class="p"> <?php echo "   " . $zeile['c_text'];

                                ?></p></br></div>

                        <hr noshade="noshade"/><?php
                    }
                    ?>


                <?php } ?>
            </div>

            <?php include 'templates/components/rating.php'; ?>

            <?php if (isteingeloggt()) { ?>
                <form method="post">

                    <br>
                    <br>
                    <textarea style="
width: 290px" id="castledesc" name="c_text" placeholder="Kommentare schreiben..."></textarea>
                    </br>
                    </br>
                    <input type="submit" class="button" name="newComment" value="Kommentare senden">
                </form>
            <?php } ?>
        </div>



    </div>
</div>




<div class="castlesearch-container">
    <?php
    if (isset($_GET['search'])) {
    include "sites/search/search.php"; ?>
    <ul><?php
        foreach ($ergebnis as $zeile) {
            $castleid = $zeile['castleid']; ?>
            <div>
                <div class="contentcastlegrid">
                    <div>

                        <h2 class="cnt-headline"><?php echo($zeile['name']); ?></h2>
                        <ul>
                            <?php
                            include "imagecastleSearch.php";
                            foreach ($ergebni as $zeil) { ?>

                                <img class="portrait"
                                     src="img/uploads/<?php echo $zeil['file_name'] ?>"/>

                            <?php } ?>


                            <li><a class="black" href="dateils.php?id=<?php echo($zeile["castleid"]); ?> ">mehr
                                    informationen finden
                                    sie hier</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php }
        }
        else if (isset($_GET['location'])) {
            include "locationCastleSearch.php";
            ?>
            <ul><?php
                foreach ($ergebnis as $zeile) {
                    $castleid = $zeile['castleid']; ?>
                    <div>
                        <div class="contentcastlegrid">
                            <div>


                                <h2 class="cnt-headline"><?php echo($zeile['name']); ?></h2>

                                <ul>


                                    <?php
                                    include "imagecastleSearch.php";
                                    foreach ($ergebni as $zeil) { ?>

                                        <img class="portrait"
                                             src="img/uploads/<?php echo $zeil['file_name'] ?>"/>

                                    <?php } ?>


                                    <li><a class="black"
                                           href="dateils.php?id=<?php echo($zeile["castleid"]); ?> ">mehr
                                            informationen finden
                                            sie hier</a>
                                    </li>
                                </ul>
                            </div>


                        </div>
                    </div>

                <?php } ?>
            </ul>
            <?php
        } else {
        include "allcastles.php"; ?>
        <ul><?php
            foreach ($ergebnis
                     as $zeile) {
                $castleid = $zeile['castleid']; ?>
                <div>
                    <div class="contentcastlegrid">
                        <div>
                            <h2 class="cnt-headline"><?php echo($zeile['name']); ?></h2>
                            <ul>
                                <?php
                                include "imagecastleSearch.php";
                                foreach ($ergebni as $zeil) { ?>
                                    <img class="img" width="400" height="450"
                                         src="img/uploads/<?php echo $zeil['file_name'] ?>"/>
                                <?php } ?>
                                <li><a class="black" href="dateils.php?id=<?php echo($zeile["castleid"]); ?> ">mehr
                                        informationen finden
                                        sie hier</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php }
            } ?>
        </ul>
</div>







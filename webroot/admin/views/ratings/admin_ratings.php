<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="css/admin/castles.css">
    <link rel="stylesheet" href="css/admin/side-nav.css">
    <link rel="stylesheet" href="css/components/ratings.css">
    <script src="js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="js/admin/ratings.js"></script>

</head>
<?php
require("ratings_controller.php");
$ratingsController = new ratings_controller();
$ratingsView = $_SERVER['DOCUMENT_ROOT'].'/webroot/templates/components/rating.php';
?>
<div id="ratings">
    <h1 class="content-title">Meine Bewertungen</h1>


    <div class="content-grid">
        <div>
            <h2 class="cnt-headline">Schlösser</h2>
            <?php
            $ratings = $ratingsController->getCastleRatingsSessionUser();
            foreach ($ratings as $row) {
                ?>
                <div class="content-grid">
                    <div>
                        <h2 class="cnt-headline">
                            <div class="content-grid">
                                <a class="column-left">
                                    <?php echo htmlspecialchars($row["castle_name"]) ?>
                                </a>
                                <a class="column-right content-right">
                                    <a class="navlinks ratCastleDel" id="<?php echo $row['ratingid'] ?>"><i
                                                onclick="return confirm('Sind Sie sicher?');"
                                                class="fa fa-fw fa-trash"></i></a>
                                </a>
                            </div>
                        </h2>
                        <ul>
                            <li><img class="portrait" src="img/content/loewenburg.jpg"></li>
                            <li><?php include '../templates/components/rating.php'; ?></li>
                        </ul>

                        <!--                        <div class="content-grid">-->
                        <!--                            <div class="content-grid">-->
                        <!--                            --><?php //include '../templates/components/rating.php'; ?>
                        <!--                                --><?php //echo htmlspecialchars($row["rate"]) ?>
                        <!--                            --><?php //echo date("d.m.Y H:i:s", strtotime($row["rating_date"]))?>
                        <!--                                --><?php //echo htmlspecialchars($row["rating_date"]) ?>
                        <!--                            </div>-->
                        <!--                        </div>-->
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>


    <div class="content-grid">
        <div>
            <h2 class="cnt-headline">Fotos</h2>
            <?php
            $ratings = $ratingsController->getFotoRatingsSessionUser();

            $current_cas = null;
            while ($row = $ratings->fetch()) {
                if ($row["castleid"] != $current_cas) {
                    $current_cas = $row["castleid"];
                    ?>
                    <h2 class="cnt-headline">
                        <div class="content-grid">
                            <a class="column-left">
                                <?php echo htmlspecialchars($row["castle_name"]) ?>
                            </a>
                            <a class="column-right content-right">
                                <!--                    <a class="navlinks admSection" id="myData"><i class="fa fa-fw fa-home"></i></a>-->
                                <!--                    <a class="casSection" id="castleData"><i class="fa fa-fw fa-pencil"></i></a>-->
                                <a class="navlinks ratCastleFotoDel" id="<?php echo $row['ratingid'] ?>"><i
                                            onclick="return confirm('Sind Sie sicher?');"
                                            class="fa fa-fw fa-trash"></i></a>
                                <!--                                    <a class="navlinks ratSection" id="-->
                                <?php //echo $row['ratingid'] ?><!--"><i-->
                                <!--                                                class="fa fa-fw fa-pencil"></i></a>-->
                            </a>
                        </div>
                    </h2>
                    <?php
                }
                ?>

                <div class="content-grid">
                    <div>
                        <ul>
                            <img class="portrait" src="img/uploads/<?php echo $row['file_name'] ?>"/>
                            <li><a class="column-left">
                                    <form>
                                        <?php include $ratingsView; ?>
                                    </form>
                                </a>
                                <a class="column-right content-right">
                                    <a class="navlinks ratFotoDel" id="<?php echo $row['ratingid'] ?>"><i
                                                onclick="return confirm('Sind Sie sicher?');"
                                                class="fa fa-fw fa-trash"></i></a>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>


    <!--    <div class="content-grid">-->
    <!--        <div>-->
    <!--            <h2 class="cnt-headline">Fotos</h2>-->
    <!---->
    <!--            <div class="content-grid">-->
    <!--                <div>-->
    <!--                    <h2 class="cnt-headline">Bogota</h2>-->
    <!--                    <div class="content-grid">-->
    <!--                        <div>-->
    <!--                            <h2 class="cnt-headline">Schloss</h2>-->
    <!---->
    <!--                            <ul>-->
    <!--                                <li><img class="portrait" src="img/content/loewenburg.jpg"></li>-->
    <!--                                <li>Schlossinfo...</li>-->
    <!--                            </ul>-->
    <!--                        </div>-->
    <!--                        <div>-->
    <!--                            <h2 class="cnt-headline">Schloss</h2>-->
    <!---->
    <!--                            <ul>-->
    <!--                                <li><img class="portrait" src="img/content/hohenschwangau.jpg"></li>-->
    <!--                                <li>Schlossinfo...</li>-->
    <!--                            </ul>-->
    <!--                        </div>-->
    <!--                        <div>-->
    <!--                            <h2 class="cnt-headline">Schloss</h2>-->
    <!---->
    <!--                            <ul>-->
    <!--                                <li><img class="portrait" src="img/content/heidelberg.jpg"></li>-->
    <!--                                <li>Schlossinfo...</li>-->
    <!--                            </ul>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!---->
    <!--            <div class="content-grid">-->
    <!--                <div>-->
    <!--                    <h2 class="cnt-headline">Oldenburg</h2>-->
    <!--                    <div class="content-grid">-->
    <!--                        <div>-->
    <!--                            <h2 class="cnt-headline">Schloss</h2>-->
    <!---->
    <!--                            <ul>-->
    <!--                                <li><img class="portrait" src="img/content/loewenburg.jpg"></li>-->
    <!--                                <li>Schlossinfo...</li>-->
    <!--                            </ul>-->
    <!--                        </div>-->
    <!--                        <div>-->
    <!--                            <h2 class="cnt-headline">Schloss</h2>-->
    <!---->
    <!--                            <ul>-->
    <!--                                <li><img class="portrait" src="img/content/hohenschwangau.jpg"></li>-->
    <!--                                <li>Schlossinfo...</li>-->
    <!--                            </ul>-->
    <!--                        </div>-->
    <!--                        <div>-->
    <!--                            <h2 class="cnt-headline">Schloss</h2>-->
    <!---->
    <!--                            <ul>-->
    <!--                                <li><img class="portrait" src="img/content/heidelberg.jpg"></li>-->
    <!--                                <li>Schlossinfo...</li>-->
    <!--                            </ul>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->


</div>

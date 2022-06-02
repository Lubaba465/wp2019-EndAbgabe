<?php
?>

<head>
    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="js/components/slides.js"></script>
    <link rel="stylesheet" href="css/admin/castles.css">
    <!--    <script type="text/javascript" src="js/admin/side-nav.js"></script>-->
</head>
<div class="content-grid">
    <div>
        <h2 class="cnt-headline">
            <div class="content-grid">
                <a class="column-left">
                    <?php echo htmlspecialchars($row["name"]) ?>
                </a>
                <a class="column-right content-right">
                    <!--                    <a class="navlinks admSection" id="myData"><i class="fa fa-fw fa-home"></i></a>-->
                    <!--                    <a class="casSection" id="castleData"><i class="fa fa-fw fa-pencil"></i></a>-->
                    <a class="navlinks casDelete" id="<?php echo $row['castleid'] ?>"><i
                                onclick="return confirm('Sind Sie sicher?');" class="fa fa-fw fa-trash"></i></a>
                    <a class="navlinks casSection" id="<?php echo $row['castleid'] ?>"><i
                                class="fa fa-fw fa-pencil"></i></a>
                </a>
            </div>
        </h2>
        <div class="content-grid">
            <div class="slide">
                <?php
                $imgList = $castlesController->getMainFotoCastle($row["castleid"]);
                echo htmlspecialchars($row["castleid"]) ;
                foreach ($imgList as $media) {
                    ?>
                    <img class="portrait" src="img/uploads/<?php echo $media['file_name'] ?>"/>
                    <?php
                }
                header("Content-Type: image");
                ?>
            </div>

        </div>
        <div>
            <?php echo htmlspecialchars($row["description"]) ?>
        </div>
    </div>
</div>
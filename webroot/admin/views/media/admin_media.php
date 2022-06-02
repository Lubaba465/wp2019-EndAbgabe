<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="js/components/slides.js"></script>
    <link rel="stylesheet" href="css/admin/castles.css">
</head>
<?php
require("media_controller.php");
$mediaController = new media_controller();
$imgList = $mediaController->getFotosUser("carola");
?>
<div id="media">
    <h1 class="content-title">Meine Medien</h1>
    <div class="content-grid">
        <div>
            <h2 class="cnt-headline">Fotos</h2>
            <div class="slideshow-container">
                <div class="slide">
                    <?php
                    $imgList = $mediaController->getFotosUser("carola");

                    foreach ($imgList as $media) {
                        ?>
                        <img class="portrait" src="img/uploads/<?php echo $media['file_name'] ?>"/>
                        <?php
                    }
                    header("Content-Type: image");
                    ?>
                </div>
            </div>
        </div>

    </div>






</div>
<script>
    var i = 0; // Start point
    var images = [];
    var time = 1000;
    var j = 0;
    <?php


    foreach ($imgList as $media) {

    ?>
    images[j] = "img/uploads/<?php echo $media['file_name']?>";
    j = j + 1;
    <?php




    }

    ?>


</script>
<script src="js/home.js"></script>



<?php

$row = $data;

$rating = $rating;


?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"
        integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i"
        crossorigin="anonymous"></script>



<form id="star<?php echo $row['castleid'] ?>" action="/templates/components/rating_controller.php" method="post">


    <fieldset class="rating">

        <input type="hidden" name="castleid" value="<?php echo $row['castleid'] ?>">

        <?php
        $castleId = $row['castleid'];
        include ("getCastleRating.php");
        $rating = $rating;


        for ($x = 5; $x >= 1; $x--) {
            ?>
            <input type="radio" id="<?php echo "field" . $row['id'] . "_star" . $x ?>"
                   name="rating"
                   value="<?php echo $x ?>"
                <?php if ($x == $rating ) { ?>
                    checked=checked
                <?php } ?>
            />
            <label class="full" for="<?php echo "field" . $row['id'] . "_star" . $x ?>"></label>
            <?php
        }
        ?>



    </fieldset>
    <script>
        // bind submit handler to form
        $('#star<?php echo $row['castleid'] ?> input').on('click', function (e) {
            //alert("asdf");
            e.preventDefault(); // prevent native submit
            $('#star<?php echo $row['castleid'] ?>').ajaxSubmit()
        });
    </script>
</form>

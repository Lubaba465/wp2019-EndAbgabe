
<?php
//include("../libs/constants.php");?>
<?php


require_once("usermodul.php");

?>
<footer class="footer-container">
    <div class="bottom-nav">


        <a class="nav-item" href="internetright.php?type=<?php  echo 'datenschutzerklaerung' ?>" >Datenschutzerklärung</a>
        <a class="nav-item" href="internetright.php?type=<?php  echo 'impressum' ?>" >Impressum</a>
         <a class="nav-item" href="internetright.php?type=<?php  echo 'ueberuns' ?>"  >über uns </a>

    </div>
    <?php
    if(isteingeloggt()){?>

        <center>    <?php echo "Sie sind angemeldet als ". datenvonbenutzer()["fname"] . "."; ?></center><?php
    }

    ?>

</footer>
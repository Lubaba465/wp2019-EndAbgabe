<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" href="img/logoSimple_trans.png" type="image/x-icon">
    <link rel="stylesheet" href="css/admin/admin.css">

</head>
<?php


include_once ($_SERVER['DOCUMENT_ROOT']."/../config.php");

include_once ("usermodul.php");
session_start();


if(!isteingeloggt() && !empty($_POST['password'])){

    echo einloggen($_POST['email'],$_POST['password']);
}


if(!isteingeloggt()){
    header('Location: login.php?loginfailed=true');
    exit;
}
?>

<?php
include "templates/header.php";

?>
<div class="admin-container">
    <div class="wrapper">
        <?php
        include "admin/side_nav.php";
        ?>
        <div id="adminSection" class="navcontent"></div>
    </div>
</div>
<?php
include "templates/footer.php";?>
</html>
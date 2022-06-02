<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/admin/castles.css">
    <link rel="stylesheet" href="css/admin/side-nav.css">
    <script type="text/javascript" src="js/admin/castls.js"></script>
</head>
<?php
require("castles_controller.php");
require($_SERVER['DOCUMENT_ROOT'] . '/wp2019EndAbgabe/config.php');
$castlesController = new castles_controller();
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : 'anonym';
$castlesList = $castlesController->getCastlesAdmin($userid);
?>




<div id="castles">
    <h1 class="content-title">Meine Schlösser</h1>
    <?php

    foreach ($castlesList as $row) {
        include 'castle_overview.php';
    }
    ?>

    <div class="content-grid">
        <div>
            <button class="navlinks casSection" id="castleData">Schloss hinzufügen</button>
        </div>
    </div>
</div>


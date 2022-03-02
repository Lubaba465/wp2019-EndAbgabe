<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/map.css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>


</head>
<body>
<div class="container">


    <div id="map"></div>
</div>
</body>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOETrC2rs_sPLJOBGs1GPMuClNQH9fsrU&callback=loadMap">
</script>

<script>
    function loadMap() {
        var startlocation = {lat: 51.165691, lng: 10.451526};
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 5,
            center: startlocation
        });
        <?php


        require 'castlesDAO.php';
        $edu = new castlesDAO;
        $allData = $edu->getAllCastles();
        foreach($allData as $castle){

        ?>

        var marker<?php echo $castle['castleid'] ?> = new google.maps.Marker({
            position: {lat: <?php echo $castle['lat']; ?>, lng: <?php echo $castle['lng']; ?>},
            map: map
        });

        marker<?php echo $castle['castleid'] ?>.addListener('click', function () {

            var infoWindow = new google.maps.InfoWindow({content: "<?php echo "<h2>" . $castle['name'] . "</h2>" . $castle['street'] ."</br>"."<a href='dateils.php?id=".$castle['castleid']."'>weitere info</a>"?>"});
            infoWindow.open(map, marker<?php echo $castle['castleid'] ?>);

        });

        <?php
        }


        ?>
    }

</script>

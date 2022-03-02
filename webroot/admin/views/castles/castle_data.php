<head>
    <link rel="stylesheet" href="css/admin/castles.css">
    <link rel="stylesheet" href="css/admin/side-nav.css">
    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="js/admin/castles.js"></script>

</head>
<?php
include("castles_controller.php");
//require("../libs/config.php");
$castle_id = $_GET["castleid"];
$castlesController = new castles_controller();
$castle = $castlesController->getCastleInfoID($castle_id);
//foreach ($castlesController->getCastleInfoID($id) as $row) {
//    $castle = $row;
//}
$cCastleId = null;
$cTransType = null;
$cTransName = null;
$cName = null;
$cDescription = null;
$cYear = null;
$cSize = null;
$cCounty = null;
$cAddress = null;
$cLatitude = null;
$cLongitude = null;
$cCity = null;
$cZipCode = null;
$cMountain = null;
$cDesert = null;
$cForest = null;
$cSea = null;
$cDisabled = null;
$cParking = null;
$cGastro = null;
$cEmail = null;
$cWebSite = null;
$cFacebook = null;
$cInstagram = null;
$cTwitter = null;

if ($castle_id == 0) {
    $cTransType = "Hinzufügen";
    $cTransName = "newCastle";
} else {
    $cCastleId = $castle['castleid'];
    $cTransType = "Bearbeiten";
    $cTransName = "updCastle";
    $cName = $castle['name'];
    $cDescription = $castle['description'];
    $cYear = $castle['construction_year'];
    $cSize = $castle['castle_size'];
    $cCounty = $castle['county'];
    $cAddress = $castle['street'];
    $cLatitude = $castle['lat'];
    $cLongitude = $castle['lng'];
    $cCity = $castle['city'];
    $cZipCode = $castle['zipcode'];
    $cMountain = $castle['near_mountain'];
    $cDesert = $castle['near_desert'];
    $cForest = $castle['near_forest'];
    $cSea = $castle['near_sea'];
    $cDisabled = $castle['disabled_access'];
    $cParking = $castle['parking'];
    $cGastro = $castle['gastronomy'];
    $cEmail = $castle['email'];
    $cWebSite = $castle['website'];
    $cFacebook = $castle['facebook'];
    $cInstagram = $castle['instagram'];
    $cTwitter = $castle['twitter'];
}
?>

<h1 class="content-title">Schloss <?php echo $cTransType ?></h1>
<div class="castle-container">
    <form action="admin/castles_controller.php" method="post" enctype="multipart/form-data">
        <input class="content-grid" id="castleid" name="castleid" type="hidden" value="<?php echo $cCastleId ?>">
        <input class="content-grid" type="text" id="castlename" name="castlename" placeholder="Schloss Name..."
               value="<?php echo $cName ?>">
        <textarea class="content-grid" id="castledesc" name="castledesc" placeholder="Schloss Beschreibung..."
                  style="height:100px"><?php echo $cDescription ?></textarea>

        <div class="content-grid">
            <a class="column-right">
                <label class="content-grid" for="year" style="height: ">Baujahr</label>
                <!--                    <input class="content-grid" type="date" id="year" name="year">-->
                <input class="content-grid" type="number" id="year" name="year" min="1600" max="2000"
                       value="<?php echo $cYear ?>">
            </a>
            <a class="column-left">
                <label class="content-grid" for="size">Größe in Quadratmeter</label>
                <input class="content-grid" type="number" id="size" name="size" min="1" max="1000"
                       value="<?php echo $cSize ?>">
            </a>
        </div>


        <label class="content-grid">Adresse</label>
        <ul>
            <label class="content-grid" for="county">Bundesland</label>
            <?php
            $countiesList = $castlesController->getCounties();

            echo "<select name='counties'>";
            echo '<option value="--">Bundesland wählen</option>';
            foreach ($countiesList as $countiesRow) {
                echo '<option value="' . $countiesRow['countyid'] . '">' . $countiesRow['name'] . '</option>';
            }
            echo "</select>";
            ?>

            <li><input class="item-list" type="text" id="city" name="city" placeholder="Stadt"
                       value="<?php echo $cCity ?>"></li>
            <li><input class="item-list" type="text" id="address" name="address" placeholder="Straße"
                       value="<?php echo $cAddress ?>"></li>
            <li><input class="item-list" type="text" id="zipcode" name="zipcode" placeholder="PLZ"
                       value="<?php echo $cZipCode ?>"></li>
            <li>
                <div class="item-list content-grid">
                    <a class="column-right">
                        <input class="item-list" type="number" id="lat" name="lat" placeholder="Breite"
                               value="<?php echo $cLatitude ?>">
                    </a>
                    <a class="column-left">
                        <input class="item-list" type="number" id="lng" name="lng" placeholder="Längengrad"
                               value="<?php echo $cLongitude ?>">
                    </a>
                </div>
            </li>
        </ul>

        <label class="content-grid">Umgebung</label>
        <div class="content-grid">
            <a class="column-left">
                <div><input type="checkbox" name="mountain" value="Y"
                        <?php if ($cMountain == 'Y') { ?> checked="checked" <?php } ?>>
                    <label>Gebirge</label>
                </div>
                <div><input type="checkbox" name="desert" value="Y"
                        <?php if ($cDesert == 'Y') { ?> checked="checked" <?php } ?>>
                    <label>Wüste</label>
                </div>
            </a>
            <a class="column-right">
                <div><input type="checkbox" name="forest" value="Y"
                        <?php if ($cForest == 'Y') { ?> checked="checked" <?php } ?> >
                    <label>Wald</label>
                </div>
                <div><input type="checkbox" name="sea" value="Y"
                        <?php if ($cSea == 'Y') { ?> checked="checked" <?php } ?>>
                    <label>Meer</label>
                </div>
            </a>
        </div>

        <label class="content-grid">Anlagen</label>
        <div class="content-grid">
            <a class="column-left">
                <div><input type="checkbox" name="disabled" value="Y"
                        <?php if ($cDisabled == 'Y') { ?> checked="checked" <?php } ?> >
                    <label>Barrierefrei</label>
                </div>
                <div><input type="checkbox" name="parking" value="Y"
                        <?php if ($cParking == 'Y') { ?> checked="checked" <?php } ?> >
                    <label>Parkplatz</label></div>
            </a>
            <a class="column-right">
                <div><input type="checkbox" name="gastro" value="Y"
                        <?php if ($cGastro == 'Y') { ?> checked="checked" <?php } ?>>
                    <label>Gastronomie</label>
                </div>
            </a>
        </div>

        <input class="content-grid" type="text" name="email" id="email" placeholder="Email..."
               value="<?php echo $cEmail ?>">

        <input class="content-grid" type="text" name="website" id="website" placeholder="Webseite..."
               value="<?php echo $cWebSite ?>">

        <label class="content-grid">Social</label>
        <ul>
            <li><i class="fa fa-fw fa-facebook"></i><input class="item-list" type="text" name="facebook"
                                                           value="<?php echo $cFacebook ?>"></li>
            <li><i class="fa fa-fw fa-instagram"></i><input class="item-list" type="text" name="instagram"
                                                            value="<?php echo $cInstagram ?>"></li>
            <li><i class="fa fa-fw fa-twitter"></i><input class="item-list" type="text" name="twitter"
                                                          value="<?php echo $cTwitter ?>"></li>
        </ul>
        <?php

        if ($castle_id != 0 and $castle_id != "") {
            ?>
            <label class="content-grid">Media</label>
            <input class="content-grid" type="file" name="images[]" multiple="multiple" accept="image/*">
            <?php
        }
        ?>
        <input type="submit" name="<?php echo $cTransName; ?>" value="<?php echo $cTransType; ?>">

    </form>

    <!--    <form method="post" enctype="multipart/form-data">-->
    <!--        Select Image Files to Upload:-->
    <!--        <input class="content-grid" type="file" name="images[]" multiple="multiple" accept="image/*">-->
    <!--        <input type="submit" name="importImg" value="Import Images">-->
    <!--    </form>-->
</div>
<head>
    <link rel="stylesheet" href="css/admin/castles.css">
    <link rel="stylesheet" href="css/admin/side-nav.css">
    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="js/admin/magazin.js"></script>

</head>
<?php
include("castles_controller.php");
//require("../libs/config.php");
$magazin_id = $_GET["magazinid"];
$castlesController = new castles_controller();
$magazin = $castlesController->getMagazinInfoID($magazin_id);
//foreach ($castlesController->getCastleInfoID($id) as $row) {
//    $castle = $row;
//}
$mMagazinId = null;
$mTransType = null;
$mTransName = null;
$mType = null;
$mCastle = null;
$mName = null;
$mDescription = null;
$mDate = null;
$mWebSite = null;
$mActive = null;
$mCounty = null;
$mCity = null;

if ($magazin_id == 0) {
    $mTransType = "Hinzufügen";
    $mTransName = "newMagazin";
} else {
    $mMagazinId = $magazin['magazinid'];
    $mTransType = "Bearbeiten";
    $mTransName = "updMagazin";
    $mType = $magazin['magazin_type'];
    $mCastle = $magazin['castleid'];
    $mName = $magazin['magazin_name'];
    $mDescription = $magazin['magazin_desc'];
    $mDate = $magazin['magazin_date'];
    $mWebSite = $magazin['url'];
    $mActive = $magazin['active'];
    $mCounty = $magazin['countyid'];
    $mCity = $magazin['city'];
}
?>

<h1 class="content-title">Magazin <?php echo $mTransType ?></h1>
<div class="castle-container">
    <form action="admin/magazin_controller.php" method="post" enctype="multipart/form-data">
        <?php
        if ($mType != "") {
            $mType = ($mType == 'N')? "News" : "Event";
            ?>
            <label class="content-grid">Media</label>
            <?php
        }
        ?>

        <select class="content-grid" name="magazinType">
            <option value="E">Event</option>
            <option value="N">News</option>
        </select>
        <input class="content-grid" id="magazin" name="magazinid" type="hidden" value="<?php echo $mMagazinId ?>">
        <input class="content-grid" type="text" id="magazinname" name="magazinname" placeholder="Magazin Name..."
               value="<?php echo $mName ?>">
        <textarea class="content-grid" id="magazindesc" name="magazindesc" placeholder="Magazin Beschreibung..."
                  style="height:100px"><?php echo $mDescription ?></textarea>

                <label class="content-grid" for="magazindate" style="height: ">Date</label>
                <!--                    <input class="content-grid" type="date" id="year" name="year">-->
                <input class="content-grid" type="date" id="magazindate" name="magazindate"
                       value="<?php echo $mDate ?>">

        <div class="content-grid">
            <a class="column-left">
                <div><input type="checkbox" name="active" value="Y"
                        <?php if ($mActive == 'Y') { ?> checked="checked" <?php } ?> >
                    <label>Active</label>
                </div>
        </div>

        <input class="content-grid" type="text" name="url" id="url" placeholder="Webseite..."
               value="<?php echo $mWebSite ?>">

        <label class="content-grid" for="county">Bundesland</label>
        <?php
        include 'countiesList.php';
        ?>

        <input class="item-list" type="text" id="city" name="city" placeholder="Stadt"
               value="<?php echo $mCity ?>">

        <input class="item-list" type="text" id="castle" name="castle" placeholder="Castle"
               value="<?php echo $mCastle ?>">

        <input type="submit" name="<?php echo $mTransName; ?>" value="<?php echo $mTransType; ?>">

    </form>

    <!--    <form method="post" enctype="multipart/form-data">-->
    <!--        Select Image Files to Upload:-->
    <!--        <input class="content-grid" type="file" name="images[]" multiple="multiple" accept="image/*">-->
    <!--        <input type="submit" name="importImg" value="Import Images">-->
    <!--    </form>-->
</div>
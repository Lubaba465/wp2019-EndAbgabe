<head>
    <link rel="stylesheet" href="css/admin/castles.css">
    <link rel="stylesheet" href="css/admin/side-nav.css">


</head>
<?php
include("magazin_controller.php");
//require("../libs/config.php");
$magazin_id = $_GET["magazinid"];
$castlesController = new magazin_controller();
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
    <form action="" method="post" enctype="multipart/form-data">
        <?php
        if ($mType != "") {
            $mType = ($mType == 'N')? "News" : "Event";
            ?>
            <label class="content-grid">Media</label>
            <?php
        }
        ?>

        <select class="content-grid" name="magazinType" id="magazinType">
            <option value="E">Event</option>
            <option value="N">News</option>
        </select>
        <input class="content-grid" id="magazinid" name="magazinid" type="hidden" value="<?php echo $mMagazinId ?>">
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
                <div><input type="checkbox" name="active" id="active" value="Y"
                        <?php if ($mActive == 'Y') { ?> checked="checked" <?php } ?> >
                    <label>Active</label>
                </div>
        </div>

        <input class="content-grid" type="text" name="url" id="url" placeholder="Webseite..."
               value="<?php echo $mWebSite ?>">
        <label class="content-grid" id="county" for="county">Bundesland</label>
        <?php
        $countiesList = $castlesController->getCounties();

        echo "<select name='counties' id='counties'>";
        echo '<option value="--">Bundesland wählen</option>';
        foreach ($countiesList as $countiesRow) {
            echo '<option value="' . $countiesRow['countyid'] . '">' . $countiesRow['name'] . '</option>';
        }
        echo "</select>";
        ?>
        <input class="item-list" type="text" id="city" name="city" placeholder="Stadt"
               value="<?php echo $mCity ?>">

        <input class="item-list" type="text" id="castle" name="castle" placeholder="Castle"
               value="<?php echo $mCastle ?>">

        <input type="submit" id="<?php echo $mTransName; ?>" name="<?php echo $mTransName; ?>" value="<?php echo $mTransType; ?>">

    </form>
</div>

<script>

    $("#newMagazin").click(function () {

        var castleid=document.getElementById("castle").value;
        var magazinType =  document.getElementById("magazinType").value;
        var magazinname =  document.getElementById("magazinname").value;
        var magazindesc =  document.getElementById("magazindesc").value;
        var magazindate =  document.getElementById("magazindate").value;
        var url =  document.getElementById("url").value;
        var active = document.getElementById("active").value;
        var counties =  document.getElementById("counties").value;
        var city =  document.getElementById("city").value;
        var magazinid=document.getElementById("magazinid").value;

        var newMagazin =  document.getElementById("newMagazin").value;

        alert('fsd')

        if (confirm('Sind Sie sicher?')) {
            $.ajax({
                url: 'admin/views/magazin/magazin_controller.php',
                type: 'POST',
                data: {newMagazin:newMagazin,castleid:castleid,magazinType: magazinType, magazinname: magazinname,
                    magazindesc: magazindesc, magazindate: magazindate,url: url, active: active,
                    counties: counties, city: city },   error: function () {
                    alert('es ist ein Fehler aufgetreten!');
                },
                success: function (data) {
                    alert(data);
                }
            });
        }





    });
</script>
<script>
    $("#updMagazin").click(function () {


        var magazinid=document.getElementById("magazinid").value;
        var magazinType =  document.getElementById("magazinType").value;
        var magazinname =  document.getElementById("magazinname").value;
        var magazindesc =  document.getElementById("magazindesc").value;
        var magazindate =  document.getElementById("magazindate").value;
        var url =  document.getElementById("url").value;
        var active = document.getElementById("active").value;
        var counties =  document.getElementById("counties").value;
        var city =  document.getElementById("city").value;

        var updMagazin =  document.getElementById("updMagazin").value;

        if (confirm('Sind Sie sicher?')) {
            $.ajax({
                url: 'admin/views/magazin/magazin_controller.php',
                type: 'POST',
                data: {updMagazin:updMagazin,magazinid:magazinid,magazinType: magazinType, magazinname: magazinname,
                    magazindesc: magazindesc, magazindate: magazindate,url: url, active: active,
                    counties: counties, city: city },
                error: function () {
                    alert('es ist ein Fehler aufgetreten!');
                },
                success: function (data) {
                    alert(data);
                }
            });
        }





    });


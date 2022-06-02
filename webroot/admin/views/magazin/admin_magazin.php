<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="css/admin/castles.css">
    <link rel="stylesheet" href="css/admin/side-nav.css">
    <script type="text/javascript" src="js/admin/magazinn.js"></script>

</head>
<?php
require("magazin_controller.php");
require($_SERVER['DOCUMENT_ROOT'] . '/wp2019EndAbgabe/config.php');

$magazinController = new magazin_controller();
//$userid = $_SESSION['userid'];
?>
<div id="magazin">
    <h1 class="content-title">Mein Magazin</h1>
    <div class="content-grid">
        <div>
            <h2 class="cnt-headline">Events</h2>
            <?php
            $magazin = $magazinController->getMagazinUser("carola");
            foreach ($magazin as $row) {
                if ($row["magazin_type"] == 'E') {
                    ?>
                    <div class="content-grid">
                        <div>
                            <h2 class="cnt-headline">
                                <div class="content-grid">
                                    <a class="column-left">
                                        <?php echo htmlspecialchars($row["magazin_name"]) ?>
                                    </a>
                                    <a class="column-right content-right">
                                        <!--                    <a class="navlinks admSection" id="myData"><i class="fa fa-fw fa-home"></i></a>-->
                                        <!--                    <a class="casSection" id="castleData"><i class="fa fa-fw fa-pencil"></i></a>-->
                                        <a class="navlinks magDelete" id="<?php echo $row['magazinid'] ?>"><i
                                                    onclick="return confirm('Sind Sie sicher?');"
                                                    class="fa fa-fw fa-trash"></i></a>
                                        <a class="navlinks magSection" id="<?php echo $row['magazinid'] ?>"><i
                                                    class="fa fa-fw fa-pencil"></i></a>
                                    </a>
                                </div>
                            </h2>
                            <div>
                                <?php echo htmlspecialchars($row["magazin_desc"]) ?>
                                <?php echo htmlspecialchars($row["magazin_date"]) ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
            }
            ?>
        </div>
    </div>

    <div class="content-grid">
        <div>
            <h2 class="cnt-headline">News</h2>
            <?php
            $magazin = $magazinController->getMagazinUser("carola");
            foreach ($magazin as $row) {
                if ($row["magazin_type"] == 'N') {
                    ?>
                    <div class="content-grid">
                        <div>
                            <h2 class="cnt-headline">
                                <div class="content-grid">
                                    <a class="column-left">
                                        <?php echo htmlspecialchars($row["magazin_name"]) ?>
                                    </a>
                                    <a class="column-right content-right">
                                        <!--                    <a class="navlinks admSection" id="myData"><i class="fa fa-fw fa-home"></i></a>-->
                                        <!--                    <a class="casSection" id="castleData"><i class="fa fa-fw fa-pencil"></i></a>-->
                                        <a class="navlinks magDelete" id="<?php echo $row['magazinid'] ?>"><i
                                                    onclick="return confirm('Sind Sie sicher?');"
                                                    class="fa fa-fw fa-trash"></i></a>
                                        <a class="navlinks magSection" id="<?php echo $row['magazinid'] ?>"><i
                                                    class="fa fa-fw fa-pencil"></i></a>
                                    </a>
                                </div>
                            </h2>
                            <div>
                                <?php echo htmlspecialchars($row["magazin_desc"]) ?>
                                <?php echo htmlspecialchars($row["magazin_date"]) ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
            }
            ?>
        </div>
    </div>

    <div class="content-grid">
        <div>
            <button class="navlinks magSection" id="magazinData">Magazin hinzufügen</button>
        </div>
    </div>
</div>

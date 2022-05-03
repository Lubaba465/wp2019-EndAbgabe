<div class="index-container";>

<div class="content-grid">
    <?php

    require_once ($_SERVER['DOCUMENT_ROOT']."/wp2019EndAbgabe/database/dbconfig.php");

    $pageDetails = $_GET["type"];


    $sql = "SELECT * FROM gc_pages WHERE  page_title = '" . $pageDetails . "'";

    $ergebnis = $DB->query($sql);


    foreach ($ergebnis

    as $zeile) {


    ?>
    <div class="row main-row">
        <div class="8u">
            <section class="left-content">
                <h2><?php echo $zeile["page_title"]; ?></h2>
                <?php echo $zeile["page_desc"]; ?>
            </section>

        </div>
        <?php } ?>
    </div>
</div>

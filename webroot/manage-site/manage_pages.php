<?php


include_once ($_SERVER['DOCUMENT_ROOT']."/wp2019EndAbgabe/config.php");

include_once "../libs/common_functions.php";


$pageTitle = "Manage Pages";
$msg = '';
if (isset($_GET["del"]) && $_GET["del"] != "") {
$id=$_GET["del"];
    $sql = "DELETE FROM   gc_pages WHERE `page_id` = $id";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        header("Location: manage_pages.php");

    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if ($stmt->rowCount() > 0) {
        $msg = successMessage("Record deleted successfully");
    } else {
        $msg = errorMessage("fehler ");
    }
}

?>
<?php echo $msg; ?>
<link rel="stylesheet" href="style.css">
<table class="bordered">
    <tr>
        <th ><strong>Title</strong> </th>
        <th><strong>Action</strong> </th>
    </tr>
    <?php



    $sql = "SELECT * FROM  gc_pages WHERE 1 ORDER BY page_title ASC, page_id DESC";

        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

    foreach ($results as $rs) {

        ?>
        <tr>
            <td ><?php echo stripslashes($rs["page_title"]); ?></td>

            <td><a href="add_edit_page.php?edit=<?php echo ($rs["page_id"]); ?>">
                    Edit</a>
                <!--<a href="manage_pages.php?del=<?php /*echo ($rs["page_id"]); */?>"
                   onclick="return confirm('Are you sure?');">Delete</a>--> </td>
        </tr>
        <?php
    }
    ?>
</table>

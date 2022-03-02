<?php

include_once ($_SERVER['DOCUMENT_ROOT']."/../config.php");
include_once "../libs/common_functions.php";

$msg = '';
if (isset($_POST["sub"])) {

    $page_id = $_POST["page_id"];

    $page_title = $_POST["page_title"];
    $page_desc = $_POST["page_desc"];




    if ($page_title <> "") {


        if ($page_id <> "") {


            $sql = "UPDATE gc_pages SET  `page_title` =  :pt, "
                    . " `page_desc` =  :pdsc"
                    . " WHERE `page_id` = :pid";



                $stmt = $DB->prepare($sql);
                $stmt->bindValue(":pt", $page_title);
                $stmt->bindValue(":pdsc", $page_desc);
                 $stmt->bindValue(":pid", $page_id);

                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    $msg = successMessage("Page update successfully");
                }  else if ($stmt->rowCount() == 0) {
                    $msg = successMessage("No changes affected");
                } else {
                    $msg = errorMessage("Failed to update page");
                }


        } else {
            $sql = "INSERT INTO  gc_pages (`page_title`, `page_desc`) VALUES 
				(:pt, :pdsc, :mkey, :mdesc, :parent, :so, :status, :palias)";

            try {
                $stmt = $DB->prepare($sql);
                $stmt->bindValue(":pt", $page_title);
                $stmt->bindValue(":pdsc", $page_desc);

                $stmt->execute();
                 if ($stmt->rowCount() == 0) {
                    $msg = successMessage("No changes affected");
                } else {
                    $msg = errorMessage("Failed to add page");
                }
            } catch (Exception $ex) {
                echo errorMessage($ex->getMessage());
            }

        }
    } else {
        $msg = errorMessage("All fields are mandatory");
        }
    }

if (isset($_GET["edit"]) && $_GET["edit"] != "") {
    $pageTitle = "Edit Page";

    try {$pid=$_GET["edit"];
        $stmt = $DB->prepare("SELECT * FROM  gc_pages WHERE `page_id` = $pid");


        $stmt->execute();
        $details = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
} else {
    $pageTitle = "Add Page";
}


?>
<link rel="stylesheet" type="text/css" href="CLEditor/jquery.cleditor.css" />
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="CLEditor/jquery.cleditor.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#page_desc").cleditor();
    });

</script>
<?php echo $msg; ?>
<div class="formField">      
    <form method="post" action="" name="pages">
        <input type="hidden" name="page_id" value="<?php echo $details[0]["page_id"]; ?>"  />
        <table id="tableForm">
            <tr>
                <td class="formLeft"><span class="required">*</span>Title: </td>
                <td><input type="text" name="page_title" id="page_title" class="textboxes"
                           value="<?php echo stripslashes($details[0]["page_title"]); ?>"
                           autocomplete="off"  onkeyup="changeAlias();"  /> </td>
            </tr>

            <tr>

            <tr>
                <td class="formLeft">Description: </td>
                <td>
                    <textarea name="page_desc" id="page_desc"><?php echo stripslashes($details[0]["page_desc"]); ?></textarea>
                </td>
            </tr>

                <td> <input type="submit" name="sub" value="Save" /> &nbsp;  <input type="button" name="" onclick="javascript:window.location = 'manage_pages.php';
" value="back to lists" /> </td>
            </tr>       
        </table>
    </form>
</div>



<?php include_once ($_SERVER['DOCUMENT_ROOT']."/wp2019EndAbgabe/config.php");
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : 'anonym';
echo $userid;
$targetDir = $_SERVER['DOCUMENT_ROOT']."/wp2019EndAbgabe/webroot/images/";
$fileName = basename($_FILES['image']['name']);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$statusMsg = '';
if(isset($_POST["updCastle"]) ){
    // Allow certain file formats
    $db_user = "root";
    $db_pass = "";
    $db_name = "german_castles";
    $db = new PDO("mysql:host=localhost;dbname=$db_name;" , $db_user, $db_pass);
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    // Upload file to server
    echo getcwd();

    if(move_uploaded_file($_FILES["image"]["tmp_name"],"/Applications/XAMPP/xamppfiles/htdocs/wp2019EndAbgabe/webroot/img/uploads/".$_FILES['image']['name'])){
        // Insert image file name into database
        $image = $_FILES['image']['name'];
        $sql = "INSERT INTO gc_castle_fotos (
                   castleid,userid,file_name
                  )
                  VALUES (".$_POST["castleid"].",'$userid','$fileName')";

        echo $sql;
        $insert = $db->query($sql);
        $_POST["updCastle"] =null;
        if($insert){
            $_POST["updCastle"] =null;
            $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
        }else{
            $statusMsg = "File upload failed, please try again.";
        }
    }else{
        $statusMsg = "Sorry, there was an error uploading your file.";
    }

}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
?>
<?php


header("Location:admin.php");

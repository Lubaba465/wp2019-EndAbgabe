<?php
// Include the database configuration file
$db_user = "root";
$db_pass = "";
$db_name = "image_upload";
$db = new PDO("mysql:host=localhost;dbname=$db_name;" , $db_user, $db_pass);
$statusMsg = '';

// File upload path
$targetDir = $_SERVER['DOCUMENT_ROOT']."/wp2019EndAbgabe/webroot/images/";
$fileName = basename($_FILES['image']['name']);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["upload"]) && !empty($_FILES['image']['tmp_name'])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
        // Upload file to server
        if(move_uploaded_file($_FILES["image"]["tmp_name"],"/Applications/XAMPP/xamppfiles/temp/testupload/".$_FILES['image']['name'])){
            // Insert image file name into database
            $image = $_FILES['image']['name'];
            $insert = $db->query("INSERT into images (image, imagetext) VALUES ('$image', '####')");
            if($insert){
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


<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
    <style type="text/css">
        #content{
            width: 50%;
            margin: 20px auto;
            border: 1px solid #cbcbcb;
        }
        form{
            width: 50%;
            margin: 20px auto;
        }
        form div{
            margin-top: 5px;
        }
        #img_div{
            width: 80%;
            padding: 5px;
            margin: 15px auto;
            border: 1px solid #cbcbcb;
        }
        #img_div:after{
            content: "";
            display: block;
            clear: both;
        }
        img{
            float: left;
            margin: 5px;
            width: 300px;
            height: 140px;
        }
    </style>
</head>
<body>
<div id="content">

    <form method="POST" action="logout.php" enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">
        <div>
            <input type="file" name="image">
        </div>
        <div>
            <?php echo exec('whoami'); ?>
      <textarea
              id="text"
              cols="40"
              rows="4"
              name="image_text"
              placeholder="Say something about this image..."></textarea>
        </div>
        <div>
            <button type="submit" name="upload">POST</button>
        </div>
    </form>
</div>
</body>
</html>
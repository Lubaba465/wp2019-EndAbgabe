<?php
if (isset($_POST["userid"]) &&
    isset($_POST["vorname"]) &&
    isset($_POST["nachname"]) &&
    isset($_POST["email"]) &&
    isset($_POST["password"])) {
    try {


        include_once ($_SERVER['DOCUMENT_ROOT']."/wp2019EndAbgabe/config.php");
        $db = $DB;


        $umail = $_POST["email"];
        $stmt = $db->prepare("SELECT email FROM gc_users WHERE email=:umail");
        $stmt->bindParam(':umail', $umail);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row['email'] == $umail) {
            ?>
            <center style="color: red"><?php echo "sorry email id already taken !"; ?></center>
            <?php
        } else {
            $hash = password_hash($_POST["password"], PASSWORD_BCRYPT);

            $sql = "INSERT INTO gc_users
                          ( userid,
                            email,
                            fname, 
                           lname,
                          password)
                          VALUES (?, ?, ?, ?, ?)";
            $werte = array(
                $_POST["userid"],
                $_POST["email"],
                $_POST["vorname"],
                $_POST["nachname"],
                $hash
            );
            $kommando = $db->prepare($sql);
            $kommando->execute($werte);




            ?>
            <center style="color: green"> <?php
                echo "erfolgreich registiert";
                ?>
            </center>
            <?php
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}
?>
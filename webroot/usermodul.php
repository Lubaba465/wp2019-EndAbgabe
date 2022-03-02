<?php



include_once ($_SERVER['DOCUMENT_ROOT']."/../database/dbconfig.php");

session_start();


function isteingeloggt()
{
    if (isset($_SESSION['eingeloggt']) && $_SESSION['eingeloggt'] == true) {
        return true;
    } else {
        return false;
    }
}


function einloggen($email, $password)
{
    $email = $_POST["email"];
    $password = $_POST["password"];

    global $conn;
    $query = "SELECT * FROM gc_users WHERE email = :email ";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $row = $stmt->fetch();
    $hash = $row["password"];

    if (password_verify($password, $hash)) {

        $_SESSION['eingeloggt'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['userid'] = $row["userid"];
    } else {
        return false;
    }


}


function datenvonbenutzer()
{
    global $conn;
    $query = "SELECT * FROM gc_users WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $_SESSION["email"]);
    $stmt->execute();
    $row = $stmt->fetch();
    return $row;

}


?>

<?php



include_once ($_SERVER['DOCUMENT_ROOT']."/wp2019EndAbgabe/database/dbconfig.php");

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



        $_SESSION['eingeloggt'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['userid'] = $row["userid"];



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

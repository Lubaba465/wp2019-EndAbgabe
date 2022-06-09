<head>
    <link rel="stylesheet" href="css/admin/castles.css">
    <link rel="stylesheet" href="css/admin/sidenav.css">

</head>
<?php
include("account_controller.php");
$accountController = new account_controller();
$account = $accountController->getAccountData();

$cUserID = null;
$cFname = null;
$cLName = null;
$cEmail = null;

if ($account['userid'] <> '' & $account['userid'] <> 'anonym') {
    $cUserID = $account['userid'];
    $cFname = $account['fname'];
    $cLName = $account['lname'];
    $cEmail = $account['email'];

} else {
    echo 'Invalid Data';
}
?>

<h1 class="content-title">Persönliche Daten bearbieten</h1>
<div class="castle-container">


    <form action="" method="post" enctype="multipart/form-data">

    <label class="content-grid" for="userID">Benutzer ID</label>
    <input class="content-grid" name="userID" id="userID" value="<?php echo $cUserID ?>" disabled="disabled"><br>

    <label class="content-grid" for="fname">Vorname</label>
    <input class="content-grid" name="fname" id="fname" value="<?php echo $cFname ?>"><br>

    <label class="content-grid" for="lname">Nachname</label>
    <input class="content-grid" name="lname" id="lname" value="<?php echo $cLName ?>"><br>

    <label class="content-grid" for="email">Email</label>
    <input class="content-grid" name="email" id="email" value="<?php echo $cEmail ?>"><br>

    <label class="content-grid" for="">Passwort bestätigen</label>
    <input class="content-grid" type="password" name="pwAccUpd" id="pw" required><br>

    <input type="submit" id="accountUpd" name="accountUpd" value="Bearbeiten">

      </form>
    <script>
        $("#accountUpd").click(function () {

            // var id = $(this).parents("tr").attr("id");
            var pwAccUpd = document.getElementById("pw").value;
            var fname = document.getElementById("fname").value;
            var lname = document.getElementById("lname").value;
            var email = document.getElementById("email").value;

            if (confirm('Sind Sie sicher?')) {
                $.ajax({
                    url: 'admin/views/account/account_controller.php',
                    type: 'POST',
                    data: {pw: pwAccUpd, fname: fname, lname: lname, email: email},
                    error: function () {
                        alert('es ist ein Fehler aufgetreten!');
                    },
                    success: function (data) {
                        alert(data);
                    }
                });
            }
        });
    </script>
</div>
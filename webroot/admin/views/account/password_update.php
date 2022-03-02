<head>
    <link rel="stylesheet" href="css/admin/castles.css">
    <link rel="stylesheet" href="css/admin/side-nav.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="js/admin/account_info.js"></script>

</head>

<h1 class="content-title">Passwort ändern</h1>
<div class="castle-container">
    <form action="" method="post" enctype="multipart/form-data">

        <label class="content-grid">Bitte geben Sie Ihr aktuelles Passwort und das neue ein.</label><br>

        <label class="content-grid" for="oldPW">altes Passwort*</label>
        <input class="content-grid" type="password" name="oldPW" id="oldPW" required><br>

        <label class="content-grid" for="newPW">neues Passwort*</label>
        <input class="content-grid pwCheck" type="password" name="newPW" id="newPW"
               pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
               title="Muss mindestens eine Zahl und einen Groß- und Kleinbuchstaben sowie mindestens 8 oder mehr Zeichen enthalten"
               required><br>

        <label class="content-grid" for="newPWRepeat">neues Passwort wiederholen*</label>
        <input class="content-grid pwCheck" type="password" name="newPWRepeat" id="newPWRepeat" required><br>

        <input type="submit" name="pwUpdate" id="pwUpdate" value="Bestätigen">

    </form>

</div>
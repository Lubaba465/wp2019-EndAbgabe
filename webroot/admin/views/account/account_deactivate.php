<head>
    <link rel="stylesheet" href="css/admin/castles.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="js/admin/account_info.js"></script>

</head>

<h1 class="content-title">Konto deaktivieren</h1>
<div class="castle-container">
    <span>Ich möchte mein Konto deaktivieren</span>
    <label for="accountDeac">
        <input type="checkbox" id="accountDeac" name="accountDeac" onclick="pwShow()" />
    </label>
    <hr />

    <div class="content-grid hidden" id="pwConfirm">
        <label class="content-grid" for="pw">Passwort bestätigen</label>
        <input class="content-grid" type="password" name="pw" id="pw" required><br>
    </div>

    <input type="submit" name="deactAccount" id="deactAccount" value="Deaktivieren">

</div>
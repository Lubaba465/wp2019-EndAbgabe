<body>

<br/>

<div class="admin-container">
    <div class="wrapper">
        <?php
        if (isset($message)) {
            echo '<label class="text-danger">' . $message . '</label>';
        }
        ?>
        <form method="post">

            <div class="log">

                <input type="email" name="email" placeholder="Email-adresse" id="emailadresse">


                <input type="password" name="password" placeholder="Password" id="password">
                <input type="submit" value="Login" method="post" name="login">


                <a href="recoverpw-formularanfrage.php" class="forgot">Passwort vergessen?</a>


                <p>Sind Sie neu? <a
                        href="signup.php">Registrieren</a></p>
            </div>
        </form>
    </div>
</div>

</body>

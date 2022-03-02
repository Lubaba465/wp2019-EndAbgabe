<body>




<?php
include "signupphp.php";
?>


<div class="signup">

    <form action="signup.php" method="post">
        <input type="text" id="userid" placeholder="User ID" name="userid" required>

        <input type="text" id="vorname" placeholder="Vorname" name="vorname" required>


        <input type="text" id="nachname" placeholder="Nachname" name="nachname" required>


        <input type="email" id="besuchermail" placeholder="Email-Adresse" name="email" required>

        <input type="password" placeholder="Password" id="psw" name="password"
               pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
               title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
               required>

        <input type="submit" value="Submit">
        <p>Sind Sie bereits Mitglied?<a href="login.php">Anmelden</a></p>
    </form>


</div>
</form>
</div>

</body>


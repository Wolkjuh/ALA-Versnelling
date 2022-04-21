<?php
    include_once 'header.php';
?>

    <main>
        <?php
            if (isset($_SESSION["useruid"])) {
            if ($_SESSION["useruid"] == "Admin") {
        ?>
        <section class="signup-class">
            <h1>Registreren</h1>
            <form class="signup-form" action="includes/signup.inc.php" method="post">
                <input type="text" name="name" placeholder="Naam...">
                <input type="text" name="email" placeholder="E-Mail...">
                <input type="text" name="uid" placeholder="Gebruikersnaam...">
                <input type="password" name="pwd" placeholder="Wachtwoord...">
                <input type="password" name="pwdrepeat" placeholder="Herhaal wachtwoord...">
                <button type="submit" name="submit">Registreer Nu!</button>
            </form>
            <div class="registreererror">
                <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyimput") {
                            echo "<p class='login-register-bericht'>Vul alle velden in!</p>";
                        }
                        else if ($_GET["error"] == "invaliduid") {
                            echo "<p class='login-register-bericht'>Kies een goede gebruikersnaam!</p>";
                        }
                        else if ($_GET["error"] == "invalidemail") {
                            echo "<p class='login-register-bericht'>Kies een goede email!</p>";
                        }
                        else if ($_GET["error"] == "passwordsdontmatch") {
                            echo "<p class='login-register-bericht'>Wachtwoorden komen niet overeen!</p>";
                        }
                        else if ($_GET["error"] == "stmtfailed") {
                            echo "<p class='login-register-bericht'>Iets is niet goedgegaan, probeer het opnieuw!</p>";
                        }
                        else if ($_GET["error"] == "usernametaken") {
                            echo "<p class='login-register-bericht'>Gebruikersnaam bestaat al!</p>";
                        }
                        else if ($_GET["error"] == "none") {
                            echo "<p class='login-register-bericht'>U bent succesvol geregistreerd!</p>";
                        }
                    }
                    ?>
                </div>
        </section>
    </main>
        <?php
            } 
            }
        ?>

<?php   
    include_once 'footer.php';
?>
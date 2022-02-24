<?php
    include_once 'header.php';
?>

    <main>
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

            <?php

                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyimput") {
                        echo "<p>Vul alle velden in!</p>";
                    }
                    else if ($_GET["error"] == "invaliduid") {
                        echo "<p>Kies een goede gebruikersnaam!</p>";
                    }
                    else if ($_GET["error"] == "invalidemail") {
                        echo "<p>Kies een goede email!</p>";
                    }
                    else if ($_GET["error"] == "passwordsdontmatch") {
                        echo "<p>Wachtwoorden komen niet overeen!</p>";
                    }
                    else if ($_GET["error"] == "stmtfailed") {
                        echo "<p>Iets is niet goedgegaan, probeer het opnieuw!</p>";
                    }
                    else if ($_GET["error"] == "usernametaken") {
                        echo "<p>Gebruikersnaam bestaat al!</p>";
                    }
                    else if ($_GET["error"] == "none") {
                        echo "<p>U bent succesvol geregistreerd!</p>";
                    }
                }
                ?>
        </section>
    </main>

    <?php   
    include_once 'footer.php';
    ?>
<?php 
  include_once 'header.php';
?>

<section class="login-class">
  <h1>Log In</h1>
  <form class="login-form" action="Includes/login.inc.php" method="post">
    <input type="text" name="uid" placeholder="Gebruikersnaam / Email...">
    <input type="password" name="pwd" placeholder="Wachtwoord...">
    <button type="submit" name="submit" id="login">Log In!</button>
  </form>

  <?php

    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyimput") {
        echo "<p class='login-register-bericht'>Vul alle velden in!</p>";
      }
      else if ($_GET["error"] == "wronglogin") {
        echo "<p class='login-register-bericht'>De opgegeven login is incorrect!</p>";
      }
    }
  ?>
</section>



<?php
  include_once 'footer.php';
?>
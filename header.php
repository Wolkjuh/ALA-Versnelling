<?php
    session_start();
?>

<!DOCTYPE html5>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/fonts/css/all.css">
    <script src="https://use.fontawesome.com/a6f0361695.js"></script>
</head>
<body>
  <header>
    <img src="Assets/Images/logo.png" alt="logo" class="logo">
    <nav class="navbalk">
      <ul class="navlinks">
        <li><a href="index.php">Home</a></li>
        <li><a href="prijzenlijst.php">Prijzenlijst</a></li>
        <?php
          if (isset($_SESSION["useruid"])) {
            if ($_SESSION["useruid"] == "Admin") {
              echo "<li><a href='bestellen.php'>Inkoop</a></li>";
            } else {
              echo "<li><a href='bestellen.php'>Bestellen</a></li>";
            }
            if ($_SESSION["useruid"] == "Admin") {
              echo "<li><a href='modify.php'>Modify</a></li>"; 
              echo "<li><a href='signup.php'>Registreren</a></li>";
            }
            echo "<li><a href='includes/logout.inc.php'>Log Out</a></li>";
          } else {
            echo "<li><a href='login.php'>Log In</a></li>";
          }
          if (!isset($_SESSION["useruid"])) {
            echo "<li><a href='#'>Contact</a></li>";
          }
        ?>
      </ul>
    </nav>
  </header>
  <main>

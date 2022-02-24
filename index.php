<?php

  include_once 'header.php';

?>

<main>
  <section class="welkomsbericht">
    <?php
      if (isset($_SESSION["useruid"])) {
        echo "<p>Welkom " . $_SESSION["useruid"] . "!</p>";
      } 
    ?>
  </section>
  <section class="homepage">
    <img class="image-homepage" src="assets/Images/supermarkt.jpg" alt="supermarkt">
    <h1 class="h1-homepage">Welkom op de website van <br>'T Fruithuisje!</h1>
  </section>
</main>

<?php

  include_once 'footer.php';

?>
<?php

  include_once 'header.php';

?>

<div class="bestelwrapper">
  <?php
      if (isset($_SESSION["useruid"])) {
  ?>
  <section class="bestelforum">
    <h1 class="bestel-h1">Plaats bestelling</h1>
    <article class="formbestelling">
      <form action="bestellen.inc.php" method="POST">
        <input type="text" name="klantennummer" id="klantennummer" placeholder="Klantennummer">
        <input type="file" id="excelbestand" name="excelbestand" accept=".xlsx">
        <input type="submit" value="Plaats Bestelling">
      </form>
    </article>
    <article class="downloadtag">
      <a href="Bestelformulier.xlsx" id="downloadtag" download>Download Bestelformat</a>
    </article>
  </section>
  <?php
    } 
    
  ?>
  <?php
    if (isset($_SESSION["useruid"])) {
      if ($_SESSION["useruid"] == "Admin") {
  ?>

  <section class="bestelforum">
    <h1 class="bestel-h1">Plaats inkoop</h1>
    <article class="formbestelling">
      <form action="inkoop.inc.php" method="POST">
        <input type="file" id="excelbestand" name="excelbestand" accept=".xlsx">
        <input type="submit" value="Plaats Bestelling">
      </form>
    </article>
    <article class="downloadtag">
      <a href="Bestelformulier.xlsx" id="downloadtag" download>Download Inkoopformat</a>
    </article>
  </section>

  <?php
    } 
  }
  ?>
</div>





<?php

  include_once 'footer.php';

?>
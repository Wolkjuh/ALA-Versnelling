<?php

  include_once 'header.php';

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

  include_once 'footer.php';

?>
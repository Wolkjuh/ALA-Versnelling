<?php

  include_once 'header.php';

?>

<form action="bestellen.inc.php" method="POST">
  <input type="file" id="excelbestand" name="excelbestand" accept=".xlsx">
  <input type="submit" value="Plaats Bestelling">
</form>

<section class="downloadtag">
  <a href=""></a>
</section>

<a href="Bestelformulier.xlsx" download>Download</a>





<?php

  include_once 'footer.php';

?>
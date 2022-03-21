<?php

  include_once 'header.php';

?>
<?php
if (isset($_SESSION["useruid"])) {
  if ($_SESSION["useruid"] == "Admin") {
?>
<div class="modifywrapper">
  <div class="modifyformproduct">
    <h1>Modify User</h1>
    <div class="modifymargin">
      <form action="Includes/modify.inc.php" method="POST">
      
        <input type="text" name="klantennummer" id="klantennummer" placeholder="Klantennummer">
  
        <select name="modifyuser" id="modifyuser">
          <option value="" selected></option>
          <option value="klantennummer">Klantennummer</option>
          <option value="korting">Korting</option>
          <option value="email">Email</option>
        </select>
      
        <input type="text" name="nieuwgegevenuser" id="nieuwgegevenuser" placeholder="Nieuw Gegeven">
      
        <input type="submit" name="submituser" value="Invoeren" id="submitbuttonmodify">
      </form>
    </div>
  </div>
  
  <div class="modifyformproduct">
    <h1>Modify Product</h1>
    <div class="modifymargin">
      <form action="Includes/modify.inc.php" method="POST">
      
        <input type="text" name="productnummer" id="productnummer" placeholder="Productnummer">
  
        <select name="modifyproduct" id="modifyproduct">
          <option value="" selected></option>
          <option value="prijs">Prijs</option>
          <option value="productnummer">Productnummer</option>
        </select>
      
        <input type="text" name="nieuwgegevenproduct" id="nieuwgegevenproduct" placeholder="Nieuw Gegeven">
      
        <input type="submit" name="submitproduct" value="Invoeren" id="submitbuttonmodify">
      
      </form>
    </div>
  </div>
</div>

<?php
} 
}
?>

<?php

  include_once 'footer.php';

?>
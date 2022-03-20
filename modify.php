<?php

  include_once 'header.php';

?>
<?php
if (isset($_SESSION["useruid"])) {
  if ($_SESSION["useruid"] == "Admin") {
?>
<div class="modifywrapper">
  <div class="modifyformproduct">
    <h1>Modify Product</h1>
    <div class="modifymargin">
      <form action="Includes/modify.inc.php" method="POST">
      
        <input type="text" name="input1" id="input1" placeholder="Input 1">
  
        <select name="table2" id=""></select>
  
        <input type="checkbox" name="korting" id="korting">
        <label for="product">Korting</label>
        <input type="checkbox" name="prijs" id="prijs">
        <label for="klant">Prijs</label>
      
        <input type="text" name="input2" id="input2" placeholder="Input 2">
      
        <input type="submit" name="submit" value="submit" id="submitbuttonmodify">
      
      </form>
    </div>
  </div>
  
  <div class="modifyformproduct">
    <h1>Modify Product</h1>
    <div class="modifymargin">
      <form action="Includes/modify.inc.php" method="POST">
      
        <input type="text" name="input1" id="input1" placeholder="Input 1">
  
        <select name="table2" id=""></select>
  
        <input type="checkbox" name="korting" id="korting">
        <label for="product">Korting</label>
        <input type="checkbox" name="prijs" id="prijs">
        <label for="klant">Prijs</label>
      
        <input type="text" name="input2" id="input2" placeholder="Input 2">
      
        <input type="submit" name="submit" value="submit" id="submitbuttonmodify">
      
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
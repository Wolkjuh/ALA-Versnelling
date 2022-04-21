<style>
  main {
    display: flex;
  }

  .bestellingenwrapper {
    max-width: min-content;
    height: 30vh;
    margin: 7rem 0 0 20rem;
    text-align: center;
    border: 1px solid black;
    background-color: rgb(60, 143, 54);
    border-radius: 30px;
    padding: 2rem;
    box-shadow: 1px 1px 3px 3px;
  }

  .bestellingenwrapper h1 {
    font-size: 1.5rem;
  }

  .bestellingenmargin {
    margin-top: 3rem;
  }

  .bestellingenwrapper input {
    margin: 0.3rem;
    text-align: center;
    width: 250px;
  }
</style>
<?php

include_once 'Includes/db.inc.php';
require_once 'header.php';

  $sqlBestelling = "SELECT * FROM bestelling";
/** @var TYPE_NAME $conn */
if ($result = $conn->query($sqlBestelling)) {
    echo "<div style='border:2px black solid;Width:40vw;margin:3% 0% 0% 3%;background-color:rgba(68, 152, 67, 0.331);'>";
    echo "<table style='margin:3% auto 10%';><tr>";
    echo "<td style='border:1px solid black;Font-size:18px;Font-Weight:bold;padding:6px;background-color:rgb(117, 226, 117);color:rgb(62, 62, 62)'>Bestellingnummer</td>";
    echo "<td style='border:1px solid black;Font-size:18px;Font-Weight:bold;padding:6px;background-color:rgb(117, 226, 117);color:rgb(62, 62, 62)'>Klantnaam</td>";
    echo "<td style='border:1px solid black;Font-size:18px;Font-Weight:bold;padding:6px;background-color:rgb(117, 226, 117);color:rgb(62, 62, 62)'>Klantnummer</td>";
    echo "<td style='border:1px solid black;Font-size:18px;Font-Weight:bold;padding:6px;background-color:rgb(117, 226, 117);color:rgb(62, 62, 62)'>Status</td>";
    while ($row = $result->fetch_row()) {
      echo "<tr><td style='border:1px solid black;text-align:center;padding:6px;background-color:rgb(117, 226, 117);box-shadow: 1px 1px 20px 1px'>" . $row[0] . "</td>";
      echo "<td style='border:1px solid black;text-align:center;padding:6px;background-color:rgb(117, 226, 117);box-shadow: 1px 1px 20px 1px'>" . $row[2] . "</td>";
      echo "<td style='border:1px solid black;text-align:center;padding:6px;background-color:rgb(117, 226, 117);box-shadow: 1px 1px 20px 1px'>" . $row[1] . "</td>";
      echo "<td style='border:1px solid black;text-align:center;padding:6px;background-color:rgb(117, 226, 117);box-shadow: 1px 1px 20px 1px'>" . $row[3] . "</td>";
    }
    echo "</table>";
    echo "</div>";
  }
?>

<div class="bestellingenwrapper">
    <h1>Bestellingen</h1>
    <div class="bestellingenmargin">
      <form action="Includes/bestellingen.inc.php" method="POST">
      
        <input type="text" name="bestellingnummer" id="bestellingnummer" placeholder="Bestellingnummer">
  
        <select name="bestellingen" id="bestellingen">
          <option value="" selected></option>
          <option value="voltooien">Voltooien</option>
          <option value="verwijder">Verwijderen</option>
          <option value=""></option>
          <option value="pakbonDownload">Download Pakbon</option>
        </select>
      
        <input type="submit" name="submituser" value="Invoeren" id="submitbuttonmodify">
      </form>
    </div>
</div>

<?php
?>
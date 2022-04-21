<?php
include_once 'header.php';
include 'Includes/db.inc.php';

$sql = "SELECT * FROM product";
if ($result = $conn->query($sql)) {
  echo "<div class='overflow'>";
  echo "<table style='margin:3% auto 10%';>";
  echo "<tr>";
  echo "<td style='border:1px solid black;Font-size:18;Font-Weight:bold;padding:6px;background-color:rgb(33, 112, 33);box-shadow: 1px 1px 20px 1px'>";
  echo "Product";
  echo "</td>";
  echo "<td style='border:1px solid black;Font-size:18;Font-Weight:bold;padding:6px;background-color:rgb(33, 112, 33);box-shadow: 1px 1px 20px 1px'>";
  echo "Productnummer";
  echo "</td>";
  echo "<td style='border:1px solid black;Font-size:18;Font-Weight:bold;padding:6px;background-color:rgb(33, 112, 33);box-shadow: 1px 1px 20px 1px'>";
  echo "Prijs";
  echo "</td>";
  echo "<td style='border:1px solid black;Font-size:18;Font-Weight:bold;padding:6px;background-color:rgb(33, 112, 33);box-shadow: 1px 1px 20px 1px'>";
  echo "Aantal";
  echo "</td>";
  while ($row = $result->fetch_row()) {
    echo "<tr>";
    echo "<td style='border:1px solid black;text-align:center;padding:6px;background-color:rgb(117, 226, 117);box-shadow: 1px 1px 20px 1px'>";
    echo $row[0]; 
    echo "</td>";
    echo "<td style='border:1px solid black;text-align:center;padding:6px;background-color:rgb(117, 226, 117);box-shadow: 1px 1px 20px 1px'>";
    echo $row[1]; 
    echo "</td>";
    echo "<td style='border:1px solid black;text-align:center;padding:6px;background-color:rgb(117, 226, 117);box-shadow: 1px 1px 20px 1px'>";
    echo "€ " . $row[2]; 
    echo "</td>";
    echo "<td style='border:1px solid black;text-align:center;padding:6px;background-color:rgb(117, 226, 117);box-shadow: 1px 1px 20px 1px'>";
    echo $row[3]; 
    echo "</td>";
    echo "</tr>";
  }
  echo "</table>";
  echo "</div>";
  $result->close();
}
?>

<?php
include_once 'footer.php';
?>
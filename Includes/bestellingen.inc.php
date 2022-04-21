<?php

include 'db.inc.php';

$bestelling_id = $_POST['bestellingnummer'];

$klantQuery = "SELECT users.klantnummer 
FROM users 
INNER JOIN bestelling 
ON users.klantnummer = bestelling.klantnummer 
WHERE bestelling.bestelling_id = '" . $bestelling_id . "'";
$klantResult = $conn->query($klantQuery);
$klantRow = $klantResult->fetch_assoc();
$klantennummer = $klantRow['klantnummer'];

$downloadPakbon = '../Factuurbon/Pakbon_' . $klantennummer . '.xlsx';


if ($_POST['bestellingen'] == "voltooien") {
  $voltooiBestelling = "UPDATE bestelling SET bestellingStatus = 'Voltooid' WHERE klantnummer = " . $klantennummer;
  $conn->query($voltooiBestelling);
}

if ($_POST['bestellingen'] == "verwijder") {
  $verwijderBestelling = "DELETE FROM bestelling WHERE bestelling_id = " . $bestelling_id;
  $conn->query($verwijderBestelling);
}

if ($_POST['bestellingen'] == "pakbonDownload") {
  if (file_exists($downloadPakbon)) {
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename="'.basename($downloadPakbon).'"');
      header('Expires: 0');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');
      header('Content-Length: ' . filesize($downloadPakbon));
      readfile($downloadPakbon);
      exit;
  }
}

header("Location: ../bestellingen.php");
?>
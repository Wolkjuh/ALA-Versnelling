<?php

include_once 'header.php';
include_once "XLSX/simplexml.php";
include_once "XLSX/simplexmlgen.php";
include_once 'Includes/db.inc.php';

$xlsx = Shuchkin\SimpleXLSX::parse($_POST['excelbestand']);	
$usersUid = $_SESSION['useruid'];

$naamQuery = "SELECT usersName FROM users WHERE usersUid = '" . $usersUid . "'";
$naamResult = $conn->query($naamQuery);
$naamRow = $naamResult->fetch_assoc();
$naam = $naamRow['usersName']; 

$datum = $xlsx->getCell(0, 'B8');
$excelRows = $xlsx->rows();


$bestellingen = array();
$prijs2 = 0;

$klantQuery = "SELECT klantnummer FROM users WHERE usersUid = '" . $usersUid . "'";
$klantResult = $conn->query($klantQuery);
$klantRow = $klantResult->fetch_assoc();
$klantnummer = $klantRow['klantnummer'];

$kortingQuery = "SELECT korting FROM users WHERE usersUid = '" . $usersUid . "'";
$kortingResult = $conn->query($kortingQuery);
$kortingRow = $kortingResult->fetch_assoc();
$korting = $kortingRow['korting'];
$korting2 = 100 - $korting;

$factuurBonTitel = array("<b>Het Fruithuisje</b>", "<b>Factuurbon</b>");
$factuurBonNaamKlant = array("<b>Klantnaam</b>", $naam);
$factuurBonKlantennummer = array("<b>Klantennummer</b>", "<left>".$klantnummer."</left>");
$factuurBonDatum = array("<b>Datum</b>", "<left>".$xlsx->getCell(0,'B8')."</left>");
$factuurHeaders = array("<b>ProductID</b>","<b>Product</b>", "<b>Eenheid</b>", "<b>Kilo</b>", "<b>Prijs</b>");
$productSpatie = array("");
$factuurBon = array();
array_push($factuurBon, $factuurBonTitel, $factuurBonNaamKlant, $factuurBonKlantennummer , $factuurBonDatum , $productSpatie, $factuurHeaders);

foreach ($excelRows as $value) {
  if(is_numeric($value[0])) {
      if($value[2] != null || $value[3] != null) {
          $productID = $value[0];
          $productNaam = $value[1];
          $HoeveelheidEenheid = $value[2];
          $HoeveelheidKg = $value[3];
          $prijs = $value[4];
          $aantal = $HoeveelheidEenheid ? $HoeveelheidEenheid : $HoeveelheidKg;

          $prijs2 += $value[4] * $aantal;
          if ($korting == 0) {
            $korting = 100;
          }
          $prijs2 = number_format($prijs2 / 100 * $korting2, 2);

          $updateSQL = "UPDATE product SET aantal = aantal-" . $aantal . " WHERE productnummer = " . $productID;
          $conn->query($updateSQL);

          $huidigeProduct = array('<center>' . $productID . '</center>', '<center>' . $productNaam . '</center>', '<center>' . $HoeveelheidEenheid . '</center>',   '<center>' . $HoeveelheidKg . '</center>',
           '<center>' . "€ " . $prijs . '</center>');
          array_push($factuurBon, $huidigeProduct);
      }
  }
}

if ($korting == 100) {
  $totaalprijsje = array('<center></center>', '<center></center>', '<center></center>',   '<center>' . "Korting: " . 0 . "%" .'</center>',
  '<center>' . "€ " . $prijs2  . '</center>');
} else {
  $totaalprijsje = array('<center></center>', '<center></center>', '<center></center>',   '<center>' . "Korting: " . $korting . "%" .'</center>',
  '<center>' . "€ " . $prijs2  . '</center>');
}


array_push($factuurBon, $totaalprijsje);

Shuchkin\SimpleXLSXGen::fromArray( $factuurBon )->saveAs("Factuurbon/Factuur_" . $naam . "_" . $klantnummer . ".xlsx");
Shuchkin\SimpleXLSXGen::fromArray( $factuurBon )->downloadAs("Factuurbon/Factuur_" . $naam . "_" . $klantnummer . ".xlsx");
<?php

include_once 'header.php';
include_once "XLSX/simplexml.php";
include_once "XLSX/simplexmlgen.php";
include_once 'Includes/db.inc.php';

$xlsx = Shuchkin\SimpleXLSX::parse($_POST['excelbestand']);	

$naam = $xlsx->getCell(0, 'B6');
$klantennummer = $xlsx->getCell(0, 'B7');
$datum = $xlsx->getCell(0, 'B8');
$excelRows = $xlsx->rows();

$factuurBonTitel = array("<b>Het Fruithuisje</b>", "<b>Factuurbon</b>");
$factuurBonNaamKlant = array("<b>Klantnaam</b>", $xlsx->getCell(0,'B6'));
$factuurBonKlantennummer = array("<b>Klantennummer</b>", "<left>".$xlsx->getCell(0,'B7')."</left>");
$factuurBonDatum = array("<b>Datum</b>", "<left>".$xlsx->getCell(0,'B8')."</left>");
$factuurHeaders = array("<b>ProductID</b>","<b>Product</b>", "<b>Eenheid</b>", "<b>Kilo</b>");
$productSpatie = array("");
$factuurBon = array();
array_push($factuurBon, $factuurBonTitel, $factuurBonNaamKlant, $factuurBonKlantennummer , $factuurBonDatum , $productSpatie, $factuurHeaders);

$bestellingen = array();

foreach ($excelRows as $value) {
  if(is_numeric($value[0])) {
      if($value[2] != null || $value[3] != null) {
          $productID = $value[0];
          $productNaam = $value[1];
          $HoeveelheidEenheid = $value[2];
          $HoeveelheidKg = $value[3];
          $aantal = $HoeveelheidEenheid ? $HoeveelheidEenheid : $HoeveelheidKg;


          $updateSQL = "UPDATE product SET aantal = aantal-" . $aantal . " WHERE productnummer = " . $productID;
          $conn->query($updateSQL);

          $bestellingen[$productID] = $aantal;
          
          $huidigeProduct = array('<center>' . $productID . '</center>', '<center>' . $productNaam . '</center>', '<center>' . $HoeveelheidEenheid . '</center>',   '<center>' . $HoeveelheidKg . '</center>');
          array_push($factuurBon, $huidigeProduct);

      }
  }
}

// PRIJZEN OPHALEN

// nogmaals foreach door bestelling.+



// $productIDs = array_keys($bestellingen);
// $voorraadSQL = "SELECT product_id, productnummer, aantal FROM product WHERE productnummer IN (". implode("," , $productIDs) .")";
// $prijzen = "SELECT productnummer, prijs FROM product WHERE productnummer IN (". implode("," , $productIDs) .")";

// $result = $conn->query($voorraadSQL);
// $result2 = $conn->query($prijzen);

// foreach ($result as $row) {
//   $productNummer = $row[1];
//   $besteldAantal = $bestellingen[$productNummer];
//   $aantal = $row[2] - $besteldAantal;


//   "UPDATE product SET aantal = " . $aantal . " WHERE productnummer = " . $productID;
// }

// haal alle producten op met de productId's.
  // bereken met deze 2 lijsten (producten en bestellingen) de nieuwe voorraad
  // per product, UPDATE voorraad.



Shuchkin\SimpleXLSXGen::fromArray( $factuurBon )->saveAs("Factuurbon/Factuur_" . $naam . "_" . $klantennummer . ".xlsx");
Shuchkin\SimpleXLSXGen::fromArray( $factuurBon )->downloadAs("Factuurbon/Factuur_" . $naam . "_" . $klantennummer . ".xlsx");
header("Location: nabestelling.php");
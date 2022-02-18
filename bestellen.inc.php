<?php

include_once 'header.php';
include_once "XLSX/simplexml.php";
include_once "XLSX/simplexmlgen.php";

$xlsx = Shuchkin\SimpleXLSX::parse($_POST['excelbestand']);	

$naam = $xlsx->getCell(0, 'B6');
$klantennummer = $xlsx->getCell(0, 'B7');
$datum = $xlsx->getCell(0, 'B8');
$excelRows = $xlsx->rows();

$factuurBonTitel = Array("<b>Het Fruithuisje</b>", "<b>Factuurbon</b>");
$factuurBonNaamKlant = Array("<b>Klantnaam</b>", $xlsx->getCell(0,'B6'));
$factuurBonKlantennummer = Array("<b>Klantennummer</b>", "<left>".$xlsx->getCell(0,'B7')."</left>");
$factuurBonDatum = Array("<b>Datum</b>", "<left>".$xlsx->getCell(0,'B8')."</left>");
$factuurHeaders = Array("<b>ProductID</b>","<b>Product</b>", "<b>Eenheid</b>", "<b>Kilo</b>");
$productSpatie = Array("");
$factuurBon = Array();
array_push($factuurBon, $factuurBonTitel, $factuurBonNaamKlant, $factuurBonKlantennummer , $factuurBonDatum , $productSpatie, $factuurHeaders);

foreach ($excelRows as $value) {
  if(is_numeric($value[0])) {
      if($value[2] != null || $value[3] != null) {
          $productID = $value[0];
          $productNaam = $value[1];
          $HoeveelheidEenheid = $value[2];
          $HoeveelheidKg = $value[3];
          $huidigeProduct = Array('<center>' . $productID . '</center>', $productNaam, '<center>' . $HoeveelheidEenheid . '</center>',   '<center>' . $HoeveelheidKg . '</center>');
          array_push($factuurBon, $huidigeProduct);
      }
  }
}

Shuchkin\SimpleXLSXGen::fromArray( $factuurBon )->saveAs("Factuurbon/Factuur_" . $naam . "_" . $klantennummer . ".xlsx");
Shuchkin\SimpleXLSXGen::fromArray( $factuurBon )->downloadAs("Factuurbon/Factuur_" . $naam . "_" . $klantennummer . ".xlsx");
header("Location: nabestelling.php");
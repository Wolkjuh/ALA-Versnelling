<?php
include_once 'header.php';
include_once "XLSX/simplexml.php";
include_once "XLSX/simplexmlgen.php";
include_once 'Includes/db.inc.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$xlsx = Shuchkin\SimpleXLSX::parse($_POST['excelbestand']);	

$naam = "'T Fruithuisje";
$datum = $xlsx->getCell(0, 'B8');
$excelRows = $xlsx->rows();

$factuurBonTitel = array("<b>Het Fruithuisje</b>", "<b>Factuurbon</b>");
$factuurBonNaamKlant = array("<b>Klantnaam</b>", $naam);
$factuurBonDatum = array("<b>Datum</b>", "<left>".$xlsx->getCell(0,'B8')."</left>");
$factuurHeaders = array("<b>ProductID</b>","<b>Product</b>", "<b>Eenheid</b>", "<b>Kilo</b>", "<b>Prijs</b>");
$productSpatie = array("");
$factuurBon = array();
array_push($factuurBon, $factuurBonTitel, $factuurBonNaamKlant , $factuurBonDatum , $productSpatie, $factuurHeaders);

$bestellingen = array();
$prijs2 = 0;

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

          $updateSQL = "UPDATE product SET aantal = aantal+" . $aantal . " WHERE productnummer = " . $productID;
          $conn->query($updateSQL);

          

          $huidigeProduct = array('<center>' . $productID . '</center>', '<center>' . $productNaam . '</center>', '<center>' . $HoeveelheidEenheid . '</center>',   '<center>' . $HoeveelheidKg . '</center>',
           '<center>' . "€ " . $prijs . '</center>');
          array_push($factuurBon, $huidigeProduct);
          
      }
  }
}

$totaalprijsje = array('<center></center>', '<center></center>', '<center></center>',   '<center></center>',
'<center>' . "€ " . $prijs2  . '</center>');

array_push($factuurBon, $totaalprijsje);

Shuchkin\SimpleXLSXGen::fromArray( $factuurBon )->downloadAs("Inkoopbon_Fruithuisje.xlsx");
header('Location: ../prijzenlijst.php');

?>
<?php

include 'db.inc.php';

$product = $_POST['product'];
$klant = $_POST['klant'];

$input1 = $_POST['input1'];

$korting = $_POST['korting'];
$prijs = $_POST['prijs'];

$input2 = $_POST['input2'];
if (isset($_POST['submit'])) {
  if (isset($_POST['product'])) {
    if (isset($_POST['prijs'])) {
      $updateproduct = "UPDATE product SET prijs = " . $input2 . " WHERE productnummer = " . $input1;
      $conn->query($updateproduct);
    }
  }
}

header("Location: ../index.php");


?>
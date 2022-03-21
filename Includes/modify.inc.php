<?php

include 'db.inc.php';

$modifyuser = $_POST['modifyuser'];
$modifyproduct = $_POST['modifyproduct'];

$klantennummer = $_POST['klantennummer'];
$gegevenuser = $_POST['nieuwgegevenuser'];

$productnummer = $_POST['productnummer'];
$gegevenproduct = $_POST['nieuwgegevenproduct'];

if (isset($_POST['submituser'])) {
  $result = "UPDATE users SET " . $modifyuser . " = " . $gegevenuser . " WHERE klantnummer = " . $klantennummer;
  $conn->query($result);
}

if (isset($_POST['submitproduct'])) {
  $result = "UPDATE product SET " . $modifyproduct . " = " . $gegevenproduct . " WHERE productnummer = " . $productnummer;
  $conn->query($result);
}

header("Location: ../modify.php");


?>
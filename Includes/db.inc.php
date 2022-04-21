<?php

$servername = "localhost";
$serveruser = "root";
$password = "";
$database = "alap4";

$conn = mysqli_connect($servername, $serveruser, $password, $database);

  if (!$conn) {
    die("Connection Failed");
  }
?>
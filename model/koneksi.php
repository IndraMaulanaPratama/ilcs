<?php
$servername = "remotemysql.com";
$username   = "ESUpPxZ2Wa";
$password   = "7rPF5nIYtp";
$dbname     = "ESUpPxZ2Wa";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>

<?php
require_once "koneksi.php";

$id     = $_GET['id'];

try {

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "DELETE FROM product WHERE `product`.`id` = '$id' ";
  $conn->exec($sql);
  
  header("Location: ../index.php");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

?>
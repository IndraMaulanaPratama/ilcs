<?php
require_once "koneksi.php";

$id     = $_POST['id'];
$title  = $_POST['title'];
$price  = $_POST['price'];

try {

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE `product` SET `title` = '$title', `price` = '$price' WHERE `product`.`id` = '$id' ";
  $conn->exec($sql);
  
  header("Location: ../index.php");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

?>
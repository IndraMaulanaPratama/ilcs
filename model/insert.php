<?php
require_once "koneksi.php";

$title  = $_POST['title'];
$price  = $_POST['price'];

try {

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO product VALUES (null, '$title', '$price')";

$conn->exec($sql);
  header("Location: ../index.php");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

?>
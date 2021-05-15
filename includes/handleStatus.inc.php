<?php
include_once "./db.inc.php";

$action = $_GET["method"];
$idProduct = $_GET["idProduct"];
if ($action == "disable") {
  $query = "UPDATE products
  SET `status` = 0
  WHERE id = '$idProduct';
  ";
  $result = $conn->query($query) . die("query failed");
  echo $result;

} elseif ($action == "able") {
  $query = "UPDATE products
  SET `status` = 1
  WHERE id = '$idProduct';
  ";
  $result = $conn->query($query) . die("query failed");
  echo $result;
}
<?php

function renderListProduct() {

  require_once "./db.inc.php";
  if (isset($_GET["id"])) {
    $idProduct = $_GET["id"];
    $query = "SELECT * FROM products WHERE id = $idProduct;";
  } else {
    $query = "SELECT * FROM products;";
  }
  $result = $conn->query($query);
  $data = array();

  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
  echo json_encode($data);

}

renderListProduct();
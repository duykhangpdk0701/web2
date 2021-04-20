<?php

function renderListProduct() {

  require_once "./db.inc.php";

  $query = "SELECT * FROM products;";
  $result = $conn->query($query);
  $data = array();

  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
  echo json_encode($data);

}

renderListProduct();

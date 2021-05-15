<?php

session_start();

function renderListProductWithSession($userId)
{
  require_once "./db.inc.php";
  $query = "SELECT * FROM products,wishlist where userId  = $userId AND wishlist.productId = products.id;";
  $result = $conn->query($query);
  $data = array();

  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
  echo json_encode($data);

}

renderListProductWithSession($_SESSION["id"]);
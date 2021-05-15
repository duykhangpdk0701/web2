<?php

session_start();

function renderListProductWithSession($userId)
{
  require_once "./db.inc.php";
  $query = "SELECT * FROM products,purchases where usersId  = $userId AND purchases.productsId = products.id;";
  $result = $conn->query($query);
  $data = array();

  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
  echo json_encode($data);

}

renderListProductWithSession($_SESSION["id"]);
<?php

session_start();

function renderListProductWithSession($userId) {
  require_once "./db.inc.php";
  $query = "SELECT * FROM wishlist where userId  = $userId;";
  $result = $conn->query($query);
  $data = array();

  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
  echo json_encode($data);

}

function renderListProduct() {

  require_once "./db.inc.php";

  $query = "SELECT * FROM wishlist where userId  = 0;";
  $result = $conn->query($query);
  $data = array();

  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
  echo json_encode($data);

}

if (isset($_SESSION["id"])) {
  renderListProductWithSession($_SESSION["id"]);
} else {
  renderListProduct();
}

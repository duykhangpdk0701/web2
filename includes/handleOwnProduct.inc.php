<?php

include_once "./db.inc.php";

session_start();

$idUser = $_SESSION["id"];
$query = "SELECT * FROM products WHERE sellerId = $idUser;";
$result = $conn->query($query);
$data = array();

while ($row = $result->fetch_assoc()) {
  $data[] = $row;
}
echo json_encode($data);
<?php

include_once "./db.inc.php";

$query = "SELECT * FROM users";
$result = $conn->query($query);
$data = array();

while ($row = $result->fetch_assoc()) {
  $data[] = $row;
}
echo json_encode($data);
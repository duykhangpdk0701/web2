<?php

session_start();
@include_once "./db.inc.php";
date_default_timezone_set("Asia/Ho_Chi_Minh");
$userId = $_SESSION["id"];

if (isset($_POST["start"])) {
  $date = date("y-m-d H:i:s");
  $query = "INSERT INTO seller (userId, dateJoin) VALUES (?,?);";
  $stmt = $conn->prepare($query) or die("stmt failed");
  $stmt->bind_param("ss", $userId, $date) or die("stmt bind param failed");
  $stmt->execute() or die("stmt execute failed");
  $stmt->close();

  header("location: ../market.php");
  exit();
}
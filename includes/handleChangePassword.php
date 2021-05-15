<?php
session_start();
include_once "./db.inc.php";

$action = $_GET["action"];

$userId = $_SESSION["id"];

if ($action === "check") {
  $query = "SELECT passwords from users where ids ='$userId';";
  $result = $conn->query($query);
  $row = $result->fetch_assoc();

  $password = $_POST["password"];

  $checkPassword = password_verify($password, $row["passwords"]);

  if ($checkPassword) {
    echo "match password";
  } else {
    echo "not match password";
  }
} elseif ($action === "change") {
  $newPassword = $_POST["new-password"];
  $hashPassword = password_hash($newPassword, PASSWORD_DEFAULT);
  echo "$hashPassword";
  $query = "UPDATE `users` SET `passwords`= '$hashPassword' WHERE ids = '$userId'";
  $result = $conn->query($query);
}
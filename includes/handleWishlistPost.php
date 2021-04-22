<?php

if (isset($_POST["productId"])) {
  $productId = $_POST["productId"];
  $userId = $_POST["userId"];

  include_once "./db.inc.php";

  $query = "DELETE FROM wishlist WHERE productId = ? AND userId = ?";
  $stmt = $conn->prepare($query) or die("stmt failed");
  $stmt->bind_param("ss", $productId, $userId);
  $stmt->execute();
  $stmt->close();

  echo "hello";
} else {
  echo "not post productId";
}
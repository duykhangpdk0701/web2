<?php

session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");

if (!isset($_SESSION["id"])) {
  $message = array("message" => "unidentified id");
  echo json_encode($message);
  exit;
} else {
  $message = array("message" => null);
  echo json_encode($message);
}

if (isset($_POST["productId"])) {
  $method = $_POST["method"];

  if ($method === "remove") {

    $productId = $_POST["productId"];

    $userId = $_SESSION["id"];
    include_once "./db.inc.php";

    $query = "DELETE FROM wishlist WHERE productId = ? AND userId = ?";
    $stmt = $conn->prepare($query) or die("stmt failed");
    $stmt->bind_param("ss", $productId, $userId);
    $stmt->execute() or die("stmt execute fail");
    $stmt->close();
    echo "remove succeed";

  } else if ($method === "add") {

    $productId = $_POST["productId"];
    $userId = $_SESSION["id"];
    $date = date("y-m-d H:i:s");
    include_once "./db.inc.php";

    $query = "INSERT INTO wishlist (userId, productId, dateAddToWishlist) VALUES (?,?,?)";
    $stmt = $conn->prepare($query) or die("stmt failed");
    $stmt->bind_param("sss", $userId, $productId, $date);
    $stmt->execute() or die("stmt execute fail");
    $stmt->close();

    echo "add succeed";

  } else if ($method === "buy") {
    $productId = $_POST["productId"];
    $userId = $_SESSION["id"];
    $date = date("y-m-d H:i:s");
    include_once "./db.inc.php";

    $query = "INSERT INTO purchases (usersId, productsId, purchasesDate) VALUES (?,?,?)";
    $stmt = $conn->prepare($query) or die("stmt failed");
    $stmt->bind_param("sss", $userId, $productId, $date);
    $stmt->execute() or die("stmt execute fail");
    $stmt->close();

    $query = "DELETE FROM wishlist WHERE productId = ? AND userId = ?";
    $stmt = $conn->prepare($query) or die("stmt failed");
    $stmt->bind_param("ss", $productId, $userId);
    $stmt->execute() or die("stmt execute fail");
    $stmt->close();
    echo "remove form wish list succeed";

  } else {
    echo "post fail";
  }

}
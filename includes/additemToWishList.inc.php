<?php
require_once "./db.inc.php";
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");

// if (isset($_POST["addBtn"])) {
//   if (isset($_SESSION["id"])) {
//     $idUser = $_SESSION["id"];
//     $idProduct = $_GET["id"];
//     $date = date("y-m-d H:i:s");

//     $query = "INSERT INTO wishlist (userId, productId, dateAddToWishlist) VALUES (?,?,?)";
//     $stmt = $conn->prepare($query) or die("stmt failed");

//     $stmt->bind_param("sss", $idUser, $idProduct, $date) or die("stmt bind param failed");

//     $stmt->execute();
//     $stmt->close();

//     header("location: ../index.php");
//     exit();

//   } else {
//     header("location: ../login.php");
//     exit();
//   }
// }

// if (isset($_POST["removeBtn"])) {
//   if (isset($_SESSION["id"])) {
//     $idUser = $_SESSION["id"];
//     $idProduct = $_GET["id"];
//     $date = date("y-m-d H:i:s");

//     $query = "DELETE FROM wishlist WHERE userId = ? AND productId = ? ;";
//     $stmt = $conn->prepare($query) or die("stmt failed");

//     $stmt->bind_param("ss", $idUser, $idProduct) or die("stmt bind param failed");

//     $stmt->execute();
//     $stmt->close();

//     header("location: ../index.php");
//     exit();

//   } else {
//     header("location: ../login.php");
//     exit();
//   }
// }

//fjsakjflsa;fkajdkla;jdfkajdfas

function addToWishlist($conn) {
  if (isset($_SESSION["id"])) {
    $idUser = $_SESSION["id"];
    $idProduct = $_GET["id"];
    $date = date("y-m-d H:i:s");

    $query = "INSERT INTO wishlist (userId, productId, dateAddToWishlist) VALUES (?,?,?)";
    $stmt = $conn->prepare($query) or die("stmt failed");

    $stmt->bind_param("sss", $idUser, $idProduct, $date) or die("stmt bind param failed");

    $stmt->execute();
    $stmt->close();

    header("location: ../index.php");
    exit();

  } else {
    header("location: ../login.php");
    exit();
  }

}

function removeFromWishlist($conn) {
  if (isset($_SESSION["id"])) {
    $idUser = $_SESSION["id"];
    $idProduct = $_GET["id"];

    $query = "DELETE FROM wishlist WHERE userId = ? AND productId = ? ;";
    $stmt = $conn->prepare($query) or die("stmt failed");

    $stmt->bind_param("ss", $idUser, $idProduct) or die("stmt bind param failed");

    $stmt->execute();
    $stmt->close();

    header("location: ../index.php");
    exit();

  } else {
    header("location: ../login.php");
    exit();
  }
}

if (isset($_POST["userId"])) {
  $method = $_POST["method"];

  if ($method === "add") {
    addToWishlist($conn);
  } else if ($method === "remove") {
    removeFromWishlist($conn);
  } else if ($method === "buy") {

  }

}

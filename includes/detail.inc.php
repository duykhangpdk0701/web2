<?php
require_once "./db.inc.php";
require_once "./isExistFunction.inc.php";
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");

//purchase handle
if (isset($_POST["buyNowBtn"])) {
  if ($_SESSION["id"]) {
    $idProduct = $_GET["id"];
    $idUser = $_SESSION["id"];
    $date = date("y-m-d H:i:s");

    if (isExistPurchase($conn, $idUser, $idProduct)) {
      header("location: ../detail.php?id=$idProduct&&error=alreadyExits");
      exit();
    }

    $query = "INSERT INTO purchases (usersId, productsId, purchasesDate) VALUES (?,?,?);";
    $stmt = $conn->prepare($query) or die("stmt failed");
    $stmt->bind_param("sss", $idUser, $idProduct, $date) or die("stmt bind param failed");
    $stmt->execute() or die("stmt execute failed");
    $stmt->close();

    $query = "DELETE FROM `wishlist` WHERE userId = ? AND productId = ?;";
    $stmt = $conn->prepare($query) or die("stmt failed");
    $stmt->bind_param("ss", $idUser, $idProduct) or die("stmt bind param failed");
    $stmt->execute() or die("stmt execute failed");
    $stmt->close();

    header("location: ../detail.php?id=$idProduct");
    exit();
  } else {
    header("location: ../login.php");
    exit();
  }
}

//add to wish list handle
if (isset($_POST["addBtn"])) {
  if ($_SESSION["id"]) {
    $idProduct = $_GET["id"];
    $idUser = $_SESSION["id"];
    $date = date("y-m-d H:i:s");

    if (isExistWishList($conn, $idUser, $idProduct) || isExistPurchase($conn, $idUser, $idProduct)) {
      header("location: ../detail.php?id=$idProduct&&error=alreadyExits");
      exit();
    }

    $query = "INSERT INTO wishlist (userId, productId, dateAddToWishlist) VALUES (?,?,?);";
    $stmt = $conn->prepare($query) or die("stmt failed");

    $stmt->bind_param("sss", $idUser, $idProduct, $date) or die("stmt bind param failed");

    $stmt->execute() or die("stmt execute failed");
    $stmt->close();

    header("location: ../detail.php?id=$idProduct");
    exit();
  } else {
    header("location: ../login.php");
    exit();
  }
}
//removebtn
if (isset($_POST["removeBtn"])) {
  if ($_SESSION["id"]) {
    $idProduct = $_GET["id"];
    $idUser = $_SESSION["id"];

    $query = "DELETE FROM wishlist WHERE userId = ? AND productId = ? ;";
    $stmt = $conn->prepare($query) or die("stmt failed");

    $stmt->bind_param("ss", $idUser, $idProduct) or die("stmt bind param failed");

    $stmt->execute();
    $stmt->close();

    header("location: ../detail.php?id=$idProduct");
    exit();
  } else {
    header("location: ../login.php");
    exit();
  }
}
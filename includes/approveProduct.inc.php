<?php
include_once "./db.inc.php";

session_start();

function fetchDataProductAwaitApprove($conn)
{
  $idProduct = $_GET["id"];

  $query = "SELECT * FROM `productsawaitapproved` WHERE id = $idProduct";
  $result = $conn->query($query);
  $row = $result->fetch_assoc();
  if ($row) {
    return $row;
  }
  return false;
}

function fetchDataProductAwaitApproveWithAjax($conn)
{
  $idProduct = $_POST["productId"];

  $query = "SELECT * FROM `productsawaitapproved` WHERE id = $idProduct";
  $result = $conn->query($query);
  $row = $result->fetch_assoc();
  if ($row) {
    return $row;
  }
  return false;
}

function approveProductWithoutAjax($conn)
{
  if (isset($_POST["approve-btn"])) {

    $row = fetchDataProductAwaitApprove($conn);
    $query = $query = "INSERT INTO products (`name`, `price`, `imgBrowseUrl`, `imgNameUrl`, `imgRepresentativeUrl`, `developer`, `dateRelease`,  `tags`, `platform`, `facebookUrl`, `websiteUrl`, `os`, `processor`, `memory`, `storage`, `directX`, `graphics`, `sellerId`,`adminApproveId`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
    $stmt = $conn->prepare($query) or die("stmt failed");
    $stmt->bind_param("sssssssssssssssssss", $row["name"], $row["price"], $row["imgBrowseUrl"], $row["imgNameUrl"], $row["imgRepresentativeUrl"], $row["developer"], $row["dateRelease"], $row["tags"], $row["platform"], $row["facebookUrl"], $row["websiteUrl"], $row["os"], $row["processor"], $row["memory"], $row["storage"], $row["directX"], $row["graphics"], $row["sellerId"], $_SESSION["id"]) or die("stmt param failed");
    $stmt->execute() or die("stmt execute fail");
    $stmt->close();

    //  removing awaitProduct after was approved
    $idAwaitProduct = $row["id"];
    $query = $query = "DELETE FROM `productsawaitapproved` WHERE id = ?";
    $stmt = $conn->prepare($query) or die("stmt failed");
    $stmt->bind_param("s", $idAwaitProduct) or die("stmt param failed");
    $stmt->execute() or die("stmt execute fail");
    $stmt->close();

  }
}

function approveProductWithAjax($conn)
{
  $row = fetchDataProductAwaitApproveWithAjax($conn);
  print_r($row);
  $query = $query = "INSERT INTO products (`name`, `price`, `imgBrowseUrl`, `imgNameUrl`, `imgRepresentativeUrl`, `developer`, `dateRelease`,  `tags`, `platform`, `facebookUrl`, `websiteUrl`, `os`, `processor`, `memory`, `storage`, `directX`, `graphics`, `sellerId`,`adminApproveId`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
  $stmt = $conn->prepare($query) or die("stmt failed");
  $stmt->bind_param("sssssssssssssssssss", $row["name"], $row["price"], $row["imgBrowseUrl"], $row["imgNameUrl"], $row["imgRepresentativeUrl"], $row["developer"], $row["dateRelease"], $row["tags"], $row["platform"], $row["facebookUrl"], $row["websiteUrl"], $row["os"], $row["processor"], $row["memory"], $row["storage"], $row["directX"], $row["graphics"], $row["sellerId"], $_SESSION["id"]) or die("stmt param failed");
  $stmt->execute() or die("stmt execute fail");
  $stmt->close();
  //  removing awaitProduct after was approved
  $idAwaitProduct = $row["id"];
  $query = $query = "DELETE FROM `productsawaitapproved` WHERE id = ?";
  $stmt = $conn->prepare($query) or die("stmt failed");
  $stmt->bind_param("s", $idAwaitProduct) or die("stmt param failed");
  $stmt->execute() or die("stmt execute fail");
  $stmt->close();
}

if ($_GET["action"] == "noAjax") {
  approveProductWithoutAjax($conn);
} else if ($_POST["action"] == "withAjax") {
  if (isset($_POST["productId"])) {
    approveProductWithAjax($conn);
    echo "inside method with ajax";
  }
}
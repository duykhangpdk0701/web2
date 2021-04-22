<?php

@include_once "./db.inc.php";
session_start();

$idUser = $_SESSION["id"];
$query = "SELECT * FROM seller WHERE userId = $idUser;";
$result = $conn->query($query);
$row = $result->fetch_assoc();

echo $idUser;

if ($row) {
  header("location: ../market.php");
  exit();
} else {
  header("location: ../marketIntro.php");
  exit();
}
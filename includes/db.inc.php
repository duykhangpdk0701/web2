<?php

$severName = "localhost";
$userServerName = "root";
$userPassword = "";
$dbName = "dicegames";

$conn = new mysqli($severName, $userServerName, $userPassword, $dbName);

if ($conn->connect_error) {
  die("connection failed: " . $conn->connect_error);
}
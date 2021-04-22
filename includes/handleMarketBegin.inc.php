<?php

session_start();
@include_once "./db.inc.php";
$userId = $_SESSION["id"];

$query = "INSERT INTO seller (userId, dateJoin) VALUES (?,?);";
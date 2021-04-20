<?php
if (isset($_POST["submit"])) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  require_once "./db.inc.php";
  require_once "./loginFunction.inc.php";

  loginUser($conn, $username, $password);

}
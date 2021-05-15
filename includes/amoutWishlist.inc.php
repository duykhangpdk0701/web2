<?php

if (isset($_GET["id"])) {
  include_once "./db.inc.php";
  $userId = $_GET["id"];
  $query = "SELECT COUNT(*) FROM wishlist WHERE id  = $userId";
}